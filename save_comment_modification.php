<?php

require_once("includes\security.php");
$Security->GoSecure();

$save_date = date('Y-m-d');
	
$id = $_GET['id'];	
$comment = sqlsrv_real_escape_string($comment = $_POST['comment']);
$rate1 = $_POST['rate1'];
$rate2 = $_POST['rate2'];
$rate3 = $_POST['rate3'];
$rate4 = $_POST['rate4'];

$sql = "UPDATE comments_manager SET comment = '$comment', rate1 = '$rate1', rate2 = '$rate2', rate3 = '$rate3', rate4 = '$rate4' WHERE id = '$id'";

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


