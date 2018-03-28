<?php


require_once("includes\\opendb.php");

// JAN 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_jan = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_jan = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_jan = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_jan = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_jan = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_jan = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_jan = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_jan = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_jan = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_jan = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_jan = sqlsrv_num_rows($result);





// FEB 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_feb = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_feb = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_feb = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_feb = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_feb = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_feb = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_feb = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_feb = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_feb = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_feb = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_feb = sqlsrv_num_rows($result);



// MAR 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_mar = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_mar = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_mar = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_mar = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_mar = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_mar = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_mar = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_mar = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_mar = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_mar = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_mar = sqlsrv_num_rows($result);


// APR 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_apr = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_apr = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_apr = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_apr = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_apr = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_apr = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_apr = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_apr = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_apr = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_apr = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_apr = sqlsrv_num_rows($result);



// MAY 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_may = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_may = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_may = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_may = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_may = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_may = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_may = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_may = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_may = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_may = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_may = sqlsrv_num_rows($result);



// JUN 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_jun = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_jun = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_jun = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_jun = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_jun = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_jun = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_jun = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_jun = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_jun = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_jun = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_jun = sqlsrv_num_rows($result);



// JUL 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_jul = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_jul = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_jul = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_jul = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_jul = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_jul = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_jul = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_jul = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_jul = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_jul = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_jul = sqlsrv_num_rows($result);

// AUG 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_aug = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_aug = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_aug = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_aug = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_aug = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_aug = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_aug = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_aug = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_aug = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_aug = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_aug = sqlsrv_num_rows($result);


// SEP 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_sep = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_sep = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_sep = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_sep = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_sep = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_sep = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_sep = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_sep = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_sep = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_sep = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_sep = sqlsrv_num_rows($result);

// OCT 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_oct = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_oct = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_oct = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_oct = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_oct = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_oct = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_oct = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_oct = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_oct = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_oct = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_oct = sqlsrv_num_rows($result);


// NOV 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_nov = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_nov = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_nov = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_nov = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_nov = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_nov = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_nov = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_nov = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_nov = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_nov = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_nov = sqlsrv_num_rows($result);


// DEC 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_dec = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_dec = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_dec = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_dec = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_dec = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_dec = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_dec = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_dec = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_dec = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_dec = sqlsrv_num_rows($result);
 
 
 $result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.creation_date BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_dec = sqlsrv_num_rows($result);
 ?>   