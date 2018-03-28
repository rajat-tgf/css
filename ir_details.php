﻿<?php
require_once("includes\opendb.php");
if ( isset ($_GET['id_report'])) {
	$id = $_GET['id_report'];
	session_start(); 
	$_SESSION['report_id']=$id;
}else{
	session_start();
$id = $_SESSION['report_id'];
}
		$result = sqlsrv_query($conncss,"select * from intelligence_reports WHERE id = '$id'"); 
		$row = sqlsrv_fetch_array( $result );
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS</title>
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
	
function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}	
	
	
	
</script>






</head>
<body>
<div id="tabs">
<ul>
<li><a href="#tabs-1">Report</a></li>
<li><a href="#tabs-2">IOE Assessment</a></li>
<li><a href="#tabs-3">Entities of Interest</a></li>
<li><a href="#tabs-4">Allegations Linked</a></li>
<li><a href="#tabs-5">Intelligence Reports Linked</a></li>
<li><a href="#tabs-6">Follow Ups</a></li>
<li><a href="#tabs-7">Note / Comments</a></li>

</ul>
<div id="tabs-1">
<table align="center">
    <td>
    <a href="print_intel_report.php?id_number=<?php echo $id ?>">
            <img src="images/printer-icon.png" width="33" height="33" align="absmiddle"/>
    </a>
    </td>
    </tr>
</table>
<table width="100%" align="center" class="zui-table zui-table-rounded" style="background-color:#FFFFFF">
  <tr>
    <th height="47" colspan="2" align="center" bgcolor="#4B768D"><font color="#FFF"; size="+3"><strong>Intelligence Report</strong></font></th>
  </tr>
  <tr>
    <td width="338" valign="top" ><strong>Id</strong></td>
    <td width="1005" style="background-color:#FFFFFF; border-color:#FFFFFF">
    <strong>IR<?php echo $id;	?></strong>
    </td>
  </tr>
  <tr>
    <td valign="top" ><strong>Date information received</strong></td>
    <td style="background-color:#FFFFFF; border-color:#FFFFFF">
    <?php $date_received = $row['date_received'];
	echo $date_received_newDate = date('F j, Y', strtotime($date_received));
	?>
    </td>
  </tr>
      <tr>
    <td valign="top"><strong>Reporter</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo $reporter = $row['reporter']; ?>
    </td>
    </tr>

      <tr>
        <td valign="top"><strong>Date report completed</strong></td>
        <td style="background-color:#FFFFFF"><?php 
		$date_report_complete = $row['date_report_complete'];
		
		
		echo $date_report_completed = date('F j, Y', strtotime($date_report_complete));
		
		?></td>
      </tr>
      <tr>
    <td valign="top"><strong>Information source</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo nl2br($row['information_source']);?>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Country</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo $country = $row['country']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" ><strong>Entities of interest</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo nl2br($row['entities_interest']);?>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Entity number</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo nl2br($row['entity_number']);?>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Supporting documents?</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo $docs = $row['docs']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" class="gridtable"><strong>Urgent / Immediate action required?</strong><br>

(Further explanation)
    </td>
    <td style="background-color:#FFFFFF"><p>
      <?php echo $urgent = $row['urgent']; ?>
		<br>
        <?php echo nl2br($row['further_explanation']);?>
    </td>
  </tr>
  <tr>
    <td valign="top" class="gridtable"><strong>Title</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo nl2br($row['title']);?>
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top" style="background-color:#FFFFFF">
    <br>
    <font size="+1"><strong>1. What were  the circumstances of your contact with the source – describe?</strong></font><br>
    <br>
    <?php echo nl2br($row['circumstances']);?>
<br><br>


<font size="+1"><strong>2. Information received from source</strong></font>
<br><br>

<?php echo nl2br($row['information_recieved']);?>
<br><br>


<font size="+1"><strong>3. OIG comments and assessment</strong></font>
<br><br>

<?php echo nl2br($row['comments']);?><br>

</td></tr>
</table>
</div>  


<div id="tabs-2">

                    
<table width="100%" align="center" style="background-color:#FFFFFF">
 <?php
	$status = $row['status'];
	$submitted_to_officer = $row['submitted_to_officer'];
	$reviewed_by_officer = $row['reviewed_by_officer'];
	$team_member = $row['member'];
