<?php
require_once("includes\security.php");
$Security->GoSecure();
$id = $_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

<SCRIPT LANGUAGE="JavaScript">

function info_entity_details(entity_id) 
{
		var windowW=1100
		var windowH=975
		var windowX = 100
		var windowY = 130
		var url = "info_entity_details.php?entity_id=" + entity_id;

		s = "scrollbars=yes"+",width="+windowW+",height="+windowH;

		blwindow = window.open(url,"Popup",","+s);
		windowX = (screen.width) ? (screen.width-windowW)/2 : 0;
		windowY = (screen.height) ? (screen.height-windowH)/2 : 0;
		blwindow.focus();
		blwindow.resizeTo(windowW,windowH);
		blwindow.moveTo(windowX,windowY);
}
</script>



<script>
$(function() {
$( "input[type=submit], button" )
.button()
});
</script>

<script>
function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}
</script>


<script>
		$(function() {
			
			$( "#new-entity-interest-form" ).dialog({
			autoOpen: false,
			position: ['top', 5],
			draggable: false,
			resizable: false,
			height: 750,
			width: 1200,
			modal: true,
			
			buttons: {
			"Close": function() {
				
					$( this ).dialog( "close" );
		
					},
					
					Link: function() {
						$( "#iframedetails_links").contents().find("#link_entity").submit();
						alert ("Entity has been linked to the allegation");
						window.top.location.reload();
					},
					
					},
					close: function() {
					}
					});
					$( "#link_entity_interest" ).click(function() {
						$( "#new-entity-interest-form" ).dialog( "open" );
					});
		});
</script>



  
   
<script type="text/javascript">
	function showDialog(profile_id_linked)
	{
		var profile_id_linked = profile_id_linked;
		

		$("#dialog-modal").dialog(
			{
				width: 400,
				height: 200,
				buttons: {
						"Unlink": function() {
							$.post("unlink_entity.php", {"profile_id_linked": profile_id_linked});
							alert ("Entity has been unlinked");
							window.top.location.reload();
							$( this ).dialog( "close" );
						},
						Cancel: function() {
							$( this ).dialog( "close" );
						}
					}
			 });
	}; 
</script> 


<script type="text/javascript">
	function showDialog1(entity_id){
		
	
	   $("#divIdenentitydetails").dialog("open");
	   $("#modalIframeentitydetails").attr("src","info_entity_details.php?entity_id=" + entity_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdenentitydetails").dialog({
			   autoOpen: false,
			   modal: true,
			   position: ['top', 5],
			   height: 925,
			   width: 1220,
			   resizable: false,
			   draggable: false,
			      

		  });
});
</script>

 
 
<div id="dialog" title="Help">
<font style="font-size:13px">
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
</font>
</div>

