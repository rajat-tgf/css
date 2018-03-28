<?php
require_once("includes\security.php");
$Security->GoSecure();
$id_report = $_SESSION['report_id'];
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
						$( "#iframedetails_link_allegation").contents().find("#link_allegation_to_ir").submit();
						alert ("Allegation has been linked");
						window.top.location.reload("allegation_details.php?tabs=#tabs-3");
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









</head>

<body>

<table width="100%">
<tr>
<td align="right">

<a style="text-decoration:none" href="#" id="link_allegation"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Allegation</a>

</td>
</tr>
</table>


<div id="new-link-allegation-form" title="Link Allegation to Intelligence Report">
         <iframe name="iframedetails_link_allegation" id="iframedetails_link_allegation" src="search_allegation_to_link_to_ir.php" width="100%" height="100%" style="padding:1px;border:0px;">
        </iframe>
</div>
<?php
	$result_allegation_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_ir_links WHERE ir_id = '$id_report'");
	$all_rows = sqlsrv_fetchall($result_allegation_linked);
	$num_rows = count($all_rows);
?>

<div id="entities-contain">
  <table>
                <tr>
                  <th align="center" valign="middle">Id</th>
                      <th align="center" valign="middle">Country</th>
                      <th align="center" valign="middle">Title</th>
                      <th align="center" valign="middle">Status</th>
                      <th align="center" valign="middle">Resolution</th>
                  		<th align="center" valign="middle"></th>
                </tr>
<?php						
	
                    foreach($all_rows as $row_proactive_)
                      {
                          
						  $allegation_linked = $row_proactive_['allegation_id'];

                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$allegation_linked'");
                          $row_allegation_linked_details = sqlsrv_fetch_array($result_profile_details);
						  
						  
						  $country = $row_allegation_linked_details['country'];
						  $summary = $row_allegation_linked_details['summary'];
						  $status = $row_allegation_linked_details['status'];
						  $resolution = $row_allegation_linked_details['resolution'];
						  
						 ?>
                        <td align="center"><strong>
						<a onclick="return parent.show_sr_Popup(<?php echo $allegation_linked ?>)">
						<?php echo $allegation_linked; ?>
                        </a>
                        </strong></td>
                        
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $summary; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="center"><?php echo $resolution; ?></td>
                         <td align="center">
                        
                        <a href="unlink_allegation_from_ir.php?allegation_id=<?php echo $allegation_linked ?>">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink allegation"/>
                         </a>
                        
                        </td>
                       
                       
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div> 


</body>
</html>