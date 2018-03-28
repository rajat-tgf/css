<?php

require_once("includes\\opendb.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> <link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />

<script>
function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}
</script>

</head>

<body>
<?PHP
//-----------------------------------------------COMPLAINANT-----------------------------------------------------------------

?>


<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Allegations reported by</strong></td></tr>
</table>

<div id="entities-contain">
<?php
	$result_report = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");

	if (false !== ($row_report = sqlsrv_fetch_array( $result_report ))){
	
		$complainant_id = $row_report['complainant'];
		$allegation_id = $row_report['id'];
		
		$result_complainant_profile = sqlsrv_query($conncss,"select * from profiles WHERE id = '$complainant_id'"); 
		$row_result_complainant_profile = sqlsrv_fetch_array($result_complainant_profile);
		
		$whistleblower_protection = $row_result_complainant_profile['whistleblower_protection'];
		
		$list_name_id = $row_result_complainant_profile['list_name_id'];
		$result_complainant_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$list_name_id'"); 
		$row_result_complainant_main_details = sqlsrv_fetch_array($result_complainant_main_details);
		
		$complainant = $row_result_complainant_main_details['name'];
		$alternative_name_complainant = $row_result_complainant_main_details['alternative_name'];
		
		$type_entity_complainant = $row_result_complainant_main_details['type_entity'];
		
		$category_complainant = $row_result_complainant_profile['category'];
		$position_comppainant = $row_result_complainant_profile['position'];
		$type_complainant = $row_result_complainant_profile['type'];
		$email1_complainant = $row_result_complainant_profile['email1'];
		$city_complainant = $row_result_complainant_profile['city'];
		$country_complainant = $row_result_complainant_profile['country'];


		
		?>


  <table width="100%" id="entities-contain">
                <tr>
                  <th width="56%">Name</th>
                  <th width="12%">Type</th>
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
						<?php echo $complainant; 
						if ( $alternative_name_complainant != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name_complainant." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity_complainant; ?></td>
                        <td align="center"><?php echo $country_complainant; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="5" >
                        
                        <table width="100%">
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong><?php echo $category_complainant; ?>
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
                         
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
				</table>
     <?PHP 
	}else{
		echo "<font color='#FC3F3F'>";
		echo "Details not available";
		echo "</font>";
	}
	?>

</div> 

<?php

$num_subjects = 0;

$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
$all_linked = sqlsrv_fetchall($result_allegation_linked);
$num_rows = count($all_linked);

if ( $num_rows == 0 ){
		$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}else{
	$row_allegation_linked = $all_linked[0];
	$allegation_linked = $row_allegation_linked['id'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
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

<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Subjects (</strong><?php echo $num_subjects; ?>)</td></tr>
</table>



<div id="entities-contain">

		<?php
		
$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 id FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
$allegation_linked = sqlsrv_fetch_single($result_allegation_linked);
//$row_allegation_linked = sqlsrv_fetch_array($result_allegation_linked);
if ( false != $allegation_linked ){
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}else{
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}
$all_records = sqlsrv_fetchall($result_entity);

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
					$rowId = 100;
					//while($row_entity = sqlsrv_fetch_array($result_entity))
					
					foreach ($all_records as $row_entity){
                     
                          $rowId = $rowId + 1;
						  $entity_added_css = $row_entity['allegation_id'];
						  $profile_subject_id_linked = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked' AND category = 'Subject'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_id = $row_profile_details['id'];
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

$num = 0;

$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
$all_linked = sqlsrv_fetchall($result_allegation_linked);
$num_rows = count($all_linked);

if ( $num_rows == 0 ){
		$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}else{
	$row_allegation_linked = $all_linked[0];
	$allegation_linked = $row_allegation_linked['id'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}

while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_subject_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Witness" ){
		$num = $num + 1; 
	}
}



// IF THERE ARE SUBJECTS LINKED, SHOW TABLE
if ( $num != 0 ){
?>
<br />

<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Witnesses (</strong><?php echo $num; ?>)</td></tr>
</table>


<div id="entities-contain">

		<?php
		
$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
			
$allegation_linked = sqlsrv_fetch_single($result_allegation_linked);		

if ( false != $allegation_linked ){
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}else{
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}
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
					$rowId = 100;
					while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_css = $row_entity['allegation_id'];
						  $profile_subject_id_linked = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked' AND category = 'Witness'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_id = $row_profile_details['id'];
						  $profile_category = $row_profile_details['category'];
						  $entity_id_main_details = $row_profile_details['list_name_id'];
						  $position_profile = $row_profile_details['position'];
						  $type_profile = $row_profile_details['type'];
						  $witness_protection = $row_profile_details['witness_protection'];
						  $email_profile = $row_profile_details['email1'];

						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  
			if ( $profile_category == "Witness"){
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong></font>
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

$num = 0;

$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");

$all_linked = sqlsrv_fetchall($result_allegation_linked);
$num_rows = count($all_linked);

if ( $num_rows == 0 ){
		$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}else{
	$row_allegation_linked = $all_linked[0];
	$allegation_linked = $row_allegation_linked['id'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}

while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_subject_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Whistleblower" ){
		$num = $num + 1; 
	}
}



// IF THERE ARE SUBJECTS LINKED, SHOW TABLE
if ( $num != 0 ){
?>
<br />

<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Whistleblowers (</strong><?php echo $num; ?>)</td></tr>
</table>


<div id="entities-contain">

		<?php
		
$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");		
$allegation_linked = sqlsrv_fetch_single($result_allegation_linked);		

if ( false != $allegation_linked ){
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}else{
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}
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
					$rowId = 125;
					while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_css = $row_entity['allegation_id'];
						  $profile_subject_id_linked = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked' AND category = 'Whistleblower'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_id = $row_profile_details['id'];
						  $profile_category = $row_profile_details['category'];
						  $entity_id_main_details = $row_profile_details['list_name_id'];
						  $position_profile = $row_profile_details['position'];
						  $type_profile = $row_profile_details['type'];
						  $witness_protection = $row_profile_details['witness_protection'];
						  $email_profile = $row_profile_details['email1'];

						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  
			if ( $profile_category == "Whistleblower"){
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong></font>
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

$num = 0;

$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");

$all_linked = sqlsrv_fetchall($result_allegation_linked);
$num_rows = count($all_linked);

if ( $num_rows == 0 ){
		$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}else{
	$row_allegation_linked = $all_linked[0];
	$allegation_linked = $row_allegation_linked['id'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}

while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_subject_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Reporter" ){
		$num = $num + 1; 
	}
}



// IF THERE ARE SUBJECTS LINKED, SHOW TABLE
if ( $num != 0 ){
?>
<br />

<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Reporters (</strong><?php echo $num; ?>)</td></tr>
</table>


<div id="entities-contain">

		<?php
		
$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 id FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
$allegation_linked = sqlsrv_fetch_single($result_allegation_linked);		

if ( false != $allegation_linked ){
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}else{
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}
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
					$rowId = 150;
					while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_css = $row_entity['allegation_id'];
						  $profile_subject_id_linked = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked' AND category = 'Reporter'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_id = $row_profile_details['id'];
						  $profile_category = $row_profile_details['category'];
						  $entity_id_main_details = $row_profile_details['list_name_id'];
						  $position_profile = $row_profile_details['position'];
						  $type_profile = $row_profile_details['type'];
						  $witness_protection = $row_profile_details['witness_protection'];
						  $email_profile = $row_profile_details['email1'];

						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  
			if ( $profile_category == "Reporter"){
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong></font>
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

$num = 0;

$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");

$all_linked = sqlsrv_fetchall($result_allegation_linked);
$num_rows = count($all_linked);

if ( $num_rows == 0 ){
		$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}else{
	$row_allegation_linked = $all_linked[0];
	$allegation_linked = $row_allegation_linked['id'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}

while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_subject_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Confidential Informant" ){
		$num = $num + 1; 
	}
}



// IF THERE ARE SUBJECTS LINKED, SHOW TABLE
if ( $num != 0 ){
?>
<br />

<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Confidential Informants (</strong><?php echo $num; ?>)</td></tr>
</table>


<div id="entities-contain">

		<?php
		
$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
$allegation_linked = sqlsrv_fetch_single($result_allegation_linked);		

if ( false != $allegation_linked ){			
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}else{
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}
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
					$rowId = 100;
					while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_css = $row_entity['allegation_id'];
						  $profile_subject_id_linked = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked' AND category = 'Confidential Informant'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_id = $row_profile_details['id'];
						  $profile_category = $row_profile_details['category'];
						  $entity_id_main_details = $row_profile_details['list_name_id'];
						  $position_profile = $row_profile_details['position'];
						  $type_profile = $row_profile_details['type'];
						  $informant_protection = $row_profile_details['informant_protection'];
						  $email_profile = $row_profile_details['email1'];

						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
						  
			if ( $profile_category == "Confidential Informant"){
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
                        <td colspan="5" >
                        
                        <table width="800">
                        <tr>
                        <td style="border:none">
                                <font size="-1"><strong>Category : </strong></font>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
                                if ( $informant_protection == "Yes" ){
                                ?>
                                <img src="images/Protect-Green-icon.png" width="23" height="23" align="top" title="Informant Protection"/>
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

$num = 0;

$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");

$all_linked = sqlsrv_fetchall($result_allegation_linked);
$num_rows = count($all_linked);

if ( $num_rows == 0 ){
		$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}else{
	$row_allegation_linked = $all_linked[0];
	$allegation_linked = $row_allegation_linked['id'];
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}

while($row_entity = sqlsrv_fetch_array($result_entity))
{
	$profile_subject_id_linked = $row_entity['profile_id'];
	$result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked'");

	$row_profile_details = sqlsrv_fetch_array($result_profile_details);
	
	if ( $row_profile_details['category'] == "Other" ){
		$num = $num + 1; 
	}
}



// IF THERE ARE SUBJECTS LINKED, SHOW TABLE
if ( $num != 0 ){
?>
<br />

<table width="800" class="gridtablefilter">
<tr><td align="left">
  <strong>Other (</strong><?php echo $num; ?>)</td></tr>
</table>

<div id="entities-contain">

		<?php
		
$result_allegation_linked = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
			
$allegation_linked = sqlsrv_fetch_single($result_allegation_linked);		

if ( false != $allegation_linked ){
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE allegation_id = '$allegation_linked' OR case_number = '$ref_number'");
}else{
	$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE case_number = '$ref_number'");
}
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
					$rowId = 100;
					while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
                          $rowId = $rowId + 1;
						  $entity_added_css = $row_entity['allegation_id'];
						  $profile_subject_id_linked = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile_subject_id_linked' AND category = 'Other'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_id = $row_profile_details['id'];
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
						  
			if ( $profile_category == "Other" ){
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
</body>
</html>