<script>
	$(function() {
		$("#dialog").dialog({
			position: "center",
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
	
	
	
function show_new_entity_Popup(){
   $("#divIdnewentity").dialog("open");
   return false;
}

$(function() {
	   $("#divIdnewentity").dialog({
			   autoOpen: false,
			   modal: true,
				height: 930,
				width: 1130,
			   resizable: false,
			   draggable: false,
			   buttons : {
                "Save new entity and link it to this allegation" : function() {
				$('#new_entity_link_allegation').submit();
					dialog.dialog( "close" );
					
                },
				Cancel: function() {
				  $( this ).dialog( "close" );
				}
				}
			   
		  });
	});	
	
	
	
function validatenewentity(){  

	if(document.new_entity_link_allegation.type_entity.selectedIndex == 0){
	
	window.alert("You must select an entity type (Person or Organization)");      
	 
	return false;     
	}
	
	if(document.new_entity_link_allegation.name_entity.value == ""){       
	
	window.alert("You must write the name of the entity");      
	 
	return false;     
	}
	
	
	if(document.new_entity_link_allegation.category.selectedIndex == 0){
	
	window.alert("You must select a Category for the entity log ");
	 
	return false;     
	} 
	
	if(document.new_entity_link_allegation.type_profile.selectedIndex == 0){
	
	window.alert("You must select a Type for the entity log ");
	 
	return false;     
	}

} 
	
	
</script> 
 

</head>

<body>

<table align="right">
<tr>
  <td width="106" align="left">
  <a style="text-decoration:none" href="#" onClick="return show_new_entity_Popup()"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />New Entity</a>

  </td>
<td width="106" align="left">

<a style="text-decoration:none" href="#" id="link_entity_interest"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Entity</a>
 

</td>
</tr>
</table>


<br />


<table class="gridtablefilter">
<tr><td align="left">
  <strong>Allegations reported by</strong></td></tr>
</table>


<div id="entities-contain">

<?php

	$complainant_id = $row_allegation['complainant'];
	$result_complainant_profile = sqlsrv_query($conncss,"select * from profiles WHERE id = '$complainant_id'"); 
	$row_result_complainant_profile = sqlsrv_fetch_array($result_complainant_profile);
	
	
	$list_name_id = $row_result_complainant_profile['list_name_id'];
	$result_complainant_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$list_name_id'"); 
	$row_result_complainant_main_details = sqlsrv_fetch_array($result_complainant_main_details);
	
	$complainant = $row_result_complainant_main_details['name'];
	$alternative_name_complainant = $row_result_complainant_main_details['alternative_name'];
	$accro = $row_result_complainant_main_details['accro'];

	$type_entity_complainant = $row_result_complainant_main_details['type_entity'];
	
	$category_complainant = $row_result_complainant_profile['category'];
	$position_comppainant = $row_result_complainant_profile['position'];

	$type_complainant = $row_result_complainant_profile['type'];
	$email1_complainant = $row_result_complainant_profile['email1'];
	$city_complainant = $row_result_complainant_profile['city'];
	$country_complainant = $row_result_complainant_profile['country'];
	
	$whistleblower_protection = $row_result_complainant_profile["whistleblower_protection"];
	$informant_protection = $row_result_complainant_profile["informant_protection"];

	?>

  <table>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Acronym</th>
                  <th>Country</th>
                  <th width="4%"></th>
                </tr>
                <?php
				$rowId = 0;
                ?>
                        <tr>
                        <td>
						<?php
							if ( $type_entity_complainant != "Person" ){
								$icon = "entity-icon.png";
							}else{
								$icon = "user-silhouette-icon.png"; 
							}
								
							?>
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>

                        <a href="" onclick="return showDialog1('<?php echo $list_name_id ?>')">
							<?php echo $complainant;  ?>
                        </a>
                        <?php    
							
							if ( $alternative_name_complainant != "" ){
								echo "<br />";
								echo "<font size='-1' color='#999999'>";
								echo "( ".$alternative_name_complainant." )";
								echo "</font>";
							}
							?>
                        </td>
                        <td align="center"><?php echo $type_entity_complainant; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country_complainant; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        </td>
                        
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="5" >
                        
                        <table>
                        <tr>
                        <td style="border:none">
                                <strong>Category :</strong>
                                <font color="#993333">
                                <?php echo $category_complainant;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $whistleblower_protection == "Yes" || $informant_protection == "Yes"  ){
									?>
									<img src="images/Protect-Red-icon.png" width="23" height="23" align="top" title="Whistleblower Protection"/>
									<?php
                                }
                                ?>
                                <br />
                                <strong>Type : </strong><?php echo $type_complainant; ?>
                                <br />
                                <?php 
								if ( $type_entity_complainant == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_comppainant; ?>
                                <br /><?php } ?>
                                
                                
                          <table style="border:hidden">
                                <tr><td valign="top">
                                <strong>Linked Entities : </strong>
                                <br />
                                </td><td>

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$list_name_id'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
				</table>
</div> 

<?php

$num_subjects = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_rows = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_rows);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_rows[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_subject_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Subject" ){
		$num_subjects = $num_subjects + 1; 
	}
}

// IF THERE ARE SUBJECTS LINKED, SHOW TABLE
if ( $num_subjects != 0 ){
?>
<br />
<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Subjects (<?php echo $num_subjects; ?>)</strong></td></tr>
</table>

<div id="entities-contain">
  <table>
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%" colspan="2"></th>
                </tr>
                <?php
				$rowId = 100;
				
				
			$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
			$all_rows = sqlsrv_fetchall($result_case_linked);
			$num_rows = count($all_rows);
			
			if ( $num_rows == 0 ){
				
				$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
			
			}else{
				$row_case_number = $all_rows[0];
				$case_linked = $row_case_number['case_number'];
				$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
				
			}
	
                    while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_cms = $row_entity['cms'];
						  $profile_subject_id_linked = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked' AND category = 'Subject'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_category = $row_profile_details['category'];
						  $entity_id_main_details = $row_profile_details['list_name_id'];
						  $position_profile = $row_profile_details['position'];
						  $type_profile = $row_profile_details['type'];
						  $email_profile = $row_profile_details['email1'];
						  
						  
						  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  if ( $profile_category == "Subject" ){
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                        <a href="" onclick="return showDialog1('<?php echo $entity_id_main_details ?>')">
						<?php echo $name;  ?>
                        </a>
                        <?php
						if ( $alternative_name != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        
                        <td align='center'>
                        <?php
						if ( $entity_added_cms == "" ){
						?>

                        <a href="javascript:void(null);" onClick="showDialog(<?php echo $profile_subject_id_linked ?>);">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity profile"/>
                         </a>
                         
                         <div id="dialog-modal" title="Unlink entity?" style="display: none;">
                         <font style="font-size:13px">
                            Do you want to unlink this entity from the allegation?
                           </font>
                         </div>
                         <?php } ?>
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="6" >
                        
                       <table>
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                <br />
                                <strong>Type : </strong><?php echo $type_profile; ?>
                                <br />
                                <?php 
								if ( $type_entity == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_profile; ?>
                                <br />
                                <?php } ?>
                                <table style="border:hidden">
                                <tr><td valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$entity_id_main_details'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                                <br />

                        </td>
                        </tr>

                        </table>
                        </td>
                        </tr>
                        <?php 
						}}
						?>
				</table>
      
</div> 
<?php
}
?>

<?php

$num_witness = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_rows = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_rows);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_rows[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_witness_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_witness_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Witness" ){
		$num_witness = $num_witness + 1; 
	}
}

