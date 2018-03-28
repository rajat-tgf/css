<?php

require_once("includes\security.php");
$Security->GoSecure();
error_reporting(0);
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

   
<script>
    $(function() {
    $( "#tabs" ).tabs();
	$( "input[type=submit], button" )
	.button()
	});
</script>      
</head>
<body>

<?php

if ($_REQUEST["country"]<>''){
	$country = " AND country = '".sqlsrv_real_escape_string($_REQUEST["country"])."'";	
}

if ($_REQUEST["reporter"]<>''){
	$reporter = " AND reporter = '".sqlsrv_real_escape_string($_REQUEST["reporter"])."'";	
}


$sql = "SELECT * FROM intelligence_reports WHERE id>0".$country.$reporter." ORDER BY id DESC";;
$sql_result = sqlsrv_query($conncss, $sql, array(), array( "Scrollable" => 'buffered'));
$all_rows = sqlsrv_fetchall($sql_result);
$num_hits = count($all_rows);


include ("menu_list.php");
?>
<br />



<form id="form1" name="form1" method="post" action="intelligence_reports.php">

<table width="100%" class="gridtablefilter">

<tr valign="middle">
  <td width="17%" height="48" align="right"><strong>Country</strong> <strong>:</strong></td>
  <td width="10%">
  <select name="country" id="country" class="text ui-widget-content ui-corner-all">
  <option value=""></option>
    <?php
	$sql = sqlsrv_query($conncss,"SELECT distinct country FROM intelligence_reports ORDER BY country");
	$all_countries = sqlsrv_fetchall($sql);      
	foreach ($all_countries as $row) {
		echo "<option>".$row["country"]."</option>";
	}
	?>
  </select></td>
  <td width="18%" align="right"><strong>Reporter</strong> <strong>:</strong></td>
  <td width="10%" align="left"><select name="reporter" id="reporter" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
    <?php
	$sql = sqlsrv_query($conncss,"SELECT distinct reporter FROM intelligence_reports ORDER BY reporter");
	$all_reporter = sqlsrv_fetchall($sql);      
	foreach ($all_reporter as $row) {
		echo "<option>".$row["reporter"]."</option>";
	}
	?>
  </select></td>
  
  <td width="36%" align="center">
  <button type = "submit" name = "Submit" value = "Filter">Filter</button>
    <button type = "submit" name = "Submit" value = "All" onclick="window.location.href='list_checks.php'">Show all</button>
  </td>
  <td width="9%" align="right">&nbsp;</td>
  
</tr>

</table>
</form>
<table width="100%" align="center" id="entities" class="gridtablefilter">
  <tr>
    <td width="98%" align="right"><strong>Number of Intelligence Reports found :</strong></td>
    <td width="2%"><font><strong><font color="#FF0000"><?php echo $num_hits ?></font></strong></font></td>
  </tr>
</table>
<p>
  <?php
if ( $num_hits == 0 ){
	echo "<font color='#666666'>";
	echo "No results found";
	echo "</font>";
	
}else{
	
?>
</p>
<div id="entities-contain" align="center">
  <table >
                <tr>
                  <th>Id</th>
                  <th>Country</th>
                  <th align="center">Reporter</th>
                  <th align="center"><strong>Title</strong></th>
                  <th><strong>Status</strong></th>
                  <th><strong>Date recieved</strong></th>
                  <th><strong>Screening member</strong></th>
                </tr>
                <?php
					if ($num_hits>0) {
					foreach($all_rows as $row) {
						$id_report = $row['id'];
				  	  ?>
						 <tr>
	                         <td>
                             <a onclick="return parent.showDialogir(<?php echo $id_report ?> )">
							<?php 
							$dash = "IR";
							echo $dash.$id_report; ?>
                            </a>
							</td>
                             <td>
							<?php echo $country = $row['country']; ?>
							</td>
	                         <td align="left"><?php 
							 
							 echo $reporter = $row['reporter']; 
							 
							 ?></td>
							<td align="center">
                            
                            <?php echo $title = $row['title']; ?>

							</td>
                            <td align="center">
                            <?php echo $status = $row['status']; ?>
							</td>
                           <td align="center">
                            <?php $date_received = $row['date_received']; 
							echo $date_received = date('F j, Y', strtotime($date_received));
							?>
							</td>
                            <td align="center">
                            <?php echo $member = $row['member']; ?>
							</td>
                            
            </tr>

						<?php }}?>
</table>  
</div> 
<?php } ?>

    </body>
</html>
