<?php
require_once("includes\security.php");
$Security->GoSecure();

session_start();
$id = $_SESSION['report_id'];
if (isset($_POST['save_draft'])){

		if ( isset ($_POST['checkbox1'])) {
			$checkbox1 = $_POST['checkbox1'];
			$checkbox1 = "checked"; 
		}else{
			$checkbox1 = "";
		}
		
		if ( isset ($_POST['checkbox2'])) {
			$checkbox2 = $_POST['checkbox2'];
			$checkbox2 = "checked"; 
		}else{
			$checkbox2 = "";
		}
		
		if ( isset ($_POST['checkbox3'])) {
			$checkbox3 = $_POST['checkbox3'];
			$checkbox3 = "checked"; 
		}else{
			$checkbox3 = "";
		}
		
		if ( isset ($_POST['checkbox4'])) {
			$checkbox4 = $_POST['checkbox4'];
			$checkbox4 = "checked"; 
		}else{
			$checkbox4 = "";
		}
		
		if ( isset ($_POST['checkbox5'])) {
			$checkbox5 = $_POST['checkbox5'];
			$checkbox5 = "checked"; 
		}else{
			$checkbox5 = "";
		}
		if ( isset ($_POST['checkbox6'])) {
			$checkbox6 = $_POST['checkbox6'];
			$checkbox6 = "checked"; 
		}else{
			$checkbox6 = "";
		}
		
		if ( isset ($_POST['checkbox7'])) {
			$checkbox7 = $_POST['checkbox7'];
			$checkbox7 = "checked"; 
		}else{
			$checkbox7 = "";
		}
		if ( isset ($_POST['checkbox8'])) {
			$checkbox8 = $_POST['checkbox8'];
			$checkbox8 = "checked"; 
		}else{
			$checkbox8 = "";
		}
		if ( isset ($_POST['checkbox9'])) {
			$checkbox9 = $_POST['checkbox9'];
			$checkbox9 = "checked"; 
		}else{
			$checkbox9 = "";
		}
		if ( isset ($_POST['checkbox10'])) {
			$checkbox10 = $_POST['checkbox10'];
			$checkbox10 = "checked"; 
		}else{
			$checkbox10 = "";
		}
		$ioe_comments = sqlsrv_real_escape_string($ioe_comments = $_POST['ioe_comments']);


		$sql = "UPDATE intelligence_reports SET checkbox1 = '$checkbox1', checkbox2 = '$checkbox2', checkbox3 = '$checkbox3', checkbox4 = '$checkbox4', checkbox5 = '$checkbox5', checkbox6 = '$checkbox6', checkbox7 = '$checkbox7', checkbox8 = '$checkbox8', checkbox9 = '$checkbox9', checkbox10 = '$checkbox10', ioe_comments = '$ioe_comments' WHERE id = '$id'";

$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes

if($result_sql){
	
	header("location: intelligence_report_details.php?saved='yes'"); 
	
}else{  

trigger_error("SQL query Failed", E_USER_ERROR);

 }}

//  IF THE MEMBER SUBMITS THE REPORT TO OFFICER

