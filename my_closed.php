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

<script>
function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}
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
             <?php
			 $rowId = 0;
				$quey1="SELECT * FROM allegation_details WHERE team_member = '$username' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2025-12-31' ORDER BY date_received ASC"; 
				$result=sqlsrv_query($conncss,$quey1);
				
				
				$quey2="select * from intelligence_reports WHERE member = '$username' AND status = 'Finalised' ORDER BY id ASC"; 
				$result2=sqlsrv_query($conncss,$quey2);
				
				
				
			?>
<body>
<?php include("menu_list.php"); ?>

    
    <?php
//2015-------------------------------------------------------------------------------------------------------
//HIGH ALLEGATIONS
$result_allegations_high = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$username' AND priority = 'High' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$all_rows = sqlsrv_fetchall($result_allegations_high);
$num_allegations_high = count($all_rows);

$total_number_days_screening_high = 0;
$average_high = 0;
foreach ($all_rows as $row_allegations_high) {	
	$date1 = new DateTime($row_allegations_high['date_received']);
	$date2 = new DateTime($row_allegations_high['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_high = $total_number_days_screening_high + $screening_days;
}
if ( $total_number_days_screening_high != 0 && $num_allegations_high != 0 ){
	$average_high = $total_number_days_screening_high / $num_allegations_high ;
	$average_high = round($average_high, 0);
}



//MIDIUM ALLEGATIONS
$result_allegations_midium = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$username' AND priority = 'Medium' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$all_rows = sqlsrv_fetchall($result_allegations_midium);
$num_allegations_midium = count($all_rows);

$total_number_days_screening_medium = 0;
$average_midium = 0 ;
foreach($all_rows as $row_allegations_midium) {	
	$date1 = new DateTime($row_allegations_midium['date_received']);
	$date2 = new DateTime($row_allegations_midium['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_medium = $total_number_days_screening_medium + $screening_days;
}

if ( $total_number_days_screening_medium != 0 && $num_allegations_midium != 0 ){
	$average_midium = $total_number_days_screening_medium / $num_allegations_midium ;
	$average_midium = round($average_midium, 0);
}


//LOW ALLEGATIONS
$result_allegations_low = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$username' AND priority = 'Low' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$all_rows = sqlsrv_fetchall($result_allegations_low);
$num_allegations_low = count($all_rows);

$total_number_days_screening_low = 0;
$average_low = 0;
foreach ($all_rows as $row_allegations_low) {	
	$date1 = new DateTime($row_allegations_low['date_received']);
	$date2 = new DateTime($row_allegations_low['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_low = $total_number_days_screening_low + $screening_days;
}
if ( $total_number_days_screening_low != 0 && $num_allegations_low != 0 ){
	$average_low = $total_number_days_screening_low / $num_allegations_low ;
	$average_low = round($average_low, 0);
}



//NO PRIORITY ALLEGATIONS
$result_allegations_nopriority = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$username' AND priority = '' AND status = 'Closed' AND date_received BETWEEN '2015-01-01' AND '2015-12-31'");		
$all_rows = sqlsrv_fetchall($result_allegations_nopriority);
$num_allegations_no_priority = count($all_rows);
$average_no_priority = 0;
$total_number_days_screening_no_priority = 0;

foreach ($all_rows as $row_allegations_no_priority) {	
	$date1 = new DateTime($row_allegations_no_priority['date_received']);
	$date2 = new DateTime($row_allegations_no_priority['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_no_priority = $total_number_days_screening_no_priority + $screening_days;
}
if ( $total_number_days_screening_no_priority != 0 && $num_allegations_no_priority != 0 ){
$average_no_priority = $total_number_days_screening_no_priority / $num_allegations_no_priority ;
$average_no_priority = round($average_no_priority, 0);
}


//2016-------------------------------------------------------------------------------------------------------
//HIGH ALLEGATIONS
$result_allegations_high2016 = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$username' AND priority = 'High' AND status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'");		
$all_rows = sqlsrv_fetchall($result_allegations_high2016);
$num_allegations_high2016 = count($all_rows);

$total_number_days_screening_high2016 = 0;
$average_high2016 = 0;
foreach ($all_rows as $row_allegations_high2016) {	
	$date1 = new DateTime($row_allegations_high2016['date_received']);
	$date2 = new DateTime($row_allegations_high2016['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_high2016 = $total_number_days_screening_high2016 + $screening_days;
}
if ( $total_number_days_screening_high2016 != 0 && $num_allegations_high2016 != 0 ){
	$average_high2016 = $total_number_days_screening_high2016 / $num_allegations_high2016 ;
	$average_high2016 = round($average_high2016, 0);
}



//MIDIUM ALLEGATIONS
$result_allegations_midium2016 = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$username' AND priority = 'Medium' AND status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'");		
$all_rows = sqlsrv_fetchall($result_allegations_midium2016);
$num_allegations_midium2016 = count($all_rows);

$total_number_days_screening_medium2016 = 0;
$average_midium2016 = 0 ;
foreach ($all_rows as $row_allegations_midium2016) {	
	$date1 = new DateTime($row_allegations_midium2016['date_received']);
	$date2 = new DateTime($row_allegations_midium2016['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_medium2016 = $total_number_days_screening_medium2016 + $screening_days;
}

if ( $total_number_days_screening_medium2016 != 0 && $num_allegations_midium2016 != 0 ){
	$average_midium2016 = $total_number_days_screening_medium2016 / $num_allegations_midium2016 ;
	$average_midium2016 = round($average_midium2016, 0);
}


//LOW ALLEGATIONS
$result_allegations_low2016 = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$username' AND priority = 'Low' AND status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'");		
$all_rows = sqlsrv_fetchall($result_allegations_low2016);
$num_allegations_low2016 = count($all_rows);

$total_number_days_screening_low2016 = 0;
$average_low2016 = 0;
foreach ($all_rows as $row_allegations_low2016) {	
	$date1 = new DateTime($row_allegations_low2016['date_received']);
	$date2 = new DateTime($row_allegations_low2016['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_low2016 = $total_number_days_screening_low2016 + $screening_days;
}
if ( $total_number_days_screening_low2016 != 0 && $num_allegations_low2016 != 0 ){
	$average_low2016 = $total_number_days_screening_low2016 / $num_allegations_low2016 ;
	$average_low2016 = round($average_low2016, 0);
}
?>
</p>
<p>&nbsp; </p>
  <table width="100%">
  <tr>
  <td width="7%" align="right" valign="top"><font size="+2" color="#999999"><strong>2015</strong></font></td>
<td width="38%" align="center" valign="top">

<div id="entities-contain">
  <table align="left">
    <tr>
      <th><strong>Priority</strong></th>
      <th align="center"><strong># Allegations</strong></th>
      <th align="center">Total days</th>
      <th align="center"><strong>Average in days</strong></th>
      </tr>
    <tr>
      <td><font color="#FF0000">High</font></td>
      <td align="center"><?php echo $num_allegations_high ?></td>
      <td align="center"><?php echo $total_number_days_screening_high ?></td>
      <td align="center"><?php echo $average_high ?></td></tr>
    <tr>
      <td><font color="#FF9933">Medium</font></td>
      <td align="center"><?php echo $num_allegations_midium ?></td>
      <td align="center"><?php echo $total_number_days_screening_medium ?></td>
      <td align="center"><?php echo $average_midium ?></td></tr>
    <tr>
      <td><font color="#009900">Low</font></td>
      <td align="center"><?php echo $num_allegations_low ?></td>
      <td align="center"><?php echo $total_number_days_screening_low ?></td>
      <td align="center"><?php echo $average_low ?></td></tr>
    <tr>
      <td align="center">No priority</td>
      <td align="center"><?php echo $num_allegations_no_priority ?></td>
      <td align="center"><?php echo $total_number_days_screening_no_priority ?></td>
      <td align="center"><?php echo $average_no_priority ?></td>
      </tr>
    <tr>
      <td align="center" style="border-top:double"><strong>TOTAL</strong></td>
      <td align="center" style="border-top:double"><strong><?php echo $total_number_allegations = $num_allegations_high + $num_allegations_midium + $num_allegations_low + $num_allegations_no_priority?></strong></td>
      <td align="center" style="border-top:double"><strong><?php echo $total_number_days = $total_number_days_screening_high + $total_number_days_screening_medium + $total_number_days_screening_low + $total_number_days_screening_no_priority?></strong></td>
      
      
      
      <td align="center" style="border-top:double"><strong>
       <?php 
	   if ( $total_number_days != 0 && $total_number_allegations != 0 ){
	 echo  $averagetottal = round($total_number_days / $total_number_allegations, 0);
	   }else{
		echo "0";   
	   }
	 ?>
        </strong>
        <?php echo "<font size='-2'>    (average)</font>"; ?>
  </td></tr>
  </table>
  </div>
  <br></td>
<td width="10%" align="right" valign="top"><font size="+2" color="#999999"><strong>2016</strong></font></td>
<td width="45%" align="center" valign="top">
<div id="entities-contain">
  <table align="left" border="0" cellpadding="3" cellspacing="0">
    <tr>
      <th><strong>Priority</strong></th>
      <th align="center"><strong># Allegations</strong></th>
      <th align="center">Total days</th>
      <th align="center"><strong>Average in days</strong></th>
      </tr>
    <tr>
      <td><font color="#FF0000">High</font></td>
      <td align="center"><?php echo $num_allegations_high2016 ?></td>
      <td align="center"><?php echo $total_number_days_screening_high2016 ?></td>
      <td align="center"><?php echo $average_high2016 ?></td></tr>
    <tr>
      <td><font color="#FF9933">Medium</font></td>
      <td align="center"><?php echo $num_allegations_midium2016 ?></td>
      <td align="center"><?php echo $total_number_days_screening_medium2016 ?></td>
      <td align="center"><?php echo $average_midium2016 ?></td></tr>
    <tr>
      <td><font color="#009900">Low</font></td>
      <td align="center"><?php echo $num_allegations_low2016 ?></td>
      <td align="center"><?php echo $total_number_days_screening_low2016 ?></td>
      <td align="center"><?php echo $average_low2016 ?></td></tr>
    
    <tr>
      <td align="center" style="border-top:double"><strong>TOTAL</strong></td>
      <td align="center" style="border-top:double"><strong><?php echo $total_number_allegations2016 = $num_allegations_high2016 + $num_allegations_midium2016 + $num_allegations_low2016 ?></strong></td>
      <td align="center" style="border-top:double"><strong><?php echo $total_number_days2016 = $total_number_days_screening_high2016 + $total_number_days_screening_medium2016 + $total_number_days_screening_low2016 ?></strong></td>
      
      
      
      <td align="center" style="border-top:double"><strong>
       <?php 
	   if ( $total_number_days2016 != 0 && $total_number_allegations2016 != 0 ){
	 echo  $averagetottal2016 = round($total_number_days2016 / $total_number_allegations2016, 0);
	   }else{
		   echo "0";
	   }
	 ?>
        </strong>
        <?php echo "<font size='-2'>    (average)</font>"; ?>
  </td></tr>
  </table>
  </div>

</td>
</tr>
<tr>
  <td align="left" valign="top">&nbsp;</td>
  <td align="center" valign="top">&nbsp;</td>
  <td align="center" valign="top">&nbsp;</td>
  <td align="center" valign="top">&nbsp;</td>
</tr>
</table>




<div id="entities-contain" align="center">
<table>
<tr><td colspan="8"><strong><font color="#464646"; size="+1">
    My closed Screening / Assessment</font></strong></td></tr>
                    <tr>
                  	  <th width="33" align="center" valign="middle">#</th>
                      
                      <th width="399" align="center" valign="middle">Title</th>
    
                      <th width="167" align="center" valign="middle">Country</th>
                      
                      <th width="214" align="center" valign="middle">Status</th>
                      
                      <th width="67" align="center" valign="middle">Priority</th>
                      <th width="42" align="center" valign="middle">Days</th>
                      
                      <th colspan="2" align="center" valign="middle">Member in Charge</th>
  </tr>
                        
						<?php
						

						while($row = sqlsrv_fetch_array($result)){
$rowId = $rowId + 1;
						?>
									<tr>
							
									<td align='center' valign='top' style="font-size:14px"><strong>

									<a href='allegation_details.php?id=<?php echo $id = $row['id']; ?>' target="_parent">
									<?php
                                    echo $id;
									?>
									</a>
									</strong></td>
							
									<td valign='top'>
                                    <?php
									echo $summary = $row['summary'];
									?>
									</td>
							
					
									<td align='center' valign='top'>
                                    <?php
									echo $country = $row['country'];
									?>
									</td>
							
									<td align='center' valign='top'>
                                    

									<strong>
									<?php
									$status = $row['status'];

									if ( $status == "Screening Review" || $status == "Pending finalization"){ 
										echo "<font color='#333333'>";
										echo $status;
										echo "<br />";
										echo "</font>";
									}else {
										echo "<font color='#999999'>";
										echo $status;
										echo "<br />";
										echo "</font>";
									}
									$resolution = $row['resolution'];
									
									if ( $resolution != "" ){	
									echo "<font color='#999999'>(";
									echo $resolution = $row['resolution'];
									echo ")";
									}
									if ( $resolution == "Opened case in CMS"){
									
									echo "<br />";
									echo $case_number = $row['case_number'];
										
									}
									
									?>
                                    </strong>
									</td>
									
                                    <td align='center' valign='top'>
									<?php
									$priority = $row['priority'];
									if ( $priority == "High" ){
														
											echo "<font color='#FF0000'>";
											echo $priority;
											echo "</font>";
										}
										if ( $priority == "Medium" ){
											echo "<font color='#FF9933'>";
											echo $priority;
											echo "</font>";	
										}
										if ( $priority == "Low" ){
											echo "<font color='#339933'>";
											echo $priority;
											echo "</font>";	
										}
									?>
									</td>
									<td align='left' valign='top'>
									<?php
									if ( $reviewed_by_officer_date = $row['reviewed_by_officer_date'] != "Unknown" ){
									$date1 = new DateTime($row['date_received']);
									$date2 = new DateTime($row['reviewed_by_officer_date']);
									
									$screening_days = $date2->diff($date1)->format("%a");
									$color = "";
									if ( $screening_days < 7 || $screening_days == 7 ){
										$color = "style='color:#339933'";
									}
									if ( $screening_days > 7 || $screening_days == 14 ){
										$color = "style='color:#FF9933'";
									}
									if ( $screening_days > 15 ){
										$color = "style='color:#FF0000'";
									}
									?>
									
									<font <?php echo $color ?> size="+1"><?php echo $screening_days; ?></font>
									<?php } ?>
                                    </td>
									<td width="151" align='left' valign='top'>
									<?php
                                    echo $team_member = $row['team_member'];
									?>
									</td>
                                    <td width="65" align='center'>
                                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                                        <a onclick="return showDialog(<?php echo $id ?>)">
                                        <img src="images/document-icon-sr.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
                           			 </a>
                                    </td>

									</tr>
                                    <tr id="<?php echo $rowId ?>" style="display: none;">
						            <td colspan="8">
                                    
                                    
<div id="entities-contain1">                                 
<table>
    <tr>
      <td width="242" align="left"><strong>Complaint Received:</strong></td>
      <td width="671"><?php
      
            $result_allegation_ckeck = sqlsrv_query($conncss,"select * from allegation_details WHERE id = '$id'"); 
            $row_allegation_check = sqlsrv_fetch_array( $result_allegation_ckeck );

        $received_date = date('F j, Y', strtotime($row_allegation_check['date_received']));
		$date_received = $row_allegation_check['date_received'];
		$reviewed_by_officer_date= $row_allegation_check['reviewed_by_officer_date'];
		
		
		
        echo $received_date;
    ?></td>
      <td width="185">&nbsp;</td>
      <td width="35">&nbsp;</td>
  </tr>
    <tr>
      <td align="left"><strong>Complaint Acknowledged:</strong></td>
      <td><?php
        $complaint_ack = $row_allegation_check['complaint_acknowledged_date'];
        $complaint_ack_newDate = date('F j, Y', strtotime($complaint_ack));
            if ($complaint_ack != ""){
                echo $complaint_ack_newDate;
            }else{
                echo "<font color='red'>Unknown</font>";											
            }
    ?></td>
      <td></td>
      <td></td>
  </tr>
  <tr>
      <td align="left" valign="top"><strong>Complaint Allocated:</strong></td>
      <td valign="top">
      <?php
        $result_allocation = sqlsrv_query($conncss,"SELECT * FROM allocation WHERE allegation_id = '$id'");
        while ($row_allocation = sqlsrv_fetch_array($result_allocation)) {
            
             if ($date_allocated = $row_allocation['date_allocated'] != "" ){
                echo $date_allocated = date('F j, Y', strtotime($row_allocation['date_allocated']));
             }else{
                echo "  (date Unknown)";
             }
             echo "&nbsp;&nbsp;( ";
              echo $team_member = $row_allocation['team_member'];
              echo " )";
            echo "<br />";
        }
      ?>
    </td>
      <td colspan="2">&nbsp;</td>
  </tr>
  
  
    
    <tr>
      <td align="left"><strong>SR submitted to Screening Officer:</strong></td>
      <td><?php
        $submitted_to_officer = $row_allegation_check['submitted_to_officer'];
        $submitted_date_officer = $row_allegation_check['submitted_date_officer'];


        if ($submitted_to_officer == "Yes" && $submitted_date_officer == "Unknown"){
            echo "Date unknown";
        }else if ($submitted_to_officer == "Yes" && $submitted_date_officer != "Unknown"){
            $submitted_date_officer_newDate = date('F j, Y', strtotime($submitted_date_officer));
            echo $submitted_date_officer_newDate;
        }else{
            echo "<font color='red'>Pending</font>";											
        }

            
        
    ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
    <tr>
      <td align="left"><strong>SR aprroved by Screening Officer:</strong></td>
      <td><?php
        $reviewed_by_officer = $row_allegation_check['reviewed_by_officer'];
        $reviewed_by_officer_date = $row_allegation_check['reviewed_by_officer_date'];
        
        if ($reviewed_by_officer == "Yes" && $reviewed_by_officer_date == "Unknown"){
            echo "<font color='red'>Date unknown</font>";
        }else if ($reviewed_by_officer == "Yes" && $reviewed_by_officer_date != "Unknown"){
            $submitted_date_officer_newDate = date('F j, Y', strtotime($reviewed_by_officer_date));
            echo $submitted_date_officer_newDate;
        }else{
            echo "<font color='red'>Pending</font>";											
        }
        
    
    ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
    <tr>
<td align="left"><strong>Complainant Updated :</strong></td>
<td><?php
      $complainant_updated = $row_allegation_check['complainant_updated'];
        $check4 = $row_allegation_check['check4'];
        if ($check4 != "checked"){
            if ($complainant_updated != ""){
				echo $complainant_updated_newDate = date_format($complainant_updated, 'F j, Y');													
            }else{
                echo "<font color='red'>Pending</font>"; 
            }
        }else{
            echo "Not Required";
        }
?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
    <tr>
<td align="left"><strong>Updated Via:</strong></td>
<td><?php
echo $updated_via = $row_allegation_check['updated_via'];
?></td>
<td>&nbsp;</td>
<td>&nbsp;</td></tr>
</table>
                                    
 </div>                                   
                          
</td>
</tr>
                        
<?php
						}


while($row_ir = sqlsrv_fetch_array($result2)){
            ?>
                        <tr>
                        <td align='center' valign='top' style="font-size:14px"><strong>
                        <?php $ir_id = $row_ir['id']; ?>
                        <strong>
                        <a href='intelligence_report_details.php?id_report=<?php echo $ir_id; ?>' target="_parent">IR<?php echo $ir_id;?></a>
                        </strong>
                        </td>
                
                        <td valign='top'>
                        <?php
                        echo $title = $row_ir['title'];
                        ?>
                        </td>
                
        
                        <td align='center' valign='top'>
                        <?php
                        echo $country = $row_ir['country'];
                        ?>
                        </td>
                
                        <td align='center' valign='top'>
                        
    
                        <strong>
                        <?php
                        echo $status = $row_ir['status'];
                        ?>
                        </strong>
                        </td>
                        
                        <td align='center' valign='top'>
                        </td>
                        <td align='left' valign='top'>
                        <?php
                        $date1 = new DateTime($row_ir['date_report_complete']);
                        $date2 = new DateTime($row_ir['reviewed_by_officer_date']);
                        
                        $screening_days = $date2->diff($date1)->format("%a");
                        $color = "";
                        if ( $screening_days < 7 || $screening_days == 7 ){
                            $color = "style='color:#339933'";
                        }
                        if ( $screening_days > 7 || $screening_days == 14 ){
                            $color = "style='color:#FF9933'";
                        }
                        if ( $screening_days > 15 ){
                            $color = "style='color:#FF0000'";
                        }
                        ?>
                        
                        <font <?php echo $color ?> size="+1"><?php echo $screening_days; ?></font>
                        </td>
                        <td width="235" align='left' valign='top'>
                        <?php
                        echo $team_member = $row_ir['member'];
                        ?>
                        </td>
                        <td width="32" align='center' valign="middle">
						<a onclick="return parent.showDialogir(<?php echo $ir_id ?>)">
                            <img src="images/ir.png" width="24" height="24" align="absmiddle" title="Quick view Intelligence Report"/>
                         </a>
                            
                        </td>
    
                        </tr>
    <?php
    }

?>
</table>
</div>

<div id="divscreeningreport" title="Screening Report Details">
        <iframe id="modalIframeIdal" frameborder="0" width="920" height="850">
        Your browser is not supported
        </iframe>
	</div>
</body>
</html>