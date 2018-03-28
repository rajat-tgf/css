<?php
require_once("includes\security.php");
$Security->GoSecure();
$entity_id = 0;
if ( isset ($_GET['entity_id'])) {
$entity_id = $_GET['entity_id'];
$result_profiles = sqlsrv_query($conncss,"select * from profiles WHERE list_name_id = '$entity_id'"); 
		$row_profiles = sqlsrv_fetch_array( $result_profiles );
		$profile_id = $row_profiles['id'];	
		$category = $row_profiles['category'];
		$position = $row_profiles['position'];
		$type = $row_profiles['type'];
		$whistleblower_protection = $row_profiles['whistleblower_protection'];
		$informant_protection = $row_profiles['informant_protection'];
		$witness_protection = $row_profiles['witness_protection'];
		$email1 = $row_profiles['email1'];
		$email2 = $row_profiles['email2'];
		$home_phone_number = $row_profiles['home_phone_number'];
		$office_phone_number = $row_profiles['office_phone_number'];
		$mobile = $row_profiles['mobile'];
		$skype = $row_profiles['skype'];
		$web_page = $row_profiles['web_page'];
		$address = $row_profiles['address'];
		$post_code = $row_profiles['post_code'];
		$city = $row_profiles['city'];
		$country = $row_profiles['country'];
		$notes = $row_profiles['notes'];
}
if ( isset ($_GET['profile_id'])) {
	$profile_id = $_GET['profile_id'];


		$result_profiles = sqlsrv_query($conncss,"select * from profiles WHERE id = '$profile_id'"); 
		$row_profiles = sqlsrv_fetch_array( $result_profiles );
				
		$profile_id = $row_profiles['id'];
		$category = $row_profiles['category'];
		$position = $row_profiles['position'];
		$type = $row_profiles['type'];
		$whistleblower_protection = $row_profiles['whistleblower_protection'];
		$informant_protection = $row_profiles['informant_protection'];
		$witness_protection = $row_profiles['witness_protection'];
		$email1 = $row_profiles['email1'];
		$email2 = $row_profiles['email2'];
		$home_phone_number = $row_profiles['home_phone_number'];
		$office_phone_number = $row_profiles['office_phone_number'];
		$mobile = $row_profiles['mobile'];
		$skype = $row_profiles['skype'];
		$web_page = $row_profiles['web_page'];
		$address = $row_profiles['address'];
		$post_code = $row_profiles['post_code'];
		$city = $row_profiles['city'];
		$country = $row_profiles['country'];
		$notes = $row_profiles['notes'];
		$date_creation_profile = $row_profiles['date_creation'];
		$created_by_profile = $row_profiles['created_by'];
}		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

</head>

<body>

<div id="tabs">
<ul>
<li><a href="#tabs-1">Log Details</a></li>
<li><a href="#tabs-2">Notes</a></li>
<li><a href="#tabs-3">Links</a></li>
<li><a href="#tabs-4"><img src="images/history.png" width="15" height="15"/></a></li>

