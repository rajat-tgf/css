 <?php

require_once("includes\\opendb.php");
					  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


<link rel="stylesheet" href="../style.css" type="text/css" media="screen" /> 


</head>

<body>

<?php

// -----------------------------------2013

$result_allegations_received_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_received_2013 = sqlsrv_num_rows($result_allegations_received_2013);	

$allegations_received_2013_open_case = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND reviewed_by_officer = 'Yes' AND reviewed_by_officer_date BETWEEN '2013-01-01' AND '2013-12-31' AND date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));	
$num_allegations_received_2013_open_case = sqlsrv_num_rows($allegations_received_2013_open_case); 

$allegations_received_2014_open_case = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND reviewed_by_officer = 'Yes' AND reviewed_by_officer_date BETWEEN '2014-01-01' AND '2014-12-31' AND date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));	
$num_allegations_received_2013_open_case_2014 = sqlsrv_num_rows($allegations_received_2014_open_case);

$allegations_received_2013_secr = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Refer to Secretariat' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2013_secr = sqlsrv_num_rows($allegations_received_2013_secr);  

$allegations_received_2013_mergecms = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Merge with an existing Case' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2013_mercms = sqlsrv_num_rows($allegations_received_2013_mergecms);

$allegations_received_2013_mercss = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Merge with an existing Allegation' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2013_css = sqlsrv_num_rows($allegations_received_2013_mercss);

$allegations_received_2013_dismissed = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'No further action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2013_dismissed = sqlsrv_num_rows($allegations_received_2013_dismissed);

$allegations_received_2013_screening_review = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Screening review' AND date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2013_screening_review = sqlsrv_num_rows($allegations_received_2013_screening_review);  

$allegations_received_2013_pendingfinal = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Pending finalization' AND date_received BETWEEN '2013-01-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2013_pending_final = sqlsrv_num_rows($allegations_received_2013_pendingfinal); 

$total_pending_2013 = $num_allegations_received_2013_screening_review + $num_allegations_received_2013_pending_final;
 


// -----------------------------------2014


$result_allegations_received_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_received_2014 = sqlsrv_num_rows($result_allegations_received_2014);

$allegations_received_2014_open_case = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Open case in CMS' AND reviewed_by_officer = 'Yes' AND reviewed_by_officer_date BETWEEN '2014-01-01' AND '2014-12-31' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_open_case = sqlsrv_num_rows($allegations_received_2014_open_case);

$allegations_received_2015_open_case = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND reviewed_by_officer = 'Yes' AND reviewed_by_officer_date BETWEEN '2015-01-01' AND '2015-12-31' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));	
$num_allegations_received_2014_open_case_2015 = sqlsrv_num_rows($allegations_received_2015_open_case);

$allegations_received_2014_refsecreio = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to Secretariat for information only' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_refsecreio = sqlsrv_num_rows($allegations_received_2014_refsecreio); 

$allegations_received_2014_refsecrema = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to Secretariat for management action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_refsecrema = sqlsrv_num_rows($allegations_received_2014_refsecrema); 

$allegations_received_2014_refea = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to external agency' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_refea = sqlsrv_num_rows($allegations_received_2014_refea);  

$allegations_received_2014_mergcms = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Merge with an existing Case' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_mergecms = sqlsrv_num_rows($allegations_received_2014_mergcms); 

$allegations_received_2014_mergecss = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Merge with an existing Allegation' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_mergecss = sqlsrv_num_rows($allegations_received_2014_mergecss);  

$allegations_received_2014_information_report = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Information Report' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_information_report = sqlsrv_num_rows($allegations_received_2014_information_report);

$allegations_received_2014_dismissed = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'No further action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_dismissed = sqlsrv_num_rows($allegations_received_2014_dismissed); 

$allegations_received_2014_screening_review = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Screening review' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_screening_review = sqlsrv_num_rows($allegations_received_2014_screening_review);

$allegations_received_2014_pendingfinal = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Pending finalization' AND date_received BETWEEN '2014-01-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2014_pending_final = sqlsrv_num_rows($allegations_received_2014_pendingfinal);  



$total_open_cases_2014 = $num_allegations_received_2013_open_case_2014 + $num_allegations_received_2014_open_case;


