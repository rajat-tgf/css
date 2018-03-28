<?php
require_once("includes\\opendb.php");

if ( isset ($_GET['allegation_id'])) {
	$id = $_GET['allegation_id'];
}

$result_allegation = sqlsrv_query($conncss,"select * from allegation_details WHERE id = '$id'"); 
$row_allegation = sqlsrv_fetch_array( $result_allegation );
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title></title>

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

 <script>
    $(function() {
    $( "#tabs" ).tabs();
    });
 </script>
    
<style type="text/css">
table.gridtabletitle {
font-size:11px;
color:#EFEFEF;

}
table.gridtabletitle th {
font-size:13px;
border-width: 1px;
color:#06C;
padding: 3px;
border-color: #666;
border-spacing:2px;

}

table.gridtablerisk {
	font-family:'century gothic', arial, sans-serif;
	background-color: #fafafa;
	border: none;
	border-collapse: collapse;
	border-spacing: 0px;
	font-size: 11px;
}
table.gridtablerisk td {
	font-family:'century gothic', arial, sans-serif;
	font-size: 13px;
	background-color: #fafafa;
	padding-top: 4px;
	padding-bottom: 4px;
	padding-left: 8px;
	padding-right: 0px;
}
</style>


<script>
function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}
</script>

</head>

<div id="tabs">
<ul>
<li><a href="#tabs-1">Screening Report</a></li>
<li><a href="#tabs-2">Comments / Notes</a></li>
<li><a href="#tabs-3">Entities of Interest</a></li>
<li><a href="#tabs-4">Intelligence Reports Linked</a></li>

<?php	
	  $type_allegation = $row_allegation['type_allegation'];
if ( $type_allegation == 'Proactive' ){ 
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM proactive_link WHERE id = '$id'", array(), array( "Scrollable" => 'buffered'));
	$num_rows = sqlsrv_num_rows($result_proactive_linked);
?>
<li><a href="#tabs-6">Allegations Linked (<?php echo $num_rows ?>)</a></li><?php
}
?>

</ul>
<div id="tabs-1">

<table width="100%" align="right">
<tr>
<td align="right">
    <a href="print_report.php?id_number=<?php echo $id ?>">
    <img src="images/printer-icon.png" width="35" height="35" alt="Print" />
    </a>
</td>
</tr>
</table>


<div id="toptitle" align="center"><?php echo $id; ?> - <?php echo $row_allegation['country']; ?></div>

<!--GENERAL INFORMATION-->

<div class="form-style-5">
<fieldset>
<legend><span class="number">1</span> General Information</legend>

<table class="report">
<?php
	
	//SEARCH IF THERE IS ANY PROACTIVE LINKED
	
	 $result_linked_proactive = sqlsrv_query($conncss,"SELECT * FROM proactive_link WHERE linked_to = '$id'");
	 $all_linked = sqlsrv_fetchall($result_linked_proactive);
	 $linkedrows = count($all_linked);
        if ( $linkedrows != 0 ){ ?>
        <tr>
        <td colspan="5" align="center">
        <?php
			$row_linked_pro = $all_linked[0];
			$proactive_allegation  = $row_linked_pro['id'];
			$result_details_proactive = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$proactive_allegation'");
			$row_details = sqlsrv_fetch_array($result_details_proactive);
			$proactive_country  = $row_details['country'];
		?>
            <font color="#8C0000">
			<?php
			echo  "This allegation is linked to Proactive CSS ".$proactive_allegation. " - ". $proactive_country; ?>
			<a onclick="return showDialogsr(<?php echo $proactive_allegation ?>)">
            <img src="images/document-icon-sr.png" width="21" height="21" align="top" title="Quick view Screening Report"/>
            </a>
            </font>
        </td>
        </tr>
		<?php	
        } 
		?>
