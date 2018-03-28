 <?php

require_once("includes\\opendb.php");


 //-------------------------------------------------2016


//HIGH ALLEGATIONS
$result_allegations_high = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE priority = 'High' AND status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'");		
$all_rows1 = sqlsrv_fetchall($result_allegations_high);
$num_allegations_high = count($all_rows1);

$total_number_days_screening_high = 0;
$average_high = 0;
foreach ($all_rows1 as $row_allegations_high) {	
	$date1 = new DateTime($row_allegations_high['date_received']);
	$date2 = new DateTime($row_allegations_high['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_high = $total_number_days_screening_high + $screening_days;
}

if ( $total_number_days_screening_high != 0 && $num_allegations_high != 0 ){
	$average_high = $total_number_days_screening_high / $num_allegations_high ;
	$average_high = round($average_high, 0);
}






//MIDIUM ALLEGATIONS
$result_allegations_midium = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE priority = 'Medium' AND status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'");	
$all_rows2 = sqlsrv_fetchall($result_allegations_midium);	
$num_allegations_midium = count($all_rows2);

$total_number_days_screening_medium = 0;
$average_midium = 0 ;
foreach ($all_rows2 as $row_allegations_midium) {	
	$date1 = new DateTime($row_allegations_midium['date_received']);
	$date2 = new DateTime($row_allegations_midium['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_medium = $total_number_days_screening_medium + $screening_days;
}
if ( $total_number_days_screening_medium != 0 && $num_allegations_midium != 0 ){
	$average_midium = $total_number_days_screening_medium / $num_allegations_midium ;
	$average_midium = round($average_midium, 0);
}



//LOW ALLEGATIONS
$result_allegations_low = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE priority = 'Low' AND status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'");
$all_rows3 = sqlsrv_fetchall($result_allegations_low);	 		
$num_allegations_low = count($all_rows3);

$total_number_days_screening_low = 0;
$average_low = 0;
foreach ($all_rows3 as $row_allegations_low) {	
	$date1 = new DateTime($row_allegations_low['date_received']);
	$date2 = new DateTime($row_allegations_low['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_low = $total_number_days_screening_low + $screening_days;
}
if ( $total_number_days_screening_low != 0 && $num_allegations_low != 0 ){
	$average_low = $total_number_days_screening_low / $num_allegations_low ;
	$average_low = round($average_low, 0);
}



$result_rate = sqlsrv_query($conncss, "SELECT * FROM allegation_details LEFT JOIN comments_manager ON allegation_details.id = comments_manager.id WHERE allegation_details.status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'"); 
$all_rows = sqlsrv_fetchall($result_rate);
$num_rates = count($all_rows);

$rate_0_star = 0;
$rate_1_star = 0;
$rate_2_star = 0;
$rate_3_star = 0;
$rate_4_star = 0;


$ratetime = 0;
$ratecompl = 0;
$ratequa = 0;
$ratecon = 0;


foreach ($all_rows as $row){

		$rate1 = $row['rate1'];
		$rate2 = $row['rate2'];
		$rate3 = $row['rate3'];
		$rate4 = $row['rate4'];	
		
		$total_rate = $rate1 + $rate2 + $rate3 + $rate4;
   
	  if ( $total_rate == 0 ){
			$rate_0_star = $rate_0_star + 1;
	   }else if ( $total_rate == 1 ){
			$rate_1_star = $rate_1_star + 1;
	   }else if ( $total_rate == 2 ){
			$rate_2_star = $rate_2_star + 1;   
	   }
	   else if ( $total_rate == 3 ){
			$rate_3_star = $rate_3_star + 1; 
	   }else if ( $total_rate == 4 ){
			$rate_4_star = $rate_4_star + 1;
	   }
	   
	  if ( $rate1 == 1 ){
		  $ratetime = $ratetime + 1;
	  }
		if ( $rate2 == 1 ){
		  $ratecompl = $ratecompl + 1;
	  }
		if ( $rate3 == 1 ){
		  $ratequa = $ratequa + 1;
	  }
		if ( $rate4 == 1 ){
		  $ratecon = $ratecon + 1;
	  }
  
	   
	   
}

$per_ratetime = ($ratetime / $num_rates) * 100;
$per_ratetime = round($per_ratetime);

$per_ratecompl = ($ratecompl / $num_rates) * 100;
$per_ratecompl = round($per_ratecompl);

$per_ratequa = ($ratequa / $num_rates) * 100;
$per_ratequa = round($per_ratequa);

$per_ratecon = ($ratecon / $num_rates) * 100;
$per_ratecon = round($per_ratecon);

?>
<html>
  <head>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style type="text/css">
table.gridtable777 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:13px;
	}
table.gridtable777 th {
	font-size:13px;
	border-width: 1px;
	border-style: solid;
	border-color:#999;
	background-color:#F0F0F0;
	color:#333;
}
table.gridtable777 td {
	font-size:13px;
	border-width: 1px;
	color:#666666;
	border-style: solid;
	border-color:#EDEDED;
	background-color: #FFFFFF;
}
hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }


</style>


<style type="text/css">
table.gridtable3 {

	border: none;
	border-collapse: collapse;
	border-spacing: 0px;
	font-size: 11px;
	color: #669900;
}
table.gridtable3 td {
	font-weight: normal;
	font-size: 12px;
	color: #666666;
	padding-top: 4px;
	padding-bottom: 4px;
	padding-left: 8px;
	padding-right: 0px;
}
    fieldset {
    border:1px solid #999;
    border-radius:8px;
    box-shadow:0 0 10px #999;
}
</style> 


<script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'bar']});
	google.charts.setOnLoadCallback(drawAxisTickColors);
	
	function drawAxisTickColors() {
		  var data = google.visualization.arrayToDataTable([
			['City', '', { role: 'style' }, {type: 'string', role: 'annotation'}],
			['Timeliness', <?php echo $per_ratetime ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF', '<?php echo $per_ratetime ?>%'],            
			 ['Completion of the Report / Research / Entities', <?php echo $per_ratecompl ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF', '<?php echo $per_ratecompl ?>%'],          
			 ['Quality of the Report', <?php echo $per_ratequa ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF', '<?php echo $per_ratequa ?>%'],
			 ['Conclusion', <?php echo $per_ratecon ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF', '<?php echo $per_ratecon ?>%' ],
		  ]);
		  var options = {
			chartArea: {'width': '30%', 'height': '60%', 'right': '25%', 'top': '1%'},

			legend: { position: "none" },
			vAxis: {
				  textStyle: {
					fontSize: 11,
					bold: true,
					color: '#333'
				  },
         	 }
		  };
		  var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
		  chart.draw(data, options);
		}
</script>




<script type="text/javascript">
	
	google.charts.setOnLoadCallback(drawchart);
	
	function drawchart() {
		  var data = google.visualization.arrayToDataTable([
			['', '', { role: 'style' }, {type: 'string', role: 'annotation'}],
			['', <?php echo $rate_4_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_4_star ?>'],            
			 ['', <?php echo $rate_3_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_3_star ?>'],          
			 ['', <?php echo $rate_2_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_2_star ?>'],
			 ['', <?php echo $rate_1_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_1_star ?>' ],
			 ['', <?php echo $rate_0_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_0_star ?>' ],
		  ]);
		  var options = {
			chartArea: {'width': '60%', 'height': '60%', 'left': '1%', 'top': '1%'},
			legend: { position: "none" },
			hAxis: {gridlines: {count: 3}},
     

			
		  };
		  var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
		  chart.draw(data, options);
		}
</script>


 
 </head>
  
  <body>

<table width="100%" align="center">
<tr>
  <td colspan="5" align="left" valign="middle"></td>
  </tr>
<tr>
  <td width="119" height="153" align="right" valign="top">

</td>
  <td colspan="3" align="right" valign="top">
  <strong><font color="#464646"; size="+1">
      Team&nbsp;&nbsp;&nbsp;&nbsp;
      </font></strong>
  </td>
  <td width="764" align="left" valign="top">
   <div id="entities-contain">
  <table>
    <tr>
      <th><strong>Priority</strong></th>
      <th align="center"><strong># Allegations</strong></th>
      <th align="center">Total days</th>
      <th align="center"><strong>Average in days</strong></th>
      </tr>
    <tr>
      <td align="left"><font color="#FF0000">High</font></td>
      <td align="center"><?php echo $num_allegations_high ?></td>
      <td align="center"><?php echo $total_number_days_screening_high ?></td>
      <td align="center"><?php echo $average_high ?></td>
      </tr>
    <tr>
      <td align="left"><font color="#FF9933">Medium</font></td>
      <td align="center"><?php echo $num_allegations_midium ?></td>
      <td align="center"><?php echo $total_number_days_screening_medium ?></td>
      <td align="center"><?php echo $average_midium ?></td>
      </tr>
    <tr>
      <td align="left"><font color="#009900">Low</font></td>
      <td align="center"><?php echo $num_allegations_low ?></td>
      <td align="center"><?php echo $total_number_days_screening_low ?></td>
      <td align="center"><?php echo $average_low ?></td>
      </tr>
    <tr>
      <td align="center" style="border-top:double"><strong>TOTAL</strong></td>
      <td align="center" style="border-top:double"><strong><?php echo $total_number_allegations = $num_allegations_high + $num_allegations_midium + $num_allegations_low?></strong></td>
      <td align="center" style="border-top:double"><strong><?php echo $total_number_days = $total_number_days_screening_high + $total_number_days_screening_medium + $total_number_days_screening_low?></strong></td>
      <td align="center" style="border-top:double"><strong>
        <?php 
		if ( $total_number_allegations != 0 ){
	  echo  $averagetottal = round($total_number_days / $total_number_allegations, 0);
		}else{
		echo "0";	
		}
	 ?>
        </strong> <?php echo "<font size='-1'>    (average)</font>"; ?></td>
      </tr>
  </table>
  </div>
  
  </td>
  </tr>
<tr>
  <td align="right" valign="top"><table class="gridtable3">
    <tr>
      <td><img src="images/4star.png" width="64" height="16" align="absmiddle"/></td>
      </tr>
    <tr>
      <td><img src="images/3star.png" width="64" height="16" align="absmiddle"/></td>
      </tr>
    <tr>
      <td><img src="images/2star.png" width="64" height="16" align="absmiddle"/></td>
      </tr>
    <tr>
      <td><img src="images/1star.png" width="64" height="16" align="absmiddle"/></td>
      </tr>
    <tr>
      <td><img src="images/0star.png" width="64" height="16" align="absmiddle"/></td>
      </tr>
    </table>
 </td>
  <td width="424" align="left" valign="middle"><div id="chart_div1" align="right"></div></td>
  <td colspan="3" align="center" valign="middle"><div id="chart_div" align="right"></div></td>
</tr>
</table>
</body>
</html>