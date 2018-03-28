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

</head>

<body>
<?php include("menu_list.php"); ?>
<br />
<div id="entities-contain" align="center">
<table>
<tr>
  <td colspan="5"><strong><font color="#464646"; size="+1">My read comments</font></strong></td></tr>

                <tr>
                  <th width="99" align="center"> Allegation #</th>
                  <th width="178">Date comment made</th>
                  <th width="669">Comment</th>
                  <th colspan="2"><strong>Author</strong></th>
  </tr>
                        
<?php


					$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM comments WHERE member = '$username' AND read_notification = 'yes' ORDER BY date_comment DESC");
					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $allegation_id = $row_follow_up['allegation_id'];	  ?>
						 <tr>
						<td>
                        <a href='allegation_details.php?id=<?php echo $allegation_id; ?>' target="_parent">
						<?php echo $allegation_id; ?>
                            </a>
							</td>
                            <td align="center">
                            
                            <?php $date_comment = $row_follow_up['date_comment'];
							echo $date_comment_newDate = date("F j, Y", strtotime($date_comment)); ?>

							</td>

                            <td>
                            <?php echo $comment = $row_follow_up['comment']; ?>


							</td>
							
							<td width="120">
                            <?php echo $user = $row_follow_up['author']; ?>
							</td>
                            
                            
                            <td width="31">
                            <a onclick="return parent.showDialog(<?php echo $allegation_id ?>)">
                            <img src="images/document-icon-sr.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
                            </a> 
                            </td>			
 
  							</tr>

						<?php }
                        
                        $result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM comments_ir WHERE member = '$username' AND read_notification = 'yes' ORDER BY date_comment DESC");
					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $ir_report = $row_follow_up['ir_report'];	  ?>
						 <tr>
						<td>
                       <a href='intelligence_report_details.php?id_report=<?php echo $ir_report; ?>' target="_parent">
							IR<?php echo $ir_report; ?>
                            </a>
							</td>
                            <td align="center">
                            
                            <?php $date_comment = $row_follow_up['date_comment'];
							echo $date_comment_newDate = date("F j, Y", strtotime($date_comment)); ?>

							</td>

                            <td>
                            <?php echo $comment = $row_follow_up['comment']; ?>


							</td>
							
							<td width="120">
                            <?php echo $user = $row_follow_up['author']; ?>
							</td>
                            
                            
                            <td width="31">
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