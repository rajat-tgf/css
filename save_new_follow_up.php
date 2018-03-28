<?php
require_once("includes\security.php");
$Security->GoSecure();

$username = $_SESSION['username'];
$allegation_id = $_SESSION['id'];

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

$sql = "INSERT INTO follow_ups (allegation_id, request, response, status, category, responsable, name, date_notified, date_follow_up, comments, email_notification, member) VALUES ('$allegation_id', '$request', '$response', '$status', '$category', '$responsable', '$name', '$date_notified', '$date_follow_up', '$comments', '$email_notification', '$username')";

$result = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);

 
 if (!$result){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{

	header("location: allegation_details.php?new_followup='yes'$tabs=#tabs-4");
}

?>