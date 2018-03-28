<?php
require_once("includes\security.php");
$Security->GoSecure();

$report_id = $_GET['report_id'];	

if (isset($_POST['entity_id_to_link'])){

$entity_id_to_link = $_POST['entity_id_to_link'];


		$sql = "INSERT INTO entities_intel_reports (report_id, entity_id) VALUES ('$report_id', '$entity_id_to_link')";
			
		
		$result = sqlsrv_query($conncss,$sql);
		
		if($result){
			
		
	
		} else{  
		
trigger_error("SQL query Failed", E_USER_ERROR); 
		
		
		 }
}else{
	
}
?>


