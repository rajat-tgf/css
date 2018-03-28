<?php
require_once("includes\security.php");
$Security->GoSecure();
require_once("includes\\email.php");

$username = $_SESSION['username'];
$allegation_id = $_SESSION['id'];

$result_member_allegation = sqlsrv_query($conncss,"SELECT team_member FROM allegation_details WHERE id = '$allegation_id'"); 
$row_member_allegation = sqlsrv_fetch_array( $result_member_allegation );
$team_member = $row_member_allegation['team_member'];


$comment = sqlsrv_real_escape_string($comment = $_POST['comment']);

$request_notification = "";
$read_notification = "no";

if (isset($_POST['notify'])) {
	$notify = $_POST['notify'];
	$request_notification = "yes";
}


if ( $username == $team_member ){
	$result_officer = sqlsrv_query($conncss,"SELECT * FROM $cmsdb.screening_officer ORDER BY name"); 
	$row_screening_officer = sqlsrv_fetch_array($result_officer);
	$team_member = $row_screening_officer['name'];
}


$date_comments = date("Y-m-d");

	$sql = "INSERT INTO comments ( allegation_id, author, member, date_comment, comment, request_notification, read_notification ) VALUES ( '$allegation_id', '$username', '$team_member', '$date_comments', '$comment', '$request_notification', '$read_notification' )";
	$result = sqlsrv_query($conncss,$sql);  //order executes
	
if (!$result){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{

if ( $request_notification == "yes" ){
	
	$result_country = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$allegation_id'");
	$row_country = sqlsrv_fetch_array( $result_country );
	$country = $row_country['country'];
	
	//$queryis_sceening_officer = "SELECT name FROM $cmsdb.screening_officer WHERE name = '$username'", array(), array("Scrollable" => 'buffered');
	
	
	$queryis_sceening_officer = "SELECT count(name) FROM $cmsdb.screening_officer WHERE name = '$username'";
	$result_officer = sqlsrv_query($conncss, $queryis_sceening_officer);
	$officecount = sqlsrv_fetch_single($result_officer);
		
	$itisofficer = ($officecount > 0);
		
		if(!$itisofficer){

		
			//SEND NOTIFICATION EMAIL TO OFFICER
					
			
			$query_find_email_username = sqlsrv_query($conncss,"SELECT email FROM $cmsdb.investigators WHERE investigator = '$username'");
			$row_email_username = sqlsrv_fetch_array($query_find_email_username);
			$email_user = $row_email_username['email'];

			$result_sceening_officer = sqlsrv_query($conncss,"SELECT name FROM $cmsdb.screening_officer"); 
			$row_sceening_officer = sqlsrv_fetch_array( $result_sceening_officer );
			$name_sceening_officer = $row_sceening_officer['name'];
			
			$query_sceening_officer_emails = sqlsrv_query($conncss,"SELECT email FROM $cmsdb.investigators WHERE investigator = '$name_sceening_officer'");
			$row_email_sceening_officer = sqlsrv_fetch_array($query_sceening_officer_emails);
			$email_sceening_officer = $row_email_sceening_officer['email'];
			
			$subject  = "OIG CSS - Notification - Allegation " . $allegation_id . " - " . $country;
			
			$message  = "<u> Do not reply to this email. This email has been generated automatically </u><br><br>"; 
			$message1  = "A new comment in relation to allegation " . $allegation_id . " - " . $country . " has been added for your attention.";
			
			$final_message = $message.$message1;
			
			$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
						'CC:'. $email_user . "\r\n" .
						'BCC: Francisco.Infante@theglobalfund.org'. "\r\n" .
						'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
						'MIME-Version: 1.0' . "\r\n" .
						'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			mail($email_sceening_officer, $subject, $final_message, $headers);
			
	}else{

		//SEND NOTIFICATION EMAIL TO MEMBER

			
			$query_find_emails = sqlsrv_query($conncss,"SELECT email FROM $cmsdb.investigators WHERE investigator = '$username'");
			$row_emails = sqlsrv_fetch_array($query_find_emails);
			$email_screening_officer = $row_emails['email'];
			
			
			$result_member_allegation = sqlsrv_query($conncss,"SELECT team_member FROM allegation_details WHERE id = '$allegation_id'"); 
			$row_member_allegation = sqlsrv_fetch_array( $result_member_allegation );
			$team_member = $row_member_allegation['team_member'];
			
		
			$query_member_email = sqlsrv_query($conncss,"SELECT email FROM $cmsdb.investigators WHERE investigator = '$team_member'");
			$row_member_email = sqlsrv_fetch_array($query_member_email);
			$email_member = $row_member_email['email'];
		
			$subject  = "OIG CSS - Notification - Allegation " . $allegation_id . " - " . $country;
			
			$message  = "<u> Do not reply to this email. This email has been generated automatically </u><br><br>"; 
			$message1  = "A new comment in relation to allegation " . $allegation_id . " - " . $country . " has been added for your attention.";
			
			$final_message = $message.$message1;
			
			$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
						'CC:'. $email_screening_officer . "\r\n" .
						'BCC: Francisco.Infante@theglobalfund.org'. "\r\n" .
						'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
						'MIME-Version: 1.0' . "\r\n" .
						'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			mail($email_member, $subject, $final_message, $headers);
	}
		

}
	header("location: allegation_details.php?new_comments='yes'");
}



	

?>
