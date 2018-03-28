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



<style type="text/css">
table.gridtable_report {
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:14px;
	color:#999;
	border: 1px #999 solid;
	border-color:#999;
	border:1px;
}
table.gridtable_report th {
	font-size:18px;
	padding: 4px;
	border: 1px #999 solid;
	border-collapse: collapse;
	border-spacing: 0px;	
	background-color: #8DB3E2;
}
table.gridtable_report td {
	font-size:14px;
	color:#000000;
	padding: 3px;
	border: 1px #CCC solid;
	border-collapse: collapse;
	border-spacing: 2px;
}
</style>


<style type="text/css">
table.gridtable_report_head {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:14px;
	color:#000000;
	border:thin;
	border-color:#666;
	border:1px;
}
table.gridtable_report_head th {
	font-size:18px;
	padding: 4px;
	border: 0px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;	
	background-color: #8DB3E2;
}
</style> 


<style type="text/css">
table.gridtable23 {
font-family: Georgia, "Times New Roman", Times, serif;
font-size:12px;
color:#000000;

}

table.gridtable23 th {
	font-size:12px;
	padding: 4px;
	border:none;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #C0D6EF;
}

table.gridtable23 td {
	font-size:12px;
	border-width: 0px;
	border:none;
	color:#000000;
	background-color: #FFFFFF;
	padding: 3px;
	border-color: #FFFFFF;
	border-spacing:2px;
	border:0px;
}
</style>

<style type="text/css">
table.gridtablebox {
font-family: Georgia, "Times New Roman", Times, serif;
font-size:11px;
color:#EFEFEF;

}
table.gridtablebox th {
font-size:11px;
padding: 4px;
border-color:#CCC;
background-color:#DBE5F1;
color:#333333;

}
table.gridtablebox td {
	font-size:11px;
	border-width: 1px;
	color:#666666;
	padding: 3px;
	border-color:#CCC;
	border-spacing:2px;
	border:2px;
}


</style>

<style type="text/css">
table.gridtable_report_table {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:11px;
	padding: 4px;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #C0D6EF;
}
table.gridtable_report_table th {
	font-size:12px;
	padding: 4px;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #C0D6EF;
}
table.gridtable_report_table td {
font-size:12px;
	padding: 4px;
	border: 1px #CCC solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #FFFFFF;
}
</style>

</head>



<body>


<table class="gridtable_report" width="762" align="center">    
  <tr>
    <td colspan="3" valign="top" align="center" bgcolor="#8DB3E2">
      <p><font size="+2"><strong>Complaint Screening Report</strong></font><br />
      </p></td>
    </tr>
  <tr>
    <td width="188" valign="top" bgcolor="#DBE5F1"><strong>Complaint Number</strong></td>
    <td colspan="2"><?php
	
		$type_allegation = $row_allegation['type_allegation'];
		echo $id_number;
	 ?></td>
    </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1"><strong>Country</strong></td>
    <td colspan="2"><?php
		  echo $country = $row_allegation['country'];
	?></td>
    </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Date  received</strong></td>
    <td colspan="2"><?php
	  $date_received = $row_allegation['date_received'];
	  echo $newDate = date("F j, Y", strtotime($date_received)); 
	?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Method  of referral</strong></td>
    <td colspan="2"><?php echo $received_via = $row_allegation['received_via'];?></td>
    </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Referred from</strong></td>
    <td colspan="2"><?php echo $referred_from = $row_allegation['referred_from'];?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Category Type</strong></td>
    <td colspan="2"><?php echo $category_type  = $row_allegation['category_type']; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Sub-Category Type</strong></td>
    <td colspan="2"><?php echo $sub_category_type  = $row_allegation['sub_category_type']; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Other categories related</strong></td>
    <td colspan="2">
    
    <table width="399" border="0" style="border:none; border-color:">
    <?php
	$checkbox1 = $row_allegation['checkbox1'];
	$checkbox2 = $row_allegation['checkbox2'];
	$checkbox3 = $row_allegation['checkbox3'];
	$checkbox4 = $row_allegation['checkbox4'];
	$checkbox5 = $row_allegation['checkbox5'];
	$checkbox6 = $row_allegation['checkbox6'];
	$checkbox7 = $row_allegation['checkbox7'];
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
      <tr>
      <td style="border:none">
      <?php 
		if ( $checkbox1 != "" ){
		?>
        Corruption
        <br />
        <?php } 
		if ( $checkbox2 != "" ){
		?>
        Fraud
        <br />
        <?php }  
		if ( $checkbox3 != "" ){
		?>
        Coercion
        <br />
        <?php }  
		if ( $checkbox4 != "" ){
		?>
        Collusion
        <br />
        <?php }  
		if ( $checkbox5 != "" ){
		?>
        Non-Compliance with laws / Grant agreements
        <br />
        <?php }  
		if ( $checkbox6 != "" ){
		?>
        Human Rights Violations
        <br />
        <?php }  
		if ( $checkbox7 != "" ){
		?>
        Product Issues (JIATF)
        <br />
        <?php } ?>
        </td>
      </tr>
    </table>
    
    </td>
  </tr>
  

  
  
  <tr>
    <td valign="top" bgcolor="#DBE5F1"><strong>Grant Type</strong></td>
    <td colspan="2">
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="border:none">
    
    
    
    
    
