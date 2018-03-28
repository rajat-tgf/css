 <?php

require_once("includes\\opendb.php");
include("cases_allegations_2016_region.php");
include("cases_opened_2016_region.php");
include("cases_finalised_2016_region.php");

$allegations_received_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received = sqlsrv_num_rows($allegations_received_2016); 

$allegations_received_2016_open_case = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE status = 'Closed' AND resolution = 'Open case in CMS' AND reviewed_by_officer_date BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));						
$num_allegations_received_2016_open_case = sqlsrv_num_rows($allegations_received_2016_open_case);	


$result_cases_finalised_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE current_status = 'Finalised' AND date_finalised BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_finalised_2016 = sqlsrv_num_rows($result_cases_finalised_2016);	




//ALLEAGTIONS 2016

$result_allegations_jan_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2016 = sqlsrv_num_rows($result_allegations_jan_2016);	

$result_allegations_feb_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2016 = sqlsrv_num_rows($result_allegations_feb_2016);

$result_allegations_mar_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2016 = sqlsrv_num_rows($result_allegations_mar_2016);

$result_allegations_apr_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2016 = sqlsrv_num_rows($result_allegations_apr_2016);

$result_allegations_may_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2016 = sqlsrv_num_rows($result_allegations_may_2016);

$result_allegations_jun_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2016 = sqlsrv_num_rows($result_allegations_jun_2016);

$result_allegations_jul_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2016 = sqlsrv_num_rows($result_allegations_jul_2016);

$result_allegations_aug_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2016 = sqlsrv_num_rows($result_allegations_aug_2016);

$result_allegations_sep_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2016 = sqlsrv_num_rows($result_allegations_sep_2016);

$result_allegations_oct_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2016 = sqlsrv_num_rows($result_allegations_oct_2016);

$result_allegations_nov_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2016 = sqlsrv_num_rows($result_allegations_nov_2016);

$result_allegations_dec_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2016 = sqlsrv_num_rows($result_allegations_dec_2016);

				  
?>


<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable([
    ['Month', '2016'],
    ['Jan',  <?php echo $num_allegations_jan_2016 ?>],
    ['Feb',  <?php echo $num_allegations_feb_2016 ?>],
    ['Mar',  <?php echo $num_allegations_mar_2016 ?>],
    ['Apr',  <?php echo $num_allegations_apr_2016 ?>],
	['May',  <?php echo $num_allegations_may_2016 ?>],
	['Jun',  <?php echo $num_allegations_jun_2016 ?>],
	['Jul',  <?php echo $num_allegations_jul_2016 ?>],
	['Aug',  <?php echo $num_allegations_aug_2016 ?>],
	['Sep',  <?php echo $num_allegations_sep_2016 ?>],
	['Oct',  <?php echo $num_allegations_oct_2016 ?>],
	['Nov',  <?php echo $num_allegations_nov_2016 ?>],
    ['Dec',  <?php echo $num_allegations_dec_2016 ?>]
  ]);

  var options = {
    seriesType: "bars",
	hAxis: {slantedText: true},
	legend: { position: 'none' },
	chartArea: {'top': '2%', 'bottom': '15%'},
	width: 450,
	height: 150,
  };

  var chart = new google.visualization.ComboChart(document.getElementById('chart_divmonth'));
  chart.draw(data, options);
}
</script>


<?php

//ALLEAGTIONS 2016

$result_allegations_jan_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2016 = sqlsrv_num_rows($result_allegations_jan_2016);	

$result_allegations_feb_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2016 = sqlsrv_num_rows($result_allegations_feb_2016);

$result_allegations_mar_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2016 = sqlsrv_num_rows($result_allegations_mar_2016);

$result_allegations_apr_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2016 = sqlsrv_num_rows($result_allegations_apr_2016);

$result_allegations_may_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2016 = sqlsrv_num_rows($result_allegations_may_2016);

$result_allegations_jun_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2016 = sqlsrv_num_rows($result_allegations_jun_2016);

$result_allegations_jul_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2016 = sqlsrv_num_rows($result_allegations_jul_2016);

$result_allegations_aug_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2016 = sqlsrv_num_rows($result_allegations_aug_2016);

$result_allegations_sep_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2016 = sqlsrv_num_rows($result_allegations_sep_2016);

$result_allegations_oct_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2016 = sqlsrv_num_rows($result_allegations_oct_2016);

$result_allegations_nov_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2016 = sqlsrv_num_rows($result_allegations_nov_2016);