?>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%" align="left" valign="middle"><table width="475" class="zui-table zui-table-rounded" >
      <tr>
        <td width="145" align="right"><strong>Status :</strong></td>
        <td width="206" style="background:#FFF"><?php echo $status  = $row['status'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>days :</strong></td>
        <td style="background:#FFF"><font size="+1">
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
          <?php } ?></td>
      </tr>
      <tr>
        <td align="right"><strong>Screening Member :</strong></td>
        <td style="background:#FFF"><?php echo $member = $row['member']; ?></td>
      </tr>
    </table></td>
    <td width="50%" align="right" valign="top"><table width="475" class="zui-table zui-table-rounded" >
      <tr>
        <td width="265" align="right"><strong>Date Submitted to Officer for approval :</strong></td>
        <td width="198" style="background:#FFF">
		<?php
		if ( $submitted_to_officer == "Yes" ){
			$submitted_date_officer = $row['submitted_date_officer'];
			echo $submitted_date_newDate = date('F j, Y', strtotime($submitted_date_officer));
		}else{
			echo "<font color='red'>Pending</font>";
		
		}
		?></td>
      </tr>
      <tr>
        <td align="right"><strong>Date approved by Officer :</strong></td>
        <td style="background:#FFF">
        <?php
		if ( $reviewed_by_officer == "Yes" ){
			$reviewed_by_officer_date = $row['reviewed_by_officer_date'];
			echo $reviewed_by_officer_date_newDate = date('F j, Y', strtotime($reviewed_by_officer_date));
		}else{
			echo "<font color='red'>Pending</font>";
		
		}
		?>
        
        </td>
      </tr>
    </table></td>
    </tr>
</table>
<br>
<br>
    <?php
	$checkbox1 = $row['checkbox1'];
	$checkbox2 = $row['checkbox2'];
	$checkbox3 = $row['checkbox3'];
	$checkbox4 = $row['checkbox4'];
	$checkbox5 = $row['checkbox5'];
	$checkbox6 = $row['checkbox6'];
	$checkbox7 = $row['checkbox7'];
	$checkbox8 = $row['checkbox8'];
	$checkbox9 = $row['checkbox9'];
	$checkbox10 = $row['checkbox10'];
	$ioe_comments = $row['ioe_comments'];
	?>

    <table width="100%" align="center" style="background-color:#FFFFFF" class="zui-table zui-table-rounded">
    <tr>
      <td colspan="3"><font color="#66696C" size="+0.5"><strong>Source Evaluation</strong></font></td>
      <td colspan="3"><font color="#66696C" size="+0.5"><strong>Information/Intel Evaluation</strong></font></td>
      </tr>
    <tr>
      <td width="2%" style="background-color:#FFFFFF"><strong>A</strong></td>
      <td width="2%" style="background-color:#FFFFFF"><input name="checkbox1" type="checkbox" value="" class="ui-widget" <?php echo $checkbox1 ?>/></td><td width="39%" style="background-color:#FFFFFF"><strong>Always  reliable</strong></td>
      <td width="1%" style="background-color:#FFFFFF"><strong>1</strong></td>
      <td width="2%" style="background-color:#FFFFFF"><input name="checkbox2" type="checkbox" value="" class="ui-widget" <?php echo $checkbox2 ?>/></td><td width="54%" style="background-color:#FFFFFF"><strong>True</strong>
        (known to be true without reservation & confirmed by other sources)
      </td></tr>
    <tr>
      <td style="background-color:#FFFFFF"><strong>B</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox3" type="checkbox" value="" class="ui-widget" <?php echo $checkbox3 ?>/></td><td style="background-color:#FFFFFF"><strong>Mostly  reliable</strong></td>
      <td style="background-color:#FFFFFF"><strong>2</strong></td>
    <td style="background-color:#FFFFFF"><input name="checkbox4" type="checkbox" value="" class="ui-widget" <?php echo $checkbox4 ?>/></td><td style="background-color:#FFFFFF"><strong>Probably  true</strong>
    (known personally to source & confirmed in part by other sources)
    </td></tr>
    <tr>
      <td style="background-color:#FFFFFF"><strong>C</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox5" type="checkbox" value="" class="ui-widget" <?php echo $checkbox5 ?>/></td><td style="background-color:#FFFFFF"><strong>Sometimes  reliable</strong></td>
      <td style="background-color:#FFFFFF"><strong>3</strong></td>
    <td style="background-color:#FFFFFF"><input name="checkbox6" type="checkbox" value="" class="ui-widget" <?php echo $checkbox6 ?>/></td>
    <td style="background-color:#FFFFFF"><strong>Possibly  true</strong>