<table class="gridtablebox" width="722" height="182" align="center" style="border:none">
<tr><td width="350" align="right">
  
  <table width="350" class="gridtablebox" BORDER=1>
  <tr><th>
    Health Products
  </th>
  </tr>
  <tr>
  <td>
  <table>
    <tr><td ><input name="checkbox9" type="checkbox" value="" class="ui-widget" <?php echo $checkbox9 ?>/></td><td width="320">ART</td>
      <td ><input name="checkbox12" type="checkbox" value="" class="ui-widget" <?php echo $checkbox12 ?>/></td><td width="154">ACT</td></tr>
    <tr><td><input name="checkbox10" type="checkbox" value="" class="ui-widget" <?php echo $checkbox10 ?>/></td><td>ITNS & LLINS</td>
      <td><input name="checkbox13" type="checkbox" value="" class="ui-widget" <?php echo $checkbox13 ?>/></td>
      <td>Condoms</td></tr>
    <tr>
      <td><input name="checkbox11" type="checkbox" value="" class="ui-widget" <?php echo $checkbox11 ?>/></td>
      <td>Syringes / Needles</td>
      <td><input name="checkbox14" type="checkbox" value="" class="ui-widget" <?php echo $checkbox14 ?>/></td>
      <td>Other</td>
      </tr>
    </table>
  </td>
  </tr>
  </table>
  </td><td width="558" rowspan="2" align="center" valign="top">
  <table width="350" class="gridtablebox" BORDER=1 RULES=NONE FRAME=BOX>
  <tr>
    <th>
      Non - Health Products
  </th>
  </tr>
  <tr>
  <td>
  <table>
    <tr><td ><input name="checkbox15" type="checkbox" value="" class="ui-widget" disabled="disabled" <?php echo $checkbox15 ?>/></td>
      <td width="320">Vehicle</td>
      <td ><input name="checkbox18" type="checkbox" value="" class="ui-widget" <?php echo $checkbox18 ?>/></td>
      <td width="154">Training</td></tr>
    <tr><td><input name="checkbox16" type="checkbox" value="" class="ui-widget" <?php echo $checkbox16 ?>/></td>
      <td>Petrol</td>
      <td><input name="checkbox19" type="checkbox" value="" class="ui-widget" <?php echo $checkbox19 ?>/></td><td>Food vouchers</td></tr>
    <tr>
      <td><input name="checkbox17" type="checkbox" value="" class="ui-widget" <?php echo $checkbox17 ?>/></td>
      <td>Office furniture</td>
      <td><input name="checkbox20" type="checkbox" value="" class="ui-widget" <?php echo $checkbox20 ?>/></td>
      <td>Other</td>
      </tr>
    </table>
  </td>
  </tr>
  </table>
  </td>
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
    </td>
    </tr>
  
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Grant(s) Details</strong></td>
    <td colspan="2">
    <?php
		  echo nl2br($grant_number= $row_allegation['grant_number']);
	?>
    
    </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Disease area</strong></td>
    <td colspan="2"><?php echo $disease_area  = $row_allegation['disease_area']; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Level of wrongdoing</strong></td>
    <td colspan="2">
    <strong>Primary Level :</strong>&nbsp;<?php echo $wrongdoing_level1  = $row_allegation['wrongdoing_level1']; ?><br />
    <strong>Secondary Level :</strong>&nbsp;<?php echo $wrongdoing_level2  = $row_allegation['wrongdoing_level2']; ?></td>
  </tr>
 </table>

