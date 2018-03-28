<?php

require_once("includes\\opendb.php");

if(isset($_GET['ref_number']))
	{
		$ref_number = $_GET['ref_number'];
		$ref_number = substr($ref_number, 1);
		$ref_number = substr_replace($ref_number,"/",3,0);
	}
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
$result = sqlsrv_query($conn,"SELECT * FROM closure_memos WHERE ref_number = '$ref_number'");

$row = sqlsrv_fetch_array($result);

if ( $memo_submitted_manager = $row['memo_submitted_manager'] != "N/A" ) {


?>
<table width="905" align="center" style="background-color:#FFFFFF">
	<tr>
    <td height="47" colspan="3" align="center" style="background-color:#FFFFFF">
    <a href="print_ccm.php?ref_number=<?php echo $ref_number ?>">
    <img src="images/printer-icon.png" width="35" height="35" alt="Print" />
    </a>   
	</td>
  </tr>
</table>

<table width="100%" border="0" align="center" class="gridtable_report" style="background-color:#FFFFFF">
  <tr>
    <th height="47" colspan="3" align="center"><strong>CLOSURE MEMORANDUM</strong></th>
    </tr>
  <tr>
    <td width="269" valign="top" style="background-color:#DBE5F1"><strong>Case Number</strong></td>
    <td width="548" colspan="2" style="background-color:#FFFFFF; border-color:#FFFFFF">
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
    <td valign="top" style="background-color:#DBE5F1"><strong>Team Appointments</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">
    
    <table border="0">
      <tr>
        <td valign="middle" align="left" style="background-color:#FFFFFF"><strong>Manager :</strong></td>
        <td style="background-color:#FFFFFF">
		<?php
			echo $manager;
        ?>
       </td>
      </tr>
      <tr>
        <td valign="middle" align="left" style="background-color:#FFFFFF"><strong>Lead Investigator :</strong></td>
        <td style="background-color:#FFFFFF">
		<?php
        	echo $assigned_to = $row_case['assigned_to'];
		?>
        </td>
      </tr>
    </table>
    
    </td>
  </tr>
  <tr>
    <td valign="top" style="background-color:#DBE5F1"><strong>Date Assigned</strong></td>
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
    <td valign="top" style="background-color:#DBE5F1"><strong>Country</strong></td>
    <td colspan="2" style="background-color:#FFFFFF">

    <?php
    	echo $country = $row_case['country'];
	?>
	</td>
    </tr>
    <tr>
    <td valign="top" style="background-color:#DBE5F1"><strong>Justification for Closure</strong></td>
    <td colspan="2" style="background-color:#FFFFFF"><?php
		echo $justification = $row['justification'];
    ?></td>
  </tr>
  
    <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF"></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />

    <font size="+1"><strong>1.Allegations background</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($background = $row['background']); ?>
    </td>
    
  </tr>
  <?php
  $subjects = $row['subjects'];
  if ($subjects != "" ){ ?>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
    <font size="+1"><strong>Subject of Allegations</strong></font></td>
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($subjects); ?>
    </td>
  </tr>
  <?php }
  $methodology = $row['methodology'];
  if ($methodology != "" ){ ?>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
<font size="+1"><strong>Methodology</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($methodology); ?>
    </td>
  </tr>
  <?php }  ?>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
<font size="+1"><strong>2.Investigation Findings</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($findings = $row['findings']); ?>
    </td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
<font size="+1"><strong>3.Conclusion</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($conclusion = $row['conclusion']); ?>
    </td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <br />
	<br />
	<font size="+1"><strong>4.Agreed Management Actions (if app)</strong></font></td>
    
  </tr>
  <tr>
    <td colspan="3" valign="top" style="background-color:#FFFFFF">
    <?php  echo nl2br($actions = $row['actions']); ?>
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