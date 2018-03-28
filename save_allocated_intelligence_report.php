<?php
require_once("includes\security.php");
$Security->GoSecure();

$id_number = $_POST['id_number'];
$team_member = $_POST['team_member'];


$sql = "UPDATE intelligence_reports SET member = '$team_member' WHERE id = '$id_number'";

$result = sqlsrv_query($conncss,$sql);   //order executes

 
if ($result){
	
	//$date_allocated = date('Y-m-d');	
	//$sql33 = "INSERT INTO allocation (allegation_id, team_member, date_allocated) VALUES ('$id_number', '$team_member', '$date_allocated')";
	
	//$result_sql33 = sqlsrv_query($conncss,$sql33) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes
		
	
	//Send email to Member
	
	
	$query  = "SELECT * FROM $cmsdb.investigators WHERE investigator = '$team_member'";
	$result_email = sqlsrv_query($conncss,$query);
	$row_email = sqlsrv_fetch_array($result_email);
	$to_email = $row_email['email'];
	
	$subject = "OIG CSS - Notification of new Intelligence Report allocated to you";
	$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
	$message00 = 'Dear Team member of CSS, <br><br>';
	$message000 = 'Please note that Intelligence Report number ';
	
	$message0000 = ' has been allocated to you for assessment. <br><br>';
	
	
	$message = $message0.$message00.$message000.$id_number.$message0000;
	
	$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	mail($to_email, $subject, $message, $headers);

	header("location: main.php?allocatedir='yes'");

}else{
trigger_error("SQL query Failed", E_USER_ERROR);
}

?>