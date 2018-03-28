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


$result_allegations_category_Corruption = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Corruption' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_category_Corruption = sqlsrv_num_rows($result_allegations_category_Corruption);	

//$result_query = sqlsrv_query($conn,"SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Corruption' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));	

//$result_allegations_category_Fraud = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Fraud' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));

$result_allegations_category_Fraud = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Fraud' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_allegations_category_Fraud = sqlsrv_num_rows($result_allegations_category_Fraud);

$result_allegations_category_Coercion = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Coercion' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_allegations_category_Coercion = sqlsrv_num_rows($result_allegations_category_Coercion);

$result_allegations_category_Collusion = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Collusion' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_category_Collusion = sqlsrv_num_rows($result_allegations_category_Collusion);

$result_allegations_category_Non_Compliance = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Non-Compliance with laws / Grant agreements' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_allegations_category_Non_Compliance = sqlsrv_num_rows($result_allegations_category_Non_Compliance);

$result_allegations_category_Human_Rights = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Human Rights Violations' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_allegations_category_Human_Rights = sqlsrv_num_rows($result_allegations_category_Human_Rights);

$result_allegations_category_JIATF = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'Product Issues (JIATF)' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_allegations_category_JIATF = sqlsrv_num_rows($result_allegations_category_JIATF);

$result_allegations_category_NA = sqlsrv_query($conncss, "SELECT * FROM risk_types LEFT JOIN allegation_details ON risk_types.allegation_id = allegation_details.id WHERE allegation_details.status = 'Closed' AND risk_types.category_type = 'N/A' AND allegation_details.date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_allegations_category_NA = sqlsrv_num_rows($result_allegations_category_NA);

$total = $num_allegations_category_Corruption + $num_allegations_category_Fraud + $num_allegations_category_Coercion + $num_allegations_category_Collusion + $num_allegations_category_Non_Compliance + $num_allegations_category_Human_Rights + $num_allegations_category_JIATF + $num_allegations_category_NA;

//$sql = "UPDATE allegation_details SET category_type = 'N/A' WHERE category_type = '' AND status = 'Closed' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'";

//$result = sqlsrv_query($conncss, $sql);

?>
<script type="text/javascript">

	  google.load("visualization", "1", {packages:["corechart"]});
	  
      google.setOnLoadCallback(drawChartpie<?php echo $year ?>);
      function drawChartpie<?php echo $year ?>() {

        var datachartpie<?php echo $year ?> = google.visualization.arrayToDataTable([
          ['Category', '<?php echo $year ?>'],
		  ['Non-Compliance with laws',  <?php echo $num_allegations_category_Non_Compliance ?>],
          ['Corruption',  <?php echo $num_allegations_category_Corruption ?>],
          ['Fraud',  <?php echo $num_allegations_category_Fraud ?>],
          ['Coercion', <?php echo $num_allegations_category_Coercion ?>],
		  ['Collusion',  <?php echo $num_allegations_category_Collusion ?>],
		  ['Human Rights Violations',  <?php echo $num_allegations_category_Human_Rights ?>],
          ['Product Issues (JIATF)',  <?php echo $num_allegations_category_JIATF ?>],
		  ['N/A',  <?php echo $num_allegations_category_NA ?>]
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

        var chartpie = new google.visualization.PieChart(document.getElementById('piecharta<?php echo $year ?>'));
		//alert(document.getElementById('piecharta<?php echo $year ?>').outerHTML);
        chartpie.draw(datachartpie<?php echo $year ?>, options);
      }

	  // drawChartpie<?php echo $year ?>();
    </script>
<br /><br />
<table width="1195" align="center" class="gridtablew">
<tr><td><hr /></td></tr>
<tr>
<td align="right"><strong>Year <?php echo $year ?></strong></td>
</tr>
</table><br /><br />


<table width="1250" align="center" style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#666;">
<tr>
<td width="930">
<div id="piecharta<?php echo $year ?>" style="width: 900px; height: 300px;" align="left"></div>
</td>

<td width="253">
    <table width="253" style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#666;">
    <tr>
      <td width="201"><strong>Corruption</strong></td><td width="40" align="center"><?php echo $num_allegations_category_Corruption ?></td></tr>
    <tr>
      <td><strong>Fraud</strong></td><td align="center"><?php echo $num_allegations_category_Fraud ?></td></tr>
    <tr>
      <td><strong>Coercion</strong></td><td align="center"><?php echo $num_allegations_category_Coercion ?></td></tr>
    <tr>
      <td><strong>Collusion</strong></td><td align="center"><?php echo $num_allegations_category_Collusion ?></td></tr>
    <tr>
      <td><strong>Non-Compliance with laws / Grant agreements</strong></td><td align="center"><?php echo $num_allegations_category_Non_Compliance ?></td></tr>
    <tr>
      <td><strong>Human Rights Violations</strong></td><td align="center"><?php echo $num_allegations_category_Human_Rights ?></td></tr>
    <tr>
      <td><strong>Product Issues (JIATF)</strong></td><td align="center"><?php echo $num_allegations_category_JIATF ?></td></tr>
      <tr>
      <td><strong>N/A</strong></td><td align="center"><?php echo $num_allegations_category_NA ?></td></tr>
      <tr><td colspan="2"><hr /></td></tr>
      <tr>
      <td align="right"><strong>TOTAL</strong></td><td align="center"><strong><?php echo $total ?></strong></td></tr>
    </table>
</td>
</tr>
</table>