$total_pending_2014 = $num_allegations_received_2014_screening_review + $num_allegations_received_2014_pending_final;


// -----------------------------------2015


$result_allegations_received_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_received_2015 = sqlsrv_num_rows($result_allegations_received_2015);

$allegations_received_2015_open_case = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Open case in CMS' AND reviewed_by_officer = 'Yes' AND reviewed_by_officer_date BETWEEN '2015-01-01' AND '2015-12-31' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_open_case = sqlsrv_num_rows($allegations_received_2015_open_case);

$allegations_received_2015_open_case_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND reviewed_by_officer = 'Yes' AND reviewed_by_officer_date BETWEEN '2016-01-01' AND '2016-12-31' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));	
$num_allegations_received_2015_open_case_2016 = sqlsrv_num_rows($allegations_received_2015_open_case_2016);


$allegations_received_2015_refsecreio = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to Secretariat for information only' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_refsecreio = sqlsrv_num_rows($allegations_received_2015_refsecreio); 

$allegations_received_2015_refsecrema = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to Secretariat for management action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_refsecrema = sqlsrv_num_rows($allegations_received_2015_refsecrema); 

$allegations_received_2015_refea = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to external agency' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_refea = sqlsrv_num_rows($allegations_received_2015_refea); 



$allegations_received_2015_mergcms = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Merge with an existing Case' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_mergecms = sqlsrv_num_rows($allegations_received_2015_mergcms); 

$allegations_received_2015_mergecss = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Merge with an existing Allegation' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_mergecss = sqlsrv_num_rows($allegations_received_2015_mergecss);  

$allegations_received_2015_information_report = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Information Report' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_information_report = sqlsrv_num_rows($allegations_received_2015_information_report); 

$allegations_received_2015_dismissed = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'No further action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_dismissed = sqlsrv_num_rows($allegations_received_2015_dismissed); 

$allegations_received_2015_screening_review = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Screening review' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_screening_review = sqlsrv_num_rows($allegations_received_2015_screening_review);

$allegations_received_2015_pendingfinal = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Pending finalization' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2015_pending_final = sqlsrv_num_rows($allegations_received_2015_pendingfinal);  



$total_open_cases_2015 = $num_allegations_received_2014_open_case_2015 + $num_allegations_received_2015_open_case;


$total_pending_2015 = $num_allegations_received_2015_screening_review + $num_allegations_received_2015_pending_final;




// -----------------------------------2016


$result_allegations_received_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_received_2016 = sqlsrv_num_rows($result_allegations_received_2016);


$result_proactive_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_proactive_2016 = sqlsrv_num_rows($result_proactive_2016);

$result_ir_2016 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_ir_2016 = sqlsrv_num_rows($result_ir_2016);


$allegations_received_2016_open_case = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Open case in CMS' AND reviewed_by_officer = 'Yes' AND reviewed_by_officer_date BETWEEN '2016-01-01' AND '2016-12-31' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_open_case = sqlsrv_num_rows($allegations_received_2016_open_case);

$allegations_received_2016_refsecreio = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to Secretariat for information only' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_refsecreio = sqlsrv_num_rows($allegations_received_2016_refsecreio); 

$allegations_received_2016_refsecrema = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to Secretariat for management action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_refsecrema = sqlsrv_num_rows($allegations_received_2016_refsecrema); 

$allegations_received_2016_refea = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to external agency' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_refea = sqlsrv_num_rows($allegations_received_2016_refea); 

$allegations_received_2016_refeaud = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to OIG Audit' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_refeaudit = sqlsrv_num_rows($allegations_received_2016_refeaud); 


$allegations_received_2016_mergcms = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Merge with an existing Case' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_mergecms = sqlsrv_num_rows($allegations_received_2016_mergcms); 

$allegations_received_2016_mergecss = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Merge with an existing Allegation' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_mergecss = sqlsrv_num_rows($allegations_received_2016_mergecss);  

$allegations_received_2016_information_report = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Information Report' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_information_report = sqlsrv_num_rows($allegations_received_2016_information_report); 

$allegations_received_2016_dismissed = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'No further action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_dismissed = sqlsrv_num_rows($allegations_received_2016_dismissed); 

$allegations_received_2016_screening_review = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Screening review' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_screening_review = sqlsrv_num_rows($allegations_received_2016_screening_review);

