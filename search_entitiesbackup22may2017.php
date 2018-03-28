<?php
require_once("includes\security.php");
$Security->GoSecure();

$username = $_SESSION['username'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSS</title>
    <link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
    <script src="jquery/js/jquery-1.10.2.js"></script>
    <script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>

<script type="text/javascript">
	$(function() {
	$( "input[type=submit], button" )
	.button()
	});
	
			function showDialog(sr){
		parent.show_sr_Popup(sr);
	};
	
	function showDialogir(ir){
		parent.show_ir_Popup(ir);
	};
	
	
	function showDialogcase(ref_number){
		parent.show_case_Popup(ref_number);
	};
</script>

<style>
	div#entities-table { width: 100%; margin: 0px 0; }
	div#entities-table table { margin: 1em 0; border-collapse: collapse; font-family: 'century gothic', arial, sans-serif; width:97%; }
	div#entities-table table td { font-size:13px; border: 1px solid #DBE5F1; padding:5px; text-align: left; background-color:#F7F7F7; }
	div#entities-table table th { font-size:12px; border: 1px solid #DBE5F1; padding: 0.4em; text-align: left; background:#E5E5E5 ; color:#000}

	div#entities-table1 { width: 100%; margin: 0px 0; }
	div#entities-table1 table { margin: 1px 0; border-collapse: collapse; font-family: 'century gothic', arial, sans-serif; width:auto }
	div#entities-table1 table td { font-size:13px; border: 0px solid #DBE5F1; padding:1px; text-align: left; }
	div#entities-table1 table th { font-size:12px; border: 0px solid #DBE5F1; padding: 1px; text-align: left; background:#CCC; }


</style>

<body>

<?php include("menu_list.php"); ?>
<br />
<br />
<form action="" method="post" class="ui-widget">
<table align="center" class="gridtable">
  <tr>
    <td align="left" valign="middle"><input type="text" placeholder="Search here?" name="input" class="ui-widget" size="50" value="<?php echo $searchinput ?>" /></td>
    <td align="right" valign="middle">&nbsp;</td>
    <td valign="top"><input type = "submit" value = "Search" class="ui-widget"/></td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php
        $result_all_entities = sqlsrv_query($conncss,"SELECT * FROM list_name", array(), array( "Scrollable" => 'buffered')); 
        ?>
      <font size="-1" color="#999999"> Total entities: <strong>
        <?php
        echo $all_entities = sqlsrv_num_rows($result_all_entities);
        ?>
      </strong> </font></td>
    <td align="right" valign="middle">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
</form>
<?php 

if(isset($_POST['input']) && $_POST['input'] != "" ){ 


	$userquery = $_POST['input'];

	$userquery = trim($userquery);

	$result = sqlsrv_query($conncss,"SELECT list_name.entity_id, list_name.type_entity, list_name.name, list_name.alternative_name, list_name.accro, list_name.head_country, profiles.list_name_id FROM list_name INNER JOIN 
								profiles ON	list_name.entity_id = profiles.list_name_id WHERE list_name.entity_id like '%$userquery%' OR list_name.name like '%$userquery%' OR list_name.alternative_name like '%$userquery%' OR 
								list_name.accro like '%$userquery%' OR profiles.position like '%$userquery%' OR profiles.email1 like '%$userquery%' OR profiles.email2 like '%$userquery%' OR 
								profiles.home_phone_number like '%$userquery%' OR profiles.office_phone_number like '%$userquery%' OR profiles.mobile like '%$userquery%' OR 
								profiles.fax like '%$userquery%' OR profiles.skype like '%$userquery%' OR profiles.web_page like '%$userquery%' OR profiles.address like '%$userquery%' OR 
								profiles.post_code like '%$userquery%' OR profiles.notes like '%$userquery%'");	
	$all_rows = sqlsrv_fetchall($result);
	$hit_found_main = count($all_rows);
	?>
	<br />
    <table class='gridtable' align='center'>
        <tr><td align="right">
        <font color="#CC0000">
            <strong><?php echo $hit_found_main . " match(es) found"; ?></strong>
        </font>
        </td></tr>
    </table>
    <br />

 <?php


foreach ($all_rows as $myrow){
	$entity_id = $myrow['entity_id'];
	$type_entity = $myrow['type_entity'];
	$profile_id = $myrow['list_name_id'];
	$type_entity = $myrow['type_entity'];
	$alt_name = $myrow["alternative_name"];
	?>
            
<div id="entities-table" align="center">
            
<table width="100%">
<tr>
<th width="3%">Id</th>
<th width="55%">Name</th>
<th width="15%">Acronym</th>
<th width="30%">Nationality / Country based</th>
</tr>

			<!--MAIN DETAILS ENTITY (ID, NAME....)-->
          	<tr>
            <td align="center">
            <strong>
            <?php 
			$highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $entity_id );
			if (!empty($highlighted)) {
				echo $text = $highlighted;
			}else{
				echo $entity_id;
			}
			?>
            </strong>
            </td>
            <td>
            <?php
            if ( $type_entity != "Person" ){
            $icon = "entity-icon.png";
            }else{
            $icon = "user-silhouette-icon.png";
            }
            
            ?>
            <img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
            <a href="" onclick="return parent.showDialogentitydetails('<?php echo $entity_id ?>')">
                
                <?php
                //echo str_replace($userquery,"<strong><mark><font color='#FF0000'>$userquery</font></mark></strong>",nl2br($name = $myrow['name']));
				$name = $myrow['name'];
				$highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $name );
					if (!empty($highlighted)) {
						echo $text = $highlighted;
					}else{
						echo $name;
					}
                ?>
            </a> 
            <?php
            if ( $alt_name != "" ){
				echo "<br />";
            echo "<font color='#999999'>";
			//echo $highlighted1 = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $alt_name);
			$highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $alt_name );
			if (!empty($highlighted)) {
				$alt_name = $highlighted;
			}
            echo "( ".$alt_name." )";
            echo "</font>";
            }
            ?>
            </td>
            <td valign="middle">
                	<?php 
                     //echo str_replace($userquery,"<strong><mark><font color='#FF0000'>$userquery</font></mark></strong>",nl2br($accro = $myrow['accro']));
					 $accro = $myrow['accro'];
					 $highlighted = preg_filter("/" . preg_quote($userquery,'/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $accro );
					if (!empty($highlighted)) {
						echo $text = $highlighted;
					}else{
						echo $accro;
					}
					 ?>
            </td>
            <td valign="middle">
			<?php echo $head_country = $myrow['head_country']; ?>
            </td>
            </tr>
            
            
            <!--ENTITIES LINKED-->
			<?php
            $result_entities_linked = sqlsrv_query($conncss,"select link FROM entities_link WHERE entity_id = '$entity_id'");
            $all_linked = sqlsrv_fetchall($result_entities_linked);
            $entities_linked = count($all_linked);
            if ( $entities_linked > 0 ){
            ?>
            <tr>
            
                <td colspan="4">
                
                <div id="entities-table1">
                   <table>
                    <tr><td valign="top">
                    
                    <strong>Linked Entities : </strong>&nbsp;&nbsp;</td><td>
                    
                    <?php
                    foreach ($all_linked as $row_result_entities_linked)
                    {
                        $link = $row_result_entities_linked['link'];
                        
                        $result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
                        $row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
                        
                        $type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];
                        
                        if ( $type_entity_complainant != "Person" ){
                        $icon = "entity-icon.png";
                        }else{
                        $icon = "user-silhouette-icon.png"; 
                        }
                        ?>
                        <img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                        <?php
                        $entity_if_link = $row_resultentity_linked_main_details['entity_id'];
                        ?>
                        
                        
                        <strong>
                        <a href="" onclick="return parent.showDialogentitydetails('<?php echo $entity_if_link ?>')">
                        <font color="#136CD9">
                        <?php echo $complainant = $row_resultentity_linked_main_details['name'];?>
                        </font>
                        </a>    </strong>
                        <?php
                        
                        
                        
                        
                        $alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];
                        
                        if ( $alternative_name_complainant != "" ){
                        echo "<font size='-1' color='#999999'>";
                        echo " (".$alternative_name_complainant.")";
                        echo "</font>";
                        }
                        echo "<br />";
                    }
                    ?>
                    </td></tr>
                </table>
                </div> 
                </td>
            </tr>
            <?php } ?>

<tr>       

<td colspan="4">
<?php

//SEARCH THE PROFILES OF THE ENTITY........................................

	$sql123 = "SELECT * FROM profiles WHERE list_name_id = '$entity_id'";
	$sql_result1 = sqlsrv_query($conncss, $sql123);
	while ($row123 = sqlsrv_fetch_array($sql_result1))
	{	
		$profile_id = $row123['id'];
		$list_name_id = $row123['list_name_id'];
		$whistleblower_protection = $row123["whistleblower_protection"];
		$informant_protection = $row123["informant_protection"];
		$witness_protection = $row123["witness_protection"];
		$category = $row123["category"];
		?>
      
        <div id="entities-table1">
        
                <table>
                    <tr>
                    
                    <td width="800">
                            <!--LOG DETAILS-->
                            <table>
                              <tr>
                                <td align="right" valign="middle"><img src="images/profile-icon.png" alt="Profile" width="10" height="10" align="top"/></td>
                                <td colspan="3" align="left" valign="top"><font color="#A91014">&nbsp;<strong><?php echo $category; ?></strong></font>
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
                            ?></td>
                                </tr>
                              <tr>
                                <td align="right" valign="middle">&nbsp;</td>
                                <td colspan="3" align="left" valign="middle"><strong>Type : </strong><?php echo $row123["type"]; ?> <br />
                                  <?php
                        $profile_position = $row123["position"];
                        
                        if  ( $type_entity == "Person" || $profile_position != "" ){
                        ?>
                                  <strong>Position : </strong>
                                  <?php
                        //echo $profile_position; 
                            $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $profile_position );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $profile_position;
                            }
                        ?>
                                  <br />
                                  <?php
                        }if ( $row123["email1"] != "" ){
                        ?>
                                  <strong>Email : </strong>
                                  <?php 
                        $email1 = $row123["email1"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $email1 );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $email1;
                            }
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["email2"] != "" ){
                        ?>
                                  <strong>Email 2 : </strong>
                                  <?php 
                        $email2 = $row123["email2"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $email2 );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $email2;
                            } 
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["skype"] != "" ){
                        ?>
                                  <strong>Skype : </strong>
                                  <?php
                        $skype =  $row123["skype"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $skype );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $skype;
                            } 
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["address"] != "" ){
                        ?>
                                  <strong>Address : </strong>
                                  <?php 
                        $address = $row123["address"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $address );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $address;
                            } 
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["city"] != "" ){
                        ?>
                                  <strong>City : </strong>
                                  <?php 
                        $city = $row123["city"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $city );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $city;
                            }
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["country"] != "" ){
                        ?>
                                  <strong>Country : </strong><?php echo $row123["country"]; ?> <br />
                                  <?php }
                        if ( $row123["home_phone_number"] != "" ){
                        ?>
                                  <strong>Home Phone Number : </strong>
                                  <?php 
                        $home_number = $row123["home_phone_number"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $home_number );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $home_number;
                            }
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["office_phone_number"] != "" ){
                        ?>
                                  <strong>Office Phone Number : </strong>
                                  <?php 
                        $office_number = $row123["office_phone_number"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $office_number );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $office_number;
                            }
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["mobile"] != "" ){
                        ?>
                                  <strong>Mobile : </strong>
                                  <?php 
                        $mobile = $row123["mobile"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $mobile );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $mobile;
                            }
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["fax"] != "" ){
                        ?>
                                  <strong>Fax : </strong>
                                  <?php 
                        $fax = $row123["fax"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $fax );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $fax;
                            }
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["web_page"] != "" ){
                        ?>
                                  <strong>Web page : </strong>
                                  <?php 
                        $web_page = $row123["web_page"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $web_page );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $web_page;
                            }
                        ?>
                                  <br />
                                  <?php }
                        if ( $row123["notes"] != "" ){
                        ?>
                                  <strong>Notes : </strong>
                                  <?php 
                        $notes = $row123["notes"]; 
                        $highlighted = preg_filter("/" . preg_quote($userquery, '/') . "/i", '<strong><mark><font color="#FF0000">$0</font></mark></strong>', $notes );
                            if (!empty($highlighted)) {
                                echo $text = $highlighted;
                            }else{
                                echo $notes;
                            }
                        ?>
                                  <br />
                                  <?php } ?></td>
                                </tr>
                              </table>
                    </td>    
                    
                    <td valign="top">
                           
					 <?php
                    //SEARCH FOR ALLEGATIONS OR CASES LINKED
                        $result_related_complainant = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE complainant = '$profile_id'"); 
                        $all_complainant = sqlsrv_fetchall($result_related_complainant);
                        $num_complainant = count($all_complainant);
                        
                        $result_related_other = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE profile_id = '$profile_id'"); 
                        $all_other = sqlsrv_fetchall($result_related_other);
                        $num_other = count($all_other);
						
						$result_ir_linked = sqlsrv_query($conncss,"SELECT report_id FROM entities_intel_reports WHERE profile_id = '$profile_id'");
						$linked_ir = sqlsrv_fetchall($result_ir_linked );
						$num_ir = count($linked_ir);
                        
                        if ($num_complainant == 0 && $num_other == 0 && $num_ir == 0){		
                        ?>
                            <table width="434" border="0" align="center">
                                <tr><td align="left"><strong><font color="#999999" size="-2">Not linked to any Allegation or Case</font></strong></td></tr>
                            </table>
                        <?php }else{  ?>		
                   		<table>
                    <tr><td colspan="3" align="left"><strong><font color="#999999" size="-2">Allegations / Cases Involved</font></strong></td></tr>
                      <tr>
                        <th width="68" align="center" valign="top"><strong>Report</strong></th>
                        <th width="218" align="center" valign="top"><strong>Resolution</strong></th>
                        <th width="134" align="center" valign="top"><strong>Case / Allegation</strong></th>
                      </tr>
                      <?php
					//$result_ir_linked = sqlsrv_query($conncss,"SELECT report_id FROM entities_intel_reports WHERE profile_id = '$profile_id'");
					//$linked_ir = sqlsrv_fetchall($result_ir_linked );
					if ( $ir_linked = count($linked_ir) > 0 ){
							$dash = "IR";
							foreach ($linked_ir as $row_ir_linked)
							{  
							$report_id = $row_ir_linked['report_id'];
							?>
                            <tr>
                            <td style="background-color:#FFFFFF">
                            <img src="images/ir.png" width="15" height="15" align="absmiddle"/>
								<a onclick="return showDialogir(<?php echo $report_id ?> )"><?php echo $dash.$report_id; ?> </a>
                            </td>
                            <td style="background-color:#FFFFFF"></td>
                            <td style="background-color:#FFFFFF"></td>
                            </tr>
				 <?php }
				 }
                      
                        if ($num_complainant != 0){	
                            foreach ($all_complainant as $row_result_related_allegations_complainant)
                            {
                            ?>
                      <tr>
                        <td style="background-color:#FFFFFF"><?php	
                                        $allegation_id = $row_result_related_allegations_complainant['id'];
                                        $allegation_resolution = $row_result_related_allegations_complainant['resolution'];
                                        $case_related_open = $row_result_related_allegations_complainant['case_number'];
                                        $allegation_status = $row_result_related_allegations_complainant['status'];	
                                    ?>
                          <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/> <a onclick="return showDialog(<?php echo $allegation_id ?> )"><?php echo $allegation_id;?></a></td>
                        <td style="background-color:#FFFFFF"><?php echo $allegation_resolution; ?></td>
                        <td style="background-color:#FFFFFF" align="center"><?php
                                    if ( $allegation_resolution == "Open case in CMS" || $allegation_resolution == "Merge with an existing Case"){
                                        ?>
                          <img src="images/case-icon.png" width="16" height="16" align="absmiddle"/>
                          <?php
                                            $addthis = "9";
                                            $ref_number = str_replace("/","",$case_related_open);
                                            $ref_number = $addthis.$ref_number;
                                            ?>
                          <a onclick="return showDialogcase(<?php echo $ref_number ?> )"> <?php echo $case_related_open;?></a>
                          <?php
                                    }else if ( $allegation_resolution == "Merge with an existing Allegation" ){
                                    ?>
                          <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/> <a onclick="return showDialog(<?php echo $case_related_open ?> )"><?php echo $case_related_open;?></a>
                          <?php
                                    }
                                    ?></td>
                      </tr>
                      <?php	
                         } 
                      }
                
                
                //LINKED AS OTHER
                
                        if ($num_other > 0){	
                            foreach ($all_other as $row_result_related_allegations_complainant)
                            {
	
                                $allegation_id = $row_result_related_allegations_complainant['allegation_id'];
                                $case_related_open = $row_result_related_allegations_complainant['case_number'];
                                
                                if ( $allegation_id != "" )
                                {
									$result_allegation_internal = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$allegation_id'");
									$row_internal = sqlsrv_fetch_array($result_allegation_internal);
									$internal = $row_internal['country'];
									
									if ($internal != "Internal")
									{	
									?>
                                    <tr>
                                    <td style="background-color:#FFFFFF;">
                                        <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/>
                                        <a onclick="return showDialog(<?php echo $allegation_id ?> )">
                                            <?php echo $allegation_id;?>
                                        </a>
                                     </td>
                                     <td style="background-color:#FFFFFF;">
                                        <?php
                                        $result_resolution = sqlsrv_query($conncss,"SELECT resolution, case_number FROM allegation_details WHERE id = '$allegation_id'"); 
                                        $row_resolution = sqlsrv_fetch_array($result_resolution);
                                        echo $resolution = $row_resolution['resolution'];
                                            ?>
                                     </td>
                                     
                                     <td style="background-color:#FFFFFF;">
                                        <?php 
                                        $case_number = $row_resolution['case_number'];
										if ($case_number != ""){
											if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case"){
												 ?>
												<img src="images/case-icon.png" width="16" height="16" align="absmiddle"/>
												<?php
													$addthis = "9";
													$ref_number = str_replace("/","",$case_number);
													$ref_number = $addthis.$ref_number;
													?>
													<a onclick="return showDialogcase(<?php echo $ref_number ?> )"> <?php echo $case_number;?> </a>
													<?php
											}else if ( $resolution == "Merge with an existing Allegation" ){
													?>
													<img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/>
													<a onclick="return showDialog(<?php echo $case_number ?> )"><?php echo $case_number;?></a>
											  <?php
											 }
										}
                                      ?>
                                     </td>   
                  					</tr>
                                     <?php
									}
                                }else{
                                    
                                    ?>
                                    <tr>
                                    <td style="background-color:#FFFFFF;">
                                    <?PHP
                                        $result_related_allegation = sqlsrv_query($conncss,"SELECT id, resolution FROM allegation_details WHERE case_number = '$case_related_open' AND resolution = 'Open case in CMS'"); 
                                        if ($row_result = sqlsrv_fetch_array($result_related_allegation)){
                                            $allegation_id = $row_result['id'];
                                            $allegation_related_resolution = $row_result['resolution'];
                                            ?>
                                          <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/>
                                          <a onclick="return showDialog(<?php echo $allegation_id ?> )"><?php echo $allegation_id;?></a>
                                            <?php   
                                        }	
                                    ?>
                                    
                                    
                                    </td>
                                     <td style="background-color:#FFFFFF;">
                                        <?php
										echo $allegation_related_resolution;
										?>
                                     </td>
                                     
                                     <td style="background-color:#FFFFFF;">
                                     <img src="images/case-icon.png" width="16" height="16" align="absmiddle"/>
                                        <?php
                                            $addthis = "9";
                                            $ref_number = str_replace("/","",$case_related_open);
                                            $ref_number = $addthis.$ref_number;
                                            ?>
                                            <a onclick="return showDialogcase(<?php echo $ref_number ?> )"> <?php echo $case_related_open;?> </a>
                                     </td>
                                     </tr>
                                    
                                <?php	
                                }
                                
								}
                      }?>
                    </table>
						<?php }?>
                            
                    </td>
                    </tr>
                </table>
        </div>
<br />

<?php } ?>
</td>
</tr>
</table>
<?php }} ?>

</body>
</html>