// IF THERE ARE WITNESS LINKED, SHOW TABLE
if ( $num_witness != 0 ){
?>
<br />
<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Witnesses (<?php echo $num_witness; ?>)</strong></td></tr>
</table>

<div id="entities-contain">


  <table>
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%" colspan="2"></th>
                </tr>
                <?php
					$rowId = 200;
					
					$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
					$all_rows2 = sqlsrv_fetchall($result_case_linked);
					$num_rows = count($all_rows);
					
					if ( $num_rows == 0 ){
						
						$result_entity_witness = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
					}else{
						$row_case_number = $all_rows2[0];
						$case_linked = $row_case_number['case_number'];
						$result_entity_witness = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
						
					}
					
                    while($row_entity_witness = sqlsrv_fetch_array($result_entity_witness))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_cms = $row_entity_witness['cms'];
						  $profile_witness_id_linked = $row_entity_witness['profile_id'];
                          $result_profile_details_witness = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_witness_id_linked'");
                          $row_profile_details_witness = sqlsrv_fetch_array($result_profile_details_witness);
						  
						  $profile_id = $row_profile_details_witness['id'];
						  $profile_category = $row_profile_details_witness['category'];
  						  $witness_protection = $row_profile_details_witness["witness_protection"];
						  $entity_id_main_details = $row_profile_details_witness['list_name_id'];
						  $position_profile = $row_profile_details_witness['position'];
						  $type_profile = $row_profile_details_witness['type'];
						  $email_profile = $row_profile_details_witness['email1'];
						  
						  
						  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  if ( $profile_category == "Witness" ){
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                        <a href="" onclick="return showDialog1('<?php echo $entity_id_main_details ?>')">
						<?php echo $name; ?>
                        </a>
                        <?php
						if ( $alternative_name != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        
                        <td align='center'>
                        <?php
						if ( $entity_added_cms == "" ){
						?>

                        <a href="javascript:void(null);" onClick="showDialog(<?php echo $profile_witness_id_linked ?>);">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity profile"/>
                         </a>
                         
                         <div id="dialog-modal" title="Unlink entity?" style="display: none;">
                         <font style="font-size:13px">
                            Do you want to unlink this entity from the allegation?
                            </font>
                         </div>
                         <?php } ?>
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="6" >
                        
                        <table>
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $witness_protection == "Yes" ){
                                ?>
                                <img src="images/Protect-Blue-icon.png" width="23" height="23" align="top" title="Witness Protection"/>
                            <?php
                                }
                                ?>
                                <br />
                                <strong>Type : </strong><?php echo $type_profile; ?>
                                <br />
                                <?php 
								if ( $type_entity == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_profile; ?>
                                <br />
                                <?php } ?>
                                <table style="border:hidden">
                                <tr><td valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$entity_id_main_details'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                                <br />

                        </td>
                        </tr>

                        </table>
                        </td>
                        </tr>
                        <?php 
						}}
						?>
  </table>
      
