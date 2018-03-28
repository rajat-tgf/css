<?php 
require_once("includes\security.php");
$Security->GoSecure();

$result = sqlsrv_query($conncss,"SELECT MAX(entity_id) AS entity_id FROM list_name");

$row = sqlsrv_fetch_array($result);
$last_id = $row['entity_id'];
$new_entity_number = $last_id + 1;


$type_entity = sqlsrv_real_escape_string($type_entity = $_POST['type_entity']);

$name_entity = sqlsrv_real_escape_string($name_entity = $_POST['name_entity']);
$alternative_name = sqlsrv_real_escape_string($alternative_name = $_POST['alternative_name']);
$head_city = sqlsrv_real_escape_string($head_city = $_POST['head_city']);
$head_country = sqlsrv_real_escape_string($head_country = $_POST['head_country']);

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
$acro = sqlsrv_real_escape_string($acro = $_POST['acro']);

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

$allegation_to_link = $_POST['allegation_to_link'];
$case_to_link = $_POST['case_to_link'];


$created_cms = "No";
$date_creation = date('Y-m-d');
$username = $_SESSION['username'];

$sql = "INSERT INTO list_name (entity_id, type_entity, name, alternative_name, accro, head_city, head_country, date_creation, created_by ) VALUES ('$new_entity_number', '$type_entity', '$name_entity', '$alternative_name', '$acro', '$head_city', '$head_country', '$date_creation', '$username')";

$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes


$sql1 = "INSERT INTO profiles (list_name_id, category, position, type, whistleblower_protection, informant_protection, witness_protection, email1, email2, home_phone_number, office_phone_number, mobile, fax, skype, web_page, address, post_code, city, country, notes, create_cms, date_creation, created_by ) VALUES ('$new_entity_number', '$category', '$position', '$type_profile', '$wp', '$cip', '$witp', '$email1', '$email2', '$home_phone_number', '$office_phone_number', '$mobile', '$fax', '$skype', '$web_page', '$address', '$post_code', '$city', '$country', '$notes', '$created_cms', '$date_creation', '$username')";

$result_sql1 = sqlsrv_query($conncss,$sql1) or trigger_error("SQL query Failed", E_USER_ERROR);  //order executes

if($result_sql1){

$result = sqlsrv_query($conncss,'SELECT top 1 id FROM profiles ORDER BY id DESC');
$row = sqlsrv_fetch_array($result);
$profile_id = $row['id'];

		if ( $allegation_to_link != "" ){
		
			$sql = "INSERT INTO entities_allegations (allegation_id, profile_id ) VALUES ('$allegation_to_link', '$profile_id')";
			$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);   //order executes
		
		}
		
		if ( $case_to_link != "" ){
		
			$sql = "INSERT INTO entities_allegations (case_number, profile_id ) VALUES ('$case_to_link', '$profile_id')";
			$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR);  //order executes
		
		}

     header("location: main.php?new_entity='yes'"); 


 } else{  

trigger_error("SQL query Failed", E_USER_ERROR);


 }
 ?>