$result_allegations_dec_2016 = sqlsrv_query($conn, "SELECT id FROM cases WHERE creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2016 = sqlsrv_num_rows($result_allegations_dec_2016);
?>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  var data = google.visualization.arrayToDataTable([
    ['Month', '2016'],
    ['Jan',  <?php echo $num_allegations_jan_2016 ?>],
    ['Feb',  <?php echo $num_allegations_feb_2016 ?>],
    ['Mar',  <?php echo $num_allegations_mar_2016 ?>],
    ['Apr',  <?php echo $num_allegations_apr_2016 ?>],
	['May',  <?php echo $num_allegations_may_2016 ?>],
	['Jun',  <?php echo $num_allegations_jun_2016 ?>],
	['Jul',  <?php echo $num_allegations_jul_2016 ?>],
	['Aug',  <?php echo $num_allegations_aug_2016 ?>],
	['Sep',  <?php echo $num_allegations_sep_2016 ?>],
	['Oct',  <?php echo $num_allegations_oct_2016 ?>],
	['Nov',  <?php echo $num_allegations_nov_2016 ?>],
    ['Dec',  <?php echo $num_allegations_dec_2016 ?>]
  ]);

  var options = {
    seriesType: "bars",
	hAxis: {slantedText: true},
	legend: { position: 'none' },
	chartArea: {'top': '2%', 'bottom': '15%'},
	width: 450,
	height: 150,
  };

  var chart_cases_month = new google.visualization.ComboChart(document.getElementById('chart_cases_month'));
  chart_cases_month.draw(data, options);
}
    </script>
    
    

 <script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
 
  
  google.setOnLoadCallback(drawChart1); 
  function drawChart1() {

var data = google.visualization.arrayToDataTable([
    ['Month', 'SEA', 'SA', 'CA' , 'MENA', 'WA',  'EECA' , 'LAC', 'Internal', 'HI Africa 1', 'HI Africa 2', 'HI Asia' ],
    ['Jan',  <?php echo $num_region_sea_jan ?>,  <?php echo $num_region_sa_jan ?>,  <?php echo $num_region_ca_jan ?>,  <?php echo $num_region_mena_jan ?>,  <?php echo $num_region_wa_jan ?>,  <?php echo $num_region_eeca_jan ?>,  <?php echo $num_region_lac_jan ?>,  <?php echo $num_region_internal_jan?>,  <?php echo $num_impact_africa1_jan ?>,  <?php echo $num_impact_africa2_jan ?>, <?php echo $num_impact_asia_jan ?>],
	['Feb',  <?php echo $num_region_sea_feb ?>,  <?php echo $num_region_sa_feb ?>,  <?php echo $num_region_ca_feb ?>,  <?php echo $num_region_mena_feb ?>,  <?php echo $num_region_wa_feb ?>,  <?php echo $num_region_eeca_feb ?>,  <?php echo $num_region_lac_feb ?>,  <?php echo $num_region_internal_feb?>,  <?php echo $num_impact_africa1_feb ?>,  <?php echo $num_impact_africa2_feb ?>, <?php echo $num_impact_asia_feb ?>],
	['Mar',  <?php echo $num_region_sea_mar ?>,  <?php echo $num_region_sa_mar ?>,  <?php echo $num_region_ca_mar ?>,  <?php echo $num_region_mena_mar ?>,  <?php echo $num_region_wa_mar ?>,  <?php echo $num_region_eeca_mar ?>,  <?php echo $num_region_lac_mar ?>,  <?php echo $num_region_internal_mar?>,  <?php echo $num_impact_africa1_mar ?>,  <?php echo $num_impact_africa2_mar ?>, <?php echo $num_impact_asia_mar ?>],
	['Apr',  <?php echo $num_region_sea_apr ?>,  <?php echo $num_region_sa_apr ?>,  <?php echo $num_region_ca_apr ?>,  <?php echo $num_region_mena_apr ?>,  <?php echo $num_region_wa_apr ?>,  <?php echo $num_region_eeca_apr ?>,  <?php echo $num_region_lac_apr ?>,  <?php echo $num_region_internal_apr?>,  <?php echo $num_impact_africa1_apr ?>,  <?php echo $num_impact_africa2_apr ?>, <?php echo $num_impact_asia_apr ?>],
	['May',  <?php echo $num_region_sea_may ?>,  <?php echo $num_region_sa_may ?>,  <?php echo $num_region_ca_may ?>,  <?php echo $num_region_mena_may ?>,  <?php echo $num_region_wa_may ?>,  <?php echo $num_region_eeca_may ?>,  <?php echo $num_region_lac_may ?>,  <?php echo $num_region_internal_may?>,  <?php echo $num_impact_africa1_may ?>,  <?php echo $num_impact_africa2_may ?>, <?php echo $num_impact_asia_may ?>],
	['Jun',  <?php echo $num_region_sea_jun ?>,  <?php echo $num_region_sa_jun ?>,  <?php echo $num_region_ca_jun ?>,  <?php echo $num_region_mena_jun ?>,  <?php echo $num_region_wa_jun ?>,  <?php echo $num_region_eeca_jun ?>,  <?php echo $num_region_lac_jun ?>,  <?php echo $num_region_internal_jun?>,  <?php echo $num_impact_africa1_jun ?>,  <?php echo $num_impact_africa2_jun ?>, <?php echo $num_impact_asia_jun ?>],
	['Jul',  <?php echo $num_region_sea_jul ?>,  <?php echo $num_region_sa_jul ?>,  <?php echo $num_region_ca_jul ?>,  <?php echo $num_region_mena_jul ?>,  <?php echo $num_region_wa_jul ?>,  <?php echo $num_region_eeca_jul ?>,  <?php echo $num_region_lac_jul ?>,  <?php echo $num_region_internal_jul?>,  <?php echo $num_impact_africa1_jul ?>,  <?php echo $num_impact_africa2_jul ?>, <?php echo $num_impact_asia_jul ?>],
	['Aug',  <?php echo $num_region_sea_aug ?>,  <?php echo $num_region_sa_aug ?>,  <?php echo $num_region_ca_aug ?>,  <?php echo $num_region_mena_aug ?>,  <?php echo $num_region_wa_aug ?>,  <?php echo $num_region_eeca_aug ?>,  <?php echo $num_region_lac_aug ?>,  <?php echo $num_region_internal_aug?>,  <?php echo $num_impact_africa1_aug ?>,  <?php echo $num_impact_africa2_aug ?>, <?php echo $num_impact_asia_aug ?>],
	['Sep',  <?php echo $num_region_sea_sep ?>,  <?php echo $num_region_sa_sep ?>,  <?php echo $num_region_ca_sep ?>,  <?php echo $num_region_mena_sep ?>,  <?php echo $num_region_wa_sep ?>,  <?php echo $num_region_eeca_sep ?>,  <?php echo $num_region_lac_sep ?>,  <?php echo $num_region_internal_sep?>,  <?php echo $num_impact_africa1_sep ?>,  <?php echo $num_impact_africa2_sep ?>, <?php echo $num_impact_asia_sep ?>],
	['Oct',  <?php echo $num_region_sea_oct ?>,  <?php echo $num_region_sa_oct ?>,  <?php echo $num_region_ca_oct ?>,  <?php echo $num_region_mena_oct ?>,  <?php echo $num_region_wa_oct ?>,  <?php echo $num_region_eeca_oct ?>,  <?php echo $num_region_lac_oct ?>,  <?php echo $num_region_internal_oct?>,  <?php echo $num_impact_africa1_oct ?>,  <?php echo $num_impact_africa2_oct ?>, <?php echo $num_impact_asia_oct ?>],
	['Nov',  <?php echo $num_region_sea_nov ?>,  <?php echo $num_region_sa_nov ?>,  <?php echo $num_region_ca_nov ?>,  <?php echo $num_region_mena_nov ?>,  <?php echo $num_region_wa_nov ?>,  <?php echo $num_region_eeca_nov ?>,  <?php echo $num_region_lac_nov ?>,  <?php echo $num_region_internal_nov?>,  <?php echo $num_impact_africa1_nov ?>,  <?php echo $num_impact_africa2_nov ?>, <?php echo $num_impact_asia_nov ?>],
	['Dec',  <?php echo $num_region_sea_dec ?>,  <?php echo $num_region_sa_dec ?>,  <?php echo $num_region_ca_dec ?>,  <?php echo $num_region_mena_dec ?>,  <?php echo $num_region_wa_dec ?>,  <?php echo $num_region_eeca_dec ?>,  <?php echo $num_region_lac_dec ?>,  <?php echo $num_region_internal_dec?>,  <?php echo $num_impact_africa1_dec ?>,  <?php echo $num_impact_africa2_dec ?>, <?php echo $num_impact_asia_dec ?>]
	]);

      var options = {
		hAxis: {slantedText: true},
		chartArea: {'top': '2%', 'bottom': '15%', 'right': '20%'},
		width: 500,
		height: 240,
        legend: { position: 'right'},

        isStacked: true,
      };
  
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_new_cases_2016'));
    chart.draw(data, options);
}
    </script>   
    
    
    
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
 
  
  google.setOnLoadCallback(drawChart1); 
  function drawChart1() {

var data = google.visualization.arrayToDataTable([
    ['Month', 'SEA', 'SA', 'CA' , 'MENA', 'WA',  'EECA' , 'LAC', 'Internal', 'HI Africa 1', 'HI Africa 2', 'HI Asia' ],
    ['Jan',  <?php echo $num_region_sea_janc ?>,  <?php echo $num_region_sa_janc ?>,  <?php echo $num_region_ca_janc ?>,  <?php echo $num_region_mena_janc ?>,  <?php echo $num_region_wa_janc ?>,  <?php echo $num_region_eeca_janc ?>,  <?php echo $num_region_lac_janc ?>,  <?php echo $num_region_internal_janc?>,  <?php echo $num_impact_africa1_janc ?>,  <?php echo $num_impact_africa2_janc ?>,  <?php echo $num_impact_asia_janc ?>],
	['Feb',  <?php echo $num_region_sea_febc ?>,  <?php echo $num_region_sa_febc ?>,  <?php echo $num_region_ca_febc ?>,  <?php echo $num_region_mena_febc ?>,  <?php echo $num_region_wa_febc ?>,  <?php echo $num_region_eeca_febc ?>,  <?php echo $num_region_lac_febc ?>,  <?php echo $num_region_internal_febc?>,  <?php echo $num_impact_africa1_febc ?>,  <?php echo $num_impact_africa2_febc ?>,  <?php echo $num_impact_asia_febc ?>],
	['Mar',  <?php echo $num_region_sea_marc ?>,  <?php echo $num_region_sa_marc ?>,  <?php echo $num_region_ca_marc ?>,  <?php echo $num_region_mena_marc ?>,  <?php echo $num_region_wa_marc ?>,  <?php echo $num_region_eeca_marc ?>,  <?php echo $num_region_lac_marc ?>,  <?php echo $num_region_internal_marc?>,  <?php echo $num_impact_africa1_marc ?>,  <?php echo $num_impact_africa2_marc ?>,  <?php echo $num_impact_asia_marc ?>],
	['Apr',  <?php echo $num_region_sea_aprc ?>,  <?php echo $num_region_sa_aprc?>,  <?php echo $num_region_ca_aprc ?>,  <?php echo $num_region_mena_aprc ?>,  <?php echo $num_region_wa_aprc ?>,  <?php echo $num_region_eeca_aprc ?>,  <?php echo $num_region_lac_aprc ?>,  <?php echo $num_region_internal_aprc?>,  <?php echo $num_impact_africa1_aprc ?>,  <?php echo $num_impact_africa2_aprc ?>,  <?php echo $num_impact_asia_aprc ?>],
	['May',  <?php echo $num_region_sea_mayc ?>,  <?php echo $num_region_sa_mayc ?>,  <?php echo $num_region_ca_mayc ?>,  <?php echo $num_region_mena_mayc ?>,  <?php echo $num_region_wa_mayc ?>,  <?php echo $num_region_eeca_mayc ?>,  <?php echo $num_region_lac_mayc ?>,  <?php echo $num_region_internal_mayc?>,  <?php echo $num_impact_africa1_mayc ?>,  <?php echo $num_impact_africa2_mayc ?>,  <?php echo $num_impact_asia_mayc ?>],
	['Jun',  <?php echo $num_region_sea_junc ?>,  <?php echo $num_region_sa_junc ?>,  <?php echo $num_region_ca_junc ?>,  <?php echo $num_region_mena_junc ?>,  <?php echo $num_region_wa_junc ?>,  <?php echo $num_region_eeca_junc ?>,  <?php echo $num_region_lac_junc ?>,  <?php echo $num_region_internal_junc?>,  <?php echo $num_impact_africa1_junc ?>,  <?php echo $num_impact_africa2_junc ?>,  <?php echo $num_impact_asia_junc ?>],
	['Jul',  <?php echo $num_region_sea_julc ?>,  <?php echo $num_region_sa_julc ?>,  <?php echo $num_region_ca_julc ?>,  <?php echo $num_region_mena_julc ?>,  <?php echo $num_region_wa_julc ?>,  <?php echo $num_region_eeca_julc ?>,  <?php echo $num_region_lac_julc ?>,  <?php echo $num_region_internal_julc?>,  <?php echo $num_impact_africa1_julc ?>,  <?php echo $num_impact_africa2_julc ?>,  <?php echo $num_impact_asia_julc ?>],
	['Aug',  <?php echo $num_region_sea_augc ?>,  <?php echo $num_region_sa_augc ?>,  <?php echo $num_region_ca_augc ?>,  <?php echo $num_region_mena_augc ?>,  <?php echo $num_region_wa_augc ?>,  <?php echo $num_region_eeca_augc ?>,  <?php echo $num_region_lac_augc ?>,  <?php echo $num_region_internal_augc?>,  <?php echo $num_impact_africa1_augc ?>,  <?php echo $num_impact_africa2_augc ?>,  <?php echo $num_impact_asia_augc ?>],
	['Sep',  <?php echo $num_region_sea_sepc ?>,  <?php echo $num_region_sa_sepc ?>,  <?php echo $num_region_ca_sepc ?>,  <?php echo $num_region_mena_sepc ?>,  <?php echo $num_region_wa_sepc ?>,  <?php echo $num_region_eeca_sepc ?>,  <?php echo $num_region_lac_sepc ?>,  <?php echo $num_region_internal_sepc?>,  <?php echo $num_impact_africa1_sepc ?>,  <?php echo $num_impact_africa2_sepc ?>,  <?php echo $num_impact_asia_sepc ?>],
	['Oct',  <?php echo $num_region_sea_octc ?>,  <?php echo $num_region_sa_octc ?>,  <?php echo $num_region_ca_octc ?>,  <?php echo $num_region_mena_octc ?>,  <?php echo $num_region_wa_octc ?>,  <?php echo $num_region_eeca_octc ?>,  <?php echo $num_region_lac_octc ?>,  <?php echo $num_region_internal_octc?>,  <?php echo $num_impact_africa1_octc ?>,  <?php echo $num_impact_africa2_octc ?>,  <?php echo $num_impact_asia_octc ?>],
	['Nov',  <?php echo $num_region_sea_novc ?>,  <?php echo $num_region_sa_novc ?>,  <?php echo $num_region_ca_novc?>,  <?php echo $num_region_mena_novc?>,  <?php echo $num_region_wa_novc ?>,  <?php echo $num_region_eeca_novc ?>,  <?php echo $num_region_lac_novc ?>,  <?php echo $num_region_internal_novc?>,  <?php echo $num_impact_africa1_novc ?>,  <?php echo $num_impact_africa2_novc ?>,  <?php echo $num_impact_asia_novc ?>],
	['Dec',  <?php echo $num_region_sea_decc ?>,  <?php echo $num_region_sa_decc ?>,  <?php echo $num_region_ca_decc ?>,  <?php echo $num_region_mena_decc ?>,  <?php echo $num_region_wa_decc ?>,  <?php echo $num_region_eeca_decc ?>,  <?php echo $num_region_lac_decc ?>,  <?php echo $num_region_internal_decc?>,  <?php echo $num_impact_africa1_decc ?>,  <?php echo $num_impact_africa2_decc ?>,  <?php echo $num_impact_asia_decc ?>]
	]);

      var options = {
		hAxis: {slantedText: true},
		chartArea: {'top': '2%', 'bottom': '15%', 'right': '20%'},
		width: 500,
		height: 240,
        legend: { position: 'right'},

        isStacked: true,
      };
  
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_cases_finalised_2016'));
    chart.draw(data, options);
}
    </script>  
    
    
    
    
     <script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
 
  
  google.setOnLoadCallback(drawChart1); 
  function drawChart1() {

var data = google.visualization.arrayToDataTable([
    ['Month', 'SEA', 'SA', 'CA' , 'MENA', 'WA',  'EECA' , 'LAC', 'Internal', 'HI Africa 1', 'HI Africa 2', 'HI Asia' ],
    ['Jan',  <?php echo $num_region_sea_jana ?>,  <?php echo $num_region_sa_jana ?>,  <?php echo $num_region_ca_jana ?>,  <?php echo $num_region_mena_jana ?>,  <?php echo $num_region_wa_jana ?>,  <?php echo $num_region_eeca_jana ?>,  <?php echo $num_region_lac_jana ?>,  <?php echo $num_region_internal_jana?>,  <?php echo $num_impact_africa1_jana ?>,  <?php echo $num_impact_africa2_jana ?>, <?php echo $num_impact_asia_jana ?>],
	['Feb',  <?php echo $num_region_sea_feba ?>,  <?php echo $num_region_sa_feba ?>,  <?php echo $num_region_ca_feba ?>,  <?php echo $num_region_mena_feba ?>,  <?php echo $num_region_wa_feba ?>,  <?php echo $num_region_eeca_feba ?>,  <?php echo $num_region_lac_feba ?>,  <?php echo $num_region_internal_feba?>,  <?php echo $num_impact_africa1_feba ?>,  <?php echo $num_impact_africa2_feba ?>, <?php echo $num_impact_asia_feba ?>],
	['Mar',  <?php echo $num_region_sea_mara ?>,  <?php echo $num_region_sa_mara ?>,  <?php echo $num_region_ca_mara ?>,  <?php echo $num_region_mena_mara ?>,  <?php echo $num_region_wa_mara ?>,  <?php echo $num_region_eeca_mara ?>,  <?php echo $num_region_lac_mara ?>,  <?php echo $num_region_internal_mara?>,  <?php echo $num_impact_africa1_mara ?>,  <?php echo $num_impact_africa2_mara ?>, <?php echo $num_impact_asia_mara ?>],
	['Apr',  <?php echo $num_region_sea_apra ?>,  <?php echo $num_region_sa_apra ?>,  <?php echo $num_region_ca_apra ?>,  <?php echo $num_region_mena_apra ?>,  <?php echo $num_region_wa_apra ?>,  <?php echo $num_region_eeca_apra ?>,  <?php echo $num_region_lac_apra ?>,  <?php echo $num_region_internal_apra?>,  <?php echo $num_impact_africa1_apra ?>,  <?php echo $num_impact_africa2_apra ?>, <?php echo $num_impact_asia_apra ?>],
	['May',  <?php echo $num_region_sea_maya ?>,  <?php echo $num_region_sa_maya ?>,  <?php echo $num_region_ca_maya ?>,  <?php echo $num_region_mena_maya ?>,  <?php echo $num_region_wa_maya ?>,  <?php echo $num_region_eeca_maya ?>,  <?php echo $num_region_lac_maya ?>,  <?php echo $num_region_internal_maya?>,  <?php echo $num_impact_africa1_maya ?>,  <?php echo $num_impact_africa2_maya ?>, 
	<?php echo $num_impact_asia_maya ?>],
	['Jun',  <?php echo $num_region_sea_juna ?>,  <?php echo $num_region_sa_juna ?>,  <?php echo $num_region_ca_juna ?>,  <?php echo $num_region_mena_juna ?>,  <?php echo $num_region_wa_juna ?>,  <?php echo $num_region_eeca_juna ?>,  <?php echo $num_region_lac_juna ?>,  <?php echo $num_region_internal_juna?>,  <?php echo $num_impact_africa1_juna ?>,  <?php echo $num_impact_africa2_juna ?>, <?php echo $num_impact_asia_juna ?>],
	['Jul',  <?php echo $num_region_sea_jula ?>,  <?php echo $num_region_sa_jula ?>,  <?php echo $num_region_ca_jula ?>,  <?php echo $num_region_mena_jula ?>,  <?php echo $num_region_wa_jula ?>,  <?php echo $num_region_eeca_jula ?>,  <?php echo $num_region_lac_jula ?>,  <?php echo $num_region_internal_jula?>,  <?php echo $num_impact_africa1_jula ?>,  <?php echo $num_impact_africa2_jula ?>, <?php echo $num_impact_asia_jula ?>],
	['Aug',  <?php echo $num_region_sea_auga ?>,  <?php echo $num_region_sa_auga ?>,  <?php echo $num_region_ca_auga ?>,  <?php echo $num_region_mena_auga ?>,  <?php echo $num_region_wa_auga ?>,  <?php echo $num_region_eeca_auga ?>,  <?php echo $num_region_lac_auga ?>,  <?php echo $num_region_internal_auga?>,  <?php echo $num_impact_africa1_auga ?>,  <?php echo $num_impact_africa2_auga ?>, <?php echo $num_impact_asia_auga ?>],
	['Sep',  <?php echo $num_region_sea_sepa ?>,  <?php echo $num_region_sa_sepa ?>,  <?php echo $num_region_ca_sepa ?>,  <?php echo $num_region_mena_sepa ?>,  <?php echo $num_region_wa_sepa ?>, <?php echo $num_region_eeca_sepa ?>,  <?php echo $num_region_lac_sepa ?>,  <?php echo $num_region_internal_sepa?>,  <?php echo $num_impact_africa1_sepa ?>,  <?php echo $num_impact_africa2_sepa ?>, <?php echo $num_impact_asia_sepa ?>],
	['Oct',  <?php echo $num_region_sea_octa ?>,  <?php echo $num_region_sa_octa ?>,  <?php echo $num_region_ca_octa ?>,  <?php echo $num_region_mena_octa ?>,  <?php echo $num_region_wa_octa ?>,  <?php echo $num_region_eeca_octa ?>,  <?php echo $num_region_lac_octa ?>,  <?php echo $num_region_internal_octa?>,  <?php echo $num_impact_africa1_octa ?>,  <?php echo $num_impact_africa2_octa ?>, <?php echo $num_impact_asia_octa ?>],
	['Nov',  <?php echo $num_region_sea_nova ?>,  <?php echo $num_region_sa_nova?>,  <?php echo $num_region_ca_nova ?>,  <?php echo $num_region_mena_nova ?>,  <?php echo $num_region_wa_nova ?>,  <?php echo $num_region_eeca_nova ?>,  <?php echo $num_region_lac_nova ?>,  <?php echo $num_region_internal_nova?>,  <?php echo $num_impact_africa1_nova ?>,  <?php echo $num_impact_africa2_nova ?>, <?php echo $num_impact_asia_nova ?>],
	['Dec',  <?php echo $num_region_sea_deca ?>,  <?php echo $num_region_sa_deca ?>,  <?php echo $num_region_ca_deca ?>,  <?php echo $num_region_mena_deca ?>,  <?php echo $num_region_wa_deca ?>,  <?php echo $num_region_eeca_deca ?>,  <?php echo $num_region_lac_deca ?>,  <?php echo $num_region_internal_deca?>,  <?php echo $num_impact_africa1_deca ?>,  <?php echo $num_impact_africa2_deca ?>, <?php echo $num_impact_asia_deca ?>]
	]);

      var options = {
		hAxis: {slantedText: true},
		chartArea: {'top': '2%', 'bottom': '15%', 'right': '20%'},
		width: 500,
		height: 240,
        legend: { position: 'right'},

        isStacked: true,
      };
  
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_allegations_2016'));
    chart.draw(data, options);
}
    </script>   
    