(not personally known to source but corroborated in part by other sources)
</td></tr>
    <tr>
      <td style="background-color:#FFFFFF"><strong>D</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox7" type="checkbox" value="" class="ui-widget" <?php echo $checkbox7 ?>/></td>
      <td style="background-color:#FFFFFF"><strong>Unreliable</strong></td>
      <td style="background-color:#FFFFFF"><strong>4</strong></td>
    <td style="background-color:#FFFFFF"><input name="checkbox8" type="checkbox" value="" class="ui-widget" <?php echo $checkbox8 ?>/></td>
    <td style="background-color:#FFFFFF"><strong>Cannot be judged</strong>(unconfirmed and contradicts estimate/doubtful) </td></tr>
    <tr>
      <td style="background-color:#FFFFFF"><strong>E</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox9" type="checkbox" value="" class="ui-widget" <?php echo $checkbox9 ?>/></td>
      <td style="background-color:#FFFFFF"><strong>Untested  source</strong></td>
      <td style="background-color:#FFFFFF"><strong>5</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox10" type="checkbox" value="" class="ui-widget" <?php echo $checkbox10 ?>/></td>
      <td style="background-color:#FFFFFF"><strong>Probably  false</strong>
(suspected to be false or malicious) 
</td>
    </tr>

<tr>
    <td style="background-color:#FFFFFF" colspan="6">
    <br>
	<br>
    <font size="+1"><strong>IOE comments / observations / outcome / dissemination restrictions</strong></font>
	<br>
	<?php echo nl2br($ioe_comments);?>
	</td>
  </tr>
  </table>
</div>


<div id="tabs-3">
<?php
$result_entity1 = sqlsrv_query($conncss,"SELECT id FROM entities_intel_reports WHERE report_id = '$id'");	


$entities_linked = sqlsrv_fetchall($result_entity1);
$num_entities_linked = count($entities_linked);


