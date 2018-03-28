<?php

require_once("includes\\opendb.php");




session_start(); 
if ( isset ($_GET['entity_id'])) {
	$_SESSION['entity_id']=$_GET['entity_id'];
}
$entity_id = $_SESSION['entity_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Details Entity</title>

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
      


<style type="text/css">
table.gridtablesub {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:13px;
}
table.gridtablesub td {
	color:#666666;
	padding: 3px;

}
</style>

<script>
function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}
</script>  



<script language="javascript">     
function validate(){  

if(document.forms[0].entity_id_to_link.value == false){       

window.alert("You must select an entity from the list");      
 
return false;     
}  

if(document.forms[0].entity_id_to_link.value == ''){       

window.alert("You must select an entity from the list");      
 
return false;     
}  

} 
</script>




<script>
$(function() {
	var dialog, form,
	
	dialog = $( "#new-entity-interest-form" ).dialog({
		autoOpen: false,
		Position:'top',
		height: 625,
		width: 1010,
		modal: true,
		resizable: false,
		draggable: false,
		overlay: {
					opacity: 0.5,
					background: "black"
				},
				
				
		buttons: {
			"Link": function() {
				$( "#iframedetails_links").contents().find("#link_entity").submit();
				alert ("Entity has been linked");
				window.location.reload()
				
			},
			"Close": function() {
				$( this ).dialog( "close" );
			},
		

		},
		
	});
	
	
	
	$( "#link_entity_interest" ).click(function() {
		$( "#new-entity-interest-form" ).dialog( "open" );
	});

});


function showDialogeditentitymain(entity_id){
	show_edit_entity_main_Popup(entity_id);
};


function show_edit_entity_main_Popup(entity_id){
	   $("#diveditentitymain").dialog("open");
	   $("#modalIframeeditentitymain").attr("src","edit_entity_main_details.php?entity_id=" + entity_id);
	   return false;
	}
	
$(document).ready(function() {
	   $("#diveditentitymain").dialog({
		   	   position: "top",
			   autoOpen: false,
			   modal: true,
			   height: 400,
			   width: 980,
			   resizable: false,
			   draggable: false,
			   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
		  });
});





function showDialogeditlog(profile_id){
	show_edit_log_Popup(profile_id);
};


function show_edit_log_Popup(profile_id){
	   $("#diveditlog").dialog("open");
	   $("#modalIframeeditlog").attr("src","edit_entity_profile.php?profile_id=" + profile_id);
	   return false;
	}
	
$(document).ready(function() {
	   $("#diveditlog").dialog({
		   	   position: "top",
			   autoOpen: false,
			   modal: true,
			   height: 600,
			   width: 980,
			   resizable: false,
			   draggable: false,
			   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
		  });
});









function showDialog_new_profile(){
   $("#divIdnewprofile").dialog("open");
   return false;
}

$(function() {
    $( "#divIdnewprofile" ).dialog({
      position: "top",
	  autoOpen: false,
      height: 680,
	  width: 1000,
      modal: true,
	  resizable: false,
      draggable: false,
      buttons: {
        "Save": function() {
			$('#new_profile').submit();
			window.location.reload();
			
        },
      }
    });
});


function validatenewprofile(){  

	if(document.new_profile.category.selectedIndex == 0){
	
	window.alert("You must select a Category for the entity log ");
	 
	return false;     
	} 
	
	if(document.new_profile.type_profile.selectedIndex == 0){
	
	window.alert("You must select a Type for the entity log ");
	 
	return false;     
	}
} 


	function showDialognewenprofile(){
		showDialog_new_profile();
	};

	function showDialog(sr){
	parent.show_sr_Popup(sr);
	};
	
	function showDialogcase(ref_number){
	parent.show_case_Popup(ref_number);
	};
	
	function showDialogir(ir){
		parent.show_ir_Popup(ir);
	};


</script>


</head>

