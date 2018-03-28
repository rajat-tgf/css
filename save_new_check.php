<?php
require_once("includes\security.php");
$Security->GoSecure();

$username = $_SESSION['username'];

$status = "In progress";
$type = $_POST['type'];
$referred = $_POST['referred'];
$datepickerrequest = $_POST['datepickerrequest'];
$datepickerresponse = $_POST['datepickerresponse'];
$name = $_POST['name'];
$alt_name = $_POST['alt_name'];
$datepickerdob = $_POST['datepickerdob'];
$email = $_POST['email'];

$temp_note = sqlsrv_real_escape_string($note = $_POST['notes']);
$first_note = str_replace('“', '"', $temp_note);
$notes = str_replace('”', '"', $first_note);


$sql = "INSERT INTO checks ( status, type, referred, datepickerrequest, datepickerresponse, name, alt_name, datepickerdob, email, notes, member ) VALUES ( '$status', '$type', '$referred', '$datepickerrequest', '$datepickerresponse', '$name', '$alt_name', '$datepickerdob', '$email', '$notes', '$username' )";
$result = sqlsrv_query($conncss,$sql);  //order executes

 
 if (!$result){
trigger_error("SQL query Failed", E_USER_ERROR);
}else{

	header("location: main.php?new_check='yes'");
}

?>
