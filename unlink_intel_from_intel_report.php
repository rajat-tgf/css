<?php
require_once("includes\security.php");
$Security->GoSecure();
$id = $_SESSION['report_id'];

$intel_to_unlink = $_GET['intel_to_unlink'];


$sql123 = "DELETE FROM intel_reports_linked WHERE report_id = '$id' AND link = '$intel_to_unlink'"; 
  
$result123 = sqlsrv_query($conncss,$sql123);  //order executes  


$sql1234 = "DELETE FROM intel_reports_linked WHERE report_id = '$intel_to_unlink' AND link = '$id'"; 
  
$result1234 = sqlsrv_query($conncss,$sql1234);  //order executes  

if (!$result123){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
	
	header("location: intelligence_report_details.php?tabs=#tabs-4");
}



?> 