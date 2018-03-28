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


</head>
<body>



<form method="post" id="search_allegation" name="search_allegation" class="ui-widget">
    <table width="300" align="center">
    <tr><td width="304" align="right" valign="middle">
    <input type="text" placeholder="Allegation number?" name="input" class="text ui-widget-content ui-corner-all" size="20">
    </td>
    <td width="10" align="right" valign="middle">&nbsp;  </td>
    <td width="121" valign="top">
    <input type = "submit" name = "submit" value = "Search"/>
    </td></tr>
    
    </table><br />
</form>
<form action="link_allegations_to_ir.php" id="link_allegation_to_ir" name="link_allegation_to_ir" method="post">
<?php 
			if(isset($_POST['input']) && $_POST['input'] != "" ){ 

						$userquery = $_POST['input'];
							$result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$userquery'");	
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
                                  <th align="center" valign="middle">Resolution</th>
                                  <th width="28" align="center" valign="middle"></th>
                                </tr>
                                <?php
		
              			  $row_proactive = $all_rows[0];
                      
						  $allegation_to_linked = $row_proactive['id'];

						  $title = $row_proactive['summary'];
						  $country = $row_proactive['country'];
						  $status = $row_proactive['status'];
						  $resolution = $row_proactive['resolution'];
						  
						 ?>
                        <td align="center"><?php echo $allegation_to_linked; ?></td>
                        <td align="center"><?php echo $title; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="center"><?php echo $resolution; ?></td>
                        <td align="right">
                   		 <input type="radio" name="allegation_id_to_link" value="<?php echo $allegation_to_linked; ?>" title="<?php echo $allegation_to_linked; ?>"/>
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