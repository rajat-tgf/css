<?php

$result_Benin2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Benin' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Benin2014 = sqlsrv_num_rows($result_Benin2014);

$result_BurkinaFaso2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Burkina Faso' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_BurkinaFaso2014 = sqlsrv_num_rows($result_BurkinaFaso2014);

$result_Burundi2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Burundi' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Burundi2014 = sqlsrv_num_rows($result_Burundi2014);

$result_CentralAfricanRepublic2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Central African Republic' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_CentralAfricanRepublic2014 = sqlsrv_num_rows($result_CentralAfricanRepublic2014);

$result_Congo2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Congo' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Congo2014 = sqlsrv_num_rows($result_Congo2014);

$result_IvoryCoast2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Ivory Coast' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_IvoryCoast2014 = sqlsrv_num_rows($result_IvoryCoast2014);

$result_EquatorialGuinea2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Equatorial Guinea' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_EquatorialGuinea2014 = sqlsrv_num_rows($result_EquatorialGuinea2014);

$result_Gabon2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Gabon' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Gabon2014 = sqlsrv_num_rows($result_Gabon2014);

$result_Ghana2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Ghana' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Ghana2014 = sqlsrv_num_rows($result_Ghana2014);

$result_Liberia2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Liberia' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Liberia2014 = sqlsrv_num_rows($result_Liberia2014);

$result_Nigeria2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Nigeria' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Nigeria2014 = sqlsrv_num_rows($result_Nigeria2014);

$result_SierraLeone2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Sierra Leone' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_SierraLeone2014 = sqlsrv_num_rows($result_SierraLeone2014);

$result_Togo2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Togo' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Togo2014 = sqlsrv_num_rows($result_Togo2014);

$result_SouthAfrica2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'South Africa' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_SouthAfrica2014 = sqlsrv_num_rows($result_SouthAfrica2014);

$result_Sudan2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Sudan' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Sudan2014 = sqlsrv_num_rows($result_Sudan2014);


?>