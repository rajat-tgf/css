<?php
require_once("includes\security.php");

$risk_id = $_GET['risk_id'];

   

$sql_delete = "DELETE FROM risk_types WHERE id = '$risk_id'"; 
  
$result_delete = sqlsrv_query($conncss,$sql_delete);

if ($result_delete){
	header("location: list_risk_types.php");
	
}


 ?>