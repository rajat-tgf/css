<?php

require_once("includes\security.php");
$Security->GoSecure();
$username = $_SESSION['username'];
$entity_id = $_SESSION['entity_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
 <script>
$(function() {
$( "#tabs" ).tabs();
});
</script>

<style type="text/css">
table.gridtable1 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:13px;
	color:#FFFFFF;
	border-color: #EDEDED;
	border-collapse: collapse;
	background-color: #FFFFFF;
}
table.gridtable1 th {
	font-size:13px;
	border-width: 1px;
	padding: 2px;
	border-style: solid;
	border-color: #000000;
	background-color: #959595;
	color: #FFFFFF;
}
table.gridtable1 td {
	border-width: 0px;
	color:#666666;
	padding: 3px;
	cellpadding="1";
	border-style: solid;
	border-color: #EDEDED;
	background-color: #FFFFFF;
}
hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }
</style>

<SCRIPT LANGUAGE="JavaScript">

function add_new_profile(entity_id) 
{
		var windowW=855
		var windowH=730
		var windowX = 100
		var windowY = 130
		var url = "add_entity_profile.php?entity_id=" + entity_id;

		s = "scrollbars=yes"+",width="+windowW+",height="+windowH;

		blwindow = window.open(url,"Popup2",","+s);
		windowX = (screen.width) ? (screen.width-windowW)/2 : 0;
		windowY = (screen.height) ? (screen.height-windowH)/2 : 0;
		blwindow.focus();
		blwindow.resizeTo(windowW,windowH);
		blwindow.moveTo(windowX,windowY);
}
</script>
</head>

<body>


<div id="tabs">
<ul>
<li><a href="#tabs-1">Logs</a></li>
</ul>
<div id="tabs-1">






<table class="gridtable" align="right" width="98%">
<tr>
<td align="right">
<a onclick="return parent.showDialognewenprofile()">
<img src="images/addition-icon.png" alt="Add profile" width="30" height="30" align="top" title="Add Log"/>
</a>
</td>
</tr>
</table>


<?php
$result_related_allegations_complainant = sqlsrv_query($conncss,"select * from profiles WHERE list_name_id = '$entity_id'"); 
$all_rows = sqlsrv_fetchall($result_related_allegations_complainant);
$num_allegations_complainant = count($all_rows);
if ($num_allegations_complainant != 0){	
?>
<table width="98%" class="gridtable">
<?php		
	foreach ($all_rows as $row_result_related_allegations_complainant){
		$profile_id = $row_result_related_allegations_complainant['id'];
		$entity_id = $row_result_related_allegations_complainant['list_name_id'];
		$category = $row_result_related_allegations_complainant['category'];
		
		$position = $row_result_related_allegations_complainant['position'];
		$type = $row_result_related_allegations_complainant['type'];
		?>
        <tr>
        <td width="2%">
        
		<img src="images/profile-icon.png" width="15" height="15" align="top"/>
        </td>
        <td width="98%">

        <strong>Category :</strong><font color="#990000">&nbsp;<a href="details_entity_profile.php?profile_id=<?php echo $profile_id ?>" target="iframedetails"><?php echo $category;?></a></font>
        <br />
        <strong>Type :</strong> <?php echo $type; ?>
        <br />
        <?php
			$result_type_entity = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$entity_id'"); 
			$row_type_entity = sqlsrv_fetch_array($result_type_entity);
			if  ( $type_entity = $row_type_entity['type_entity'] == "Person" ){
			?>
			<strong>Position :</strong> <?php echo $position; ?>
			<?php 
			}
			?>
        </td>
        </tr>
        <tr>
          <td colspan="2"><hr /></td>
        </tr>
        <?php				
	}
	?>
</table>
<?php
}
?>


</div>

</div>




</body>
</html>