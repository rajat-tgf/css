<?php
require_once("includes\security.php");
$Security->GoSecure();

$report_id = $_GET['report_id'];	
if (isset($_POST['report_id_to_link'])){

$report_id_to_link = $_POST['report_id_to_link'];


		$sql = "INSERT INTO intel_reports_linked (report_id, link) VALUES ('$report_id', '$report_id_to_link')";
		
		$result = sqlsrv_query($conncss,$sql);
		
		if($result){
			
			$sql1 = "INSERT INTO intel_reports_linked (report_id, link) VALUES ('$report_id_to_link', '$report_id')";
	
			$result1 = sqlsrv_query($conncss,$sql1);
			
	
		} else{  
		
trigger_error("SQL query Failed", E_USER_ERROR); 
		
		
		 }
}else{
	
}
?>


