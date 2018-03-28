<?php
require_once("includes\security.php");
$Security->GoSecure();
$allegation_id = $_SESSION['id'];
$id_report = $_GET['id_report'];


$sql123 = "DELETE FROM allegation_ir_links WHERE allegation_id = '$allegation_id' AND ir_id = '$id_report'"; 
  
$result123 = sqlsrv_query($conncss,$sql123);  //order executes  

if (!$result123){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
		header("location: allegation_details.php?tabs=#tabs-3");

	
}



?> 