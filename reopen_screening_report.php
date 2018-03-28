<?php
require_once("includes\security.php");
$Security->GoSecure();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php

$username = $_SESSION['username'];


if (isset($_POST['reopen'])){
    
		$id_number = $_GET['id_number'];
		
		$result_allegation = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id_number'"); 
		$row_allegation = sqlsrv_fetch_array( $result_allegation );
		$team_member = $row_allegation['team_member'];
		$complainant_updated = $row_allegation['complainant_updated'];
		$check4 = $row_allegation['check4'];
		$submitted_date_officer = $row_allegation['submitted_date_officer'];
		$reviewed_by_officer_date = $row_allegation['reviewed_by_officer_date'];
		$approved_by = $row_allegation['approved_by'];
	
		$reopened_date = date('Y-m-d');
		
		
		$sql_reopen = "INSERT INTO reopen (allegation_id, member, submitted_date_officer, reviewed_by_officer_date, approved_by, complainant_updated, reopened_date) VALUES ('$id_number', '$team_member', '$submitted_date_officer', '$reviewed_by_officer_date', '$approved_by','$complainant_updated', '$reopened_date')";

$result_reopen = sqlsrv_query($conncss,$sql_reopen) or trigger_error("SQL query Failed", E_USER_ERROR);
		
		
		$sql0 = "UPDATE allegation_details SET status = 'Screening Review', complainant_updated = '', check4 = '', submitted_to_officer = '', submitted_date_officer = '', reviewed_by_officer = '',  	reviewed_by_officer_date = '', approved_by = '' WHERE id = '$id_number'";
		


if (sqlsrv_query($conncss,$sql0))
  {
	  
		//Send email sent to member when the report is reopened
		
		$query_get_member = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id_number'"); 
		$row_name = sqlsrv_fetch_array( $query_get_member );
		$team_member = $row_name['team_member'];
		
		$query  = "SELECT * FROM $cmsdb.investigators WHERE investigator = '$team_member'";
		$result_email = sqlsrv_query($conncss,$query);
		$row_email = sqlsrv_fetch_array($result_email);
		$to_email = $row_email['email'];

		$subject = "OIG CSS - Notification of Screening Report";
		$message0 = '<u> Do not reply to this email. This email has been generated automatically </u><br><br>';
		$message00 = 'Dear Screening Member of CSS, <br><br>';
		$message000 = 'Please note that the Screening Report ';
		
		$message0000 = ' has been open for reassessment';
		
		
		$message = $message0.$message00.$message000.$id_number.$message0000;
		
		$headers  = 'From: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'Reply-To: notifications.inspectorgeneral@gmail.com' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		mail($to_email, $subject, $message, $headers);
		
		header("location: allegation_details.php?okreopen=yes");
  }
	else
  {
trigger_error("SQL query Failed", E_USER_ERROR);
  }		

}

?>

</body>
</html>