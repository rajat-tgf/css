<?php
require_once("includes\security.php");
$Security->GoSecure();
$entity_id = $_GET['entity_id'];
$result = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$entity_id'"); 
$row = sqlsrv_fetch_array( $result );
$type_entity = $row['type_entity'];	

$position = "";

if  ( $type_entity != "Person" ){
$position = $type_entity;	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Log</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
 <script>
$(function() {
$( "input[type=submit], button" )
.button()
});
</script>        
       
<style>
	body { font-size: 65.5%; }
	label, input { display:block; }
	input.text { margin-bottom:3px; width:95%; padding: .1em; }
	fieldset { padding:0; border:0; margin-top:25px; }
	h1 { font-size: 1.2em; margin: .6em 0; }
	div#entities-contain { width: 830px; margin: 10px 0; }
	div#entities-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; alignment-adjust: }
	div#entities-contain table td { border: 1px solid #DBE5F1; padding: .3em 10px; text-align: left; }
	div#entities-contain table th { border: 1px solid #DBE5F1; padding: .3em 10px; text-align: left; background:#F2F2F2; font-style:normal; color:#666666; }
	.ui-dialog .ui-state-error { padding: .3em; }
	.validateTips { border: 1px solid transparent; padding: 0.3em; }
</style>

<style type="text/css">
table.gridtable1 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:13px;
	color:#FFFFFF;
	border-color: #EDEDED;
	border-collapse: collapse;
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
	border-style: solid;
	border-color: #EDEDED;
	background-color: #ffffff;
}
input.text1 {margin-bottom:3px; width:95%; padding: .1em; }
input.text1 {margin-bottom:3px; width:95%; padding: .1em; }
</style>


<script language="javascript">     
function validate(){  

	if(document.new_entity_pro.category.selectedIndex == 0){
	
	window.alert("You must select a Category for the entity log ");
	 
	return false;     
	} 
	
	if(document.new_entity_pro.type_profile.selectedIndex == 0){
	
	window.alert("You must select a Type for the entity log ");
	 
	return false;     
	}
} 
</script>



</head>
<body>

<div id="tabs">
<ul>
<li><a href="#tabs-1">Add Log</a></li>
</ul>
<div id="tabs-1">
<form name="new_entity_pro" id="new_entity_pro" action="save_new_profile.php?entity_id=<?php echo $entity_id ?>" method="post" enctype="multipart/form-data" onSubmit="return validate();"> 
            <table width="781" border="0" class="gridtable1">
              <tr>
                <td align="right" valign="middle"><strong><font color="#990000">Category :</font></strong></td>
                <td valign="middle">
                
                <script>
				$(function() {
					$('#row_dim').hide(); 
					$('#category').change(function(){
						if($('#category').val() == 'Whistleblower') {
							$('#row_dim').show(); 
						} else if($('#category').val() == 'Confidential Informant') {
							$('#row_dim').show(); 
						} else if($('#category').val() == 'Witness') {
							$('#row_dim').show(); 	
						}else {
							$('#row_dim').hide(); 
						} 
					});
				});
				</script>
                
                <div class="row">
                <select name="category" id="category" class="text ui-widget-content ui-corner-all">
                  <option value =""></option>
                  <option value ="Whistleblower">Whistleblower</option>
                  <option value ="Confidential Informant">Confidential Informant</option>
                  <option value ="Reporter">Reporter</option>
                  <option value ="Witness">Witness</option>
                  <option value ="Subject">Subject</option>
                  <option value ="Other">Other</option>
                </select>
                </div>
                
                </td>
                <td align="right" valign="middle">
                
                <div class="row" id="row_dim">
                <table align="left" class="gridtable1">
                <tr><td><input type="checkbox" style="border: 0; background:transparent" name="protection" /></td>
                <td> <strong><font color="#993300">Protection</font></strong></td>
                </tr>
                </table>
                </div>
                
                </td>
                <td valign="top">
                <div id="dialog" title="Help">
                    <p><strong>Whistleblower</strong></p>
                    <p>A person who in good faith alerts a third party that a person or entity is doing something wrong, or reports a concern, allegation or information that indicates a prohibited practice is occurring, or has occurred in the Global Fund, or a Global Fund financed operation.