<tr>
<td><strong>Title</strong></td>
<td colspan="3"><?php echo $summary = $row_allegation['summary']; ?></td>
<td rowspan="7">
<!--  MAIN DETAILS OF SR-->
     <table align="right">
        <tr>
          <td><strong>Priority :</strong></td>
          <td>
            <?php echo $priority  = $row_allegation['priority'];?>
            </td>
          </tr>
        <tr>
          <td><strong>Status :</strong></td>
          <td>
            <?php echo $status  = $row_allegation['status'];?>
            </td>
          </tr>
        <tr>
          
          <td><strong>Conclusion :</strong></td>
          <td><?php echo $resolution = $row_allegation['resolution']; ?> <?php echo $case_number = $row_allegation['case_number'];?></td>
          
          </tr>
        <tr>
          <td><strong>Date received :</strong></td>
          <td><?php
                            echo $date_received_newDate = date('F j, Y', strtotime($row_allegation['date_received']));
                        ?></td>
          </tr>
        <tr>
          <td><strong>Screening days :</strong></td>
          <td>
            <?php
              if ( $reviewed_by_officer_date = $row_allegation['reviewed_by_officer_date'] != "Unknown" ){
                    $date1 = new DateTime($row_allegation['date_received']);
                    $date2 = new DateTime($row_allegation['reviewed_by_officer_date']);
                    
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
          <td><strong>Prepared by :</strong></td>
          <td>
            <?php 
                if ( $team_member = $row_allegation['team_member'] == "" ){
                    echo "<font color='red'>To be allocated";
                    echo "</font>";
                    
                }else{
                    echo $team_member = $row_allegation['team_member'];
                }

                $submitted_to_officer = $row_allegation['submitted_to_officer'];
                $submitted_date_officer = $row_allegation['submitted_date_officer'];
                
                if ( $submitted_to_officer != "" ){
                    echo " - <font color='green'>";
                    echo $submitted_date_officer_newDate = date('F j, Y', strtotime($submitted_date_officer));
                    echo "</font>";
                } ?>
            </td>
          </tr>
        <tr>
          <td><strong>Approved by :</strong></td>
          <td>
          <?php
            $approved_by = $row_allegation['approved_by'];
            
            $submitted_to_officer = $row_allegation['submitted_to_officer'];
            $reviewed_by_officer = $row_allegation['reviewed_by_officer'];
            $reviewed_by_officer_date = $row_allegation['reviewed_by_officer_date'];
            
            
            if ( $approved_by != "" && $reviewed_by_officer != ""){
                echo $approved_by;
                echo " - <font color='green'>";
                echo $reviewed_by_officer_date_newDate = date('F j, Y', strtotime($reviewed_by_officer_date));
                echo "</font>";
            }else{
                echo "<font color='red'>Pending</font>";	
            } ?>
            </td>
          </tr>
        </table>
  </td>
</tr>
<tr>
  <td><strong>Priority :</strong></td>
  <td>
    <?php echo $priority  = $row_allegation['priority']; ?>
</td>
  <td><strong>Method of referral :</strong></td>
  <td><?php echo $received_via  = $row_allegation['received_via']; ?></td>
  </tr>
<tr>
<td><strong>Disease area :</strong></td>
<td><?php echo $disease_area  = $row_allegation['disease_area']; ?></td>
<td><strong>Referred from :</strong></td>
<td><?php echo $referred_from  = $row_allegation['referred_from']; ?></td>
</tr>
  <tr>
   <td ><strong>Related to previous allegations?</strong></td>
    <td><?php echo $previous_allegations = $row_allegation['previous_allegations'];?></td>
    <td><strong>Source Category :</strong></td>
    <td><?php echo $source_category  = $row_allegation['source_category']; ?></td>
    </tr>
     <tr>
     <td><strong>Allegation related : </strong></td>
        <td>
        <?php
            $allegation_related = $row_allegation['allegation_related'];
            $result_country_allegation_related = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$allegation_related'"); 
            $row_country_allegation_related = sqlsrv_fetch_array($result_country_allegation_related);
            $country_related = $row_country_allegation_related['country'];
            $fulltext_allegation_related = $allegation_related." - ".$country_related;
        echo $fulltext_allegation_related;?>
        </td>
        <td><strong>Source Sub-Category :</strong></td>
        <td><?php echo $source_subcategory  = $row_allegation['source_subcategory']; ?></td>
        </tr>
  <tr>
    <td valign="top"><strong>Primary Level of wrongdoing :</strong></td>
    <td valign="top"><?php echo $wrongdoing1  = $row_allegation['wrongdoing_level1']; ?></td>
    <td colspan="2" valign="top">&nbsp;</td>
    </tr>
  <tr>
    <td valign="top"><strong>Secondary Level of wrongdoing :</strong></td>
    <td valign="top"><?php echo $wrongdoing2  = $row_allegation['wrongdoing_level2']; ?></td>
    <td colspan="2" valign="top">&nbsp;</td>
    </tr>
</table>
</fieldset>
</div> 


<!--GRANT DETAILS-->

<div class="form-style-5">
<?php
$checkbox8 = $row_allegation['checkbox8'];
$checkbox9 = $row_allegation['checkbox9'];
$checkbox10 = $row_allegation['checkbox10'];
$checkbox11 = $row_allegation['checkbox11'];
$checkbox12 = $row_allegation['checkbox12'];
$checkbox13 = $row_allegation['checkbox13'];
$checkbox14 = $row_allegation['checkbox14'];
$checkbox15 = $row_allegation['checkbox15'];
$checkbox16 = $row_allegation['checkbox16'];
$checkbox17 = $row_allegation['checkbox17'];
$checkbox18 = $row_allegation['checkbox18'];
$checkbox19 = $row_allegation['checkbox19'];
$checkbox20 = $row_allegation['checkbox20'];
$checkbox21 = $row_allegation['checkbox21'];
?> 
<fieldset>
<legend><span class="number">2</span> Grants Details </legend>

<table class="report" width="100%">
<tr>
  <td width="25%" valign="top">

       <div id="entities-contain">
      <table>
      <tr>
      <th colspan="4"><strong>Health Products</strong></th>
      </tr>
            <tr><td><input name="checkbox9" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox9 ?>/></td><td>ART</td>
              <td><input name="checkbox12" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox12 ?>/></td><td>ACT</td></tr>
            <tr><td><input name="checkbox10" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox10 ?>/></td><td>ITNS & LLINS</td>
              <td ><input name="checkbox13" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox13 ?>/></td>
              <td>Condoms</td>
            </tr>
            <tr>
              <td><input name="checkbox11" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox11 ?>/></td>
              <td>Syringes / Needles</td>
              <td><input name="checkbox14" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox14 ?>/></td>
              <td>Other</td>
            </tr>
      </table>
  </div>      
  </td>
  
  
   <td width="100%" rowspan="3" valign="top">
		<?php
        $result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_grant_links WHERE allegation_id = '$id'");
        $all_rows = sqlsrv_fetchall($result_proactive_linked);
        $num_rows = count($all_rows);
        ?>  
        <div id="entities-contain">
        <table>
                <tr>
                  <th>Grant Number</th>
                  <th>Title</th>
                </tr>
                <?php
				
				if ($num_rows != 0){
										
                foreach($all_rows as $row) {
                        $id_grant = $row['id_grant'];
                        $grant_number = $row['grant_number'];
                        $result_grant_details = sqlsrv_query($conn,"SELECT grant_title FROM grant_data WHERE grant_number = '$grant_number'");	
                        $row_details = sqlsrv_fetch_array($result_grant_details);
                        
                      ?>
                         <tr>
                             <td>
                            <a href="#" onclick="parent.show_grant_details_Popup('<?php echo $grant_number ?>')">
                            <?php 
                            echo $grant_number; ?>
                            </a>
                            </td>
                             <td>
                            <?php echo $grant_title = $row_details['grant_title']; ?>
                            </td>
	                       </tr>
                        <?php 
                        }
				}else{ ?>
                <tr><td colspan="2">No grants linked</td></tr>
                <?php } ?>
                </table>
        
        </div>
     
     
     
     <?php
	 $grant_number = $row_allegation['grant_number'];
	 if ($grant_number != ""){
	 ?>
        <table width="100%">
        <tr>
        <td width="9%" valign="top"><strong>Comments</strong></td>
        <td width="91%">
        <?php 
        echo nl2br($grant_number);?>
        </td>
        </tr>
        </table> 
    <?php } ?>
  </td>
  
  </tr>
<tr>
  <td valign="top">
    <div id="entities-contain">
      <table>
      <tr>
      <th colspan="4"><strong>Non - Health Products</strong></th>
      </tr>
        <tr>
          <td><input name="checkbox15" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox15 ?>/></td>
          <td style="background:#FFF">Vehicle</td>
          <td><input name="checkbox18" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox18 ?>/></td>
          <td style="background:#FFF">Training</td>
          </tr>
        <tr>
          <td><input name="checkbox16" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox16 ?>/></td>
          <td>Petrol</td>
          <td><input name="checkbox19" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox19 ?>/></td>
          <td>Food vouchers</td>
          </tr>
        <tr>
          <td><input name="checkbox17" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox17 ?>/></td>
          <td>Office furniture</td>
          <td><input name="checkbox20" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox20 ?>/></td>
          <td>Other</td>
          </tr>
        </table>
      </div>      
    
  </td>
  </tr>
<tr>
  <td valign="top">
       <div id="entities-contain">
      <table>
      <tr>
      <th colspan="2"><strong>Other</strong></th>
      </tr>
        <tr>
          <td><input name="checkbox21" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox21 ?>/></td>
          <td>Recruitment / HR</td>
          </tr>
        <tr>
          <td><input name="checkbox8" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox8 ?>/></td>
          <td>Procurement related</td>
          </tr>
        </table>
      </div> 
    
  </td>
  </tr>
</table>  
</fieldset>
</div> 


<!--ALLEGATIONS DETAILS-->
<div class="form-style-5">
<fieldset>
<legend><span class="number">3</span> Allegations Details</legend>

<?php
    $allegations = $row_allegation['allegations'];
    if ( $allegations != "" ){ ?>
	       	<table width="100%" class="report">
            <tr>
            <td width="51%" valign="top">
            
            <table>
            <tr>
            <td><strong>Category :</strong></td>
            <td width="432" align="left">
            <?php echo $category_type  = $row_allegation['category_type']; ?>
            </td>
            </tr>
            <tr>
              <td><strong>Subcategory :</strong></td>
              <td align="left"><?php echo $sub_category_type  = $row_allegation['sub_category_type']; ?></td>
            </tr>
        </table>
        
        </td>
            <td width="49%"valign="top"><table>
              <tr>
                <td valign="top" ><strong>Other categories related</strong></td>
                <td colspan="2"  style="background:#FFF"><?php
					$checkbox1 = $row_allegation['checkbox1'];
					$checkbox2 = $row_allegation['checkbox2'];
					$checkbox3 = $row_allegation['checkbox3'];
					$checkbox4 = $row_allegation['checkbox4'];
					$checkbox5 = $row_allegation['checkbox5'];
					$checkbox6 = $row_allegation['checkbox6'];
					$checkbox7 = $row_allegation['checkbox7'];
					?>
                  <table style="background:#FFF" BORDER=0>
                    <tr>
                      <td style="background:#FFF"><input name="checkbox1" type="checkbox" value="" class="ui-widget" <?php echo $checkbox1 ?>/></td>
                      <td style="background:#FFF">Corruption</td>
                      <td style="background:#FFF"><input name="checkbox2" type="checkbox" value="" class="ui-widget" <?php echo $checkbox2 ?>/></td>
                      <td style="background:#FFF">Fraud</td>
                    </tr>
                    <tr>
                      <td style="background:#FFF"><input name="checkbox3" type="checkbox" value="" class="ui-widget" <?php echo $checkbox3 ?>/></td>
                      <td style="background:#FFF">Coercion</td>
                      <td style="background:#FFF"><input name="checkbox4" type="checkbox" value="" class="ui-widget" <?php echo $checkbox4 ?>/></td>
                      <td style="background:#FFF">Collusion</td>
                    </tr>
                    <tr>
                      <td style="background:#FFF"><input name="checkbox5" type="checkbox" value="" class="ui-widget" <?php echo $checkbox5 ?>/></td>
                      <td style="background:#FFF">Non-Compliance with laws / Grant agreements</td>
                      <td style="background:#FFF"><input name="checkbox6" type="checkbox" value="" class="ui-widget" <?php echo $checkbox6 ?>/></td>
                      <td style="background:#FFF">Human Rights Violations</td>
                    </tr>
                    <tr>
                      <td style="background:#FFF"><input name="checkbox7" type="checkbox" value="" class="ui-widget" <?php echo $checkbox7 ?>/></td>
                      <td style="background:#FFF">Product Issues (JIATF)</td>
                      <td style="background:#FFF"></td>
                      <td style="background:#FFF"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        
  </tr>
        
        <tr>
        <td colspan="2">
         <?php echo nl2br($allegations); ?>
         </td>
  </tr>
        </table>
	<?php }else{ 

    $risk_query = sqlsrv_query($conncss,"SELECT * FROM risk_types WHERE allegation_id = '$id' ORDER BY action DESC");
	$all_risk_type = sqlsrv_fetchall($risk_query);      
	foreach ($all_risk_type as $row_risk_type) {
		$risk_id = $row_risk_type['id'];
		$risk_type = $row_risk_type['risk_type'];
		$category_type = $row_risk_type['category_type'];
		$sub_category_type = $row_risk_type['sub_category_type'];
		$risk = $row_risk_type['risk'];
		$action = $row_risk_type['action'];
		$bcolor = "";
		if ( $risk_type == "Programmatic & Performance Risks"){
			$bcolor = "steelblue";
		}
		if ( $risk_type == "Financial & Fiduciary Risks"){
			$bcolor = "#C6C68C";
		}
		if ( $risk_type == "Health Services & Products Risks"){
			$bcolor = "#F93";
		}
		if ( $risk_type == "Governance, Oversight & Management Risks"){
			$bcolor = "#FF6262";
		}
    ?>       
        <table width="99%" class="gridtablerisk">
        <tr>
        <td width="1" style="background-color: <?php echo $bcolor ?>;">
        </td>
        <td width="406" valign="top">
          <strong>Category:&nbsp;&nbsp;</strong><?php echo $category_type; ?><br />
          <strong>Sub-Category:&nbsp;&nbsp;</strong><?php echo $sub_category_type; ?><br />
          <strong>Risk Type:&nbsp;&nbsp;</strong><?php echo $risk_type; ?><br />
          <strong>Risk:&nbsp;&nbsp;</strong><?php echo $risk; ?><br />
          <strong>Action:&nbsp;&nbsp;</strong><?php echo $action; ?>
          </td>
        <td width="841" valign="top"><?php echo $description = nl2br($row_risk_type['description'])?></td>
        <td width="76" valign="top">
		</td>
        </tr>
        </table>
        <br />
   <?php } } ?>
</fieldset>
</div>


<!--ASSESSMENT AND CONCLUSION-->

<div class="form-style-5">
<fieldset>
<legend><span class="number">4</span> Assessment and Conclusion</legend>
    <table class="report">
    <tr>
        <td><?php echo nl2br($comments = $row_allegation['comments']);?>
          </td>
        </tr>
    </table>  <br />
    <table class="report">
    <tr>
        <td><strong><font color="#FF0000">Conclusion and recommendation</font></strong></td>
        <td><?php echo $resolution = $row_allegation['resolution'];?>
          </td>
        </tr>
    </table>  
</fieldset>
</div>

<!--OLD CASE SUMMARY-->
    <?php
    $case_summary = $row_allegation['case_summary'];
    if ( $case_summary != "" ){
    ?>
        <table width="100%" class="report">
        <tr>
        <td valign="top">
            <div class="form-style-5">
                <fieldset>
                <legend><span class="number">5</span> Case Summary</legend>
                <?php
                    echo nl2br($case_summary);
                ?>
                </fieldset>
            </div>
        </td>
        </tr>
        
        </table>
    <?php } ?>


</div>

<div id="tabs-2">



<div id="notes-contain">
<?php

 $comments_query = sqlsrv_query($conncss,"SELECT * FROM comments WHERE allegation_id = '$id' ORDER BY id DESC");
	$all_comments = sqlsrv_fetchall($comments_query);      
	foreach ($all_comments as $comment) {
    ?>
        <table>
        <tr>
        <td valign="top" width="9">
        <img src="images/icon_person.png" alt="" width="25" height="25" align="top"/>
        </td>
        <td>
        <div id="popup"><strong>
        <?php
        if ($date = $comment['request_notification'] == 'yes' ){ ?>
        <img src="images/notification-icon-tm-128.png" title="Notification requested" width="18" height="18" align="top"/> - 
        <?php } ?>
        <?php $date = $comment['date_comment'] ?> 
        <?php echo $comment['author'] ?> <span>made a comment on </span><span><?php echo $date_newDate = date('F j, Y', strtotime($date)); ?></span></strong>
        <p><?php echo $comment = nl2br($comment['comment'])?></p>
        </div>
        </td>
        </tr>
        </table>
		<br />
	<?php }?>
<br />



<table align="left" >
 <tr>
<td colspan="2" align="left"><font size="+1"><strong>Notes</strong></font></td>
</tr>
</table>
<br />



<?php
$notes_query = sqlsrv_query($conncss,"SELECT id, allegation_id, date_note, member, note FROM notes WHERE allegation_id = '$id' ORDER BY date_note DESC, id DESC");
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

</div>


</div>

<div id="tabs-3">

<table width="100%" class="gridtabletitle">
<tr><th align="left">
  <strong>Allegations reported to OIG by</strong></th></tr>
</table>


<div id="entities-contain">

<?php

	$complainant_id = $row_allegation['complainant'];
	$result_complainant_profile = sqlsrv_query($conncss,"select * from profiles WHERE id = '$complainant_id'"); 
	$row_result_complainant_profile = sqlsrv_fetch_array($result_complainant_profile);
	
	
	$list_name_id = $row_result_complainant_profile['list_name_id'];
	$result_complainant_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$list_name_id'"); 
	$row_result_complainant_main_details = sqlsrv_fetch_array($result_complainant_main_details);
	
	$complainant = $row_result_complainant_main_details['name'];
	$alternative_name_complainant = $row_result_complainant_main_details['alternative_name'];
	$accro = $row_result_complainant_main_details['accro'];

	$type_entity_complainant = $row_result_complainant_main_details['type_entity'];
	
	$category_complainant = $row_result_complainant_profile['category'];
	$position_comppainant = $row_result_complainant_profile['position'];

	$type_complainant = $row_result_complainant_profile['type'];
	$email1_complainant = $row_result_complainant_profile['email1'];
	$city_complainant = $row_result_complainant_profile['city'];
	$country_complainant = $row_result_complainant_profile['country'];
	
	$whistleblower_protection = $row_result_complainant_profile["whistleblower_protection"];

	?>

  <table id="entities-contain">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%"></th>

                </tr>
                <?php
				$rowId = 0;
                ?>
                        <tr>
                        <td>
						<?php
							if ( $type_entity_complainant != "Person" ){
								$icon = "entity-icon.png";
							}else{
								$icon = "user-silhouette-icon.png"; 
							}
								
							?>
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>

							<?php echo $complainant;  ?>
                        <?php    
							
							if ( $alternative_name_complainant != "" ){
								echo "<br />";
								echo "<font size='-1' color='#999999'>";
								echo "( ".$alternative_name_complainant." )";
								echo "</font>";
							}
							?>
                        </td>
                        <td align="center"><?php echo $type_entity_complainant; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country_complainant; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong></font>
                                <font color="#993333">
                                <?php echo $category_complainant;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $whistleblower_protection == "Yes" ){
                                ?>
                                <img src="images/Protect-Red-icon.png" width="23" height="23" align="top" title="Whistleblower Protection"/>
                            <?php
                                }
                                ?>
                                <br />
                                <strong>Type : </strong><?php echo $type_complainant; ?>
                                <br />
                                <?php 
								if ( $type_entity_complainant == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_comppainant; ?>
                                <br /><?php } ?>
                                
                                
                          <table style="border:hidden">
                                <tr><td width="15%" valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                </td><td width="86%">

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$list_name_id'"); 
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
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
				</table>
      
