<?php
require_once("includes\opendb.php");
define('ERROR_LOG_DIR', 'c:\inetpub\cmslogs');

class UserPrincipal
{
	var $Username;
	var $Email;
	var $Manager;
	
	public function __construct($name, $email, $manager) {
        $this->Username = $name;
        $this->Email = $email;
        $this->Manager = $manager;		
    }
}

class PageSecurity
{
	var $CurrentUser;
	
	function GoSecure($isFragment = false)
	{
		if (!isset($_SESSION['CurrentUser']))
		{
			if ($isFragment)
			{
				http_response_code(403); // unauthorised
				exit; // this page was reached via a subquery...redirects dont help here
			}
			else
			{
				$_SESSION['requesturl'] = $_SERVER['REQUEST_URI'];
				header("location: index.php");
				exit;
			}
		}
		else
		{
			$this->CurrentUser = $_SESSION['CurrentUser'];
		}
	}
	
	function GetFirstPage()
	{
		if (isset($_SESSION['requesturl']))
		{
			$url = $_SESSION['requesturl'];
			unset($_SESSION['requesturl']);
			return $url;
		}
		else
			return "main.php";
	}
	
	function ValidatePostParams($params)
	{
		$abort = false;
		foreach ($params as $param)
		{
			if (!isset($_POST[$param]))
			{
				$abort=true;
				trigger_error("Required POST param $param not found", E_USER_NOTICE);
			}
		}
		if ($abort)
			$this->GotoMainPage();
	}
	
	function GotoMainPage()
	{
		header("location: main.php");
		exit;
	}
	
	function LegacyLogin($username, $password)
	{
		global $conn;
		if ($username != ""){

			$result = sqlsrv_query($conn,"SELECT * FROM investigators WHERE investigator = '$username' AND active='yes'");

			$row = sqlsrv_fetch_array( $result );
			$hash= $row['pass'];
			$manager = $row['team_leader'];
			$email = $row['email'];

			if (password_verify($password, $hash))
			{
				$this->CurrentUser = new UserPrincipal($username, $email, $manager);
				$_SESSION['CurrentUser'] = $this->CurrentUser;
				
				$date = date("F j, Y");
				$time = date("g:i a");
				
				$sql = "INSERT INTO logins (user, date, time) VALUES ('$username', '$date', '$time')";
				$result = sqlsrv_query($conn,$sql);
				
				$_SESSION['username'] = $username; // legacy support
				
				return true; 
			}
		}
		return false;
	}
	
	function Logout()
	{
		// Unset all of the session variables.
		$_SESSION = array();

		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}

		// Finally, destroy the session.
		session_destroy();
		
		header("location: index.php");  // Redirecting To Home Page
	}
	
	function encrypt($decrypted, $password, $salt='!aZm*fF9pL3epCm%1') { 
		// Build a 256-bit $key which is a SHA256 hash of $salt and $password.
		$key = hash('SHA256', $salt . $password, true);
		// Build $iv and $iv_base64.  We use a block size of 128 bits (AES compliant) and CBC mode.  (Note: ECB mode is inadequate as IV is not used.)
		srand(); $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
		 if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22) return false;
		// Encrypt $decrypted and an MD5 of $decrypted using $key.  MD5 is fine to use here because it's just to verify successful decryption.
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
		// We're done!
		return $iv_base64 . $encrypted;
	}
	
	function decrypt($encrypted, $password, $salt='!aZm*fF9pL3epCm%1') {
		// Build a 256-bit $key which is a SHA256 hash of $salt and $password.
		$key = hash('SHA256', $salt . $password, true);
		// Retrieve $iv which is the first 22 characters plus ==, base64_decoded.
		$iv = base64_decode(substr($encrypted, 0, 22) . '==');
		// Remove $iv from $encrypted.
		$encrypted = substr($encrypted, 22);
		// Decrypt the data.  rtrim won't corrupt the data because the last 32 characters are the md5 hash; thus any \0 character has to be padding.
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0\4");
		// Retrieve $hash which is the last 32 characters of $decrypted.
		$hash = substr($decrypted, -32);
		// Remove the last 32 characters from $decrypted.
		$decrypted = substr($decrypted, 0, -32);
		// Integrity check.  If this fails, either the data is corrupted, or the password/salt was incorrect.
		if (md5($decrypted) != $hash) return false;
		// Yay!
		return $decrypted;
	}
}

/**
 * This method is used to write data in file
 * @param mixed $logData
 * @param string $fileName
 * @return boolean
 */
function fileLog($logData, $logdir = ERROR_LOG_DIR) { 
	$datedfname = $logdir . '\\' . date('Ymd') . 'error.log';
    $fh = fopen($datedfname, 'a+');
	fwrite($fh, PHP_EOL . "---- " . date(DATE_RFC2822) . " ------------------------------------" . PHP_EOL);
    if (is_array($logData)) {
        $logData = print_r($logData, 1);
    }
    $status = fwrite($fh, $logData);
	fwrite($fh, PHP_EOL);
    fclose($fh);
    return ($status) ? true : false;
}

