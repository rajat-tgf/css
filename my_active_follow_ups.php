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
<tr><td colspan="7"><strong><font color="#464646"; size="+1">My active Follow ups</font></strong></td>
                <tr>
                  <th width="31" align="center"></th>
                  <th width="402">Status</th>
                  <th width="121">Allegation / IR</th>
                  <th width="214"><strong>Responsable</strong></th>
                  <th width="192" align="center"><strong>Name</strong></th>
                  <th width="315">Follow up date</th>
                  <th width="42"></th>
  </tr>
                        
<?php
					$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE member = '$username' AND (status = 'In Progress' OR status = 'Partially implemented / In Progress') ORDER BY date_follow_up ASC");
					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $id_follow_up = $row_follow_up['id'];	  ?>
						 <tr>
							<td align="center" style="background-color:#E6E6E6">
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
							<td style="background-color:#E6E6E6">
							<?php echo $status = $row_follow_up['status']; ?>
							</td>
                            <td align="center" style="background-color:#E6E6E6">
                            <?php echo $allegation_id = $row_follow_up['allegation_id']; ?>
							</td>

							</td>
                            <td style="background-color:#E6E6E6">
                            <?php echo $responsable = $row_follow_up['responsable']; ?>


							</td>
							
							<td style="background-color:#E6E6E6">
                            <?php echo $name = $row_follow_up['name']; ?>
							</td>
					 <?php
                     $date_follow_up = $row_follow_up['date_follow_up'];
                    $past = "";
                    if(strtotime($date_follow_up) < time()) {
                    $past = "color:#F00";
                    }else{
                    
                    }
                    ?>
                            
                            <td style="background-color:#E6E6E6; <?php echo $past ?>">
                            <?php
						
							
							
                            if ( $date_follow_up != "" ){
								
								echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
							}else{
								echo "No date set";	
							}
							?>
							
							</td>
						
                            <td width="61" align="center" style="background-color:#E6E6E6">



							<a onclick="return showDialogfollowup(<?php echo $id_follow_up ?> )">
                                <img src="images/edit.png" width="24" height="24" align="top" title="Edit Follow up"/>
                                </a>
                            <a onclick="return showDialog(<?php echo $allegation_id ?>)">
                                        <img src="images/document-icon-sr.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
                            </a>

                            

                           </td>
  </tr>
  <tr>
    <td colspan="7" align="left">
        <strong>Follow Up on :</strong><br />
        <?php echo nl2br($row_follow_up['request']) ?>
        <br />
        <br />
        <br />
	</td></tr>

<?php }
						
// INTELLIGENCE REPORTS FOLLOW UPS


					$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups_IR WHERE member = '$username' AND (status = 'In Progress' OR status = 'Partially implemented / In Progress') ORDER BY date_follow_up ASC");
					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $id_follow_up_ir = $row_follow_up['id'];	  ?>
						 <tr>
							<td align="center" style="background-color:#E6E6E6">
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
							<td style="background-color:#E6E6E6">
							<?php echo $status = $row_follow_up['status']; ?>
							</td>
                            <td align="center" style="background-color:#E6E6E6">IR<?php echo $report_id = $row_follow_up['report_id']; ?>
							</td>

							</td>
                            <td style="background-color:#E6E6E6">
                            <?php echo $responsable = $row_follow_up['responsable']; ?>
							</td>
							
							<td style="background-color:#E6E6E6">
                            <?php echo $name = $row_follow_up['name']; ?>
							</td>
 <?php
 $date_follow_up = $row_follow_up['date_follow_up'];
$past = "";
if(strtotime($date_follow_up) < time()) {
$past = "color:#F00";
}else{

}
?>
                            
                            <td style="background-color:#E6E6E6; <?php echo $past ?>">
                            <?php
						
							
							
                            if ( $date_follow_up != "" ){
								
								echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
							}else{
								echo "No date set";	
							}
							?>
							
							</td>
						
                            <td align="center" style="background-color:#E6E6E6">
                            <a onclick="return showDialogfollowupir(<?php echo $id_follow_up_ir ?> )">
                            <img src="images/edit.png" width="24" height="24" align="top" title="Edit Follow up"/>
                            </a>
                            <a onclick="return parent.showDialogir(<?php echo $report_id ?>)">
                                        <img src="images/ir.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
                            </a>

                            

                           </td>
  </tr>
  <tr>
    <td colspan="7" align="left">
        <strong>Follow Up on :</strong><br />
        <?php echo nl2br($row_follow_up['request']) ?>
        <br />
        <br />
        <br />
	</td></tr>

						<?php }?>						
						
</table>
</div>


    
<div id="divIdal" title="Edit Follow up">
    <iframe id="modalIframeIden" frameborder="0"  width="960" height="710">
    Your browser is not supported
    </iframe>
</div>
    
<div id="divscreeningreport" title="Screening Report Details">
        <iframe id="modalIframeIdal" frameborder="0" width="920" height="850">
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