if (isset($_POST['submit_draft'])){

		if ( isset ($_POST['checkbox1'])) {
			$checkbox1 = $_POST['checkbox1'];
			$checkbox1 = "checked"; 
		}else{
			$checkbox1 = "";
		}
		
		if ( isset ($_POST['checkbox2'])) {
			$checkbox2 = $_POST['checkbox2'];
			$checkbox2 = "checked"; 
		}else{
			$checkbox2 = "";
		}
		
		if ( isset ($_POST['checkbox3'])) {
			$checkbox3 = $_POST['checkbox3'];
			$checkbox3 = "checked"; 
		}else{
			$checkbox3 = "";
		}
		
		if ( isset ($_POST['checkbox4'])) {
			$checkbox4 = $_POST['checkbox4'];
			$checkbox4 = "checked"; 
		}else{
			$checkbox4 = "";
		}
		
		if ( isset ($_POST['checkbox5'])) {
			$checkbox5 = $_POST['checkbox5'];
			$checkbox5 = "checked"; 
		}else{
			$checkbox5 = "";
		}
		if ( isset ($_POST['checkbox6'])) {
			$checkbox6 = $_POST['checkbox6'];
			$checkbox6 = "checked"; 
		}else{
			$checkbox6 = "";
		}
		
		if ( isset ($_POST['checkbox7'])) {
			$checkbox7 = $_POST['checkbox7'];
			$checkbox7 = "checked"; 
		}else{
			$checkbox7 = "";
		}
		if ( isset ($_POST['checkbox8'])) {
			$checkbox8 = $_POST['checkbox8'];
			$checkbox8 = "checked"; 
		}else{
			$checkbox8 = "";
		}
		if ( isset ($_POST['checkbox9'])) {
			$checkbox9 = $_POST['checkbox9'];
			$checkbox9 = "checked"; 
		}else{
			$checkbox9 = "";
		}
		if ( isset ($_POST['checkbox10'])) {
			$checkbox10 = $_POST['checkbox10'];
			$checkbox10 = "checked"; 
		}else{
			$checkbox10 = "";
		}
		$ioe_comments = sqlsrv_real_escape_string($ioe_comments = $_POST['ioe_comments']);

		$submitted_to_officer = "Yes";
		$submitted_date = date('Y-m-d');


		$sql = "UPDATE intelligence_reports SET checkbox1 = '$checkbox1', checkbox2 = '$checkbox2', checkbox3 = '$checkbox3', checkbox4 = '$checkbox4', checkbox5 = '$checkbox5', checkbox6 = '$checkbox6', checkbox7 = '$checkbox7', checkbox8 = '$checkbox8', checkbox9 = '$checkbox9', checkbox10 = '$checkbox10', ioe_comments = '$ioe_comments', submitted_to_officer = '$submitted_to_officer', submitted_date_officer = '$submitted_date' WHERE id = '$id'";

$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes

if($result_sql){
	
		//Get Name Officer Officer
		
		$query_get_officer = sqlsrv_query($conncss,"SELECT * FROM $cmsdb.screening_officer"); 
		$row_name = sqlsrv_fetch_array( $query_get_officer );
		$name_officer = $row_name['name'];
		
	
		//Send email to Officer
		
		$query  = "SELECT * FROM $cmsdb.investigators WHERE investigator = '$name_officer'";
		$result_email = sqlsrv_query($conncss,$query);
		$row_email = sqlsrv_fetch_array($result_email);
		$to_email = $row_email['email'];
		
		$subject = "OIG CSS - Notification of Intelligence Report submitted for your review";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening Officer of CSS, <br><br>';
		$message000 = 'Please note that the Intelligence Report number IR';
		
		$message0000 = ' has been submitted to you for your review.<br><br>';
		
		
		$message = $message0.$message00.$message000.$id.$message0000;
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
	
	
	
	header("location: intelligence_report_details.php?sent_for_review='yes'"); 
	
}else{  

trigger_error("SQL query Failed", E_USER_ERROR);

 }}
 
 
//  IF THE 	officer approves the report