<html>
  <head>

<style>
	div#entities-contain { width: 98%; margin: 0px 0; }
	div#entities-contain table { margin: 1em 0; border-collapse: collapse; font-family: verdana,arial,sans-serif; color:#333333; }
	div#entities-contain table td { font-size:12px; border: 1px solid #DBE5F1; padding:3px; text-align: right; }
	div#entities-contain table th { font-size:12px; border: 1px solid #DBE5F1; padding: 0.3em; text-align: right; background:#F2F2F2; color:#666666; }
</style>


<script type="text/javascript">
	function showDialogworkplan2016(){
		
	
	   $("#divworkplan2016").dialog("open");
	   $("#modalIframeworkplan2016").attr("src","stats/workplan2016.php");
	   return false;
	}

	$(document).ready(function() {
	   $("#divworkplan2016").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
		   position: 'top',
			   autoOpen: false,
			   modal: true,
			   height: 400,
			   width: 400,
			   resizable: false,
			   draggable: false,
			   

		  });
	});
</script>


<script type="text/javascript">
	function showDialogworkplan20169(){
		
	
	   $("#divworkplan20169").dialog("open");
	   $("#modalIframeworkplan20169").attr("src","stats/test.php");
	   return false;
	}

	$(document).ready(function() {
	   $("#divworkplan20169").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
		   position: 'top',
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 1300,
			   resizable: false,
			   draggable: false,
			   

		  });
	});
