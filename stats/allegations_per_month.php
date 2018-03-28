 <?php

require_once("includes\\opendb.php");
					  
?>
<style type="text/css">
table.gridtable007 {
	font-family:'century gothic', arial, sans-serif;
	font-size:11px;
	color:#FFFFFF;
	text-align: left;
}
table.gridtable007 th {
	font-size:14px;
	color:#39F;
	font-style:!important;
}
table.gridtable007 td {
	color:#666666;
	font-size:12px;
	padding: 3px;
	border:none;
	background-color: #FFFFFF;
}
</style>
<?php
//ALLEAGTIONS 2013

$result_allegations_jan_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-01-01' AND '2013-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2013 = sqlsrv_num_rows($result_allegations_jan_2013);	

$result_allegations_feb_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-02-01' AND '2013-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2013 = sqlsrv_num_rows($result_allegations_feb_2013);

$result_allegations_mar_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-03-01' AND '2013-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2013 = sqlsrv_num_rows($result_allegations_mar_2013);

$result_allegations_apr_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-04-01' AND '2013-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2013 = sqlsrv_num_rows($result_allegations_apr_2013);

$result_allegations_may_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-05-01' AND '2013-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2013 = sqlsrv_num_rows($result_allegations_may_2013);

$result_allegations_jun_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-06-01' AND '2013-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2013 = sqlsrv_num_rows($result_allegations_jun_2013);

$result_allegations_jul_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-07-01' AND '2013-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2013 = sqlsrv_num_rows($result_allegations_jul_2013);

$result_allegations_aug_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-08-01' AND '2013-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2013 = sqlsrv_num_rows($result_allegations_aug_2013);

$result_allegations_sep_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-09-01' AND '2013-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2013 = sqlsrv_num_rows($result_allegations_sep_2013);

$result_allegations_oct_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-10-01' AND '2013-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2013 = sqlsrv_num_rows($result_allegations_oct_2013);

$result_allegations_nov_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-11-01' AND '2013-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2013 = sqlsrv_num_rows($result_allegations_nov_2013);

$result_allegations_dec_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2013-12-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2013 = sqlsrv_num_rows($result_allegations_dec_2013);

// CASES OPENED


$result_cases_jan_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-01-01' AND '2013-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jan_2013 = sqlsrv_num_rows($result_cases_jan_2013);	

$result_cases_feb_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-02-01' AND '2013-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_feb_2013 = sqlsrv_num_rows($result_cases_feb_2013);

$result_cases_mar_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-03-01' AND '2013-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_mar_2013 = sqlsrv_num_rows($result_cases_mar_2013);

$result_cases_apr_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-04-01' AND '2013-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_apr_2013 = sqlsrv_num_rows($result_cases_apr_2013);

$result_cases_may_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-05-01' AND '2013-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_may_2013 = sqlsrv_num_rows($result_cases_may_2013);

$result_cases_jun_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-06-01' AND '2013-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jun_2013 = sqlsrv_num_rows($result_cases_jun_2013);

$result_cases_jul_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-07-01' AND '2013-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jul_2013 = sqlsrv_num_rows($result_cases_jun_2013);

$result_cases_aug_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-08-01' AND '2013-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_aug_2013 = sqlsrv_num_rows($result_cases_aug_2013);

$result_cases_sep_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-09-01' AND '2013-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_sep_2013 = sqlsrv_num_rows($result_cases_sep_2013);

$result_cases_oct_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-10-01' AND '2013-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_oct_2013 = sqlsrv_num_rows($result_cases_oct_2013);

$result_cases_nov_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-11-01' AND '2013-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_nov_2013 = sqlsrv_num_rows($result_cases_nov_2013);

$result_cases_dec_2013 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2013-12-01' AND '2013-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_dec_2013 = sqlsrv_num_rows($result_cases_dec_2013);


//ALLEAGTIONS 2014

$result_allegations_jan_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-01-01' AND '2014-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2014 = sqlsrv_num_rows($result_allegations_jan_2014);	

$result_allegations_feb_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-02-01' AND '2014-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2014 = sqlsrv_num_rows($result_allegations_feb_2014);

$result_allegations_mar_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-03-01' AND '2014-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2014 = sqlsrv_num_rows($result_allegations_mar_2014);

$result_allegations_apr_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-04-01' AND '2014-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2014 = sqlsrv_num_rows($result_allegations_apr_2014);

