<?php
ini_set('SMTP','localhost' ); 
ini_set('sendmail_from', 'notifications.inspectorgeneral@gmail.com');

function mail_individual($target, $subject, $body)
{
	global $conn;
	$position = strpos($target, "@");
	if ($position === false)
	{
		//not an email address, lookup who it is
		$query_email  = sqlsrv_query($conn,"SELECT email FROM investigators WHERE investigator = '$target'");
		$row_email = sqlsrv_fetch_array($query_email);
		$mail_target = $row_email['email'];
	}
	else
	{
		$mail_target = $target;
	}
	
	$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'BCC: Francisco.Infante@theglobalfund.org'. "\r\n" .
				'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
				
	mail($mail_target, $subject, $body, $headers);
}

function mail_manager($target, $subject, $body)
{
	global $conn;

		//not an email address, lookup who it is
		$query_email  = sqlsrv_query($conn,"SELECT email, team_leader FROM investigators WHERE investigator = '$target'");
		$row_email = sqlsrv_fetch_array($query_email);
		$team_lead = $row_email['team_leader'];
		$mail_cc = $row_email['email'];

		$result_manager_email = sqlsrv_query($conn,"SELECT * FROM investigators WHERE investigator = '$team_lead'"); 
		$row_manager = sqlsrv_fetch_array( $result_manager_email );
		$mail_target = $row_manager['email'];
	
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					"CC: ". $mail_cc.  "\r\n" .
					'BCC: Francisco.Infante@theglobalfund.org'. "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

	mail($mail_target, $subject, $body, $headers);
}

function mail_doi($target, $subject, $body)
{
	global $conn;

	$email_doi = "Katie.hodson@theglobalfund.org";

	$query_email  = sqlsrv_query($conn,"SELECT email, team_leader FROM investigators WHERE investigator = '$target'");
	$row_email = sqlsrv_fetch_array($query_email);
	$team_lead = $row_email['team_leader'];
	$mail_cc = $row_email['email'];

	$result_manager_email = sqlsrv_query($conn,"SELECT * FROM investigators WHERE investigator = '$team_lead'"); 
	$row_manager = sqlsrv_fetch_array( $result_manager_email );
	$mail_manager = $row_manager['email'];

	$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				"CC: ". $mail_cc. ", " . $mail_manager .  "\r\n" .
				'BCC: Francisco.Infante@theglobalfund.org'. "\r\n" .
				'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

	mail($email_doi, $subject, $body, $headers);
}


?>