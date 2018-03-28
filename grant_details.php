<?php
require_once("includes\\opendb.php");

if ( isset ($_GET['grant'])) {
	$grant_number = $_GET['grant'];
}

$result_grant = sqlsrv_query($conn,"select * from grant_data WHERE grant_number = '$grant_number'"); 
$row = sqlsrv_fetch_array( $result_grant );

$sql = sqlsrv_query($conncss, "SELECT * FROM allegation_grant_links WHERE grant_number = '$grant_number'", array(), array( "Scrollable" => 'buffered'));		
$total_allegations = sqlsrv_num_rows($sql);

$sql = sqlsrv_query($conncss, "SELECT * FROM intelligence_report_grant_links WHERE grant_number = '$grant_number'", array(), array( "Scrollable" => 'buffered'));		
$total_ir = sqlsrv_num_rows($sql);


		
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
    $( "#maintabs" ).tabs();
	$( "#tabs" ).tabs();
    });
 </script>


<style type="text/css">
table.gridtabletitle {
font-size:11px;
color:#EFEFEF;

}
table.gridtabletitle th {
font-size:13px;
border-width: 1px;
color:#06C;
padding: 3px;
border-color: #666;
border-spacing:2px;

}
</style>
</head>

<body>

<div id="maintabs">
<ul>
<li><a href="#maintabs-1">Grant Details</a></li>
<li><a href="#maintabs-2">Allegations / Intelligence Reports linked (<?php echo $total_allegations + $total_ir ?>)</a></li>
</ul>

<div id="maintabs-1">



<div id="notes-contain">
<table width="100%">
<tr>
  <td><strong>Grant Number:</strong></td>
  <td><font color="#990000"> <?php echo $grant_number; ?></font></td>
  <td><strong>Component:</strong></td>
  <td><?php echo $component = $row['component']; ?></td>
</tr>
<tr>
<td><strong>Grant Title:</strong></td>
<td><?php echo $grant_status = $row['grant_title']; ?></td>
<td><strong>FPM:</strong></td>
<td><?php echo $fpm = $row['fpm']; ?></td>
</tr>
<tr>
  <td><strong>PR:</strong></td>
  <td><?php echo $pr = $row['pr']; ?></td>
  <td><strong>PO:</strong></td>
  <td><?php echo $po = $row['po']; ?></td>
  </tr>
<tr>
  <td><strong>PR type:</strong></td>
  <td><?php echo $pr_type = $row['pr_type']; ?></td>
  <td><strong>LFA:</strong></td>
  <td><?php echo $lfa = $row['lfa']; ?></td>
  </tr>


<tr>
  <td colspan="4" align="center">
  
  <table width="100%" align="center" cellspacing="20">
    <tr>
      <td valign="top" align="left">
      
      
     <table cellspacing="0">
     
     <tr>
       <td><strong>Grant Status:</strong></td>
       <td><?php echo $grant_status = $row['grant_status']; ?></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
  <td><strong>Grant Signing Date:</strong></td>
  <td><?php 
  
  $grant_signing_date = $row['grant_signing_date'];
  
  if ($grant_signing_date != ""){
  echo $grant_signing_date = date('F j, Y', strtotime($row['grant_signing_date']));
  }
  ?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><strong>Program Start Date:</strong></td>
  <td><?php echo $program_start_date = date('F j, Y', strtotime($row['program_start_date']));?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><strong>Program End Date:</strong></td>
  <td><?php echo $program_end_date = date('F j, Y', strtotime($row['program_end_date']));?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
     
     
     
     
     
     </table>   
        
        
        
        </td>
      <td valign="top">
      <div class="steelblue-table-header-small">
          <strong>Signed</strong>
          </div>
        <div class="steelblue-table-features">
          <p><strong>Grant Signed Amount (EUR): </strong><?php echo $grant_signed_amount_eur = number_format($row['grant_signed_amount_eur']); ?></p>
          <p><strong>Grant Signed Amount (USD): </strong><?php echo $grant_signed_amount_usd = number_format($row['grant_signed_amount_usd']); ?></p>
          <p><strong>Grant Signed Amount (USD) equ:</strong> <?php echo $grant_signed_amount_usd_euq = number_format($row['grant_signed_amount_usd_euq']); ?></p>
          </div>
         </td>
      <td>
        <div class="steelblue-table-header-small">
        <strong>Committed</strong>
        </div>
        <div class="steelblue-table-features">
          <p><strong>Grant Signed Committed (EUR):</strong> <?php echo $grant_committed_amount_eur = number_format($row['grant_committed_amount_eur']); ?></p>
          <p><strong>Grant Signed Committed (USD): </strong><?php echo $grant_committed_amount_usd = number_format($row['grant_committed_amount_usd']); ?></p>
          <p><strong>Grant Signed Committed (USD) equ:</strong> <?php echo $grant_committed_amount_usd_euq = number_format($row['grant_committed_amount_usd_euq']); ?></p>
          </div>
        </td>
        
        
        <td valign="top">
        <div class="steelblue-table-header-small">
          <strong>Disbursed</strong>
          </div>
        <div class="steelblue-table-features">
          <p><strong>Grant Signed Disbursed (EUR):</strong> <?php echo $grant_disbursed_amount_usd = number_format($row['grant_disbursed_amount_usd']); ?></p>
          <p><strong>Grant Signed Disbursed (USD):</strong> <?php echo $grant_disbursed_amount_usd = number_format($row['grant_disbursed_amount_usd']); ?></p>
          <p><strong>Grant Signed Disbursed (USD) equ:</strong> <?php echo $grant_disbursed_amount_usd_equ = number_format($row['grant_disbursed_amount_usd_equ']); ?></p>
          </div>
        </td>
        
        
        
      </tr>
    </table>
    
    
    </td>
  <td>&nbsp;</td>
