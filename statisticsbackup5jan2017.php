<?php

require_once("includes\\opendb.php");
session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");  // Redirecting To Home Page
}		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>CSS</title>
    
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
$(function() {
	$( "#tabs" ).tabs();
	$( "#tabssub" ).tabs();
	$( "#tabssub1" ).tabs();
	$( "#tabssub3" ).tabs();
	$( "#tabssub6" ).tabs();
	$( "#tabssub7" ).tabs();
});
</script>


</head>
<body>

<div id="tabs">
<ul>
<li><a href="#tabs-1">General</a></li>
<li><a href="#tabs-2">Category</a></li>
<li><a href="#tabs-4">Method of referral</a></li>
<li><a href="#tabs-5">Source</a></li>
<li><a href="#tabs-6">Month</a></li>
<li><a href="#tabs-7">Diseases</a></li>
<li><a href="#tabs-8">Work Plan 2016 progress</a></li>
</ul>


    <div id="tabs-1">
        <p>
        <?php include ("stats/allegations_per_year.php"); ?>
        </p>
    </div>
    
    <div id="tabs-2">

    <?php 
	$reportingyears = array("2016", "2015", "2014");
	foreach ($reportingyears as $year) {
		?>
		<p>
		<?php 
		include ("stats/allegations_per_category.php"); 
		?>
		</p>
        <table align="right" class="gridtable">
        <tr><td><font color="#DD002D">
        * This represents only allegations that have been closed
        </font>
        </td></tr>
        </table>
        <br /><br /><br /><br />
	<?php } ?>
     </div>
   
    <div id="tabs-4">
	<?php 	foreach ($reportingyears as $year) { ?>
    <p>
        <?php 
		if ($year == 2014)
		{
			include ("stats/allegations_per_lines.php");
		}
		else
		{
		include ("stats/allegations_per_lines_extended.php");
		}		?>
    </p>
        <br />
		<br />
    <?php } ?>
    </div>
    
    <div id="tabs-5">
	<?php 	foreach ($reportingyears as $year) { ?>
		<p>
        <?php include ("stats/allegations_per_source.php"); ?>
        </p>
	<?php } ?>
    </div>
    
    <div id="tabs-6">
    	<p>
        <?php include ("stats/allegations_per_month.php"); ?>
        </p>
    </div>
    
    <div id="tabs-7">
		  <?php 
	foreach ($reportingyears as $year) {
		?>
    	<p>
        <?php 
		include ("stats/allegations_per_desease.php");
		?>
        </p>
        <table align="right" class="gridtable">
        <tr><td><font color="#DD002D">
        * This represents only allegations that have been closed
        </font>
        </td></tr>
        </table>
        <br />
	<?php } ?>
    </div>
    <div id="tabs-8">
            <?php include ("stats/workload_2016.php"); ?>
        
    </div>
                      
 </div>             
                  
</body>
</html>
