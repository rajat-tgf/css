 <?php

 require_once("includes\\opendb.php");

?>
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#FFFFFF;
	text-align: left;
}
table.gridtable th {
	font-size:11px;
	padding: 3px;
	background-color: #959595;
}
table.gridtable td {
	color:#666666;
	padding: 3px;
	border:none;
	background-color: #FFFFFF;
}
</style>
<?php

//----------------------------------------------------Confidential Whistleblower

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw = sqlsrv_num_rows($result_allegations_source_cw);

//-----------------------------


$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_oigi = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_oiga = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_oigo = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_sec = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_secl = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'LFA' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_lfa = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'CCM' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_ccm = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'PR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_pr = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'SR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_sr = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'SSR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_ssr = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Supplier' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_sup = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_int = sqlsrv_num_rows($result_allegations_source_cw);

$result_allegations_source_cw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_cw_oth = sqlsrv_num_rows($result_allegations_source_cw);

	

//------------------------------------------------------------Anonymous Whistleblower

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw = sqlsrv_num_rows($result_allegations_source_aw);

//----------------------------------------------


$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_oigi = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_oiga = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_oigo = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_sec = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_secl = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'LFA' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_lfa = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'CCM' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_ccm = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'PR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_pr = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'SR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_sr = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'SSR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_ssr = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Supplier' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_sup = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_int = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_oth = sqlsrv_num_rows($result_allegations_source_aw);


//---------------------------------------------------------------------Reporter

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r = sqlsrv_num_rows($result_allegations_source_r);

//------------------------------------------------


$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_oigi = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_oiga = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_oigo = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_sec = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_secl = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'LFA' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_lfa = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'CCM' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_ccm = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'PR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_pr = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'SR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_sr = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'SSR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_ssr = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Supplier' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_sup = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_int = sqlsrv_num_rows($result_allegations_source_r);

$result_allegations_source_r = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_r_oth = sqlsrv_num_rows($result_allegations_source_r);


//-----------------------------------------------------------------------Confidential Informant

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci = sqlsrv_num_rows($result_allegations_source_ci);

//-----------------------------------------------------



$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_oigi = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_oiga = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_oigo = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_sec = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_secl = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'LFA' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_lfa = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'CCM' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_ccm = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'PR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_pr = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'SR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_sr = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'SSR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_ssr = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Supplier' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_sup = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_int = sqlsrv_num_rows($result_allegations_source_ci);

$result_allegations_source_ci = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_ci_oth = sqlsrv_num_rows($result_allegations_source_ci);




//-----------------------------------------------------------------------Witness

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w = sqlsrv_num_rows($result_allegations_source_w);

//---------------------------------------



$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_oigi = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_oiga = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_oigo = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_sec = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_secl = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'LFA' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_lfa = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'CCM' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_ccm = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'PR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_pr = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'SR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_sr = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'SSR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_ssr = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Supplier' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_sup = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_int = sqlsrv_num_rows($result_allegations_source_w);

$result_allegations_source_w = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_w_oth = sqlsrv_num_rows($result_allegations_source_w);


//------------------------------------------------------------Other
$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth = sqlsrv_num_rows($result_allegations_source_oth);

//---------------------------------------------




$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_oigi = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_oiga = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_oigo = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_sec = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_secl = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'LFA' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_lfa = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'CCM' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_ccm = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'PR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_pr = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'SR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_sr = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'SSR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_ssr = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Supplier' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_sup = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_int = sqlsrv_num_rows($result_allegations_source_oth);

$result_allegations_source_oth = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_oth_oth = sqlsrv_num_rows($result_allegations_source_oth);




$num_total_allegations = $num_allegations_source_cw + $num_allegations_source_aw + $num_allegations_source_r + $num_allegations_source_ci + $num_allegations_source_w + $num_allegations_source_oth;

$num = 5;
?>


