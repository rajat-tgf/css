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
      <a onclick="return parent.showDialog(<?php echo $allegation_id ?>)">
    		<img src="images/document-icon-sr.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
        </a>                 
                            
							</td>
						
 
  							</tr>

						<?php }?>
                        
                        
<?php


					$result_comments_report = sqlsrv_query($conncss,"SELECT * FROM comments_ir WHERE member = '$username' AND read_notification != 'yes' ORDER BY date_comment DESC");
					while($row_comments_report = sqlsrv_fetch_array($result_comments_report))
					  {
						  $ir_report = $row_comments_report['ir_report'];	  ?>
						 <tr>
						<td>
                        	<a href='intelligence_report_details.php?id_report=<?php echo $ir_report; ?>' target="_parent">
							IR<?php echo $ir_report; ?>
                            </a>
							</td>
                            <td align="center">
                            
                            <?php $date_comment = $row_comments_report['date_comment'];
							echo $date_comment_newDate = date("F j, Y", strtotime($date_comment)); ?>

							</td>

                            <td>
                            <?php echo $comment = $row_comments_report['comment']; ?>


							</td>
							
							<td width="151">
                            <?php echo $user = $row_comments_report['author']; ?>
							</td>
                            
                            <td width="53" align="center">
                            <img src="images/marked-done-128.png" width="21" height="24" align="absbottom" title="Mark as read" value="<?php echo $row_comments_report['id']; ?>" onclick="mark_read_ir(<?php echo $row_comments_report['id']; ?>);" />
                           
                           
                           
<script language="JavaScript" type="text/javascript">
function mark_read_ir(comment_id)
{
	if (confirm("Mark this comment as read?"))
	{
		window.location.href = 'my_comments_unread.php?mark_read_ir=' + comment_id;
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
	
	
		if ( isset ($_GET['mark_read_ir'])) {
		$id_comment = $_GET['mark_read_ir'];	
		$sql = "UPDATE comments_ir SET read_notification = 'yes' WHERE id = $id_comment";
		$result = sqlsrv_query($conncss,$sql);
		?>
        <script>refresh_menu();
		window.location.href = "my_comments_unread.php";
		</script>
        <?php
	}
	

      ?>     
      <a onclick="return parent.showDialogir(<?php echo $ir_report ?>)">
    		<img src="images/ir.png" width="24" height="24" align="absmiddle" title="Quick view Intelligence Report"/>
        </a>                 
                            
        </td>
        </tr>
    <?php }?>                        
                        
                        
</table>
</div>

</body>
</html>