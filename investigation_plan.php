<?php
require_once("includes\\opendb.php");

$ref_number = $_GET['ref_number'];
$ref_number = substr($ref_number, 1);
$ref_number = substr_replace($ref_number,"/",3,0);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 
<title></title>

</head>

<body>
<?php
$result = sqlsrv_query($conn,"SELECT * FROM investigation_plans WHERE ref_number = '$ref_number'");
$row = sqlsrv_fetch_array($result);



if ( $plan_submitted_manager = $row['plan_submitted_manager'] != "N/A" ) {

?>

<table width="100%" border="0" align="center" class="gridtable_report" style="background-color:#FFFFFF">
  <tr>
    <th height="47" colspan="3" align="center"><strong>INVESTIGATION PLAN</strong></th>
    </tr>
  <tr>
    <td width="269" valign="top" style="background-color:#DBE5F1"><strong>Case Number</strong></td>
    <td colspan="2" style="background-color:#FFFFFF; border-color:#FFFFFF">
    <?php
	$result_case = sqlsrv_query($conn,"SELECT * FROM cases WHERE ref_number = '$ref_number'"); 
	$row_case = sqlsrv_fetch_array($result_case);
	
	$assigned_to = $row_case['assigned_to'];
	$manager = $row_case['manager'];

	echo $ref_number;
    ?>
    </td>
    </tr>
      <tr>
    <td valign="top" class="gridtable_report"><strong>Team Appointments</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">
    
    <table width="411" border="0">
      <tr>
        <td width="136" valign="middle" align="left" style="background-color:#FFFFFF"><strong>Manager :</strong></td>
        <td width="265" style="background-color:#FFFFFF">
		<?php
			echo $manager;
        ?>
       </td>
      </tr>
      <tr>
        <td valign="middle" align="left" style="background-color:#FFFFFF"><strong>Lead Investigator :</strong></td>
        <td style="background-color:#FFFFFF">
		<?php
        	echo $assigned_to;
		?>
        </td>
      </tr>
    </table>
    
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Date Assigned</strong></td>
    <td colspan="2" style="background-color:#FFFFFF"><?php
                      
					  	$date_assigned = $row_case['date_assigned'];
		   
					   if ($date_assigned == "" OR $date_assigned == "0000-00-00"){
						 
					   }else{
							echo $newdate_assigned = date("F j, Y", strtotime($date_assigned));
					   }
					   
					  ?>

      </td>
  </tr>
  <tr>
    <td valign="top"><strong>Country</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">

    <?php
    	echo $country = $row_case['country'];
	?>
	</td>
    </tr>
    <tr>
    <td valign="top"><strong>Region</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">
    <?php
		$result_region = sqlsrv_query($conn,"SELECT * FROM region_sea WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
								$region_sea = sqlsrv_num_rows($result_region);
								if ( $region_sea != 0 ){
									echo  "South East Asia";
								}
								
								$result_region = sqlsrv_query($conn,"SELECT * FROM region_sa WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
								$region_sa = sqlsrv_num_rows($result_region);
								if ( $region_sa != 0 ){
									echo  "Souther Africa";	
								}
								
								$result_region = sqlsrv_query($conn,"SELECT * FROM region_mena WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
								$region_mena = sqlsrv_num_rows($result_region);
								if ( $region_mena != 0 ){
									echo  "MENA";
								}
							
								$result_region = sqlsrv_query($conn,"SELECT * FROM region_wa WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
								$region_wa = sqlsrv_num_rows($result_region);
								if ( $region_wa != 0 ){
									echo  "Western Africa";	
								}
								
								$result_region = sqlsrv_query($conn,"SELECT * FROM region_ca WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
								$region_ca = sqlsrv_num_rows($result_region);
								if ( $region_ca != 0 ){
									echo  "Central Africa";	
								}
								
								$result_region = sqlsrv_query($conn,"SELECT * FROM region_eeca WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
								$region_eeca = sqlsrv_num_rows($result_region);
								if ( $region_eeca != 0 ){
									echo  "EECA";	
								}
								
								$result_region = sqlsrv_query($conn,"SELECT * FROM region_lac WHERE country = '$country'");
								$region_lac = sqlsrv_num_rows($result_region);
								if ( $region_lac != 0 ){
									echo  "LAC";	
								}
    ?>
    
    </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><strong>Allegation Category</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">
    <?php
		echo $allegation_category = $row['allegation_category'];
    ?>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Allegation Sub-Category</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">
    <?php
		echo $allegation_subcategory = $row['allegation_subcategory'];
    ?>
    </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><strong>Priority</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">
	<?php echo $priority  = $row_case['priority']; ?></tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><strong>Proactive</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">
    <?php echo $proactive  = $row_case['proactive']; ?>
    </td>
  </tr>
      <tr>
        <td valign="top"><strong>Alleged Value at Risk</strong></td>
        <td width="162" style="background-color:#FFFFFF">
        <?php
			echo $alleged_value_at_risk = $row['alleged_value_at_risk'];
    	?>
        </td>
        <td width="385" style="background-color:#FFFFFF"><strong>USD</strong></td>
      </tr>
      <tr>
    <td valign="top"><strong>Value at Risk</strong></td>
    <td style="background-color:#FFFFFF">
	<?php
			echo $value_at_risk = $row['value_at_risk'];
    ?>
    </td>
    <td style="background-color:#FFFFFF"><strong>USD</strong></td>
    </tr>
  <tr>
    <td valign="top"><strong>Recommendation</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">
    <?php
			echo $recommendation = $row['recommendation'];
    ?>
    </td>
  </tr>

  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF"></td>
    
  </tr>
    <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF"></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />

    <font size="+1"><strong>1. Case Summary</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
     <?php  echo nl2br($case_summary = $row['case_summary']); ?>
     </td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />

    <font size="+1"><strong>2. Case Approach and Strategy</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($case_approach = $row['case_approach']); ?>
	</td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
    <font size="+1"><strong>3. Scope and purpose</strong></font></td>
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($scope = $row['scope']); ?>
    </td>
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
    <font size="+1"><strong>4. List of Documents to be obtained</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($list_docs = $row['list_docs']); ?>
	</td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
	<font size="+1"><strong>5.	Persons to be interviewed and/or sites to be inspected</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($persons_interviewed = $row['persons_interviewed']); ?>
	</td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
    <font size="+1"><strong>6.	Risks & Special Considerations</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($risks = $row['risks']); ?>
    </td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
    <font size="+1"><strong>7.	Resources required (i.e. Translators, Forensic IT, analyst support etc.)</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($resources = $row['resources']); ?>
    </td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
    <font size="+1"><strong>8.	Associated Costs</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($costs = $row['costs']); ?>
   </td>
  </tr>
</table>

<?php
}else{
	?>
    <img src="images/unchecked.png" width="25" height="25" /> Not available
<?php
}
?>
</body>
</html>