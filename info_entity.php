<?php

require_once("includes\\opendb.php");

		$entity_id = $_GET['entity_id'];
		$result_entity_id = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$entity_id'"); 
		$row_entity_id = sqlsrv_fetch_array( $result_entity_id );
				
		$type_entity = $row_entity_id['type_entity'];
		$entity_name = $row_entity_id['name'];
		$alternative_name = $row_entity_id['alternative_name'];
		$acro = $row_entity_id['accro'];
		$city = $row_entity_id['head_city'];
		$country = $row_entity_id['head_country'];
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

</head>

<body>
<table width="100%" border="0" class="gridtable">
  <tr>
    <td width="96" align="left" valign="top"><strong>Name :</strong></td>
    <td valign="top"><?php echo $entity_name ?></td>
    <td colspan="3" align="right" valign="top"><strong>Nationality / Country based:</strong></td>
    <td colspan="2" align="left" valign="top"><?php echo $country ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Alt. Name :</strong></td>
    <td width="393" valign="top"><?php echo $alternative_name ?></td>
    <td width="74" align="right" valign="top">&nbsp;</td>
    <td colspan="2" align="right" valign="top"><strong>City :</strong></td>
    <td align="left" valign="top"><?php echo $city ?></td>
    <td width="38" rowspan="2" align="right" valign="top">
    
    <a onclick="return parent.showDialogeditentitymain(<?php echo $entity_id ?> )">
    	<img src="images/Edit_icon.png" alt="Edit" width="30" height="30" align="top" title="Edit Entity"/>
    </a>
	</td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Acronym :</strong></td>
    <td align="left" valign="top"><?php echo $acro ?></td>
    <td align="right" valign="top"><strong>Entity ID :</strong></td>
    <td width="62" align="left" valign="top"><?php echo $entity_id ?></td>
    <td width="49" align="right" valign="top"><strong>Type :</strong></td>
    <td width="246" align="left" valign="top"><?php echo $type_entity ?></td>
  </tr>

</table>


  


</body>
</html>