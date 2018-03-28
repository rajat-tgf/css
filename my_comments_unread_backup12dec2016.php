<?php

require_once("includes\\opendb.php");

session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");  // Redirecting To Home Page
}
$username = $_SESSION['username'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

<script type="text/javascript">
	function showDialog(allegation_id){
	
	   $("#divIdal").dialog("open");
	   $("#modalIframeIdal").attr("src","details_sr.php?allegation_id=" + allegation_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdal").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 940,
			   resizable: false,
			   draggable: false,
			   

		  });
	});
</script>


        <script type="text/javascript">
			function refresh_menu (){
				window.parent.frames["side_menu"].location.reload();
			}
		</script>


</head>


<body>
<?php include("menu_list.php"); ?>
<br />
  
<div id="entities-contain" align="center">
<table>
<tr><td colspan="5"><strong><font color="#464646"; size="+1">My unread comments</font></strong></td></tr>
                <tr>
                  <th width="99" align="center"> Allegation #</th>
                  <th width="178">Date comment made</th>
                  <th width="669">Comment</th>
                  <th colspan="2"><strong>Author</strong></th>
  </tr>
                        
<?php


					$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM comments WHERE member = '$username' AND read_notification != 'yes' ORDER BY date_comment DESC");
					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $allegation_id = $row_follow_up['allegation_id'];	  ?>
						 <tr>
						<td>
                        	<a href='allegation_details.php?id=<?php echo $allegation_id; ?>' target="_parent">
							<?php
                            echo $allegation_id;
                            ?>
                            </a>
							</td>
                            <td align="center">
                            
                            <?php $date_comment = $row_follow_up['date_comment'];
							echo $date_comment_newDate = date("F j, Y", strtotime($date_comment)); ?>

							</td>

                            <td>
                            <?php echo $comment = $row_follow_up['comment']; ?>


							</td>
							
							<td width="151">
                            <?php echo $user = $row_follow_up['author']; ?>
							</td>
                            
                            <td width="53" align="center">
                            <img src="images/marked-done-128.png" width="21" height="24" align="absbottom" title="Mark as read" value="<?php echo $row_follow_up['id']; ?>" onclick="mark_read(<?php echo $row_follow_up['id']; ?>);" />
                           
                           
                           
<script language="JavaScript" type="text/javascript">
function mark_read(comment_id)
{
	if (confirm("Mark this comment as read?"))
	{
		window.location.href = 'my_comments_unread.php?mark_read=' + comment_id;
	}
}
</script>

<?php
	if ( isset ($_GET['mark_read'])) {
		$id_comment = $_GET['mark_read'];	
		$sql = "UPDATE comments SET read_notification = 'yes' WHERE id = $id_comment";
		$result = sqlsrv_query($conncss,$sql);
		?>
        <script>refresh_menu();
		window.location.href = "my_comments_unread.php";
		</script>
        <?php
	}

      ?>     
      <a onclick="return showDialog(<?php echo $allegation_id ?>)">
    		<img src="images/document-icon-sr.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
        </a>                 
                            
							</td>
						
 
  							</tr>

						<?php }?>
</table>
</div>
		

    <div id="divIdal" title="Screening Report Details">
        <iframe id="modalIframeIdal" frameborder="0" width="920" height="850">
        Your browser is not supported
        </iframe>
	</div>
</body>
</html>