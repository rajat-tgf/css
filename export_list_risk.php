<?php

require_once("includes\\opendb.php");
$file="list_risk_types.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

//$sql = "SELECT * FROM allegation_details LEFT JOIN risk_types ON allegation_details.id = risk_types.allegation_id WHERE allegation_details.id = risk_types.allegation_id";

$sql = "SELECT * FROM allegation_details";


$sql_result = sqlsrv_query($conncss, $sql);
?>
<table border="1">
     <tr>
<?php
echo "<th><strong>Allegation ID</strong></th>";
echo "<th><strong>Outcome</strong></th>";
echo "<th><strong>Type Allegation</strong></th>";
echo "<th><strong>Status</strong></th>";
echo "<th><strong>Priority</strong></th>";
echo "<th><strong>Allegation Resolution</strong></th>";
echo "<th><strong>Case / Allegation linked</strong></th>";
echo "<th><strong>Member in Charged</strong></th>";
echo "<th><strong>Country</strong></th>";
echo "<th><strong>Allegation reported by</strong></th>";
echo "<th><strong>Title</strong></th>";	
echo "<th><strong>Date received</strong></th>";
echo "<th><strong>Received via</strong></th>";
echo "<th><strong>Referred from</strong></th>";

echo "<th><strong>Category</strong></th>";
echo "<th><strong>Sub-Ccategory</strong></th>";

echo "<th><strong>Porfolio category</strong></th>";
echo "<th><strong>COE</strong></th>";

echo "<th><strong>Wrongdoing level 1</strong></th>";
echo "<th><strong>Wrongdoing level 2</strong></th>";

echo "<th><strong>Corruption</strong></th>";
echo "<th><strong>Fraud</strong></th>";
echo "<th><strong>Coercion</strong></th>";
echo "<th><strong>Collusion</strong></th>";
echo "<th><strong>Non-Compliance with laws / Grant agreements</strong></th>";
echo "<th><strong>Human Rights Violations</strong></th>";
echo "<th><strong>Product Issues (JIATF)</strong></th>";



echo "<th><strong>Disease Area</strong></th>";

echo "<th><strong>Procurement related</strong></th>";
echo "<th><strong>ART</strong></th>";
echo "<th><strong>ITNS & LLINS</strong></th>";
echo "<th><strong>Syringes / Needles</strong></th>";
echo "<th><strong>ACT</strong></th>";
echo "<th><strong>Condoms</strong></th>";
echo "<th><strong>Health Products - Other</strong></th>";


echo "<th><strong>Vehicle</strong></th>";
echo "<th><strong>Petrol</strong></th>";
echo "<th><strong>Office furniture</strong></th>";
echo "<th><strong>Training</strong></th>";
echo "<th><strong>Food vouchers</strong></th>";
echo "<th><strong>Non Health Products - Other</strong></th>";
echo "<th><strong>Recruitment / HR</strong></th>";



echo "<th><strong>Alleged Value</strong></th>";
echo "<th><strong>Supporting Documents provided</strong></th>";
echo "<th><strong>LFA</strong></th>";
echo "<th><strong>Source Category</strong></th>";
echo "<th><strong>Source Sub-Category</strong></th>";

echo "<th><strong>Source Evaluation</strong></th>";
echo "<th><strong>Information/Intel Evaluation</strong></th>";



echo "<th><strong>Summary of Allegations</strong></th>";
echo "<th><strong>Additional Information</strong></th>";
echo "<th><strong>Grant Number</strong></th>";
echo "<th><strong>Previous Allegations Related</strong></th>";
echo "<th><strong>Allegation Related</strong></th>";
echo "<th><strong>Date Screening report submitted to Officer</strong></th>";
echo "<th><strong>Date Screening report reviewed by Officer</strong></th>";
echo "<th><strong>Screening Officer</strong></th>";
?>
          <th>Scheme category / Core Business Activities</th>
          <th>High level Corporate Process</th>
          <th>Sub-Activity / Corporate Activity Focus</th>
          <th>Corporate Risk Register</th>
          <th>Category</th>
          <th>Sub_category</th>
          <th>Risk_type</th>
          <th>Risk</th>
          <th>description</th>
          <th>action</th>
          <th>department</th>
          <th>agency</th>
          <th>member</th>
        </tr>
