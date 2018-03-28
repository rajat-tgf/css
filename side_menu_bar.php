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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<link href="css/app10.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>
<style>
input
{
	font-family: 'century gothic', arial, sans-serif;
	width:auto;
	padding: 4px;
	font-size:13px;
}
</style>
</head>

<body>

<div id="contentWrapper">

    <div id="contentLeft">

        <ul id="leftNavigation" style="font-family:'century gothic', arial, sans-serif;">
<table width="237" border="0" align="center">
  <tr>
    <td align="right">
    <a href="#" onclick="javascript:window.location.reload();" target="_SELF"><img src="images/reload.png" width="20" height="20" align="absbottom" title="Refresh" /></a></td>
  </tr>
</table>
          <li class="clickable">
                <a href="right_page.php" target="contentRight"><img src="images/dashboard1.png" width="25" height="25" align="absbottom" />&nbsp;&nbsp;Dashboard</a>

          </li>
            <li>
                <a href="#">My Screening / Asessment
                <font color="#990000">(<?php
                      $result_number_allegations = sqlsrv_query($conncss,"select id from allegation_details WHERE team_member = '$username' AND status != 'Closed'", array(), array( "Scrollable" => 'buffered'));
                        echo $num_allegations = sqlsrv_num_rows($result_number_allegations);
                    ?>)</font>
                
                </a>
                <ul>
                    <li>
                        <a href="my_active.php" target="contentRight"><img src="images/status.png" width="18" height="18" align="absbottom" />&nbsp;Active
                        <font color="#990000">(<?php
                      $result_number_allegations = sqlsrv_query($conncss,"select id from allegation_details WHERE team_member = '$username' AND status != 'Closed'", array(), array( "Scrollable" => 'buffered'));
                        echo $num_allegations = sqlsrv_num_rows($result_number_allegations);
                    ?>)</font>
                        </a>
                    </li>
                    <li>
                        <a href="my_closed.php" target="contentRight"><img src="images/grid-dot-icon.png" width="18" height="18" align="absbottom" />&nbsp;Closed
                        <font color="#333333">(<?php
                      $result_number_allegations = sqlsrv_query($conncss,"select id from allegation_details WHERE team_member = '$username' AND status = 'Closed'", array(), array( "Scrollable" => 'buffered'));
                        echo $num_allegations = sqlsrv_num_rows($result_number_allegations);
                    ?>)</font>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">My Follow ups&nbsp;
                <font color="#990000">(<?php
                      $result_number_followups_active = sqlsrv_query($conncss,"SELECT id FROM follow_ups WHERE member = '$username' AND (status = 'In Progress' OR status = 'Partially implemented / In Progress')", array(), array( "Scrollable" => 'buffered'));
                        echo $num_follow_up_active = sqlsrv_num_rows($result_number_followups_active);
                    ?>)</font>
                
                </a>
                <ul>
                    <li>
                        <a href="my_active_follow_ups.php" target="contentRight"><img src="images/status.png" width="18" height="18" align="absbottom" />&nbsp;In Progress
                        <font color="#990000">(<?php echo $num_follow_up_active; ?>)</font></a>
                    </li>
                    <li>
                        <a href="my_closed_follow_up.php" target="contentRight"><img src="images/grid-dot-icon.png" width="18" height="18" align="absbottom" />&nbsp;Closed
                        <font color="#333333">(<?php 
						$result_number_followups_closed = sqlsrv_query($conncss,"select id from follow_ups WHERE member = '$username' AND (status = 'Implemented' OR status = 'No longer applicable')", array(), array( "Scrollable" => 'buffered'));
						echo $num_follow_up_closed = sqlsrv_num_rows($result_number_followups_closed); ?>)</font></a>
                    </li>

                </ul>
            </li>
            <li>
            <?php 
						$result_unread = sqlsrv_query($conncss,"SELECT id FROM comments WHERE member = '$username' AND read_notification != 'yes'", array(), array( "Scrollable" => 'buffered'));
						$num_unread_sr = sqlsrv_num_rows($result_unread);
                        
                        $result_unread = sqlsrv_query($conncss,"SELECT id FROM comments_ir WHERE member = '$username' AND read_notification != 'yes'", array(), array( "Scrollable" => 'buffered'));
						$num_unread_ir = sqlsrv_num_rows($result_unread); ?>
                        
                <a href="#">Comments&nbsp;
                <font color="#990000">(<?php echo $num_unread_sr +$num_unread_ir; ?>)</font>
                </a>
                <ul>
                <li>
                     <a href="my_comments_unread.php" target="contentRight"><img src="images/unread.png" width="25" height="25" align="absbottom" />&nbsp;Unread
                     <font color="#990000">(<?php 
						echo $num_unread_sr +$num_unread_ir; ?>)</font>
                     </a>
                  </li>
                    <li>
                    <?php 
						$result_unread = sqlsrv_query($conncss,"SELECT id FROM comments WHERE member = '$username' AND read_notification = 'yes'", array(), array( "Scrollable" => 'buffered'));
						$num_unread_sr = sqlsrv_num_rows($result_unread);
						
						$result_unread = sqlsrv_query($conncss,"SELECT id FROM comments_ir WHERE member = '$username' AND read_notification = 'yes'", array(), array( "Scrollable" => 'buffered'));
						$num_unread_ir = sqlsrv_num_rows($result_unread); 
						
						
						?>
                        <a href="my_comments_read.php" target="contentRight"><img src="images/envelope-open.png" width="21" height="21" align="absbottom" />&nbsp;Read
                        <font color="#333333">(<?php echo $num_unread_sr +$num_unread_ir; ?>)</font>
                        
                        </a>
                    </li>
		 </ul>
            </li>
          <br />



<li class="clickable">
                
				<form id="form1" name="form1" method="post" action="right_page.php?sort=free_text" target="contentRight">
                <table border="0" align="center">
                  <tr>
                    <td height="29" align="center"><input type="image" name="submit" src="images/search.png" width="22" height="22" border="0" alt="Submit" />
                    Quick Search</td>
                  </tr>
                  <tr>
                  <td height="42" align="center"><input name="free_text" type="text" id="free_text" size="17" placeholder="Number?" class="text ui-widget-content ui-corner-all"/></td>
                  </tr>
                </table>
      </form>
          </li>

                
          </li> 

      </ul>   

      </ul>

    </div>


</body>
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="js/jquery.ssd-vertical-navigation.min.js"></script>
<script src="js/app.js"></script>
</html>