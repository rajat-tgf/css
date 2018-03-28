<?php
require_once("includes\security.php");
$Security->GoSecure();
$report_id = $_SESSION['report_id'];
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
						alert ("Entity has been linked to the Intelligence Report");
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
                "Save new entity and link it to this Intelligence Report" : function() {
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


<table width="100%">
<tr>
<td align="right">

<a style="text-decoration:none" href="#" id="link_entity_interest"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Entity</a>



</td>
</tr>
</table>

<div id="new-entity-interest-form" title="Link entity to Intelligence Report">
       <iframe name="iframedetails_links" id="iframedetails_links" src="search_entity_to_link_to_ir.php" width="100%" height="100%" style="padding:1px;border:0px;">
       </iframe>
</div> 




<?php

$num_subjects = 0;
	
$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_intel_reports WHERE report_id = '$report_id'");

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
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_intel_reports WHERE report_id = '$report_id'");
        while($row_entity = sqlsrv_fetch_array($result_entity))
          {
              $rowId = $rowId + 1;
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

    
                <a href="javascript:void(null);" onClick="showDialog(<?php echo $profile_subject_id_linked ?>);">
                 <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity profile"/>
                 </a>
                 
                 <div id="dialog-modal" title="Unlink entity?" style="display: none;">
                 <font style="font-size:13px">
                    Do you want to unlink this entity from the Intelligence Report?
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
                  </td></tr>
                  </table>
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
	if ( isset ($_GET['new_entity'])) {
		echo "<script>alert('New Entity has been saved and linked o the allegation')</script>";
	}
?>
</body>
</html>