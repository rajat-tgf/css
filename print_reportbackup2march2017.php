<?php
require_once("includes\\opendb.php");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=screening_report.doc");

$id_number = $_GET['id_number'];

$result_allegation = sqlsrv_query($conncss,"select * from allegation_details WHERE id = '$id_number'"); 
$row_allegation = sqlsrv_fetch_array( $result_allegation );


?>
<html>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">


<style>

table.gridtable_report_table {
	font-family:'century gothic', arial, sans-serif;
	font-size:11px;
	color:#FFF;
	padding: 4px;
	border: 1px #CCC solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #C0D6EF;
}
table.gridtable_report_table th {
	font-size:12px;
	padding: 4px;
	border: 1px #CCC solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: STEELBLUE;
}
table.gridtable_report_table td {
	font-size:11px;
	color:#000000;
	padding: 4px;
	border: 1px #CCC solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #FFFFFF;
}

body{
font-family:'century gothic', arial, sans-serif;
font-size:12px;	
}

table.gridtablebox {
font-family:'century gothic', arial, sans-serif;
font-size:10px;
color:#EFEFEF;

}
table.gridtablebox th {
font-family:'century gothic', arial, sans-serif;
font-size:11px;
padding: 4px;
border-color:#CCC;
background-color:steelblue;
color:#FFF;

}
table.gridtablebox td {
	font-family:'century gothic', arial, sans-serif;
	font-size:10px;
	border-width: 1px;
	color:#666666;
	padding: 3px;
	border-color:#CCC;
	border:2px;
	text-align:left
}

	
	div#toptitle {
	font-family:'century gothic', arial, sans-serif;
	font-size:23px;
	font: bold;
}
	div#topsubtitle {
	font-family:'century gothic', arial, sans-serif;
	font-size:19px;
	color:#1356A8;
	margin-bottom: 40px;
}
	div#topssububtitle {
	font-family:'century gothic', arial, sans-serif;
	font-size:15px;
	margin-bottom: 40px;
}

div#title {
	font-family:'century gothic', arial, sans-serif;
	font-size:15px;
	margin-bottom: 25px;
	margin-top: 25px;
	font: bold
}

div#maininfo {
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
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
	font-size: 12px;
	background-color: #fafafa;
	padding-top: 4px;
	padding-bottom: 4px;
	padding-left: 8px;
	padding-right: 0px;
}

</style>

</head>
<body>

<div id="toptitle" align="center">Screening Report</div>
<br />
<div id="topsubtitle" align="center"><?php echo $id_number; ?> - <?php echo $row_allegation['country']; ?>
	
</div>
<div id="topssububtitle" align="center"><?php echo $summary = $row_allegation['summary']; ?></div>

<div id="maininfo" align="center">
<table width="762" align="center">    
  <tr>
    <td width="251"><strong>Method of referral :</strong></td>
    <td width="219"><?php echo $received_via  = $row_allegation['received_via']; ?></td>
    <td width="276" rowspan="9" align="left"><table align="left">
      <tr>
        <td><strong>Priority :</strong></td>
        <td><?php echo $priority  = $row_allegation['priority'];?></td>
        </tr>
      <tr>
        <td><strong>Status :</strong></td>
        <td><?php echo $status  = $row_allegation['status'];?></td>
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
        <td><?php
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
        <td><?php 
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
                } ?></td>
        </tr>
      <tr>
        <td><strong>Approved by :</strong></td>
        <td><?php
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
            } ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><strong>Referred from :</strong></td>
    <td><?php echo $referred_from  = $row_allegation['referred_from']; ?></td>
  </tr>
  <tr>
    <td ><strong>Source Category :</strong></td>
    <td><?php echo $source_category  = $row_allegation['source_category']; ?></td>
  </tr>
  <tr>
    <td><strong>Source Sub-Category :</strong></td>
    <td><?php echo $source_subcategory  = $row_allegation['source_subcategory']; ?></td>
  </tr>
  <tr>
    <td valign="top"><strong>Disease area :</strong></td>
    <td valign="top"><?php echo $disease_area  = $row_allegation['disease_area']; ?></td>
  </tr>
  <tr>
    <td valign="top"><strong>Allegation related : </strong></td>
    <td valign="top"><?php
            $allegation_related = $row_allegation['allegation_related'];
            $result_country_allegation_related = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$allegation_related'"); 
            $row_country_allegation_related = sqlsrv_fetch_array($result_country_allegation_related);
            $country_related = $row_country_allegation_related['country'];
            $fulltext_allegation_related = $allegation_related." - ".$country_related;
        echo $fulltext_allegation_related;?></td>
  </tr>
  <tr>
    <td valign="top"><strong>Primary Level of wrongdoing :</strong></td>
    <td valign="top"><?php echo $wrongdoing1  = $row_allegation['wrongdoing_level1']; ?></td>
  </tr>
  <tr>
    <td valign="top"><strong>Secondary Level of wrongdoing :</strong></td>
    <td valign="top"><?php echo $wrongdoing2  = $row_allegation['wrongdoing_level2']; ?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