$result_allegations_may_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-05-01' AND '2014-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2014 = sqlsrv_num_rows($result_allegations_may_2014);

$result_allegations_jun_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-06-01' AND '2014-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2014 = sqlsrv_num_rows($result_allegations_jun_2014);

$result_allegations_jul_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-07-01' AND '2014-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2014 = sqlsrv_num_rows($result_allegations_jul_2014);

$result_allegations_aug_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-08-01' AND '2014-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2014 = sqlsrv_num_rows($result_allegations_aug_2014);

$result_allegations_sep_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-09-01' AND '2014-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2014 = sqlsrv_num_rows($result_allegations_sep_2014);

$result_allegations_oct_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-10-01' AND '2014-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2014 = sqlsrv_num_rows($result_allegations_oct_2014);

$result_allegations_nov_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-11-01' AND '2014-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2014 = sqlsrv_num_rows($result_allegations_nov_2014);

$result_allegations_dec_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2014-12-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2014 = sqlsrv_num_rows($result_allegations_dec_2014);


// CASES OPENED


$result_cases_jan_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-01-01' AND '2014-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jan_2014 = sqlsrv_num_rows($result_cases_jan_2014);	

$result_cases_feb_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-02-01' AND '2014-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_feb_2014 = sqlsrv_num_rows($result_cases_feb_2014);

$result_cases_mar_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-03-01' AND '2014-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_mar_2014 = sqlsrv_num_rows($result_cases_mar_2014);

$result_cases_apr_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-04-01' AND '2014-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_apr_2014 = sqlsrv_num_rows($result_cases_apr_2014);

$result_cases_may_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-05-01' AND '2014-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_may_2014 = sqlsrv_num_rows($result_cases_may_2014);

$result_cases_jun_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-06-01' AND '2014-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jun_2014 = sqlsrv_num_rows($result_cases_jun_2014);

$result_cases_jul_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-07-01' AND '2014-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jul_2014 = sqlsrv_num_rows($result_cases_jun_2014);

$result_cases_aug_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-08-01' AND '2014-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_aug_2014 = sqlsrv_num_rows($result_cases_aug_2014);

$result_cases_sep_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-09-01' AND '2014-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_sep_2014 = sqlsrv_num_rows($result_cases_sep_2014);

$result_cases_oct_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-10-01' AND '2014-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_oct_2014 = sqlsrv_num_rows($result_cases_oct_2014);

$result_cases_nov_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-11-01' AND '2014-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_nov_2014 = sqlsrv_num_rows($result_cases_nov_2014);

$result_cases_dec_2014 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2014-12-01' AND '2014-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_dec_2014 = sqlsrv_num_rows($result_cases_dec_2014);

//ALLEAGTIONS 2015

$result_allegations_jan_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-01-01' AND '2015-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2015 = sqlsrv_num_rows($result_allegations_jan_2015);	

$result_allegations_feb_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-02-01' AND '2015-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2015 = sqlsrv_num_rows($result_allegations_feb_2015);

$result_allegations_mar_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-03-01' AND '2015-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2015 = sqlsrv_num_rows($result_allegations_mar_2015);

$result_allegations_apr_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-04-01' AND '2015-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2015 = sqlsrv_num_rows($result_allegations_apr_2015);

$result_allegations_may_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-05-01' AND '2015-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2015 = sqlsrv_num_rows($result_allegations_may_2015);

$result_allegations_jun_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-06-01' AND '2015-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2015 = sqlsrv_num_rows($result_allegations_jun_2015);

$result_allegations_jul_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-07-01' AND '2015-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2015 = sqlsrv_num_rows($result_allegations_jul_2015);

$result_allegations_aug_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-08-01' AND '2015-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2015 = sqlsrv_num_rows($result_allegations_aug_2015);

$result_allegations_sep_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-09-01' AND '2015-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2015 = sqlsrv_num_rows($result_allegations_sep_2015);

$result_allegations_oct_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-10-01' AND '2015-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2015 = sqlsrv_num_rows($result_allegations_oct_2015);

$result_allegations_nov_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-11-01' AND '2015-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2015 = sqlsrv_num_rows($result_allegations_nov_2015);

$result_allegations_dec_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE date_received BETWEEN '2015-12-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2015 = sqlsrv_num_rows($result_allegations_dec_2015);