</div> 
<?PHP
}
?>
<?php

$num_whistleblowers = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_rows = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_rows);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_rows[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_whistleblower_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_whistleblower_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Whistleblower" ){
		$num_whistleblowers = $num_whistleblowers + 1; 
	}
}

// IF THERE ARE Whistleblowers LINKED, SHOW TABLE
if ( $num_whistleblowers != 0 ){
?>
<br />
<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Whistleblowers (<?php echo $num_whistleblowers; ?>)</strong></td></tr>
</table>


<div id="entities-contain">

<table>
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%" colspan="2"></th>
                </tr>
                <?php
					$rowId = 250;
					
					
					$result_entity_bw = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
				
                    while($row_entity_bw = sqlsrv_fetch_array($result_entity_bw))
                      {
                          $rowId = $rowId + 1;
						  $profile_bw_id_linked = $row_entity_bw['profile_id'];
						  
                          $result_profile_details_bw = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_bw_id_linked'");
                          $row_profile_details_bw = sqlsrv_fetch_array($result_profile_details_bw);
						  $profile_category = $row_profile_details_bw['category'];
  						  $whistleblower_protection = $row_profile_details_bw["whistleblower_protection"];
						  
						  $entity_id_main_details = $row_profile_details_bw['list_name_id'];
						  $position_profile = $row_profile_details_bw['position'];
						  $type_profile = $row_profile_details_bw['type'];
						  $email_profile = $row_profile_details_bw['email1'];
						  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  if ( $profile_category == "Whistleblower" ){
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                        <a href="" onclick="return showDialog1('<?php echo $entity_id_main_details ?>')">
						<?php echo $name; ?>
                        </a>
                        <?php
						if ( $alternative_name != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        
                        <td align='center'>
                        <a href="javascript:void(null);" onClick="showDialog(<?php echo $profile_bw_id_linked ?>);">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity profile"/>
                         </a>
                         
                         <div id="dialog-modal" title="Unlink entity?" style="display: none;">
                         <font style="font-size:13px">
                            Do you want to unlink this entity from the allegation?
                            </font>
                         </div>
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="6" >
                        
                        <table>
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $whistleblower_protection == "Yes" ){
                                ?>
                                <img src="images/Protect-Red-icon.png" width="23" height="23" align="top" title="Whistleblower Protection"/>
                            <?php
                                }
                                ?>
                                <br />
                                <strong>Type : </strong><?php echo $type_profile; ?>
                                <br />
                                <?php 
								if ( $type_entity == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_profile; ?>
                                <br />
                                <?php } ?>
                                <table style="border:hidden">
                                <tr><td valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$entity_id_main_details'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                                <br />

                        </td>
                        </tr>

                        </table>
                        </td>
                        </tr>
                        <?php 
						}}
						?>
  </table>
      
</div> 
<?PHP
}
?>

<?php

$num_reporters = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_rows = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_rows);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_rows[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_reporter_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_reporter_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Reporter" ){
		$num_reporters = $num_reporters + 1; 
	}
}

