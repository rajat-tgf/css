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
<script>
	
	function showDialog(sr){
	parent.show_sr_Popup(sr);
	};
	
	
	function showDialogir(ir){
	parent.showDialogir(ir);
	};
	
	function showDialogfollowupir(id_follow_up){
	parent.show_follow_up_ir_Popup(id_follow_up);
	};
	
	function showDialogfollowup(id_follow_up){
	parent.show_follow_up_Popup(id_follow_up);
	};
</script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

</head>

                  <?php
						$quey1="select * from allegation_details ORDER BY id DESC";
						$quey2="select * from intelligence_reports ORDER BY id DESC"; 

						if (isset($_GET['sort'])) { 
						
						
						if ($_GET['sort'] == 'id')
						{
							     $quey1 = "select * from allegation_details ORDER BY id DESC"; 
						}
						
						elseif ($_GET['sort'] == 'member')
						{
								$name = $_GET['name'];
							     $quey1 = "select * from allegation_details WHERE team_member = '$name' AND status != 'Pending finalization' AND status != 'Closed' AND submitted_to_officer != 'Yes'"; 
								 $quey2 = "select * from intelligence_reports WHERE member = '$name' AND status = 'Under Review' AND submitted_to_officer != 'Yes'";
						}
						
						elseif ($_GET['sort'] == 'notallocated')
						{
							     $quey1 = "select * from allegation_details WHERE team_member = 'Not Allocated' AND status != 'Pending finalization' AND status != 'Closed' ORDER BY status"; 
								 $quey2 = "select * from intelligence_reports WHERE member = 'Not Allocated' AND status = 'Under Review'";
						}
						
						elseif ($_GET['sort'] == 'screening_review') 
						{     
								$quey1 = "select * from allegation_details WHERE status != 'Closed'";
								$quey2 = "select * from intelligence_reports WHERE status = 'Under Review'"; 
						}
						
						elseif ($_GET['sort'] == 'pending_finalization') 
						{     
								$quey1 = "select * from allegation_details WHERE status = 'Pending finalization'"; 
								$quey2 = "select * from intelligence_reports WHERE status = 'Pending finalization'";
						}
						elseif ($_GET['sort'] == 'submitted_to_officer') 
						{     
								$quey1 = "select * from allegation_details WHERE submitted_to_officer = 'Yes' AND reviewed_by_officer  = ''";
								$quey2 = "select * from intelligence_reports WHERE submitted_to_officer = 'Yes' AND reviewed_by_officer  = 'No'"; 
						}
						elseif ($_GET['sort'] == 'all') 
						{     
								$quey1 = "select * from allegation_details ORDER BY id DESC"; 
								$quey2 = "select * from intelligence_reports ORDER BY date_report_complete DESC"; 
						}
						elseif ($_GET['sort'] == 'high') 
						{     
								$quey1 = "select * from allegation_details WHERE status != 'Closed' AND priority = 'High'"; 
						}
						elseif ($_GET['sort'] == 'medium') 
						{     
								$quey1 = "select * from allegation_details WHERE status != 'Closed' AND priority = 'Medium'"; 
						}
						elseif ($_GET['sort'] == 'low') 
						{     
								$quey1 = "select * from allegation_details WHERE status != 'Closed' AND priority = 'Low'"; 
						}
						
						}
						if (isset($_REQUEST["free_text"]))
						if ($_REQUEST["free_text"]<>'') {
							$free_text = " AND id = ".sqlsrv_real_escape_string($_REQUEST["free_text"])."";	
							
							$quey1 = "SELECT * FROM allegation_details WHERE id>0".$free_text." ORDER BY id";
							$quey2 = "SELECT * FROM intelligence_reports WHERE id>0".$free_text." ORDER BY id";
							
						}
						

						$result=sqlsrv_query($conncss,$quey1);
						$all_rows = sqlsrv_fetchall($result);
						
						$result_ir=sqlsrv_query($conncss,$quey2);
						$all_rows_ir = sqlsrv_fetchall($result_ir);
						?>
<body>


<?php include("menu_list.php"); ?>