// CASES OPENED


$result_cases_jan_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-01-01' AND '2015-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jan_2015 = sqlsrv_num_rows($result_cases_jan_2015);	

$result_cases_feb_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-02-01' AND '2015-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_feb_2015 = sqlsrv_num_rows($result_cases_feb_2015);

$result_cases_mar_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-03-01' AND '2015-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_mar_2015 = sqlsrv_num_rows($result_cases_mar_2015);

$result_cases_apr_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-04-01' AND '2015-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_apr_2015 = sqlsrv_num_rows($result_cases_apr_2015);

$result_cases_may_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-05-01' AND '2015-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_may_2015 = sqlsrv_num_rows($result_cases_may_2015);

$result_cases_jun_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-06-01' AND '2015-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jun_2015 = sqlsrv_num_rows($result_cases_jun_2015);

$result_cases_jul_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-07-01' AND '2015-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jul_2015 = sqlsrv_num_rows($result_cases_jun_2015);

$result_cases_aug_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-08-01' AND '2015-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_aug_2015 = sqlsrv_num_rows($result_cases_aug_2015);

$result_cases_sep_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-09-01' AND '2015-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_sep_2015 = sqlsrv_num_rows($result_cases_sep_2015);

$result_cases_oct_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-10-01' AND '2015-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_oct_2015 = sqlsrv_num_rows($result_cases_oct_2015);

$result_cases_nov_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-11-01' AND '2015-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_nov_2015 = sqlsrv_num_rows($result_cases_nov_2015);

$result_cases_dec_2015 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2015-12-01' AND '2015-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_dec_2015 = sqlsrv_num_rows($result_cases_dec_2015);



//ALLEAGTIONS REACTIVE 2016

$result_allegations_jan_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2016 = sqlsrv_num_rows($result_allegations_jan_2016);	

$result_allegations_feb_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2016 = sqlsrv_num_rows($result_allegations_feb_2016);

$result_allegations_mar_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2016 = sqlsrv_num_rows($result_allegations_mar_2016);

$result_allegations_apr_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2016 = sqlsrv_num_rows($result_allegations_apr_2016);

$result_allegations_may_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2016 = sqlsrv_num_rows($result_allegations_may_2016);

$result_allegations_jun_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2016 = sqlsrv_num_rows($result_allegations_jun_2016);

$result_allegations_jul_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2016 = sqlsrv_num_rows($result_allegations_jul_2016);

$result_allegations_aug_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2016 = sqlsrv_num_rows($result_allegations_aug_2016);

$result_allegations_sep_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2016 = sqlsrv_num_rows($result_allegations_sep_2016);

$result_allegations_oct_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2016 = sqlsrv_num_rows($result_allegations_oct_2016);

$result_allegations_nov_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2016 = sqlsrv_num_rows($result_allegations_nov_2016);

$result_allegations_dec_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2016 = sqlsrv_num_rows($result_allegations_dec_2016);


//PROACTIVE 2016

$result_allegations_jan_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2016p = sqlsrv_num_rows($result_allegations_jan_2016);	

$result_allegations_feb_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2016p = sqlsrv_num_rows($result_allegations_feb_2016);

$result_allegations_mar_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2016p = sqlsrv_num_rows($result_allegations_mar_2016);

$result_allegations_apr_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2016p = sqlsrv_num_rows($result_allegations_apr_2016);

$result_allegations_may_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2016p = sqlsrv_num_rows($result_allegations_may_2016);

$result_allegations_jun_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2016p = sqlsrv_num_rows($result_allegations_jun_2016);

$result_allegations_jul_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2016p = sqlsrv_num_rows($result_allegations_jul_2016);

$result_allegations_aug_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2016p = sqlsrv_num_rows($result_allegations_aug_2016);

$result_allegations_sep_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2016p = sqlsrv_num_rows($result_allegations_sep_2016);

$result_allegations_oct_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2016p = sqlsrv_num_rows($result_allegations_oct_2016);

$result_allegations_nov_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2016p = sqlsrv_num_rows($result_allegations_nov_2016);

$result_allegations_dec_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2016p = sqlsrv_num_rows($result_allegations_dec_2016);


// CASES OPENED


$result_cases_jan_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jan_2016 = sqlsrv_num_rows($result_cases_jan_2016);	

$result_cases_feb_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_feb_2016 = sqlsrv_num_rows($result_cases_feb_2016);

