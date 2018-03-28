<?php
require_once("includes\security.php");
$Security->GoSecure();
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

           <script type="text/javascript" src="src/js/filemenu.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                $('#menu').fileMenu({
                    slideSpeed: 500
                });
            });
        </script>       

        <!-- fileMenu CSS file -->
        <link rel="stylesheet" type="text/css" href="src/css/fileMenu.min.css">

    
   <script>
    $(function() {
    $( "#tabs" ).tabs();
	$( "input[type=submit], button" )
	.button()
	});
</script>


<style type="text/css">
table.gridtable1 {
	font-family: verdana,arial,sans-serif;
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
	font-size:13px;
	border-width: 0px;
	color:#666666;
	padding: 3px;
	border-style: solid;
	border-color: #EDEDED;
}
input.text1 {margin-bottom:3px; width:95%; padding: .1em; }
input.text1 {margin-bottom:3px; width:95%; padding: .1em; }

hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }
</style>



<script language="javascript">     
function validate(){  

	if(document.new_entity.type_entity.selectedIndex == 0){
	
	window.alert("You must select an entity type (Person or Organization)");      
	 
	return false;     
	}
	
	if(document.new_entity.name_entity.value == ""){       
	
	window.alert("You must write the name of the entity");      
	 
	return false;     
	}
	
	
	if(document.new_entity.category.selectedIndex == 0){
	
	window.alert("You must select a Category for the entity log ");
	 
	return false;     
	} 
	
	if(document.new_entity.type_profile.selectedIndex == 0){
	
	window.alert("You must select a Type for the entity log ");
	 
	return false;     
	}

} 
</script>


  <script>
					$(function() {
						$("#dialog-message").dialog({
							position: "top",
							width: 420,
							draggable: false,
							resizable: false,
							modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
  </script>

                <script>

					$(function() {
						$("#dialog").dialog({
							position: "top",
							autoOpen: false,
							draggable: false,
							resizable: false,
							height: 700,
							width: 800,
							modal: true,
						});
						$("#button").on("click", function() {
							$("#dialog").dialog("open");
						});
					});
				</script>

</head>

<body>

<div id="art-page-background-simple-gradient">
</div>
    <div id="art-main">
<div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>
            <div class="art-Sheet-bc"></div>
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>
            <div class="art-Sheet-body">
                <div class="art-Header">
                    <div class="art-Header-jpeg"></div>
                    <div class="art-Logo">
                        <h1 id="name-text" class="art-Logo-name">Case Management System</h1>
                        <div id="slogan-text" class="art-Logo-text">Office of the Inspector General</div>
                    </div>
                </div>
<?php
include ("menu_list_home.php");
?>
                <div class="art-contentLayout">
<br />
<div id="dialog-message" title="Important Message">
  <p><img src="images/warning-icon.png" width="30" height="30">
  <br />
  Before you add a new entity, please make sure that it does not already exist in the system.</p>
</div>

<div id="dialog" title="Help">
                
                <p><strong>Subject</strong></p>
                    <p>A person or organization as a subject of interest, alleged or suspected to be involved in wrong doing.</p>
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



<div id="tabs" style="width:97%; display:block;">
<ul>
<li><a href="#tabs-1">Add New Entity</a></li>
</ul>
<div id="tabs-1">

<form name="new_entity" id="new_entity" action="save_new_entity.php" method="post" enctype="multipart/form-data" onSubmit="return validate();"> 
    

  <table border="0" class="gridtable1">
              <tr>
               <td align="right">
                

              </td>
               <td align="right">&nbsp;</td>
               <td align="right">&nbsp;</td>
               <td align="right"><button id="add_entity" title="Add New Entity" class="text ui-widget-content ui-corner-all">Save New Entity</button></td>
              </tr>
              
              <tr>
                <td align="right">&nbsp;</td>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong><font color="#CC0000">* Entity Type :</font></strong></td>
                <td colspan="3">
                
                <select name="type_entity" id="type_entity" class="text ui-widget-content ui-corner-all">
                  <option></option>
                  <option>Person</option>
                  <option>Organization</option>
                </select></td>
              </tr>
              <tr>
                <td align="right"><p><strong><font color="#CC0000">* Name :</font></strong></p></td>
                <td colspan="3"><input name="name_entity" id="name_entity" type="text" size="170" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Alt. name :</strong></td>
                <td colspan="3" valign="top"><input name="alternative_name" id="alternative_name" type="text" size="170" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Acronym :</strong></td>
                <td valign="top"><input name="acro" id="acro" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
                <td valign="top">&nbsp;</td>
                <td valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="head_city" id="head_city" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Nationality / Country based :</strong></td>
                <td valign="top"><select name="head_country" id="head_country" class="text ui-widget-content ui-corner-all">
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


  </table> 

<br />
<br />
            <table border="0" class="gridtable1">
              <tr>
                <td colspan="5" align="left" valign="baseline">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="5" align="left" valign="baseline"><img src="images/profile-icon.png" width="15" height="15" align="top"/><font size="+1"> Log</font></td>
              </tr>
               
               <tr>
                <td colspan="5" align="right" valign="top"><hr /></td>
              </tr>
              <tr>
                <td width="93" align="right" valign="middle"><strong><font color="#CC0000">* Category :</font></strong></td>
                <td width="46" align="center" valign="middle">
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
                <img src="images/question.jpg" width="35" height="35" align="top" id="button" /></td>
                <td width="455" align="left" valign="middle"><div class="row">
                  <select name="category" id="category" class="text ui-widget-content ui-corner-all" onchange="selectChangeHandler(this)">
                    <option value =""></option>
                    <option value ="Whistleblower">Whistleblower</option>
                    <option value ="Confidential Informant">Confidential Informant</option>
                    <option value ="Reporter">Reporter</option>
                    <option value ="Witness">Witness</option>
                    <option value ="Subject">Subject</option>
                    <option value ="Other">Other</option>
                  </select>
                  <script>
function selectChangeHandler(selectNode) {
	if (selectNode.selectedIndex == 1) {
		alert("Specific entities such as 'Whistleblower' or 'Confidential Informant' will require particular safeguards regarding how personal information details are recorded, stored and protected within OIG systems.");
	}
	if (selectNode.selectedIndex == 2) {
		alert("Specific entities such as 'Whistleblower' or 'Confidential Informant' will require particular safeguards regarding how personal information details are recorded, stored and protected within OIG systems.");
	}
}
                </script>
                </div></td>
                
                <td colspan="2" align="left" valign="middle">
                <div class="row" id="row_dim">
                <table>
                <tr><td align="left"><input type="checkbox" style="border: 0; background:transparent" name="protection" /></td>
                <td> <strong><font color="#993300">Protection </font></strong></td>
                </tr>
                </table>
                </div>

                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Position :</strong></td>
                <td colspan="4" valign="top"><input id="position" name="position" type="text" size="170" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="2" valign="top">&nbsp;</td>
                <td width="285" align="right" valign="top">&nbsp;</td>
                <td width="408" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong><font color="#CC0000">* Type :</font></strong></td>
                <td colspan="2" valign="top"><select name="type_profile" class="text ui-widget-content ui-corner-all">
                  <option value =""></option>
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
                <td align="right" valign="top"><strong>Home phone number :</strong></td>
                <td valign="top"><input name="home_phone_number" id="home_phone_number" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 1 :</strong></td>
                <td colspan="2" valign="top"><input name="email1" id="email1" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Office phone number :</strong></td>
                <td valign="top"><input name="office_phone_number" id="office_phone_number" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 2 :</strong></td>
                <td colspan="2" valign="top"><input name="email2" id="email2" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Mobile :</strong></td>
                <td valign="top"><input name="mobile" id="mobile" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Skype :</strong></td>
                <td colspan="2" valign="top"><input name="skype" id="skype" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Fax :</strong></td>
                <td valign="top"><input name="fax" id="fax" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Web :</strong></td>
                <td colspan="4" valign="top"><input name="web_page" id="web_page" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td rowspan="2" align="right" valign="top"><strong>Address :</strong></td>
                <td colspan="2" rowspan="2" valign="top"><textarea name="address" id="address" cols="70" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ></textarea></td>
                <td align="right" valign="top"><strong>Post code :</strong></td>
                <td valign="top"><input name="post_code" id="post_code" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="city" id="city" type="text" size="30" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Country :</strong></td>
                <td colspan="4" valign="top"><select name="country" id="country" class="text ui-widget-content ui-corner-all">
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
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Notes :</strong></td>
                <td colspan="4" valign="top"><textarea name="notes" id="notes" cols="170" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none"></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" align="left" valign="top"><strong>Link this Log to Allegation  :
                  <select name="allegation_to_link" id="allegation_to_link" class="text ui-widget-content ui-corner-all">
                    <option></option>
                    <?php
								$dash = " - ";
								$result_all_allegations = sqlsrv_query($conncss,"SELECT * FROM allegation_details"); 
								 while($row_all_allegation = sqlsrv_fetch_array($result_all_allegations)){
									$country_allegation = $row_all_allegation['country'];
									$allegation_number = $row_all_allegation['id'];
									echo "<option value='$allegation_number'>$allegation_number$dash$country_allegation</option>";
								}
								?>
                    </select>
                </strong></td>
                </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" align="left" valign="top"><strong>OR</strong></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" align="left" valign="top"><strong>Link this Log to Case  :</strong>
                <select name="case_to_link" id="case_to_link" class="text ui-widget-content ui-corner-all">
                    <option></option>
                    <?php
								$dash = " - ";
								$result_all_cases = sqlsrv_query($conncss,"SELECT * FROM $cmsdb.cases"); 
								 while($row_all_cases = sqlsrv_fetch_array($result_all_cases)){
									$country_case = $row_all_cases['country'];
									$ref_number = $row_all_cases['ref_number'];
									echo "<option value='$ref_number'>$ref_number$dash$country_case</option>";
								}
								?>
                  </select></td>
                </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" valign="top">&nbsp;</td>
              </tr>
              
          </table> 
            
</form>

</div>
</div></div>


                <div class="cleared"></div>
              </div>
        </div>
  <div class="cleared"></div>
        <p class="art-page-footer">&nbsp;</p>
    </div>
<?php
if ( isset ($_GET['new_entity'])) {
	echo "<script>alert('The new Entity has been save in the system')</script>";
}

?>
</body>
</html>