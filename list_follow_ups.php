<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");  // Redirecting To Home Page
}
error_reporting(0);

require_once("includes\\opendb.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>CSS</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<script type="text/javascript">
$(function() {
	$( "#tabs" ).tabs();
$( "input[type=submit], button" )
.button()
});

function info_follow_up_details(id_follow_up) 
{
		var windowW=950
		var windowH=780
		var windowX = 100
		var windowY = 130
		var url = "info_follow_up_details.php?id_follow_up=" + id_follow_up;

		s = "scrollbars=no"+",width="+windowW+",height="+windowH;

		blwindow = window.open(url,"Popup",","+s);
		windowX = (screen.width) ? (screen.width-windowW)/2 : 0;
		windowY = (screen.height) ? (screen.height-windowH)/2 : 0;
		blwindow.focus();
		blwindow.resizeTo(windowW,windowH);
		blwindow.moveTo(windowX,windowY);
}


function showDialog(allegation_id){
	   $("#divIdal").dialog("open");
	   $("#modalIframeIdal").attr("src","details_sr.php?allegation_id=" + allegation_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdal").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 940,
			   resizable: false,
			   draggable: false,
			   

		  });
	});

	function showDialogfollow(id_follow_up){
		
	
	   $("#divIdfollow").dialog("open");
	   $("#modalIframeIdfollow").attr("src","info_follow_up_details.php?id_follow_up=" + id_follow_up);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdfollow").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 760,
			   width: 860,
			   resizable: false,
			   draggable: false,
			   
		  });
	});
</script>
</head>
<body>

<?php

if ($_REQUEST["status"]<>''){
	$status = " AND status = '".sqlsrv_real_escape_string($_REQUEST["status"])."'";	
}

if ($_REQUEST["category"]<>''){
	$category = " AND category = '".sqlsrv_real_escape_string($_REQUEST["category"])."'";	
}

if ($_REQUEST["member"]<>''){
	$category = " AND member = '".sqlsrv_real_escape_string($_REQUEST["member"])."'";	
}

	
$sql = "SELECT * FROM follow_ups WHERE id>0".$status.$category." ORDER BY date_follow_up DESC";
$sql_result = sqlsrv_query($conncss, $sql, array(), array( "Scrollable" => 'buffered'));
$all_rows = sqlsrv_fetchall($sql_result);
$num_hits = count($all_rows);



include ("menu_list.php");
?>

<form id="form1" name="form1" method="post" action="list_follow_ups.php">
<table class="gridtablefilter">
<tr>
<td align="right">
  <a href="export_followups.php"></a></td>
</tr>
</table>
<table width="100%" align="center" class="gridtablefilter">
  <tr>
  <td colspan="6" align="right">&nbsp;</td>
  <td></td>
</tr>
<tr valign="middle">
  <td width="6%" align="right"><strong>Status</strong> <strong>:</strong></td>
  <td width="26%"><select name="status" id="status" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
    <option>In Progress</option>
    <option>Partially implemented / In Progress</option>
    <option>Implemented</option>
    <option>No longer applicable</option>
  </select></td>
  <td width="8%" align="right"><strong>Category</strong> <strong>:</strong></td>
  <td width="28%" align="left"><select name="category" id="category" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
    <option>Follow up (internal)</option>
    <option>Referred to secretariat for action</option>
    <option>Referred to secretariat for information</option>
    <option>Other</option>
  </select></td>
  <td width="9%" align="right"><strong>Created by:</strong></td>
  <td width="5%" align="left"><select name="member" id="member" class="text ui-widget-content ui-corner-all">
    <option></option>
            <?php
			$result_officer = sqlsrv_query($conn,"SELECT * FROM screening_officer ORDER BY name"); 
			while($row_screening_officer = sqlsrv_fetch_array($result_officer)){
				$screening_officer = $row_screening_officer['name'];
				echo "<option>$screening_officer</option>";
			}
			$result_members = sqlsrv_query($conn,"SELECT * FROM screening_member ORDER BY name"); 
			while($row_member = sqlsrv_fetch_array($result_members)){
				$member = $row_member['name'];
				echo "<option>$member</option>";
			}
			?>
  </select></td>
  <td align="left"><button type = "submit" name = "Submit" value = "Filter">Filter</button>
    <button type = "submit" name = "Submit" value = "All" onclick="window.location.href='list_follow_ups.php'">Show all</button></td>
  
</tr>
<tr>
  <td align="right">&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="2" align="center">&nbsp;</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td align="right">&nbsp;</td>
  <td></td>
  <td colspan="4" align="right">&nbsp;</td>
  <td><font><strong>Follow ups found : <font color="#FF0000"><?php echo $num_hits ?></font></strong></font></td>
  </tr>
</table>
</form>
</div>
                             
                

<?php



if ( $num_hits == 0 ){
	echo "<font color='#666666'>";
	echo "No results found";
	echo "</font>";
	
}else{
	
?>

<div id="entities-contain" align="center">
<table>
                <tr>
                  <th align="center"></th>
                  <th>Status</th>
                  <th align="center"><strong>Allegation </strong></th>
                  <th><strong>Responsable</strong></th>
                  <th align="center"><strong>Name</strong></th>
                  <th>Follow up date</th>
                  <th colspan="2">Created by</th>
                </tr>
                <?php
					if ($num_hits>0) {
					foreach ($all_rows as $row_follow_up) {
						  $id_follow_up = $row_follow_up['id'];	  ?>
						 <tr>
                         <td>
                         <?php
						 
						 	$category = $row_follow_up['category'];
                         
	                        if ( $category == "Follow up (internal)" ){
							?>
                            <img src="images/Calendar-icon-green.png" width="22" height="22" title="Follow up (internal)" align="absmiddle"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for action" ){
							?>
                            <img src="images/Calendar-icon-red.png" width="22" height="22" title="Referred to secretariat for action" align="absmiddle"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for information" ){
							?>
                            <img src="images/Calendar-icon-blue.png" width="22" height="22" title="Referred to secretariat for information" align="absmiddle"/>
                            <?php	
							} ?>
						   </td>
                         
	                         <td>
							<?php echo $status = $row_follow_up['status']; ?>
							</td>
							<td align="center">
                            
                            <?php echo $allegation_id = $row_follow_up['allegation_id']; ?>

							</td>
                           <td>
                            <?php echo $responsable = $row_follow_up['responsable']; ?>
						   </td>
							
							<td>
                            <?php echo $name = $row_follow_up['name']; ?>
							</td>
							
							
                            
                            <td>
							<?php
							$date_follow_up = $row_follow_up['date_follow_up'];
							
							if ( $date_follow_up != "" ){
								echo $date_follow_up = date('F j, Y', strtotime($date_follow_up = $row_follow_up['date_follow_up'])); 
							}else{
								echo "No date set";	
							}
							?>
							</td>
                            <td>
                            <?php echo $author = $row_follow_up['member']; ?>
							</td>
						
                            <td>
                            <a onclick="return showDialogfollow(<?php echo $id_follow_up ?> )">
                            <img src="images/preview.png" width="24" height="24" align="top" title="Info"/></a>
                            <a onclick="return parent.showDialog(<?php echo $allegation_id ?> )">
                                 <img src="images/document-icon-sr.png" width="21" height="21" align="absmiddle" title="Quick view Screening Report"/>
                            </a>
                            </td>
            </tr>

						<?php }}?>
</table>   
<?php } ?>



    <div id="divIdfollow" title="Follow Up Details">
        <iframe id="modalIframeIdfollow" frameborder="0" width="835" height="700">
        Your browser is not supported
        </iframe>
	</div>
    </body>
</html>