<body>
<div id="tabs">
<ul>
<li><a href="#tabs-1">Entity Details</a></li>
<li><a href="#tabs-2">Links</a></li>
</ul>
<div id="tabs-1">
	<iframe src="info_entity.php?entity_id=<?php echo $entity_id ?>" width="100%" height="120" style="padding:1px;border:0px;">
      <p>Your browser does not support iframes.</p>
    </iframe>
    
    <iframe src="entity_profiles.php?entity_id=<?php echo $entity_id ?>" width="43%" height="390" frameborder="0" align="top">
      <p>Your browser does not support iframes.</p>
    </iframe>

    <iframe name="iframedetails" src="details_entity_profile.php?entity_id=<?php echo $entity_id ?>" width="55%" height="440" frameborder="0" align="top">
      <p>Your browser does not support iframes.</p>
    </iframe>
</div>   


<div id="tabs-2">


<table width="100%">
<tr>
<td align="right">
<a style="text-decoration:none" href="#" id="link_entity_interest"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Entity</a>



</td>
</tr>
</table>

<div id="new-entity-interest-form" title="Link entity">
    <iframe name="iframedetails_links" id="iframedetails_links" src="search_entity.php" width="100%" height="100%" style="padding:1px;border:0px;">
    </iframe>
</div> 




<table width="100%" class="gridtablefilter">
<tr><td align="left">
  Entities linked to
  <?php
  $sql_name_entity = "SELECT * FROM list_name WHERE entity_id = $entity_id";
$sql_resultsql_name_entity = sqlsrv_query($conncss, $sql_name_entity);
$rowsql_resultsql_name_entity = sqlsrv_fetch_array($sql_resultsql_name_entity);
echo $name = $rowsql_resultsql_name_entity['name'];
?></td></tr>
</table>
<div id="entities-contain">
                <table>
                <tr>
                  <th width="42%">Name</th>
                  <th width="10%">City</th>
                  <th width="17%">Nationality / Country based</th>
                  <th width="5%"></th>
                  <th width="3%"></th>
                </tr>
                <?php
				$rowId = 100;
                    $result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_link WHERE entity_id = '$entity_id'");
					
                    while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
						  
                          $rowId = $rowId + 1;
						  $link = $row_entity['link'];
                          $result_entity_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$link'");
                          $row_entity_details = sqlsrv_fetch_array($result_entity_details);
						$type_entity = $row_entity_details['type_entity'];
                        ?>
                        <tr>
                        <td>
						<?php
							if ( $type_entity != "Person" ){
								$icon = "entity-icon.png";
							}else{
								$icon = "user-silhouette-icon.png";
							}
								
							?>
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle" title="Person"/>
						
						<?php echo $name = $row_entity_details['name']; ?></td>
                        <td align="center"><?php echo $accro = $row_entity_details['head_city']; ?></td>
                        <td align="center"><?php echo $country = $row_entity_details['head_country']; ?></td>
                        
                        
                        <td>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        </td>
                        <td>
                        <a href="unlink_entity_from_entity.php?&entity_to_unlink=<?php echo $link ?>">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity <?php echo $link ?>"/>
                         </a>
                        
                        
                        </td>
                        
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="5" style="border:none">
                        
                        <table width="800" style="border:none" class="gridtablesub">
                        <tr>
                        <td style="border:none" width="29">
								<?php
                                $sql123 = "SELECT * FROM profiles WHERE list_name_id = $link";

								$sql_result1 = sqlsrv_query($conncss, $sql123);
								
								while ($row123 = sqlsrv_fetch_array($sql_result1)) {
									
									$list_name_id = $row123['list_name_id'];
									$whistleblower_protection = $row123["whistleblower_protection"];
									$informant_protection = $row123["informant_protection"];
									$witness_protection = $row123["witness_protection"];
									$category = $row123["category"];
								?>
								</strong></font>
								
									<img src="images/profile-icon.png" width="12" height="12" align="top"/>
									<font size="-1">
									<strong>Category : </strong><?php echo $category; ?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<?php
                                    if ( $whistleblower_protection == "Yes" ){
                                    ?>
                                    <img src="images/Protect-Red-icon.png" width="23" height="23" align="top" title="Whistleblower Protection"/>
                                <?php
                                    }
                                    if ( $informant_protection == "Yes" ){
                                    ?>
                                    <img src="images/Protect-Green-icon.png" width="23" height="23" align="top" title="Informant Protection"/>
                                <?php
                                    }
                                    if ( $witness_protection == "Yes" ){
                                    ?>
                                    <img src="images/Protect-Blue-icon.png" width="23" height="23" align="top" title="Witness Protection"/>
                                <?php
                                    }
                                    ?>
									<br />
									<strong>Type : </strong><?php echo $row123["type"]; ?>
									<br />
									
									<?php
									$result_type_entity = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$list_name_id'"); 
									$row_type_entity = sqlsrv_fetch_array($result_type_entity);
									if  ( $type_entity = $row_type_entity['type_entity'] == "Person" ){
									?>
									<strong>Position : </strong><?php echo $row123["position"]; ?>
									<?php
									}
									?>
									</font>
								<br /><br />
								<?php	
								}
								?>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        <?php
                    }
				?>
				</table>
      
