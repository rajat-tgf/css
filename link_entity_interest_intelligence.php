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

<style>
	div#entities-contain { width: 100%; margin: 5px 0; alignment-adjust:central; }
	div#entities-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; alignment-adjust:central; }
	div#entities-contain table td { border: 1px solid #DBE5F1; padding: .1em 2px; text-align: left; font-size:12px; color:#000000 }
	div#entities-contain table th { border: 1px solid #DBE5F1; padding: .1em 2px; text-align: left; background:#F2F2F2; font-style:normal; color:#666666; font-size:12px; }
	div#entities-contain table fieldset { border:1px solid green; }
	hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }

</style>

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
					$( "#link_entity_interest" )
					.button()
					.click(function() {
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

 
<style type="text/css">
table.gridtabletitle {
font-size:11px;
color:#EFEFEF;

}
table.gridtabletitle th {
font-size:13px;
border-width: 1px;
color:#06C;
padding: 3px;
border-color: #666;
border-spacing:2px;

}
</style>

</head>

<body>

<table width="1400">
<tr>
<td align="right">
<button id="link_entity_interest" title="Link entity"><img src="images/link-add-icon1.png" width="25" height="19" align="middle"/></button>
</td>
</tr>
</table>


<div id="new-entity-interest-form" title="Link Entity to Allegation">

         <iframe name="iframedetails_links" id="iframedetails_links" src="search_entity_to_link.php" width="100%" height="100%" style="padding:1px;border:0px;">

        </iframe>




</div>








<div id="entities-contain">


  <table id="entities-contain">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="10%" colspan="2"></th>
                </tr>
                <?php
				$result_linked = sqlsrv_query($conncss,"SELECT * FROM entities_intel_reports WHERE report_id = '$id'");
				$all_rows = sqlsrv_fetchall($result_case_linked);
				$num_rows = count($all_rows);
				
				while($row = sqlsrv_fetch_array($result_linked))
				{
					$rowId = $rowId + 1;
					$entity_id = $row_entity['entity_id'];
					$result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id'");
				
								
					      
						  
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
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

                        </table>
                        </td>
                        </tr>

  </table>
      
</div> 

    <div id="divIdenentitydetails" title="Entity Details">
        <iframe id="modalIframeentitydetails" frameborder="0" width="1185" height="850">
        Your browser is not supported
        </iframe>
	</div>


</body>
</html>