// IF THERE ARE Whistleblowers LINKED, SHOW TABLE
if ( $num_reporters != 0 ){
?>
<br />
<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Reporters (<?php echo $num_reporters; ?>)</strong></td></tr>
</table>



<div id="entities-contain">

<table>
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%" colspan="2"></th>
                </tr>
                <?php
					$rowId = 275;
					
					
					$result_entity_reporter = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
				
                    while($row_entity_reporter = sqlsrv_fetch_array($result_entity_reporter))
                      {
                          $rowId = $rowId + 1;
						  $profile_reporter_id_linked = $row_entity_reporter['profile_id'];
						  
                          $result_profile_details_reporter = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_reporter_id_linked'");
                          $row_profile_details_reporter = sqlsrv_fetch_array($result_profile_details_reporter);
						  $profile_category = $row_profile_details_reporter['category'];
						  
						  $entity_id_main_details = $row_profile_details_reporter['list_name_id'];
						  $position_profile = $row_profile_details_reporter['position'];
						  $type_profile = $row_profile_details_reporter['type'];
						  $email_profile = $row_profile_details_reporter['email1'];
						  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  if ( $profile_category == "Reporter" ){
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                        <a href="" onclick="return showDialog1('<?php echo $entity_id_main_details ?>')">
						<?php echo $name; ?>
                        </a>
                        <?php
						if ( $alternative_name != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        
                        <td align='center'>
                        <a href="javascript:void(null);" onClick="showDialog(<?php echo $profile_reporter_id_linked ?>);">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity profile"/>
                         </a>
                         
                         <div id="dialog-modal" title="Unlink entity?" style="display: none;">
                         <font style="font-size:13px">
                            Do you want to unlink this Entity from the allegation?
                            </font>
                         </div>
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="6" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <br />
                                <strong>Type : </strong><?php echo $type_profile; ?>
                                <br />
                                <?php 
								if ( $type_entity == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_profile; ?>
                                <br />
                                <?php } ?>
                                <table style="border:hidden">
                                <tr><td valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$entity_id_main_details'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                                <br />

                        </td>
                        </tr>

                        </table>
                        </td>
                        </tr>
                        <?php 
						}}
						?>
  </table>
      
</div> 
<?php
}
?>

<?php

$num_ci = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_rows = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_rows);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_rows[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_ci_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_ci_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Confidential Informant" ){
		$num_ci = $num_ci + 1; 
	}
}

// IF THERE ARE Whistleblowers LINKED, SHOW TABLE
if ( $num_ci != 0 ){
?>
<br />
<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Confidential Informants (<?php echo $num_ci; ?>)</strong></td></tr>
</table>


<div id="entities-contain">

<table>
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%" colspan="2"></th>
                </tr>
                <?php
					$rowId = 300;
					
					$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
					$all_rows = sqlsrv_fetchall($result_case_linked);
					$num_rows = count($all_rows);
					
					if ( $num_rows == 0 ){
						
						$result_entity_informant = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
					}else{
						$row_case_number = $all_rows[0];
						$case_linked = $row_case_number['case_number'];
						$result_entity_informant = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
						
					}
					
                    while($row_entity_informant = sqlsrv_fetch_array($result_entity_informant))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_cms = $row_entity_informant['cms'];
						  $profile_informant_id_linked = $row_entity_informant['profile_id'];
                          $result_profile_details_informant = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_informant_id_linked'");
                          $row_profile_details_informant = sqlsrv_fetch_array($result_profile_details_informant);
						  
						  $profile_category = $row_profile_details_informant['category'];
						  $entity_id_main_details = $row_profile_details_informant['list_name_id'];
						  $position_profile = $row_profile_details_informant['position'];
						  $type_profile = $row_profile_details_informant['type'];
						  $informant_protection = $row_profile_details_informant['informant_protection'];
						  $email_profile = $row_profile_details_informant['email1'];
						  
						  if ( $profile_category == "Confidential Informant" ){
							  
					  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                        <a href="" onclick="return showDialog1('<?php echo $entity_id_main_details ?>')">
						<?php echo $name; ?>
                        </a>
                        <?php
						if ( $alternative_name != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        
                        <td align='center'>
                        <?php
						if ( $entity_added_cms == "" ){
						?>

                        <a href="javascript:void(null);" onClick="showDialog(<?php echo $profile_informant_id_linked ?>);">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity profile"/>
                         </a>
                         
                         <div id="dialog-modal" title="Unlink entity?" style="display: none;">
                         <font style="font-size:13px">
                            Do you want to unlink this entity from the allegation?
                           </font>
                         </div>
                         <?php } ?>
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="6" >
                        
                        <table>
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $informant_protection == "Yes" ){
                                ?>
                                <img src="images/Protect-Green-icon.png" width="23" height="23" align="top" title="Confidential Informant"/>
	                            <?php
                                }
								?>
                                <br />
                                <strong>Type : </strong><?php echo $type_profile; ?>
                                <br />
                                <?php 
								if ( $type_entity == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_profile; ?>
                                <br />
                                <?php } ?>
                                <table style="border:hidden">
                                <tr><td valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$entity_id_main_details'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                                <br />

                        </td>
                        </tr>

                        </table>
                        </td>
                        </tr>
                        <?php 
						}}
						?>
  </table>
      
