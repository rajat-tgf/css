<?php
require_once("includes\\opendb.php");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=intelligence_report.doc");

$id_number = $_GET['id_number'];

$result_allegation = sqlsrv_query($conncss,"select * from intelligence_reports WHERE id = '$id_number'"); 
$row = sqlsrv_fetch_array( $result_allegation );


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

<div id="toptitle" align="center">Intelligence Report</div>
<br />
<div id="topsubtitle" align="center"><?php echo $id_number; ?> - <?php echo $row['country']; ?>
</div>

<div id="topssububtitle" align="center"><?php echo $title = $row['title']; ?></div>

<div id="maininfo">
<table width="762" align="center">    
  <tr>
    <td width="466"><strong>Date information received : </strong>
    <?php $date_received = $row['date_received'];
	echo $date_received_newDate = date('F j, Y', strtotime($date_received));
	?>
    </td>
    <td width="284" rowspan="3" valign="top"><table align="left">
      <tr>
        <td width="162"><strong>Status : </strong><?php echo $status  = $row['status'];?></td>
      </tr>
      <tr>
        <td><strong>Prepared by : </strong>
          <?php 
                 echo $team_member = $row['member'];
			?></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td ><strong>Reporter : </strong><?php echo $reporter  = $row['reporter']; ?></td>
    </tr>
  <tr>
    <td><strong>Date report completed : </strong>
      <?php 
		$date_report_complete = $row['date_report_complete'];
		echo $date_report_completed = date('F j, Y', strtotime($date_report_complete));
	?>
    </td>
    </tr>
  <tr>
    <td colspan="2" valign="top"><strong>Information source : </strong><?php echo nl2br($row['information_source']);?></td>
    </tr>
  <tr>
    <td colspan="2" valign="top"><strong>Entities of interest : </strong><?php echo $entities_interest  = $row['entities_interest']; ?></td>
    </tr>
  <tr>
    <td valign="top"><strong>Supporting documents? : </strong><?php echo $docs  = $row['docs']; ?></td>
    <td width="284">&nbsp;</td>
    </tr>
   <tr>
    <td colspan="2" valign="top"><strong>Urgent / Immediate action required? : </strong>
      <?php echo $urgent = $row['urgent']; ?>
      <br>
      <?php echo nl2br($row['further_explanation']);?>
    </td>
    </tr> 
</table>
</div>

<br>

<table width="762" align="center">    
<tr><td style="border:none">
<div id="title" align="left">1. What were  the circumstances of your contact with the source – describe?</div>
</td></tr>
<tr><td>
<?php echo nl2br($row['circumstances']);?>
</td>
</tr>
</table>

<table width="762" align="center">    
<tr><td style="border:none">
<div id="title" align="left">2. Information received from source</div>
</td></tr>
<tr><td>
<?php echo nl2br($row['information_recieved']);?>
</td>
</tr>
</table>

<table width="762" align="center">    
<tr><td style="border:none">
<div id="title" align="left">3. OIG comments and assessmen</div>
</td></tr>
<tr><td>
<?php echo nl2br($row['comments']);?>
</td>
</tr>
</table>
<br><br>
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

<table width="762" align="center">
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
    <td style="background-color:#FFFFFF"><input name="checkbox8" type="checkbox" value="" class="ui-widget" <?php echo $checkbox8 ?>/></td><td style="background-color:#FFFFFF"><strong>Cannot be judged</strong>
(unconfirmed and contradicts estimate/doubtful)
</td></tr>
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
</table>


<br>
<table width="762" align="center">    
<tr><td style="border:none">
<div id="title" align="left">IOE comments / observations / outcome / dissemination restrictions</div>
</td></tr>
</table>
</div>
<table width="762" align="center">
<tr><td>
<?php echo nl2br($row['ioe_comments']);?>
</td></tr>
</table>

<br style="page-break-before: always">

<!--/*ENTITIES
*/-->


<?php	
$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_intel_reports WHERE report_id = '$id_number'", array(), array( "Scrollable" => 'buffered'));		
$num_entities = sqlsrv_num_rows($result_entity);

$all_rows = sqlsrv_fetchall($result_entity);

if ( $num_entities != "0" ){ ?>

<table width="762" align="center">    
<tr><td style="border:none">
<div id="title" align="left">Entities linked</div>
</td></tr>
</table>
</div>
<table width="762" align="center" class="gridtable_report_table">
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Category</th>
                </tr>
                <?php
					foreach($all_rows as $row_entity) {
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

<?php } ?>
 
<br style="page-break-before: always">
<table width="762" align="center" class="gridtable">
 <tr>
<td><div id="title">Notes</div></td>
</tr>
<tr>
<td></td>
</tr>




<tr>
<?php
$comment_query = sqlsrv_query($conncss,"SELECT * FROM notes_ir WHERE report_id = '$id_number' ORDER BY id DESC");
?>
<td>
<div id="maininfo">


<?php while($note = sqlsrv_fetch_array($comment_query)): ?>
	<table>
	<tr>
	<td width="29" valign="top">
	
	</td>
	<td width="709">
		  <strong>
					<?php $date = $note['date_note'];
					 echo $note['member'] ?> made a note on <?php echo $date_newDate = date('F j, Y', strtotime($date)); ?></strong> 
					<p><?php echo $note = nl2br($note['note'])?></p>
	  </td>
	  </tr>
	  </table>
<br />

<?php endwhile?>
</div>

</td>
</tr>
</table>




</body>
</html>
