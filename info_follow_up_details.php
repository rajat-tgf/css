<?php

require_once("includes\\opendb.php");

		$id_follow_up = $_GET['id_follow_up'];
		$result_id_follow_up = sqlsrv_query($conncss,"select * from follow_ups WHERE id = '$id_follow_up'"); 
		$row_id_follow_up = sqlsrv_fetch_array( $result_id_follow_up );

		$request = $row_id_follow_up['request'];
		$response = $row_id_follow_up['response'];
		$status = $row_id_follow_up['status'];
		$category = $row_id_follow_up['category'];
		$responsable = $row_id_follow_up['responsable'];
		$name = $row_id_follow_up['name'];
		$date_notified = $row_id_follow_up['date_notified'];
		$date_follow_up = $row_id_follow_up['date_follow_up'];
		
		
		$comments = $row_id_follow_up['comments'];
			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Information Follow up details</title>


<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />



</head>



<body>
              <table width="100%" border="0" align="center"  class="gridtablefilter">

              <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>Status :</strong></td>
                  <td bgcolor="#FFFFFF"><?php echo $status;?></td>
                  <td align="right" bgcolor="#FFFFFF"><strong>Category :</strong></td>
                  <td colspan="2" bgcolor="#FFFFFF">
				  <?php	echo $category ?></td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>TGF Responsable :</strong></td>
                  <td bgcolor="#FFFFFF"><?php echo $responsable?></td>
                  <td align="right" bgcolor="#FFFFFF"><strong>Name :</strong></td>
                  <td colspan="2" bgcolor="#FFFFFF"><?php echo $name ?></td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#FFFFFF"><strong>Date notified :</strong></td>
                    <td colspan="4" valign="top" bgcolor="#FFFFFF"><?php 
					if ($date_notified != ""){
					echo $date_notified = date('F j, Y', strtotime($date_notified)); 
					}
					?></td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF"><strong>Date to follow up:</strong></td>
                    <td valign="top" bgcolor="#FFFFFF">
                    <?php
					if ( $date_follow_up != "" ){
						echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
					}else{
						echo "No date set";	
					}
					?>

                    </td>
                    <td colspan="2" valign="top" bgcolor="#FFFFFF"></td>
                    <td colspan="1" valign="top" bgcolor="#FFFFFF">
                    
                    </td>
                 </tr>
                <tr>
                    <td colspan="5" align="left" bgcolor="#FFFFFF"><hr /></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><strong>Follow up on :</strong></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><?php echo nl2br($request) ?></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><strong>Responses / Actions Taken :</strong></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><?php echo nl2br($response) ?></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><hr /></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                  <td colspan="4" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF"><strong>Comments:</strong></td>
                  <td colspan="4" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="5" valign="top" bgcolor="#FFFFFF"><?php echo nl2br($comments) ?>
                  </td>
                </tr>
                </table>
    
</body>
</html>