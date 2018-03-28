<?php

require_once("includes\security.php");
$Security->GoSecure();

$username = $_SESSION['username'];
$allegation_id = $_SESSION['id'];

$temp_note = sqlsrv_real_escape_string($note = $_POST['new_notes']);
		$first_note = str_replace('“', '"', $temp_note);
		$note = str_replace('”', '"', $first_note);
		

$date_note = $_POST['date'];

$sql = "INSERT INTO notes ( allegation_id, date_note, member, note ) VALUES ( '$allegation_id', '$date_note', '$username', '$note' )";
$result = sqlsrv_query($conncss,$sql);  //order executes

 
 if (!$result){
	trigger_error("SQL query Failed", E_USER_ERROR);
}else{ 
	header("location: allegation_details.php?newnotes='yes'&tabs=#tabs-6");
}

?>
