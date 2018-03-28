<?php
require_once("includes\\opendb.php");


$status = "Screening Review";
$type_allegation = sqlsrv_real_escape_string($priority = $_POST['type_allegation']);
$priority = sqlsrv_real_escape_string($priority = $_POST['priority']);
$country = sqlsrv_real_escape_string($country = $_POST['country']);
$summary = sqlsrv_real_escape_string($summary = $_POST['summary']);
$date_received = $_POST['date_received'];
$referred_from = $_POST['referred_from'];

$received_via = sqlsrv_real_escape_string($received_via = $_POST['received_via']);
$complainant_entity_profile_id = $_POST['profile_id_to_link'];
$source_category = $_POST['source_category'];
$source_subcategory = $_POST['source_subcategory'];
$disease_area = $_POST['disease_area'];

$complaint_acknowledged_date = $_POST['date2'];
$submitted_date_officer = "";
$reviewed_by_officer_date = "";
$complainant_updated = "";

$updated_via = "";

$team_member = "Not Allocated";
$screening_analyst = "Not Allocated";


$sql = "INSERT INTO allegation_details (status, type_allegation, priority, team_member, country, complainant, summary, date_received, received_via, referred_from, disease_area, source_category , source_subcategory, complaint_acknowledged_date, submitted_date_officer, reviewed_by_officer_date, complainant_updated, updated_via)  VALUES ('$status', '$type_allegation', '$priority', '$team_member', '$country', '$complainant_entity_profile_id', '$summary', '$date_received', '$received_via',  '$referred_from','$disease_area', '$source_category', '$source_subcategory', '$complaint_acknowledged_date', '$submitted_date_officer', '$reviewed_by_officer_date', '$complainant_updated', '$updated_via')";
$result = sqlsrv_query($conncss,$sql);   //order executes

 
if (!$result){
	trigger_error("SQL query Failed", E_USER_ERROR);
}else{

	$sql1 = "INSERT INTO comments_manager (comment)  VALUES ('')";
	$result1 = sqlsrv_query($conncss,$sql1) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes
	
	
	//Send email to Admin
	$to_email = "Francisco.Infante@theglobalfund.org, Kerry.Farnsworth@theglobalfund.org, Melvyn.Young@theglobalfund.org, Katie.Silk@theglobalfund.org, Aalif.Adatia@theglobalfund.org";
	
	$subject10 = "OIG CSS - Notification of new allegation categorized as ";
	$subject11 = " priority has been added to CSS and it is pending for review";
	
	$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
	$message00 = 'Dear member of CSS, <br><br>';
	$message000 = 'OIG has received a new allegation. This allegation has been added in CSS for review and has been categorized as ';
	$message0000 = ' priority. <br><br>';

	$subject = $subject10.$priority.$subject11;
	
	$message = $message0.$message00.$message000.$priority.$message0000;
	
	$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
				mail($to_email, $subject, $message, $headers);
				
	header("location: main.php?new_allegation_saved='yes'");
				
		
}
?>
