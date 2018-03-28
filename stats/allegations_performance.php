 <?php

require_once("includes\\opendb.php");
					  
?>
<html>
  <head>

  
  


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
	border-color: #EDEDED;
	background-color: #FFFFFF;
}
hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }


</style>
 </head>
  
  <body>
    
 <?php   
 //-------------------------------------------------2016


//HIGH ALLEGATIONS
$result_allegations_high = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE priority = 'High' AND status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'");		
$num_allegations_high = sqlsrv_num_rows($result_allegations_high);

$total_number_days_screening_high = 0;
$average_high = 0;
while ($row_allegations_high = sqlsrv_fetch_assoc($result_allegations_high)) {	
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
$num_allegations_midium = sqlsrv_num_rows($result_allegations_midium);

$total_number_days_screening_medium = 0;
$average_midium = 0 ;
while ($row_allegations_midium = sqlsrv_fetch_assoc($result_allegations_midium)) {	
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
$num_allegations_low = sqlsrv_num_rows($result_allegations_low);

$total_number_days_screening_low = 0;
$average_low = 0;
while ($row_allegations_low = sqlsrv_fetch_assoc($result_allegations_low)) {	
	$date1 = new DateTime($row_allegations_low['date_received']);
	$date2 = new DateTime($row_allegations_low['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_low = $total_number_days_screening_low + $screening_days;
}
if ( $total_number_days_screening_low != 0 && $num_allegations_low != 0 ){
	$average_low = $total_number_days_screening_low / $num_allegations_low ;
	$average_low = round($average_low, 0);
}

?>   
<table width="1250" align="center">
<tr>
  <td align="left" valign="top"><font size="+2" color="#999999"><strong>2016</strong></font></td>
  <td align="left"></td>
  <td valign="top"><table width="369" border="0" cellpadding="3" cellspacing="0" class="gridtable777">
    <tr>
      <th><strong>Priority</strong></th>
      <th align="center"><strong># Allegations</strong></th>
      <th align="center">Total days</th>
      <th align="center"><strong>Average in days</strong></th>
    </tr>
    <tr>
      <td width="52" align="left"><font color="#FF0000">High</font></td>
      <td width="91" align="center"><?php echo $num_allegations_high ?></td>
      <td width="101" align="center"><?php echo $total_number_days_screening_high ?></td>
      <td width="101" align="center"><?php echo $average_high ?></td>
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
    <table align="left" class="gridtable">
      <tr>
        <td width="358"><font color="#DD002D" size="-1"> * Includes only allegations that have been closed </font></td>
      </tr>
    </table>
    <p>&nbsp;</p></td>
  <td align="center" valign="top">
  
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Year', 'High', 'Midium', 'Low', 'Average'],
		 ['',  <?php echo $average_high ?>, <?php echo $average_midium ?>, <?php echo $average_low ?>, <?php echo $averagetottal ?>]
      ]);

    var options = {
		title : '',
      vAxis: {title: 'Days'},
      hAxis: {title: ''},
      seriesType: 'bars',
	  width: 500,
		height: 200,
	chartArea: {'width': '46%', 'height': '85%'},
	series: {0:{color: 'Red'}, 1:{color: 'orange'}, 2:{color: 'green'}, 3: {type: 'steppedArea', visibleInLegend: false, color: 'blue'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_divb2016'));
    chart.draw(data, options);
  }
</script>

<div id="chart_divb2016" style="width: 500px; height: 200px;" align="left"></div>
  
  
  
<?php
//--------------------------------------------------------------------------2015


//HIGH ALLEGATIONS
$result_allegations_high = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE priority = 'High' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_high = sqlsrv_num_rows($result_allegations_high);

$total_number_days_screening_high = 0;
$average_high = 0;
while ($row_allegations_high = sqlsrv_fetch_assoc($result_allegations_high)) {	
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
$result_allegations_midium = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE priority = 'Medium' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_midium = sqlsrv_num_rows($result_allegations_midium);

$total_number_days_screening_medium = 0;
$average_midium = 0 ;
while ($row_allegations_midium = sqlsrv_fetch_assoc($result_allegations_midium)) {	
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
$result_allegations_low = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE priority = 'Low' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_low = sqlsrv_num_rows($result_allegations_low);

$total_number_days_screening_low = 0;
$average_low = 0;
while ($row_allegations_low = sqlsrv_fetch_assoc($result_allegations_low)) {	
	$date1 = new DateTime($row_allegations_low['date_received']);
	$date2 = new DateTime($row_allegations_low['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_low = $total_number_days_screening_low + $screening_days;
}
if ( $total_number_days_screening_low != 0 && $num_allegations_low != 0 ){
	$average_low = $total_number_days_screening_low / $num_allegations_low ;
	$average_low = round($average_low, 0);
}



//NO PRIORITY ALLEGATIONS
$result_allegations_nopriority = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE priority = '' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$num_allegations_no_priority = sqlsrv_num_rows($result_allegations_nopriority);

$total_number_days_screening_no_priority = 0;

while ($row_allegations_no_priority = sqlsrv_fetch_assoc($result_allegations_nopriority)) {	
	$date1 = new DateTime($row_allegations_no_priority['date_received']);
	$date2 = new DateTime($row_allegations_no_priority['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_no_priority = $total_number_days_screening_no_priority + $screening_days;
}
$average_no_priority = $total_number_days_screening_no_priority / $num_allegations_no_priority ;
//echo $average_low = number_format($average_low, 1);
$average_no_priority = round($average_no_priority, 0);

?> 
    
  
  </td>
</tr>
<tr>
  <td align="left" valign="top">&nbsp;</td>
  <td align="left"></td>
  <td valign="top">&nbsp;</td>
  <td valign="top">&nbsp;</td>
</tr>
<tr>
  <td align="left" valign="top"><font size="+2" color="#999999"><strong>2015</strong></font></td>
<td align="left">

</td>

<td valign="top">
    <table width="369" border="0" cellpadding="3" cellspacing="0" class="gridtable777">
    <tr>
      <th><strong>Priority</strong></th>
      <th align="center"><strong># Allegations</strong></th>
      <th align="center">Total days</th>
      <th align="center"><strong>Average in days</strong></th>
    </tr>
    <tr>
      <td width="52" align="left"><font color="#FF0000">High</font></td>
      <td width="91" align="center"><?php echo $num_allegations_high ?></td>
      <td width="101" align="center"><?php echo $total_number_days_screening_high ?></td>
      <td width="101" align="center"><?php echo $average_high ?></td></tr>
    <tr>
      <td align="left"><font color="#FF9933">Medium</font></td>
      <td align="center"><?php echo $num_allegations_midium ?></td>
      <td align="center"><?php echo $total_number_days_screening_medium ?></td>
      <td align="center"><?php echo $average_midium ?></td></tr>
    <tr>
      <td align="left"><font color="#009900">Low</font></td>
      <td align="center"><?php echo $num_allegations_low ?></td>
      <td align="center"><?php echo $total_number_days_screening_low ?></td>
      <td align="center"><?php echo $average_low ?></td></tr>
      <tr>
        <td align="left">No priority</td>
        <td align="center"><?php echo $num_allegations_no_priority ?></td>
        <td align="center"><?php echo $total_number_days_screening_no_priority ?></td>
        <td align="center"><?php echo $average_no_priority ?></td>
      </tr>
      <tr>
      <td align="center" style="border-top:double"><strong>TOTAL</strong></td>
      <td align="center" style="border-top:double"><strong><?php echo $total_number_allegations = $num_allegations_high + $num_allegations_midium + $num_allegations_low + $num_allegations_no_priority?></strong></td>
      <td align="center" style="border-top:double"><strong><?php echo $total_number_days = $total_number_days_screening_high + $total_number_days_screening_medium + $total_number_days_screening_low + $total_number_days_screening_no_priority?></strong></td>
      <td align="center" style="border-top:double"><strong>
       <?php 
	  echo  $averagetottal = round($total_number_days / $total_number_allegations, 0);
	 ?>
      </strong>
      <?php echo "<font size='-1'>    (average)</font>"; ?>
	  
</td></tr>
    </table>

      <br>

    <table width="369" align="left" class="gridtable">
        <tr>
          <td><font color="#DD002D" size="-1">
        * Includes only allegations that have been closed
        </font>
        </td></tr>
      </table>
</td>
<td align="center" valign="top">

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Year', 'High', 'Midium', 'Low', 'No priority set', 'Average'],
		 ['',  <?php echo $average_high ?>, <?php echo $average_midium ?>, <?php echo $average_low ?>, <?php echo $average_no_priority ?>, <?php echo $averagetottal ?>]
      ]);

    var options = {
		title : '',
      vAxis: {title: 'Days'},
      hAxis: {title: ''},
      seriesType: 'bars',
	  width: 500,
		height: 200,
	chartArea: {'width': '46%', 'height': '85%'},
	series: {0:{color: 'Red'}, 1:{color: 'orange'}, 2:{color: 'green'}, 3:{color: 'gray'}, 4: {type: 'steppedArea', visibleInLegend: false, color: 'blue'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_divb'));
    chart.draw(data, options);
  }
</script>

<div id="chart_divb" style="width: 500px; height: 200px;" align="left"></div>

</td>
</tr>
</table>
</body>
</html>