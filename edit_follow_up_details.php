<?php
require_once("includes\security.php");
$Security->GoSecure();

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
<title></title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 


<script>
	$(function(){
	  $.datepicker.setDefaults(
		$.extend($.datepicker.regional[''])
	  );
	  $('#datepicker2').datepicker({dateFormat: 'yy-mm-dd'});
	
	});
	
	$(function() {
	$( "input[type=submit], button" )
	.button()
	});

</script>


</head>



<body>

<form method="POST" action="modify_details_follow_up.php?id_follow_up=<?php echo $id_follow_up ?>" id="modifyfollowup" name="modifyfollowup" >

<table align="center" class="gridtable">
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><strong>Follow up on :</strong></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF">
                  <textarea name="request" style="width:100%" rows="4" id="request" class="text ui-widget-content ui-corner-all"><?php echo $request ?></textarea></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><strong>Responses / Actions Taken :</strong></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><textarea name="response" id="response" style="width:100%" rows="4" class="text ui-widget-content ui-corner-all"><?php echo $response ?></textarea></td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>Status :</strong></td>
                  <td bgcolor="#FFFFFF"><select name="status" id="status">
                  <option selected="selected" value ="<?php echo $status ?>"><?php echo $status;?></option>
                    <option>In Progress</option>
                    <<option>Partially implemented / In Progress</option>
                    <option>Implemented</option>
                    <option>No longer applicable</option>
                  </select></td>
                  <td align="right" bgcolor="#FFFFFF"><strong>Category :</strong></td>
                  <td colspan="2" bgcolor="#FFFFFF">
                  <select name="category" id="category" class="text ui-widget-content ui-corner-all">
                    <option selected="selected" value ="<?php echo $category ?>"><?php echo $category;?></option>
                    <option>Other</option>
                    <option>Follow up (internal)</option>
                    <option>Referred to secretariat for action</option>
                    <option>Referred to secretariat for information</option>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>TGF Responsable :</strong></td>
                  <td bgcolor="#FFFFFF">
                  <select name="responsable" id="responsable" class="text ui-widget-content ui-corner-all">
                    <option selected="selected" value ="<?php echo $responsable ?>"><?php echo $responsable;?></option>
                    <option>FPM</option>
                    <option>Head Department</option>
                    <option>Regional Manager</option>
                    <option>Investigator</option>
                    <option>Auditor</option>
                    <option>Complainant</option>
                  </select></td>
                  <td align="right" bgcolor="#FFFFFF"><strong>Name :</strong></td>
                  <td colspan="2" bgcolor="#FFFFFF"><input name="name" type="text" id="name" style="width:100%" value = "<?php echo $name ?>" class="text ui-widget-content ui-corner-all"/></td>
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
                    <td colspan="2" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="291" colspan="1" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    
                    
                    
                  </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF"><strong>New date to follow up:</strong></td>
                  <td valign="top" bgcolor="#FFFFFF"><input id="datepicker2" type="text" name="new_date_follow_up" class="text ui-widget-content ui-corner-all"/>
                  <input name="date_follow_up" type="hidden" id="date_follow_up" value = "<?php echo $row_id_follow_up['date_follow_up']; ?>"/></td>
                  <td colspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                  <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
    <tr>
      <td valign="top" bgcolor="#FFFFFF"><strong>Comments:</strong></td>
                  <td colspan="4" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
                <tr>
                  <td colspan="5" valign="top" bgcolor="#FFFFFF"><textarea name="comments" id="comments" style="width:100%" rows="4" class="text ui-widget-content ui-corner-all"><?php echo $comments ?></textarea>
                  </td><input type="hidden" name="submit" value="Submit">
                </tr>
                <tr>
                  <td colspan="5" align="right" valign="top" bgcolor="#FFFFFF"><input type="submit" value="Save modifications"></td>
                </tr>
  </table>
</form>

    
</body>
</html>