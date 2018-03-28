<?php
require_once("includes\security.php");
$Security->GoSecure();
$id_report = $_SESSION['report_id'];
$allegation_id = $_GET['allegation_id'];


$sql123 = "DELETE FROM allegation_ir_links WHERE allegation_id = '$allegation_id' AND ir_id = '$id_report'"; 
  
$result123 = sqlsrv_query($conncss,$sql123);  //order executes  

if (!$result123){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
	header("location: intelligence_report_details.php?tabs=#tabs-3");
	
}



?> 