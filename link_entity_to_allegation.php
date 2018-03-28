<?php
require_once("includes\security.php");
$Security->GoSecure();
$allegation_id = $_SESSION['id'];

$entity_profile_id_to_link = $_POST['entity_profile_id_to_link'];


$sql = "INSERT INTO entities_allegations (allegation_id, profile_id) VALUES ('$allegation_id', '$entity_profile_id_to_link')";
$result = sqlsrv_query($conncss,$sql);   //order executes


if (!$result){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
}
?>