</div> 
<?php

$num_subjects = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_linked2 = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_linked2);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_linked2[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_subject_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Subject" ){
		$num_subjects = $num_subjects + 1; 
	}
}

// IF THERE ARE SUBJECTS LINKED, SHOW TABLE
if ( $num_subjects != 0 ){
?>
<br />
<table width="800" class="gridtabletitle">
<tr><th align="left">
  <strong>Subjects (</strong><?php echo $num_subjects; ?>)</th></tr>
</table>

<div id="entities-contain">
  <table id="entities-contain">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%"></th>
                </tr>
                <?php
				$rowId = 100;
				
				
			$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
			$all_linked3 = sqlsrv_fetchall($result_case_linked);
			$num_rows = count($all_linked3);
			
			if ( $num_rows == 0 ){
				
				$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
			
			}else{
				$row_case_number = $all_linked3[0];
				$case_linked = $row_case_number['case_number'];
				$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
				
			}
	
                    while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_cms = $row_entity['cms'];
						  $profile_subject_id_linked = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked' AND category = 'Subject'");
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
						  if ( $profile_category == "Subject" ){
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong></font>
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
                                <tr><td width="15%" valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                </td><td width="86%">

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
						}}
						?>
				</table>
      
</div> 
<?php
}
?>
<?php