function errorMailBody($data)
{
	$errortype = $data['error'];
	$description = $data['description'];
	$filename = $data['file'];
	$body = "<p>Dear Support Team,</p>";
	if (isset($data['context']) && is_array($data['context']) && isset($data['context']['_SERVER']))
	{
		$servername = $data['context']['_SERVER']['COMPUTERNAME'];
		$authuser = $data['context']['_SERVER']['AUTH_USER'];
		$appusername = isset($data['context']['Security']) && isset($data['context']['Security']->CurrentUser) ? $data['context']['Security']->CurrentUser->Username : "Not logged in to app";
		$body = $body . "<p>$authuser encoutered an error ($errortype) while accessing page $filename on host $servername</p><p>They were logged into the application as $appusername</p><p>The error was : <b>$description</b></p><p>Please check the log file for more information<p><p>CMS IT System</p>";
	}
	else
	{
		$servername = $_SERVER['COMPUTERNAME'];
		$authuser = $_SERVER['AUTH_USER'];
		$body = $body . "<p>$authuser encoutered an error ($errortype) while accessing page $filename on host $servername</p><p>Capture did not obtain full context information.</p><p>The error was : <b>$description</b></p><p>Please check the log file for more information<p><p>CMS IT System</p>";
	}
	return $body;
}

function GetIncludingFile()
{
    $file = false;
    $backtrace =  debug_backtrace();
    $include_functions = array('include', 'include_once', 'require', 'require_once');
    for ($index = 0; $index < count($backtrace); $index++)
    {
        $function = $backtrace[$index]['function'];
        if (in_array($function, $include_functions))
        {
            $file = $backtrace[$index]['file'];
            break;
        }
    }
    return $file;
}

/**
 * Custom error handler
 * @param integer $code
 * @param string $description
 * @param string $file
 * @param interger $line
 * @param mixed $context
 * @return boolean
 */
function handleError($code, $description, $file = null, $line = null, $context = null) {
	global $E_PageErrorCount;
	
	$E_PageErrorCount = $E_PageErrorCount + 1;
	$displayErrors = ini_get("display_errors");
	$displayErrors = strtolower($displayErrors);
	list($error, $log) = mapErrorCode($code);
	$authuser = $_SERVER['AUTH_USER'];
	if (is_null($file))
	{
		$file = $_SERVER['SCRIPT_FILENAME'];
		$path = GetIncludingFile();
	}
	$backtrace =  debug_backtrace();
	$data = array(
		'level' => $log,
		'code' => $code,
		'error' => $error,
		'description' => $description,
		'user' => $authuser,
		'file' => $file,
		'line' => $line,
		'backtrace' => $backtrace,
		'context' => $context,
		'path' => $file,
		'message' => $error . ' (' . $code . '): ' . $description . ' in [' . $file . ', line ' . $line . ']'
	);
	$status = fileLog($data);
	if ($displayErrors == 1)
		return false;
	if ($E_PageErrorCount > 1)
		return false; // already emailed once for this page
	if ($log == LOG_ERR || $log == LOG_WARNING)
	{
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
		"CC: Philippe.Cochet@theglobalfund.org\r\n" .
		'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		$body = errorMailBody($data);			
		$sentmail = mail('Francisco.Infante@theglobalfund.org', "Help! A User Experienced a Fatal Error", $body , $headers);
		$errormsg = "";
		if ($sentmail)
		{
			$errormsg = "<div style='color:black; width: 500px; margin-left:auto; margin-right:auto; margin-top: 20px; font-size: 20px; border: 2px dashed red; border-radius: 8px; padding: 10px;'><img src='images/warning-icon.png' style='float:left' /><br/>Oops! Something is broken!<br/><br/>Unfortunately I am going to need a human to fix me.  I have logged all the relavent details and notified my support team.  If its urgent you can speed up the fix slightly by contacting OIG IT Support</div>";
		}
		else
		{			
			$errormsg = "<div style='color:black; width: 500px; margin-left:auto; margin-right:auto; margin-top: 20px; font-size: 20px; border: 2px dashed red; border-radius: 8px; padding: 10px;'><img src='images/warning-icon.png' style='float:left' /><br/>Oops! Something is very broken!<br/><br/>Unfortunately I am going to need a human to fix me.  I tried to contact my support team but whatever has gone wrong means that I cannot reach them. Can you please ask OIG IT Support to help?</div>";
		}
		if (headers_sent()) // in middle of existing page
		{
			echo "$errormsg";
			if ($log == LOG_ERR)
			{				
				die("</body></html>"); //error was fatal have to drop out anyway
			}
		}
		else
		{
			die($errormsg);
		}
	}
	return $status;
}

/**
 * Map an error code into an Error word, and log location.
 *
 * @param int $code Error code to map
 * @return array Array of error word, and log location.
 */
function mapErrorCode($code) {
    $error = $log = null;
    switch ($code) {
        case E_PARSE:
        case E_ERROR:
        case E_CORE_ERROR:
        case E_COMPILE_ERROR:
        case E_USER_ERROR:
            $error = 'Fatal Error';
            $log = LOG_ERR;
            break;
        case E_WARNING:
        case E_USER_WARNING:
        case E_COMPILE_WARNING:
        case E_RECOVERABLE_ERROR:
            $error = 'Warning';
            $log = LOG_WARNING;
            break;
        case E_NOTICE:
        case E_USER_NOTICE:
            $error = 'Notice';
            $log = LOG_NOTICE;
            break;
        case E_STRICT:
            $error = 'Strict';
            $log = LOG_NOTICE;
            break;
        case E_DEPRECATED:
        case E_USER_DEPRECATED:
            $error = 'Deprecated';
            $log = LOG_NOTICE;
            break;
        default :
            break;
    }
    return array($error, $log);
}

function check_for_fatal()
{
    $error = error_get_last();
    if ( $error["type"] == E_ERROR )
        handleError( $error["type"], $error["message"], $error["file"], $error["line"] );
}

$E_PageErrorCount = 0;
register_shutdown_function( "check_for_fatal" );
set_error_handler("handleError");
error_reporting(0);

session_start();
$Security = new PageSecurity();

?>