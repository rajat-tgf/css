<?php
require_once("includes\security.php");
$Security->GoSecure();

$username = $_SESSION['username'];
$report_id = $_SESSION['report_id'];

$request = sqlsrv_real_escape_string($request = $_POST['request']);
$response = sqlsrv_real_escape_string($response = $_POST['response']);
$status = $_POST['status'];
$category = $_POST['category'];
$responsable = $_POST['responsable'];
$name = sqlsrv_real_escape_string($name_responsable = $_POST['name_responsable']);
$date_notified = $_POST['date_notified'];
$date_follow_up = $_POST['date_follow_up'];
$comments = sqlsrv_real_escape_string($comments = $_POST['comments']);
$email_notification = "no";

$sql = "INSERT INTO follow_ups_ir (report_id, request, response, status, category, responsable, name, date_notified, date_follow_up, comments, email_notification, member) VALUES ('$report_id', '$request', '$response', '$status', '$category', '$responsable', '$name', '$date_notified', '$date_follow_up', '$comments', '$email_notification', '$username')";

$result = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);

 
 if (!$result){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{

	header("location: intelligence_report_details.php?new_followupir='yes'$tabs=#tabs-5");
}

?>