$allegations_received_2016_pendingfinal = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Pending finalization' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_pending_final = sqlsrv_num_rows($allegations_received_2016_pendingfinal);  


$total_pending_2016 = $num_allegations_received_2016_screening_review + $num_allegations_received_2016_pending_final;



// -----------------------------------2017


$result_allegations_received_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_received_2017 = sqlsrv_num_rows($result_allegations_received_2017);


$result_proactive_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_proactive_2017 = sqlsrv_num_rows($result_proactive_2017);

$result_ir_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_ir_2017 = sqlsrv_num_rows($result_ir_2017);


$allegations_received_2017_open_case = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Open case in CMS' AND reviewed_by_officer = 'Yes' AND reviewed_by_officer_date BETWEEN '2017-01-01' AND '2017-12-31' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_open_case = sqlsrv_num_rows($allegations_received_2017_open_case);

$allegations_received_2017_refsecreio = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to Secretariat for information only' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_refsecreio = sqlsrv_num_rows($allegations_received_2017_refsecreio); 

$allegations_received_2017_refsecrema = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to Secretariat for management action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_refsecrema = sqlsrv_num_rows($allegations_received_2017_refsecrema); 

$allegations_received_2017_refea = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to external agency' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_refea = sqlsrv_num_rows($allegations_received_2017_refea); 

$allegations_received_2017_refeaud = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Referral to OIG Audit' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_refeaudit = sqlsrv_num_rows($allegations_received_2017_refeaud); 


$allegations_received_2017_mergcms = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Merge with an existing Case' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_mergecms = sqlsrv_num_rows($allegations_received_2017_mergcms); 

$allegations_received_2017_mergecss = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Merge with an existing Allegation' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_mergecss = sqlsrv_num_rows($allegations_received_2017_mergecss);  

$allegations_received_2017_information_report = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Information Report' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_information_report = sqlsrv_num_rows($allegations_received_2017_information_report); 

$allegations_received_2017_dismissed = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'No further action' AND reviewed_by_officer = 'Yes' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_dismissed = sqlsrv_num_rows($allegations_received_2017_dismissed); 

$allegations_received_2017_screening_review = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Screening review' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_screening_review = sqlsrv_num_rows($allegations_received_2017_screening_review);

$allegations_received_2017_pendingfinal = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Pending finalization' AND date_received BETWEEN '2017-01-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2017_pending_final = sqlsrv_num_rows($allegations_received_2017_pendingfinal);  


$total_pending_2017 = $num_allegations_received_2017_screening_review + $num_allegations_received_2017_pending_final;



?> 

                   
                   
 <table width="1195" align="center" class="gridtable">                   

<tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="center"><font size="+3"><strong> 2017</strong></font></td>
                    </tr>
                    <tr>
                      <td width="383" align="right"><em>Cases opened in CMS for Investigation</em></td>
                      <td width="65" align="right"><?php echo $num_allegations_received_2017_open_case;  ?></td>
                      <td colspan="3" align="center">

                  
                      
                      
                      </td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat for information only</td>
                      <td align="right"><?php echo $num_allegations_received_2017_refsecreio;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat for management action</td>
                      <td align="right"><?php echo $num_allegations_received_2017_refsecrema;  ?></td>
                      <td width="530" align="right"><font size="+1"><strong>Allegations received :</strong></font></td>
                      <td width="118" align="center">  
                      <font size="+1"><strong>
						<?php
                            echo $num_allegations_received_2017;				
                        ?>
                          </strong></font>
                       </td>
                      <td width="75" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to an external agency</td>
                      <td align="right"><?php echo $num_allegations_received_2017_refea;  ?></td>
                      <td align="right"><font size="+1"><strong>Proactive Assessments opened :</strong></font></td>
                      <td align="center">
                      <script type="text/javascript">
							function showDialogproactive2017(){
								
							
							   $("#divproactive").dialog("open");
							   $("#modalproactive").attr("src","stats/list_proactive_2017.php");
							   return false;
							}

							$(document).ready(function() {
							   $("#divproactive").dialog({
								   show: {
											effect: 'fade',
											duration: 500
										},
										hide: {
											effect: 'fade',
											duration: 500
										},
									   autoOpen: false,
									   modal: true,
									   height: 925,
									   width: 1400,
									   resizable: false,
									   draggable: false,
									   position: 'top',
									   
						
								  });
							});
					</script>
                      <a onClick="return showDialogproactive2017()">
                      <font size="+1"><strong>
						<?php
                            echo $num_proactive_2017;				
                        ?>
                          </strong></font>
                      </a>
                      </td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to OIG Audit</td>
                      <td align="right"><?php echo $num_allegations_received_2017_refeaudit;  ?></td>
                      <td align="right"><font size="+1"><strong>Intelligence Reports:</strong></font></td>
                      <td align="center"><font size="+1"><strong>
                        <?php
                            echo $num_ir_2017;				
                        ?>
                      </strong></font></td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing case in CMS</td>
                      <td align="right"><?php echo $num_allegations_received_2017_mergecms;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing allegation</td>
                      <td align="right"><?php echo $num_allegations_received_2017_mergecss;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                     <tr>
                      <td align="right">Information Report</td>
                      <td align="right"><?php echo $num_allegations_received_2017_information_report;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">No further action</td>
                      <td align="right"><?php echo $num_allegations_received_2017_dismissed;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Pending for Screening Review</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2017_screening_review;
