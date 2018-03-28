<?php
require_once("includes\security.php");
$Security->GoSecure();

$entity_id = $_GET['entity_id'];
   

$sql = "DELETE FROM list_name WHERE entity_id = '$entity_id'"; 
  

$result = sqlsrv_query($conncss,$sql);  //order executes  


if($result){  


	 header("location: manage_entities.php?ok='yes'");  
  

 } else{  

     echo("<br>Input data is fail");  

 }  

 ?> 