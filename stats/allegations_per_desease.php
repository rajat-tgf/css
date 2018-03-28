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

$result_allegations_HIV = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE status = 'Closed' AND disease_area = 'HIV' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_HIV = sqlsrv_num_rows($result_allegations_HIV);	

$result_allegations_Malaria = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE status = 'Closed' AND disease_area = 'Malaria' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_Malaria = sqlsrv_num_rows($result_allegations_Malaria);

$result_allegations_TB = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE status = 'Closed' AND disease_area = 'TB' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_category_TB = sqlsrv_num_rows($result_allegations_TB);

$result_allegations_HSS = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE status = 'Closed' AND disease_area = 'HSS' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_category_HSS = sqlsrv_num_rows($result_allegations_HSS);


$result_allegations_NA = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE status = 'Closed' AND disease_area = 'N/A' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_NA = sqlsrv_num_rows($result_allegations_NA);

$total = $num_allegations_HIV + $num_allegations_Malaria + $num_allegations_category_TB + $num_allegations_category_HSS + $num_allegations_NA;

//$sql = "UPDATE allegation_details SET disease_area = 'N/A' WHERE disease_area = '' AND status = 'Closed' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'";

//$result = sqlsrv_query($conncss, $sql);
?>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChartpieb<?php echo $year; ?>);
      function drawChartpieb<?php echo $year; ?>() {

        var datachartpieb<?php echo $year; ?> = google.visualization.arrayToDataTable([
          ['', '<?php echo $year; ?>'],
          ['Tuberculosis',  <?php echo $num_allegations_category_TB ?>],
          ['HIV',  <?php echo $num_allegations_HIV ?>],
          ['Malaria',  <?php echo $num_allegations_Malaria ?>],
		  ['HSS',  <?php echo $num_allegations_category_HSS ?>],
		  ['N/A',  <?php echo $num_allegations_NA ?>]
        ]);

 var options = {
			width: 1000,
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

        var chartpiede = new google.visualization.PieChart(document.getElementById('piechartb<?php echo $year; ?>'));

        chartpiede.draw(datachartpieb<?php echo $year; ?>, options);
      }

    </script>
<br /><br /><br /><br />
<table width="1250" align="center" class="gridtablew">
<tr><td><hr /></td></tr>
<tr>
<td align="right"><strong>Year <?php echo $year; ?></strong></td>
</tr>
</table><br /><br />
<table width="1250" align="center" style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#666;">
<tr>
<td width="726">
    <div id="piechartb<?php echo $year; ?>" style="width: 1000px; height: 300px;" align="left"></div>
</td>
<td width="94" valign="top">
    <table width="94" style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#666;">
    <tr>
      <td><strong>HIV</strong></td><td align="center"><?php echo $num_allegations_HIV ?></td></tr>
    <tr>
      <td><strong>Malaria</strong></td><td align="center"><?php echo $num_allegations_Malaria ?></td></tr>
    <tr>
      <td><strong>TB</strong></td><td align="center"><?php echo $num_allegations_category_TB ?></td></tr>
    <tr>
      <td><strong>HSS</strong></td><td align="center"><?php echo $num_allegations_category_HSS ?></td></tr>
    <tr>
      <td><strong>N/A</strong></td><td align="center"><?php echo $num_allegations_NA ?></td></tr>
      <tr><td colspan="2"><hr /></td></tr>
      <tr>
      <td align="right"><strong>TOTAL</strong></td><td align="center"><strong><?php echo $total ?></strong></td></tr>
    </table>
</td>
</tr>
</table>
