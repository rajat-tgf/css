<?php
require_once("includes\security.php");
$Security->GoSecure();

$entity_id = $_GET['entity_id'];
$result = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$entity_id'"); 
$row = sqlsrv_fetch_array( $result );;

$type_entity = $row['type_entity'];
$name = $row['name'];
$alternative_name = $row['alternative_name'];
$accro = $row['accro'];
$head_city = $row['head_city'];
$head_country = $row['head_country'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Entity Main Details</title>
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


  
function validate(){  

	if(document.entity_details.type_entity.value == ""){
	
	window.alert("You must select an entity type (Person or Organization)");      
	 
	return false;     
	}
	
	if(document.entity_details.name_entity.value == ""){       
	
	window.alert("You must write the name of the entity");      
	 
	return false;     
	}
 
} 
</script>

</head>
<body>

<form name="entity_details" id="entity_details" action="save_modification_entity_main_details.php?entity_id=<?php echo $entity_id ?>" method="post" enctype="multipart/form-data" onSubmit="return validate();"> 

<table width="97%" border="0" class="gridtable">
              <tr>
                <td align="right">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Entity Type :</strong></td>
                <td colspan="2">
                <select name="type_entity" id="type_entity" class="text ui-widget-content ui-corner-all">
                  <option selected="selected">
                        <?php
                      		echo $type_entity;
					  	?>
                        </option>
                  <option>Person</option>
                  <option>Organization</option>
                </select></td>
              </tr>
              <tr>
                <td align="right"><p><strong>Name </strong> <strong>:</strong></p></td>
                <td colspan="2"><input name="name_entity" id="name_entity" type="text" style="width:100%" maxlength="100" class="text ui-widget-content ui-corner-all" value = "<?php echo $name ?>"/></td>
              </tr>
              <tr>
                <td width="97" align="right" valign="top"><strong>Alt. name :</strong></td>
                <td colspan="2" valign="top"><input name="alternative_name" id="alternative_name" type="text" style="width:100%" maxlength="100" class="text ui-widget-content ui-corner-all" value = "<?php echo $alternative_name ?>"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Acronym :</strong></td>
                <td valign="top"><input name="acro" id="acro" type="text" size="30" maxlength="20" class="text ui-widget-content ui-corner-all" value = "<?php echo $accro ?>"/></td>
                <td valign="top"><strong>Nationality / Country based :
                    
                    <select name="head_country" id="head_country" class="text ui-widget-content ui-corner-all">
                      <option selected="selected">
                        <?php
                      		echo $head_country;
					  	?>
                      </option>
                      <option></option>
                      <?php
					  $result2 = sqlsrv_query($conncss,"SELECT * FROM countries ORDER BY country ASC"); 
                      while($row2 = sqlsrv_fetch_array($result2)){
						  $country = $row2['country'];
						  echo "<option value ='$country'>$country</option>";
                      }
					  ?>
                    </select>
                </strong></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td width="249" valign="top"><input name="head_city" id="head_city" type="text" size="30" maxlength="55" class="text ui-widget-content ui-corner-all" value = "<?php echo $head_city ?>"/></td>
                <td valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" colspan="3">
                
				<button TYPE = "Submit" Name = "Submit" VALUE = "Save">Save modifications</button>                
                </td>
              </tr>
              
            </table> 
</form>

</body>
</html>