<?php
date_default_timezone_set("Europe/Madrid");

require_once("includes\\opendb.php");
require_once("includes\\email.php");


session_start();
$username = $_SESSION['username'];
$allegation_id = $_SESSION['id'];
$comment= sqlsrv_real_escape_string($comment_reject = $_POST['comment_reject']);


$result_member_allegation = sqlsrv_query($conncss,"SELECT team_member FROM allegation_details WHERE id = '$allegation_id'"); 
$row_member_allegation = sqlsrv_fetch_array( $result_member_allegation );
$team_member = $row_member_allegation['team_member'];
$request_notification = "";
$read_notification = "no";


$addtext = "<br /> (Comments made when the Report was returned)";
$comment = $comment.$addtext;

$date_comments = date("Y-m-d");


$sql = "INSERT INTO comments ( allegation_id, author, member, date_comment, comment, request_notification, read_notification ) VALUES ( '$allegation_id', '$username', '$team_member', '$date_comments', '$comment', '$request_notification', '$read_notification' )";
	$result = sqlsrv_query($conncss,$sql);  //order executes
	
	
	$submitted_to_officer = "";
	$submitted_date_officer  = "";
	

$sql_rej = "INSERT INTO returns ( allegation_id, member, date_returned ) VALUES ( '$allegation_id', '$team_member', '$date_comments' )";
$result_rej = sqlsrv_query($conncss,$sql_rej);  //order rejection	
	
	
$sql1 = "UPDATE allegation_details SET submitted_to_officer = '$submitted_to_officer', submitted_date_officer = '$submitted_date_officer' WHERE id = '$allegation_id'";
$result1 = sqlsrv_query($conncss,$sql1);  //order executes


	//Get Name Of Member in charge
	
	$query_get_member = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$allegation_id'"); 
	$row_name = sqlsrv_fetch_array( $query_get_member );
	$team_member = $row_name['team_member'];
	

	//Send email sent to member
	
	$query  = "SELECT * FROM $cmsdb.investigators WHERE investigator = '$team_member'";
	$result_email = sqlsrv_query($conncss,$query);
	$row_email = sqlsrv_fetch_array($result_email);
	$to_email = $row_email['email'];
	
	$subject = "OIG CSS - Notification of Screening Report you have submitted for review";
	$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
	$message00 = 'Dear Screening Member of CSS, <br><br>';
	$message000 = 'Please note that the Screening Officer has made some comments about your Screening Report for allegation number ';
	
	
	
	$message = $message0.$message00.$message000.$allegation_id;
	
	$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	mail($to_email, $subject, $message, $headers);

?>