</div> 
</div>




<div id="divIdnewprofile" title="Add new profile for Entity <?php echo $entity_id ?>">
<div id="entities-contain1" align="center">
<form name="new_profile" id="new_profile" action="save_new_profile.php?entity_id=<?php echo $entity_id ?>" method="post" enctype="multipart/form-data" onSubmit="return validatenewprofile()"> 
            <table width="98%">
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
                
                <div class="row" align="right">
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
                <td align="right" valign="middle">&nbsp;</td>
                <td align="right" valign="middle">
                
                <img src="images/question.jpg" width="42" height="41" align="top" id="button" />
                
                </td>
                <td valign="top">
				<div class="row" id="row_dim"><strong><font color="#993300">Protection</font></strong>
                <input type="checkbox" style="border: 0; background:transparent" name="protection" />
                </div>
                
                </td>
              </tr>
              <tr>
                <td width="79" align="right" valign="top"><strong>Position :</strong></td>
                <td colspan="4" valign="top">

                <input id="position" name="position" type="text" style="width:100%" maxlength="130" class="text ui-widget-content ui-corner-all"/>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong><font color="#990000">Type :</font></strong></td>
                <td valign="top"><select name="type_profile" id="type_profile" class="text ui-widget-content ui-corner-all">
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
                <td width="48" align="right" valign="top">&nbsp;</td>
                <td width="328" align="right" valign="top"><strong>Home phone number :</strong></td>
                <td width="483" valign="top"><input name="home_phone_number" id="home_phone_number" type="text" maxlength="50" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 1 :</strong></td>
                <td width="446" valign="top"><input name="email1" id="email1" type="text" style="width:100%" maxlength="60" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top">&nbsp;</td>
                <td align="right" valign="top"><strong>Office phone number :</strong></td>
                <td valign="top"><input name="office_phone_number" id="office_phone_number" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 2 :</strong></td>
                <td valign="top"><input name="email2" id="email2" type="text" style="width:100%" maxlength="60" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top">&nbsp;</td>
                <td align="right" valign="top"><strong>Mobile :</strong></td>
                <td valign="top"><input name="mobile" id="mobile" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Skype :</strong></td>
                <td valign="top"><input name="skype" id="skype" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top">&nbsp;</td>
                <td align="right" valign="top"><strong>Fax :</strong></td>
                <td valign="top"><input name="fax" id="fax" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Web :</strong></td>
                <td colspan="4" valign="top"><input name="web_page" id="web_page" type="text" style="width:100%" maxlength="140" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Address :</strong></td>
                <td colspan="4" valign="top"><textarea name="address" id="address" maxlength="200" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Post code </strong></td>
                <td valign="top"><input name="post_code" id="post_code" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top">&nbsp;</td>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="city" id="city" type="text" style="width:100%" maxlength="50" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td valign="top">&nbsp;</td>
                <td align="right" valign="top">&nbsp;</td>
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
                <td colspan="4" valign="top"><textarea name="notes" id="notes" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ></textarea></td>
              </tr>
      </table>
</form>
</div>

</div>



<div id="diveditentitymain" title="Edit Entity main details">
    <iframe id="modalIframeeditentitymain" frameborder="0" width="890" height="340">
    Your browser is not supported
    </iframe>
</div>


<div id="diveditlog" title="Edit Entity log details">
    <iframe id="modalIframeeditlog" frameborder="0" width="890" height="540">
    Your browser is not supported
    </iframe>
</div>


</body>
</html>