</ul>
<div id="tabs-1">
<table width="98%" class="gridtable">
              <tr>
                <td colspan="2" align="right" valign="top">
                <a onclick="return parent.showDialogeditlog(<?php echo $profile_id ?> )">
                  <img src="images/Edit_icon.png" alt="Edit" width="30" height="30" align="top" title="Edit Log"/>
                </a>
               </td>
              </tr>
              <tr>
                <td colspan="3" align="left" valign="top"><strong>Category : </strong><font color="#990000"><?php echo $category ?></font>
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
                </td>
              </tr>
              <tr>
              <td>
			  <strong>Type : </strong><?php echo $type; ?><br />
				<?php
			  
                $profile_position = $row_profiles["position"];
                if  ( $type_entity == "Person" || $profile_position != "" ){ ?>
				
	    	            <strong>Position:</strong>&nbsp;<?php echo $profile_position ?>
                    
                    <br />
                 <?php }
                 
                $email1 = $row_profiles["email1"];
                if  ( $email1 != "" ){ ?>
				
	    	            <strong>Email 1:</strong>&nbsp;<?php echo $email1 ?>
                    
                    <br />
                 <?php } 
				 $email2 = $row_profiles["email2"];
                if  ( $email2 != "" ){ ?>
				
	    	            <strong>Email 2:</strong>&nbsp;<?php echo $email2 ?>
                    
                    <br />
                 <?php }
				 
				$skype = $row_profiles["skype"];
                if  ( $skype != "" ){ ?>
				
	    	            <strong>Skype:</strong>&nbsp;<?php echo $skype ?>
                    
                    <br />
                 <?php }
				 
				 $address = $row_profiles["address"];
                if  ( $address != "" ){ ?>
				
	    	            <strong>Address:</strong>&nbsp;<?php echo $address ?>
                    
                    <br />
                 <?php }
				 $city = $row_profiles["city"];
                if  ( $city != "" ){ ?>
				
	    	            <strong>City:</strong>&nbsp;<?php echo $city ?>
                    
                    <br />
                 <?php }
				 $country = $row_profiles["country"];
                if  ( $country != "" ){ ?>
				
	    	            <strong>Country:</strong>&nbsp;<?php echo $country ?>
                    
                    <br />
                 <?php }
				 $home_phone_number = $row_profiles["home_phone_number"];
                if  ( $home_phone_number != "" ){ ?>
				
	    	            <strong>Home Phone Number:</strong>&nbsp;<?php echo $home_phone_number ?>
                    
                    <br />
                 <?php }
				 $office_phone_number = $row_profiles["office_phone_number"];
                if  ( $office_phone_number != "" ){ ?>
				
	    	            <strong>Office Phone Number:</strong>&nbsp;<?php echo $office_phone_number ?>
                    
                    <br />
                 <?php }
				 $mobile = $row_profiles["mobile"];
                if  ( $mobile != "" ){ ?>
				
	    	            <strong>Mobile:</strong>&nbsp;<?php echo $mobile ?>
                    
                    <br />
                 <?php }
				 $fax = $row_profiles["fax"];
                if  ( $fax != "" ){ ?>
				
	    	            <strong>Fax:</strong>&nbsp;<?php echo $fax ?>
                    
                    <br />
                 <?php }
				 $web_page = $row_profiles["web_page"];
                if  ( $web_page != "" ){ ?>
				
	    	            <strong>Web:</strong>&nbsp;<?php echo $web_page ?>
                    
                    <br />
                 <?php } ?>
              
              </td>
              
              
              </tr>
              </table>
</div>

<div id="tabs-2">

<table width="98%" class="gridtable">
<tr>
<td ><strong>Notes</strong><br />

<?php echo $note = nl2br($notes) ?></td>
</tr>
</table>
</div>


<div id="tabs-3">

<div id="entities-contain">        
<table width="568" border="0">
            <tr>
            <th width="149" align="center" valign="top"><strong> Report</strong></th>
            <th width="231" align="center" valign="top"><strong>&nbsp;&nbsp;Resolution</strong></th>
            <th width="174" align="center" valign="top"><strong>Case / Allegation</strong></th>
            </tr>
           <?php
					$result_ir_linked = sqlsrv_query($conncss,"SELECT report_id FROM entities_intel_reports WHERE profile_id = '$profile_id'");
					$linked_ir = sqlsrv_fetchall($result_ir_linked );
					if ( $ir_linked = count($linked_ir) > 0 ){
							$dash = "IR";
							foreach ($linked_ir as $row_ir_linked)
							{  
							$report_id = $row_ir_linked['report_id'];
							?>
                            <tr>
                            <td>
                            <img src="images/ir.png" width="15" height="15" align="absmiddle"/>
								<a onclick="return parent.showDialogir(<?php echo $report_id ?> )"><?php echo $dash.$report_id; ?> </a>
                            </td>
                            <td></td>
                            <td></td>
                            </tr>
				 <?php }
				 }
            
    
        $result_related_allegations_complainant = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE complainant = '$profile_id'"); 
		$all_rows = sqlsrv_fetchall($result_related_allegations_complainant);
		$num_allegations_complainant = count($all_rows);
		if ($num_allegations_complainant != 0){	
			foreach($all_rows as $row_result_related_allegations_complainant)
			{
			?>
      <tr>
        <td align="left" valign="middle"><?php	
                        $allegation_id = $row_result_related_allegations_complainant['id'];
                        $allegation_resolution = $row_result_related_allegations_complainant['resolution'];
                        $case_related_open = $row_result_related_allegations_complainant['case_number'];
                        $allegation_status = $row_result_related_allegations_complainant['status'];	
                    ?>
          <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/>
          
          
          <a onclick="return parent.showDialog(<?php echo $allegation_id ?> )">
          	<?php echo $allegation_id;?>
          </a>
          
          </td>
        <td><?php echo $allegation_resolution; ?></td>
        <td align="center"><?php
					if ( $allegation_resolution == "Open case in CMS" || $allegation_resolution == "Merge with an existing Case"){
						?>
                          <img src="images/case-icon.png" width="16" height="16" align="absmiddle"/>
                          <?php
                                            $addthis = "9";
                                            $ref_number = str_replace("/","",$case_related_open);
                                            $ref_number = $addthis.$ref_number;
                                            ?>
						  <a onclick="return parent.showDialogcase(<?php echo $ref_number ?> )">
						  <?php echo $case_related_open;?></a>
                          
                          <?php
                    }else if ( $allegation_resolution == "Merge with an existing Allegation" ){
                    ?>
          <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/>
          <a onclick="return parent.showDialogcase(<?php echo $case_related_open ?> )">
          	<?php echo $case_related_open;?>
          </a>
          <?php
					}
                    ?></td>
      </tr>
      <?php	
     	 } 
	  }