</script>

 </head>
  
  <body>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  
  
<script type="text/javascript">
    google.charts.load('current', {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var oldData = google.visualization.arrayToDataTable([
      ['Target', 'Target'],
      ['Allegations', 220],
      ['Cases Opened', 61],
      ['Cases Finalized', 79]
    ]);

    var newData = google.visualization.arrayToDataTable([
      ['Actuals', 'Actuals'],
      ['Allegations', <?php echo $num_allegations_received; ?>],
      ['Cases Opened', <?php echo $num_allegations_received_2016_open_case; ?>],
      ['Cases Finalized', <?php echo $num_cases_finalised_2016; ?>]
	  ]);


    var barChartDiff = new google.visualization.BarChart(document.getElementById('barchart_diff'));

    var options = { legend: { position: 'none' },
	title : 'Overall Workplan Progress',

	chartArea: {'left': '29%', 'right': '2%', 'top': '15%', 'bottom': '12%'},
	hAxis: {slantedText: true},
	 };


    var diffData = barChartDiff.computeDiff(oldData, newData);
    barChartDiff.draw(diffData, options);
  }
</script>



<a onClick="return showDialogworkplan2016()">
  Work plan 2016
</a>
<a onClick="return showDialogworkplan20169()">
test</a>

<table width="1501">
<tr>
<td width="492" rowspan="6" align="left" valign="middle">

<span id='barchart_diff' style='width: 450px; height: 400px; display: inline-block'></span>
<br>
<br></td>

<td width="315" valign="top">

<div id="entities-contain">
<table align="right">
<tr>
  <th>Target on allegations</th>
<th>220</th>
<td rowspan="2" style="background-color:#E4C9C9"><font size="+1" color="#990000">
<?php
$per_allegations = ($num_allegations_received / 220) * 100;
echo $per_allegations = round($per_allegations);
?>%

</font></td>
</tr>

<tr>
  <td>Actuals</td>
<td align="left">
<script type="text/javascript">
	function showDialog(){
		
	
	   $("#divscreeningreport").dialog("open");
	   $("#modalIframeIdal").attr("src","stats/list_allegations_2016.php");
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divscreeningreport").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 1200,
			   resizable: false,
			   draggable: false,
			   position: 'top',
			   

		  });
	});