$num_witness = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_linked4 = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_linked4);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_linked4[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_witness_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_witness_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Witness" ){
		$num_witness = $num_witness + 1; 
	}
}

// IF THERE ARE WITNESS LINKED, SHOW TABLE
if ( $num_witness != 0 ){
?>
<br />
<table width="800" class="gridtabletitle">
<tr><th align="left">
  <strong>Witnesses (</strong><?php echo $num_witness; ?>)</th></tr>
</table>

<div id="entities-contain">


  <table id="entities-contain">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%"></th>
                </tr>
                <?php
					$rowId = 200;
					
					$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
					$all_linked7 = sqlsrv_fetchall($result_case_linked);
					$num_rows = count($all_linked7);
					
					if ( $num_rows == 0 ){
						
						$result_entity_witness = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
					}else{
						$row_case_number = $all_linked7[0];
						$case_linked = $row_case_number['case_number'];
						$result_entity_witness = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
						
					}
					
                    while($row_entity_witness = sqlsrv_fetch_array($result_entity_witness))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_cms = $row_entity_witness['cms'];
						  $profile_witness_id_linked = $row_entity_witness['profile_id'];
                          $result_profile_details_witness = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_witness_id_linked'");
                          $row_profile_details_witness = sqlsrv_fetch_array($result_profile_details_witness);
						  
						  $profile_id = $row_profile_details_witness['id'];
						  $profile_category = $row_profile_details_witness['category'];
  						  $witness_protection = $row_profile_details_witness["witness_protection"];
						  $entity_id_main_details = $row_profile_details_witness['list_name_id'];
						  $position_profile = $row_profile_details_witness['position'];
						  $type_profile = $row_profile_details_witness['type'];
						  $email_profile = $row_profile_details_witness['email1'];
						  
						  
						  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  if ( $profile_category == "Witness" ){
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $witness_protection == "Yes" ){
                                ?>
                                <img src="images/Protect-Blue-icon.png" width="23" height="23" align="top" title="Witness Protection"/>
                            <?php
                                }
                                ?>
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
                                <tr><td width="15%" valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                </td><td width="86%">

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
						}}
						?>
  </table>
      
