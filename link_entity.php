<?php
require_once("includes\security.php");
$Security->GoSecure();

$entity_id = $_GET['entity_id'];	

if (isset($_POST['entity_id_to_link'])){

$entity_id_to_link = $_POST['entity_id_to_link'];


		$sql = "INSERT INTO entities_link (entity_id, link) VALUES ('$entity_id', '$entity_id_to_link')";
			
		
		$result = sqlsrv_query($conncss,$sql);
		
		if($result){
			
		$sql1 = "INSERT INTO entities_link (entity_id, link) VALUES ('$entity_id_to_link', '$entity_id')";
			
		
		$result1 = sqlsrv_query($conncss,$sql1);	
	
		} else{  
		
trigger_error("SQL query Failed", E_USER_ERROR); 
		
		
		 }
}else{
	
}
?>