<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});

  google.setOnLoadCallback(drawChart1<?php echo $year; ?>); 
  function drawChart1<?php echo $year; ?>() {
	  
  var dataSet = [
        ['SC', 'OIG Investigations', 'OIG Audit', 'OIG Other', 'Secretariat', 'Secretariat(LFA)', 'LFA', 'CCM', 'PR', 'SR', 'SSR', 'Supplier', 'Inter-agency', 'Other', { role: 'annotation' }],
        ['Confidential Whistleblower', 
		<?php echo $num_allegations_source_cw_oigi ?>, 
		<?php echo $num_allegations_source_cw_oiga ?>, 
		<?php echo $num_allegations_source_cw_oigo ?>, 
		<?php echo $num_allegations_source_cw_sec ?>, 
		<?php echo $num_allegations_source_cw_secl ?>, 
		<?php echo $num_allegations_source_cw_lfa ?>, 
		<?php echo $num_allegations_source_cw_ccm ?>, 
		<?php echo $num_allegations_source_cw_pr ?>, 
		<?php echo $num_allegations_source_cw_sr ?>, 
		<?php echo $num_allegations_source_cw_ssr ?>, 
		<?php echo $num_allegations_source_cw_sup ?>, 
		<?php echo $num_allegations_source_cw_int ?>, 
		<?php echo $num_allegations_source_cw_oth ?>,
		''],
		['Anonymous Whistleblower', 
		<?php echo $num_allegations_source_aw_oigi ?>, 
		<?php echo $num_allegations_source_aw_oiga ?>, 
		<?php echo $num_allegations_source_aw_oigo ?>, 
		<?php echo $num_allegations_source_aw_sec ?>, 
		<?php echo $num_allegations_source_aw_secl ?>, 
		<?php echo $num_allegations_source_aw_lfa ?>, 
		<?php echo $num_allegations_source_aw_ccm ?>, 
		<?php echo $num_allegations_source_aw_pr ?>, 
		<?php echo $num_allegations_source_aw_sr ?>, 
		<?php echo $num_allegations_source_aw_ssr ?>, 
		<?php echo $num_allegations_source_aw_sup ?>, 
		<?php echo $num_allegations_source_aw_int ?>, 
		<?php echo $num_allegations_source_aw_oth ?>,
		''],
		['Reporter', 
		<?php echo $num_allegations_source_r_oigi ?>, 
		<?php echo $num_allegations_source_r_oiga ?>, 
		<?php echo $num_allegations_source_r_oigo ?>, 
		<?php echo $num_allegations_source_r_sec ?>, 
		<?php echo $num_allegations_source_r_secl ?>, 
		<?php echo $num_allegations_source_r_lfa ?>, 
		<?php echo $num_allegations_source_r_ccm ?>, 
		<?php echo $num_allegations_source_r_pr ?>, 
		<?php echo $num_allegations_source_r_sr ?>, 
		<?php echo $num_allegations_source_r_ssr ?>, 
		<?php echo $num_allegations_source_r_sup ?>, 
		<?php echo $num_allegations_source_r_int ?>, 
		<?php echo $num_allegations_source_r_oth ?>,
		''],
		['Confidential Informant', 
		<?php echo $num_allegations_source_ci_oigi ?>, 
		<?php echo $num_allegations_source_ci_oiga ?>, 
		<?php echo $num_allegations_source_ci_oigo ?>, 
		<?php echo $num_allegations_source_ci_sec ?>, 
		<?php echo $num_allegations_source_ci_secl ?>, 
		<?php echo $num_allegations_source_ci_lfa ?>, 
		<?php echo $num_allegations_source_ci_ccm ?>, 
		<?php echo $num_allegations_source_ci_pr ?>, 
		<?php echo $num_allegations_source_ci_sr ?>, 
		<?php echo $num_allegations_source_ci_ssr ?>, 
		<?php echo $num_allegations_source_ci_sup ?>, 
		<?php echo $num_allegations_source_ci_int ?>, 
		<?php echo $num_allegations_source_ci_oth ?>,
		''],
		['Witness', 
		<?php echo $num_allegations_source_w_oigi ?>, 
		<?php echo $num_allegations_source_w_oiga ?>, 
		<?php echo $num_allegations_source_w_oigo ?>, 
		<?php echo $num_allegations_source_w_sec ?>, 
		<?php echo $num_allegations_source_w_secl ?>, 
		<?php echo $num_allegations_source_w_lfa ?>, 
		<?php echo $num_allegations_source_w_ccm ?>, 
		<?php echo $num_allegations_source_w_pr ?>, 
		<?php echo $num_allegations_source_w_sr ?>, 
		<?php echo $num_allegations_source_w_ssr ?>, 
		<?php echo $num_allegations_source_w_sup ?>, 
		<?php echo $num_allegations_source_w_int ?>, 
		<?php echo $num_allegations_source_w_oth ?>,
		''],
		['Other', 
		<?php echo $num_allegations_source_oth_oigi ?>, 
		<?php echo $num_allegations_source_oth_oiga ?>, 
		<?php echo $num_allegations_source_oth_oigo ?>, 
		<?php echo $num_allegations_source_oth_sec ?>, 
		<?php echo $num_allegations_source_oth_secl ?>, 
		<?php echo $num_allegations_source_oth_lfa ?>, 
		<?php echo $num_allegations_source_oth_ccm ?>, 
		<?php echo $num_allegations_source_oth_pr ?>, 
		<?php echo $num_allegations_source_oth_sr ?>, 
		<?php echo $num_allegations_source_oth_ssr ?>, 
		<?php echo $num_allegations_source_oth_sup ?>, 
		<?php echo $num_allegations_source_oth_int ?>, 
		<?php echo $num_allegations_source_oth_oth ?>,
		'']];
	  
    var data = google.visualization.arrayToDataTable( dataSet );

    var options = {
      title: '',
	  chartArea: {'top': '1%'},
	  hAxis: {slantedText: true},
	  width: 1000,
      height: 600,
	  
      vAxis: {title: 'Complaints', maxValue: 40},  // sets the maximum value
      isStacked: 'true',
	  annotations: {
          alwaysOutside: true},                
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1<?php echo $year; ?>'));
    chart.draw(data, options);
  }
/*
      google.load("visualization", "1", {packages:["table"]});
      google.setOnLoadCallback(drawTable<?php echo $year; ?>);

      function drawTable<?php echo $year; ?>() {
        var data = new google.visualization.DataTable();
		data.addColumn('string', '');
        data.addColumn('number', 'Confidential Whistleblower');
		data.addColumn('number', 'Anonymous Whistleblower');
        data.addColumn('number', 'Reporter');
		data.addColumn('number', 'Confidential Informant');
		data.addColumn('number', 'Witness');
		data.addColumn('number', 'Other');
        data.addRows([
          ['OIG Investigations',  
		  <?php echo $num_allegations_source_cw_oigi ?>,
		   <?php echo $num_allegations_source_aw_oigi ?>,
		  <?php echo $num_allegations_source_r_oigi ?>,
		  <?php echo $num_allegations_source_ci_oigi ?>,
		  <?php echo $num_allegations_source_w_oigi ?>,
		  <?php echo $num_allegations_source_oth_oigi ?>],
          ['OIG Audit',   
		  <?php echo $num_allegations_source_cw_oiga ?>,
		   <?php echo $num_allegations_source_aw_oiga ?>,
		  <?php echo $num_allegations_source_r_oiga ?>,
		  <?php echo $num_allegations_source_ci_oiga ?>,
		  <?php echo $num_allegations_source_w_oiga ?>,
		  <?php echo $num_allegations_source_oth_oiga ?>],
          ['OIG Other', 
		  <?php echo $num_allegations_source_cw_oigo ?>,
		   <?php echo $num_allegations_source_aw_oigo ?>,
		  <?php echo $num_allegations_source_r_oigo ?>,
		  <?php echo $num_allegations_source_ci_oigo ?>,
		  <?php echo $num_allegations_source_w_oigo ?>,
		  <?php echo $num_allegations_source_oth_oigo ?>],
          ['Secretariat',   
		  <?php echo $num_allegations_source_cw_sec ?>,
		   <?php echo $num_allegations_source_aw_sec ?>,
		  <?php echo $num_allegations_source_r_sec ?>,
		  <?php echo $num_allegations_source_ci_sec ?>,
		  <?php echo $num_allegations_source_w_sec ?>,
		  <?php echo $num_allegations_source_oth_sec ?>],
		  ['Secretariat (via LFA)',   
		  <?php echo $num_allegations_source_cw_secl ?>,
		  <?php echo $num_allegations_source_aw_secl ?>,
		   <?php echo $num_allegations_source_r_secl ?>,
		  <?php echo $num_allegations_source_ci_secl ?>,
		  <?php echo $num_allegations_source_w_secl ?>,
		  <?php echo $num_allegations_source_oth_secl ?>],
		  ['LFA',   
		  <?php echo $num_allegations_source_cw_lfa ?>,
		  <?php echo $num_allegations_source_aw_lfa ?>,
		  <?php echo $num_allegations_source_r_lfa ?>,
		   <?php echo $num_allegations_source_ci_lfa ?>,
		  <?php echo $num_allegations_source_w_lfa ?>,
		  <?php echo $num_allegations_source_oth_lfa ?>],
		  ['CCM',   
		  <?php echo $num_allegations_source_cw_ccm ?>,
		  <?php echo $num_allegations_source_aw_ccm ?>,
		  <?php echo $num_allegations_source_r_ccm ?>,
		   <?php echo $num_allegations_source_ci_ccm ?>,
		  <?php echo $num_allegations_source_w_ccm ?>,
		  <?php echo $num_allegations_source_oth_ccm ?>],
		  ['PR',   
		  <?php echo $num_allegations_source_cw_pr ?>,
		  <?php echo $num_allegations_source_aw_pr ?>,
		   <?php echo $num_allegations_source_r_pr ?>,
		  <?php echo $num_allegations_source_ci_pr ?>,
		  <?php echo $num_allegations_source_w_pr ?>,
		  <?php echo $num_allegations_source_oth_pr ?>],
		  ['SR',   
		  <?php echo $num_allegations_source_cw_sr ?>,
		  <?php echo $num_allegations_source_aw_sr ?>,
		  <?php echo $num_allegations_source_r_sr ?>,
		   <?php echo $num_allegations_source_ci_sr ?>,
		  <?php echo $num_allegations_source_w_sr ?>,
		  <?php echo $num_allegations_source_oth_sr ?>],
		  ['SSR',   
		  <?php echo $num_allegations_source_cw_ssr ?>,
		  <?php echo $num_allegations_source_aw_ssr ?>,
		   <?php echo $num_allegations_source_r_ssr ?>,
		  <?php echo $num_allegations_source_ci_ssr ?>,
		  <?php echo $num_allegations_source_w_ssr ?>,
		  <?php echo $num_allegations_source_oth_ssr ?>],
		  ['Supplier',   
		  <?php echo $num_allegations_source_cw_sup ?>,
		  <?php echo $num_allegations_source_aw_sup ?>,
		  <?php echo $num_allegations_source_r_sup ?>,
		   <?php echo $num_allegations_source_ci_sup ?>,
		  <?php echo $num_allegations_source_w_sup ?>,
		  <?php echo $num_allegations_source_oth_sup ?>],
		  ['Inter-agency',   
		  <?php echo $num_allegations_source_cw_int ?>,
		   <?php echo $num_allegations_source_aw_int ?>,
		  <?php echo $num_allegations_source_r_int ?>,
		  <?php echo $num_allegations_source_ci_int ?>,
		  <?php echo $num_allegations_source_w_int ?>,
		  <?php echo $num_allegations_source_oth_int ?>],
		  ['Other',   
		  <?php echo $num_allegations_source_cw_oth ?>,
		   <?php echo $num_allegations_source_aw_oth ?>,
		  <?php echo $num_allegations_source_r_oth ?>,
		  <?php echo $num_allegations_source_ci_oth ?>,
		  <?php echo $num_allegations_source_w_oth ?>,
		  <?php echo $num_allegations_source_oth_oth ?>
		  ]]);

        var table = new google.visualization.Table(document.getElementById('table_div<?php echo $year; ?>'));

        table.draw(data, {showRowNumber: false, allowHtml: true});
      }
	  */
    </script>

<br />
<table width="1250" height="672" align="center" class="gridtable">
<tr>
<td width="1006" rowspan="2" align="right">&nbsp;</td>
<td width="232" align="left"><strong>Year <?php echo $year; ?> </strong>(<?php echo $num_total_allegations ?> allegations)</td>
</tr>
<tr>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td colspan="2" align="center"><div id="chart_div1<?php echo $year; ?>" style="width: 1000px; height: 600px;" align="left"></div><br />
<br />
<div id="table_div<?php echo $year; ?>"></div></td>
</tr>
</table>