</div> 
<?php
}
?>



<?php

$num_other = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_rows3 = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_rows3);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_rows3[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_other_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_other_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Other" ){
		$num_other = $num_other + 1; 
	}
}

// IF THERE ARE OTHER LINKED, SHOW TABLE
if ( $num_other != 0 ){
?>
<br />
<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Other (<?php echo $num_other; ?>)</strong></td></tr>
</table>

<div id="entities-contain">

<table>
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%" colspan="2"></th>
                </tr>
                <?php
					$rowId = 400;
					
					$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
					$all_rows = sqlsrv_fetchall($result_case_linked);
					$num_rows = count($all_rows);
					
					if ( $num_rows == 0 ){
						
						$result_entity_other = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
					}else{
						$row_case_number = $all_rows[0];
						$case_linked = $row_case_number['case_number'];
						$result_entity_other = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
						
					}
					
                    while($row_entity_informant = sqlsrv_fetch_array($result_entity_other))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_cms = $row_entity_informant['cms'];
						  $profile_other_id_linked = $row_entity_informant['profile_id'];
                          $result_profile_details_informant = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_other_id_linked'");
                          $row_profile_details_informant = sqlsrv_fetch_array($result_profile_details_informant);
						  
						  $profile_category = $row_profile_details_informant['category'];
						  $entity_id_main_details = $row_profile_details_informant['list_name_id'];
						  $position_profile = $row_profile_details_informant['position'];
						  $type_profile = $row_profile_details_informant['type'];
						  $email_profile = $row_profile_details_informant['email1'];
						  
						  if ( $profile_category == "Other" ){
							  
					  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                        <a href="" onclick="return showDialog1('<?php echo $entity_id_main_details ?>')">
						<?php echo $name; ?>
                        </a>
                        <?php
						if ( $alternative_name != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        
                        <td align='center'>
                        <?php
						if ( $entity_added_cms == "" ){
						?>

                        <a href="javascript:void(null);" onClick="showDialog(<?php echo $profile_other_id_linked ?>);">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity profile"/>
                         </a>
                         
                         <div id="dialog-modal" title="Unlink entity?" style="display: none;">
                         <font style="font-size:13px">
                            Do you want to unlink this entity from the allegation?
                            </font>
                         </div>
                         <?php } ?>
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="6" >
                        
                        <table>
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                <br />
                                <strong>Type : </strong><?php echo $type_profile; ?>
                                <br />
                                <?php 
								if ( $type_entity == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_profile; ?>
                                <br />
                                <?php } ?>
                                <table style="border:hidden">
                                <tr><td valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$entity_id_main_details'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                                <br />
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        <?php 
						}}
						?>
  </table>
 
 
 
 
      
</div>
<?php
}
?>
    <div id="divIdenentitydetails" title="Entity Details">
        <iframe id="modalIframeentitydetails" frameborder="0" width="1185" height="850">
        Your browser is not supported
        </iframe>
	</div>
    
    
    