</div>



<table width="762" align="center">    
<tr><td style="border:none">
<div id="title" align="left">Grants Details</div>
</td></tr>
</table>

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

	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_grant_links WHERE allegation_id = '$id_number'");
	$all_rows = sqlsrv_fetchall($result_proactive_linked);
	$num_rows = count($all_rows);
?>  <table class="gridtablebox" width="100%" height="182" align="center" style="border:none">
  <tr>
    <td width="350" align="right"><table width="350" class="gridtablebox" BORDER=1>
      <tr>
        <th> Health Products </th>
      </tr>
      <tr>
        <td><table>
          <tr>
            <td ><input name="checkbox9" type="checkbox" value="" class="ui-widget" <?php echo $checkbox9 ?>/></td>
            <td width="320">ART</td>
            <td ><input name="checkbox12" type="checkbox" value="" class="ui-widget" <?php echo $checkbox12 ?>/></td>
            <td width="154">ACT</td>
          </tr>
          <tr>
            <td><input name="checkbox10" type="checkbox" value="" class="ui-widget" <?php echo $checkbox10 ?>/></td>
            <td>ITNS & LLINS</td>
            <td><input name="checkbox13" type="checkbox" value="" class="ui-widget" <?php echo $checkbox13 ?>/></td>
            <td>Condoms</td>
          </tr>
          <tr>
            <td><input name="checkbox11" type="checkbox" value="" class="ui-widget" <?php echo $checkbox11 ?>/></td>
            <td>Syringes / Needles</td>
            <td><input name="checkbox14" type="checkbox" value="" class="ui-widget" <?php echo $checkbox14 ?>/></td>
            <td>Other</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="558" rowspan="2" align="center" valign="top"><table width="350" class="gridtablebox" BORDER=1 RULES=NONE FRAME=BOX>
      <tr>
        <th> Non - Health Products </th>
      </tr>
      <tr>
        <td><table>
          <tr>
            <td ><input name="checkbox15" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox15 ?>/></td>
            <td width="320">Vehicle</td>
            <td ><input name="checkbox18" type="checkbox" value="" class="ui-widget" <?php echo $checkbox18 ?>/></td>
            <td width="154">Training</td>
          </tr>
          <tr>
            <td><input name="checkbox16" type="checkbox" value="" class="ui-widget" <?php echo $checkbox16 ?>/></td>
            <td>Petrol</td>
            <td><input name="checkbox19" type="checkbox" value="" class="ui-widget" <?php echo $checkbox19 ?>/></td>
            <td>Food vouchers</td>
          </tr>
          <tr>
            <td><input name="checkbox17" type="checkbox" value="" class="ui-widget" <?php echo $checkbox17 ?>/></td>
            <td>Office furniture</td>
            <td><input name="checkbox20" type="checkbox" value="" class="ui-widget" <?php echo $checkbox20 ?>/></td>
            <td>Other</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right"><table width="350" class="gridtablebox" BORDER=1 RULES=NONE FRAME=BOX>
      <tr>
        <th>Other</th>
      </tr>
      <tr>
        <td><table>
          <tr>
            <td ><input name="checkbox21" type="checkbox" value="" class="ui-widget" <?php echo $checkbox21 ?>/></td>
            <td width="320">Recruitment / HR</td>
            <td >&nbsp;</td>
            <td width="154">&nbsp;</td>
          </tr>
          <tr>
            <td ><input name="checkbox8" type="checkbox" value="" class="ui-widget" <?php echo $checkbox8 ?>/></td>
            <td width="320">Procurement related</td>
            <td >&nbsp;</td>
            <td width="154">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="762" align="center" class="gridtable_report_table">
  <tr>
      <th>Grant </th>
      <th>Title</th>
    </tr>
    <?php						
    foreach($all_rows as $row) {
            $grant_number = $row['grant_number'];
            $result_grant_details = sqlsrv_query($conn,"SELECT * FROM grant_data WHERE grant_number = '$grant_number'");	
            $row_details = sqlsrv_fetch_array($result_grant_details);
          ?>
             <tr>
                 <td>
                <strong><?php echo $grant_number; ?></strong>
                </td>
                 <td>
                <strong><?php echo $grant_title = $row_details['grant_title']; ?></strong><br>
               
               
                    <table width="100%" class="gridtablebox">
                    <tr>
                    <td width="24%"><strong>Grant Status:</strong></td>
                    <td width="26%"><?php echo $grant_status = $row_details['grant_status']; ?></td>
                    <td width="23%"><strong>Program Start Date:</strong></td>
                    <td width="27%"><?php echo $program_start_date = date('F j, Y', strtotime($row_details['program_start_date']));?></td>
                    </tr>
                    <tr>
                    <td><strong>Grant Signing Date:</strong></td>
                    <td><?php 
                    $grant_signing_date = $row_details['grant_signing_date'];
                    if ($grant_signing_date != ""){
                    echo $grant_signing_date = date('F j, Y', strtotime($row_details['grant_signing_date']));
                    }
                    ?></td>
                    <td><strong>Program End Date:</strong></td>
                    <td><?php echo $program_end_date = date('F j, Y', strtotime($row_details['program_end_date']));?></td>
                    </tr>
                    </table>

                </td>
            </tr>
            <?php 
            }
            ?>
  </table>
  <?php
  $grant_number = $row_allegation['grant_number'];
  if ($grant_number != ""){ ?>
  <div id="maininfo" align="center">
<table width="762" align="center"> 
        <tr>
        <td width="9%" valign="top"><strong>Comments</strong></td>
        <td width="91%">
        <?php 
		echo nl2br($grant_number);?>
        </td>
        </tr>
    </table>
    </div>
    <?php } ?>
 
 
