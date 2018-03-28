<?php
require_once("includes\security.php");
$Security->GoSecure();

if (isset($_POST['save'])){
	$id_check = $_GET['id_check'];
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
		
	$sql = "UPDATE checks SET type = '$type', referred = '$referred', datepickerrequest = '$datepickerrequest', datepickerresponse = '$datepickerresponse', name = '$name', alt_name = '$alt_name', datepickerdob = '$datepickerdob', email = '$email', notes = '$notes' WHERE id = '$id_check'";
	
	$result = sqlsrv_query($conncss,$sql);
	
	if ($result){ ?>
		<script>
			alert ("Modifications have been saved");
            parent.location.reload();
        </script> 
	<?php
    } else{  
		
trigger_error("SQL query Failed", E_USER_ERROR);
	}
}


if (isset($_POST['close'])){
	$id_check = $_GET['id_check'];
	$status = "Closed";
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
	
	$sql = "UPDATE checks SET status = '$status', type = '$type', referred = '$referred', datepickerrequest = '$datepickerrequest', datepickerresponse = '$datepickerresponse', name = '$name', alt_name = '$alt_name', datepickerdob = '$datepickerdob',email = '$email', notes = '$notes'WHERE id = '$id_check'";
	
	$result = sqlsrv_query($conncss,$sql);
	
	if ($result){ ?>
	<script>
		alert ("Check has been closed");
        parent.location.reload();
    </script>
	<?php
	}else{
	
trigger_error("SQL query Failed", E_USER_ERROR);
	}
	
}
?>
