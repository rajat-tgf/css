<?php
require_once("includes\security.php");
$Security->GoSecure();
$report_id = $_SESSION['report_id'];

$profile_to_unlink = $_POST['profile_id_linked'];


$sql = "DELETE FROM entities_intel_reports WHERE report_id = '$report_id' AND profile_id = '$profile_to_unlink'"; 
  
$result = sqlsrv_query($conncss,$sql);  //order executes  

if (!$result){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
	
	header("location: intelligence_report_details.php?tabs=#tabs-3");
}



?> 