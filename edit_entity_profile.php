<?php
require_once("includes\security.php");
$Security->GoSecure();

$profile_id = $_GET['profile_id'];
$result_profile_id = sqlsrv_query($conncss,"select * from profiles WHERE id = '$profile_id'"); 
$row_profile_id = sqlsrv_fetch_array( $result_profile_id );;

$list_name_id = $row_profile_id['list_name_id'];

$resultlist_name_id = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$list_name_id'"); 
$rowlist_name_id = sqlsrv_fetch_array( $resultlist_name_id );
$type_entity = $rowlist_name_id['type_entity'];


$category = $row_profile_id['category'];
$position = $row_profile_id['position'];
$type = $row_profile_id['type'];
$wp = $row_profile_id['whistleblower_protection'];
$cip = $row_profile_id['informant_protection'];
$witp = $row_profile_id['witness_protection'];
$email1 = $row_profile_id['email1'];
$email2 = $row_profile_id['email2'];
$home_phone_number = $row_profile_id['home_phone_number'];
$office_phone_number = $row_profile_id['office_phone_number'];
$mobile = $row_profile_id['mobile'];
$skype = $row_profile_id['skype'];
$fax = $row_profile_id['fax'];
$web_page = $row_profile_id['web_page'];
$address = $row_profile_id['address'];
$post_code = $row_profile_id['post_code'];
$city = $row_profile_id['city'];
$country = $row_profile_id['country'];
$notes = $row_profile_id['notes'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Entity Log</title>
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
       
<script language="javascript">     
function validate(){  

	if(document.entity_pro.category.value == ""){
	
	window.alert("You must select a Category for the entity log ");
	 
	return false;     
	} 
	
	if(document.entity_pro.type_profile.value == ""){
	
	window.alert("You must select a Type for the entity log ");
	 
	return false;     
	}    

} 
</script>


</head>
<body><br />

<form name="entity_pro" id="entity_pro" action="save_profile_modification.php?profile_id=<?php echo $profile_id ?>" method="post" enctype="multipart/form-data" onSubmit="return validate();"> 
            <table width="98%" border="0" class="gridtable">
              <tr>
                <td align="right" valign="top"><strong><font color="#990000">Category :</font></strong></td>
                <td valign="top"><select name="category" class="text ui-widget-content ui-corner-all">
                  <option selected="selected" value ="<?php echo $category ?>"><?php echo $category;?></option>
                  <option value ="Whistleblower">Whistleblower</option>
                  <option value ="Confidential Informant">Confidential Informant</option>
                  <option value ="Reporter">Reporter</option>
                  <option value ="Witness">Witness</option>
                  <option value ="Subject">Subject</option>
                  <option value ="Other">Other</option>
                </select></td>
                <td align="right" valign="top"><strong><font color="#993300">
                
                
                <?php
				if ( $category == "Whistleblower" ){
				?>
                   <strong>Protection</strong>
					<?php
                    if ( $wp == "Yes" ){
                   		 $checked = "checked";	
                    }else{
                   	 	$checked = "";
                    }
                    ?>
                    </td><td>
				   <input type="checkbox" style="border: 0; background:transparent" name="wp" <?php echo $checked ?>/>
                   </td>
				   
				<?php 
	             }else if ( $category == "Confidential Informant" ){
					?>
                    <strong>Protection</strong> 
					 <?php
                    if ( $cip == "Yes" ){
                   		 $checked = "checked";	
                    }else{
                   	 	$checked = "";
                    }
                    ?>
                    </td><td>
				   <input type="checkbox" style="border: 0; background:transparent" name="cip" <?php echo $checked ?>/>
                   </td>
				<?php 
	             }else if ( $category == "Witness" ){
					?>
                    <strong>Protection</strong> 
					 <?php
                    if ( $witp == "Yes" ){
                   		 $checked = "checked";	
                    }else{
                   	 	$checked = "";
                    }
					
                    ?>
                    </td><td>
				   <input type="checkbox" style="border: 0; background:transparent" name="witp" <?php echo $checked ?>/>	 
                   </td>
				<?php
				 }
				 ?>
                </td>
              </tr>
              <tr>
                <td width="84" align="right" valign="top"><strong>Position :</strong></td>
                <td colspan="3" valign="top">
	                <input id="position" name="position" type="text" style="width:100%" maxlength="120" class="text ui-widget-content ui-corner-all" value = "<?php echo $position ?>"/>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong><font color="#990000">Type :</font></strong></td>
                <td valign="top"><select name="type" class="text ui-widget-content ui-corner-all">
                  <option selected="selected" value ="<?php echo $type ?>"><?php echo $type;?></option>
                  <option value ="PR Employee">PR Employee</option>
                  <option value ="SR Employee">SR Employee</option>
                  <option value ="SSR Employee">SSR Employee</option>
                  <option value ="LFA Employee">LFA Employee</option>
                  <option value ="CCM Employee">CCM Employee</option>
                  <option value ="Supplier Employee">Supplier Employee</option>
                  <option value ="Global Fund Employee">Global Fund Employee</option>
                  <option value ="PR">PR</option>
                  <option value ="SR">SR</option>
                  <option value ="SSR">SSR</option>
                  <option value ="LFA">LFA</option>
                  <option value ="CCM">CCM</option>
                  <option value ="Supplier">Supplier</option
                  ><option value ="Global Fund">Global Fund</option>
                  <option value ="Other">Other</option>
                </select></td>
                <td width="204" align="right" valign="top"><strong>Home phone number :</strong></td>
                <td width="184" valign="top"><input name="home_phone_number" id="home_phone_number" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all" value = "<?php echo $home_phone_number ?>"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 1 :</strong></td>
                <td width="184" valign="top"><input name="email1" id="email1" type="text" style="width:100%" maxlength="60" class="text ui-widget-content ui-corner-all" value = "<?php echo $email1 ?>"/></td>
                <td align="right" valign="top"><strong>Office phone number :</strong></td>
                <td valign="top"><input name="office_phone_number" id="office_phone_number" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all" value = "<?php echo $office_phone_number ?>"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 2 :</strong></td>
                <td valign="top"><input name="email2" id="email2" type="text" style="width:100%" maxlength="60" class="text ui-widget-content ui-corner-all" value = "<?php echo $email2 ?>"/></td>
                <td align="right" valign="top"><strong>Mobile :</strong></td>
                <td valign="top"><input name="mobile" id="mobile" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all" value = "<?php echo $mobile ?>"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Skype :</strong></td>
                <td valign="top"><input name="skype" id="skype" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all" value = "<?php echo $skype ?>"/></td>
                <td align="right" valign="top"><strong>Fax :</strong></td>
                <td valign="top"><input name="fax" id="fax" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all" value = "<?php echo $fax ?>"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Web :</strong></td>
                <td colspan="3" valign="top"><input name="web_page" id="web_page" type="text" style="width:100%" maxlength="120" class="text ui-widget-content ui-corner-all" value = "<?php echo $web_page ?>"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Address :</strong></td>
                <td colspan="3" valign="top"><textarea name="address_person" id="address_person" maxlength="250" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ><?php echo $address ?></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Post code :</strong></td>
                <td valign="top"><input name="post_code_person" id="post_code_person" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all" value = "<?php echo $post_code ?>"/></td>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="city_person" id="city_person" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all" value = "<?php echo $city ?>"/></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td valign="top">&nbsp;</td>
                <td align="right" valign="top"><strong>Country :</strong></td>
                <td valign="top"><select name="country_person" id="country_person" class="text ui-widget-content ui-corner-all">
                        <option selected="selected">
                        <?php
                      		echo $country;
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
                      </select></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Notes :</strong></td>
                <td colspan="3" valign="top"><textarea name="notes" id="notes" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ><?php echo $notes ?></textarea></td>
              </tr>
              
              <tr>
                <td colspan="4" align="right" valign="baseline"></td>
              </tr>
              <tr>
                <td align="right" colspan="4">
                
				<button TYPE = "Submit" Name = "Submit" VALUE = "Save">Save modifications</button>                
                </td>
              </tr>
              
            </table> 
</form>
</body>
</html>