<br style="page-break-before: always">

<table width="762" align="center">    
  <tr>
    <td colspan="3" valign="top" style="border:none">
    
    <div id="title">
    Allegations  Details
    </div>
	<?php
	
	$allegations = $row_allegation['allegations'];
	
	if ( $allegations == "" ){
	
	
    $risk_query = sqlsrv_query($conncss,"SELECT * FROM risk_types WHERE allegation_id = '$id_number' ORDER BY risk_type");
	$all_risk_type = sqlsrv_fetchall($risk_query);      
	foreach ($all_risk_type as $row_risk_type) {
		$risk_id = $row_risk_type['id'];
		
		$category_type = $row_risk_type['category_type'];
		$sub_category_type = $row_risk_type['sub_category_type'];
		$risk_type = $row_risk_type['risk_type'];
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
        <table width="100%" class="gridtablerisk">
        <tr>
        <td width="1%" rowspan="2" style="background-color: <?php echo $bcolor ?>;">
        </td>
        <td>
          <strong>Category:&nbsp;&nbsp;</strong><?php echo $category_type; ?><br />
          <strong>Sub-Category:&nbsp;&nbsp;</strong><?php echo $sub_category_type; ?><br>
          <strong>Risk Type:&nbsp;&nbsp;</strong><?php echo $risk_type; ?><br />
          <strong>Risk:&nbsp;&nbsp;</strong><?php echo $risk; ?><br>
          <strong>Action:&nbsp;&nbsp;</strong><?php echo $action; ?>
        </td>
        </tr>
        <tr>
          <td><?php echo $description = nl2br($row_risk_type['description'])?></td>
          </tr>
        </table>
        <br />
   <?php } 
   
	}else{ ?>

<table width="100%" class="report">
            <tr>
            <td width="51%" valign="top">
            
            <table>
            <tr>
            <td><strong>Category :</strong></td>
            <td align="left">
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
        </table> <?php
	} ?>
    
    </td>
  </tr>