<?php
while ($row = sqlsrv_fetch_array($sql_result)) {	

$id = $row['id'];
$sql1_result = sqlsrv_query($conncss,"SELECT * FROM risk_types WHERE allegation_id = '$id'", array(), array( "Scrollable" => 'buffered'));	
$num = sqlsrv_num_rows($sql1_result);

if ($num != 0 ){
	while ($row_risk = sqlsrv_fetch_array($sql1_result)) {

            echo "<tr>";	
            echo "<td>";	
			echo $id = $row['id'];
			echo "</td>";
			echo "<td>";	
			echo $resolution = $row['resolution'];
			echo "</td>";
			echo "<td>";	
				echo $type_allegation = $row['type_allegation'];
			echo "</td>";
			echo "<td>";	
				echo $status = $row['status'];
			echo "</td>";			
			echo "<td>";
				echo $priority = $row['priority'];
			echo "</td>";			
			echo "<td>";
				echo $resolution = $row['resolution'];
			echo "</td>";			
			echo "<td>";
				echo $case_number = $row['case_number'];
			echo "</td>";			
			echo "<td>";
				echo $team_member = $row['team_member'];
			echo "</td>";			
			echo "<td>";
				echo $country = $row['country'];
			echo "</td>";			
			echo "<td>";
				$complainant = $row['complainant'];
				
				$queyprofile = sqlsrv_query($conncss, "SELECT * FROM profiles WHERE id = '$complainant'");
				$row_profile = sqlsrv_fetch_array($queyprofile);
				$list_name_id = $row_profile['list_name_id'];
				
				$queyname = sqlsrv_query($conncss, "SELECT * FROM list_name WHERE entity_id = '$list_name_id'");
				$row_name = sqlsrv_fetch_array($queyname);
				echo $name = $row_name['name'];
			echo "</td>";			
			echo "<td>";
				echo $title = $row['summary'];
			echo "</td>";			
			echo "<td>";
				echo $date_received = $row['date_received'];
			echo "</td>";			
			echo "<td>";
				echo $received_via = $row['received_via'];
			echo "</td>";			
			echo "<td>";
				echo $referred_from = $row['referred_from'];
			echo "</td>";			
			echo "<td>";
				echo $category_type = $row['category_type'];
			echo "</td>";			
			echo "<td>";
				echo $sub_category_type = $row['sub_category_type'];
			echo "</td>";
			echo "<td>";
				echo $porfolio_category = $row['porfolio_category'];
			echo "</td>";
			echo "<td>";
				echo $coe = $row['coe'];
			echo "</td>";
			echo "<td>";
				echo $wrongdoing_level1 = $row['wrongdoing_level1'];
			echo "</td>";
			echo "<td>";
				echo $wrongdoing_level2 = $row['wrongdoing_level2'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox1 = $row['checkbox1'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox2 = $row['checkbox2'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox3 = $row['checkbox3'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox4 = $row['checkbox4'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox5 = $row['checkbox5'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox6 = $row['checkbox6'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox7 = $row['checkbox7'];
			echo "</td>";			
			echo "<td>";
				echo $disease_area = $row['disease_area'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox8 = $row['checkbox8'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox9 = $row['checkbox9'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox10 = $row['checkbox10'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox11 = $row['checkbox11'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox12 = $row['checkbox12'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox13 = $row['checkbox13'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox14 = $row['checkbox14'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox15 = $row['checkbox15'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox16 = $row['checkbox16'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox17 = $row['checkbox17'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox18 = $row['checkbox18'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox19 = $row['checkbox19'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox20 = $row['checkbox20'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox21 = $row['checkbox21'];
			echo "</td>";			
			echo "<td>";
				echo $alleged_value = $row['alleged_value'];
			echo "</td>";			
			echo "<td>";
				echo $supporting_doc = $row['supporting_doc'];
			echo "</td>";			
			echo "<td>";
				$lfa = $row['lfa'];
				$queyprofile = sqlsrv_query($conncss, "SELECT * FROM profiles WHERE id = '$lfa'");
				$row_profile = sqlsrv_fetch_array($queyprofile);
				$list_name_id = $row_profile['list_name_id'];
				
				$queyname = sqlsrv_query($conncss, "SELECT * FROM list_name WHERE entity_id = '$list_name_id'");
				$row_name = sqlsrv_fetch_array($queyname);
				echo $name_lfa = $row_name['name'];
			echo "</td>";			
			echo "<td>";
				echo $source_category = $row['source_category'];
			echo "</td>";			
			echo "<td>";
				echo $source_subcategory = $row['source_subcategory'];
			echo "</td>";
			echo "<td>";
				echo $source_evaluation = $row['source_evaluation'];
			echo "</td>";
			echo "<td>";
				echo $intel_evaluation = $row['intel_evaluation'];
			echo "</td>";			
			echo "<td>";
				echo $allegations = $row['allegations'];
			echo "</td>";			
			echo "<td>";
				echo $comments = $row['comments'];
			echo "</td>";			
			echo "<td>";
				echo $grant_number = $row['grant_number'];
			echo "</td>";			
			echo "<td>";
				echo $previous_allegations = $row['previous_allegations'];
			echo "</td>";			
			echo "<td>";
				echo $allegation_related = $row['allegation_related'];
			echo "</td>";			
			echo "<td>";
				echo $submitted_date_officer = $row['submitted_date_officer'];
			echo "</td>";			
			echo "<td>";
				echo $reviewed_by_officer_date = $row['reviewed_by_officer_date'];
			echo "</td>";			
			echo "<td>";
				echo $approved_by = $row['approved_by'];
			echo "</td>";			
			?>
            <td><?php echo $row_risk['sccba']; ?></td>
            <td><?php echo $row_risk['hlcp']; ?></td>
            <td><?php echo $row_risk['sacaf']; ?></td>
            <td><?php echo $row_risk['crr']; ?></td>
            <td><?php echo $row_risk['category_type']; ?></td>
            <td><?php echo $row_risk['sub_category_type']; ?></td>
            <td><?php echo $row_risk['risk_type']; ?></td>
            <td><?php echo $row_risk['risk']; ?></td>
            <td><?php echo $row_risk['description']; ?></td>
            <td><?php echo $row_risk['action']; ?></td>
            <td><?php echo $row_risk['department']; ?></td>
            <td><?php echo $row_risk['agency']; ?></td>
            <td><?php echo $row_risk['member']; ?></td>
            </tr>
<?php
}
}else{
	
	            echo "<tr>";	
            echo "<td>";	
			echo $id = $row['id'];
			echo "</td>";
			echo "<td>";	
			echo $resolution = $row['resolution'];
			echo "</td>";
			echo "<td>";	
				echo $type_allegation = $row['type_allegation'];
			echo "</td>";
			echo "<td>";	
				echo $status = $row['status'];
			echo "</td>";			
			echo "<td>";
				echo $priority = $row['priority'];
			echo "</td>";			
			echo "<td>";
				echo $resolution = $row['resolution'];
			echo "</td>";			
			echo "<td>";
				echo $case_number = $row['case_number'];
			echo "</td>";			
			echo "<td>";
				echo $team_member = $row['team_member'];
			echo "</td>";			
			echo "<td>";
				echo $country = $row['country'];
			echo "</td>";			
			echo "<td>";
				$complainant = $row['complainant'];
				
				$queyprofile = sqlsrv_query($conncss, "SELECT * FROM profiles WHERE id = '$complainant'");
				$row_profile = sqlsrv_fetch_array($queyprofile);
				$list_name_id = $row_profile['list_name_id'];
				
				$queyname = sqlsrv_query($conncss, "SELECT * FROM list_name WHERE entity_id = '$list_name_id'");
				$row_name = sqlsrv_fetch_array($queyname);
				echo $name = $row_name['name'];
			echo "</td>";			
			echo "<td>";
				echo $title = $row['summary'];
			echo "</td>";			
			echo "<td>";
				echo $date_received = $row['date_received'];
			echo "</td>";			
			echo "<td>";
				echo $received_via = $row['received_via'];
			echo "</td>";			
			echo "<td>";
				echo $referred_from = $row['referred_from'];
			echo "</td>";			
			echo "<td>";
				echo $category_type = $row['category_type'];
			echo "</td>";			
			echo "<td>";
				echo $sub_category_type = $row['sub_category_type'];
			echo "</td>";
			echo "<td>";
				echo $porfolio_category = $row['porfolio_category'];
			echo "</td>";
			echo "<td>";
				echo $coe = $row['coe'];
			echo "</td>";
			echo "<td>";
				echo $wrongdoing_level1 = $row['wrongdoing_level1'];
			echo "</td>";
			echo "<td>";
				echo $wrongdoing_level2 = $row['wrongdoing_level2'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox1 = $row['checkbox1'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox2 = $row['checkbox2'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox3 = $row['checkbox3'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox4 = $row['checkbox4'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox5 = $row['checkbox5'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox6 = $row['checkbox6'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox7 = $row['checkbox7'];
			echo "</td>";			
			echo "<td>";
				echo $disease_area = $row['disease_area'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox8 = $row['checkbox8'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox9 = $row['checkbox9'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox10 = $row['checkbox10'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox11 = $row['checkbox11'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox12 = $row['checkbox12'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox13 = $row['checkbox13'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox14 = $row['checkbox14'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox15 = $row['checkbox15'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox16 = $row['checkbox16'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox17 = $row['checkbox17'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox18 = $row['checkbox18'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox19 = $row['checkbox19'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox20 = $row['checkbox20'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox21 = $row['checkbox21'];
			echo "</td>";			
			echo "<td>";
				echo $alleged_value = $row['alleged_value'];
			echo "</td>";			
			echo "<td>";
				echo $supporting_doc = $row['supporting_doc'];
			echo "</td>";			
			echo "<td>";
				$lfa = $row['lfa'];
				$queyprofile = sqlsrv_query($conncss, "SELECT * FROM profiles WHERE id = '$lfa'");
				$row_profile = sqlsrv_fetch_array($queyprofile);
				$list_name_id = $row_profile['list_name_id'];
				
				$queyname = sqlsrv_query($conncss, "SELECT * FROM list_name WHERE entity_id = '$list_name_id'");
				$row_name = sqlsrv_fetch_array($queyname);
				echo $name_lfa = $row_name['name'];
			echo "</td>";			
			echo "<td>";
				echo $source_category = $row['source_category'];
			echo "</td>";			
			echo "<td>";
				echo $source_subcategory = $row['source_subcategory'];
			echo "</td>";
			echo "<td>";
				echo $source_evaluation = $row['source_evaluation'];
			echo "</td>";
			echo "<td>";
				echo $intel_evaluation = $row['intel_evaluation'];
			echo "</td>";			
			echo "<td>";
				echo $allegations = $row['allegations'];
			echo "</td>";			
			echo "<td>";
				echo $comments = $row['comments'];
			echo "</td>";			
			echo "<td>";
				echo $grant_number = $row['grant_number'];
			echo "</td>";			
			echo "<td>";
				echo $previous_allegations = $row['previous_allegations'];
			echo "</td>";			
			echo "<td>";
				echo $allegation_related = $row['allegation_related'];
			echo "</td>";			
			echo "<td>";
				echo $submitted_date_officer = $row['submitted_date_officer'];
			echo "</td>";			
			echo "<td>";
				echo $reviewed_by_officer_date = $row['reviewed_by_officer_date'];
			echo "</td>";			
			echo "<td>";
				echo $approved_by = $row['approved_by'];
			echo "</td>";			
			?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
<?php	
}
}
?>
  </table>
