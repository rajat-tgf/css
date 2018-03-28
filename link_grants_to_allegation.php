<?php
require_once("includes\security.php");
$id = $_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

<script>
		$(function() {
			
			$( "#new-link-grant-form" ).dialog({
			autoOpen: false,
			position: ['top', 5],
			draggable: false,
			resizable: false,
			height: 350,
			width: '85%',
			modal: true,
			
			buttons: {
			"Close": function() {
				
					$( this ).dialog( "close" );
		
					},
					
					Link: function() {
						$( "#iframedetails_links_grant").contents().find("#link_grant_to_allegation").submit();
						alert("Grant has been linked");
						window.location.reload();
					},
					
					},
					close: function() {
					}
					});
					$( "#link_grant").click(function() {
						$( "#new-link-grant-form" ).dialog( "open" );
					});

		});
</script> 


</head>

<body>




<div id="new-link-grant-form" title="Link Grant">
    <iframe name="iframedetails_links_grant" id="iframedetails_links_grant" src="search_grant_to_link.php" width="100%" height="100%" style="padding:1px;border:0px;">
    </iframe>
</div>
<?php
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_grant_links WHERE allegation_id = '$id'");
	$all_rows = sqlsrv_fetchall($result_proactive_linked);
	$num_rows = count($all_rows);
?>

<div id="entities-contain">
  <table>
                <tr>
                  <th>Grant Number</th>
                  <th>Title</th>
                  <th></th>
                </tr>
				<?php						
                foreach($all_rows as $row) {
						$id_grant = $row['id_grant'];
						$grant_number = $row['grant_number'];
						$result_grant_details = sqlsrv_query($conn,"SELECT grant_title FROM grant_data WHERE grant_number = '$grant_number'");	
						$row_details = sqlsrv_fetch_array($result_grant_details);
						
				  	  ?>
						 <tr>
	                         <td>
                            <a href="#" onclick="parent.show_grant_details_Popup('<?php echo $grant_number ?>')">
							<?php 
							echo $grant_number; ?>
                            </a>
							</td>
                             <td>
							<?php echo $grant_title = $row_details['grant_title']; ?>
							</td>
	                         
                         <td align="center" width="2%">
                         
                             <a href="unlink_grant_allegation.php?id_grant=<?php echo $id_grant ?>">
                              <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Grant"/>
                             </a>
                        </td>
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div>
<table width="100%">
<tr>
<td align="left">
<a style="text-decoration:none" href="#" id="link_grant"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Grant</a>
</td>
</tr>
</table>

</body>
</html>