</table>
 

<br style="page-break-before: always">


<table width="762" align="center">    
  <tr>
    <td valign="top" style="border:none"> 
        <div id="title">
        Assessment and Conclusion
        </div><br>
         <?php
            echo nl2br($comments = $row_allegation['comments']);	  
        ?> 
    </td>
  </tr>
</table>
 

<br style="page-break-before: always">



<table width="762" align="center">    
  <tr>
    <td valign="top" style="border:none">
 
<div id="title">
Case Summary
</div> 

	<?php
	
	$case_summary = $row_allegation['case_summary'];
	
	if ( $allegations == "" ){
	
	
    $risk_query = sqlsrv_query($conncss,"SELECT * FROM risk_types WHERE allegation_id = '$id_number' AND action = 'Refer to Investigation' ORDER BY risk_type");
	$all_risk_type = sqlsrv_fetchall($risk_query);      
	foreach ($all_risk_type as $row_risk_type) {
		$risk_id = $row_risk_type['id'];
		
		$category_type = $row_risk_type['category_type'];
		$sub_category_type = $row_risk_type['sub_category_type'];
		$risk_type = $row_risk_type['risk_type'];
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
        <table width="100%" class="gridtablerisk">
        <tr>
        <td width="1%" rowspan="2" style="background-color: <?php echo $bcolor ?>;">
        </td>
        <td>
          <strong>Category:&nbsp;&nbsp;</strong><?php echo $category_type; ?><br />
          <strong>Sub-Category:&nbsp;&nbsp;</strong><?php echo $sub_category_type; ?><br>
          <strong>Risk Type:&nbsp;&nbsp;</strong><?php echo $risk_type; ?><br />
          <strong>Risk:&nbsp;&nbsp;</strong><?php echo $risk; ?><br>
          <strong>Action:&nbsp;&nbsp;</strong><?php echo $action; ?>
        </td>
        </tr>
        <tr>
          <td><?php echo $description = nl2br($row_risk_type['description'])?></td>
          </tr>
        </table>
        <br />
   <?php } 
   
	}else{

		 echo nl2br($case_summary);
	} ?>
</td>
</tr>
</table>

<br style="page-break-before: always">

<table width="762" align="center">    
  <tr>
    <td valign="top" style="border:none">
<div id="title">
Entities of Interest
</div>


<table width="762" align="center">    
  <tr>
    <td valign="top" style="border:none">
Allegations reported to OIG
<br><br>