</tr>


<tr>
  <td colspan="4">
<?php
//IMPLEMENTERS

$sql = "SELECT grant_number FROM implementers WHERE grant_number = '$grant_number'";
$sql_result = sqlsrv_query($conn, $sql);
$all_rows = sqlsrv_fetchall($sql_result);
$total_implementers = count($all_rows);

//QUART

$sql = "SELECT grant_number FROM quart WHERE grant_number = '$grant_number'";
$sql_result = sqlsrv_query($conn, $sql);
$all_rows = sqlsrv_fetchall($sql_result);
$total_quart = count($all_rows);


//DISBURSMENTS

$sql = "SELECT grant_number FROM disbursment WHERE grant_number = '$grant_number'";
$sql_result = sqlsrv_query($conn, $sql);
$all_rows = sqlsrv_fetchall($sql_result);
$total_disbursments = count($all_rows);



?>  
<div id="tabs">
<ul>
<li><a href="#tabs-1">DisbursementS (<?php echo $total_disbursments ?>)</a></li>
<li><a href="#tabs-2">Implementers (<?php echo $total_implementers ?>)</a></li>
<li><a href="#tabs-3">QUART (<?php echo $total_quart ?>)</a></li>
 </ul>

<div id="tabs-1">

<?php if ($total_disbursments != 0 ){ ?>

<div id="entities-contain">
        <table>
        <tr>
        <th>Rate</th>
        <th>Disbursement Date</th>
        <th>Amount (EUR)</th>
        <th>Amount (USD)</th>
        <th>Amount (USD) Equ</th>
        </tr>
        <?php
        $sql = "SELECT * FROM disbursment WHERE grant_number = '$grant_number' ORDER BY disbursement_date ASC";
        $sql_result = sqlsrv_query($conn, $sql);
        $all_rows = sqlsrv_fetchall($sql_result);
        foreach ($all_rows as $row_implementer) {
			?>
			<tr>
            <td><?php echo $rating = $row_implementer['rating']; ?> </td>
			<td><?php $disbursement_date = $row_implementer['disbursement_date'];
			if ($disbursement_date != ""){
			  echo $disbursement_date = date('F j, Y', strtotime($row_implementer['disbursement_date']));
			  }
			?> </td>
			<td><?php echo $disbursement_amount_eur = number_format($row_implementer['disbursement_amount_eur']); ?></td>
        	<td><?php echo $disbursement_amount_usd = number_format($row_implementer['disbursement_amount_usd']); ?></td>
            <td><?php echo $disbursement_amount_usd_equ = number_format($row_implementer['disbursement_amount_usd_equ']); ?></td>
			</tr>
        <?php } ?>
        </table>
</div>  
<?php } ?>



</div>

<div id="tabs-2">


<?php if ($total_implementers != 0 ){ ?>

<div id="entities-contain">
        <table>
        <tr>
        <th>Implementer</th>
        <th>Category</th>
        <th>Type Entity</th>
        </tr>
        <?php
        $sql = "SELECT * FROM implementers WHERE grant_number = '$grant_number'";
        $sql_result = sqlsrv_query($conn, $sql);
        $all_rows = sqlsrv_fetchall($sql_result);
        foreach ($all_rows as $row_implementer) {
			?>
			<tr>
			<td><?php echo $implementing_entity = $row_implementer['implementing_entity']; ?> </td>
			<td><?php echo $pr_sr = $row_implementer['pr_sr']; ?> </td>
			<td><?php echo $implementing_entity_type = $row_implementer['implementing_entity_type']; ?> </td>
			</tr>
        <?php } ?>
        </table>
</div>  
<?php } ?>
</div> 