$result_cases_mar_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_mar_2016 = sqlsrv_num_rows($result_cases_mar_2016);

$result_cases_apr_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_apr_2016 = sqlsrv_num_rows($result_cases_apr_2016);

$result_cases_may_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_may_2016 = sqlsrv_num_rows($result_cases_may_2016);

$result_cases_jun_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jun_2016 = sqlsrv_num_rows($result_cases_jun_2016);

$result_cases_jul_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jul_2016 = sqlsrv_num_rows($result_cases_jun_2016);

$result_cases_aug_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_aug_2016 = sqlsrv_num_rows($result_cases_aug_2016);

$result_cases_sep_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_sep_2016 = sqlsrv_num_rows($result_cases_sep_2016);

$result_cases_oct_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_oct_2016 = sqlsrv_num_rows($result_cases_oct_2016);

$result_cases_nov_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_nov_2016 = sqlsrv_num_rows($result_cases_nov_2016);

$result_cases_dec_2016 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_dec_2016 = sqlsrv_num_rows($result_cases_dec_2016);


//ALLEAGTIONS REACTIVE 2017

$result_allegations_jan_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-01-01' AND '2017-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2017 = sqlsrv_num_rows($result_allegations_jan_2017);	

$result_allegations_feb_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-02-01' AND '2017-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2017 = sqlsrv_num_rows($result_allegations_feb_2017);

$result_allegations_mar_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-03-01' AND '2017-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2017 = sqlsrv_num_rows($result_allegations_mar_2017);

$result_allegations_apr_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-04-01' AND '2017-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2017 = sqlsrv_num_rows($result_allegations_apr_2017);

$result_allegations_may_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-05-01' AND '2017-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2017 = sqlsrv_num_rows($result_allegations_may_2017);

$result_allegations_jun_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-06-01' AND '2017-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2017 = sqlsrv_num_rows($result_allegations_jun_2017);

$result_allegations_jul_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-07-01' AND '2017-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2017 = sqlsrv_num_rows($result_allegations_jul_2017);

$result_allegations_aug_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-08-01' AND '2017-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2017 = sqlsrv_num_rows($result_allegations_aug_2017);

$result_allegations_sep_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-09-01' AND '2017-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2017 = sqlsrv_num_rows($result_allegations_sep_2017);

$result_allegations_oct_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-10-01' AND '2017-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2017 = sqlsrv_num_rows($result_allegations_oct_2017);

$result_allegations_nov_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-11-01' AND '2017-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2017 = sqlsrv_num_rows($result_allegations_nov_2017);

$result_allegations_dec_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = '' AND date_received BETWEEN '2017-12-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2017 = sqlsrv_num_rows($result_allegations_dec_2017);


//PROACTIVE 2017

$result_allegations_jan_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-01-01' AND '2017-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jan_2017p = sqlsrv_num_rows($result_allegations_jan_2017);	

$result_allegations_feb_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-02-01' AND '2017-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_feb_2017p = sqlsrv_num_rows($result_allegations_feb_2017);

$result_allegations_mar_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-03-01' AND '2017-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_mar_2017p = sqlsrv_num_rows($result_allegations_mar_2017);

$result_allegations_apr_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-04-01' AND '2017-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_apr_2017p = sqlsrv_num_rows($result_allegations_apr_2017);

$result_allegations_may_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-05-01' AND '2017-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_may_2017p = sqlsrv_num_rows($result_allegations_may_2017);

$result_allegations_jun_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-06-01' AND '2017-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jun_2017p = sqlsrv_num_rows($result_allegations_jun_2017);

$result_allegations_jul_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-07-01' AND '2017-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_jul_2017p = sqlsrv_num_rows($result_allegations_jul_2017);

$result_allegations_aug_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-08-01' AND '2017-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_aug_2017p = sqlsrv_num_rows($result_allegations_aug_2017);

$result_allegations_sep_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-09-01' AND '2017-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_sep_2017p = sqlsrv_num_rows($result_allegations_sep_2017);

$result_allegations_oct_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-10-01' AND '2017-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_oct_2017p = sqlsrv_num_rows($result_allegations_oct_2017);

$result_allegations_nov_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-11-01' AND '2017-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_nov_2017p = sqlsrv_num_rows($result_allegations_nov_2017);

