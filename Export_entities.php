<?php

require_once("includes\\opendb.php");
$file="Entities_CSS.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");


$queyall = sqlsrv_query($conncss, "SELECT * FROM list_name ORDER BY id");



echo "<table>";

echo "<tr align='center' valign='middle' style='border-style:solid; border-width:thin;'>";
echo "<th><strong>Entity ID</strong></th>";
echo "<th><strong>Profile ID</strong></th>";
echo "<th><strong>Allegation involved</strong></th>";
echo "<th><strong>Allegation Resolution</strong></th>";
echo "<th><strong>Case related</strong></th>";
echo "<th><strong>Case involved</strong></th>";
echo "<th><strong>Entity Type</strong></th>";
echo "<th><strong>Category</strong></th>";
echo "<th><strong>Name</strong></th>";	
echo "<th><strong>Alternative Name</strong></th>";
echo "<th><strong>Acro</strong></th>";
echo "<th><strong>Head city</strong></th>";
echo "<th><strong>Head Country</strong></th>";


echo "<th><strong>Position</strong></th>";
echo "<th><strong>Type</strong></th>";

echo "<th><strong>Whistleblower protection</strong></th>";
echo "<th><strong>Informant protection</strong></th>";
echo "<th><strong>Witness protection</strong></th>";

echo "<th><strong>email1</strong></th>";
echo "<th><strong>email2</strong></th>";

echo "<th><strong>Home phone number</strong></th>";
echo "<th><strong>Office phone number</strong></th>";
echo "<th><strong>Mobile</strong></th>";
echo "<th><strong>Fax</strong></th>";
echo "<th><strong>Skype</strong></th>";
echo "<th><strong>Web</strong></th>";
echo "<th><strong>Address</strong></th>";
echo "<th><strong>Post Code</strong></th>";
echo "<th><strong>City</strong></th>";
echo "<th><strong>Country</strong></th>";
echo "<th><strong>Notes</strong></th>";


