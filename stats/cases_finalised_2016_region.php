<?php


require_once("includes\\opendb.php");

// JAN 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_janc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_janc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_janc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_janc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_janc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_janc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_janc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_janc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_janc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_janc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_janc = sqlsrv_num_rows($result);




// FEB 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_febc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_febc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_febc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_febc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_febc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_febc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_febc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_febc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_febc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_febc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_febc = sqlsrv_num_rows($result);




// MAR 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_marc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_marc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_marc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_marc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_marc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_marc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_marc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_marc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_marc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_marc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_marc = sqlsrv_num_rows($result);


// APR 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_aprc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_aprc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_aprc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_aprc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_aprc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_aprc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_aprc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_aprc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_aprc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_aprc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_aprc = sqlsrv_num_rows($result);



// MAY 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_mayc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_mayc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_mayc= sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_mayc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_mayc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_mayc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_mayc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_mayc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_mayc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_mayc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_mayc = sqlsrv_num_rows($result);



// JUN 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_junc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_junc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_junc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_junc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_junc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_junc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_junc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_junc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_junc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_junc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_junc = sqlsrv_num_rows($result);




// JUL 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_julc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_julc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_julc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_julc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_julc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_julc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_julc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_julc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_julc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_julc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_julc = sqlsrv_num_rows($result);


// AUG 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_augc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_augc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_augc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_augc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_augc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_augc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_augc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_augc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_augc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_augc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_augc = sqlsrv_num_rows($result);


// SEP 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_sepc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_sepc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_sepc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_sepc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_sepc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_sepc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_sepc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_sepc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_sepc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_sepc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_sepc = sqlsrv_num_rows($result);



// OCT 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_octc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_octc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_octc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_octc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_octc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_octc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_octc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_octc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_octc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_octc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_octc = sqlsrv_num_rows($result);





// NOV 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_novc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_novc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_novc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_novc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_novc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_novc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_novc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_novc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_novc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_novc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_novc = sqlsrv_num_rows($result);




// DEC 2016
$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sa ON cases.country = region_sa.country WHERE cases.country = region_sa.country  AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_decc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_ca ON cases.country = region_ca.country WHERE cases.country = region_ca.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_decc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_eeca ON cases.country = region_eeca.country WHERE cases.country = region_eeca.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_decc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_lac ON cases.country = region_lac.country WHERE cases.country = region_lac.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_decc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_mena ON cases.country = region_mena.country WHERE cases.country = region_mena.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_decc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_sea ON cases.country = region_sea.country WHERE cases.country = region_sea.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_decc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN region_wa ON cases.country = region_wa.country WHERE cases.country = region_wa.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_decc = sqlsrv_num_rows($result);


$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa1 ON cases.country = impact_africa1.country WHERE cases.country = impact_africa1.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_decc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_africa2 ON cases.country = impact_africa2.country WHERE cases.country = impact_africa2.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_decc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases WHERE country = 'Internal' AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_decc = sqlsrv_num_rows($result);

$result = sqlsrv_query($conn, "SELECT id FROM cases LEFT JOIN impact_asia ON cases.country = impact_asia.country WHERE cases.country = impact_asia.country AND cases.date_finalised BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_decc = sqlsrv_num_rows($result);
 
 ?>   