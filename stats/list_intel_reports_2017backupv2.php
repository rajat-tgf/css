 <?php
 
require_once("..\\includes\\opendb.php");

//INTEL REPORTS

$result_reports_jan_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-01-01' AND '2017-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_jan = sqlsrv_num_rows($result_reports_jan_2017);	

$result_reports_feb_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-02-01' AND '2017-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_feb = sqlsrv_num_rows($result_reports_feb_2017);

$result_reports_mar_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-03-01' AND '2017-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_mar = sqlsrv_num_rows($result_reports_mar_2017);

$result_reports_apr_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-04-01' AND '2017-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_apr = sqlsrv_num_rows($result_reports_apr_2017);

$result_reports_may_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-05-01' AND '2017-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_may = sqlsrv_num_rows($result_reports_may_2017);

$result_reports_jun_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-06-01' AND '2017-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_jun = sqlsrv_num_rows($result_reports_jun_2017);

$result_reports_jul_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-07-01' AND '2017-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_jul = sqlsrv_num_rows($result_reports_jul_2017);

$result_reports_aug_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-08-01' AND '2017-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_aug = sqlsrv_num_rows($result_reports_aug_2017);

$result_reports_sep_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-09-01' AND '2017-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_sep = sqlsrv_num_rows($result_reports_sep_2017);

$result_reports_oct_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-10-01' AND '2017-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_oct = sqlsrv_num_rows($result_reports_oct_2017);

$result_reports_nov_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-11-01' AND '2017-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_nov = sqlsrv_num_rows($result_reports_nov_2017);

$result_reports_dec_2017 = sqlsrv_query($conncss, "SELECT id FROM intelligence_reports WHERE date_received BETWEEN '2017-12-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_reports_dec = sqlsrv_num_rows($result_reports_dec_2017);


$result_intel_reports_2017 = sqlsrv_query($conncss, "SELECT * FROM intelligence_reports WHERE date_received BETWEEN '2017-01-01' AND '2017-12-31'");		
$intel_reports_2017 = sqlsrv_fetchall($result_intel_reports_2017);
$num_intel_reports_2017 = count($intel_reports_2017);

$total_allegations_involved_2017 = 0;

$total_for_investigation = 0;
$total_information_report = 0;
$total_refer_secretariat = 0;
$total_refer_audit = 0;
$total_NFA = 0;
$total_refer_external = 0;
$total_merger_allegation = 0;

foreach ($intel_reports_2017 as $rowallegations2017) {
	$intel_report_id = $rowallegations2017['id'];
	$SQL_CHECK_EXIST = sqlsrv_query($conncss, "SELECT * FROM allegation_ir_links WHERE ir_id = '$intel_report_id'");
	$allegations_intel_reports_2017 = sqlsrv_fetchall($SQL_CHECK_EXIST);
	$num_allegation_involved = count($allegations_intel_reports_2017);
	$total_allegations_involved_2017 = $total_allegations_involved_2017 + $num_allegation_involved;
	
	
foreach ($allegations_intel_reports_2017 as $row_allegation){	
	$allegation_linked = $row_allegation['allegation_id'];
	$result_allegation_details = sqlsrv_query($conncss, "SELECT resolution FROM allegation_details WHERE id = '$allegation_linked'");
	$row_allegation_details = sqlsrv_fetch_array($result_allegation_details);
	$resolution = $row_allegation_details['resolution'];
	
	if ($resolution == "Open case in CMS" || $resolution == "Merge with an existing Case"){
		$total_for_investigation = $total_for_investigation + 1;
	}
	
	if ($resolution == "Information report"){
		$total_information_report = $total_information_report + 1;
	}
	if ($resolution == "Referral to Secretariat for information only" || $resolution == "Referral to Secretariat for management action"){
		$total_refer_secretariat = $total_refer_secretariat + 1;
	}
	
	if ($resolution == "Merge with an existing Allegation"){
		$total_merger_allegation = $total_merger_allegation + 1;
	}
	
	if ($resolution == "No further action"){
		$total_NFA = $total_NFA + 1;
	}
	
	if ($resolution == "Referral to external agency"){
		$total_refer_external = $total_refer_external + 1;
	}
	
	if ($resolution == "Referral to OIG Audit"){
		$total_refer_audit = $total_refer_audit + 1;
	}
	
}

$total_other = $total_merger_allegation + $total_NFA + $total_refer_audit + $total_refer_external;
	
	
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="../style.css" type="text/css" media="screen" /> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
</head>

<body>
<table width="100%" align="center" class="gridtable">
<tr>
<td width="50%" valign="top" colspan="2" align="center"><p><strong><font color="#666666" size="+2">Intelligence Reports opened: </font><font size="+2"; color="#990000"><?php echo $num_intel_reports_2017 ?></font></strong><br />
  <strong><font color="#666666" size="+1">Allegations linked: </font><font size="+1"; color="#990000"><?php echo $total_allegations_involved_2017 ?></font></strong>
</p>
  <p>&nbsp;</p></td>
</tr>
<tr>

<td align="left">


<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Resolution', '2017'],
          ['Cases for investigation',    <?php echo $total_for_investigation ?>],
          ['Information Reports',      <?php echo $total_information_report ?>],
          ['Refered to Secretariat',  <?php echo $total_refer_secretariat ?>],
          ['Other', <?php echo $total_other ?>]
		 ]);

        var options = {
			title: 'Resolution of allegations',
         	pieSliceText:"value",	
			width: 400,
       		height: 190,
			chartArea: {'width': '90%', 'height': '90%'},
			pieHole: 0.6,
			legend: {
			position: 'labeled',
			

			 },
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<div id="donutchart" style="width: 650px; height: 200px;"></div>
</td>
<td width="50%">

 <script type="text/javascript">
google.charts.load("current1", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
		['Months', '2017', { role: 'style' }, {type: 'string', role: 'annotation'}],
		['Jan',  <?php echo $num_reports_jan ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_jan ?>],
		['Feb',  <?php echo $num_reports_feb ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_feb ?>],
		['Mar',  <?php echo $num_reports_mar ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_mar ?>],
		['Apr',  <?php echo $num_reports_apr ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_apr ?>],
		['May',  <?php echo $num_reports_may ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_may ?>],
		['Jun',  <?php echo $num_reports_jun ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_jun ?>],
		['Jul',  <?php echo $num_reports_jul ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_jul ?>],
		['Aug',  <?php echo $num_reports_aug ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_aug ?>],
		['Sep',  <?php echo $num_reports_sep ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_sep ?>],
		['Oct',  <?php echo $num_reports_oct ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_oct ?>],
		['Nov',  <?php echo $num_reports_nov ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_nov ?>],
		['Dec',  <?php echo $num_reports_dec ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $num_reports_dec ?>]
  ]);

  var options = {
			chartArea: {width: '100%'},
		  	legend: {
			 position: 'labeled',
			 pieSliceText:"value"                                    
			 },
        };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_intel'));
  chart.draw(data, options);
}
</script>
 
 
 <div id="chart_div_intel" style="width: 600px; height: 150px;"></div>