echo "</font>";
						?></td>
                    </tr>
                    <tr>
                      <td align="right">Pending Finalization</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2017_pending_final;
echo "</font>";
?></td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5" align="center">
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

var data = google.visualization.arrayToDataTable([
['Category', '2017'],
['Cases opened', <?php echo $num_allegations_received_2017_open_case ?>],
['Allegations referred to the Secretariat for management action', <?php echo $num_allegations_received_2017_refsecrema ?>],
['Allegations referred to the Secretariat for information only', <?php echo $num_allegations_received_2017_refsecreio ?>],
['Allegations referred to an external agency', <?php echo $num_allegations_received_2017_refea ?>],
['Allegations referred to OIG Audit', <?php echo $num_allegations_received_2017_refeaudit ?>],
['Allegations merged in CMS', <?php echo $num_allegations_received_2017_mergecms ?>],
['Allegations merged in CSS', <?php echo $num_allegations_received_2017_mergecss ?>],
['Information Report', <?php echo $num_allegations_received_2017_information_report ?>],
['No further action', <?php echo $num_allegations_received_2017_dismissed ?>],
['Pending', <?php echo $total_pending_2017 ?>]
]);

var options = {
	width: 1000,
    height: 300,
	chartArea: {'width': '100%', 'height': '100%'},
	pieHole: 0.2,
	legend: {
 position: 'labeled',
 pieSliceText:"value"                                    
 },
 is3D: true,
title: ''
};

var chart2017 = new google.visualization.PieChart(document.getElementById('piechart2017'));

chart2017.draw(data, options);
}
</script>   
                      
                      
                      <div id="piechart2017" style="width: 1000px; height: 300px;" align="left"></div>
                      
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>



<tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="center"><font size="+3"><strong> 2016</strong></font></td>
                    </tr>
                    <tr>
                      <td width="383" align="right"><em>Cases opened in CMS for Investigation</em></td>
                      <td width="65" align="right"><?php echo $num_allegations_received_2016_open_case;  ?></td>
                      <td colspan="3" align="center">

                  
                      
                      
                      </td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat for information only</td>
                      <td align="right"><?php echo $num_allegations_received_2016_refsecreio;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat for management action</td>
                      <td align="right"><?php echo $num_allegations_received_2016_refsecrema;  ?></td>
                      <td width="530" align="right"><font size="+1"><strong>Allegations received :</strong></font></td>
                      <td width="118" align="center">  
                      <font size="+1"><strong>
						<?php
                            echo $num_allegations_received_2016;				
                        ?>
                          </strong></font>
                       </td>
                      <td width="75" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to an external agency</td>
                      <td align="right"><?php echo $num_allegations_received_2016_refea;  ?></td>
                      <td align="right"><font size="+1"><strong>Proactive Assessments opened :</strong></font></td>
                      <td align="center">
                      <script type="text/javascript">
							function showDialogproactive(){
								
							
							   $("#divproactive").dialog("open");
							   $("#modalproactive").attr("src","stats/list_proactive_2016.php");
							   return false;
							}

							$(document).ready(function() {
							   $("#divproactive").dialog({
								   show: {
											effect: 'fade',
											duration: 500
										},
										hide: {
											effect: 'fade',
											duration: 500
										},
									   autoOpen: false,
									   modal: true,
									   height: 925,
									   width: 1400,
									   resizable: false,
									   draggable: false,
									   position: 'top',
									   
						
								  });
							});
					</script>
                      <a onClick="return showDialogproactive()">
                      <font size="+1"><strong>
						<?php
                            echo $num_proactive_2016;				
                        ?>
                          </strong></font>
                      </a>
                      </td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to OIG Audit</td>
                      <td align="right"><?php echo $num_allegations_received_2016_refeaudit;  ?></td>
                      <td align="right"><font size="+1"><strong>Intelligence Reports:</strong></font></td>
                      <td align="center"><font size="+1"><strong>
                        <?php
                            echo $num_ir_2016;				
                        ?>
                      </strong></font></td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing case in CMS</td>
                      <td align="right"><?php echo $num_allegations_received_2016_mergecms;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing allegation</td>
                      <td align="right"><?php echo $num_allegations_received_2016_mergecss;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                     <tr>
                      <td align="right">Information Report</td>
                      <td align="right"><?php echo $num_allegations_received_2016_information_report;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">No further action</td>
                      <td align="right"><?php echo $num_allegations_received_2016_dismissed;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Pending for Screening Review</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2016_screening_review;
echo "</font>";
						?></td>
                    </tr>
                    <tr>
                      <td align="right">Pending Finalization</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2016_pending_final;
echo "</font>";
?></td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5" align="center">
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

var data = google.visualization.arrayToDataTable([
['Category', '2016'],
['Cases opened', <?php echo $num_allegations_received_2016_open_case ?>],
['Allegations referred to the Secretariat for management action', <?php echo $num_allegations_received_2016_refsecrema ?>],
['Allegations referred to the Secretariat for information only', <?php echo $num_allegations_received_2016_refsecreio ?>],
['Allegations referred to an external agency', <?php echo $num_allegations_received_2016_refea ?>],
['Allegations referred to OIG Audit', <?php echo $num_allegations_received_2016_refeaudit ?>],
['Allegations merged in CMS', <?php echo $num_allegations_received_2016_mergecms ?>],
['Allegations merged in CSS', <?php echo $num_allegations_received_2016_mergecss ?>],
['Information Report', <?php echo $num_allegations_received_2016_information_report ?>],
['No further action', <?php echo $num_allegations_received_2016_dismissed ?>],
['Pending', <?php echo $total_pending_2016 ?>]
]);

var options = {
	width: 1000,
    height: 300,
	chartArea: {'width': '100%', 'height': '100%'},
	pieHole: 0.2,
	legend: {
 position: 'labeled',
 pieSliceText:"value"                                    
 },
 is3D: true,
title: ''
};

var chart2016 = new google.visualization.PieChart(document.getElementById('piechart2016'));

chart2016.draw(data, options);
}
</script>   
                      
                      
                      <div id="piechart2016" style="width: 1000px; height: 300px;" align="left"></div>
                      
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>









                    
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="center"><font size="+3"><strong> 2015</strong></font></td>
                    </tr>
                    <tr>
                      <td align="right"><em>Cases opened in CMS for Investigation in 2015</em></td>
                      <td align="right"><?php echo $num_allegations_received_2015_open_case;  ?></td>
                      <td colspan="3" align="center"><script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

var data = google.visualization.arrayToDataTable([
['Category', '2015'],
['Cases opened',     <?php echo $total_open_cases_2015 ?>],
['Allegations referred to the Secretariat for management action',      <?php echo $num_allegations_received_2015_refsecrema ?>],
['Allegations referred to the Secretariat for information only',      <?php echo $num_allegations_received_2015_refsecreio ?>],
['Allegations referred to an external agency',      <?php echo $num_allegations_received_2015_refea ?>],
['Allegations merged in CMS',  <?php echo $num_allegations_received_2015_mergecms ?>],
['Allegations merged in CSS', <?php echo $num_allegations_received_2015_mergecss ?>],
['Information Report',    <?php echo $num_allegations_received_2015_information_report ?>],
['No further action',    <?php echo $num_allegations_received_2015_dismissed ?>],
['Pending', <?php echo $total_pending_2015 ?>]
]);