<div id="divIdnewentity" title="Add new Entity">
<form name="new_entity_link_allegation" id="new_entity_link_allegation" action="save_new_entity_link_to_allegation.php" method="post" enctype="multipart/form-data"> 
 <table border="0" align="center" class="gridtable">
              <tr>
                <td align="right"><strong><font color="#CC0000">* Entity Type :</font></strong></td>
                <td colspan="5">
                
                <select name="type_entity" id="type_entity" class="text ui-widget-content ui-corner-all">
                  <option></option>
                  <option>Person</option>
                  <option>Organization</option>
                </select></td>
              </tr>
              <tr>
                <td align="right"><p><strong><font color="#CC0000">* Name :</font></strong></p></td>
                <td colspan="5"><input name="name_entity" id="name_entity" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Alt. name :</strong></td>
                <td colspan="5" valign="top"><input name="alternative_name" id="alternative_name" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Acronym :</strong></td>
                <td valign="top"><input name="acro" id="acro" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>&nbsp;&nbsp;Nationality / Country based :</strong></td>
                <td align="right" valign="top"><select name="head_country" id="head_country" class="text ui-widget-content ui-corner-all">
                  <option></option>
                  <?php
					  $result2 = sqlsrv_query($conncss,"SELECT * FROM countries ORDER BY country ASC"); 
                      while($row2 = sqlsrv_fetch_array($result2)){
						  $country = $row2['country'];
						  echo "<option value ='$country'>$country</option>";
                      }
					  ?>
                </select></td>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="head_city" id="head_city" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
 </table> 

<table width="95%" border="0" align="left" class="gridtable">
              <tr>
                <td colspan="5" align="left" valign="baseline"><img src="images/profile-icon.png" width="15" height="15" align="top"/>&nbsp;Log</td>
              </tr>
               
               <tr>
                <td colspan="5" align="right" valign="top"><hr /></td>
              </tr>
              <tr>
                <td align="right" valign="middle"><strong><font color="#CC0000">* Category :</font></strong></td>
                <td align="center" valign="middle">
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
                <td align="left" valign="middle"><div class="row">
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
                <td colspan="4" valign="top"><input id="position" name="position" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
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
                <td valign="top"><input name="home_phone_number" id="home_phone_number" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 1 :</strong></td>
                <td colspan="2" valign="top"><input name="email1" id="email1" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Office phone number :</strong></td>
                <td valign="top"><input name="office_phone_number" id="office_phone_number" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 2 :</strong></td>
                <td colspan="2" valign="top"><input name="email2" id="email2" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Mobile :</strong></td>
                <td valign="top"><input name="mobile" id="mobile" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Skype :</strong></td>
                <td colspan="2" valign="top"><input name="skype" id="skype" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Fax :</strong></td>
                <td valign="top"><input name="fax" id="fax" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Web :</strong></td>
                <td colspan="4" valign="top"><input name="web_page" id="web_page" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td rowspan="2" align="right" valign="top"><strong>Address :</strong></td>
                <td colspan="2" rowspan="2" valign="top"><textarea name="address" id="address" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ></textarea></td>
                <td align="right" valign="top"><strong>Post code :</strong></td>
                <td valign="top"><input name="post_code" id="post_code" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="city" id="city" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
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
                <td align="right" valign="top"><strong>Notes :</strong></td>
                <td colspan="4" valign="top"><textarea name="notes" id="notes" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none"></textarea></td>
              </tr>
    </table>  
  </form>
</div>


<div id="new-entity-interest-form" title="Link Entity to Allegation">
         <iframe name="iframedetails_links" id="iframedetails_links" src="search_entity_to_link.php" width="100%" height="100%" style="padding:1px;border:0px;">
  </iframe>
</div>
<?php
	if ( isset ($_GET['new_entity'])) {
		echo "<script>alert('New Entity has been saved and linked to this Allegation')</script>";
	}
?>
</body>
</html>