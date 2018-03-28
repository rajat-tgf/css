<?php
require_once("includes\security.php");
$Security->GoSecure();
$allegation_id = $_SESSION['id'];
$allegation_id_to_unlink = $_POST['allegation_id'];


$sql123 = "DELETE FROM proactive_link WHERE id = '$allegation_id' AND linked_to = '$allegation_id_to_unlink'"; 
  
$result123 = sqlsrv_query($conncss,$sql123);  //order executes  

if (!$result123){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
	
	header("location: allegation_details.php?tabs=#tabs-5");
}



?> 