var options = {
	width: 1000,
    height: 300,
	chartArea: {'width': '100%', 'height': '100%'},
	pieHole: 0.2,
	legend: {
 position: 'labeled',
 pieSliceText:"value"                                    
 },
 is3D: true,
title: ''
};

var chart2015 = new google.visualization.PieChart(document.getElementById('piechart2015'));

chart2015.draw(data, options);
}
</script>                     
                      
                      
                      </td>
                    </tr>
                    <tr>
                      <td align="right"><em>Cases opened in CMS for Investigation in 2016</em></td>
                      <td align="right"><?php echo $num_allegations_received_2015_open_case_2016; ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat for information only</td>
                      <td align="right"><?php echo $num_allegations_received_2015_refsecreio;  ?></td>
                      <td align="right"><font size="+1"><strong>Allegations received :</strong></font></td>
                      <td align="center"><font style="font-size:25px"><strong>
                        <?php
						echo $num_allegations_received_2015;				
						?>
                      </strong></font></td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat for management action</td>
                      <td align="right"><?php echo $num_allegations_received_2015_refsecrema;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to an external agency</td>
                      <td align="right"><?php echo $num_allegations_received_2015_refea;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing case in CMS</td>
                      <td align="right"><?php echo $num_allegations_received_2015_mergecms;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing allegation</td>
                      <td align="right"><?php echo $num_allegations_received_2015_mergecss;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                     <tr>
                      <td align="right">Information Report</td>
                      <td align="right"><?php echo $num_allegations_received_2015_information_report;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">No further action</td>
                      <td align="right"><?php echo $num_allegations_received_2015_dismissed;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Pending for Screening Review</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2015_screening_review;
echo "</font>";
						?></td>
                    </tr>
                    <tr>
                      <td align="right">Pending Finalization</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2015_pending_final;
echo "</font>";
?></td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5" align="center">
                      <div id="piechart2015" style="width: 1000px; height: 300px;" align="left"></div>
                      
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="center"><font size="+3"><strong> 2014</strong></font></td>
                    </tr>
                    <tr>
                      <td align="right"><em>Cases opened in CMS for Investigation in 2014</em></td>
                      <td align="right"><?php echo $num_allegations_received_2014_open_case;  ?></td>
                      <td colspan="3" align="center">
                      
                      
                      
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

var data = google.visualization.arrayToDataTable([
['2014', '2014'],
['Cases opened',     <?php echo $total_open_cases_2014 ?>],
['Allegations referred to the Secretariat for management action',      <?php echo $num_allegations_received_2014_refsecrema ?>],
['Allegations referred to the Secretariat for information only',      <?php echo $num_allegations_received_2014_refsecreio ?>],
['Allegations referred to an external agency',      <?php echo $num_allegations_received_2014_refea ?>],
['Allegations merged in CMS',  <?php echo $num_allegations_received_2014_mergecms ?>],
['Allegations merged in CSS', <?php echo $num_allegations_received_2014_mergecss ?>],
['Information Report',    <?php echo $num_allegations_received_2014_information_report ?>],
['No further action',    <?php echo $num_allegations_received_2014_dismissed ?>],
['Pending', <?php echo $total_pending_2014 ?>]
]);

var options = {
	width: 1000,
    height: 300,
	chartArea: {'width': '100%', 'height': '100%'},
	pieHole: 0.2,
	legend: {
 position: 'labeled',
 pieSliceText:"value"                                    
 },
 is3D: true,
title: ''
};

var chart = new google.visualization.PieChart(document.getElementById('piechart2014'));

