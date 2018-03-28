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
	function showDialogfollowup(id_follow_up){
		
	
	   $("#divIdal").dialog("open");
	   $("#modalIframeIden").attr("src","edit_follow_up_details.php?id_follow_up=" + id_follow_up);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdal").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 785,
			   width: 980,
			   resizable: false,
			   draggable: false,
			   position: 'top',
			   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
		  });
		  
		  
});



	function showDialogfollowupir(id_follow_up){
		
	
	   $("#divIdalir").dialog("open");
	   $("#modalIframeIdenir").attr("src","edit_follow_up_ir_details.php?id_follow_up=" + id_follow_up);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdalir").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 785,
			   width: 980,
			   resizable: false,
			   draggable: false,
			   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
		  });
		  
		  
});


</script>


<script type="text/javascript">
	function showDialog(allegation_id){
		
	
	   $("#divscreeningreport").dialog("open");
	   $("#modalIframeIdal").attr("src","details_sr.php?allegation_id=" + allegation_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divscreeningreport").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 940,
			   resizable: false,
			   draggable: false,
			   position: 'top',
			   

		  });
	});
</script>

</head>

<body>
<?php include("menu_list.php"); ?>
<br />

<div id="entities-contain" align="center">
<table>
<tr><td colspan="7"><strong><font color="#464646"; size="+1">My closed Follow ups</font></strong></td>

                <tr>
                <th width="31" align="center"></th>
                  <th width="287">Status</th>
                  <th width="78">Allegation</th>
                  <th width="207"><strong>Responsable</strong></th>
                  <th width="185" align="center"><strong>Name</strong></th>
                  <th width="151">Follow up date</th>
                  <th width="55"></th>
  </tr>
                        
<?php
					
$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE member = '$username' AND (status = 'Implemented' OR status = 'No longer applicable') ORDER BY date_follow_up DESC");

					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $id_follow_up = $row_follow_up['id'];	  ?>
						 <tr>
							<td align="center">
                            <?php $category = $row_follow_up['category']; 
							if ( $category == "Follow up (internal)" ){
							?>
                            <img src="images/Calendar-icon-green.png" width="24" height="24" title="Follow up (internal)"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for action" ){
							?>
                            <img src="images/Calendar-icon-red.png" width="24" height="24" title="Referred to secretariat for action"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for information" ){
							?>
                            <img src="images/Calendar-icon-blue.png" width="24" height="24" title="Referred to secretariat for information"/>
                            <?php	
							}
							
							?>
							<td>
							<?php echo $status = $row_follow_up['status']; ?>
							</td>

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
								echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
							}else{
								echo "No date set";	
							}
							?>
							
							</td>
						
                            <td align="center">
                            
                            
                            <a onclick="return showDialogfollowup(<?php echo $id_follow_up ?> )">
                                <img src="images/edit.png" width="24" height="24" align="top" title="Edit Follow up"/>
                                </a>
                                <a onclick="return parent.showDialog(<?php echo $allegation_id ?>)">
                                        <img src="images/document-icon-sr.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
                            </a>
                            </td>
  </tr>

						<?php }
						
// INTELLIGENCE REPORTS FOLLOW UPS


					$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups_IR WHERE member = '$username' AND (status = 'Implemented' OR status = 'No longer applicable') ORDER BY date_follow_up ASC");
					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $id_follow_up_ir = $row_follow_up['id'];	  ?>
						 <tr>
							<td align="center" >
                            <?php $category = $row_follow_up['category']; 
							if ( $category == "Follow up (internal)" ){
							?>
                            <img src="images/Calendar-icon-green.png" width="24" height="24" title="Follow up (internal)"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for action" ){
							?>
                            <img src="images/Calendar-icon-red.png" width="24" height="24" title="Referred to secretariat for action"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for information" ){
							?>
                            <img src="images/Calendar-icon-blue.png" width="24" height="24" title="Referred to secretariat for information"/>
                            <?php	
							}
							
							?>
							<td >
							<?php echo $status = $row_follow_up['status']; ?>
							</td>
                            <td align="center" >IR<?php echo $report_id = $row_follow_up['report_id']; ?>
							</td>

							</td>
                            <td >
                            <?php echo $responsable = $row_follow_up['responsable']; ?>
							</td>
							
							<td >
                            <?php echo $name = $row_follow_up['name']; ?>
							</td>
 							
							<td>
							<?php
                            if ( $date_follow_up != "" ){
								
								echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
							}else{
								echo "No date set";	
							}
							?>
							
							</td>
						
                            <td align="center" >
                            <a onclick="return showDialogfollowupir(<?php echo $id_follow_up_ir ?> )">
                            <img src="images/edit.png" width="24" height="24" align="top" title="Edit Follow up"/>
                            </a>
                            <a onclick="return parent.showDialogir(<?php echo $report_id ?>)">
                             <img src="images/ir.png" width="24" height="24" align="absmiddle" title="Quick view Intelligence report"/>
                            </a>

                            

                           </td>
  							</tr>
						<?php }?>				

</table>

</div>

<div id="divIdal" title="Edit Follow up">
    <iframe id="modalIframeIden" frameborder="0"  width="960" height="710">
    Your browser is not supported
    </iframe>
</div>


<div id="divIdalir" title="Edit Follow up - Intelligence Report">
        <iframe id="modalIframeIdenir" frameborder="0" width="960" height="710">
        Your browser is not supported
        </iframe>
</div>  

</body>
</html>