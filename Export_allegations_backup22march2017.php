<?php

require_once("includes\\opendb.php");
$file="Allegations_CSS.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");


$queyall = sqlsrv_query($conncss, "SELECT * FROM allegation_details ORDER BY id");



echo "<table>";

echo "<tr align='center' valign='middle' style='border-style:solid; border-width:thin;background:#CCC;'>";
echo "<th><strong>Allegation ID</strong></th>";
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



echo "<th><strong>Summary of Allegations</strong></th>";
echo "<th><strong>Additional Information</strong></th>";
echo "<th><strong>Grant Number</strong></th>";
echo "<th><strong>Previous Allegations Related</strong></th>";
echo "<th><strong>Allegation Related</strong></th>";
echo "<th><strong>Date Screening report submitted to Officer</strong></th>";
echo "<th><strong>Date Screening report reviewed by Officer</strong></th>";
echo "<th><strong>Screening Officer</strong></th>";


echo "</tr>";


			while($row_all = sqlsrv_fetch_array($queyall)){
			
			echo "<tr align='left' valign='top' style='border-style:solid; border-width:thin;'>";
			echo "<td>";	
				echo $id = $row_all['id'];
			echo "</td>";
			echo "<td>";	
				echo $status = $row_all['status'];
			echo "</td>";			
			echo "<td>";
				echo $priority = $row_all['priority'];
			echo "</td>";			
			echo "<td>";
				echo $resolution = $row_all['resolution'];
			echo "</td>";			
			echo "<td>";
				echo $case_number = $row_all['case_number'];
			echo "</td>";			
			echo "<td>";
				echo $team_member = $row_all['team_member'];
			echo "</td>";			
			echo "<td>";
				echo $country = $row_all['country'];
			echo "</td>";			
			echo "<td>";
				$complainant = $row_all['complainant'];
				
				$queyprofile = sqlsrv_query($conncss, "SELECT * FROM profiles WHERE id = '$complainant'");
				$row_profile = sqlsrv_fetch_array($queyprofile);
				$list_name_id = $row_profile['list_name_id'];
				
				$queyname = sqlsrv_query($conncss, "SELECT * FROM list_name WHERE entity_id = '$list_name_id'");
				$row_name = sqlsrv_fetch_array($queyname);
				echo $name = $row_name['name'];
			echo "</td>";			
			echo "<td>";
				echo $title = $row_all['summary'];
			echo "</td>";			
			echo "<td>";
				echo $date_received = $row_all['date_received'];
			echo "</td>";			
			echo "<td>";
				echo $received_via = $row_all['received_via'];
			echo "</td>";			
			echo "<td>";
				echo $referred_from = $row_all['referred_from'];
			echo "</td>";			
			echo "<td>";
				echo $category_type = $row_all['category_type'];
			echo "</td>";			
			echo "<td>";
				echo $sub_category_type = $row_all['sub_category_type'];
			echo "</td>";
			echo "<td>";
				echo $wrongdoing_level1 = $row_all['wrongdoing_level1'];
			echo "</td>";
			echo "<td>";
				echo $wrongdoing_level2 = $row_all['wrongdoing_level2'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox1 = $row_all['checkbox1'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox2 = $row_all['checkbox2'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox3 = $row_all['checkbox3'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox4 = $row_all['checkbox4'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox5 = $row_all['checkbox5'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox6 = $row_all['checkbox6'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox7 = $row_all['checkbox7'];
			echo "</td>";			
			echo "<td>";
				echo $disease_area = $row_all['disease_area'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox8 = $row_all['checkbox8'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox9 = $row_all['checkbox9'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox10 = $row_all['checkbox10'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox11 = $row_all['checkbox11'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox12 = $row_all['checkbox12'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox13 = $row_all['checkbox13'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox14 = $row_all['checkbox14'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox15 = $row_all['checkbox15'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox16 = $row_all['checkbox16'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox17 = $row_all['checkbox17'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox18 = $row_all['checkbox18'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox19 = $row_all['checkbox19'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox20 = $row_all['checkbox20'];
			echo "</td>";			
			echo "<td>";
				echo $checkbox21 = $row_all['checkbox21'];
			echo "</td>";			
			echo "<td>";
				echo $alleged_value = $row_all['alleged_value'];
			echo "</td>";			
			echo "<td>";
				echo $supporting_doc = $row_all['supporting_doc'];
			echo "</td>";			
			echo "<td>";
				$lfa = $row_all['lfa'];
				$queyprofile = sqlsrv_query($conncss, "SELECT * FROM profiles WHERE id = '$lfa'");
				$row_profile = sqlsrv_fetch_array($queyprofile);
				$list_name_id = $row_profile['list_name_id'];
				
				$queyname = sqlsrv_query($conncss, "SELECT * FROM list_name WHERE entity_id = '$list_name_id'");
				$row_name = sqlsrv_fetch_array($queyname);
				echo $name_lfa = $row_name['name'];
			echo "</td>";			
			echo "<td>";
				echo $source_category = $row_all['source_category'];
			echo "</td>";			
			echo "<td>";
				echo $source_subcategory = $row_all['source_subcategory'];
			echo "</td>";			
			echo "<td>";
				echo $allegations = $row_all['allegations'];
			echo "</td>";			
			echo "<td>";
				echo $comments = $row_all['comments'];
			echo "</td>";			
			echo "<td>";
				echo $grant_number = $row_all['grant_number'];
			echo "</td>";			
			echo "<td>";
				echo $previous_allegations = $row_all['previous_allegations'];
			echo "</td>";			
			echo "<td>";
				echo $allegation_related = $row_all['allegation_related'];
			echo "</td>";			
			echo "<td>";
				echo $submitted_date_officer = $row_all['submitted_date_officer'];
			echo "</td>";			
			echo "<td>";
				echo $reviewed_by_officer_date = $row_all['reviewed_by_officer_date'];
			echo "</td>";			
			echo "<td>";
				echo $approved_by = $row_all['approved_by'];
			echo "</td>";			

			echo "</tr>";
	
			}

echo "</table>";
?>