 <?php

require_once("includes\\opendb.php");
					  
?>
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

<?php

$result_allegations_email_account = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'OIG email account' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_email_account = sqlsrv_num_rows($result_allegations_email_account);	

$result_allegations_FAX = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'FAX' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_FAX = sqlsrv_num_rows($result_allegations_FAX);

$result_allegations_Telephone = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Telephone' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_category_Telephone = sqlsrv_num_rows($result_allegations_Telephone);

$result_allegations_Secretariat = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Secretariat' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_Secretariat = sqlsrv_num_rows($result_allegations_Secretariat);

$result_allegations_Secretariat_LFA = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Secretariat (via LFA)' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_Secretariat_LFA = sqlsrv_num_rows($result_allegations_Secretariat_LFA);

$result_allegations_LFA = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'LFA' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_LFA = sqlsrv_num_rows($result_allegations_LFA);

$result_allegations_Global_Compliance = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Global Compliance' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_Global_Compliance = sqlsrv_num_rows($result_allegations_Global_Compliance);

$result_allegations_agency = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Intern-agency referral' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_agency = sqlsrv_num_rows($result_allegations_agency);

$result_allegations_personal = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Personal Complaint' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_personal = sqlsrv_num_rows($result_allegations_personal);

$result_allegations_Post = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE received_via = 'Post' AND date_received BETWEEN '$year-01-01' AND '$year-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_Post = sqlsrv_num_rows($result_allegations_Post);


?>


<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChartpiechannels<?php echo $year; ?>);
      function drawChartpiechannels<?php echo $year; ?>() {

        var datachartpiechannels = google.visualization.arrayToDataTable([
          ['Category', '<?php echo $year; ?>'],
          ['OIG email account',  <?php echo $num_allegations_email_account ?>],
          ['Secretariat',  <?php echo $num_allegations_Secretariat ?>],
          ['Secretariat (via LFA)',  <?php echo $num_allegations_Secretariat_LFA ?>],
		  ['LFA',  <?php echo $num_allegations_LFA ?>],
		  ['Global Compliance',  <?php echo $num_allegations_Global_Compliance ?>],
		  ['Intern-agency referral',  <?php echo $num_allegations_agency ?>],
		  ['FAX',  <?php echo $num_allegations_FAX ?>],
          ['Personal Complaint',  <?php echo $num_allegations_personal ?>],
		  ['Telephone',  <?php echo $num_allegations_category_Telephone ?>],
		  ['Post',  <?php echo $num_allegations_Post ?>]
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

        var chartpiechannels = new google.visualization.PieChart(document.getElementById('piechartchannels<?php echo $year; ?>'));

        chartpiechannels.draw(datachartpiechannels, options);
	  }
</script>
<table width="1250" align="center" class="gridtablew">
<tr>
  <td><hr /></td>
</tr>
<tr>
<td align="right"><strong>Year <?php echo $year; ?></strong></td>
</tr>
<tr>
  <td height="53" align="right">&nbsp;</td>
</tr>
<tr>
  <td align="center"><div id="piechartchannels<?php echo $year; ?>" style="width: 900px; height: 300px;" align="left"></div></td>
</tr>
</table>
