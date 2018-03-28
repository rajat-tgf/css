<?php
require_once("includes\security.php");


$risk_id = $_GET['risk_id'];

/*$risk_type = $_POST['risk_type'];
$risk = $_POST['risk'];
$risk_action = $_POST['risk_action'];


$category_type = $_POST['category_type'];
$sub_category_type = $_POST['sub_category_type'];

$temp = sqlsrv_real_escape_string($description = $_POST['description']);
$description = str_replace('“', '"', $temp);
$description = str_replace('”', '"', $description);*/


$sccba = sqlsrv_real_escape_string($sccba = $_POST['sccba']);
$hlcp = sqlsrv_real_escape_string($hlcp = $_POST['hlcp']);
$sacaf = sqlsrv_real_escape_string($sacaf = $_POST['sacaf']);
$crr = sqlsrv_real_escape_string($crr = $_POST['crr']);

$risk_type = sqlsrv_real_escape_string($risk_type = $_POST['risk_type']);
$risk = sqlsrv_real_escape_string($risk = $_POST['risk']);
$risk_action = sqlsrv_real_escape_string($risk_action = $_POST['risk_action']);
$category_type = sqlsrv_real_escape_string($category_type = $_POST['category_type']);
$sub_category_type = sqlsrv_real_escape_string($sub_category_type = $_POST['sub_category_type']);
$description = sqlsrv_real_escape_string($description = $_POST['description']);

$department = sqlsrv_real_escape_string($department = $_POST['department']);
$agency = sqlsrv_real_escape_string($agency = $_POST['agency']);


		
$sql = "UPDATE risk_types SET sccba = '$sccba', hlcp = '$hlcp', sacaf = '$sacaf', crr = '$crr', category_type = '$category_type', sub_category_type = '$sub_category_type', risk_type = '$risk_type', risk = '$risk', action = '$risk_action', department = '$department', agency = '$agency', description = '$description' WHERE id = '$risk_id'";

$result = sqlsrv_query($conncss,$sql);


if($result){
	
?>
<script>
	parent.location.reload();
</script>

<?php
} else{  

trigger_error("SQL query Failed", E_USER_ERROR);


 }
?>