$result_allegations_dec_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2017-12-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_allegations_dec_2017p = sqlsrv_num_rows($result_allegations_dec_2017);


// CASES OPENED


$result_cases_jan_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-01-01' AND '2017-01-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jan_2017 = sqlsrv_num_rows($result_cases_jan_2017);	

$result_cases_feb_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-02-01' AND '2017-02-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_feb_2017 = sqlsrv_num_rows($result_cases_feb_2017);

$result_cases_mar_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-03-01' AND '2017-03-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_mar_2017 = sqlsrv_num_rows($result_cases_mar_2017);

$result_cases_apr_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-04-01' AND '2017-04-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_apr_2017 = sqlsrv_num_rows($result_cases_apr_2017);

$result_cases_may_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-05-01' AND '2017-05-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_may_2017 = sqlsrv_num_rows($result_cases_may_2017);

$result_cases_jun_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-06-01' AND '2017-06-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jun_2017 = sqlsrv_num_rows($result_cases_jun_2017);

$result_cases_jul_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-07-01' AND '2017-07-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_jul_2017 = sqlsrv_num_rows($result_cases_jun_2017);

$result_cases_aug_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-08-01' AND '2017-08-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_aug_2017 = sqlsrv_num_rows($result_cases_aug_2017);

$result_cases_sep_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-09-01' AND '2017-09-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_sep_2017 = sqlsrv_num_rows($result_cases_sep_2017);

$result_cases_oct_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-10-01' AND '2017-10-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_oct_2017 = sqlsrv_num_rows($result_cases_oct_2017);

$result_cases_nov_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-11-01' AND '2017-11-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_nov_2017 = sqlsrv_num_rows($result_cases_nov_2017);

$result_cases_dec_2017 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE resolution = 'Open case in CMS' AND date_received BETWEEN '2017-12-01' AND '2017-12-31'", array(), array( "Scrollable" => 'buffered'));		
$num_cases_dec_2017 = sqlsrv_num_rows($result_cases_dec_2017);

?>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable([
    ['Month', '2013', '2014', '2015', '2016', '2017'],
    ['Jan',  <?php echo $num_allegations_jan_2013 ?>,      <?php echo $num_allegations_jan_2014 ?>,        <?php echo $num_allegations_jan_2015 ?>,        <?php echo $num_allegations_jan_2016 ?>, <?php echo $num_allegations_jan_2017 ?>],
    ['Feb',  <?php echo $num_allegations_feb_2013 ?>,      <?php echo $num_allegations_feb_2014 ?>,        <?php echo $num_allegations_jan_2015 ?>,        <?php echo $num_allegations_feb_2016 ?>, <?php echo $num_allegations_feb_2017 ?>],
    ['Mar',  <?php echo $num_allegations_mar_2013 ?>,      <?php echo $num_allegations_mar_2014 ?>,        <?php echo $num_allegations_mar_2015 ?>,        <?php echo $num_allegations_mar_2016 ?>, <?php echo $num_allegations_mar_2017 ?>],
    ['Apr',  <?php echo $num_allegations_apr_2013 ?>,      <?php echo $num_allegations_apr_2014 ?>,        <?php echo $num_allegations_apr_2015 ?>,        <?php echo $num_allegations_apr_2016 ?>, <?php echo $num_allegations_apr_2017 ?>],
	['May',  <?php echo $num_allegations_may_2013 ?>,      <?php echo $num_allegations_may_2014 ?>,        <?php echo $num_allegations_may_2015 ?>,        <?php echo $num_allegations_may_2016 ?>, <?php echo $num_allegations_may_2017 ?>],
	['Jun',  <?php echo $num_allegations_jun_2013 ?>,      <?php echo $num_allegations_jun_2014 ?>,        <?php echo $num_allegations_jun_2015 ?>,        <?php echo $num_allegations_jun_2016 ?>, <?php echo $num_allegations_jun_2017 ?>],
	['Jul',  <?php echo $num_allegations_jul_2013 ?>,      <?php echo $num_allegations_jul_2014 ?>,        <?php echo $num_allegations_jul_2015 ?>,        <?php echo $num_allegations_jul_2016 ?>, <?php echo $num_allegations_jul_2017 ?>],
	['Aug',  <?php echo $num_allegations_aug_2013 ?>,      <?php echo $num_allegations_aug_2014 ?>,        <?php echo $num_allegations_aug_2015 ?>,        <?php echo $num_allegations_aug_2016 ?>, <?php echo $num_allegations_aug_2017 ?>],
	['Sep',  <?php echo $num_allegations_sep_2013 ?>,      <?php echo $num_allegations_sep_2014 ?>,        <?php echo $num_allegations_sep_2015 ?>,        <?php echo $num_allegations_sep_2016 ?>, <?php echo $num_allegations_sep_2017 ?>],
	['Oct',  <?php echo $num_allegations_oct_2013 ?>,      <?php echo $num_allegations_oct_2014 ?>,        <?php echo $num_allegations_oct_2015 ?>,        <?php echo $num_allegations_oct_2016 ?>, <?php echo $num_allegations_oct_2017 ?>],
	['Nov',  <?php echo $num_allegations_nov_2013 ?>,      <?php echo $num_allegations_nov_2014 ?>,        <?php echo $num_allegations_nov_2015 ?>,        <?php echo $num_allegations_nov_2016 ?>, <?php echo $num_allegations_nov_2017 ?>],
    ['Dec',  <?php echo $num_allegations_dec_2013 ?>,      <?php echo $num_allegations_dec_2014 ?>,         <?php echo $num_allegations_dec_2015 ?>,         <?php echo $num_allegations_dec_2016 ?>, <?php echo $num_allegations_dec_2017 ?>]
  ]);

  var options = {
    seriesType: "bars",
	width: 1400,
	height: 600,
	bar: { groupWidth: '75%' },
    series: {12: {type: "in"}}
  };

  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>

  


