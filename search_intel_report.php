<?php

require_once("includes\\opendb.php");
session_start(); 
$report_id = $_SESSION['report_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<script>
	$(function() {
	$( "input[type=submit], button" )
	.button()
	});
</script> 

</head>
<body>



<form method="post" id="search_ir" name="search_ir" class="ui-widget">
    <table width="300" align="center" class="gridtablefilter">
    <tr><td width="304" align="right" valign="middle">
    <input type="text" placeholder="IR number?" name="input" class="ui-widget" size="20">
    </td>
    <td width="10" align="right" valign="middle">&nbsp;  </td>
    <td width="121" valign="top">
    <input type = "submit" name = "submit" value = "Search" class="ui-widget"/>
    </td></tr>
    </table>
<br />
</form>

<form action="link_intel_intel_report.php?report_id=<?php echo $report_id ?>" id="link_intel_report" name="link_intel_report" method="post">
<?php 
		if(isset($_POST['submit'])){

						$userquery = $_POST['input'];
						
						if (ctype_digit($userquery))
						{
							$result = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE id = '$userquery'");	

						}
						else
						{
							$result = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE reporter LIKE '%$userquery%'");	
						}

							$all_rows = sqlsrv_fetchall($result);
							$hit_found = count($all_rows);
							?>
						<table class='gridtable' align='right'>
							<tr><td>
                            <font color="#CC0000" style="font-size:13px">
							<strong><?php
								echo $hit_found . " matches found";
							?></strong>
                            </font>
							</td></tr>
							</table>
                            <br />
						<div id="entities-contain">
                            <table>
                                <tr>
                                <th>Id</th>
                                <th>Country</th>
                                <th>Reporter</th>
                                <th>Title</th>
                                <th></th>
                                </tr>
                                <?php
                                foreach ($all_rows as $myrow){
                                $report_id_to_link = $myrow['id'];
                                $country = $myrow['country'];
                                $reporter = $myrow['reporter'];
                                $title = $myrow['title'];
                                ?>
                                <tr>
                                <td>
                                <?php 
								$dash = "IR";
								echo $dash.$report_id_to_link;
								?>
                                </td>
                                <td>
								<?php echo $country ?>
                                </td>
                                <td valign="middle"><?php echo $reporter; ?></td>
                                <td valign="middle"><?php echo $title; ?></td>
                                <td valign="middle">
                                <input type="radio" id="report_id_to_link" name="report_id_to_link" value="<?php echo $report_id_to_link; ?>" title="<?php echo $report_id_to_link; ?>"/></td>
                                </tr>
                                <?php
                                }}
                                ?>
                            </table>
</div> 
</form> 

    



</body>
</html>