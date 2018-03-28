<?php
require_once("includes\security.php");
$Security->GoSecure();

if(isset($_POST['Submit'])){

$id_number = $_GET['id'];

$resolution = $_POST['resolution'];
$case_number = $_POST['case_number'];


$complainant_updated = isset($_REQUEST["date_updated"]) ? $_REQUEST["date_updated"] : "";
if ( $complainant_updated == "0000-00-00" ){
	$complainant_updated = "";
}

$updated_via = sqlsrv_real_escape_string($updated_via = $_POST['updated_via']);


$check4 = 0;
if (isset($_POST['check4'])) {
	$check4 = $_POST['check4'];
	if ($check4 != NULL) { 
		$check4 = "checked"; 
	} 
	else { 
		$check4 = 0; 
	}
}

$status = "Closed";

$sql = "UPDATE allegation_details SET status = '$status', resolution = '$resolution', case_number = '$case_number', complainant_updated = '$complainant_updated', updated_via = '$updated_via', check4 = '$check4' WHERE id = '$id_number'";

$result = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes

//SEND NOTIFICATION EMAIL TO OFFICER
					
			$result_country = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$id_number'"); 
			$row_country = sqlsrv_fetch_array( $result_country );
			$country = $row_country['country'];
			
			$result_sceening_officer = sqlsrv_query($conncss,"SELECT name FROM $cmsdb.screening_officer"); 
			$row_sceening_officer = sqlsrv_fetch_array( $result_sceening_officer );
			$name_sceening_officer = $row_sceening_officer['name'];
			
			$query_sceening_officer_emails = sqlsrv_query($conncss,"SELECT email FROM $cmsdb.investigators WHERE investigator = '$name_sceening_officer'");
			$row_email_sceening_officer = sqlsrv_fetch_array($query_sceening_officer_emails);
			$email_sceening_officer = $row_email_sceening_officer['email'];
			
			$subject  = "OIG CSS - Action pending - Allegation " . $id_number . " - " . $country;
			
			$message  = "<u> Do not reply to this email. This email has been generated automatically </u><br><br>"; 
			$message1  = "Please note that allegation " . $id_number . " - " . $country . " has been finalized in CSS. It is now ready for evaluation within the Team Performance management.";
			
			$final_message = $message.$message1;
			
			$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
						'BCC: Francisco.Infante@theglobalfund.org'. "\r\n" .
						'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
						'MIME-Version: 1.0' . "\r\n" .
						'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			mail($email_sceening_officer, $subject, $final_message, $headers);

header("location: allegation_details.php?finalise=yes");
}

?>
