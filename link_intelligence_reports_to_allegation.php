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
			
			$( "#new-link-ir-form" ).dialog({
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
						$( "#iframedetails_links_ir").contents().find("#link_ir_to_allegation").submit();
						alert ("Intelligence Report has been linked");
						window.top.location.reload("allegation_details.php?tabs=#tabs-3");
					},
					
					},
					close: function() {
					}
					});
					$( "#link_ir" ).click(function() {
						$( "#new-link-ir-form" ).dialog( "open" );
					});

		});
</script>







<script type="text/javascript">
	function showDialog_unlink_ir(id_report)
	{
		var id_report = id_report;
		

		$("#dialog-modal-unlink-ir").dialog(
			{
				width: 400,
				height: 200,
				buttons: {
						"Unlink": function() {
							$.post("unlink_ir.php", {"id_report": id_report});
							alert ("Intelligence Report has been unlinked");
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

<a style="text-decoration:none" href="#" id="link_ir"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Intelligence Report</a>

</td>
</tr>
</table>


<div id="new-link-ir-form" title="Link Intelligence Report">

         <iframe name="iframedetails_links_ir" id="iframedetails_links_ir" src="search_ir_to_link.php" width="100%" height="100%" style="padding:1px;border:0px;">

        </iframe>




</div>
<?php
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_ir_links WHERE allegation_id = '$id'");
	$all_rows = sqlsrv_fetchall($result_proactive_linked);
	$num_rows = count($all_rows);
?>

<div id="entities-contain">
  <table >
                <tr>
                  <th>Id</th>
                  <th>Country</th>
                  <th align="center">Reporter</th>
                  <th align="center"><strong>Title</strong></th>
                  <th><strong>Status</strong></th>
                  <th><strong>Date recieved</strong></th>
                  <th></th>
                </tr>
				<?php						
                foreach($all_rows as $row) {
						$id_report = $row['ir_id'];
						
						$result_ir_details = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE id = '$id_report'");	
						$all_rows_ir = sqlsrv_fetchall($result_ir_details);
						$row_ir = $all_rows_ir[0];
				  	  ?>
						 <tr>
	                         <td>
                             <a onclick="return parent.show_ir_Popup(<?php echo $id_report ?> )">
							<?php 
							$dash = "IR";
							echo $dash.$id_report; ?>
                            </a>
							</td>
                             <td>
							<?php echo $country = $row_ir['country']; ?>
							</td>
	                         <td align="left"><?php 
							 
							 echo $reporter = $row_ir['reporter']; 
							 
							 ?></td>
							<td align="center">
                            
                            <?php echo $title = $row_ir['title']; ?>

							</td>
                            <td align="center">
                            <?php echo $status = $row_ir['status']; ?>
							</td>
                           <td align="center">
                            <?php $date_received = $row_ir['date_received']; 
							echo $date_received = date('F j, Y', strtotime($date_received));
							?>
							</td>
                         <td align="center">
                       
                        <a href="unlink_ir.php?id_report=<?php echo $id_report ?>">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Intelligence Report"/>
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