<?php

require_once("includes\security.php");
$Security->GoSecure();

$username = $_SESSION['username'];
$report_id = $_SESSION['report_id'];

$temp_note = sqlsrv_real_escape_string($note = $_POST['new_notes']);
		$first_note = str_replace('“', '"', $temp_note);
		$note = str_replace('”', '"', $first_note);
		

$date_note = $_POST['date'];

$sql = "INSERT INTO notes_ir ( report_id, date_note, member, note ) VALUES ( '$report_id', '$date_note', '$username', '$note' )";
$result = sqlsrv_query($conncss,$sql);  //order executes

 
 if (!$result){
	trigger_error("SQL query Failed", E_USER_ERROR);
}else{ 
	header("location: intelligence_report_details.php?newnotes='yes'&tabs=#tabs-2");
}

?>