</div> 
<?PHP
}
?>
<?php

$num_whistleblowers = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_linked8 = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_linked8);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_linked8[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_whistleblower_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_whistleblower_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Whistleblower" ){
		$num_whistleblowers = $num_whistleblowers + 1; 
	}
}

// IF THERE ARE Whistleblowers LINKED, SHOW TABLE
if ( $num_whistleblowers != 0 ){
?>
<br />
<table width="800" class="gridtabletitle">
<tr><th align="left">
  <strong>Whistleblowers (</strong><?php echo $num_whistleblowers; ?>)</th></tr>
</table>


<div id="entities-contain">

<table id="entities-contain">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%"></th>
                </tr>
                <?php
					$rowId = 250;
					
$num_whistleblowers = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_linked9 = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_linked9);

if ( $num_rows == 0 ){
	
	$result_entity_bw = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_linked9[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity_bw = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
					
					
					
					//$result_entity_bw = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
					
				
                    while($row_entity_bw = sqlsrv_fetch_array($result_entity_bw))
                      {
                          $rowId = $rowId + 1;
						  $profile_bw_id_linked = $row_entity_bw['profile_id'];
						  
                          $result_profile_details_bw = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_bw_id_linked'");
                          $row_profile_details_bw = sqlsrv_fetch_array($result_profile_details_bw);
						  $profile_category = $row_profile_details_bw['category'];
  						  $whistleblower_protection = $row_profile_details_bw["whistleblower_protection"];
						  
						  $entity_id_main_details = $row_profile_details_bw['list_name_id'];
						  $position_profile = $row_profile_details_bw['position'];
						  $type_profile = $row_profile_details_bw['type'];
						  $email_profile = $row_profile_details_bw['email1'];
						  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  if ( $profile_category == "Whistleblower" ){
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $whistleblower_protection == "Yes" ){
                                ?>
                                <img src="images/Protect-Red-icon.png" width="23" height="23" align="top" title="Whistleblower Protection"/>
                            <?php
                                }
                                ?>
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
                                <tr><td width="15%" valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                </td><td width="86%">

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
						}}
						?>
  </table>
      
</div> 
<?PHP
}
?>

