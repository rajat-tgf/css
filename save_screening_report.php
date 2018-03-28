<?php
require_once("includes\security.php");
$Security->GoSecure();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php

$username = $_SESSION['username'];

if (isset($_POST['save_draft'])){
    
		$id_number = $_GET['id_number'];
		$priority = $_POST['priority'];
		$country = sqlsrv_real_escape_string($country = $_POST['country']);
		$summary = sqlsrv_real_escape_string($summary = $_POST['summary']);
		$received_via = sqlsrv_real_escape_string($received_via = $_POST['received_via']);
		$referred_from = sqlsrv_real_escape_string($referred_from = $_POST['referred_from']);
		$category_type = sqlsrv_real_escape_string($category_type = $_POST['category_type']);
		$sub_category_type = sqlsrv_real_escape_string($sub_category_type = $_POST['sub_category_type']);
		
		$source_evaluation = sqlsrv_real_escape_string($source_evaluation = $_POST['source_evaluation']);
		$intel_evaluation = sqlsrv_real_escape_string($intel_evaluation = $_POST['intel_evaluation']);
		
		$porfolio_category = sqlsrv_real_escape_string($porfolio_category = $_POST['porfolio_category']);
		$coe = sqlsrv_real_escape_string($coe = $_POST['coe']);
		
		
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
		
		if ( isset ($_POST['checkbox11'])) {
			$checkbox11 = $_POST['checkbox11'];
			$checkbox11 = "checked"; 
		}else{
			$checkbox11 = "";
		}
		
		if ( isset ($_POST['checkbox12'])) {
			$checkbox12 = $_POST['checkbox12'];
			$checkbox12 = "checked"; 
		}else{
			$checkbox12 = "";
		}
		
		if ( isset ($_POST['checkbox13'])) {
			$checkbox13 = $_POST['checkbox13'];
			$checkbox13 = "checked"; 
		}else{
			$checkbox13 = "";
		}
		
		if ( isset ($_POST['checkbox14'])) {
			$checkbox14 = $_POST['checkbox14'];
			$checkbox14 = "checked"; 
		}else{
			$checkbox14 = "";
		}
		
		if ( isset ($_POST['checkbox15'])) {
			$checkbox15 = $_POST['checkbox15'];
			$checkbox15 = "checked"; 
		}else{
			$checkbox15 = "";
		}
		
		if ( isset ($_POST['checkbox16'])) {
			$checkbox16 = $_POST['checkbox16'];
			$checkbox16 = "checked"; 
		}else{
			$checkbox16 = "";
		}
		
		if ( isset ($_POST['checkbox17'])) {
			$checkbox17 = $_POST['checkbox17'];
			$checkbox17 = "checked"; 
		}else{
			$checkbox17 = "";
		}
		
		if ( isset ($_POST['checkbox18'])) {
			$checkbox18 = $_POST['checkbox18'];
			$checkbox18 = "checked"; 
		}else{
			$checkbox18 = "";
		}
		
		if ( isset ($_POST['checkbox19'])) {
			$checkbox19 = $_POST['checkbox19'];
			$checkbox19 = "checked"; 
		}else{
			$checkbox19 = "";
		}
		
		if ( isset ($_POST['checkbox20'])) {
			$checkbox20 = $_POST['checkbox20'];
			$checkbox20 = "checked"; 
		}else{
			$checkbox20 = "";
		}
		
		if ( isset ($_POST['checkbox21'])) {
			$checkbox21 = $_POST['checkbox21'];
			$checkbox21 = "checked"; 
		}else{
			$checkbox21 = "";
		}
		
		
		
		$disease_area = sqlsrv_real_escape_string($disease_area = $_POST['disease_area']);
		$wrongdoing_level1 = $_POST['wrongdoing1'];
		$wrongdoing_level2 = $_POST['wrongdoing2'];
		$source_category = $_POST['source_category'];
		$source_subcategory = $_POST['source_subcategory'];
		
		if ( isset ($_POST['allegations'])) {
			$allegations = sqlsrv_real_escape_string($allegations = $_POST['allegations']); 
		}else{
			$allegations = "";
		}
		
		if ( isset ($_POST['case_summary'])) {
			$case_summary = sqlsrv_real_escape_string($case_summary = $_POST['case_summary']); 
		}else{
			$case_summary = "";
		}
		
		
		if ( isset ($_POST['allegations_oig_mandate'])) {
			$allegations_oig_mandate = $_POST['allegations_oig_mandate'];
		}else{
			$allegations_oig_mandate = "";
		}	
			
		$previous_allegations = $_POST['previous_allegations'];
		$allegation_related = $_POST['allegation_related'];
	
		
		$grant_number = sqlsrv_real_escape_string($_POST['grant_number']);
		$comments = sqlsrv_real_escape_string($_POST['comments']);
		
		
		
		
		$resolution = sqlsrv_real_escape_string($_POST['resolution']);
		$department = sqlsrv_real_escape_string($_POST['department']);
		$agency = sqlsrv_real_escape_string($_POST['agency']);
		
		$sql0 = "UPDATE allegation_details SET priority = '$priority', resolution = '$resolution', department = '$department', agency = '$agency', country = '$country', summary = '$summary', received_via = '$received_via', referred_from = '$referred_from', category_type = '$category_type', sub_category_type = '$sub_category_type', porfolio_category = '$porfolio_category', coe = '$coe', checkbox1 = '$checkbox1', checkbox2 = '$checkbox2', checkbox3 = '$checkbox3', checkbox4 = '$checkbox4', checkbox5 = '$checkbox5', checkbox6 = '$checkbox6', checkbox7 = '$checkbox7', checkbox8 = '$checkbox8', checkbox9 = '$checkbox9', checkbox10 = '$checkbox10', checkbox11 = '$checkbox11', checkbox12 = '$checkbox12', checkbox13 = '$checkbox13', checkbox14 = '$checkbox14', checkbox15 = '$checkbox15', checkbox16 = '$checkbox16', checkbox17 = '$checkbox17', checkbox18 = '$checkbox18', checkbox19 = '$checkbox19', checkbox20 = '$checkbox20', checkbox21 = '$checkbox21', disease_area = '$disease_area', wrongdoing_level1 = '$wrongdoing_level1', wrongdoing_level2 = '$wrongdoing_level2', source_category = '$source_category', source_subcategory = '$source_subcategory', source_evaluation = '$source_evaluation', intel_evaluation = '$intel_evaluation', allegations = '$allegations', comments = '$comments', case_summary = '$case_summary', grant_number = '$grant_number', allegations_oig_mandate = '$allegations_oig_mandate', previous_allegations = '$previous_allegations', allegation_related = '$allegation_related' WHERE id = '$id_number'";
		


if (sqlsrv_query($conncss,$sql0))
  {

		header("location: allegation_details.php?ok=yes");
  }
else
  {
trigger_error("SQL query Failed", E_USER_ERROR);
  }
}