</script>
<a onClick="return showDialog()">
  <?php echo $num_allegations_received; ?>
</a>
</td>
</tr>
</table>
</div>
</td>
<td width="10" valign="top">&nbsp;</td>
<td width="664" valign="top"><div id="chart_allegations_2016" style="width: 450px; height: 130px;"></div></td>

</tr>
<tr>
  <td height="162" colspan="3" valign="bottom"><hr><br>
</td>
  </tr>
<tr>
  <td valign="top">
    <div id="entities-contain">
      <table align="right">
        <tr>
          <th>Target on  cases opened</th>
          <th>61 </th>
          <td rowspan="2" style="background-color:#E4C9C9"><font size="+1" color="#990000">
			<?php
            $per_allegations = ($num_allegations_received_2016_open_case / 61) * 100;
            echo $per_allegations = round($per_allegations);
            ?>%
            
            </font></td>
          </tr>
        <tr>
          <td>Actuals</td>
          <td>
<script type="text/javascript">
	function showDialognewcases(){
		
	
	   $("#divsnewcases").dialog("open");
	   $("#modalnewcases").attr("src","stats/list_cases_2016.php");
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divsnewcases").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 1300,
			   resizable: false,
			   draggable: false,
			   position: 'top',
		  });
	});
</script>
		  <a onClick="return showDialognewcases()">
		  <?php echo $num_allegations_received_2016_open_case; ?>
          </a>
          
          </td>
          </tr>
        </table>
      </div>
  </td>
  <td valign="top">&nbsp;</td>
  <td valign="top"><div id="chart_new_cases_2016" style="width: 450px; height: 130px;"></div></td>
