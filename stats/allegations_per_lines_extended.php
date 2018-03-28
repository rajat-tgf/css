 <?php
 
require_once("includes\\opendb.php");

?>
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:9px;
	color:#FFFFFF;
	text-align: left;
}
table.gridtable th {
	font-size:9px;
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

//-----------------------------------------------------Method

$result_allegations_email_account = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Whistleblower E-mail' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_wb_email = sqlsrv_num_rows($result_allegations_email_account);	

$result_allegations_FAX = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Other E-mail' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_other_email = sqlsrv_num_rows($result_allegations_FAX);

$result_allegations_Telephone = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Fax' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_fax = sqlsrv_num_rows($result_allegations_Telephone);

$result_allegations_Secretariat = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Post' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_post = sqlsrv_num_rows($result_allegations_Secretariat);

$result_allegations_Secretariat_LFA = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Personal complaint' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_personal = sqlsrv_num_rows($result_allegations_Secretariat_LFA);

$result_allegations_LFA = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Online report' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_online_report = sqlsrv_num_rows($result_allegations_LFA);

$result_allegations_Global_Compliance = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'External hotline' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_external_hotline = sqlsrv_num_rows($result_allegations_Global_Compliance);

$result_allegations_agency = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Internal hotline' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_internal_hotline = sqlsrv_num_rows($result_allegations_agency);

$num_total_allegations = $num_allegations_wb_email  + $num_allegations_other_email + $num_allegations_fax + $num_allegations_post + $num_allegations_personal + $num_allegations_online_report + $num_allegations_external_hotline + $num_allegations_internal_hotline;


//-----------------------------------------------------Referred from

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'OIG Investigations' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_oigi = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'OIG Audit' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_oiga = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'OIG Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_oigo = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'Secretariat' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_sec = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'Secretariat (via LFA)' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_secl = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'LFA' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_lfa = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'CCM' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_ccm = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'PR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_pr = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'SR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_sr = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'SSR' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_ssr = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'Supplier' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_sup = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'Inter-agency' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_int = sqlsrv_num_rows($result_allegations_source_aw);

$result_allegations_source_aw = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE referred_from = 'Other' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_source_aw_oth = sqlsrv_num_rows($result_allegations_source_aw);


$num_total_allegations_referred = $num_allegations_source_aw_oigi  + $num_allegations_source_aw_oiga + $num_allegations_source_aw_oigo + $num_allegations_source_aw_sec +$num_allegations_source_aw_secl + $num_allegations_source_aw_lfa + $num_allegations_source_aw_ccm + $num_allegations_source_aw_pr + $num_allegations_source_aw_sr + $num_allegations_source_aw_ssr + $num_allegations_source_aw_sup + $num_allegations_source_aw_int + $num_allegations_source_aw_oth;

//-------------------------------------------

?>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawchartpiemethod<?php echo $year; ?>);
      function drawchartpiemethod<?php echo $year; ?>() {

        var datachartpiemethod = google.visualization.arrayToDataTable([
          ['Category', '<?php echo $year; ?>'],
          ['Whistleblower E-mail',  <?php echo $num_allegations_wb_email ?>],
          ['Other E-mail',  <?php echo $num_allegations_other_email ?>],
          ['Fax',  <?php echo $num_allegations_fax ?>],
		  ['Post',  <?php echo $num_allegations_post ?>],
		  ['Personal complaint',  <?php echo $num_allegations_personal ?>],
		  ['Online report',  <?php echo $num_allegations_online_report ?>],
		  ['External hotline',  <?php echo $num_allegations_external_hotline ?>],
          ['Internal hotline',  <?php echo $num_allegations_internal_hotline ?>]
        ]);

 var options = {
			width: 900,
       		height: 300,
			chartArea: {'width': '100%', 'height': '100%'},
			pieHole: 0.6,
			legend: {
			 position: 'labeled',
			 pieSliceText:"value"                                    
			 },
			 is3D: true,
          title: ''
        };

        var chartpiemethod = new google.visualization.PieChart(document.getElementById('piechartmethod<?php echo $year; ?>'));

        chartpiemethod.draw(datachartpiemethod, options);
	  }

      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawchartpiereferred<?php echo $year; ?>);
      function drawchartpiereferred<?php echo $year; ?>() {

        var datachartpiereferred = google.visualization.arrayToDataTable([
          ['', '$year'],
          ['OIG Investigations',  <?php echo $num_allegations_source_aw_oigi ?>],
          ['OIG Audit',  <?php echo $num_allegations_source_aw_oiga ?>],
          ['OIG Other',  <?php echo $num_allegations_source_aw_oigo ?>],
		  ['Secretariat',  <?php echo $num_allegations_source_aw_sec ?>],
		  ['Secretariat (LFA)',  <?php echo $num_allegations_source_aw_secl ?>],
		  ['CCM',  <?php echo $num_allegations_source_aw_ccm ?>],
		  ['PR',  <?php echo $num_allegations_source_aw_pr ?>],
		  ['SR',  <?php echo $num_allegations_source_aw_sr ?>],
		  ['SSR',  <?php echo $num_allegations_source_aw_ssr ?>],
		  ['Supplier',  <?php echo $num_allegations_source_aw_sup ?>],
		  ['Inter-agency',  <?php echo $num_allegations_source_aw_int ?>],
          ['Other',  <?php echo $num_allegations_source_aw_oth ?>],
		  ['LFA',  <?php echo $num_allegations_source_aw_lfa ?>]
        ]);

 var options = {
			width: 900,
       		height: 300,
			chartArea: {'width': '100%', 'height': '100%'},
			pieHole: 0.6,
			legend: {
			 position: 'labeled',
			 pieSliceText:"value"                                    
			 },
			 is3D: true,
          title: ''
        };

        var chartpiereferred = new google.visualization.PieChart(document.getElementById('piechartreferred<?php echo $year; ?>'));

        chartpiereferred.draw(datachartpiereferred, options);
	  }

