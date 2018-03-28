<?php
require_once("includes\security.php");
$Security->GoSecure();
$entity_id = $_SESSION['entity_id'];

$entity_to_unlink = $_GET['entity_to_unlink'];


$sql123 = "DELETE FROM entities_link WHERE entity_id = '$entity_id' AND link = '$entity_to_unlink'"; 
  
$result123 = sqlsrv_query($conncss,$sql123);  //order executes  


$sql1234 = "DELETE FROM entities_link WHERE entity_id = '$entity_to_unlink' AND link = '$entity_id'"; 
  
$result1234 = sqlsrv_query($conncss,$sql1234);  //order executes  

if (!$result123){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
	
	header("location: info_entity_details.php?tabs=#tabs-2");
}



?> 