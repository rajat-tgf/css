 <?php

require_once("includes\\opendb.php");
					  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

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

<style type="text/css">
table.gridtablew {
	font-family: verdana,arial,sans-serif;
	font-size:10px;
	color:#FFFFFF;
	text-align: left;
}
table.gridtablew th {
	font-size:10px;
	padding: 3px;
	background-color: #959595;
}
table.gridtablew td {
	color:#666666;
	padding: 3px;
	border:none;
	background-color: #FFFFFF;
}
</style>

<SCRIPT LANGUAGE="JavaScript">

function link_allegations() 
{
		var windowW=760
		var windowH=940
		var windowX = 100
		var windowY = 130
		var url = "add_new_entity.php";

		s = "scrollbars=yes"+",width="+windowW+",height="+windowH;

		blwindow = window.open(url,"Popup",","+s);
		windowX = (screen.width) ? (screen.width-windowW)/2 : 0;
		windowY = (screen.height) ? (screen.height-windowH)/2 : 0;
		blwindow.focus();
		blwindow.resizeTo(windowW,windowH);
		blwindow.moveTo(windowX,windowY);
}
</script>

<?php

//----------------------------------------------------Confidential Whistleblower

$result_allegations_source_cw__2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_2015 = sqlsrv_num_rows($result_allegations_source_cw__2015);

//-----------------------------


$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_oigi_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_oiga_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_oigo_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_sec_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_secl_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'LFA' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_lfa_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'CCM' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_ccm_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'PR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_pr_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'SR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_sr_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'SSR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_ssr_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Supplier' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_sup_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_int_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

$result_allegations_source_cw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_cw_oth_2015 = sqlsrv_num_rows($result_allegations_source_cw_2015);

	

//------------------------------------------------------------Anonymous Whistleblower

$result_allegations_source_aw__2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_2015 = sqlsrv_num_rows($result_allegations_source_aw__2015);

//----------------------------------------------


$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_oigi_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_oiga_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_oigo_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_sec_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_secl_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'LFA' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_lfa_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'CCM' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_ccm_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'PR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_pr_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'SR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_sr_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'SSR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_ssr_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Supplier' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_sup_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_int_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);

$result_allegations_source_aw_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_aw_oth_2015 = sqlsrv_num_rows($result_allegations_source_aw_2015);


//---------------------------------------------------------------------Reporter

$result_allegations_source_r__2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_2015 = sqlsrv_num_rows($result_allegations_source_r__2015);

//------------------------------------------------


$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_oigi_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_oiga_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_oigo_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_sec_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_secl_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'LFA' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_lfa_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'CCM' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_ccm_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'PR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_pr_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'SR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_sr_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'SSR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_ssr_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Supplier' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_sup_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_int_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);

$result_allegations_source_r_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_r_oth_2015 = sqlsrv_num_rows($result_allegations_source_r_2015);


//-----------------------------------------------------------------------Confidential Informant

$result_allegations_source_ci__2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_2015 = sqlsrv_num_rows($result_allegations_source_ci__2015);

//-----------------------------------------------------



$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_oigi_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_oiga_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_oigo_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_sec_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_secl_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'LFA' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_lfa_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'CCM' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_ccm_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'PR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_pr_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'SR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_sr_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'SSR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_ssr_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Supplier' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_sup_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_int_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);

$result_allegations_source_ci_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_ci_oth_2015 = sqlsrv_num_rows($result_allegations_source_ci_2015);




//-----------------------------------------------------------------------Witness

$result_allegations_source_w__2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_2015 = sqlsrv_num_rows($result_allegations_source_w__2015);

//---------------------------------------



$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_oigi_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_oiga_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_oigo_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_sec_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_secl_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'LFA' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_lfa_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'CCM' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_ccm_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'PR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_pr_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'SR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_sr_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'SSR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_ssr_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Supplier' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_sup_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_int_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);

$result_allegations_source_w_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_w_oth_2015 = sqlsrv_num_rows($result_allegations_source_w_2015);


//------------------------------------------------------------Other
$result_allegations_source_oth__2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_2015 = sqlsrv_num_rows($result_allegations_source_oth__2015);

//---------------------------------------------




$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_oigi_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_oiga_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_oigo_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Secretariat' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_sec_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_secl_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'LFA' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_lfa_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'CCM' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_ccm_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'PR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_pr_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'SR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_sr_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'SSR' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_ssr_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Supplier' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_sup_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_int_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);

$result_allegations_source_oth_2015 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Other' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_source_oth_oth_2015 = sqlsrv_num_rows($result_allegations_source_oth_2015);




