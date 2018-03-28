<?php
include("..\includes\\opendb.php");


$HIA = 0;
$HIA1 = 0;
$HIA2 = 0;
$SEA = 0;
$SA = 0;
$CA = 0;
$WA = 0;
$MENA = 0;
$LAC = 0;
$Internal = 0;
$EECA = 0;
$Other = 0;


$result_allegations2016_per_region = sqlsrv_query($conncss, "SELECT country FROM allegation_details WHERE date_received BETWEEN '2016-01-01' AND '2016-12-31'");		

$allegations_2016 = sqlsrv_fetchall($result_allegations2016_per_region);
$num_allegations_2016 = count($allegations_2016);

foreach ($allegations_2016 as $rowallegations2016_per_region) {

	
		$country = $rowallegations2016_per_region['country'];	
		
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_asia WHERE country = '$country'" , array(), array( "Scrollable" => 'buffered'));
        $region_hia = sqlsrv_num_rows($result_region);
        if ( $region_hia != 0 ){
			$HIA = $HIA + 1;
        }
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_africa1 WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_hi1 = sqlsrv_num_rows($result_region);
        if ( $region_hi1 != 0 ){
			$HIA1 = $HIA1 + 1;
        }
		
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_africa2 WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_hi2 = sqlsrv_num_rows($result_region);
        if ( $region_hi2 != 0 ){
			$HIA2 = $HIA2 + 1;
        }

		$result_region = sqlsrv_query($conncss, "SELECT * FROM region_sea WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_sea = sqlsrv_num_rows($result_region);
        if ( $region_sea != 0 ){
			$SEA = $SEA + 1;
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_sa WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_sa = sqlsrv_num_rows($result_region);
        if ( $region_sa != 0 ){
			$SA = $SA + 1;
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_mena WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_mena = sqlsrv_num_rows($result_region);
        if ( $region_mena != 0 ){
			$MENA = $MENA + 1;
        }
    
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_wa WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_wa = sqlsrv_num_rows($result_region);
        if ( $region_wa != 0 ){
			$WA = $WA +1;
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_ca WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_ca = sqlsrv_num_rows($result_region);
        if ( $region_ca != 0 ){
			$CA = $CA + 1;
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_eeca WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_eeca = sqlsrv_num_rows($result_region);
        if ( $region_eeca != 0 ){
			$EECA = $EECA + 1;
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_lac WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_lac = sqlsrv_num_rows($result_region);
        if ( $region_lac != 0 ){
			$LAC = $LAC + 1;
        }

        if ( $country == "Internal" ){
			$Internal = $Internal + 1;
        }	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



<link rel="stylesheet" href="../style.css" type="text/css" media="screen" /> 



<script type="text/javascript">

google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

        var data = google.visualization.arrayToDataTable([
		['Regions', 'Allegations received', { role: 'style' }, {type: 'string', role: 'annotation'}],
		['High Impact Asia', <?php echo $HIA ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $HIA ?> ],
		['High Impact Africa 1', <?php echo $HIA1 ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $HIA1 ?>],
		['High Impact Africa 2', <?php echo $HIA2 ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $HIA2 ?>],
		['SEA', <?php echo $SEA ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $SEA ?>],
		['WA', <?php echo $WA ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $WA ?>],
		['SA', <?php echo $SA ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $SA ?>],
		['CA', <?php echo $CA ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $CA ?>],
		['EECA', <?php echo $EECA ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $EECA ?>],
		['LAC', <?php echo $LAC ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $LAC ?>],
		['MENA', <?php echo $MENA ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $MENA ?>],
		['Internal', <?php echo $Internal ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF',<?php echo $Internal ?>]
        ]);

      var options = {
        chartArea: {width: '80%', 'top': '5%', 'left': '25%', 'bottom': '25%'},
		legend: 'none',

        hAxis: {
          minValue: 0
        },
        vAxis: {
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_regions'));

      chart.draw(data, options);
    }
    </script>
    
    <script type="text/javascript">
   google.charts.load("current1", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Regions', 'Allegations received'],
		['High Impact Asia', <?php echo $HIA ?>],
		['High Impact Africa 1',<?php echo $HIA1 ?>],
		['High Impact Africa 2', <?php echo $HIA2 ?>],
		['SEA', <?php echo $SEA ?>],
		['WA', <?php echo $WA ?>],
		['SA', <?php echo $SA ?>],
		['CA', <?php echo $CA ?>],
		['EECA', <?php echo $EECA ?>],
		['LAC', <?php echo $LAC ?>],
		['MENA', <?php echo $MENA ?>],
		['Internal', <?php echo $Internal ?>]
        ]);

        var options = {
			chartArea: {width: '90%', 'top': '5%', 'left': '5%', 'bottom': '5%'},
		  legend: {
			 position: 'labeled',
			 pieSliceText:"value"                                    
			 },
			 is3D: true,
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart2.draw(data, options);
      }

    </script> 
    
</head>

<body>

<table border="0" align="center">
  <tr>
    <td width="600">
   
    <div id="chart_regions" style='width: 500px; height: 350px'></div></td>
    <td width="6">&nbsp;</td>
    <td width="387" valign="top">
    <div id="donutchart" style='width: 500px; height: 325px'></div>

    </td>
  </tr>
</table>


<div id="entities-contain" align="center">
      <table align="center" width="100%">
      <tr>
          <td colspan="7">
          <font size="+1"><strong>Total allegations received in 2016: </font><font size="+1"; color="#990000"><?php echo $num_allegations_2016 ?></strong></font><br />
          </td>
      </tr>
        <tr>
          <th>Allegation</th>
          <th>Country</th>
          <th>Region</th>
          <th>Date received</th>
          <th>Status</th>
          <th>Resolution</th>
          </tr>
        <tr>
<?php

$result_allegations2016 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE date_received BETWEEN '2016-01-01' AND '2016-12-31' ORDER BY date_received DESC");		
$num_allegations_2016 = sqlsrv_num_rows($result_allegations2016);	
while($rowallegations2016 = sqlsrv_fetch_array($result_allegations2016)){
?>
<tr>
<td>
<?php
$type_allegation = $rowallegations2016['type_allegation'];
if ( $type_allegation == "Proactive" ){ ?>
	<img src="../images/Pro-icon1.png" width="22" height="22" align="absmiddle"/>&nbsp;
<?php }
echo $id = $rowallegations2016['id']; ?></td>
<td><?php echo $country = $rowallegations2016['country']; ?></td>
<td>
<?php
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_asia WHERE country = '$country'");
        $region_hi1 = sqlsrv_num_rows($result_region);
        if ( $region_hi1 != 0 ){
            echo  "High Impact Asia";
        }
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_africa1 WHERE country = '$country'");
        $region_hi1 = sqlsrv_num_rows($result_region);
        if ( $region_hi1 != 0 ){
            echo  "High Impact Africa 1";
        }
		
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_africa2 WHERE country = '$country'");
        $region_hi2 = sqlsrv_num_rows($result_region);
        if ( $region_hi2 != 0 ){
            echo  "High Impact Africa 2";
        }

		$result_region = sqlsrv_query($conncss, "SELECT * FROM region_sea WHERE country = '$country'");
        $region_sea = sqlsrv_num_rows($result_region);
        if ( $region_sea != 0 ){
            echo  "South East Asia";
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_sa WHERE country = '$country'");
        $region_sa = sqlsrv_num_rows($result_region);
        if ( $region_sa != 0 ){
            echo  "Southern Africa";	
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_mena WHERE country = '$country'");
        $region_mena = sqlsrv_num_rows($result_region);
        if ( $region_mena != 0 ){
            echo  "MENA";
        }
    
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_wa WHERE country = '$country'");
        $region_wa = sqlsrv_num_rows($result_region);
        if ( $region_wa != 0 ){
            echo  "Western Africa";	
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_ca WHERE country = '$country'");
        $region_ca = sqlsrv_num_rows($result_region);
        if ( $region_ca != 0 ){
            echo  "Central Africa";	
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_eeca WHERE country = '$country'");
        $region_eeca = sqlsrv_num_rows($result_region);
		if ( $region_eeca != 0 ){
            echo  "EECA";	
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_lac WHERE country = '$country'");
        $region_lac = sqlsrv_num_rows($result_region);
        if ( $region_lac != 0 ){
            echo  "LAC";	
        }

        if ( $country == "Internal" ){
            echo  "Internal";	
        }
?>


</td>
<td><?php $date_received = $rowallegations2016['date_received'];
	echo $date_received_newDate = date('F j, Y', strtotime($date_received));
	?></td>
    <td><?php echo $status = $rowallegations2016['status']; ?></td>
<td><?php echo $resolution = $rowallegations2016['resolution'];?></td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>