if (isset($_POST['approve_draft'])){

		if ( isset ($_POST['checkbox1'])) {
			$checkbox1 = $_POST['checkbox1'];
			$checkbox1 = "checked"; 
		}else{
			$checkbox1 = "";
		}
		
		if ( isset ($_POST['checkbox2'])) {
			$checkbox2 = $_POST['checkbox2'];
			$checkbox2 = "checked"; 
		}else{
			$checkbox2 = "";
		}
		
		if ( isset ($_POST['checkbox3'])) {
			$checkbox3 = $_POST['checkbox3'];
			$checkbox3 = "checked"; 
		}else{
			$checkbox3 = "";
		}
		
		if ( isset ($_POST['checkbox4'])) {
			$checkbox4 = $_POST['checkbox4'];
			$checkbox4 = "checked"; 
		}else{
			$checkbox4 = "";
		}
		
		if ( isset ($_POST['checkbox5'])) {
			$checkbox5 = $_POST['checkbox5'];
			$checkbox5 = "checked"; 
		}else{
			$checkbox5 = "";
		}
		if ( isset ($_POST['checkbox6'])) {
			$checkbox6 = $_POST['checkbox6'];
			$checkbox6 = "checked"; 
		}else{
			$checkbox6 = "";
		}
		
		if ( isset ($_POST['checkbox7'])) {
			$checkbox7 = $_POST['checkbox7'];
			$checkbox7 = "checked"; 
		}else{
			$checkbox7 = "";
		}
		if ( isset ($_POST['checkbox8'])) {
			$checkbox8 = $_POST['checkbox8'];
			$checkbox8 = "checked"; 
		}else{
			$checkbox8 = "";
		}
		if ( isset ($_POST['checkbox9'])) {
			$checkbox9 = $_POST['checkbox9'];
			$checkbox9 = "checked"; 
		}else{
			$checkbox9 = "";
		}
		if ( isset ($_POST['checkbox10'])) {
			$checkbox10 = $_POST['checkbox10'];
			$checkbox10 = "checked"; 
		}else{
			$checkbox10 = "";
		}
		$ioe_comments = sqlsrv_real_escape_string($ioe_comments = $_POST['ioe_comments']);

		$reviewed_by_officer = "Yes";
		$reviewed_date = date('Y-m-d');
		$status = "Finalised";
		
		$result_screening_officer = sqlsrv_query($conn,"SELECT * FROM $cmsdb.screening_officer"); 
		$row_officer = sqlsrv_fetch_array($result_screening_officer);
		$officer = $row_officer['name'];

		$sql = "UPDATE intelligence_reports SET checkbox1 = '$checkbox1', checkbox2 = '$checkbox2', checkbox3 = '$checkbox3', checkbox4 = '$checkbox4', checkbox5 = '$checkbox5', checkbox6 = '$checkbox6', checkbox7 = '$checkbox7', checkbox8 = '$checkbox8', checkbox9 = '$checkbox9', checkbox10 = '$checkbox10', ioe_comments = '$ioe_comments', status = '$status', reviewed_by_officer = '$reviewed_by_officer', reviewed_by_officer_date = '$reviewed_date', approved_by = '$officer' WHERE id = '$id'";

$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes

if($result_sql){
	
		//Get Name Of Member in charge
		
		$query_get_member = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE id = '$id'"); 
		$row_name = sqlsrv_fetch_array( $query_get_member );
		$team_member = $row_name['member'];
		
	
		//Send email sent to member when the report has been approved by the officer
		
		$query  = "SELECT * FROM $cmsdb.investigators WHERE investigator = '$team_member'";
		$result_email = sqlsrv_query($conncss,$query);
		$row_email = sqlsrv_fetch_array($result_email);
		$to_email = $row_email['email'];
		
		$subject = "OIG CSS - Notification of Intelligence Report you have submitted for review";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening Member of CSS, <br><br>';
		$message000 = 'Please note that the Screening Officer has reviewed and approved your Intelligence Report number IR';
		
		$message = $message0.$message00.$message000.$id;
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
		
			
		
		//Send email sent to administrator when the report has been approved by the DOI
		
		$to_email = "Francisco.Infante@theglobalfund.org";
		
		$subject = "OIG CSS - Notification of Intelligence Report";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening administrator of CSS, <br><br>';
		$message000 = 'Please note that the Screening Officer has reviewed and approved the Intelligence Report number IR';
		$message = $message0.$message00.$message000.$id;
		
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
	
	
	header("location: intelligence_report_details.php?approved='yes'"); 
	
}else{  

trigger_error("SQL query Failed", E_USER_ERROR);

 }} 
 
 
 
//IF OFFICER RETURNS REPORT 
 
if (isset($_POST['return_draft'])){
	$submitted_to_officer = "No";
	$submitted_date_officer  = "";
	
	$sql = "UPDATE intelligence_reports SET submitted_to_officer = '$submitted_to_officer', submitted_date_officer = '$submitted_date_officer' WHERE id = '$id'";

$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes

if($result_sql){
	
		//Get Name Of Member in charge
		
		$query_get_member = sqlsrv_query($conncss,"SELECT * FROM intelligence_report WHERE id = '$id'"); 
		$row_name = sqlsrv_fetch_array( $query_get_member );
		$team_member = $row_name['member'];
		
	
		//Send email sent to member when the report has been approved by the officer
		
		$query  = "SELECT * FROM $cmsdb.investigators WHERE investigator = '$team_member'";
		$result_email = sqlsrv_query($conncss,$query);
		$row_email = sqlsrv_fetch_array($result_email);
		$to_email = $row_email['email'];
		
		$subject = "OIG CSS - Notification of Intelligence Report you have submitted for review";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening Member of CSS, <br><br>';
		$message000 = 'Please note that the Screening Officer has returned the Intelligence Report number IR';
		
		$message = $message0.$message00.$message000.$id;
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
		
			
		
		//Send email sent to administrator when the report has been approved by the DOI
		
		$to_email = "Francisco.Infante@theglobalfund.org";
		$subject = "OIG CSS - Notification of returned of Intelligence Report";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening administrator of CSS, <br><br>';
		$message000 = 'Please note that the Screening Officer has returned the Intelligence Report number IR';
		$message = $message0.$message00.$message000.$id;
		
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
	
	
	header("location: intelligence_report_details.php?return='yes'"); 
	
}else{  

trigger_error("SQL query Failed", E_USER_ERROR);

 }	
	
}
 
 
 
?>
	