<?php

$num_reporters = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_linkeda = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_linkeda);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_linkeda[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_reporter_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_reporter_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Reporter" ){
		$num_reporters = $num_reporters + 1; 
	}
}

// IF THERE ARE Whistleblowers LINKED, SHOW TABLE
if ( $num_reporters != 0 ){
?>
<br />
<table width="800" class="gridtabletitle">
<tr><th align="left">
  <strong>Reporters (</strong><?php echo $num_reporters; ?>)</th></tr>
</table>



<div id="entities-contain">

<table id="entities-contain">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%"></th>
                </tr>
                <?php
					$rowId = 275;
					
					
					$result_entity_reporter = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
				
                    while($row_entity_reporter = sqlsrv_fetch_array($result_entity_reporter))
                      {
                          $rowId = $rowId + 1;
						  $profile_reporter_id_linked = $row_entity_reporter['profile_id'];
						  
                          $result_profile_details_reporter = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_reporter_id_linked'");
                          $row_profile_details_reporter = sqlsrv_fetch_array($result_profile_details_reporter);
						  $profile_category = $row_profile_details_reporter['category'];
						  
						  $entity_id_main_details = $row_profile_details_reporter['list_name_id'];
						  $position_profile = $row_profile_details_reporter['position'];
						  $type_profile = $row_profile_details_reporter['type'];
						  $email_profile = $row_profile_details_reporter['email1'];
						  
						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  if ( $profile_category == "Reporter" ){
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                <tr><td width="15%" valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                </td><td width="86%">

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
						}}
						?>
  </table>
      
</div> 
<?php
}
?>