//LINKED AS OTHER

        $result_related_allegations_complainant = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE profile_id = '$profile_id'"); 
		$all_rowsb = sqlsrv_fetchall($result_related_allegations_complainant);
		$num_allegations_complainant = count($all_rowsb);
		if ($num_allegations_complainant != 0){	
			foreach($all_rowsb as $row_result_related_allegations_complainant)
			{
				?>
      			<?php	
				$allegation_id = $row_result_related_allegations_complainant['allegation_id'];
				$case_related_open = $row_result_related_allegations_complainant['case_number'];
				
				if ( $allegation_id != "" )
				{?>
                	<tr>
        			<td align="left" valign="middle">
                  		<img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/>
                        <a onclick="return parent.showDialog(<?php echo $allegation_id ?> )"><?php echo $allegation_id;?></a>

                     </td>
                     <td>
                     	<?php
					 	$result_resolution = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$allegation_id'"); 
						$row_resolution = sqlsrv_fetch_array($result_resolution);
						echo $resolution = $row_resolution['resolution'];
							?>
                     </td>
                     
                     <td>
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
                                <a onclick="return parent.showDialogcase(<?php echo $ref_number ?> )"><?php echo $case_number;?></a>
								<?php
						}else if ( $resolution == "Merge with an existing Allegation" ){
								?>
								<img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/>
                                <a onclick="return parent.showDialog(<?php echo $case_number ?> )">
                                <?php echo $case_number;?></a>
						  <?php
                         }
					}
                      ?>
                     </td>   
  
         			 <?php
				}else{
					
					?>
                    <tr>
        			<td align="left" valign="middle">
                    </td>
                     <td>
                     	
                     </td>
                     
                     <td>
                     <img src="images/case-icon.png" width="16" height="16" align="absmiddle"/>
                     	<?php
							$addthis = "9";
							$ref_number = str_replace("/","",$case_related_open);
							$ref_number = $addthis.$ref_number;
							?>
                            <a onclick="return parent.showDialogcase(<?php echo $ref_number ?> )"><?php echo $case_related_open;?></a>
                     </td>
					
      			<?php	
				}
				
				}
	  }?>
    </table>
</div>
</div>
<div id="tabs-4">
<table width="568" border="0" class="gridtable">
<tr><td>
<?php

$result_profiles_creation = sqlsrv_query($conncss,"select * from profiles WHERE id = '$profile_id'"); 
$row_profiles_creation = sqlsrv_fetch_array( $result_profiles_creation );

$date_creation_profile = $row_profiles_creation['date_creation'];
$created_by_profile = $row_profiles_creation['created_by'];
$entity_id = $_SESSION['entity_id'];
if ( $created_by_profile == ""){
	echo "Profile created by Unknown";
	echo "<br />";
}else{
	$date_creation_profile_new = date('F j, Y', strtotime($date_creation_profile));
	echo $date_creation_profile_new. ' - Profile created by '.$created_by_profile;
	echo "<br />";
}
$quey1="SELECT * FROM history_entities WHERE profile_id = '$profile_id' OR entity_id = '$entity_id' ORDER BY id DESC"; 
$result=sqlsrv_query($conncss,$quey1);

while($row = sqlsrv_fetch_array($result)){
	$save_by = $row['save_by'];
	$save_date_new_date = date('F j, Y', strtotime($save_date = $row['save_date'])); 
	echo $save_date_new_date.' - Modified by '.$save_by; 
	echo "<br />";
}

?>
</td></tr></table>
</div>
</div>

</body>
</html>