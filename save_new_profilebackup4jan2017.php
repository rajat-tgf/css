<?php
require_once("includes\security.php");
$Security->GoSecure();

$entity_id = $_SESSION['entity_id'];
	
$category = sqlsrv_real_escape_string($category = $_POST['category']);

$wp = "No";
$cip = "No";
$witp = "No";

if (isset($_POST['protection'])) {
	$protection = $_POST['protection'];
	
	if ( $category == "Whistleblower" ){
		$wp = "Yes";
	} else if ( $category == "Confidential Informant" ){
		$cip = "Yes";
	} else if ( $category == "Witness" ){
		$witp = "Yes";
	}
}


$position = sqlsrv_real_escape_string($position = $_POST['position']);

$type_profile = sqlsrv_real_escape_string($type_profile = $_POST['type_profile']);
$email1 = sqlsrv_real_escape_string($email1 = $_POST['email1']);
$email2 = sqlsrv_real_escape_string($email2 = $_POST['email2']);
$home_phone_number = sqlsrv_real_escape_string($home_phone_number = $_POST['home_phone_number']);
$office_phone_number = sqlsrv_real_escape_string($office_phone_number = $_POST['office_phone_number']);
$mobile = sqlsrv_real_escape_string($mobile = $_POST['mobile']);
$fax = sqlsrv_real_escape_string($fax = $_POST['fax']);
$skype = sqlsrv_real_escape_string($skype = $_POST['skype']);
$web_page = sqlsrv_real_escape_string($web_page = $_POST['web_page']);
$address = sqlsrv_real_escape_string($address = $_POST['address']);
$post_code = sqlsrv_real_escape_string($post_code = $_POST['post_code']);
$city = sqlsrv_real_escape_string($city = $_POST['city']);
$country = sqlsrv_real_escape_string($country = $_POST['country']);
$notes = sqlsrv_real_escape_string($notes = $_POST['notes']);

$created_cms = "No";
$date_creation = date('Y-m-d');
$username = $_SESSION['username'];


$sql1 = "INSERT INTO profiles (list_name_id, category, position, type, whistleblower_protection, informant_protection, witness_protection, email1, email2, home_phone_number, office_phone_number, mobile, fax, skype, web_page, address, post_code, city, country, notes, create_cms, date_creation, created_by ) VALUES ('$entity_id', '$category', '$position', '$type_profile', '$wp', '$cip', '$witp', '$email1', '$email2', '$home_phone_number', '$office_phone_number', '$mobile', '$fax', '$skype', '$web_page', '$address', '$post_code', '$city', '$country', '$notes', '$created_cms', '$date_creation', '$username')";

$result_sql1 = sqlsrv_query($conncss,$sql1) or trigger_error("SQL query Failed", E_USER_ERROR);  //order executes

if($result_sql1){


} else{  

trigger_error("SQL query Failed", E_USER_ERROR);


 }
?>


