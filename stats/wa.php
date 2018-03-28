<?php

$result_Cameroon2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Cameroon' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Cameroon2014 = sqlsrv_num_rows($result_Cameroon2014);

$result_CapeVerde2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Cape Verde' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_CapeVerde2014 = sqlsrv_num_rows($result_CapeVerde2014);

$result_Chad2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Chad' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Chad2014 = sqlsrv_num_rows($result_Chad2014);

$result_Gambia2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Gambia' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Gambia2014 = sqlsrv_num_rows($result_Gambia2014);

$result_Guinea2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Guinea' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Guinea2014 = sqlsrv_num_rows($result_Guinea2014);

$result_GuineaBissau2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Guinea-Bissau' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_GuineaBissau2014 = sqlsrv_num_rows($result_GuineaBissau2014);

$result_Mali2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Mali' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Mali2014 = sqlsrv_num_rows($result_Mali2014);

$result_Niger2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Niger' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Niger2014 = sqlsrv_num_rows($result_Niger2014);

$result_Sao2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Sao Tome and Principe' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Sao2014 = sqlsrv_num_rows($result_Sao2014);

$result_Senegal2014 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE country = 'Senegal' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'");	
$num_Senegal2014 = sqlsrv_num_rows($result_Senegal2014);


?>