<table width="100%" border="0" align="center">

  <tr>
      <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td height="21" align="center" valign="top">
    
	<?php
    $result_1 = sqlsrv_query($conncss,"SELECT id FROM allegation_details WHERE status != 'Closed'", array(), array( "Scrollable" => 'buffered'));		
    $num_active_sr= sqlsrv_num_rows($result_1);
    
    $result_2 = sqlsrv_query($conncss,"SELECT id FROM intelligence_reports WHERE status = 'Under Review'", array(), array( "Scrollable" => 'buffered'));		
    $num_active_ir= sqlsrv_num_rows($result_2);

	//$result_checks = sqlsrv_query($conncss,"SELECT id FROM checks WHERE status = 'In progress'", array(), array( "Scrollable" => 'buffered'));
	//$num_cheks = sqlsrv_num_rows($result_checks);
   
    ?>
    <table width="358" border="0" align="center" class="gridtable">
        <tr>
          <td width="340" align="center"><a href="right_page.php?sort=screening_review" target='contentRight'>
          <strong><font color="#464646"; size="+2">Currently Active</a></font></strong>
          </td>
        </tr>
        <tr>
          <td align="center">
          <table class="gridtable3" width="100%" border="0">
          <tr><td>Screening Reports</td><td><?php echo $num_active_sr= sqlsrv_num_rows($result_1); ?></td></tr>
          <tr><td>Intelligence Reports</td><td><?php echo $num_active_ir= sqlsrv_num_rows($result_2); ?></td></tr>
          </table>
          
          </td>
        </tr>
            
    </table>
    
    
    
    </td>
    <td align="right" valign="top">&nbsp;</td>
    <td rowspan="2" align="left" valign="top">
