<?php
require_once("includes\security.php");

$allegation_id = $_SESSION['id'];

$grant_number_to_link = $_POST['grant_number_to_link'];

$sqllink = "INSERT INTO allegation_grant_links (allegation_id, grant_number) VALUES ('$allegation_id', '$grant_number_to_link')";
$resultlink = sqlsrv_query($conncss,$sqllink);  //order executes
if ($resultlink){

}
?>
