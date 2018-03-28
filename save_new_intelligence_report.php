<?php
require_once("includes\security.php");
$Security->GoSecure();


//$username = $_SESSION['username'];
$username = "Not Allocated";
$date_received = sqlsrv_real_escape_string($date_received = $_POST['date_received_info']);

$reporter = sqlsrv_real_escape_string($reporter = $_POST['reporter']);
$date_report_complete = date('Y-m-d');
$information_source = sqlsrv_real_escape_string($information_source = $_POST['information_source']);
$country = sqlsrv_real_escape_string($country = $_POST['country']);
$entities_interest = sqlsrv_real_escape_string($entities_interest = $_POST['entities_interest']);
$entity_number = "";
$docs = sqlsrv_real_escape_string($docs = $_POST['docs']);
$urgent = sqlsrv_real_escape_string($urgent = $_POST['urgent']);
$further_explanation = sqlsrv_real_escape_string($further_explanation = $_POST['further_explanation']);


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




$title = sqlsrv_real_escape_string($title = $_POST['title']);
$circumstances = sqlsrv_real_escape_string($circumstances = $_POST['circumstances']);
$information_recieved = sqlsrv_real_escape_string($information_recieved = $_POST['information_recieved']);
$comments = sqlsrv_real_escape_string($comments = $_POST['comments']);
$status = "Under Review";

$submitted_to_officer = "No";
$reviewed_by_officer = "No";

$sql = "INSERT INTO intelligence_reports (date_received, reporter, date_report_complete, information_source, country, entities_interest, entity_number, docs, urgent, further_explanation, title, circumstances, information_recieved, comments, checkbox1, checkbox2, checkbox3, checkbox4, checkbox5, checkbox6, checkbox7, checkbox8, checkbox9, checkbox10, member, status, submitted_to_officer, reviewed_by_officer) VALUES ('$date_received', '$reporter', '$date_report_complete', '$information_source', '$country', '$entities_interest', '$entity_number', '$docs', '$urgent', '$further_explanation', '$title', '$circumstances', '$information_recieved', '$comments','$checkbox1','$checkbox2','$checkbox3','$checkbox4','$checkbox5','$checkbox6','$checkbox7','$checkbox8','$checkbox9','$checkbox10' ,'$username', '$status', '$submitted_to_officer', '$reviewed_by_officer')";

$result_sql = sqlsrv_query($conncss,$sql);   //order executes


if($result_sql){
	
	//SEND EMAIL TO IOE TEAM

		
	$subject  = "OIG CSS - Notification - New Intelligence Report - ".$country;
	
	$message  = "<u> Do not reply to this email. This email has been generated automatically </u><br><br>"; 
	$message1  = "A new Intelligence Report has been added in CSS";
	
	$final_message = $message.$message1;
	
	$all_emails = "Francisco.Infante@theglobalfund.org, Kerry.Farnsworth@theglobalfund.org, Melvyn.Young@theglobalfund.org, Katie.Silk@theglobalfund.org, Aalif.Adatia@theglobalfund.org, Aalif.Adatia@theglobalfund.org, Salome.Kvlividze@theglobalfund.org";
	
	$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	mail($all_emails, $subject, $final_message, $headers);

	header("location: main.php?new_intel_report='yes'"); 
	
}else{  



 }
?>
	