<iframe src="dashboard_follow_ups.php" align="top" width="100%" height="300" frameborder="0" scrolling="No" marginheight="0" marginwidth="0"> 
</iframe>
    </td>
    <td rowspan="2" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
      <td height="106" align="center" valign="top">
      
      <table width="442" align="center" class="gridtable">
      <tr>
      <td width="42" align="right" valign="middle">&nbsp;</td>
      <td width="6" align="right" valign="middle">&nbsp;</td>
      <td width="344" align="left" valign="middle">&nbsp;</td>
      <td width="24" align="center" valign="middle">&nbsp;</td>
    </tr>
  <tr>
    <td align="right" valign="middle"><img src="images/allocation-icon.png" width="24" height="24" alt="Pending Allocation" /></td>
    <td align="right" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">
    <a href="right_page.php?sort=notallocated" target='contentRight'>
    <strong><font color="#464646"; size="+1">Pending Allocation</font></strong>
    </a>
    </td>
    <td align="center" valign="middle">
      <strong><font color="#999999"; size="+1">
        
        <?php
	  $result_number_allegations_no_member = sqlsrv_query($conncss,"SELECT id FROM allegation_details WHERE team_member = 'Not Allocated' AND status = 'Screening Review'", array(), array( "Scrollable" => 'buffered'));
		$num_allegations_no_member = sqlsrv_num_rows($result_number_allegations_no_member);
		 $result_number_ir_no_member = sqlsrv_query($conncss,"SELECT id FROM intelligence_reports WHERE member = 'Not Allocated' AND status = 'Under Review'", array(), array( "Scrollable" => 'buffered'));
		$num_ir_no_member = sqlsrv_num_rows($result_number_ir_no_member);
		
		echo $not_allocated = $num_allegations_no_member + $num_ir_no_member;
	?>
        </font></strong>
    </td>
    </tr>
  <tr>
    <td align="right" valign="top"><a title="business, office, suitcase, work, working icon" class="iconlink" href="https://www.iconfinder.com/icons/763507/business_office_suitcase_work_working_icon#size=128"> <img src="images/Incomplete-128.png" alt="business, office, suitcase, work, working icon" width="24" height="24" class="tiled-icon" style="max-width: 128px; max-height: 128px;" /> </a></td>
    <td align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top"><strong><font color="#464646"; size="+1">Pending Screening / Assessment</font></strong></td>
    <td align="center" valign="middle"><strong><font color="#999999"; size="+1">
	<?php
		$result_1 = sqlsrv_query($conncss,"SELECT id FROM allegation_details WHERE status = 'Screening Review' AND submitted_to_officer != 'Yes' AND team_member != 'Not Allocated'", array(), array( "Scrollable" => 'buffered'));		
		$num_active_sr= sqlsrv_num_rows($result_1);
		
		$result_2 = sqlsrv_query($conncss,"SELECT id FROM intelligence_reports WHERE status = 'Under Review' AND submitted_to_officer != 'Yes' AND member != 'Not Allocated'", array(), array( "Scrollable" => 'buffered'));		
    	$num_active_ir= sqlsrv_num_rows($result_2);

		echo $num_active_sr + $num_active_ir;
	  ?>
  </font></strong></td>
  </tr>
  <tr align="right">
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td colspan="2" align="left" valign="top">
    <table class="gridtable3" width="326" border="0">
      <?php
    $result_members = sqlsrv_query($conn,"SELECT * FROM screening_member");
	while($row_members = sqlsrv_fetch_array($result_members)){
		$member = $row_members['name'];
								
		$result_number_allegations_member = sqlsrv_query($conncss,"SELECT id FROM allegation_details WHERE team_member = '$member' AND status != 'Pending finalization' AND status != 'Closed' AND submitted_to_officer != 'Yes'", array(), array( "Scrollable" => 'buffered'));
		$num_allegations_member = sqlsrv_num_rows($result_number_allegations_member);
		
		$result = sqlsrv_query($conncss,"SELECT id FROM intelligence_reports WHERE member = '$member' AND status != 'Finalised' AND submitted_to_officer != 'Yes'", array(), array( "Scrollable" => 'buffered'));
		$num_ir_member = sqlsrv_num_rows($result);

		
		if ( $num_allegations_member != 0 || $num_ir_member != 0 ){
		?>
      <tr>
        <td width="24" align="center"><img src="images/person-icon.png" width="18" height="18" align="absmiddle"/></td>
        <td width="193" valign="bottom">
          <a href="right_page.php?sort=member&amp;name=<?php echo $member ?>" target='contentRight'>
            <font color="#464646">
              <?php
                    echo $member;
                    ?>
              </font>
            </a> (
          <?php	echo $num_allegations_member + $num_ir_member ; ?>
          ) </td>
        </tr>
      <?php
			}
  		}
	  ?>
    </table></td>
    </tr>
  <tr>
    <td colspan="4" align="right" valign="top">&nbsp;</td>
    </tr>
  <tr>
    <td align="right" valign="top"><img src="images/pending_approval.png" width="24" height="24" /></td>
    <td align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top">
    <a href='right_page.php?sort=submitted_to_officer' target='contentRight'>
    <strong><font color="#464646"; size="+1">Pending Approval</font></strong>
    </a>
    </td>
    <td align="center" valign="middle"><strong><font color="#999999"; size="+1">
	<?php
			            $result_3 = sqlsrv_query($conncss,"SELECT id FROM allegation_details WHERE submitted_to_officer = 'Yes' AND reviewed_by_officer != 'Yes'", array(), array( "Scrollable" => 'buffered'));	
						$num_sr_pending_approval= sqlsrv_num_rows($result_3);

			            $result_3 = sqlsrv_query($conncss,"SELECT id FROM intelligence_reports WHERE submitted_to_officer = 'Yes' AND reviewed_by_officer != 'Yes'", array(), array( "Scrollable" => 'buffered'));	
						$num_ir_pending_approval= sqlsrv_num_rows($result_3);
						
						echo $total_pending_approval = $num_sr_pending_approval + $num_ir_pending_approval;
						
                      ?></font></strong></td>
    </tr>
  <tr>
    <td align="right" valign="bottom"><img src="images/issue-closed.png" width="24" height="24" /></td>
    <td align="right" valign="bottom">&nbsp;</td>
    <td align="left" valign="bottom">
      <a href='right_page.php?sort=pending_finalization' target='contentRight'>
        <strong><font color="#464646"; size="+1">Pending Finalization</font></strong>
        </a>
      </td>
    <td align="center" valign="middle">
      <strong><font color="#999999"; size="+1"><?php
						$result_finalization = sqlsrv_query($conncss,"SELECT id FROM allegation_details WHERE status = 'Pending finalization'", array(), array( "Scrollable" => 'buffered'));	
						echo $num_finalization= sqlsrv_num_rows($result_finalization);
						?></font></strong></td>
  </tr>
      </table>
      
      </td>
      <td align="right" valign="top"></td>
  </tr>
  <tr>
    <td height="37" align="right" valign="bottom">&nbsp;</td>
    <td height="37" align="right" valign="bottom">&nbsp;</td>
    <td height="37" align="right" valign="bottom">
    <a href="right_page.php?sort=all" target='contentRight'></a></td>
    <td height="37" align="center" valign="bottom"><a href="right_page.php?sort=all" target='contentRight'><img src="images/alllist.png" width="35" height="35" align="absbottom"/></a></td>
    <td height="37" align="right" valign="bottom">&nbsp;</td>
  </tr>
  <tr>
  <td colspan="5">


