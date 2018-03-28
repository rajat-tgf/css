<?php

date_default_timezone_set("Europe/Madrid");

require_once("includes\security.php");
 
    if ( isset ($_POST['username'])) {

		$username_chosen = $_POST['username'];
		$password_enter = $_POST['password'];
	
		if ($username_chosen != ""){
			if ($Security->LegacyLogin($username_chosen, $password_enter))
			{
				$url = $Security->GetFirstPage();
				header("location: $url"); 			
			}else{	
				header("location: index.php?invalid='no'"); 
			}
		}else{
		
			header("location: index.php?invalid='no'");
		
		}
	}


// CHECK NOTIFICATION FOR FOLLOW UPS
$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE status = 'In Progress' OR status = 'Partially implemented / In Progress'");
 while ($row_follow_ups = sqlsrv_fetch_array($result_follow_ups)){
	$date_follow_up = $row_follow_ups['date_follow_up'];
	$email_notification = $row_follow_ups['email_notification'];
	$status = $row_follow_ups['status'];
	$follow_up_id = $row_follow_ups['id'];
	$member = $row_follow_ups['member'];
	
	$date1 = date('Y-m-d');
	$day_before = date( 'Y-m-d', strtotime( $date_follow_up . ' -1 day' ) );
	
	if ($date1 == $day_before || $date1 == $date_follow_up  ){
		if ( $email_notification == "no" ){
			
			
		//Send email to member
		
		$query  = "SELECT * FROM investigators WHERE investigator = '$member'";
		$result_email = sqlsrv_query($conn,$query);
		$row_email = sqlsrv_fetch_array($result_email);
		$to_email = $row_email['email'];

	
		$allegation_id = $row_follow_ups['allegation_id'];
		$subject1 = "OIG CSS - Notification of Follow Up - Allegation ";
		$subject = $subject1.$allegation_id;
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Member, <br><br>';
		$message000 = 'Please note that on ';
		$message0000 = ' there is a follow up to check for the above mentioned allegation'; 

		$newDateformat = date("F j, Y", strtotime($date_follow_up));

		$message = $message0.$message00.$message000.$newDateformat.$message0000;

		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
        		    'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
		            'MIME-Version: 1.0' . "\r\n" .
        		    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		            'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
		
		$sql = "UPDATE follow_ups SET email_notification = 'yes' WHERE id = '$follow_up_id'";
		$result_123 = sqlsrv_query($conncss,$sql);
	}}
}




// CHECK NOTIFICATION FOR FOLLOW UPS IR
$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups_ir WHERE status = 'In Progress' OR status = 'Partially implemented / In Progress'");
 while ($row_follow_ups = sqlsrv_fetch_array($result_follow_ups)){
	$date_follow_up = $row_follow_ups['date_follow_up'];
	$email_notification = $row_follow_ups['email_notification'];
	$status = $row_follow_ups['status'];
	$follow_up_id = $row_follow_ups['id'];
	$member = $row_follow_ups['member'];
	
	$date1 = date('Y-m-d');
	$day_before = date( 'Y-m-d', strtotime( $date_follow_up . ' -1 day' ) );
	
	if ($date1 == $day_before || $date1 == $date_follow_up  ){
		if ( $email_notification == "no" ){
			
			
		//Send email to member
		
		$query  = "SELECT * FROM investigators WHERE investigator = '$member'";
		$result_email = sqlsrv_query($conn,$query);
		$row_email = sqlsrv_fetch_array($result_email);
		$to_email = $row_email['email'];

	
		$allegation_id = $row_follow_ups['allegation_id'];
		$subject1 = "OIG CSS - Notification of Follow Up - Intelligence Report ";
		$subject = $subject1.$allegation_id;
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Member, <br><br>';
		$message000 = 'Please note that on ';
		$message0000 = ' there is a follow up to check for the above mentioned Intelligence Report'; 

		$newDateformat = date("F j, Y", strtotime($date_follow_up));

		$message = $message0.$message00.$message000.$newDateformat.$message0000;

		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
        		    'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
		            'MIME-Version: 1.0' . "\r\n" .
        		    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		            'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
		
		$sql = "UPDATE follow_ups SET email_notification = 'yes' WHERE id = '$follow_up_id'";
		$result_123 = sqlsrv_query($conncss,$sql);
	}}
}


if(preg_match('/MSIE/i',$_SERVER['HTTP_USER_AGENT'])){
   die('Your browser is not allowed');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>OIG</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<script>
    $(function() {
	$( "input[type=submit], button" )
	.button()
	});
</script> 

<?php
if ( isset ($_GET['invalid'])) {
	echo "<script>alert('The password you have entered is incorrect')</script>";
}
?>


<fieldset style="width:334px; margin:auto;">
	<form name="validation" method="post" action="index.php">
<div id="entities-contain1">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
		<tr>
			<td colspan="3" align="right"><img src='images/Password-Field-icon.png' alt='' width='35' height='30'/></td>
		</tr>
        <tr>
			<td><strong>Username</strong></td>
			<td><strong>:</strong></td>
			<td><select name="username" id="username" class="text ui-widget-content ui-corner-all">
            <option></option>
            <?php
			$result_officer = sqlsrv_query($conn,"SELECT * FROM screening_officer ORDER BY name"); 
			while($row_screening_officer = sqlsrv_fetch_array($result_officer)){
				$screening_officer = $row_screening_officer['name'];
				echo "<option>$screening_officer</option>";
			}
			$result_members = sqlsrv_query($conn,"SELECT * FROM screening_member ORDER BY name"); 
			while($row_member = sqlsrv_fetch_array($result_members)){
				$member = $row_member['name'];
				echo "<option>$member</option>";
			}
			?>
		  </select></td>
		</tr>
		<tr>
		  <td width="78"><strong>Password</strong></td>
		  <td width="6"><strong>:</strong></td>
		  <td width="294">
		    <input name="password" type="password" id="password" autocomplete="Off" size="20" maxlength="20" class="text ui-widget-content ui-corner-all"/></td>
		  </tr>
		
		<tr>
			<td align="center">&nbsp;</td>
		  <td align="center">&nbsp;</td>
			<td align="center"><input type="submit" name="Submit" value="Login"></td>
			</tr>
		</table>
</div>
  </form>
</fieldset>



