<?php
require_once("includes\security.php");
$Security->GoSecure();

$ir_id = $_SESSION['report_id'];

$allegation_id = $_POST['allegation_id_to_link'];


$sql = "INSERT INTO allegation_ir_links (allegation_id, ir_id) VALUES ('$allegation_id', '$ir_id')";
$result = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);  //order executes


 if (!$result){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{
}
?>
