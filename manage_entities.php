<?php
if ( isset ($_GET['ok'])) {
	echo "<script>alert('Entity has been deleted')</script>";
}
if ( isset ($_GET['ok1'])) {
	echo "<script>alert('Entity Profile has been deleted')</script>";
}
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");  // Redirecting To Home Page
}
error_reporting(0);

require_once("includes\\opendb.php");

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>CSS</title>

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />


      


<style>
	div#entities-contain { width: 98%; margin: 10px 0; }
	div#entities-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; alignment-adjust:central; font-size:14px }
	div#entities-contain table td { border: 1px solid #DBE5F1; padding: .3em 10px; text-align: left;font-size:14px; background:#D1DFEF }
	div#entities-contain table th { border: 1px solid #DBE5F1; padding: .3em 10px; text-align: center; background:#F2F2F2; font-style:normal; color:#666666;font-size:14px }
hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }
</style>

<style type="text/css">
table.gridtable {
font-family: Georgia, "Times New Roman", Times, serif;
font-size:14px;
color:#EFEFEF;

}
table.gridtable th {
font-size:14px;
border-width: 1px;
padding: 2px;
border-style: solid;
border-color: #000000;
background-color: #EDEDED;
border:2px;

}
table.gridtable td {
font-size:14px;
border-width: 1px;
color:#666666;
padding: 2px;
border-color: #EDEDED;
border-spacing:2px;
border:2px;

}
</style>



</head>
<body>

<table>
<tr><td><strong>Total Entities : </strong><?php
$result = sqlsrv_query($conncss,"SELECT * FROM list_name ORDER BY entity_id"); 
$all_rows = sqlsrv_fetchall($result);
echo $all_entities = count($all_rows);
?>
</td></tr></table>

<div id="entities-contain" class="ui-widget">

  <table>
                <tr>
                  <th>Entity ID</th>
                  <th align="center">Entity Type</th>
                  <th align="center">Entity Name</th>
                  <th>Acronym</th>
    			  <th>Nationality / Country based</th>
                  <th>&nbsp;</th>
                </tr>
<?php



foreach($all_rows as $row){
?>
<tr>
                			<td align="center">
                            
                            <?php echo $entity_id = $row['entity_id']; ?>

							</td>
                           <td>
                            <?php echo $type_entity = $row['type_entity']; ?>
						   </td>
                           <td>
                            <?php echo $name = $row['name']; ?>
						   </td>
                           <td>
                            <?php echo $accro = $row['accro']; ?>
						   </td>
                           <td>
                            <?php echo $head_country = $row['head_country']; ?>
						   </td>
                            <td>
                            <a href="delete_entity.php?entity_id=<?php echo $entity_id ?>">
                            <img src="images/delete_entity.png" width="15" height="15" align="absmiddle"/>
                            </a>
						   </td>
            </tr>
            <tr>
            <td colspan="6" style="background-color:#FFF">
            
            <table width="550">
            <?php
            
            
            $sql123 = "SELECT * FROM profiles WHERE list_name_id = '$entity_id'";
			$sql_result1 = sqlsrv_query($conncss, $sql123);
			while ($row123 = sqlsrv_fetch_array($sql_result1)){	
				$profile_id = $row123['id'];
				$list_name_id = $row123['list_name_id'];
				$whistleblower_protection = $row123["whistleblower_protection"];
				$informant_protection = $row123["informant_protection"];
				$witness_protection = $row123["witness_protection"];
				$category = $row123["category"];
				?>
            <tr style="background-color:#FFF">
              <td width="3%" align="right" valign="bottom" style="background-color:#FFF"><img src="images/profile-icon.png" alt="Profile" width="10" height="10" align="absbottom"/></td>
              <td width="29%" align="left" valign="top" style="background-color:#FFF"><font color="#A91014">&nbsp;<strong><?php echo $category; ?></strong></font>
              </td>
              <td align="right" valign="bottom" style="background-color:#FFF"><a href="delete_profile_entity.php?profile_id=<?php echo $profile_id ?>"><img src="images/delete_entity.png" width="15" height="15" align="absmiddle"/></a></td>
            </tr>
            <tr style="background-color:#FFF">
              <td align="right" valign="middle" style="background-color:#FFF">&nbsp;</td>
              <td colspan="2" align="left" valign="middle" style="background-color:#FFF">Type : <?php echo $row123["type"]; ?>
            </td>
            </tr>
            
            <?php }?>
            </table>
            
            </td>
            </tr>

						<?php }?>
</table>   

 
    </body>
</html>
