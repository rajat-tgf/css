<?php


require_once("includes\\opendb.php");


$ref_number = $_GET['ref_number'];
$ref_number = substr($ref_number, 1);
$ref_number = substr_replace($ref_number,"/",3,0);

$result_case = sqlsrv_query($conn,"select * from cases WHERE ref_number = '$ref_number'"); 
$row = sqlsrv_fetch_array( $result_case );
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>CMS</title>

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="script.js"></script>

<script>
	$(function() {
	$( "#tabs" ).tabs();
	});
</script>

   																					<?php
                                                                                    // SCREENING REPORT DETAILS
                                                                                    ?>

<SCRIPT LANGUAGE="JavaScript">
	function details_screening_report(allegation_id) 
	{
			var windowW=980
			var windowH=624
			var windowX = 100
			var windowY = 130
			var url = "details_sr.php?allegation_id=" + allegation_id;
	
			s = "scrollbars=yes"+",width="+windowW+",height="+windowH;
	
			blwindow = window.open(url,"Popup",","+s);
			windowX = (screen.width) ? (screen.width-windowW)/2 : 0;
			windowY = (screen.height) ? (screen.height-windowH)/2 : 0;
			blwindow.focus();
			blwindow.resizeTo(windowW,windowH);
			blwindow.moveTo(windowX,windowY);
	}
</script>    


<style>
#popup{
	overflow: visible;
	position: relative;
	border: 0;
	padding: 10px;
	height:auto;
	width: 95%;
	color: #000;
	background:#FFF;
	border-radius: 10px 10px 10px 10px;
	border-color:#E4E4E4 ;
	border-style: solid;
	border-width: 1px 1px 1px 1px;
}

</style>

<script>
function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}
</script>

