<?php
require_once("includes\security.php");
$Security->GoSecure();
$id_follow_up = $_GET['id_follow_up'];
$request = sqlsrv_real_escape_string($request = $_POST['request']);
$response = sqlsrv_real_escape_string($response = $_POST['response']);
$status = sqlsrv_real_escape_string($status = $_POST['status']);
$category = sqlsrv_real_escape_string($category = $_POST['category']);
$responsable = sqlsrv_real_escape_string($responsable = $_POST['responsable']);
$name = sqlsrv_real_escape_string($name = $_POST['name']);
$date_follow_up = $_POST['date_follow_up'];
$new_date_follow_up = $_POST['new_date_follow_up'];


$resultn = sqlsrv_query($conncss,"SELECT email_notification FROM follow_ups_ir WHERE id = '$id_follow_up'");
$rown = sqlsrv_fetch_array($resultn);
$email_notification = $rown['email_notification'];

if ( $new_date_follow_up != "" ) {

	$date_follow_up = $new_date_follow_up;
	$email_notification = "no";
}


$comments = sqlsrv_real_escape_string($comments = $_POST['comments']);
		
		
$sql = "UPDATE follow_ups_ir SET request = '$request', response = '$response', status = '$status', category = '$category', responsable = '$responsable', name = '$name', date_follow_up = '$date_follow_up', comments = '$comments', email_notification = '$email_notification' WHERE id = '$id_follow_up'";

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