// SUBMIT THE REPORT TO OFFICER	
if (isset($_POST['submit_draft'])){
 
		$id_number = $_GET['id_number'];
		$priority = $_POST['priority'];
		$country = sqlsrv_real_escape_string($country = $_POST['country']);
		$summary = sqlsrv_real_escape_string($summary = $_POST['summary']);
		$received_via = sqlsrv_real_escape_string($received_via = $_POST['received_via']);
		$referred_from = sqlsrv_real_escape_string($referred_from = $_POST['referred_from']);
		$category_type = sqlsrv_real_escape_string($category_type = $_POST['category_type']);
		
		$source_evaluation = sqlsrv_real_escape_string($source_evaluation = $_POST['source_evaluation']);
		$intel_evaluation = sqlsrv_real_escape_string($intel_evaluation = $_POST['intel_evaluation']);
		
		$porfolio_category = sqlsrv_real_escape_string($porfolio_category = $_POST['porfolio_category']);
		$coe = sqlsrv_real_escape_string($coe = $_POST['coe']);
		
		if ($category_type == "" ){
			$category_type = "N/A";
		}
		$sub_category_type = sqlsrv_real_escape_string($sub_category_type = $_POST['sub_category_type']);
		
		if ($sub_category_type == "" ){
			$sub_category_type = "N/A";
		}

		
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
		
		if ( isset ($_POST['checkbox11'])) {
			$checkbox11 = $_POST['checkbox11'];
			$checkbox11 = "checked"; 
		}else{
			$checkbox11 = "";
		}
		
		if ( isset ($_POST['checkbox12'])) {
			$checkbox12 = $_POST['checkbox12'];
			$checkbox12 = "checked"; 
		}else{
			$checkbox12 = "";
		}
		
		if ( isset ($_POST['checkbox13'])) {
			$checkbox13 = $_POST['checkbox13'];
			$checkbox13 = "checked"; 
		}else{
			$checkbox13 = "";
		}
		
		if ( isset ($_POST['checkbox14'])) {
			$checkbox14 = $_POST['checkbox14'];
			$checkbox14 = "checked"; 
		}else{
			$checkbox14 = "";
		}
		
		if ( isset ($_POST['checkbox15'])) {
			$checkbox15 = $_POST['checkbox15'];
			$checkbox15 = "checked"; 
		}else{
			$checkbox15 = "";
		}
		
		if ( isset ($_POST['checkbox16'])) {
			$checkbox16 = $_POST['checkbox16'];
			$checkbox16 = "checked"; 
		}else{
			$checkbox16 = "";
		}
		
		if ( isset ($_POST['checkbox17'])) {
			$checkbox17 = $_POST['checkbox17'];
			$checkbox17 = "checked"; 
		}else{
			$checkbox17 = "";
		}
		
		if ( isset ($_POST['checkbox18'])) {
			$checkbox18 = $_POST['checkbox18'];
			$checkbox18 = "checked"; 
		}else{
			$checkbox18 = "";
		}
		
		if ( isset ($_POST['checkbox19'])) {
			$checkbox19 = $_POST['checkbox19'];
			$checkbox19 = "checked"; 
		}else{
			$checkbox19 = "";
		}
		
		if ( isset ($_POST['checkbox20'])) {
			$checkbox20 = $_POST['checkbox20'];
			$checkbox20 = "checked"; 
		}else{
			$checkbox20 = "";
		}
		
		if ( isset ($_POST['checkbox21'])) {
			$checkbox21 = $_POST['checkbox21'];
			$checkbox21 = "checked"; 
		}else{
			$checkbox21 = "";
		}
		
		$disease_area = sqlsrv_real_escape_string($disease_area = $_POST['disease_area']);
		$wrongdoing_level1 = $_POST['wrongdoing1'];
		$wrongdoing_level2 = $_POST['wrongdoing2'];
		$source_category = $_POST['source_category'];
		$source_subcategory = $_POST['source_subcategory'];
		
		if ( isset ($_POST['allegations'])) {
			$allegations = sqlsrv_real_escape_string($allegations = $_POST['allegations']); 
		}else{
			$allegations = "";
		}
		
		if ( isset ($_POST['case_summary'])) {
			$case_summary = sqlsrv_real_escape_string($case_summary = $_POST['case_summary']); 
		}else{
			$case_summary = "";
		}
		
		if ( isset ($_POST['allegations_oig_mandate'])) {
			$allegations_oig_mandate = $_POST['allegations_oig_mandate'];
		}else{
			$allegations_oig_mandate = "";
		}
		
		$previous_allegations = $_POST['previous_allegations'];
		$allegation_related = $_POST['allegation_related'];

		$grant_number = sqlsrv_real_escape_string($_POST['grant_number']);
		$comments = sqlsrv_real_escape_string($_POST['comments']);	
			
		$resolution = sqlsrv_real_escape_string($_POST['resolution']);
		$department = sqlsrv_real_escape_string($_POST['department']);
		$agency = sqlsrv_real_escape_string($_POST['agency']);
		
		$submitted_to_officer = "Yes";
		$submitted_date = date('Y-m-d');
		
		
		$sql0 = "UPDATE allegation_details SET priority = '$priority', resolution = '$resolution', department = '$department', agency = '$agency', country = '$country', summary = '$summary', received_via = '$received_via', referred_from = '$referred_from', category_type = '$category_type', sub_category_type = '$sub_category_type', porfolio_category = '$porfolio_category', coe = '$coe', checkbox1 = '$checkbox1', checkbox2 = '$checkbox2', checkbox3 = '$checkbox3', checkbox4 = '$checkbox4', checkbox5 = '$checkbox5', checkbox6 = '$checkbox6', checkbox7 = '$checkbox7', checkbox8 = '$checkbox8', checkbox9 = '$checkbox9', checkbox10 = '$checkbox10', checkbox11 = '$checkbox11', checkbox12 = '$checkbox12', checkbox13 = '$checkbox13', checkbox14 = '$checkbox14', checkbox15 = '$checkbox15', checkbox16 = '$checkbox16', checkbox17 = '$checkbox17', checkbox18 = '$checkbox18', checkbox19 = '$checkbox19', checkbox20 = '$checkbox20', checkbox21 = '$checkbox21', disease_area = '$disease_area', wrongdoing_level1 = '$wrongdoing_level1', wrongdoing_level2 = '$wrongdoing_level2', source_category = '$source_category', source_subcategory = '$source_subcategory', source_evaluation = '$source_evaluation', intel_evaluation = '$intel_evaluation', allegations = '$allegations', comments = '$comments', case_summary = '$case_summary', grant_number = '$grant_number', allegations_oig_mandate = '$allegations_oig_mandate', previous_allegations = '$previous_allegations', allegation_related = '$allegation_related', submitted_to_officer = '$submitted_to_officer', submitted_date_officer = '$submitted_date' WHERE id = '$id_number'";

if (sqlsrv_query($conncss,$sql0))
  {
  }
else
  {
trigger_error("SQL query Failed", E_USER_ERROR);
  }
	
		//Get Name Officer Officer
		
		$query_get_officer = sqlsrv_query($conncss,"SELECT * FROM $cmsdb.screening_officer"); 
		$row_name = sqlsrv_fetch_array( $query_get_officer );
		$name_officer = $row_name['name'];
		
	
		//Send email to Officer
		
		$query  = "SELECT * FROM $cmsdb.investigators WHERE investigator = '$name_officer'";
		$result_email = sqlsrv_query($conncss,$query);
		$row_email = sqlsrv_fetch_array($result_email);
		$to_email = $row_email['email'];
		
		$subject = "OIG CSS - Notification of new Screening Report submitted for your review";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening Officer of CSS, <br><br>';
		$message000 = 'Please note that the Screening Report for allegation number ';
		
		$message0000 = ' has been submitted to you for your review.<br><br>';
		
		
		$message = $message0.$message00.$message000.$id_number.$message0000;
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);

		
		header("location: allegation_details.php?sent_for_review=submitted");

}




