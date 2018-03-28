<?php
require_once("includes\security.php");
$Security->GoSecure();

$save_date = date('Y-m-d');

$username = $_SESSION['username'];
	
$profile_id = $_GET['profile_id'];	
$category = sqlsrv_real_escape_string($position = $_POST['category']);
$position = sqlsrv_real_escape_string($position = $_POST['position']);
$type = sqlsrv_real_escape_string($type = $_POST['type']);

$wp = "No";
if (isset($_POST['wp'])) {
	$wp = $_POST['wp'];
	$wp = "Yes"; 
}

$cip = "No";
if (isset($_POST['cip'])) {
	$cip = $_POST['cip'];
	$cip = "Yes"; 
}

$witp = "No";
if (isset($_POST['witp'])) {
	$witp = $_POST['witp'];
	$witp = "Yes"; 
}


$home_phone_number = sqlsrv_real_escape_string($home_phone_number = $_POST['home_phone_number']);
$office_phone_number = sqlsrv_real_escape_string($office_phone_number = $_POST['office_phone_number']);
$mobile = sqlsrv_real_escape_string($mobile = $_POST['mobile']);

$email1 = sqlsrv_real_escape_string($email1 = $_POST['email1']);
$email2 = sqlsrv_real_escape_string($email2 = $_POST['email2']);
$skype = sqlsrv_real_escape_string($skype = $_POST['skype']);
$fax = sqlsrv_real_escape_string($fax = $_POST['fax']);
$web_page = sqlsrv_real_escape_string($web_page = $_POST['web_page']);
$address = sqlsrv_real_escape_string($address = $_POST['address_person']);
$city = sqlsrv_real_escape_string($city = $_POST['city_person']);
$country = sqlsrv_real_escape_string($country = $_POST['country_person']);
$post_code = sqlsrv_real_escape_string($post_code = $_POST['post_code_person']);
$notes = sqlsrv_real_escape_string($notes = $_POST['notes']);


		
$sql = "UPDATE profiles SET category = '$category', position = '$position', type = '$type', whistleblower_protection = '$wp', informant_protection = '$cip', witness_protection = '$witp', email1 = '$email1', email2 = '$email2', home_phone_number = '$home_phone_number', office_phone_number = '$office_phone_number', mobile = '$mobile', fax = '$fax', skype = '$skype', web_page = '$web_page', address = '$address', post_code = '$post_code', city = '$city', country = '$country', notes = '$notes' WHERE id = '$profile_id'";

$result = sqlsrv_query($conncss,$sql);

if($result){
	
$sql = "INSERT INTO history_entities (profile_id, save_date, save_by ) VALUES ('$profile_id', '$save_date', '$username')";

$result_sql = sqlsrv_query($conncss,$sql) or trigger_error("SQL query Failed", E_USER_ERROR); //order executes
	
?>
<script>
	parent.location.reload();
</script>

<?php
} else{  

trigger_error("SQL query Failed", E_USER_ERROR); 

 }
?>