chart.draw(data, options);
}
</script></td>
                    </tr>
                    <tr>
                      <td align="right"><em>Cases opened in CMS for Investigation in 2015</em></td>
                      <td align="right"><?php echo $num_allegations_received_2014_open_case_2015; ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat for information only</td>
                      <td align="right"><?php echo $num_allegations_received_2014_refsecreio;  ?></td>
                      <td align="right"><font size="+1"><strong>Allegations received :</strong></font></td>
                      <td align="center"><font style="font-size:25px"><strong>
                        <?php
						echo $num_allegations_received_2014;				
						?>
                      </strong></font></td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat for management action</td>
                      <td align="right"><?php echo $num_allegations_received_2014_refsecrema;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to an external agency</td>
                      <td align="right"><?php echo $num_allegations_received_2014_refea;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing case in CMS</td>
                      <td align="right"><?php echo $num_allegations_received_2014_mergecms;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing allegation</td>
                      <td align="right"><?php echo $num_allegations_received_2014_mergecss;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Information Report</td>
                      <td align="right"><?php echo $num_allegations_received_2014_information_report;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">No further action</td>
                      <td align="right"><?php echo $num_allegations_received_2014_dismissed;  ?></td>
                    </tr>
                    <tr>
                      <td align="right">Pending for Screening Review</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2014_screening_review;
echo "</font>";
						?></td>
                    </tr>
                    <tr>
                      <td align="right">Pending Finalization</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2014_pending_final;
echo "</font>";
?>
</td>
</tr>


  <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="center"><div id="piechart2014" style="width: 1000px; height: 300px;" align="left"></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="3" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
  </tr>
  <tr>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="3" align="center"><font size="+3"><strong> 2013</strong></font></td>
                    </tr>
                    <tr>
                      <td align="right"><em>Cases opened in CMS for Investigation in 2013</em></td>
                      <td align="right"><?php echo $num_allegations_received_2013_open_case;	?></td>
                      <td colspan="3" align="center"><script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

var data = google.visualization.arrayToDataTable([
['2013', '2013'],
['Cases opened',     <?php echo $num_allegations_received_2013_open_case ?>],
['Allegations referred to the Secretariat',      <?php echo $num_allegations_received_2013_secr ?>],
['Allegations merged in CMS',  <?php echo $num_allegations_received_2013_mercms ?>],
['Allegations merged in CSS', <?php echo $num_allegations_received_2013_css ?>],
['No further action',    <?php echo $num_allegations_received_2013_dismissed ?>],
['Pending', <?php echo $total_pending_2013 ?>]
]);

var options = {
	width: 1000,
    height: 300,
	chartArea: {'width': '100%', 'height': '100%'},
	pieHole: 0.2,
	legend: {
 position: 'labeled',
 pieSliceText:"value"                                    
 },
 is3D: true,
title: ''
};

var chart = new google.visualization.PieChart(document.getElementById('piechart2013'));

chart.draw(data, options);
}
</script></td>
                    </tr>
                    <tr>
                      <td align="right"><em>Cases opened in CMS for Investigation in 2014</em></td>
                      <td align="right"><?php echo $num_allegations_received_2013_open_case_2014; ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Referrals to the Secretariat</td>
                      <td align="right"><?php echo $num_allegations_received_2013_secr ;  ?></td>
                      <td align="right"><font size="+1"><strong>Allegations received :</strong></font></td>
                      <td align="center"><font style="font-size:25px"><strong>
                        <?php
						echo $num_allegations_received_2013;			
						?>
                      </strong></font></td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing case in CMS</td>
                      <td align="right"><?php echo $num_allegations_received_2013_mercms;  ?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Merged with an existing allegation</td>
                      <td align="right"><?php echo $num_allegations_received_2013_css;  	?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">No further action</td>
                      <td align="right"><?php echo $num_allegations_received_2013_dismissed ;  	?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Pending for Screening Review</td>
                      <td align="right"><?php
echo "<font color='#FF0000'>";
echo $num_allegations_received_2013_screening_review;
echo "</font>";
						?></td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">Pending Finalization</td>
                      <td align="right">
						<?php
                        echo "<font color='#FF0000'>";
                        echo $num_allegations_received_2013_pending_final;
                        echo "</font>";
                        ?>
                        </td>
                      <td colspan="3" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td colspan="3" align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5" align="center"><div id="piechart2013" style="width: 1000px; height: 300px;" align="left"></div></td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td colspan="3" align="right">&nbsp;</td>
                    </tr>
</table>
<div id="divproactive" title="Proactive Assessments 2016">
<iframe id="modalproactive" frameborder="0" width="1375" height="850">
Your browser is not supported
</iframe>
</div>
</body>
</html>