</tr>
<tr>
  <td height="162" colspan="3" valign="bottom"><hr><br>
</td>
  </tr>
<tr>
  <td height="225" valign="top">
    
    
    <div id="entities-contain">
      <table align="right">
        <tr>
          <th>Target on cases finalized</th>
          <th>79</th>
          <td rowspan="2" style="background-color:#E4C9C9"><font size="+1" color="#990000">
            <?php
            $per_allegations = ($num_cases_finalised_2016 / 79) * 100;
            echo $per_allegations = round($per_allegations);
            ?>%
            
            </font></td>
          </tr>
        <tr>
		 <td>Actuals</td>
          <td>
 <script type="text/javascript">
	function showDialognewcasesfinalised(){
		
	
	   $("#divsnewcasesfinalised").dialog("open");
	   $("#modalnewcasesfinalised").attr("src","stats/list_cases_finalised_2016.php");
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divsnewcasesfinalised").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 1300,
			   resizable: false,
			   draggable: false,
			   position: 'top',
		  });
	});
</script>  		  
		  <a onClick="return showDialognewcasesfinalised()">
		  <?php echo $num_cases_finalised_2016; ?>
          </a>
          </td>
          </tr>
        </table>
      </div>
    
    
    
    
  </td>
  <td valign="top">&nbsp;</td>
  <td valign="top"><div id="chart_cases_finalised_2016" style="width: 450px; height: 130px;"></div></td>
</tr>
<tr>
  <td height="151" colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
<tr>
  <td align="left" valign="middle">&nbsp;</td>
  <td height="151" colspan="3" align="center" valign="top">&nbsp;</td>
</tr>
</table>

<div id="divscreeningreport" title="Allegations Received 2016">
<iframe id="modalIframeIdal" frameborder="0" width="1170" height="850">
Your browser is not supported
</iframe>
</div>


<div id="divsnewcases" title="New Cases opened 2016">
<iframe id="modalnewcases" frameborder="0" width="1250" height="850">
Your browser is not supported
</iframe>
</div>

<div id="divsnewcasesfinalised" title="Cases Finalized 2016">
<iframe id="modalnewcasesfinalised" frameborder="0" width="1250" height="850">
Your browser is not supported
</iframe>
</div>

    <div id="divworkplan2016" title="Work Plan 2016">
      <iframe id="modalIframeworkplan2016" frameborder="0" width="350" height="350">
        Your browser is not supported
        </iframe>
	</div>
    
        <div id="divworkplan20169" title="test">
      <iframe id="modalIframeworkplan20169" frameborder="0" width="1400" height="850">
        Your browser is not supported
        </iframe>
	</div>

</body>
</html>