// IF THERE ARE ENTITIES LINKED, SHOW TABLE
if ( $num_entities_linked != 0 ){
?>

<div id="entities-contain">
  <table>
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%"></th>
                </tr>
                <?php
			$rowId = 100;
				
			$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_intel_reports WHERE report_id = '$id'");
			$all_rows = sqlsrv_fetchall($result_entity);

					foreach ($all_rows as $row_entity)
                      {
                          $rowId = $rowId + 1;
						  $profile = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_category = $row_profile_details['category'];
						  $entity_id_main_details = $row_profile_details['list_name_id'];
						  $position_profile = $row_profile_details['position'];
						  $type_profile = $row_profile_details['type'];
						  $email_profile = $row_profile_details['email1'];

						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
                        ?>
                        <tr>
                        <td>
						<?php
							if ( $type_entity != "Person" ){
								$icon = "entity-icon.png";
							}else{
								$icon = "user-silhouette-icon.png";
							}
						?>

						<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
						<?php echo $name;  
						if ( $alternative_name != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="6" >
                       <table>
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                <br />
                                <strong>Type : </strong><?php echo $type_profile; ?>
                                <br />
                                <?php 
								if ( $type_entity == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_profile; ?>
                                <br />
                                <?php } ?>
                                <table style="border:hidden">
                                <tr><td valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$entity_id_main_details'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                                <br />
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        <?php 
						}
						?>
	  </table>
      

<?php
}
?>
      
</div>
</div>

<div id="tabs-4">
<?php
	$result_allegation_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_ir_links WHERE ir_id = '$id'");
	$all_rows = sqlsrv_fetchall($result_allegation_linked);
	$num_rows = count($all_rows);
?>
<div id="entities-contain">
  <table>
                <tr>
                  <th align="center" valign="middle">Id</th>
                      <th align="center" valign="middle">Country</th>
                      <th align="center" valign="middle">Title</th>
                      <th align="center" valign="middle">Status</th>
                      <th align="center" valign="middle">Resolution</th>
                </tr>
<?php						
	
                    foreach($all_rows as $row_proactive_)
                      {
                          
						  $allegation_linked = $row_proactive_['allegation_id'];

                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$allegation_linked'");
                          $row_allegation_linked_details = sqlsrv_fetch_array($result_profile_details);
						  
						  
						  $country = $row_allegation_linked_details['country'];
						  $summary = $row_allegation_linked_details['summary'];
						  $status = $row_allegation_linked_details['status'];
						  $resolution = $row_allegation_linked_details['resolution'];
						  
						 ?>
                        <td align="center"><strong>
						<a onclick="return parent.show_sr_Popup(<?php echo $allegation_linked ?>)">
						<?php echo $allegation_linked; ?>
                        </a>
                        </strong></td>
                        
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $summary; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="center"><?php echo $resolution; ?></td>
                         
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div> 
</div>

<div id="tabs-5">

<div id="entities-contain">
                <table>
                <tr>
                  <th>Id</th>
                  <th>Country</th>
                  <th>Reporter</th>
                  <th>Title</th>
                </tr>
                <?php

                    $result_report = sqlsrv_query($conncss,"SELECT * FROM intel_reports_linked WHERE report_id = '$id'");
					
                    while($row_report = sqlsrv_fetch_array($result_report))
                      {
						  $link_report_id = $row_report['link'];
                          $result_link_report_details = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE id = '$link_report_id'");
                          $row = sqlsrv_fetch_array($result_link_report_details);
                        ?>
                        <tr>
                         <td>
							<?php 
							$dash = "IR";
							echo $dash.$id_report = $row['id']; ?>
							</td>
                             <td>
							<?php echo $country = $row['country']; ?>
							</td>
	                         <td align="left"><?php 
							 
							 echo $reporter = $row['reporter']; 
							 
							 ?></td>
							<td align="center">
                            
                            <?php echo $title = $row['title']; ?>

							</td>
                            
                            </tr>

                        <?php
                    }
				?>
				</table>


</div>


</div> 
<div id="tabs-6">


<div id="entities-contain">
<table align="center">
                <tr>
                  <th></th>
                  <th>Status</th>
                  <th>Responsable</th>
                  <th>Name</th>
                  <th>Follow up date</th>
                  <th>Created by</th>
  				</tr>
                <?php
					$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups_ir WHERE report_id = '$id' ORDER BY status");
					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $id_follow_up = $row_follow_up['id'];	  ?>
						 <tr>
							<td align="center">
                            <?php $category = $row_follow_up['category']; 
							if ( $category == "Follow up (internal)" ){
							?>
                            <img src="images/Calendar-icon-green.png" width="18" height="18" title="Follow up (internal)"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for action" ){
							?>
                            <img src="images/Calendar-icon-red.png" width="17" height="17" title="Referred to secretariat for action"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for information" ){
							?>
                            <img src="images/Calendar-icon-blue.png" width="18" height="18" title="Referred to secretariat for information"/>
                            <?php	
							}
							
							?>
							<td>
							<?php echo $status = $row_follow_up['status']; ?>
							</td>

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
                            <td>
                            <?php echo $author = $row_follow_up['member']; ?>
							</td>

                        </tr>

						<?php }?>
				</table>

</div>             
</div>             
<div id="tabs-7">
    <div id="notes-contain">
        <?php
        $notes_query = sqlsrv_query($conncss,"SELECT * FROM notes_ir WHERE report_id = '$id' ORDER BY date_note DESC, id DESC");
        $all_notes = sqlsrv_fetchall($notes_query);      
        foreach ($all_notes as $note) {
        ?>
            <table>
            <tr>
            <td valign="top" width="9">
            <img src="images/icon_person.png" alt="" width="25" height="25" align="top"/>
            </td>
            <td>
            <strong>
            <?php $date = $note['date_note'];
            echo $note['member'] ?> made a note on <?php echo $date_newDate = date('F j, Y', strtotime($date)); ?></strong>
            <br /><?php echo $note = nl2br($note['note'])?>
            </td>
            </tr>
            </table>
        <br />
        <?php }?>
        
        
        <?php
			$result_comment = sqlsrv_query($conncss,"SELECT * FROM comments_ir WHERE ir_report = '$id' ORDER BY id DESC");
			while($comment = sqlsrv_fetch_array($result_comment))  {       
			
			 ?>
				<table>
				<tr>
				<td valign="top" width="9">
				<img src="images/icon_person.png" alt="" width="25" height="25" align="top"/>
				</td>
				<td>
					 <?php
					 if ($date = $comment['request_notification'] == 'yes' ){ ?>
					 <img src="images/notification-icon-tm-128.png" title="Notification requested" width="18" height="18" align="top"/>&nbsp; 
					 <?php } ?>
                      <strong>
						<?php $date = $comment['date_comment'] ?> 
						<?php echo $comment['author'] ?> <span>made a comment on </span><span><?php echo $date_newDate = date('F j, Y', strtotime($date)); ?></span></strong>
						<p><?php echo $comment = nl2br($comment['comment'])?></p>
			
				  </td>
				  </tr>
				  </table>
			<br />
			<?php }?>
    </div>

</div>              
              


                
</div>                    
                    

            
    <div id="divIdal" title="Edit Follow up - Intelligence Report">
        <iframe id="modalIframeIden" frameborder="0" width="1050" height="710">
        Your browser is not supported
        </iframe>
	</div>               
            

</body>
</html>