// OFFICER APPROVES DRAFT
if (isset($_POST['approve_draft'])){

		$id_number = $_GET['id_number'];
		$priority = $_POST['priority'];
		$country = sqlsrv_real_escape_string($country = $_POST['country']);
		$summary = sqlsrv_real_escape_string($summary = $_POST['summary']);
		$received_via = sqlsrv_real_escape_string($received_via = $_POST['received_via']);
		$referred_from = sqlsrv_real_escape_string($referred_from = $_POST['referred_from']);
		$category_type = sqlsrv_real_escape_string($category_type = $_POST['category_type']);
		$sub_category_type = sqlsrv_real_escape_string($sub_category_type = $_POST['sub_category_type']);
		
		$source_evaluation = sqlsrv_real_escape_string($source_evaluation = $_POST['source_evaluation']);
		$intel_evaluation = sqlsrv_real_escape_string($intel_evaluation = $_POST['intel_evaluation']);
		
		$porfolio_category = sqlsrv_real_escape_string($porfolio_category = $_POST['porfolio_category']);
		$coe = sqlsrv_real_escape_string($coe = $_POST['coe']);
	
		
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
		
		if ( isset ($_POST['checkbox11'])) {
			$checkbox11 = $_POST['checkbox11'];
			$checkbox11 = "checked"; 
		}else{
			$checkbox11 = "";
		}
		
		if ( isset ($_POST['checkbox12'])) {
			$checkbox12 = $_POST['checkbox12'];
			$checkbox12 = "checked"; 
		}else{
			$checkbox12 = "";
		}
		
		if ( isset ($_POST['checkbox13'])) {
			$checkbox13 = $_POST['checkbox13'];
			$checkbox13 = "checked"; 
		}else{
			$checkbox13 = "";
		}
		
		if ( isset ($_POST['checkbox14'])) {
			$checkbox14 = $_POST['checkbox14'];
			$checkbox14 = "checked"; 
		}else{
			$checkbox14 = "";
		}
		
		if ( isset ($_POST['checkbox15'])) {
			$checkbox15 = $_POST['checkbox15'];
			$checkbox15 = "checked"; 
		}else{
			$checkbox15 = "";
		}
		
		if ( isset ($_POST['checkbox16'])) {
			$checkbox16 = $_POST['checkbox16'];
			$checkbox16 = "checked"; 
		}else{
			$checkbox16 = "";
		}
		
		if ( isset ($_POST['checkbox17'])) {
			$checkbox17 = $_POST['checkbox17'];
			$checkbox17 = "checked"; 
		}else{
			$checkbox17 = "";
		}
		
		if ( isset ($_POST['checkbox18'])) {
			$checkbox18 = $_POST['checkbox18'];
			$checkbox18 = "checked"; 
		}else{
			$checkbox18 = "";
		}
		
		if ( isset ($_POST['checkbox19'])) {
			$checkbox19 = $_POST['checkbox19'];
			$checkbox19 = "checked"; 
		}else{
			$checkbox19 = "";
		}
		
		if ( isset ($_POST['checkbox20'])) {
			$checkbox20 = $_POST['checkbox20'];
			$checkbox20 = "checked"; 
		}else{
			$checkbox20 = "";
		}
		
		if ( isset ($_POST['checkbox21'])) {
			$checkbox21 = $_POST['checkbox21'];
			$checkbox21 = "checked"; 
		}else{
			$checkbox21 = "";
		}
		
		$disease_area = sqlsrv_real_escape_string($disease_area = $_POST['disease_area']);
		$wrongdoing_level1 = $_POST['wrongdoing1'];
		$wrongdoing_level2 = $_POST['wrongdoing2'];
		$source_category = $_POST['source_category'];
		$source_subcategory = $_POST['source_subcategory'];
		if ( isset ($_POST['allegations'])) {
			$allegations = sqlsrv_real_escape_string($allegations = $_POST['allegations']); 
		}else{
			$allegations = "";
		}
		
		if ( isset ($_POST['case_summary'])) {
			$case_summary = sqlsrv_real_escape_string($case_summary = $_POST['case_summary']); 
		}else{
			$case_summary = "";
		}
		
		if ( isset ($_POST['allegations_oig_mandate'])) {
			$allegations_oig_mandate = $_POST['allegations_oig_mandate'];
		}else{
			$allegations_oig_mandate = "";
		}
		
		
		$previous_allegations = $_POST['previous_allegations'];
		$allegation_related = $_POST['allegation_related'];
		$grant_number = sqlsrv_real_escape_string($_POST['grant_number']);
		$comments = sqlsrv_real_escape_string($_POST['comments']);
		
		$resolution = sqlsrv_real_escape_string($_POST['resolution']);
		$department = sqlsrv_real_escape_string($_POST['department']);
		$agency = sqlsrv_real_escape_string($_POST['agency']);
		$reviewed_by_officer = "Yes";
		$reviewed_date = date('Y-m-d');
		$status = "Pending finalization";
		
		$result_screening_officer = sqlsrv_query($conncss,"SELECT * FROM $cmsdb.screening_officer"); 
		$row_officer = sqlsrv_fetch_array($result_screening_officer);
		$officer = $row_officer['name'];
		
		$sql01 = "UPDATE allegation_details SET status = '$status', priority = '$priority', resolution = '$resolution', department = '$department', agency = '$agency', country = '$country', summary = '$summary', received_via = '$received_via', referred_from = '$referred_from', category_type = '$category_type', sub_category_type = '$sub_category_type', porfolio_category = '$porfolio_category', coe = '$coe', checkbox1 = '$checkbox1', checkbox2 = '$checkbox2', checkbox3 = '$checkbox3', checkbox4 = '$checkbox4', checkbox5 = '$checkbox5', checkbox6 = '$checkbox6', checkbox7 = '$checkbox7', checkbox8 = '$checkbox8', checkbox9 = '$checkbox9', checkbox10 = '$checkbox10', checkbox11 = '$checkbox11', checkbox12 = '$checkbox12', checkbox13 = '$checkbox13', checkbox14 = '$checkbox14', checkbox15 = '$checkbox15', checkbox16 = '$checkbox16', checkbox17 = '$checkbox17', checkbox18 = '$checkbox18', checkbox19 = '$checkbox19', checkbox20 = '$checkbox20', checkbox21 = '$checkbox21', disease_area = '$disease_area', wrongdoing_level1 = '$wrongdoing_level1', wrongdoing_level2 = '$wrongdoing_level2',  source_category = '$source_category', source_subcategory = '$source_subcategory', source_evaluation = '$source_evaluation', intel_evaluation = '$intel_evaluation', allegations = '$allegations', comments = '$comments', case_summary = '$case_summary', grant_number = '$grant_number', allegations_oig_mandate = '$allegations_oig_mandate', previous_allegations = '$previous_allegations', allegation_related = '$allegation_related', reviewed_by_officer = '$reviewed_by_officer', reviewed_by_officer_date = '$reviewed_date', approved_by = '$officer' WHERE id = '$id_number'";
		

	if (sqlsrv_query($conncss,$sql01))
	  {
	  }
	else
	  {
trigger_error("SQL query Failed", E_USER_ERROR);
	  }
	
		
		//Get Name Of Member in charge
		
		$query_get_member = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id_number'"); 
		$row_name = sqlsrv_fetch_array( $query_get_member );
		$team_member = $row_name['team_member'];
		
	
		//Send email sent to member when the report has been approved by the officer
		
		$query  = "SELECT * FROM $cmsdb.investigators WHERE investigator = '$team_member'";
		$result_email = sqlsrv_query($conncss,$query);
		$row_email = sqlsrv_fetch_array($result_email);
		$to_email = $row_email['email'];
		
		$subject = "OIG CSS - Notification of Screening Report you have submitted for review";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening Member of CSS, <br><br>';
		$message000 = 'Please note that the Screening Officer has reviewed and approved your Screening Report for allegation number ';
		
		$message0000 = ' .Please check OIG CSS. https://cms.inspectorgeneral.local/ <br><br>';
		
		
		$message = $message0.$message00.$message000.$id_number.$message0000;
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
		
			
		
		//Send email sent to administrator when the report has been approved by the DOI
		
		$to_email = "Francisco.Infante@theglobalfund.org";
		
		$subject = "OIG CSS - Notification of Screening Report";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening administrator of CSS, <br><br>';
		$message000 = 'Please note that the Screening Officer has reviewed and approved the Screening Report for allegation number ';
		$message0000 = '<br><br> Please Update the Resolution of the allegation!';		
		$message = $message0.$message00.$message000.$id_number.$message0000;
		
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
		
		header("location: allegation_details.php?approved=approved");

}

?>

</body>
</html>