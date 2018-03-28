<?php
require_once("includes\security.php");
$Security->GoSecure();

$allegation_id = $_SESSION['id'];

$allegation_id_to_link = $_POST['allegation_id_to_link'];


$sql = "INSERT INTO proactive_link (id, linked_to) VALUES ('$allegation_id', '$allegation_id_to_link')";
$result = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);  //order executes


 if (!$result){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
}
?>
