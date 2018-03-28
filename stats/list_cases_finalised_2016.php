 <?php
include("..\includes\opendb.php");

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


$result_cases_finalized_year_pre_2016 = sqlsrv_query($conn, "SELECT * FROM cases WHERE current_status = 'Finalised' AND creation_date BETWEEN '2007-01-01' AND '2015-12-31' AND date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_finalized_pre_2016 = sqlsrv_num_rows($result_cases_finalized_year_pre_2016);	

$result_cases_finalized_year_2016 = sqlsrv_query($conn, "SELECT * FROM cases WHERE current_status = 'Finalised' AND creation_date BETWEEN '2016-01-01' AND '2016-12-31' AND date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_finalized_opened_2016 = sqlsrv_num_rows($result_cases_finalized_year_2016);

$result_cases_finalized_2016_per_region = sqlsrv_query($conn, "SELECT * FROM cases WHERE current_status = 'Finalised' AND date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_finalized_2016 = sqlsrv_num_rows($result_cases_finalized_2016_per_region);	



$result_cases_finalized_2016_outcome = sqlsrv_query($conn, "SELECT * FROM cases WHERE current_status = 'Finalised' AND case_closure = 'Closed after preliminary investigation' AND date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_finalized_2016_ccm = sqlsrv_num_rows($result_cases_finalized_2016_outcome);	

$result_cases_finalized_2016_outcome = sqlsrv_query($conn, "SELECT * FROM cases WHERE current_status = 'Finalised' AND case_closure = 'Closed after full investigation' AND date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_finalized_2016_report = sqlsrv_num_rows($result_cases_finalized_2016_outcome);	


$result_cases_finalized_2016_proportionate = sqlsrv_query($conn, "SELECT * FROM cases LEFT JOIN closure_memos ON cases.ref_number = closure_memos.ref_number WHERE cases.case_closure = 'Closed after preliminary investigation' AND cases.current_status = 'Finalised' AND closure_memos.justification = 'Proportionate response' AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_cases_finalized_2016_proportionate = sqlsrv_num_rows($result_cases_finalized_2016_proportionate);	


$result_cases_finalized_2016_unfounded = sqlsrv_query($conn, "SELECT * FROM cases LEFT JOIN closure_memos ON cases.ref_number = closure_memos.ref_number WHERE cases.case_closure = 'Closed after preliminary investigation' AND cases.current_status = 'Finalised' AND closure_memos.justification = 'Unfounded' AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_cases_finalized_2016_unfounded = sqlsrv_num_rows($result_cases_finalized_2016_unfounded);	


$result_cases_finalized_2016_inconclusive = sqlsrv_query($conn, "SELECT * FROM cases LEFT JOIN closure_memos ON cases.ref_number = closure_memos.ref_number WHERE cases.case_closure = 'Closed after preliminary investigation' AND cases.current_status = 'Finalised' AND closure_memos.justification = 'Inconclusive' AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_cases_finalized_2016_inconclusive = sqlsrv_num_rows($result_cases_finalized_2016_inconclusive);	




while($rowallegations2016_per_region = sqlsrv_fetch_array($result_cases_finalized_2016_per_region)){
	
	
		$country = $rowallegations2016_per_region['country'];	
			
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_asia WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
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
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" /> 
  
<script type="text/javascript" src="..\js\loader.js"></script>
    
    

<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasicopencases);

function drawBasicopencases() {

        var data = google.visualization.arrayToDataTable([
		['Regions', 'Cases finalized', { role: 'style' }, {type: 'string', role: 'annotation'}],
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

      var chart = new google.visualization.BarChart(document.getElementById('chart_regions_closed_cases'));

      chart.draw(data, options);
    }
    </script>



<script type="text/javascript">
   google.charts.load("current1", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
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

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }

    </script>


<script type="text/javascript">
   google.charts.load("current1", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cases', 'Cases'],
		['Investigation Report', <?php echo $num_cases_finalized_2016_report ?>],
		['Case Closure MEMO',<?php echo $num_cases_finalized_2016_ccm ?>],
        ]);

        var options = {
			chartArea: {width: '90%', 'top': '5%', 'left': '5%', 'bottom': '5%'},
		  legend: {
			 position: 'labeled',
			 pieSliceText:"value"                                    
			 },
			 is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchartoutcome'));
        chart.draw(data, options);
      }

    </script>
    
    
    
    <script type="text/javascript">
   google.charts.load("current1", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cases', 'Cases'],
		['Proportionate response', <?php echo $num_cases_finalized_2016_proportionate ?>],
		['Unfounded',<?php echo $num_cases_finalized_2016_unfounded ?>],
		['Inconclusive',<?php echo $num_cases_finalized_2016_inconclusive ?>],
        ]);

        var options = {
			chartArea: {width: '90%', 'top': '5%', 'left': '5%', 'bottom': '5%'},
		  legend: {
			 position: 'labeled',
			 pieSliceText:"value"                                    
			 },
			 is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchartjust'));
        chart.draw(data, options);
      }

    </script>

<link rel="stylesheet" href="..\css\liteAccordion.css">



</head>

<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
    <script src="..\js\liteaccordion.jquery.js"></script>
<div id="yourdiv">
    <ol>
        <li>
            <h2><span>Cases Finalized by Region</span></h2>
            
			<div id="chart_regions_closed_cases" style='width: 500px; height: 350px'></div>
      </li>
        <li>
            <h2><span>Cases Finalized by Region (%)</span></h2>
	            <div id="donutchart" style="width: 500px; height: 325px;"></div>
	    </li>
        <li>
            <h2><span>Investigation Reports VS Closure Memos</span></h2>
            	<div id="donutchartoutcome" style="width: 500px; height: 325px;"></div>
	    </li>
         <li>
            <h2><span>Closure Memos Outcome</span></h2>
            	<div id="donutchartjust" style="width: 500px; height: 325px;"></div>
	    </li>
    </ol>
</div>
<script>
    $('#yourdiv').liteAccordion({
	rounded : true,
	theme : 'dark'
		});
</script> 


<div id="entities-contain" align="center">
      <table align="center" width="100%">
      <tr>
          <td colspan="7">
          <font size="+1"><strong>Total cases finalized in 2016: </font><font size="+1"; color="#990000"><?php echo $num_cases_finalized_2016 ?></strong></font><br />
          <font size="-1">* <?php echo $num_cases_finalized_pre_2016 ?> cases opened prior 2016</font><br />
          <font size="-1">* <?php echo $num_cases_finalized_opened_2016 ?> cases opened in 2016</font>
          </td>
      </tr>
        <tr>
          <th>Case</th>
          <th>Country</th>
          <th>Region</th>
          <th>Date Finalized</th>
          <th>Status</th>
          <th>Investigator</th>
          <th>Current Stage</th>
        </tr>
        <tr>
<?php



$result_allegations2016 = sqlsrv_query($conn, "SELECT * FROM cases WHERE current_status = 'Under Investigation' OR date_finalised BETWEEN '2016-01-01' AND '2016-12-31' ORDER BY creation_date DESC");		
$num_allegations_2016 = sqlsrv_num_rows($result_allegations2016);	
while($rowallegations2016 = sqlsrv_fetch_array($result_allegations2016)){
	$proactive = $rowallegations2016['proactive'];	
	$current_status = $rowallegations2016['current_status'];
	
	if( $current_status != "Under Investigation")
	{
		  $color = "#E9EFDA";
	}
	else
	{
		  $color = "#FFF";
	}
	
	
?>
<tr style='background-color: <?php echo $color ?>'>
<td>
<?php
if ( $proactive == "Yes" ){ ?>
	<img src="../images/Pro-icon1.png" width="22" height="22" align="absmiddle"/>&nbsp;
<?php }
echo $ref_number = $rowallegations2016['ref_number'];?>

</td>
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





<td>
<?php
$date_finalised = $rowallegations2016['date_finalised'];
if( $date_finalised != "" ){
	echo $date_finalised = date('F j, Y', strtotime($date_finalised));
}
?>
</td>
<td><?php echo $current_status;?></td>
<td><?php echo $assigned_to = $rowallegations2016['assigned_to'];?></td>

<td><?php $current_stage = $rowallegations2016['stage'];

if ( $current_stage == "" ){
							$stage_name = "";
						}
						else if ( $current_stage == "2" ){
			
							$stage_name = "2 - Initial desk based research";
							
						}else if ( $current_stage == "3" ){
							
							$stage_name = "4a - Closure Memorandum";
							
						}else if ( $current_stage == "4" ){
							
							$stage_name = "3- Investigation";
							
						}else if ( $current_stage == "5" ){
							
							$stage_name = "4b - Drafting and review of findings";
						
						}else if ( $current_stage == "6" ){
							
							$stage_name = "5 - Fact and accuracy";
							
						}else if ( $current_stage == "7" ){
							
							$stage_name = "6 - Report Consolidation";
					
						}else if ( $current_stage == "8" ){
							
							$stage_name = "7 - Checking context, tone and balance";
							
						}else if ( $current_stage == "9" ){
							
							$stage_name = "8 - Report Finalized";
							
						}else if ( $current_stage == "10" ){
							
							$stage_name = "9 - Agreed actions tracking";
							
						}

echo $stage_name;?>
</td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>