</head>

<body>
    <p>



<table width="1250" align="center">
<tr>
  <td colspan="4" align="right"><font color="#000000" size="-1"> Allegations received by month </font> <font color="#990000" size="-1">(Not included Proactive Assessements)</font></td>
</tr>
<tr>
<td colspan="4" align="center">
<div id="chart_div" style="width: 1400px; height: 600px;"></div>
</td>
</tr>

<tr>
<td valign="top">

<table width="260" class="gridtable007">
<tr><th>Year 2013</th></tr>
<tr><td><strong>January</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jan_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jan_2013; ?></td></tr>

<tr><td><strong>February</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_feb_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_feb_2013; ?></td></tr>

<tr><td><strong>March</strong></td></tr>
<tr><td>&nbsp;&nbsp;Complaints received - <?php echo $num_allegations_mar_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_mar_2013; ?></td></tr>

<tr><td><strong>April</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_apr_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_apr_2013; ?></td></tr>

<tr><td><strong>May</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_may_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_may_2013; ?></td></tr>

<tr><td><strong>June</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jun_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jun_2013; ?></td></tr>

<tr><td><strong>July</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jul_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jul_2013; ?></td></tr>

<tr><td><strong>August</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_aug_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_aug_2013; ?></td></tr>

<tr><td><strong>September</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_sep_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_sep_2013; ?></td></tr>

<tr><td><strong>October</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_oct_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_oct_2013; ?></td></tr>

<tr><td><strong>November</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_nov_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_nov_2013; ?></td></tr>

<tr><td><strong>December</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_dec_2013; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_dec_2013; ?></td></tr>
</table>

</td>
<td valign="top">
<table width="260" class="gridtable007">
<tr><th>Year 2014</th></tr>
<tr><td><strong>January</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jan_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jan_2014; ?></td></tr>

<tr><td><strong>February</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_feb_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_feb_2014; ?></td></tr>

<tr><td><strong>March</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_mar_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_mar_2014; ?></td></tr>

<tr><td><strong>April</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_apr_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_apr_2014; ?></td></tr>

<tr><td><strong>May</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_may_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_may_2014; ?></td></tr>

<tr><td><strong>June</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jun_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jun_2014; ?></td></tr>

<tr><td><strong>July</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jul_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jul_2014; ?></td></tr>

<tr><td><strong>August</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_aug_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_aug_2014; ?></td></tr>

<tr><td><strong>September</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_sep_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_sep_2014; ?></td></tr>

<tr><td><strong>October</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_oct_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_oct_2014; ?></td></tr>

<tr><td><strong>November</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_nov_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_nov_2014; ?></td></tr>

<tr><td><strong>December</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_dec_2014; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_dec_2014; ?></td></tr>
</table>

