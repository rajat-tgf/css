<?php
require_once("includes\security.php");
$Security->GoSecure();

$id = $_GET['id'];
$result = sqlsrv_query($conncss,"select * from comments_manager WHERE id = '$id'"); 
$row = sqlsrv_fetch_array( $result );;

$comment = $row['comment'];
$rate1 = $row['rate1'];
$rate2 = $row['rate2'];
$rate3 = $row['rate3'];
$rate4 = $row['rate4'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Entity Log</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script>
$(function() {
$( "#tabs" ).tabs();
$( "input[type=submit], button" )
.button()
});
</script>        
       

<style type="text/css">
table.gridtable1 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:13px;
	color:#FFFFFF;
	border-color: #EDEDED;
	border-collapse: collapse;
}
table.gridtable1 th {
	font-size:13px;
	border-width: 1px;
	padding: 2px;
	border-style: solid;
	border-color: #000000;
	background-color: #959595;
	color: #FFFFFF;
}
table.gridtable1 td {
	border-width: 0px;
	color:#666666;
	padding: 3px;
	border-style: solid;
	border-color: #EDEDED;
	background-color: #ffffff;
}
input.text1 {margin-bottom:3px; width:95%; padding: .1em; }
input.text1 {margin-bottom:3px; width:95%; padding: .1em; }
</style>

<script language="javascript">     
function validate(){  

	if(document.entity_pro.category.value == ""){
	
	window.alert("You must select a Category for the entity log ");
	 
	return false;     
	} 
	
	if(document.entity_pro.type_profile.value == ""){
	
	window.alert("You must select a Type for the entity log ");
	 
	return false;     
	}    

} 
</script>


</head>
<body>
<form name="editnotes" id="editnotes" action="save_comment_modification.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" onSubmit="return validate();"> 
            <table border="0" align="center" class="gridtable">
              <tr>
                <td width="630" align="right" valign="top"><strong>Timeliness :</strong></td>
                <td width="49" valign="top">
                  <select name="rate1" id="rate1" class="text ui-widget-content ui-corner-all">
                  <option selected="selected" value ="<?php echo $rate1 ?>"><?php echo $rate1;?></option>
                  <?php 
				  if ($rate1 == 0){ ?>
                  <option>1</option>
                  <?php }else{ ?>
                  <option>0</option>
					<?php	  
				  }
					?>	  
                </select></td>
              </tr>
              <tr>
                <td align="right" valign="top"><p><strong>Completion of the Report / Research / Entities:</strong></p></td>
                <td valign="top"><select name="rate2" id="rate2" class="text ui-widget-content ui-corner-all">
                  <option selected="selected" value ="<?php echo $rate2 ?>"><?php echo $rate2;?></option>
                  <?php 
				  if ($rate2 == 0){ ?>
                  <option>1</option>
                  <?php }else{ ?>
                  <option>0</option>
					<?php	  
				  }
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Quality of the Report :</strong></td>
                <td valign="top"><select name="rate3" id="rate3" class="text ui-widget-content ui-corner-all">
                  <option selected="selected" value ="<?php echo $rate3 ?>"><?php echo $rate3;?></option>
                  <?php 
				  if ($rate3 == 0){ ?>
                  <option>1</option>
                  <?php }else{ ?>
                  <option>0</option>
					<?php	  
				  }
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Conclusion :</strong></td>
                <td valign="top"><select name="rate4" id="rate4" class="text ui-widget-content ui-corner-all">
                  <option selected="selected" value ="<?php echo $rate4 ?>"><?php echo $rate4;?></option>
                  <?php 
				  if ($rate4 == 0){ ?>
                  <option>1</option>
                  <?php }else{ ?>
                  <option>0</option>
					<?php	  
				  }
					?>
                </select></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><strong>Notes :</strong></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><textarea name="comment" id="comment" style="width:100%" rows="12" class="text ui-widget-content ui-corner-all" style="resize:none" ><?php echo $comment ?></textarea></td>
              </tr>

              <tr>
                <td align="right" colspan="2">
                
				<button TYPE = "Submit" Name = "Submit" VALUE = "Save">Save modifications</button>                
                </td>
              </tr>
              
            </table> 
</form>

</body>
</html>