$num_total_allegations_2015 = $num_allegations_source_cw_2015 + $num_allegations_source_aw_2015 + $num_allegations_source_r_2015 + $num_allegations_source_ci_2015 + $num_allegations_source_w_2015 + $num_allegations_source_oth_2015;

$num = 5;
?>


<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
 
  var dataSet = [
        ['SC', 'OIG Investigations', 'OIG Audit', 'OIG Other', 'Secretariat', 'Secretariat(LFA)', 'LFA', 'CCM', 'PR', 'SR', 'SSR', 'Supplier', 'Inter-agency', 'Other', { role: 'annotation' }],
        ['Confidential Whistleblower', 
		<?php echo $num_allegations_source_cw_oigi_2015 ?>, 
		<?php echo $num_allegations_source_cw_oiga_2015 ?>, 
		<?php echo $num_allegations_source_cw_oigo_2015 ?>, 
		<?php echo $num_allegations_source_cw_sec_2015 ?>, 
		<?php echo $num_allegations_source_cw_secl_2015 ?>, 
		<?php echo $num_allegations_source_cw_lfa_2015 ?>, 
		<?php echo $num_allegations_source_cw_ccm_2015 ?>, 
		<?php echo $num_allegations_source_cw_pr_2015 ?>, 
		<?php echo $num_allegations_source_cw_sr_2015 ?>, 
		<?php echo $num_allegations_source_cw_ssr_2015 ?>, 
		<?php echo $num_allegations_source_cw_sup_2015 ?>, 
		<?php echo $num_allegations_source_cw_int_2015 ?>, 
		<?php echo $num_allegations_source_cw_oth_2015 ?>,
		<?php echo $num_allegations_source_cw_2015 ?>],
		['Anonymous Whistleblower', 
		<?php echo $num_allegations_source_aw_oigi_2015 ?>, 
		<?php echo $num_allegations_source_aw_oiga_2015 ?>, 
		<?php echo $num_allegations_source_aw_oigo_2015 ?>, 
		<?php echo $num_allegations_source_aw_sec_2015 ?>, 
		<?php echo $num_allegations_source_aw_secl_2015 ?>, 
		<?php echo $num_allegations_source_aw_lfa_2015 ?>, 
		<?php echo $num_allegations_source_aw_ccm_2015 ?>, 
		<?php echo $num_allegations_source_aw_pr_2015 ?>, 
		<?php echo $num_allegations_source_aw_sr_2015 ?>, 
		<?php echo $num_allegations_source_aw_ssr_2015 ?>, 
		<?php echo $num_allegations_source_aw_sup_2015 ?>, 
		<?php echo $num_allegations_source_aw_int_2015 ?>, 
		<?php echo $num_allegations_source_aw_oth_2015 ?>,
		<?php echo $num_allegations_source_aw_2015 ?>],
		['Reporter', 
		<?php echo $num_allegations_source_r_oigi_2015 ?>, 
		<?php echo $num_allegations_source_r_oiga_2015 ?>, 
		<?php echo $num_allegations_source_r_oigo_2015 ?>, 
		<?php echo $num_allegations_source_r_sec_2015 ?>, 
		<?php echo $num_allegations_source_r_secl_2015 ?>, 
		<?php echo $num_allegations_source_r_lfa_2015 ?>, 
		<?php echo $num_allegations_source_r_ccm_2015 ?>, 
		<?php echo $num_allegations_source_r_pr_2015 ?>, 
		<?php echo $num_allegations_source_r_sr_2015 ?>, 
		<?php echo $num_allegations_source_r_ssr_2015 ?>, 
		<?php echo $num_allegations_source_r_sup_2015 ?>, 
		<?php echo $num_allegations_source_r_int_2015 ?>, 
		<?php echo $num_allegations_source_r_oth_2015 ?>,
		<?php echo $num_allegations_source_r_2015 ?>],
		['Confidential Informant', 
		<?php echo $num_allegations_source_ci_oigi_2015 ?>, 
		<?php echo $num_allegations_source_ci_oiga_2015 ?>, 
		<?php echo $num_allegations_source_ci_oigo_2015 ?>, 
		<?php echo $num_allegations_source_ci_sec_2015 ?>, 
		<?php echo $num_allegations_source_ci_secl_2015 ?>, 
		<?php echo $num_allegations_source_ci_lfa_2015 ?>, 
		<?php echo $num_allegations_source_ci_ccm_2015 ?>, 
		<?php echo $num_allegations_source_ci_pr_2015 ?>, 
		<?php echo $num_allegations_source_ci_sr_2015 ?>, 
		<?php echo $num_allegations_source_ci_ssr_2015 ?>, 
		<?php echo $num_allegations_source_ci_sup_2015 ?>, 
		<?php echo $num_allegations_source_ci_int_2015 ?>, 
		<?php echo $num_allegations_source_ci_oth_2015 ?>,
		<?php echo $num_allegations_source_ci_2015 ?>],
		['Witness', 
		<?php echo $num_allegations_source_w_oigi_2015 ?>, 
		<?php echo $num_allegations_source_w_oiga_2015 ?>, 
		<?php echo $num_allegations_source_w_oigo_2015 ?>, 
		<?php echo $num_allegations_source_w_sec_2015 ?>, 
		<?php echo $num_allegations_source_w_secl_2015 ?>, 
		<?php echo $num_allegations_source_w_lfa_2015 ?>, 
		<?php echo $num_allegations_source_w_ccm_2015 ?>, 
		<?php echo $num_allegations_source_w_pr_2015 ?>, 
		<?php echo $num_allegations_source_w_sr_2015 ?>, 
		<?php echo $num_allegations_source_w_ssr_2015 ?>, 
		<?php echo $num_allegations_source_w_sup_2015 ?>, 
		<?php echo $num_allegations_source_w_int_2015 ?>, 
		<?php echo $num_allegations_source_w_oth_2015 ?>,
		<?php echo $num_allegations_source_w_2015 ?>],
		['Other', 
		<?php echo $num_allegations_source_oth_oigi_2015 ?>, 
		<?php echo $num_allegations_source_oth_oiga_2015 ?>, 
		<?php echo $num_allegations_source_oth_oigo_2015 ?>, 
		<?php echo $num_allegations_source_oth_sec_2015 ?>, 
		<?php echo $num_allegations_source_oth_secl_2015 ?>, 
		<?php echo $num_allegations_source_oth_lfa_2015 ?>, 
		<?php echo $num_allegations_source_oth_ccm_2015 ?>, 
		<?php echo $num_allegations_source_oth_pr_2015 ?>, 
		<?php echo $num_allegations_source_oth_sr_2015 ?>, 
		<?php echo $num_allegations_source_oth_ssr_2015 ?>, 
		<?php echo $num_allegations_source_oth_sup_2015 ?>, 
		<?php echo $num_allegations_source_oth_int_2015 ?>, 
		<?php echo $num_allegations_source_oth_oth_2015 ?>,
		<?php echo $num_allegations_source_oth_2015 ?>]];


  google.setOnLoadCallback(drawChart1); 
  function drawChart1() {
    var data = google.visualization.arrayToDataTable( dataSet );

    var options = {
      title: '',
	  hAxis: {slantedText: true},
	  width: 800,
      height: 530,
	  
      vAxis: {title: 'Complaints', maxValue: 30},  // sets the maximum value
      isStacked: 'true',
	  annotations: {
          alwaysOutside: false,
          textStyle: {
            fontSize: 12,
            color: '#000'
          }},                
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  
</script>


<script type="text/javascript">
      google.load("visualization", "1", {packages:["table"]});
      google.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
		data.addColumn('string', '');
        data.addColumn('string', 'Confidential Whistleblower');
		data.addColumn('number', 'Anonymous Whistleblower');
        data.addColumn('number', 'Reporter');
		data.addColumn('number', 'Confidential Informant');
		data.addColumn('number', 'Witness');
		data.addColumn('number', 'Other');
        data.addRows([
          ['OIG Investigations',  
		  '<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		   <?php echo $num_allegations_source_aw_oigi_2015 ?>,
		  <?php echo $num_allegations_source_r_oigi_2015 ?>,
		  <?php echo $num_allegations_source_ci_oigi_2015 ?>,
		  <?php echo $num_allegations_source_w_oigi_2015 ?>,
		  <?php echo $num_allegations_source_oth_oigi_2015 ?>],
          ['OIG Audit',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		   <?php echo $num_allegations_source_aw_oiga_2015 ?>,
		  <?php echo $num_allegations_source_r_oiga_2015 ?>,
		  <?php echo $num_allegations_source_ci_oiga_2015 ?>,
		  <?php echo $num_allegations_source_w_oiga_2015 ?>,
		  <?php echo $num_allegations_source_oth_oiga_2015 ?>],
          ['OIG Other', 
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		   <?php echo $num_allegations_source_aw_oigo_2015 ?>,
		  <?php echo $num_allegations_source_r_oigo_2015 ?>,
		  <?php echo $num_allegations_source_ci_oigo_2015 ?>,
		  <?php echo $num_allegations_source_w_oigo_2015 ?>,
		  <?php echo $num_allegations_source_oth_oigo_2015 ?>],
          ['Secretariat',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		   <?php echo $num_allegations_source_aw_sec_2015 ?>,
		  <?php echo $num_allegations_source_r_sec_2015 ?>,
		  <?php echo $num_allegations_source_ci_sec_2015 ?>,
		  <?php echo $num_allegations_source_w_sec_2015 ?>,
		  <?php echo $num_allegations_source_oth_sec_2015 ?>],
		  ['Secretariat (via LFA)',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		  <?php echo $num_allegations_source_aw_secl_2015 ?>,
		   <?php echo $num_allegations_source_r_secl_2015 ?>,
		  <?php echo $num_allegations_source_ci_secl_2015 ?>,
		  <?php echo $num_allegations_source_w_secl_2015 ?>,
		  <?php echo $num_allegations_source_oth_secl_2015 ?>],
		  ['LFA',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		  <?php echo $num_allegations_source_aw_lfa_2015 ?>,
		  <?php echo $num_allegations_source_r_lfa_2015 ?>,
		   <?php echo $num_allegations_source_ci_lfa_2015 ?>,
		  <?php echo $num_allegations_source_w_lfa_2015 ?>,
		  <?php echo $num_allegations_source_oth_lfa_2015 ?>],
		  ['CCM',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		  <?php echo $num_allegations_source_aw_ccm_2015 ?>,
		  <?php echo $num_allegations_source_r_ccm_2015 ?>,
		   <?php echo $num_allegations_source_ci_ccm_2015 ?>,
		  <?php echo $num_allegations_source_w_ccm_2015 ?>,
		  <?php echo $num_allegations_source_oth_ccm_2015 ?>],
		  ['PR',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		  <?php echo $num_allegations_source_aw_pr_2015 ?>,
		   <?php echo $num_allegations_source_r_pr_2015 ?>,
		  <?php echo $num_allegations_source_ci_pr_2015 ?>,
		  <?php echo $num_allegations_source_w_pr_2015 ?>,
		  <?php echo $num_allegations_source_oth_pr_2015 ?>],
		  ['SR',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		  <?php echo $num_allegations_source_aw_sr_2015 ?>,
		  <?php echo $num_allegations_source_r_sr_2015 ?>,
		   <?php echo $num_allegations_source_ci_sr_2015 ?>,
		  <?php echo $num_allegations_source_w_sr_2015 ?>,
		  <?php echo $num_allegations_source_oth_sr_2015 ?>],
		  ['SSR',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		  <?php echo $num_allegations_source_aw_ssr_2015 ?>,
		   <?php echo $num_allegations_source_r_ssr_2015 ?>,
		  <?php echo $num_allegations_source_ci_ssr_2015 ?>,
		  <?php echo $num_allegations_source_w_ssr_2015 ?>,
		  <?php echo $num_allegations_source_oth_ssr_2015 ?>],
		  ['Supplier',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		  <?php echo $num_allegations_source_aw_sup_2015 ?>,
		  <?php echo $num_allegations_source_r_sup_2015 ?>,
		   <?php echo $num_allegations_source_ci_sup_2015 ?>,
		  <?php echo $num_allegations_source_w_sup_2015 ?>,
		  <?php echo $num_allegations_source_oth_sup_2015 ?>],
		  ['Inter-agency',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		   <?php echo $num_allegations_source_aw_int_2015 ?>,
		  <?php echo $num_allegations_source_r_int_2015 ?>,
		  <?php echo $num_allegations_source_ci_int_2015 ?>,
		  <?php echo $num_allegations_source_w_int_2015 ?>,
		  <?php echo $num_allegations_source_oth_int_2015 ?>],
		  ['Other',   
'<a href="javascript:link_allegations()"><?php echo $num_allegations_source_cw_oigi_2015 ?></a>',
		   <?php echo $num_allegations_source_aw_oth_2015 ?>,
		  <?php echo $num_allegations_source_r_oth_2015 ?>,
		  <?php echo $num_allegations_source_ci_oth_2015 ?>,
		  <?php echo $num_allegations_source_w_oth_2015 ?>,
		  <?php echo $num_allegations_source_oth_oth_2015 ?>
		  ]]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: false, allowHtml: true});
      }
    </script>


 


</head>

<body>

<br />
<table width="832" class="gridtablew">
<tr>
<td align="right"><strong>Year 2015</strong></td>
</tr>
</table>
<div id="chart_div1" style="width: 800px; height: 530px;" align="left"></div>
</p>
<br />

<p>
<div id="table_div"></div>
</p>
</body>
</html>