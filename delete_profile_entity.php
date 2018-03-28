<?php
require_once("includes\security.php");
$Security->GoSecure();

$profile_id = $_GET['profile_id'];
   

$sql = "DELETE FROM profiles WHERE id = '$profile_id'"; 
  

$result = sqlsrv_query($conncss,$sql);  //order executes  


if($result){  


	 header("location: manage_entities.php?ok1='yes'");  
  

 } else{  

     echo("<br>Input data is fail");  

 }  

 ?> 