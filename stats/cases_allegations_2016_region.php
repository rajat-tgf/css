<?php


require_once("includes\\opendb.php");

// JAN 2016
$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_jana = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_jana = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_jana = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_jana = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_jana = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_jana = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_jana = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_jana = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_jana = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_jana = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_jana = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-01-01' AND '2016-01-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_jana = sqlsrv_num_rows($result1);


// FEB 2016
$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_feba = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_feba = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_feba = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_feba = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_feba = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_feba = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_feba = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_feba = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_feba = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_feba = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-02-01' AND '2016-02-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_feba = sqlsrv_num_rows($result1);



// MAR 2016
$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_mara = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_mara = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_mara = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_mara = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_mara = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_mara = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_mara = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_mara = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_mara = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_mara = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_mara = sqlsrv_num_rows($result1);


// APRIL 20016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_apra = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_apra = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_apra = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-03-01' AND '2016-03-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_apra = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_apra = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_apra = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_apra = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_apra = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_apra = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_apra = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-04-01' AND '2016-04-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_apra = sqlsrv_num_rows($result1);

// MAY 20016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_maya = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_maya = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_maya = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_maya = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_maya = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_maya = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_maya = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_maya = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_maya = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_maya = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_maya = sqlsrv_num_rows($result1);


// JUN 20016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_juna = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_juna = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_juna = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_juna = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-05-01' AND '2016-05-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_juna = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_juna = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_juna = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_juna = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_juna = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_juna = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-06-01' AND '2016-06-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_juna = sqlsrv_num_rows($result1);


// JUL 20016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_jula = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_jula = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_jula = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_jula = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_jula = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_jula = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_jula = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_jula = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_jula = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_jula = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-07-01' AND '2016-07-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_jula = sqlsrv_num_rows($result1);


// AUG 20016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_auga = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_auga = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_auga = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_auga = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_auga = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_auga = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_auga = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_auga = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_auga = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_auga = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-08-01' AND '2016-08-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_auga = sqlsrv_num_rows($result1);


// SEP 20016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_sepa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_sepa = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_sepa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_sepa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_sepa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_sepa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_sepa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_sepa = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_sepa = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_sepa = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-09-01' AND '2016-09-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_sepa = sqlsrv_num_rows($result1);


// OCT 2016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_octa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_octa = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_octa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_octa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_octa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_octa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_octa = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_octa = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_octa = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_octa = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-10-01' AND '2016-10-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_octa = sqlsrv_num_rows($result1);



// NOV 2016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_nova = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_nova = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_nova = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_nova = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_nova = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_nova = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_nova = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_nova = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_nova = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_nova = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-11-01' AND '2016-11-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_nova = sqlsrv_num_rows($result1);


// DEC 2016

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sa ON allegation_details.country = region_sa.country WHERE allegation_details.country = region_sa.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sa_deca = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_ca ON allegation_details.country = region_ca.country WHERE allegation_details.country = region_ca.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_ca_deca = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_eeca ON allegation_details.country = region_eeca.country WHERE allegation_details.country = region_eeca.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_eeca_deca = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_lac ON allegation_details.country = region_lac.country WHERE allegation_details.country = region_lac.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_lac_deca = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_mena ON allegation_details.country = region_mena.country WHERE allegation_details.country = region_mena.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_mena_deca = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_sea ON allegation_details.country = region_sea.country WHERE allegation_details.country = region_sea.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_sea_deca = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN region_wa ON allegation_details.country = region_wa.country WHERE allegation_details.country = region_wa.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_wa_deca = sqlsrv_num_rows($result1);


$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa1 ON allegation_details.country = impact_africa1.country WHERE allegation_details.country = impact_africa1.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa1_deca = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_africa2 ON allegation_details.country = impact_africa2.country WHERE allegation_details.country = impact_africa2.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_africa2_deca = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details WHERE country = 'Internal' AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_region_internal_deca = sqlsrv_num_rows($result1);

$result1 = sqlsrv_query($conncss, "SELECT id FROM allegation_details LEFT JOIN impact_asia ON allegation_details.country = impact_asia.country WHERE allegation_details.country = impact_asia.country AND date_received BETWEEN '2016-12-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
$num_impact_asia_deca = sqlsrv_num_rows($result1);

 ?>   