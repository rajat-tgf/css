<?php
	
	require_once("includes\\opendb.php");
	$ir_report = $_GET['ir_report'];
	session_start();
	$username = $_SESSION['username'];
	$sql_read_comments = "UPDATE comments_ir SET read_notification = 'yes' WHERE ir_report = '$ir_report' AND read_notification != 'yes' AND member = '$username'";
	$result_read_comments = sqlsrv_query($conncss,$sql_read_comments);
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>




<?php
 $result_comment = sqlsrv_query($conncss,"SELECT * FROM comments_ir WHERE ir_report = '$ir_report' ORDER BY id DESC");
					while($comment = sqlsrv_fetch_array($result_comment))  {       
					
                     ?>
                        <table>
                        <tr>
                        <td valign="top">
                        <img src="images/icon_person.png" alt="" width="25" height="25" align="top"/>
                        </td>
                        <td>
                         <strong>
                             <?php
							 if ($date = $comment['request_notification'] == 'yes' ){ ?>
                             <img src="images/notification-icon-tm-128.png" title="Notification requested" width="18" height="18" align="top"/>&nbsp; 
                             <?php } ?>
								<?php $date = $comment['date_comment'] ?> 
                                <?php echo $comment['author'] ?> <span>made a comment on </span><span><?php echo $date_newDate = date('F j, Y', strtotime($date)); ?></span></strong>
                                <p><?php echo $comment = nl2br($comment['comment'])?></p>

                          </td>
		                  </tr>
                          </table>
                  <br />
                    <?php }?>
       


</body>
</html>