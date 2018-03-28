<?php
require_once("includes\security.php");
$Security->GoSecure();

$allegation_id = $_SESSION['id'];
$profile_id_linked = $_POST['profile_id_linked'];


$sql123 = "DELETE FROM entities_allegations WHERE allegation_id = '$allegation_id' AND profile_id = '$profile_id_linked'"; 
  
$result123 = sqlsrv_query($conncss,$sql123);  //order executes  

if (!$result123){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
	
	header("location: allegation_details.php?tabs=#tabs-2");
}



?> 