</head>
<div id="tabs">
<ul>
<li><a href="#tabs-1">Main</a></li>
<li><a href="#tabs-2">Screening Report</a></li>
<li><a href="#tabs-3">Investigation Plan / Proactive Assessment Plan</a></li>
<li><a href="#tabs-4">Case Closure MEMO</a></li>
<li><a href="#tabs-5">Case Notes</a></li>
<li><a href="#tabs-6">Entities of Interest</a></li>
<li><a href="#tabs-7">Additional Information</a></li>
</ul>
<div id="tabs-1">
<p>
<table class="gridtablefilter">
  <tr>
    <td align="left"><strong>Case Number :</strong></td>
    <td>
	<?php	
	  $proactive = $row['proactive'];
		if ( $proactive == 'Yes' ){ ?>
		<img src="images/Pro-icon1.png" width="20" height="20" align="absmiddle"/>&nbsp;
		<?php
		}  echo $ref_number;?></td>
    <td align="left" bgcolor="#FFFFFF"><strong>Lead Investigator :</strong></td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $assigned_to = $row['assigned_to']; ?></td>
  </tr>
  <tr>
    <td align="left"><strong>Country :</strong></td>
    <td><?php echo $country = $row['country']; ?></td>
    <td align="left"><strong>Manager :</strong></td>
    <td><?php echo $manager = $row['manager'];?></td>
  </tr>
  <tr>
    <td align="left"><strong>Region : </strong></td>
    <td><?php
		$result_region = sqlsrv_query($conn,"SELECT * FROM region_sea WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
		$region_sea = sqlsrv_num_rows($result_region);
		if ( $region_sea != 0 ){
			echo  "South East Asia";
		}
		
		$result_region = sqlsrv_query($conn,"SELECT * FROM region_sa WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
		$region_sa = sqlsrv_num_rows($result_region);
		if ( $region_sa != 0 ){
			echo  "Southern Africa";	
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
		
		$result_region = sqlsrv_query($conn,"SELECT * FROM region_lac WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
		$region_lac = sqlsrv_num_rows($result_region);
		if ( $region_lac != 0 ){
			echo  "LAC";	
		}
		$result_region = sqlsrv_query($conn,"SELECT * FROM impact_africa1 WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_impact_africa1 = sqlsrv_num_rows($result_region);
        if ( $region_impact_africa1 != 0 ){
            echo  "High Impact Africa 1";	
        }
		$result_region = sqlsrv_query($conn,"SELECT * FROM impact_africa2 WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_impact_africa1 = sqlsrv_num_rows($result_region);
        if ( $region_impact_africa1 != 0 ){
            echo  "High Impact Africa 2";	
        }
		$result_region = sqlsrv_query($conn,"SELECT * FROM impact_asia WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_impact_asia = sqlsrv_num_rows($result_region);
        if ( $region_impact_asia != 0 ){
            echo  "High Impact Asia";	
        }
?>
     </td>
    <td align="left"><strong>Date received :</strong></td>
    <td><?php
					   $date_received = $row['date_received'];
		   
					   if ($date_received == ""){

					   }else
					   {
						   echo $newdate_received = date("F j, Y", strtotime($date_received));
					   }
					  ?></td>
  </tr>
  <tr>
    <td align="left"><strong>Current Status :</strong></td>
    <td><?php
						
						echo $current_status = $row['current_status'];
						
?></td>
    <td align="left" valign="middle"><strong>Date assigned :</strong></td>
    <td valign="middle"><?php
                      
					  	$date_assigned = $row['date_assigned'];
		   
					   if ($date_assigned == "" OR $date_assigned == "0000-00-00"){
						 
					   }else{
							echo $newdate_assigned = date("F j, Y", strtotime($date_assigned));
					   }
					   
					  ?></td>
  </tr>
  <tr valign="middle">
    <td align="left"><strong>Prioritization :</strong></td>
    <td><?php
						$priority = $row['priority'];
						if ( $priority == "High" ){
							echo "<font color='#FF0000'>";
							echo $priority;
							echo "</font>";
							}
							if ( $priority == "Medium" ){
							echo "<font color='#FF9933'>";
							echo $priority;
							echo "</font>";	
							}
							if ( $priority == "Low" ){
							echo "<font color='#339933'>";
							echo $priority;
							echo "</font>";	
						}
				    	?></td>
    <td align="left"><strong>Pro-Active :</strong></td>
    <td><?php
                     echo $proactive = $row['proactive'];
					?></td>
  </tr>
  <tr valign="middle">
    <td align="left"><strong>Category :</strong></td>
    <td><?php
	$result_report = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
	$row_report = sqlsrv_fetch_array($result_report);
	$category = $row_report['category_type']; 
	
	$allegation_merged = $row_report['id'];
	if ( $category != "" ){ ?>

      <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;
      <?php
		
			if ( $category == "Human Rights Violations" ){
				echo "<font color='#993300'>";
			}
		 echo $category; ?>
      <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Main allegation <?php echo $allegation_merged; ?></a>)</font></font>
    <?php } ?></td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td align="left"><strong>Sub-Category :</strong></td>
    <td><?php 
	$subcategory = $row_report['sub_category_type'];
	if ( $subcategory != "" ){ ?>
      <img src="images/subTags-icon.png" width="12" height="12"/>&nbsp;
      <?php	echo $subcategory = $row_report['sub_category_type']; ?>
    <?php } ?></td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td align="left" valign="top"><strong>Other Categories :</strong></td>
    <td colspan="3"><table width="523" border="0" style="border:none; border-color:">
      <?php
	$checkbox1 = $row_report['checkbox1'];
	$checkbox2 = $row_report['checkbox2'];
	$checkbox3 = $row_report['checkbox3'];
	$checkbox4 = $row_report['checkbox4'];
	$checkbox5 = $row_report['checkbox5'];
	$checkbox6 = $row_report['checkbox6'];
	$checkbox7 = $row_report['checkbox7'];
	$checkbox8 = $row_report['checkbox8'];
	$checkbox9 = $row_report['checkbox9'];
	$checkbox10 = $row_report['checkbox10'];
	$checkbox11 = $row_report['checkbox11'];
	$checkbox12 = $row_report['checkbox12'];
	$checkbox13 = $row_report['checkbox13'];
	$checkbox14 = $row_report['checkbox14'];
	$checkbox15 = $row_report['checkbox15'];
	$checkbox16 = $row_report['checkbox16'];
	$checkbox17 = $row_report['checkbox17'];
	$checkbox18 = $row_report['checkbox18'];
	$checkbox19 = $row_report['checkbox19'];
	$checkbox20 = $row_report['checkbox20'];
	$checkbox21 = $row_report['checkbox21'];

	?>
      <tr>
        <td width="540" style="border:none"><?php 
		if ( $checkbox1 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Corruption <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Main allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php } 
		if ( $checkbox2 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Fraud <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Main allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php }  
		if ( $checkbox3 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Coercion <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Main allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php }  
		if ( $checkbox4 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Collusion <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Main allegation <?php echo $allegation_merged; ?></a>)</font><br />
          <?php }  
		if ( $checkbox5 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/&nbsp; />&nbsp;Non-Compliance with laws / Grant agreements <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Main allegation <?php echo $allegation_merged; ?></a>)</font><br />
          <?php }  
		if ( $checkbox6 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;<font color="#993300">Human Rights Violations</font> <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Main allegation <?php echo $allegation_merged; ?></a>)</font><br />
          <?php }  
		if ( $checkbox7 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Product Issues (JIATF) <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Main allegation <?php echo $allegation_merged; ?></a>)</font><br />
          <?php } ?>
          <?php

	$result_other_categories = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Merge with an existing Case'");
	while($row_other_categories = sqlsrv_fetch_array($result_other_categories)){
		$main_category_other = $row_other_categories['category_type'];
		$checkbox1 = $row_other_categories['checkbox1'];
		$checkbox2 = $row_other_categories['checkbox2'];
		$checkbox3 = $row_other_categories['checkbox3'];
		$checkbox4 = $row_other_categories['checkbox4'];
		$checkbox5 = $row_other_categories['checkbox5'];
		$checkbox6 = $row_other_categories['checkbox6'];
		$checkbox7 = $row_other_categories['checkbox7'];
		
		if ( $main_category_other != "N/A" ){
	?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;<?php echo $main_category_other;
$allegation_merged = $row_other_categories['id']; ?> <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Merged allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php
}

		if ( $checkbox1 = $row_other_categories['checkbox1'] != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Corruption
          <?php $allegation_merged = $row_other_categories['id']; ?>
          <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Merged allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php } 
		if ( $checkbox2 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Fraud
          <?php $allegation_merged = $row_other_categories['id']; ?>
          <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Merged allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php }  
		if ( $checkbox3 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Coercion
          <?php $allegation_merged = $row_other_categories['id']; ?>
          <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Merged allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php }  
		if ( $checkbox4 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Collusion
          <?php $allegation_merged = $row_other_categories['id']; ?>
          <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Merged allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php }  
		if ( $checkbox5 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/&nbsp; />&nbsp;Non-Compliance with laws / Grant agreements
          <?php $allegation_merged = $row_other_categories['id']; ?>
          <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Merged allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php }  
		if ( $checkbox6 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;<font color="#993300">Human Rights Violations</font>
          <?php $allegation_merged = $row_other_categories['id']; ?>
          <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Merged allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php }  
		if ( $checkbox7 != "" ){
		?>
          <img src="images/Tags-icon.png" width="12" height="12"/>&nbsp;Product Issues (JIATF)
          <?php $allegation_merged = $row_other_categories['id']; ?>
          <font size="-2"><a href="javascript:details_screening_report('<?php echo $allegation_merged; ?>')">(Merged allegation <?php echo $allegation_merged; ?></a>)</font> <br />
          <?php } ?>
          <?php 
		}
	  ?></td>
        </tr>
    </table></td>
  </tr>
    <tr>
    <td colspan="4" align="left">

    </td>
  </tr>
  <tr>

    <td colspan="4"><font size="+0.3"><strong><?php
					  echo $title = $row['title'];
					  ?></strong></font></td>
  </tr>
    <tr>
    <td colspan="4" align="left">

    </td>
  </tr>
  <tr>
    <td colspan="4" align="left">
	<?php
		echo nl2br($case_summary = $row['case_summary']);?>
    </td>
  </tr>
  
</table>

</p>
</div>

<div id="tabs-2">
<p>
<iframe src="info_main_sr.php?ref_number=<?php echo $ref_number ?>" width="100%" height="110" style="padding:1px;border:0px;">
</iframe>
<iframe name="iframedetails_allegations" src="" width="100%" height="550" frameborder="0">
</iframe>

</p>
</div>


<div id="tabs-3">
<p>
<?php
include ("investigation_plan.php");
?>
</p>
</div>

<div id="tabs-4">
<p>
<?php
include ("case_closure_memo.php");
?>

</p>

</div>

<div id="tabs-5">
<p>
	<?php
        $comment_query = sqlsrv_query($conn,"SELECT * FROM notes WHERE ref_number = '$ref_number' ORDER BY date_note DESC, id DESC");

        while($note = sqlsrv_fetch_array($comment_query)) {			?>
            <table class="gridtable" width="100%">
            <tr>
            <td width="29" valign="top">
            <img src="images/icon_person.png" width="25" height="25" align="top"/>
            </td>
            <td>
				<?php $date = $note['date_note'];
                $category_note = $note['category']; ?> 
               <strong> <?php echo $note['member'] ?> made a note on <?php echo $date_newDate = date('F j, Y', strtotime($date)); ?></strong>
                <br />
                Category :</strong> <?php echo $category_note;?>
                <?php echo $note = nl2br($note['note'])?>

              </td>
              </tr>
              </table>
      <br />
		<?php }?>
</p>

</div>

<div id="tabs-6">
<?php
include ("entities_interest.php");
?>
</div>


<div id="tabs-7">


<table class="gridtable">
<?php
		$result_case_add = sqlsrv_query($conn,"SELECT * FROM cases WHERE ref_number = '$ref_number'"); 
	   $row = sqlsrv_fetch_array( $result_case_add );
?>

<tr>
    <td colspan="2" align="left" valign="top" class="gridtable"><strong><img src="images/person-info.png" alt="" width="25" height="25">&nbsp;&nbsp; Complainant Information</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="gridtable">
	<?php echo $name_complainant = $row['name_complainant']; ?><br>
    <?php echo $contact_details = $row['contact_details']; ?>
</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="gridtable">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="gridtable"><strong><img src="images/subjects.png" alt="" width="25" height="25">&nbsp;&nbsp;Subject of Interest</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="gridtable"><?php echo $against = $row['against']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="gridtable">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="gridtable"><strong>
    <img src="images/information.png" width="25" height="25">&nbsp;&nbsp; Additional Information</strong></td>
    </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="gridtable">
      <?php echo nl2br($additional_information = $row['additional_information']); ?>    
      </td>
    </tr>

  </table>
</div>

</div>
</body>
</html>
