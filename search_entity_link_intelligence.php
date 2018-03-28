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


<link href="css/bootstrap.min.css" rel="stylesheet" />
<script>
	$(function() {
	$( "input[type=submit], button" )
	.button()
	});
</script> 


</head>
<body>



<form method="post" id="search_entity" name="search_entity" class="ui-widget">
    <table width="300" align="center">
    <tr><td width="304" align="right" valign="middle">
    <input type="text" placeholder="Search here?" name="input" class="ui-widget" size="50">
    </td>
    <td width="10" align="right" valign="middle">&nbsp;  </td>
    <td width="121" valign="top">
    <input type = "submit" name = "submit" value = "Search" class="ui-widget"/>
    </td></tr>
    </table><br />
<br />
</form>

<form action="link_entity_intel_report.php?report_id=<?php echo $report_id ?>" id="link_entity" name="link_entity" method="post">
<?php 
		if(isset($_POST['submit'])){

						$userquery = $_POST['input'];
						
						if (ctype_digit($userquery))
						{
							$result = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$userquery'");	

						}
						else
						{
							$result = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE name LIKE '%$userquery%' OR alternative_name LIKE '%$userquery%' OR accro LIKE '%$userquery%'");	
						}

							$all_rows = sqlsrv_fetchall($result);
							$hit_found = count($all_rows);
							?>
  <table class='gridtable' align='center'>
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
                                <th >Id</th>
                                <th>Name</th>
                                <th>Acronym</th>
                                <th>Nationality / Country based</th>
                                <th></th>
                                </tr>
                                <?php
                                foreach ($all_rows as $myrow){
                                $entity_id_to_link = $myrow['entity_id'];
                                $type_entity = $myrow['type_entity'];
                                $profile_id = $myrow['id'];
                                $type_entity = $myrow['type_entity'];
                                $alt_name = $myrow["alternative_name"];
                                ?>
                                <tr>
                                <td>
                                <?php echo $entity_id_to_link ?>
                                </td>
                                <td>
                                <?php
                                if ( $type_entity != "Person" ){
                                $icon = "entity-icon.png";
                                }else{
                                $icon = "user-silhouette-icon.png";
                                }
                                
                                ?>
                                <img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                                <?php echo $name = $myrow['name'];?>
                                <?php
                                if ( $alt_name != "" ){
                                echo "<font color='#999999'>";
                                echo "( ".$alt_name." )";
                                echo "</font>";
                                }
                                ?>
                                </td>
                                <td valign="middle"><?php echo $accro = $myrow['accro']; ?></td>
                                <td valign="middle"><?php echo $head_country = $myrow['head_country']; ?></td>
                                <td valign="middle"><input type="radio" id="entity_id_to_link" name="entity_id_to_link" value="<?php echo $entity_id_to_link; ?>" title="<?php echo $entity_id_to_link; ?>"/></td>
                                </tr>
                                <?php
                                }}
                                ?>
                            </table>
</div> 
</form> 

    



</body>
</html>