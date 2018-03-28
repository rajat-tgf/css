<?php
require_once("includes\\opendb.php");
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

<script>
	$(function() {
	$( "input[type=submit], button" )
	.button()
	});
</script> 





</head>
<body>



<form method="post" id="search_ir" name="search_ir" class="ui-widget">
    <table width="300" align="center" class="gridtablefilter">
    <tr><td width="304" align="right" valign="middle">
    <input type="text" placeholder="IR number?" name="input" class="text ui-widget" size="20">
    </td>
    <td width="10" align="right" valign="middle">&nbsp;  </td>
    <td width="121" valign="top">
    <input type = "submit" name = "submit" value = "Search"/>
    </td></tr>
    
    </table><br />
</form>
<form action="link_ir_to_allegation.php" id="link_ir_to_allegation" name="link_ir_to_allegation" method="post">
<?php 
			if(isset($_POST['input']) && $_POST['input'] != "" ){ 

						$userquery = $_POST['input'];
							$result = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE id = '$userquery'");	
							$all_rows = sqlsrv_fetchall($result);
							$hit_found = count($all_rows);
							if ($hit_found > 0)
							{?>
							<table class='gridtable' align="center">
							<tr><td>
                            <font color="#CC0000" style="font-size:14px">
							<strong><?php
								echo $hit_found . " match found";
							?></strong>
                            </font>
							</td></tr>
							</table><br />
   					<div id="entities-contain">
  								 <table>
                                <tr>
                                <th width="60" align="center" valign="middle">#</th>
                                  <th width="384" align="center" valign="middle">Title</th>
                                  <th width="161" align="center" valign="middle">Country</th>
                                  <th width="199" align="center" valign="middle">Status</th>
                                  <th width="28" align="center" valign="middle"></th>
                                </tr>
                                <?php
		
              			  $row_ir = $all_rows[0];
                      
						  $ir_to_linked = $row_ir['id'];

						  $title = $row_ir['title'];
						  $country = $row_ir['country'];
						  $status = $row_ir['status'];
						  
						 ?>
                        <td align="center"><?php echo $ir_to_linked; ?></td>
                        <td align="center"><?php echo $title; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="right">
                   		 <input type="radio" name="ir_id_to_link" value="<?php echo $ir_to_linked; ?>" title="<?php echo $ir_to_linked; ?>"/>
                        </td>
                		</tr>
                        <?php 
						}}
						?>
   </table> 
   </div>
</form> 


</body>
</html>