<div id="entities-contain" align="center">
<table>
            <tr>
              <th align="center" valign="middle">#</th>
              <th align="center" valign="middle">Title</th>
              <th align="center" valign="middle">Country</th>
              <th align="center" valign="middle">Status</th>
              <th align="center" valign="middle">Priority</th>
              <th align="center" valign="middle">Days</th>
              <th align="center" valign="middle">Member in Charge</th>
              <th align="center" valign="middle"></th>
            </tr>
                        
						<?php
						

						foreach ($all_rows as $row){

						?>
									<tr>
							
									<td style="font-size:14px;">
                                        <strong>
                                        <a href='allegation_details.php?id=<?php echo $id = $row['id']; ?>' target="_parent">
                                        <?php
                                        echo $id;
                                        $type_allegation = $row['type_allegation'];
                                        if ( $type_allegation == 'Proactive' ){ ?>
                                        &nbsp;<img src="images/Pro-icon1.png" width="20" height="20" align="absmiddle"/>
                                        <?php
                                        }
                                        ?>
                                        </a>
                                        </strong>
                                    </td>
							
									<td><?php echo $summary = $row['summary']; ?></td>
							
					
									<td><?php echo $country = $row['country']; ?></td>
							
									<td>
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
									
									if ( $resolution != "" && $status =="Closed" ){	
									echo "<font color='#999999'>(";
									echo $resolution = $row['resolution'];
									echo " ";
									echo $case_number = $row['case_number'];
									echo ")";
									}
									?>
                                    </strong>
									</td>
                                    <?php
									$priority = $row['priority'];
									$bgcolor = "";
									$colorpriority = "";

									if ( $priority == "High" ){
										$colorpriority = "style='color:#C10005'";
										$bgcolor = "bgcolor='#EC797C'";
									}
									if ( $priority == "Medium" ){
										$colorpriority = "style='color:#FF9933'";
										$bgcolor = "bgcolor='#FDE9AC'";
									}
									if ( $priority == "Low" ){
										$colorpriority = "style='color:#339933'";
										$bgcolor = "bgcolor='#B0E18C'";
									}
																		
									?>
									<td <?php echo $bgcolor ?>>
									
                                    <font <?php echo $colorpriority ?>><?php echo $priority; ?></font>
									</td>
                                    <td>
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
									
									<font <?php echo $color ?>><?php echo $screening_days; ?></font>
									<?php } ?>
                                    </td>
									
									<td><?php echo $team_member = $row['team_member'];?></td>
                                    <td>
									<a onclick="return parent.showDialog(<?php echo $id ?>)">
                                        <img src="images/document-icon-sr.png" width="21" height="21" align="absmiddle" title="Quick view Screening Report"/>
                            		</a>
									</td>
									</tr>
						<?php
                        }
			
			
									foreach ($all_rows_ir as $row_ir){

						?>
									<tr>
							
									<td style="font-size:14px;">
                                    <?php $ir_id = $row_ir['id']; ?>
                                        <strong>
                                        <a href='intelligence_report_details.php?id_report=<?php echo $ir_id; ?>' target="_parent">IR<?php echo $ir_id;?></a>
                                        </strong>
                                    </td>
							
									<td><?php echo $title = $row_ir['title']; ?></td>
							
					
									<td><?php echo $country = $row_ir['country']; ?></td>
							
									<td>
									<strong>
									<?php
									$status = $row_ir['status'];

									if ( $status == "Under Review"){ 
										echo $status;
									}else {
										echo "<font color='#333333'>";
										echo $status;
										echo "</font>";
									}
									?>
                                    </strong>
									</td>
                                    <td>
                                    </td>
                                    <td>
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
									
									<font <?php echo $color ?>><?php echo $screening_days; ?></font>
                                    </td>
									
									<td><?php echo $team_member = $row_ir['member'];?></td>
                                    <td>
									<a onclick="return parent.showDialogir(<?php echo $ir_id ?>)">
                                        <img src="images/ir.png" width="21" height="21" align="absmiddle" title="Quick view Intelligence Report"/>
                            		</a>
									</td>
									</tr>
			<?php
            }
            ?>

</table>
</div>
</td></tr>
</table>




</body>
</html>