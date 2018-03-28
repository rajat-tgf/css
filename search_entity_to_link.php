<?php

require_once("includes\\opendb.php");
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


<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

</head>
<body>



<form method="post" id="search_entity" name="search_entity">
    <table align="center" class="gridtable">
    <tr><td align="right" valign="middle">
    <input type="text" placeholder="Search here?" name="input" class="text ui-widget-content ui-corner-all" size="50">
    </td>
    <td align="right" valign="middle">&nbsp;  </td>
    <td valign="top">
    <input type = "submit" name = "submit" value = "Search" />
    </td></tr>
    <tr>
  <td align="center" valign="top">
  <?php
  $result_all_entities = sqlsrv_query($conncss,"SELECT * FROM list_name"); 
  $all_entities = sqlsrv_fetchall( $result_all_entities );
  
  
  ?>
  <font size="-1" color="#999999">
  Total entities:
  <strong><?php
    echo $num_entities = count($all_entities);
  ?></strong>
  
    </font>
  </td>
  <td align="right" valign="middle">&nbsp;</td>
  <td valign="top">&nbsp;</td>
</tr>
    </table><br />

</form>

<form action="link_entity_to_allegation.php" id="link_entity" name="link_entity" method="post">
<?php 
			if(isset($_POST['input']) && $_POST['input'] != "" ){ 

			$userquery = $_POST['input'];
			if(is_numeric($userquery) && $userquery > 0 && $userquery == round($userquery, 0)){
				$result = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$userquery'");	
			} else {
				$result = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE name like '%$userquery%' OR alternative_name like '%$userquery%' OR accro like '%$userquery%'");	
			}
							$all_rows = sqlsrv_fetchall($result);
							$hit_found = count($all_rows);
							if ($hit_found > 0)
							{?>
							<table align="center" class="gridtable">
							<tr><td>
                            <font color="#CC0000" style="font-size:14px">
							<strong><?php
								echo $hit_found . " matches found";
							?></strong>
                            </font>
							</td></tr>
							</table><br />
   
   
                                <?php
                                foreach ($all_rows as $row) {
								$entity_id_to_link = $row['entity_id'];
								$type_entity = $row['type_entity'];
								$name = $row['name'];
								$alt_name = $row["alternative_name"];
								$accro = $row["accro"];
								$head_country = $row["head_country"];
								$results = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE list_name_id = $entity_id_to_link AND category != 'Complainant'");
								$profiles_all = sqlsrv_fetchall($results);
								foreach ($profiles_all as $row123) {	
									$entity_profile_id_to_link = $row123["id"];
									$whistleblower_protection = $row123["whistleblower_protection"];
									$informant_protection = $row123["informant_protection"];
									$witness_protection = $row123["witness_protection"];
									$profile_position = $row123["position"];
								?>
                    <div id="entities-contain">
  					 <table>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Acronym</th>
                    <th>Nationality / Country based</th>
                    <th></th>
                    </tr>
                                
					<tr>
                    <td>
                        <?php echo $entity_id_to_link; ?>
                    </td>
					<td>
                    
					<?php					
					
					if ( $type_entity != "Person" ){
						$icon = "entity-icon.png";
					}else{
						$icon = "user-silhouette-icon.png";
					}
						
					?>
					<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle" title="Person"/>
                    <font color="#136CD9">
					<?php echo $row["name"]; 
                    echo "</font>";
                    if ( $alt_name != "" ){
                    echo "<br />";
                    echo "<font color='#999999'>";
                    echo "( ".$alt_name." )";
                    echo "</font>";
                    }
                
                    ?>
                    </td>
                    <td>
                    <font color="#136CD9">
                        <?php echo $accro; ?>
                        </font>
                    </td>
                    <td>
                    <font color="#136CD9">
                        <?php echo $head_country; ?>
                        </font>
                    </td>
                    <td>
                    
                    </td>
                    </tr>
                    
                    <tr>
                    <td colspan="4">
                    
					<br />
					<img src="images/profile-icon.png" width="12" height="12" align="top"/>
                    <font><strong>Category : </strong>
					<font color="#993333">
					<strong><?php echo $row123["category"];?></strong>
					</font>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
                    if ( $whistleblower_protection == "Yes" ){
                    ?>
                    <img src="images/Protect-Red-icon.png" width="23" height="23" align="top" title="Whistleblower Protection"/>
                <?php
                    }
                    if ( $informant_protection == "Yes" ){
                    ?>
                    <img src="images/Protect-Green-icon.png" width="23" height="23" align="top" title="Informant Protection"/>
                <?php
                    }
                    if ( $witness_protection == "Yes" ){
                    ?>
                    <img src="images/Protect-Blue-icon.png" width="23" height="23" align="top" title="Witness Protection"/>
                <?php
                    }
                    ?>
                    <br />
                    <font><strong>Type : </strong>
                    <?php echo $row123["type"];?>
                    <br />
                    <?php
					if  ( $type_entity == "Person" ){
					?><font>
                    <?php
                    if  ( $type_entity == "Person" && $profile_position != "" ){
					?>
					<strong>Position : </strong><?php echo $profile_position; ?>
				    <br />
					<?php
                    }if ( $row123["email1"] != "" ){
                    ?>
                    <strong>Email : </strong><?php echo $row123["email1"]; ?>
                    <br />
                    <?php }
                    if ( $row123["email2"] != "" ){
                    ?>
                    <strong>Email 2 : </strong><?php echo $row123["email2"]; ?>
                    <br />
                    <?php }
                    if ( $row123["skype"] != "" ){
                    ?>
                    <strong>Skype : </strong><?php echo $row123["skype"]; ?>
                    <br />
                    <?php }
                    if ( $row123["notes"] != "" ){
                    ?>
                    <strong>Notes : </strong><?php echo $row123["notes"]; ?>
                    <br />
                    <?php }
                    if ( $row123["city"] != "" ){
                    ?>
                    <strong>City : </strong><?php echo $row123["city"]; ?>
                    <br />
                    <?php }
                    if ( $row123["country"] != "" ){
                    ?>
                    <strong>Country : </strong><?php echo $row123["country"]; ?>
                    <br />
                    <?php }?>

					<?php
					}
					?>
					</font>
				<br />

                </td>

               <td align="right">
                <input type="radio" name="entity_profile_id_to_link" value="<?php echo $entity_profile_id_to_link; ?>" title="<?php echo $entity_profile_id_to_link; ?>"/>
               </td>
                </tr>
                </table>
                </div>
                <br />
                <?php	
}}}}
?>
</form> 
</body>
</html>