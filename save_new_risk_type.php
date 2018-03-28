<?php
require_once("includes\security.php");

$username = $_SESSION['username'];
$allegation_id = $_SESSION['id'];


$sccba = sqlsrv_real_escape_string($sccba = $_POST['sccba']);
$hlcp = sqlsrv_real_escape_string($hlcp = $_POST['hlcp']);
$sacaf = sqlsrv_real_escape_string($sacaf = $_POST['sacaf']);
$crr = sqlsrv_real_escape_string($crr = $_POST['crr']);

$risk_type = sqlsrv_real_escape_string($risk_type = $_POST['risk_type']);
$risk = sqlsrv_real_escape_string($risk = $_POST['risk']);

$category_type = sqlsrv_real_escape_string($category_type = $_POST['category_type']);
$sub_category_type = sqlsrv_real_escape_string($sub_category_type = $_POST['sub_category_type']);
$risk_action = sqlsrv_real_escape_string($risk_action = $_POST['risk_action']);

$department = sqlsrv_real_escape_string($department = $_POST['department']);
$agency = sqlsrv_real_escape_string($agency = $_POST['agency']);


$description = sqlsrv_real_escape_string($description = $_POST['description']);

$sql_new = "INSERT INTO risk_types ( allegation_id, sccba, hlcp, sacaf, crr, category_type, sub_category_type, risk_type, risk, description, action, department, agency, member ) VALUES ( '$allegation_id', '$sccba', '$hlcp', '$sacaf', '$crr', '$category_type', '$sub_category_type', '$risk_type', '$risk', '$description', '$risk_action', '$department', '$agency', '$username' )";
$result_new = sqlsrv_query($conncss,$sql_new);

if ($result_new){
	header("location: list_risk_types.php");
}

?>
