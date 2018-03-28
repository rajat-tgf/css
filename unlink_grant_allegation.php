<?php
require_once("includes\\opendb.php");
session_start();
$allegation_id = $_SESSION['id'];
$id_grant = $_GET['id_grant'];


$sql123 = "DELETE FROM allegation_grant_links WHERE id_grant = '$id_grant'"; 
  
$result123 = sqlsrv_query($conncss,$sql123);  //order executes  

if ($result123){
	header("location: link_grants_to_allegation.php");
}
?> 