</script>
<br />
<table width="1250" align="center" class="gridtablew">
<tr>
<td align="right"><strong>Year <?php echo $year; ?></strong></td>
</tr>
</table>
<br />


<table width="1250" height="312" align="center" style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#666;">
<tr><td colspan="2"><strong>Method of referral</strong></td></tr>
<tr><td colspan="2"><hr /></td></tr>

<tr>
<td width="619">
<div id="piechartmethod<?php echo $year; ?>" style="width: 900px; height: 300px;" align="left"></div>
</td>

<td width="202" valign="middle">
    <table width="190" style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#666;">
    <tr>
      <td width="139"><strong>Whistleblower E-mail</strong></td><td width="39" align="center"><?php echo $num_allegations_wb_email ?></td></tr>
    <tr>
      <td><strong>Other E-mail</strong></td><td align="center"><?php echo $num_allegations_other_email ?></td></tr>
    <tr>
      <td><strong>Fax</strong></td><td align="center"><?php echo $num_allegations_fax ?></td></tr>
    <tr>
      <td><strong>Post</strong></td><td align="center"><?php echo $num_allegations_post ?></td></tr>
    <tr>
      <td><strong>Personal complaint</strong></td><td align="center"><?php echo $num_allegations_personal ?></td></tr>
    <tr>
      <td><strong>Online report</strong></td><td align="center"><?php echo $num_allegations_online_report ?></td></tr>
    <tr>
      <td><strong>External hotline</strong></td><td align="center"><?php echo $num_allegations_external_hotline ?></td></tr>
    <tr>
      <td><strong>Internal hotline</strong></td><td align="center"><?php echo $num_allegations_internal_hotline ?></td></tr>
      <tr><td colspan="2"><hr /></td></tr>
      <tr>
      <td align="right"><strong>TOTAL</strong></td><td align="center"><strong><?php echo $num_total_allegations ?></strong></td></tr>
    </table>
</td>
</tr>
</table>

<br /><br /><br />

<table width="1250" align="center" style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#666;">
<tr><td colspan="2"><strong>Referred from</strong></td></tr>
<tr><td colspan="2"><hr /></td></tr>

<tr>
<td>
<div id="piechartreferred<?php echo $year; ?>" style="width: 900px; height: 300px;" align="left"></div>
</td>

<td valign="middle">
    <table width="190" style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#666;">

    <tr>
      <td width="139"><strong>OIG Investigations</strong></td><td width="39" align="center"><?php echo $num_allegations_source_aw_oigi ?></td></tr>
    <tr>
     <tr>
      <td><strong>OIG Audit</strong></td><td align="center"><?php echo $num_allegations_source_aw_oiga ?></td></tr>
    <tr>
     <tr>
      <td><strong>OIG Other</strong></td><td align="center"><?php echo $num_allegations_source_aw_oigo ?></td></tr>
    <tr>
     <tr>
      <td><strong>Secretariat</strong></td><td align="center"><?php echo $num_allegations_source_aw_sec ?></td></tr>
    <tr>
     <tr>
      <td><strong>Secretariat (LFA)</strong></td><td align="center"><?php echo $num_allegations_source_aw_secl ?></td></tr>
    <tr>
     <tr>
      <td><strong>LFA</strong></td><td align="center"><?php echo $num_allegations_source_aw_lfa ?></td></tr>
    <tr>
     <tr>
      <td><strong>CCM</strong></td><td align="center"><?php echo $num_allegations_source_aw_ccm ?></td></tr>
    <tr>
      <td><strong>PR</strong></td><td align="center"><?php echo $num_allegations_source_aw_pr ?></td></tr>
    <tr>
      <td><strong>SR</strong></td><td align="center"><?php echo $num_allegations_source_aw_sr ?></td></tr>
    <tr>
      <td><strong>SSR</strong></td><td align="center"><?php echo $num_allegations_source_aw_ssr ?></td></tr>
    <tr>
      <td><strong>Supplier</strong></td><td align="center"><?php echo $num_allegations_source_aw_sup ?></td></tr>
    <tr>
      <td><strong>Inter-agency</strong></td><td align="center"><?php echo $num_allegations_source_aw_int ?></td></tr>
    <tr>
      <td><strong>Other</strong></td><td align="center"><?php echo $num_allegations_source_aw_oth ?></td></tr>
      <tr><td colspan="2"><hr /></td></tr>
      <tr>
      <td align="right"><strong>TOTAL</strong></td><td align="center"><strong><?php echo $num_total_allegations_referred ?></strong></td></tr>
    </table>
</td>
</tr>
</table>