<?php
	
	
	//------------------------------------------ COMPLAINANT DETAILS ----------------------------------------------------------------------------------
	
	
	
	$complainant_id = $row_allegation['complainant'];
	$result_complainant_profile = sqlsrv_query($conncss,"select * from profiles WHERE id = '$complainant_id'"); 
	$row_result_complainant_profile = sqlsrv_fetch_array($result_complainant_profile);
	
	$category_complainant = $row_result_complainant_profile['category'];

	$position_profile = $row_result_complainant_profile['position'];
	$type_profile = $row_result_complainant_profile['type'];
	$email1_profile = $row_result_complainant_profile['email1'];
	$email2_profile = $row_result_complainant_profile['email2'];
	$skype = $row_result_complainant_profile['skype'];
	$home_phone_number = $row_result_complainant_profile['home_phone_number'];
	$office_phone_number = $row_result_complainant_profile['office_phone_number'];
	$mobile = $row_result_complainant_profile['mobile'];
	$notes = $row_result_complainant_profile['notes'];
	
	$list_name_id = $row_result_complainant_profile['list_name_id'];
	$result_complainant_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$list_name_id'"); 
	$row_result_complainant_main_details = sqlsrv_fetch_array($result_complainant_main_details);
	
	$complainant = $row_result_complainant_main_details['name'];
	$alternative_name = $row_result_complainant_main_details['alternative_name'];
	$type_entity = $row_result_complainant_main_details['type_entity'];
	$accro = $row_result_complainant_main_details['accro'];
	
	if ( $category_complainant == "Whistleblower"){
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Whistleblower";
		echo "<br>";
	}else{
	
    ?>

 <table width="762" align="center" class="gridtable_report_table">
   <tr>
     <th width="88%">Name</th>
     <th width="12%">Type entity</th>
     <th width="10%">Acronym</th>
   </tr>
   <tr>
     <td><?php 
                                if ( $type_entity != "Person" ){
                                    $icon = "entity-icon.png";
                                }else{
                                    $icon = "user-silhouette-icon.png";
                                }
                        ?>
       <?php echo $complainant; 
						if ( $alternative_name != "" ){
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}

					?></td>
     <td><?php echo $type_entity; ?></td>
     <td><?php echo $accro; ?></td>
   </tr>
   <tr>
     <td colspan="3" ><table width="650">
       <tr>
         <td style="border:none"><strong>Type : </strong><?php echo $type_profile; ?> <br />
           <?php 
                                    if ( $type_entity == "Person" ){
                                    ?>
           <strong>Position : </strong><?php echo $position_profile; ?> <br />
           <?php }
			if ( $notes != "" ){
           ?>
           <strong>Notes : </strong><?php echo $notes; ?> <br />
           <?php }?></td>
       </tr>
     </table></td>
   </tr>
 </table>
 
   <?php
	}
?> 
</td></tr></table>
<br>



<table width="762" align="center" class="gridtable_report_table">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Category</th>
                </tr>
                <?php
					$case_number = $row_allegation['case_number'];
					
					if ( $case_number != "" ){
							$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id_number' OR case_number = '$case_number'");
					}else{
						$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$id_number'");
					}
					
                    while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
							$profile_id_linked = $row_entity['profile_id'];
							$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_id_linked' AND category != 'Whistleblower' AND category != 'Confidential Informant' AND witness_protection != 'Yes'");
							$row_profile_details = sqlsrv_fetch_array($result_profile_details);
							
							$profile_id = $row_profile_details['id'];
							$entity_id_main_details = $row_profile_details['list_name_id'];
							$profile_category = $row_profile_details['category'];
							$position_profile = $row_profile_details['position'];
							$type_profile = $row_profile_details['type'];
							$notes = $row_profile_details['notes'];
							
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
						
						<strong><?php echo $name; ?></strong>
						<?php
						if ( $alternative_name != "" ){
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><strong><?php echo $type_entity; ?></strong></td>
                        <td align="center"><strong><?php echo $profile_category; ?></strong></td>
		            <tr>
                        <td colspan="3">
                            <table width="722">
                            <tr>
                            <td style="border:none">
                                    <strong>Type : </strong><?php echo $type_profile; ?>
                                    <br />
                                    <?php 
                                    if ( $type_entity == "Person" ){
										if ( $position_profile != "" ){
                                    ?>
                                    <strong>Position : </strong><?php echo $position_profile; ?>
                                    <br />
                                    <?php }
									if ( $notes != "" ){
                                    ?>
                                    <strong>Notes : </strong><?php echo $notes; ?>
                                    <br />
                                    <?php } }?>
                            </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                        <?php 
						}
						?>
				</table>
   </td>
    </tr>           
</table>




</body>
</html>