</td>
</tr>

</table>

 

 
    

<div id="entities-contain1" align="center">

<?php
	foreach ($intel_reports_2017 as $rowallegations2017) {	
?>



<table width="1324" border="0" align="center">
<tr>
    <td width="328" align="center" valign="middle">
    <strong>
        <font color="#000000" size="+1">
        <?php 
		$id = $rowallegations2017['id'];
		echo $country = $rowallegations2017['country']; ?>
        </font></strong>
        <br />
        <font color="#666666">
        <?php
        echo $title = $rowallegations2017['title']; ?>
        <br />
        <strong>
        <font color="#666666">
        Report Number : </strong>
        <font color="#666666">
        <?php
        echo $id; ?>
        </font>
        <strong><br />

        <font color="#666666">
        Date opened : </strong>
        <?php 
		$id = $rowallegations2017['id'];
		$date_received = $rowallegations2017['date_received']; 
		echo $date_received_newDate = date('F j, Y', strtotime($date_received));
		?>
        </font>
        <br />

    </td>
	<td width="935">
    <?php
	
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_ir_links WHERE ir_id = '$id'", array(), array( "Scrollable" => 'buffered'));
	$allegations_proactive_2017 = sqlsrv_fetchall($result_proactive_linked);
	$num_total_allegations_linked = count($allegations_proactive_2017);
	
	if ( $num_total_allegations_linked != 0 ){ ?>
    <div id="entities-contain">
  		<table>
                <tr>
                  <th align="center" valign="middle">#</th>
                      <th align="center" valign="middle">Country</th>
                      <th align="center" valign="middle">Title</th>
                      
                      <th align="center" valign="middle">Status</th>
                      <th align="center" valign="middle">Resolution</th>
                </tr>
			  <?php
  					foreach ($allegations_proactive_2017 as $row_proactive){
                          
						  $allegation_linked = $row_proactive['allegation_id'];

                          $result_profile_details = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE id = '$allegation_linked'");
                          $row_allegation_linked_details = sqlsrv_fetch_array($result_profile_details);
						  
						  
						  $country = $row_allegation_linked_details['country'];
						  $summary = $row_allegation_linked_details['summary'];
						  $status = $row_allegation_linked_details['status'];
						  $resolution = $row_allegation_linked_details['resolution'];
						  
						 ?>
                        <td align="center"><strong><?php echo $allegation_linked; ?></strong></td>
                        
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $summary; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="center"><?php echo $resolution; ?></td>
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div> 
 <?php } else { echo "No allegations linked"; }?>   
    </td>
    </tr>
</table>

<?php }  ?>

</div>



</body>
</html>