The Global Fund is committed to safeguard whistle-blowers, and provides the opportunity to treat all whistle-blowing reports as either confidential or anonymous, the choice of which remains that of the whistle-blower alone to choose.</p>
                    <p><strong>Reporter</strong></p>
                    <p>A reporter is a generic term to describe a person or organization who makes a firsthand report or refers by some means a report of alleged wrongdoing, concern, complaint or allegation, and who is prepared to be openly associated with the role of reporting such issues.</p>
                    <p><strong>Confidential Informant</strong></p>
                    <p>A confidential informant is a person purposefully identified within a case assessment, or within an investigation, or who has come forward to voluntarily assist an investigation, and who provides information to the investigator in good faith, but ‘in confidence’ in order to protect against any retaliation towards them, or otherwise public disclosure of their confidential support role to an investigation.</p>
                    <p><strong>Witness</strong></p>
                    <p>A witness is a person who has been identified within a case assessment as a potential witness, or by an investigation, or who has otherwise assisted an investigation, who voluntarily or under legal compulsion provides testimonial evidence in open support to that investigation, often in the form of a witness statement, or record of interview that may be publically disclosed.</p>
                    <p><strong>Other</strong></p>
                    <p>‘Other persons’ are reporters or alternative sources of information that otherwise do not fit the specific definitions or status of person.</p>
				</div>

                
                
                <script>

					$(function() {
						$("#dialog").dialog({
							autoOpen: false,
							draggable: false,
							resizable: false,
							height: 520,
							width: 700,
							modal: true,
						});
						$("#button").on("click", function() {
							$("#dialog").dialog("open");
						});
					});
				</script>
                <img src="images/question.jpg" width="42" height="41" align="top" id="button" />
                </td>
              </tr>
              <tr>
                <td width="72" align="right" valign="top"><strong>Position :</strong></td>
                <td colspan="3" valign="top">
                <?php
				if ( $type_entity == 'Organization' ){
				?>
                <input id="position" name="position" type="text" size="30" maxlength="130" class="text ui-widget-content ui-corner-all" value = "<?php echo $position ?>" disabled="disabled"/>
                <?php
				
				}else{
				?>
                <input id="position" name="position" type="text" size="30" maxlength="130" class="text ui-widget-content ui-corner-all"/>
                <?php	
					
				}
				?>
                
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong><font color="#990000">Type :</font></strong></td>
                <td valign="top"><select name="type_profile" class="text ui-widget-content ui-corner-all">
                  <option value ="">Select</option>
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
                  <option value ="Supplier">Supplier</option>
                  <option value ="Global Fund">Global Fund</option>
                  <option value ="Other">Other</option>
                </select></td>
                <td width="174" align="right" valign="top"><strong>Home phone number :</strong></td>
                <td width="318" valign="top"><input name="home_phone_number" id="home_phone_number" type="text" maxlength="50" size="30" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 1 :</strong></td>
                <td width="186" valign="top"><input name="email1" id="email1" type="text" size="30" maxlength="60" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Office phone number :</strong></td>
                <td valign="top"><input name="office_phone_number" id="office_phone_number" type="text" size="30" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 2 :</strong></td>
                <td valign="top"><input name="email2" id="email2" type="text" size="30" maxlength="60" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Mobile :</strong></td>
                <td valign="top"><input name="mobile" id="mobile" type="text" size="30" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Skype :</strong></td>
                <td valign="top"><input name="skype" id="skype" type="text" size="30" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Fax :</strong></td>
                <td valign="top"><input name="fax" id="fax" type="text" size="30" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Web :</strong></td>
                <td colspan="3" valign="top"><input name="web_page" id="web_page" type="text" size="30" maxlength="140" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Address :</strong></td>
                <td colspan="3" valign="top"><textarea name="address" id="address" maxlength="200" cols="70" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Post code </strong></td>
                <td valign="top"><input name="post_code" id="post_code" type="text" size="30" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="city" id="city" type="text" size="30" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td valign="top">&nbsp;</td>
                <td align="right" valign="top"><strong>Country :</strong></td>
                <td valign="top"><select name="country" id="country" class="text ui-widget-content ui-corner-all">
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
                <td colspan="3" valign="top"><textarea name="notes" id="notes" cols="70" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ></textarea></td>
              </tr>
              
              <tr>
                <td colspan="4" align="right" valign="baseline"><hr /></td>
              </tr>
              <tr>
                <td align="right" colspan="4">
                
				<button TYPE = "Submit" Name = "Submit" VALUE = "Save">Add New Log</button>                
                </td>
              </tr>
              
      </table>
</form>
</div>
</div>   

</body>
</html>