<div id="tabs-3">

<?php if ($total_quart != 0 ){ ?>

<div id="entities-contain">
        <table>
        <tr>
        <th>Risk Type</th>
        <th>Risk</th>
        <th>Risk Value</th>
        <th>Risk Assessment Date</th>
        <th>Risk Milestone</th>
        <th>Risk Milestone Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM quart WHERE grant_number = '$grant_number'";
        $sql_result = sqlsrv_query($conn, $sql);
        $all_rows = sqlsrv_fetchall($sql_result);
        foreach ($all_rows as $row_quart) {
			?>
			<tr>
			<td><?php echo $risk_type = $row_quart['risk_type']; ?> </td>
			<td><?php echo $risk = $row_quart['risk']; ?> </td>
			<td><?php echo $risk_value = $row_quart['risk_value']; ?> </td>
			<td><?php
			
			$risk_assessment_date = $row_quart['risk_assessment_date'];
			if ($risk_assessment_date != ""){
			  echo $risk_assessment_date = date('F j, Y', strtotime($row_quart['risk_assessment_date']));
			  }
			?> </td>
			<td><?php echo $risk_milestone_name = $row_quart['risk_milestone_name']; ?> </td>
            <td><?php 
			$risk_milestone_date = $row_quart['risk_milestone_date'];
			if ($risk_milestone_date != ""){
			  echo $risk_milestone_date = date('F j, Y', strtotime($row_quart['risk_milestone_date']));
			  }
			?> </td>
			</tr>
        <?php } ?>
        </table>
</div>  
<?php } ?>
</div> 
  
  
  </td>
  </tr>
</table>




</div>
</div>


<div id="maintabs-2">
<?php


//  ------------------------------ ALLEGATIONS LINKED TO GRANT



	$result_allegations_linked = sqlsrv_query($conncss,"SELECT * FROM allegation_grant_links WHERE grant_number = '$grant_number'");
	$all_rows = sqlsrv_fetchall($result_allegations_linked);


if ($total_allegations != 0){
?>
<div id="entities-contain">
  <table>
                <tr>
                  <th align="center" valign="middle">Id</th>
                      <th align="center" valign="middle">Country</th>
                      <th align="center" valign="middle">Title</th>
                      <th align="center" valign="middle">Status</th>
                      <th align="center" valign="middle">Resolution</th>
                </tr>
<?php						
	
                    foreach($all_rows as $row_allegation)
                      {
                          
						  $allegation_linked = $row_allegation['allegation_id'];

                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$allegation_linked'");
                          $row_allegation_linked_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $country = $row_allegation_linked_details['country'];
						  $summary = $row_allegation_linked_details['summary'];
						  $status = $row_allegation_linked_details['status'];
						  $resolution = $row_allegation_linked_details['resolution'];
						  
						 ?>
                        <td align="center"><strong>
						<?php echo $allegation_linked; ?>
                        </strong></td>
                        
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $summary; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="center"><?php echo $resolution; ?></td>
						</tr>
                        <?php 
						}
						?>
				</table>
      
</div> 
<?php }



//  ------------------------------IRS LINKES TO GRANT


	


if ($total_ir != 0){
?>
<div id="entities-contain">
  <table>
                <tr>
                  <th>Id</th>
                  <th>Country</th>
                  <th align="center">Reporter</th>
                  <th align="center"><strong>Title</strong></th>
                  <th><strong>Status</strong></th>
                  <th><strong>Date recieved</strong></th>
                </tr>
<?php		
					$result_ir_linked = sqlsrv_query($conncss,"SELECT * FROM intelligence_report_grant_links WHERE grant_number = '$grant_number'");
					$all_rows_ir = sqlsrv_fetchall($result_ir_linked);				
	
                    foreach($all_rows_ir as $row_link_ir)
                      {
                          
						  $id_report = $row_link_ir['ir_id'];

                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE id = '$id_report'");
                          $row_ir = sqlsrv_fetch_array($result_profile_details);
						  
						 ?>
                        <tr>
	                         <td>
							<?php 
							$dash = "IR";
							echo $dash.$id_report; ?>
							</td>
                             <td>
							<?php echo $country = $row_ir['country']; ?>
							</td>
	                         <td align="left"><?php 
							 
							 echo $reporter = $row_ir['reporter']; 
							 
							 ?></td>
							<td align="center">
                            
                            <?php echo $title = $row_ir['title']; ?>

							</td>
                            <td align="center">
                            <?php echo $status = $row_ir['status']; ?>
							</td>
                           <td align="center">
                            <?php $date_received = $row_ir['date_received']; 
							echo $date_received = date('F j, Y', strtotime($date_received));
							?>
							</td>
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div> 
<?php } ?>



</div>
</div>


</body>
</html>