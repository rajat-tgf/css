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

<script>
		$(function() {
			
			$( "#new-link-allegation-form" ).dialog({
			autoOpen: false,
			position: ['top', 5],
			draggable: false,
			resizable: false,
			height: 430,
			width: 1200,
			modal: true,
			
			buttons: {
			"Close": function() {
				
					$( this ).dialog( "close" );
		
					},
					
					Link: function() {
						$( "#iframedetails_links_proactive").contents().find("#link_allegation_proactive").submit();
						alert ("Allegation has been linked");
						window.top.location.reload("allegation_details.php?tabs=#tabs-5");
					},
					
					},
					close: function() {
					}
					});
					$( "#link_allegation" ).click(function() {
						$( "#new-link-allegation-form" ).dialog( "open" );
					});

		});
</script>







<script type="text/javascript">
	function showDialog_unlink_allegation(allegation_id)
	{
		var allegation_id = allegation_id;
		

		$("#dialog-modal-unlink-allegation").dialog(
			{
				width: 400,
				height: 200,
				buttons: {
						"Unlink": function() {
							
							$.post("unlink_allegation_proactive.php", {"allegation_id": allegation_id});
							alert ("Allegation has been unlinked");
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


</head>

<body>

<table width="100%">
<tr>
<td align="right">

<a style="text-decoration:none" href="#" id="link_allegation"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Allegation</a>

</td>
</tr>
</table>


<div id="new-link-allegation-form" title="Link Allegation">

         <iframe name="iframedetails_links_proactive" id="iframedetails_links_proactive" src="search_allegation_to_link.php" width="100%" height="100%" style="padding:1px;border:0px;">

        </iframe>




</div>
<?php
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM proactive_link WHERE id = '$id'");
	$all_rows = sqlsrv_fetchall($result_proactive_linked);
	$num_rows = count($all_rows);
?>
<table width="100%" class="gridtablefilter">
<tr><td align="left">
  <strong><?php echo $num_rows ?> Allegation(s) linked</strong></td></tr>
</table>


<div id="entities-contain">
  <table>
                <tr>
                  <th align="center" valign="middle">#</th>
                      <th align="center" valign="middle">Country</th>
                      <th align="center" valign="middle">Title</th>
                      
                      <th align="center" valign="middle">Status</th>
                      <th align="center" valign="middle">Resolution</th>
                  <th colspan="2" align="center" valign="middle"></th>
                </tr>
<?php						
	
                    foreach($all_rows as $row_proactive_)
                      {
                          
						  $allegation_linked = $row_proactive_['linked_to'];

                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$allegation_linked'");
                          $row_allegation_linked_details = sqlsrv_fetch_array($result_profile_details);
						  
						  
						  $country = $row_allegation_linked_details['country'];
						  $summary = $row_allegation_linked_details['summary'];
						  $status = $row_allegation_linked_details['status'];
						  $resolution = $row_allegation_linked_details['resolution'];
						  
						 ?>
                        <td align="center"><strong><?php echo $allegation_linked; ?></strong></td>
                        
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $summary; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="center"><?php echo $resolution; ?></td>
                        <td align="center">
						<a onclick="return showDialogsr(<?php echo $allegation_linked ?>)">
                           <img src="images/document-icon-sr.png" width="21" height="21" align="absmiddle" title="Quick view Screening Report"/>
                        </a>
                        </td>
                         <td align="center">
						<a href="javascript:void(null);" onClick="showDialog_unlink_allegation(<?php echo $allegation_linked ?>);">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink allegation"/>
                         </a>
                         <div id="dialog-modal-unlink-allegation" title="Unlink allegation?" style="display: none;">
                            <font style="font-size:13px">
                            Do you want to unlink this allegation?
                            </font>
                         </div>
                        </td>
                       
                       
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div> 


</body>
</html>