<?php

$num_ci = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_linkedb = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_linkedb);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_linkedb[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_ci_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_ci_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Confidential Informant" ){
		$num_ci = $num_ci + 1; 
	}
}

// IF THERE ARE Whistleblowers LINKED, SHOW TABLE
if ( $num_ci != 0 ){
?>
<br />
<table width="800" class="gridtabletitle">
<tr><th align="left">
  <strong>Confidential Informants (</strong><?php echo $num_ci; ?>)</th></tr>
</table>


<div id="entities-contain">

<table id="entities-contain">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%"></th>
                </tr>
                <?php
					$rowId = 300;
					
					$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
					$all_linkedc = sqlsrv_fetchall($result_case_linked);
					$num_rows = count($all_linkedc);
					
					if ( $num_rows == 0 ){
						
						$result_entity_informant = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
					}else{
						$row_case_number = $all_linkedc[0];
						$case_linked = $row_case_number['case_number'];
						$result_entity_informant = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
						
					}
					
                    while($row_entity_informant = sqlsrv_fetch_array($result_entity_informant))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_cms = $row_entity_informant['cms'];
						  $profile_informant_id_linked = $row_entity_informant['profile_id'];
                          $result_profile_details_informant = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_informant_id_linked'");
                          $row_profile_details_informant = sqlsrv_fetch_array($result_profile_details_informant);
						  
						  $profile_category = $row_profile_details_informant['category'];
						  $entity_id_main_details = $row_profile_details_informant['list_name_id'];
						  $position_profile = $row_profile_details_informant['position'];
						  $type_profile = $row_profile_details_informant['type'];
						  $informant_protection = $row_profile_details_informant['informant_protection'];
						  $email_profile = $row_profile_details_informant['email1'];
						  
						  if ( $profile_category == "Confidential Informant" ){
							  
					  
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $informant_protection == "Yes" ){
                                ?>
                                <img src="images/Protect-Green-icon.png" width="23" height="23" align="top" title="Confidential Informant"/>
	                            <?php
                                }
								?>
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
                                <tr><td width="15%" valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                </td><td width="86%">

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
						}}
						?>
  </table>
      
</div> 
<?php
}
?>



<?php

$num_other = 0;
$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
$all_linkedd = sqlsrv_fetchall($result_case_linked);
$num_rows = count($all_linkedd);

if ( $num_rows == 0 ){
	
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");

}else{
	$row_case_number = $all_linkedd[0];
	$case_linked = $row_case_number['case_number'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
	
}
while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_other_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_other_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Other" ){
		$num_other = $num_other + 1; 
	}
}