echo "</tr>";


			while($row_all = sqlsrv_fetch_array($queyall)){
				
				$entity_id = $row_all['entity_id'];
				$type_entity = $row_all['type_entity'];
				$name = $row_all['name'];
				$alternative_name = $row_all['alternative_name'];
				$accro = $row_all['accro'];
				$head_city = $row_all['head_city'];
				$head_country = $row_all['head_country'];
				
				
				$queyallprofiles = sqlsrv_query($conncss, "SELECT * FROM profiles WHERE list_name_id = '$entity_id'");
				while($row_all_entityes = sqlsrv_fetch_array($queyallprofiles)){
					
						$id = $row_all_entityes['id'];
						$category = $row_all_entityes['category'];
						$position = $row_all_entityes['position'];
						$type = $row_all_entityes['type'];
						$whistleblower_protection = $row_all_entityes['whistleblower_protection'];
						$informant_protection = $row_all_entityes['informant_protection'];
						$witness_protection = $row_all_entityes['witness_protection'];
						$email1 = $row_all_entityes['email1'];
						$email2 = $row_all_entityes['email2'];
						$home_phone_number = $row_all_entityes['home_phone_number'];
						$office_phone_number = $row_all_entityes['office_phone_number'];
						$mobile = $row_all_entityes['mobile'];
						$fax = $row_all_entityes['fax'];
						$skype = $row_all_entityes['skype'];
						$web_page = $row_all_entityes['web_page'];
						$address = $row_all_entityes['address'];
						$post_code = $row_all_entityes['post_code'];
						$city = $row_all_entityes['city'];
						$country = $row_all_entityes['country'];
						$notes = $row_all_entityes['notes'];
						
						$queyallegation_com = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE complainant = '$id'");
						while($row_allegation_com = sqlsrv_fetch_array($queyallegation_com)){
					
								echo "<tr style='border-style:solid; border-width:thin;'>";
								echo "<td>";
									echo $entity_id;
								echo "</td>";
								echo "<td>";
									echo $id;
								echo "</td>";
								
								echo "<td>";
									echo $allegation_id = $row_allegation_com['id'];
								echo "</td>";
								
								echo "<td>";
									echo $resolution = $row_allegation_com['resolution'];
								echo "</td>";
								
								echo "<td>";
									if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case" ){
										echo $case_nnumber = $row_allegation_com['case_number'];
									}
								echo "</td>";
								
								
								echo "<td>";
								echo "</td>";
									
								echo "<td>";
									echo $type_entity;
								echo "</td>";
								
								echo "<td>";
									echo $category;
								echo "</td>";
								
								echo "<td>";
									echo $name;
								echo "</td>";
								echo "<td>";
									echo $alternative_name;
								echo "</td>";
								echo "<td>";
									echo $accro;
								echo "</td>";
								echo "<td>";
									echo $head_city;
								echo "</td>";
								echo "<td>";
									echo $head_country;
								echo "</td>";
								
								
								
								echo "<td>";
									echo $position ;
								echo "</td>";
								echo "<td>";
									echo $type;
								echo "</td>";
								echo "<td>";
									echo $whistleblower_protection ;
								echo "</td>";
								echo "<td>";
									echo $informant_protection;
								echo "</td>";
								echo "<td>";
									echo $witness_protection;
								echo "</td>";
								echo "<td>";
									echo $email1;
								echo "</td>";
								echo "<td>";
									echo $email2;
								echo "</td>";
								echo "<td>";
									echo $home_phone_number;
								echo "</td>";
								echo "<td>";
									echo $office_phone_number;
								echo "</td>";
								echo "<td>";
									echo $mobile;
								echo "</td>";
								echo "<td>";
									echo $fax;
								echo "</td>";
								echo "<td>";
									echo $skype;
								echo "</td>";
								echo "<td>";
									echo $web_page;
								echo "</td>";
								echo "<td>";
									echo $address;
								echo "</td>";
								echo "<td>";
									echo $post_code;
								echo "</td>";
								echo "<td>";
									echo $city;
								echo "</td>";
								echo "<td>";
									echo $country;
								echo "</td>";
								echo "<td>";
									echo $notes;
								echo "</td>";
								
								
								echo "</tr>";
						}
						
						
						
						
						
						$queyallegation = sqlsrv_query($conncss, "SELECT * FROM entities_allegations WHERE profile_id = '$id'");
						while($row_allegation = sqlsrv_fetch_array($queyallegation)){
					
								echo "<tr style='border-style:solid; border-width:thin;'>";
								echo "<td>";
									echo $entity_id;
								echo "</td>";
								echo "<td>";
									echo $id;
								echo "</td>";
								
								$allegation_id = $row_allegation['allegation_id'];
								$case_number = $row_allegation['case_number'];
								
								if ( $allegation_id != "" ){
									
									$queyallegation_com1 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE id = '$allegation_id'");
									$row_allegation_com1 = sqlsrv_fetch_array($queyallegation_com1);
									$resolution = $row_allegation_com1['resolution'];
									$case_nnumber = $row_allegation_com1['case_number'];
									
									
									if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case" ){
										echo "<td>";
											echo $allegation_id;
										echo "</td>";
										echo "<td>";
											echo $resolution = $row_allegation_com1['resolution'];
										echo "</td>";
										echo "<td>";
											echo $case_nnumber = $row_allegation_com1['case_number'];
										echo "</td>";
									}else{
										
										echo "<td>";
											echo $allegation_id;
										echo "</td>";
										echo "<td>";
											echo $resolution = $row_allegation_com1['resolution'];
										echo "</td>";
										echo "<td>";
										echo "</td>";
									}
									echo "<td>";
									echo "</td>";
								}if ( $case_number != "" ){
									
									//$case_num = $row_allegation['case_number'];
									$queyallegation_com1 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE case_number = '$case_number'");
									$row_allegation_com1 = sqlsrv_fetch_array($queyallegation_com1);
									$all_num = $row_allegation_com1['id'];
									
									echo "<td>";
										echo $all_num;
									echo "</td>";
									echo "<td>";
											echo $resolution = $row_allegation_com1['resolution'];
									echo "</td>";
									
									echo "<td>";
										echo $case = $row_allegation_com1['case_number'];
									echo "</td>";
									
									echo "<td>";
										echo $case_number;
									echo "</td>";
									
								}
									
								echo "<td>";
									echo $type_entity;
								echo "</td>";
								echo "<td>";
									echo $category;
								echo "</td>";
								
								echo "<td>";
									echo $name;
								echo "</td>";
								echo "<td>";
									echo $alternative_name;
								echo "</td>";
								echo "<td>";
									echo $accro;
								echo "</td>";
								echo "<td>";
									echo $head_city;
								echo "</td>";
								echo "<td>";
									echo $head_country;
								echo "</td>";
								
								
								
								echo "<td>";
									echo $position ;
								echo "</td>";
								echo "<td>";
									echo $type;
								echo "</td>";
								echo "<td>";
									echo $whistleblower_protection ;
								echo "</td>";
								echo "<td>";
									echo $informant_protection;
								echo "</td>";
								echo "<td>";
									echo $witness_protection;
								echo "</td>";
								echo "<td>";
									echo $email1;
								echo "</td>";
								echo "<td>";
									echo $email2;
								echo "</td>";
								echo "<td>";
									echo $home_phone_number;
								echo "</td>";
								echo "<td>";
									echo $office_phone_number;
								echo "</td>";
								echo "<td>";
									echo $mobile;
								echo "</td>";
								echo "<td>";
									echo $fax;
								echo "</td>";
								echo "<td>";
									echo $skype;
								echo "</td>";
								echo "<td>";
									echo $web_page;
								echo "</td>";
								echo "<td>";
									echo $address;
								echo "</td>";
								echo "<td>";
									echo $post_code;
								echo "</td>";
								echo "<td>";
									echo $city;
								echo "</td>";
								echo "<td>";
									echo $country;
								echo "</td>";
								echo "<td>";
									echo $notes;
								echo "</td>";
								
								
								echo "</tr>";
						}
				}

				
	
			}

echo "</table>";
?>