</td>
<td valign="top">
<table width="260" class="gridtable007">
<tr><th>Year 2015</th></tr>
<tr><td><strong>January</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jan_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jan_2015; ?></td></tr>

<tr><td><strong>February</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_feb_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_feb_2015; ?></td></tr>

<tr><td><strong>March</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_mar_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_mar_2015; ?></td></tr>

<tr><td><strong>April</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_apr_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_apr_2015; ?></td></tr>

<tr><td><strong>May</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_may_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_may_2015; ?></td></tr>

<tr><td><strong>June</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jun_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jun_2015; ?></td></tr>

<tr><td><strong>July</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jul_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jul_2015; ?></td></tr>

<tr><td><strong>August</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_aug_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_aug_2015; ?></td></tr>

<tr><td><strong>September</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_sep_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_sep_2015; ?></td></tr>

<tr><td><strong>October</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_oct_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_oct_2015; ?></td></tr>

<tr><td><strong>November</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_nov_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_nov_2015; ?></td></tr>

<tr><td><strong>December</strong></td></tr>
<tr><td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_dec_2015; ?></td></tr>
<tr><td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_dec_2015; ?></td></tr>
</table>

</td>
<td><table width="260" class="gridtable007">
  <tr>
    <th>Year 2016</th>
  </tr>
  <tr>
    <td><strong>January</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jan_2016; ?></td>
  </tr>
   <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_jan_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jan_2016; ?></td>
  </tr>
  <tr>
    <td><strong>February</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_feb_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_feb_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_feb_2016; ?></td>
  </tr>
  <tr>
    <td><strong>March</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_mar_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_mar_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_mar_2016; ?></td>
  </tr>
  <tr>
    <td><strong>April</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_apr_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_apr_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_apr_2016; ?></td>
  </tr>
  <tr>
    <td><strong>May</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_may_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_may_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_may_2016; ?></td>
  </tr>
  <tr>
    <td><strong>June</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jun_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_jun_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jun_2016; ?></td>
  </tr>
  <tr>
    <td><strong>July</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jul_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_jul_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jul_2016; ?></td>
  </tr>
  <tr>
    <td><strong>August</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_aug_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_aug_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_aug_2016; ?></td>
  </tr>
  <tr>
    <td><strong>September</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_sep_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_sep_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_sep_2016; ?></td>
  </tr>
  <tr>
    <td><strong>October</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_oct_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_oct_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_oct_2016; ?></td>
  </tr>
  <tr>
    <td><strong>November</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_nov_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_nov_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_nov_2016; ?></td>
  </tr>
  <tr>
    <td><strong>December</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_dec_2016; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_dec_2016p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_dec_2016; ?></td>
  </tr>
</table></td>
<td>

<table width="260" class="gridtable007">
  <tr>
    <th>Year 2017</th>
  </tr>
  <tr>
    <td><strong>January</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jan_2017; ?></td>
  </tr>
   <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_jan_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jan_2017; ?></td>
  </tr>
  <tr>
    <td><strong>February</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_feb_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_feb_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_feb_2017; ?></td>
  </tr>
  <tr>
    <td><strong>March</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_mar_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_mar_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_mar_2017; ?></td>
  </tr>
  <tr>
    <td><strong>April</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_apr_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_apr_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_apr_2017; ?></td>
  </tr>
  <tr>
    <td><strong>May</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_may_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_may_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_may_2017; ?></td>
  </tr>
  <tr>
    <td><strong>June</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jun_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_jun_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jun_2017; ?></td>
  </tr>
  <tr>
    <td><strong>July</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_jul_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_jul_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_jul_2017; ?></td>
  </tr>
  <tr>
    <td><strong>August</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_aug_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_aug_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_aug_2017; ?></td>
  </tr>
  <tr>
    <td><strong>September</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_sep_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_sep_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_sep_2017; ?></td>
  </tr>
  <tr>
    <td><strong>October</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_oct_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_oct_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_oct_2017; ?></td>
  </tr>
  <tr>
    <td><strong>November</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_nov_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_nov_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_nov_2017; ?></td>
  </tr>
  <tr>
    <td><strong>December</strong></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Allegations received - <?php echo $num_allegations_dec_2017; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Proactive Assessments - <?php echo $num_allegations_dec_2017p; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Cases Opened - <?php echo $num_cases_dec_2017; ?></td>
  </tr>
</table
</td>


</tr>
</table>

    </p>
</body>
</html>