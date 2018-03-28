<?php
require_once("includes\security.php");
$Security->GoSecure();

$save_date = date('Y-m-d');
$username = $_SESSION['username'];
	
$entity_id = $_GET['entity_id'];
$type_entity = sqlsrv_real_escape_string($type_entity = $_POST['type_entity']);
$name_entity = sqlsrv_real_escape_string($name_entity = $_POST['name_entity']);
$alternative_name = sqlsrv_real_escape_string($alternative_name = $_POST['alternative_name']);
$accro = sqlsrv_real_escape_string($accro = $_POST['acro']);
$head_city = sqlsrv_real_escape_string($head_city = $_POST['head_city']);
$head_country = sqlsrv_real_escape_string($head_country = $_POST['head_country']);

		
$sql = "UPDATE list_name SET type_entity = '$type_entity', name = '$name_entity', alternative_name = '$alternative_name', accro = '$accro', head_city = '$head_city', head_country = '$head_country' WHERE entity_id = '$entity_id'";

$result = sqlsrv_query($conncss,$sql);


if($result){
	
$sql = "INSERT INTO history_entities (entity_id, save_date, save_by ) VALUES ('$entity_id', '$save_date', '$username')";

$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);  //order executes
	
	
?>
<script>
	parent.location.reload();
</script>

<?php
} else{  

trigger_error("SQL query Failed", E_USER_ERROR);


 }
?>