// IF THERE ARE OTHER LINKED, SHOW TABLE
if ( $num_other != 0 ){
?>
<br />
<table width="800" class="gridtabletitle">
<tr><th align="left">
  <strong>Other (</strong><?php echo $num_other; ?>)</th></tr>
</table>

<div id="entities-contain">

<table id="entities-contain">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%"></th>
                </tr>
                <?php
					$rowId = 400;
					
					$result_case_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id' AND resolution = 'Open case in CMS' AND status = 'Closed' ");
					$all_linked5 = sqlsrv_fetchall($result_case_linked);
					$num_rows = count($all_linked5);
				
					if ( $num_rows == 0 ){
						
						$result_entity_other = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id'");
					
					}else{
						$row_case_number = $all_linked5[0];
						$case_linked = $row_case_number['case_number'];
						$result_entity_other = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id' OR case_number = '$case_linked'");
						
					}
					
                    while($row_entity_informant = sqlsrv_fetch_array($result_entity_other))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_cms = $row_entity_informant['cms'];
						  $profile_other_id_linked = $row_entity_informant['profile_id'];
                          $result_profile_details_informant = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_other_id_linked'");
                          $row_profile_details_informant = sqlsrv_fetch_array($result_profile_details_informant);
						  
						  $profile_category = $row_profile_details_informant['category'];
						  $entity_id_main_details = $row_profile_details_informant['list_name_id'];
						  $position_profile = $row_profile_details_informant['position'];
						  $type_profile = $row_profile_details_informant['type'];
						  $email_profile = $row_profile_details_informant['email1'];
						  
						  if ( $profile_category == "Other" ){
							  
					  
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
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong>
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
                                <tr><td width="15%" valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                </td><td width="86%">

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
						}}
						?>
  </table>
      
</div>
<?php
}
?>

</div>

<div id="tabs-4">


<?php
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_ir_links WHERE allegation_id = '$id'");
	$all_rows = sqlsrv_fetchall($result_proactive_linked);
	$num_rows = count($all_rows);
?>

<div id="entities-contain">
  <table >
                <tr>
                  <th>Id</th>
                  <th>Country</th>
                  <th align="center">Reporter</th>
                  <th align="center"><strong>Title</strong></th>
                  <th><strong>Status</strong></th>
                  <th><strong>Date recieved</strong></th>
                </tr>
				<?php						
                foreach($all_rows as $row) {
						$id_report = $row['ir_id'];
						
						$result_ir_details = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE id = '$id_report'");	
						$all_rows_ir = sqlsrv_fetch_array($result_ir_details);
						//$row_ir = $all_rows_ir[0];
				  	  ?>
						 <tr>
	                         <td>
                             <a onclick="return parent.show_ir_Popup(<?php echo $id_report ?> )">
							<?php 
							$dash = "IR";
							echo $dash.$id_report; ?>
                            </a>
							</td>
                             <td>
							<?php echo $country = $all_rows_ir['country']; ?>
							</td>
	                         <td align="left"><?php 
							 
							 echo $reporter = $all_rows_ir['reporter']; 
							 
							 ?></td>
							<td align="center">
                            
                            <?php echo $title = $all_rows_ir['title']; ?>

							</td>
                            <td align="center">
                            <?php echo $status = $all_rows_ir['status']; ?>
							</td>
                           <td align="center">
                            <?php $date_received = $all_rows_ir['date_received']; 
							echo $date_received = date('F j, Y', strtotime($date_received));
							?>
							</td>
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div> 


</div>




<?php	
if ( $type_allegation == 'Proactive' ){ 
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM proactive_link WHERE id = '$id'", array(), array( "Scrollable" => 'buffered'));
	$all_linked6 = sqlsrv_fetchall($result_proactive_linked);
	$num_rows = sqlsrv_num_rows($result_proactive_linked);
?>





<div id="tabs-6">

<table width="100%" class="gridtabletitle">
<tr><th align="left">
  <strong><?php echo $num_rows ?> Allegation(s) linked</strong></th></tr>
</table>


<div id="entities-contain">
  <table>
                <tr>
                  <th align="center" valign="middle">#</th>
                      <th align="center" valign="middle">Country</th>
                      <th align="center" valign="middle">Title</th>
                      
                      <th align="center" valign="middle">Status</th>
                      <th align="center" valign="middle">Resolution</th>
                </tr>
<?php						
	
                    foreach ($all_linked6 as $row_proactive_)
                      {
                          
						  $allegation_linked = $row_proactive_['linked_to'];

                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$allegation_linked'");
                          $row_allegation_linked_details = sqlsrv_fetch_array($result_profile_details);
						  
						  
						  $country = $row_allegation_linked_details['country'];
						  $summary = $row_allegation_linked_details['summary'];
						  $status = $row_allegation_linked_details['status'];
						  $resolution = $row_allegation_linked_details['resolution'];
						  
						 ?>
                        <td align="center"><strong><?php echo $allegation_linked; ?></strong></td>
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $summary; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="center"><?php echo $resolution; ?></td>
                        </td>
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div> 
<?php } ?>



</div>



</div>
</body>
</html>