<br style="page-break-before: always">

<table class="gridtable_report" width="762" align="center">    
  <tr>
    <td colspan="3" valign="top" style="border:none">
    <p>&nbsp;</p>
    
    <p><font color="#999999"; size="+1"><strong>Allegation Summary</strong></font></p>
    <p><strong>
      <?php
		  echo $summary = $row_allegation['summary'];
	?>
    </strong></p>
    <p>
      <?php
		  echo nl2br($allegations = $row_allegation['allegations']);
	?>
    </p></td>
    </tr>
</table>
 
 <br style="page-break-before: always">

 <table class="gridtable_report1" width="762" align="center">
   <tr>
     <td colspan="3" valign="top" style="border:none"><p><font color="#999999"; size="+1"><strong>Allegations reported to OIG by</strong></font></p></td>
   </tr>
 </table>
 <br />
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
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Whistleblower";
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
                                    if ( $email1_profile != "" ){
                                    ?>
           <strong>Email 1 : </strong><?php echo $email1_profile; ?> <br />
           <?php }
									if ( $email2_profile != "" ){
                                    ?>
           <strong>Email 2 : </strong><?php echo $email2_profile; ?> <br />
           <?php }
									if ( $skype != "" ){
                                    ?>
           <strong>Skype : </strong><?php echo $skype; ?> <br />
           <?php }
									if ( $home_phone_number != "" ){
                                    ?>
           <strong>Home Phone Number : </strong><?php echo $home_phone_number; ?> <br />
           <?php }
									if ( $office_phone_number != "" ){
                                    ?>
           <strong>Office Phone Number : </strong><?php echo $office_phone_number; ?> <br />
           <?php }
									if ( $mobile != "" ){
                                    ?>
           <strong>Mobile : </strong><?php echo $mobile; ?> <br />
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

<br />
 <table width="762" align="center">
   <tr>
     <td colspan="3" valign="top" style="border:none"><p><font color="#999999"; size="+1"><strong>Entities of Interest</strong></font></p></td>
   </tr>
 </table>
<br />

 <table width="762" align="center" class="gridtable_report_table">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Category</th>
                  <th width="20%">Country</th>
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
							$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_id_linked'");
							$row_profile_details = sqlsrv_fetch_array($result_profile_details);
							
							$profile_id = $row_profile_details['id'];
							$entity_id_main_details = $row_profile_details['list_name_id'];
							$profile_category = $row_profile_details['category'];
							$witness_protection = $row_profile_details['witness_protection'];
							$position_profile = $row_profile_details['position'];
							$type_profile = $row_profile_details['type'];
							$email1_profile = $row_profile_details['email1'];
							$email2_profile = $row_profile_details['email2'];
							$skype = $row_profile_details['skype'];
							$home_phone_number = $row_profile_details['home_phone_number'];
							$office_phone_number = $row_profile_details['office_phone_number'];
							$mobile = $row_profile_details['mobile'];
							$notes = $row_profile_details['notes'];
							
							$result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
							$row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
							$type_entity = $row_entity_id_main_details['type_entity'];
							$name = $row_entity_id_main_details['name'];
							$alternative_name = $row_entity_id_main_details['alternative_name'];
							$accro = $row_entity_id_main_details['accro'];
							$country = $row_entity_id_main_details['head_country'];
							if ( $profile_category != "Whistleblower" ){
								if ( $profile_category != "Confidential Informant" ){
									if ( $witness_protection != "Yes" ){
                        ?>
                        <tr>
                        <td>
						<?php
						echo $name; 
						if ( $alternative_name != "" ){
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $profile_category; ?></td>
                        <td align="center"><?php echo $country; ?></td>
		            <tr>
                        <td colspan="4" >
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
                                    <?php }}
                                    if ( $email1_profile != "" ){
                                    ?>
                                    <strong>Email 1 : </strong><?php echo $email1_profile; ?>
                                    <br />
                                    <?php }
									if ( $email2_profile != "" ){
                                    ?>
                                    <strong>Email 2 : </strong><?php echo $email2_profile; ?>
                                    <br />
                                    <?php }
									if ( $skype != "" ){
                                    ?>
                                    <strong>Skype : </strong><?php echo $skype; ?>
                                    <br />
                                    <?php }
									if ( $home_phone_number != "" ){
                                    ?>
                                    <strong>Home Phone Number : </strong><?php echo $home_phone_number; ?>
                                    <br />
                                    <?php }
									if ( $office_phone_number != "" ){
                                    ?>
                                    <strong>Office Phone Number : </strong><?php echo $office_phone_number; ?>
                                    <br />
                                    <?php }
									if ( $mobile != "" ){
                                    ?>
                                    <strong>Mobile : </strong><?php echo $mobile; ?>
                                    <br />
                                    <?php }
									if ( $notes != "" ){
                                    ?>
                                    <strong>Notes : </strong><?php echo $notes; ?>
                                    <br />
                                    <?php }?>
                            </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                        <?php 
						}}}}
						?>
				</table>
                <br>
   </td>
    </tr>           
</table>   
                

<br style="page-break-before: always">
 
<table class="gridtable_report" width="762" align="center">  
  <tr>
    <td width="259" valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Do allegations fall within OIG mandate?</strong></td>
    <td colspan="2"><?php echo $allegations_oig_mandate = $row_allegation['allegations_oig_mandate'];;?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Do  allegations relate to previous allegation?</strong></td>
    <td colspan="2"><?php echo $previous_allegations = $row_allegation['previous_allegations']; ?></td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
      
      <p>&nbsp;</p>
      <p><font color="#999999"; size="+1"><strong>Assessment and Conclusion</strong></font></p>
      
      <?php
		  echo nl2br($comments = $row_allegation['comments']);	  
	?>
      
      </td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><p><font color="#999999"; size="+1"><strong>Case Summary</strong></font></p>
      <?php
		  echo nl2br($case_summary = $row_allegation['case_summary']);	  
	?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong><font color="#FF0000">Panel </font></strong><strong><font color="#FF0000">Conclusion and recommendation</font></strong></td>
    <td colspan="2"><?php echo nl2br($resolution = $row_allegation['resolution']);?></td>
    </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Prepared  by</strong></td>
    <td width="167">

	<?php	
		echo $team_member = $row_allegation['team_member'];
	?>
    </td>
    <td width="238" align="left">
      
  <?php
	$submitted_date_officer = $row_allegation['submitted_date_officer'];
	if ($submitted_date_officer != ""){
	
		echo $submitted_date_officer_newDate = date('F j, Y', strtotime($submitted_date_officer));
	}
	?>
    </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DBE5F1" class="gridtable"><strong>Reviewed/Approved  by</strong></td>
    <td><?php
	echo $approved_by = $row_allegation['approved_by'];
	?></td>
    <td align="left" valign="middle">
      <?php
		$reviewed_by_officer_date = $row_allegation['reviewed_by_officer_date'];
		if ($reviewed_by_officer_date != ""){
			echo $reviewed_by_officer_date_newDate = date('F j, Y', strtotime($reviewed_by_officer_date));
		}
	?>
      </td>
  </tr>
  </table>
  
<br style="page-break-before: always">

<table width="762" align="center" class="gridtable">
 <tr>
<td colspan="2" align="left" style="font-size:14px"><strong>Notes</strong></td>
</tr>
<tr>
<td colspan="2"></td>
</tr>




<tr>
                <?php
	                $comment_query = sqlsrv_query($conncss,"SELECT * FROM notes WHERE allegation_id = '$id_number' ORDER BY id DESC");
                ?>
                <td colspan="2">
                
                
               
                    <?php while($note = sqlsrv_fetch_array($comment_query)): ?>
                        <table class="gridtable">
                        <tr>
                        <td width="29" valign="top">
                        
                        </td>
                        <td width="709">
                              <strong>
                                        <?php $date = $note['date_note'];
										 echo $note['member'] ?> made a note on <?php echo $date_newDate = date_format($date, 'F j, Y'); ?></strong> 
                                        <p><?php echo $note = nl2br($note['note'])?></p>
                              
                          </td>
		                  </tr>
                          </table>
                  <br />

                   <?php endwhile?>


</td>
</tr>
</table>

 
</body>

</html>

