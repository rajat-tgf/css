<?php

$region_selected = $_POST['region'];

$month_selected = $_POST['month'];
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=$region_selected.doc");

require_once("includes\\opendb.php");

function GetMonthRange($month, $year)
{
	switch ($month)
	{
		case "January":
			return "'$year-01-01' AND '$year-01-31'";
		case "February":
			return "'$year-02-01' AND '$year-02-31'";
		case "March":
			return "'$year-03-01' AND '$year-03-31'";
		case "April":
			return "'$year-04-01' AND '$year-04-31'";
		case "May":
			return "'$year-05-01' AND '$year-05-31'";
		case "June":
			return "'$year-06-01' AND '$year-06-31'";
		case "July":
			return "'$year-07-01' AND '$year-07-31'";
		case "August":
			return "'$year-08-01' AND '$year-08-31'";
		case "September":
			return "'$year-09-01' AND '$year-09-31'";
		case "October":
			return "'$year-10-01' AND '$year-10-31'";
		case "November":
			return "'$year-11-01' AND '$year-11-31'";
		case "December":
			return "'$year-12-01' AND '$year-12-31'";
	}
}
$allmonths = array ("January", "February", "March", "April", "May","June","July","August","September","October","November","December");


list($monthstring, $currentyear) = explode(" ", $month_selected);
	
$month = GetMonthRange($monthstring, $currentyear);



?>
<html>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
<head>
<style type="text/css">
	body { font-size: 65.5%; }
	label, input { display:block; }
	input.text { margin-bottom:3px; width:95%; padding: .1em; }
	fieldset { padding:0; border:0; margin-top:25px; }
	h1 { font-size: 1.2em; margin: .6em 0; }
	div#entities-contain { width: 860px; margin: 5px 0; alignment-adjust:central; }
	div#entities-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; alignment-adjust:central;  }
	div#entities-contain table td { border: 1px solid #DBE5F1; padding: .1em 2px; text-align: left; font-size:12px; }
	div#entities-contain table th { border: 1px solid #DBE5F1; padding: .1em 2px; text-align: left; background:#F2F2F2; font-style:normal; color:#666666; font-size:12px; }
	hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }

table.gridtable_report {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:11px;
	color:#000000;
	border:thin;
	border-color:#666;
	border:1px;
}
table.gridtable_report th {
	font-size:18px;
	padding: 4px;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;	
	background-color: #8DB3E2;
}
table.gridtable_report td {
	font-size:11px;
	color:#000000;
	padding: 1px;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;
}

table.gridtable {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:11px;
	color:#000000;
	border:none;
}
table.gridtable_ th {
	font-size:18px;
	padding: 4px;
	border:none;
}
table.gridtable td {
	font-size:11px;
	color:#000000;
	padding: 3px;
	border:none;
}

table.gridtable_report_table {
	font-size:12px;
	padding: 4px;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #C0D6EF;
}
table.gridtable_report_table th {
	font-size:12px;
	padding: 4px;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #C0D6EF;
}
table.gridtable_report_table td {
font-size:12px;
	padding: 4px;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #FFFFFF;
}

table.gridtable_report_head {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:14px;
	color:#000000;
	border:thin;
	border-color:#666;
	border:1px;
}
table.gridtable_report_head th {
	font-size:18px;
	padding: 4px;
	border: 0px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;	
	background-color: #8DB3E2;
}

table.gridtable23 {
font-family: Georgia, "Times New Roman", Times, serif;
font-size:12px;
color:#000000;

}

table.gridtable23 th {
	font-size:12px;
	padding: 4px;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;
	background-color: #C0D6EF;
}

table.gridtable23 td {
	font-size:12px;
	border-width: 0px;
	color:#000000;
	background-color: #FFFFFF;
	padding: 3px;
	border-color: #FFFFFF;
	border-spacing:2px;
	border:0px;
}

	table.table-style-three {
		font-family: verdana, arial, sans-serif;
		font-size: 11px;
		color: #333333;
		border-width: 1px;
		border-color:#BBD5EE;
		border-collapse: collapse;
	}
	table.table-style-three th {
		border-width: 1px;
		padding: 4px;
		border-style: solid;
		border-color: #BBD5EE;
		background-color:#A0BFDE;
		color:#333333
	}
	table.table-style-three tr:hover td {
		cursor: pointer;
	}
	table.table-style-three tr:nth-child(even) td{
		background-color: #F7CFCF;
	}
	table.table-style-three td {
		border-width: 1px;
		padding: 4px;
		border-style: solid;
		border-color:#BBD5EE;
		background-color: #ffffff;
	}

	table.table-style-three1 {
		font-family: verdana, arial, sans-serif;
		font-size: 7px;
		color:#FFF;
		border-width: 1px;
		border-color:#BBD5EE;
		border-collapse: collapse;
	}
	table.table-style-three1 th {
		border-width: 1px;
		font-size: 7px;
		padding: 1px;
		border-style: solid;
		border-color: #BBD5EE;
		background-color:#A0BFDE;
		color: #ffffff;
	}
	table.table-style-three1 tr:hover td {
		cursor: pointer;
	}
	table.table-style-three1 tr:nth-child(even) td{
		background-color: #F7CFCF;
	}
	table.table-style-three1 td {
		border-width: 1px;
		font-size: 7px;
		color:#333;
		padding: 1px;
		border-style: solid;
		border-color:#BBD5EE;
	}

</style>
</head>
<body>

<table class="gridtable_report_head" width="762" align="center">
<tr>
<td colspan="3" align="center">
<strong><font size="+2">CSS Regional Report - <?php echo $month_selected ?> &nbsp;</font></strong>
</td>
</tr>
</table>
<br />
<table align="center" class="gridtable">
      <tr>
        <td align="left" valign="middle"><strong><font color="#1356A8" size="+1">
		<?php
        if ( $region_selected == "impact_africa1" ){
            echo "High Impact Africa 1";
        }
		if ( $region_selected == "impact_africa2" ){
            echo "High Impact Africa 2";
        }
		if ( $region_selected == "impact_asia" ){
            echo "High Impact Asia";
        }		
		if ( $region_selected == "region_ca" ){
            echo "Central Africa";
        }
        if ( $region_selected == "region_eeca" ){
            echo "East Europe Central Asia";
        }
        if ( $region_selected == "region_lac" ){
            echo "Latin America and Caribbean";
        }
        if ( $region_selected == "region_mena" ){
            echo "Middle East & North Africa";
        }
        if ( $region_selected == "region_sa" ){
            echo "Southern Africa";
        }
        if ( $region_selected == "region_sea" ){
            echo "South East Asia";
        }
        if ( $region_selected == "region_wa" ){
            echo "Western Africa";
        }
        ?></font></strong>
        </td></tr>
        </table>
<br /><br />



  <?php
				
		$sql = "SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country != 'Internal' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ." ORDER BY allegation_details.country ";

$sql_result = sqlsrv_query($conncss, $sql, array(), array( "Scrollable" => 'buffered'));	
$total = sqlsrv_num_rows($sql_result);
?>
</p>
<table align="right" class="gridtable">
    <tr>
    <td rowspan="10" align="right" valign="top" style="border-right:thin solid #CCC"><strong><font color="#999999"; size="+2">Summary&nbsp;</font></strong></td>
    
    <td colspan="2"><strong>Total Number of new Complaints : &nbsp;<?php echo $total ?></strong></td>
  </tr>

<?php
		
if ($total > 0) {

$result_open_cases = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status = 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.resolution = 'Open case in CMS' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
$num_open_cases = sqlsrv_num_rows($result_open_cases);

$result_merge_case = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status = 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.resolution = 'Merge with an existing Case' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
$num_merge_case = sqlsrv_num_rows($result_merge_case);

$result_merge_allegation = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status = 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.resolution = 'Merge with an existing Allegation' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
$num_merge_allegation = sqlsrv_num_rows($result_merge_allegation);

$result_refer_action = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status = 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.resolution = 'Referral to Secretariat for management action' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
$num_refer_action = sqlsrv_num_rows($result_refer_action);

$result_refer_info = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status = 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.resolution = 'Referral to Secretariat for information only' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
$num_refer_info = sqlsrv_num_rows($result_refer_info);

$result_refer_agency = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status = 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.resolution = 'Referral to external agency' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
$num_refer_agency = sqlsrv_num_rows($result_refer_agency);

$result_information = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status = 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.resolution = 'Information report' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
$num_information = sqlsrv_num_rows($result_information);

$result_na = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status = 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.resolution = 'No further action' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
$num_na = sqlsrv_num_rows($result_na);

$result_sr = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.status != 'Closed' AND allegation_details.country != 'Internal' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));
		
$num_sr = sqlsrv_num_rows($result_sr);
?>
			    		
<?php
if ( $num_open_cases != 0 ){
?>
<tr>
<td></td>
<td align="left">Open cases :&nbsp;<?php echo $num_open_cases ?></td>
</tr>
<?php }
if ( $num_merge_case != 0 ){
?>
<tr>
<td>
<td align="left">Merge with existing case :&nbsp;<?php echo $num_merge_case ?></td>
</tr>
<?php }
if ( $num_merge_allegation != 0 ){
?>
<tr>
<td>
<td align="left">Merge with existing allegation :&nbsp;<?php echo $num_merge_allegation ?></td>
</tr>
<?php }
if ( $num_refer_action != 0 ){
?>
<tr>
<td>
<td align="left">Referral to Secretariat for management action :&nbsp;<?php echo $num_refer_action ?></td>
</tr>
<?php }
if ( $num_refer_info != 0 ){
?>
<tr>
<td>
<td align="left">Referral to Secretariat for information only :&nbsp;<?php echo $num_refer_info ?></td>
</tr>
<?php }
if ( $num_refer_agency != 0 ){
?>
<tr>
<td>
<td align="left">Referral to external agency :&nbsp;&nbsp;<?php echo $num_refer_agency ?></td>
</tr>
<?php }
if ( $num_information != 0 ){
?>
<tr>
<td>
<td align="left">Information Report :&nbsp;<?php echo $num_information ?></td>
</tr>
<?php }
if ( $num_na != 0 ){
?>
<tr>
<td>
<td align="left">No Further action :&nbsp;<?php echo $num_na ?></td>
</tr>
<?php }
if ( $num_sr != 0 ){
?>
<tr>
<td>
<td align="left"><font color="#800000">Pending screening :&nbsp;<?php echo $num_sr ?></font></td>
</tr>
<?php }?>
</table>
                    
                    

<?php
}
?>
</table>
<p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p> 


 <table width="543" align="center" class="gridtable1">
                      <tr>
                        <td colspan="2" align="center" valign="top">
                        <strong><font color="#999999"; size="+1">Accumulative Complaints - Year <?=$currentyear?></font></strong></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center" valign="top">
                        <strong><font color="#999999"; size="+1">Total : 
						<?php
                        $sqltotal = "SELECT * FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country != 'Internal' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN '$currentyear-01-01' AND '$currentyear-12-31' ";
                        
                        $sql_result_total = sqlsrv_query($conncss, $sqltotal, array(), array( "Scrollable" => 'buffered'));	
                        echo $total_accu = sqlsrv_num_rows($sql_result_total);
                        ?>
                        </font>
                        </td>
                      </tr>
                      <tr>
                        <td width="264" align="center" valign="top">
                        <table width="259" align="center" class="table-style-three">
                          <tr>
                            <th><strong>Complaints per country</font></strong></th>
                          </tr>
                          <?php

		$sql123 = "SELECT distinct allegation_details.country FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country != 'Internal' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN '$currentyear-01-01' AND '$currentyear-12-31'";

$sql_result123 = sqlsrv_query($conncss, $sql123);

					while ($row123 = sqlsrv_fetch_array($sql_result123)) { 
						?>
                          <tr>
                            <td width="251"><strong><?php echo $country = $row123['country']; 
						echo ": ";
						?></strong>
                              <?php
						$quey_number="SELECT country FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '$currentyear-01-01' AND '$currentyear-12-31'"; 
						$result_number = sqlsrv_query($conncss,$quey_number, array(), array( "Scrollable" => 'buffered'));
						
						echo $num = sqlsrv_num_rows($result_number);
						?></td>
                          </tr>
                          <?php	
					}

?>
                        </table></td>
                        <td width="267" align="left" valign="top">
                        
                    <table width="259" align="center" class="table-style-three">
                      <tr>
                        <th align="center"><strong>Complaints per month</font></strong></th>
                      </tr>
                      <tr>
					  <?php 
							foreach ($allmonths as $month)
							{
								echo "<td width='251'><strong>$month : </strong>";
								$number = 0;
								$monthrange = GetMonthRange($month,$currentyear);
								$sql123 = "SELECT distinct allegation_details.country FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country != 'Internal' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN $monthrange"; 
								$result_number = sqlsrv_query($conncss,$sql123);
								while ($row123 = sqlsrv_fetch_array($result_number)) {
									$country = $row123['country'];	
									$sql1234 = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN $monthrange";
									$sql_result1234 = sqlsrv_query($conncss, $sql1234, array(), array( "Scrollable" => 'buffered'));	
									$num = sqlsrv_num_rows($sql_result1234);
									$number = $number + $num;
								}
								echo $number;							
								echo "</td></tr>";
							}
					  	?>
                    </table>
         </td>
    </tr>
  <tr>
    <td colspan="2" align="center" valign="top">&nbsp;</td>
  </tr>
</table>


<br style="page-break-before: always" />

  
<?php 
if ($total != 0 ){
?>  
        <table width="762" align="center" class="gridtable">
        <tr>
        <td colspan="3" align="left" valign="middle">
        <strong><font color="#999999"; size="+2">New Complaints received in <?php echo $month_selected ?> </font></strong>
        </td>
        </tr>
        </table>
                    
  			<?php
					while ($row = sqlsrv_fetch_array($sql_result)) {

						$allegation_id = $row['id'];
						$country = $row['country'];
						$date_received = $row['date_received'];
						$status = $row['status'];
						$resolution = $row['resolution'];
						$category_type = $row['category_type'];
					  ?>

                 <table width="762" align="center" class="gridtable">
						  <tr>
						    <td colspan="3" align="left" valign="middle"><br />
                    <br />
                    </td>
				    </tr>
						  <tr>
							<td align="left" valign="middle">
                            <strong>
                            <font color="#000000"; size="+1">
							<?php 
							echo $allegation_id ."  ". $country = $row['country'];
							echo "</font>";?>
							</strong></td>
							<td align="left" valign="middle">&nbsp;</td>
							<td align="right" valign="middle">&nbsp;</td>
						  </tr>
                        
                        <tr>
                            <td colspan="3" align="left"><strong>Title :</strong>
                              <?php
							  echo "<font color='#1365A8'>";
							 echo $title = $row['summary'];
							 echo "</font>";
							?>
                            </td>
                    </tr>
                        <tr>
                          <td align="left"><strong>Date received :</strong>
						  <?php
							 echo $date_received = date('F j, Y', strtotime($date_received));
							?></td>
                            <td align="left"><strong>Main Category :</strong>
							</td>
                            <td width="252" align="left" valign="top">
							<?php
							 echo $category_type;
							?></td>
                    </tr>
                        <tr>
                          <td align="left" valign="top"><strong>Status :</strong>
                            <?php
							 
							 if ( $status == "Screening Review" ){
							 ?>
                             <font color="#800000"><?php echo $status; ?></font>
                            <?php
							 }else{
								 echo $status;
							 }
							?>
                          </td>
                          <td align="left" valign="top"><strong>Other Categories :</strong></td>
                          <td align="left" valign="top"><?php
							if ($checkbox1 = $row['checkbox1'] == "checked"){
								echo "Corruption";
								echo "<br />";
							}if ($checkbox2 = $row['checkbox2'] == "checked"){
								echo "Fraud";
								echo "<br />";
							}if ($checkbox3 = $row['checkbox3'] == "checked"){
								echo "Coercion";
								echo "<br />";
							}if ($checkbox4 = $row['checkbox4'] == "checked"){
								echo "Collusion";
								echo "<br />";
							}if ($checkbox5 = $row['checkbox5'] == "checked"){
								echo "Non-Compliance with laws / Grant agreements";
								echo "<br />";
							}if ($checkbox6 = $row['checkbox6'] == "checked"){
								echo "Human Rights Violations";
								echo "<br />";
							}if ($checkbox7 = $row['checkbox7'] == "checked"){
								echo "Product Issues (JIATF)";
							}
							?></td>
                        </tr>
                        <tr>
							<td width="367" align="left" valign="top"><strong>Resolution :</strong>
                            <?php
							 echo $resolution;
							 if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case" || $resolution == "Merge with an existing Allegation"){
									echo "  (";
									echo $case_number = $row['case_number'];
									echo ")";
							 }
							
							
							
							?></td>
							<td width="127" align="left" valign="top">&nbsp;</td>
							<td width="252" align="left" valign="top">&nbsp;</td>
						</tr>
                        <tr>
                          <td align="left" valign="top" colspan="2"><strong>Summary :</strong></td>
                          <td align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" colspan="3">
						  <?php
									echo nl2br($row['allegations']);
							?></td>
                        </tr>
  </table>          
      
      
<br style="page-break-before: always">        
                    
<?php }
}
?>                    
                    
  





<?php
//--------------------------------------------------------------------REPORT BY COUNTRY---------------------
?>

  
 <table width="763" align="center" class="gridtable">
<tr>
<td width="559" valign="bottom"><strong>
<font color="#999999"; size="+2">
Accumulative complaints per Country - Year <?=$currentyear?>
</font></strong></td>
</tr>
</table>
<br />


<?php


$sql123 = "SELECT distinct allegation_details.country FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country != 'Internal' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN '$currentyear-01-01' AND '$currentyear-12-31'";

$sql_result123 = sqlsrv_query($conncss, $sql123);

while ($row123 = sqlsrv_fetch_array($sql_result123)) { 
?>
    
<table width="763" align="center" border="0">
<tr>
    <td width="182" align="left" valign="middle">
        <strong><font size="+1">
        <?php echo $country = $row123['country']; ?>
        </font></strong>
    </td>
    </tr>
  <tr>
	<td width="571">    
    
        <table width="760" align="center" class="table-style-three1">
            <tr>
                  <th width="25" align="center" valign="middle"><strong><font color="#333333">#</strong></th>
                  <th width="331" align="center" valign="middle"><strong><font color="#333333">Title</strong></th>
                  <th width="94" align="center" valign="middle"><strong><font color="#333333">Status</strong></th>
                  <th width="124" align="center" valign="middle"><strong><font color="#333333">Date Received</strong></th>
                  <th width="162" align="center" valign="middle"><strong><font color="#333333">Resolution</strong></th>
            </tr>	
        <?php
        $sql1234 = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '$currentyear-01-01' AND '$currentyear-12-31' ORDER BY date_received";
        
        $sql_result1234 = sqlsrv_query($conncss, $sql1234);
        
        while ($row1234 = sqlsrv_fetch_array($sql_result1234)) { 
        ?>
        
        
            <tr>
            <td align='center' valign='middle'><strong>
        
            <?php
            echo $id = $row1234['id'];
            ?>
            </strong>
            </td>
            <td align='left' valign='middle'>
            <?php
            echo $title = $row1234['summary'];
            ?>
            </td>
        
            <td align='center' valign='middle'>
            <?php
            echo $status = $row1234['status'];
            ?>
            </td>
        
            
            
            <td align='center' valign='middle'>
            <?php
               echo $date_received = date("F j, Y", strtotime($date_received = $row1234['date_received']));
            ?>
            </td>
            
            <td align='left' valign='middle'>
            <?php
            echo $resolution = $row1234['resolution'];
			if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case"){
				echo "&nbsp;&nbsp;<font color='#6C94D5'>(";
					echo $case_number = $row1234['case_number'];
				echo ")</font>";
			}
            ?>
            </td>
            </tr>
            
            <?php
            } ?>
          </table>
	</td>
    </tr>
    
    
    </table> 
	<?php
    } ?>
    
    
 <p><br />
  
  
  <br style="page-break-before: always">
  
  
</p>   
    
<?php
//--------------------------------------------------------------------REPORT BY MONTH---------------------
?>

  
 <table width="763" align="center" class="gridtable">
<tr>
<td width="559" valign="bottom"><strong>
<font color="#999999"; size="+2">
Accumulative complaints per Month - Year <?=$currentyear;?></font></strong></td>
</tr>
</table>
<br />

<?php
foreach ($allmonths as $month)
{
?>


<table width="755" align="center" style="border-left:thin solid #CCC; border-bottom:thin solid #CCC ;border-top:thin solid #CCC;border-right:thin solid #CCC">
<tr>
    <td width="182" align="center" valign="middle" style="border-right:thin solid #CCC; background:#EAEAEA;">
        <strong><font size="+2"><?=substr($month, 0, 3);?></font></strong>
    </td>
    <td>
<?php
$monthrange = GetMonthRange($month,$currentyear);
$sql123 = "SELECT distinct allegation_details.country FROM allegation_details LEFT JOIN ".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country != 'Internal' AND allegation_details.country = ".$region_selected.".country AND allegation_details.date_received BETWEEN $monthrange";
$sql_result123 = sqlsrv_query($conncss, $sql123);
while ($row123 = sqlsrv_fetch_array($sql_result123)) { 
?>
<table width="697" align="center" border="0">
<tr>
    <td width="155" align="center" valign="middle">
        <strong><font style="size:10px">
        <?php echo $country = $row123['country']; ?>
        </font></strong>
    </td>
	<td width="532">    
        <table width="532" align="center" class="table-style-three1">
            <tr>
                  <th width="95" align="center" valign="middle"><strong><font color="#333333">Complaint</strong></th>
                  <th width="146" align="center" valign="middle"><strong><font color="#333333">Status</strong></th>
                  <th width="138" align="center" valign="middle"><strong><font color="#333333">Date Received</strong></th>
                  <th width="203" align="center" valign="middle"><strong><font color="#333333">Resolution</strong></th>
            </tr>	
        <?php
        $sql1234 = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN $monthrange ORDER BY date_received";
        
        $sql_result1234 = sqlsrv_query($conncss, $sql1234);
        
        while ($row1234 = sqlsrv_fetch_array($sql_result1234)) { 
        ?>
            <tr>
            <td align='center' valign='middle'><strong>
        
            <?php
            echo $id = $row1234['id'];
            ?>
            </strong>
            </td>
        
            <td align='center' valign='middle'>
            <?php
            echo $status = $row1234['status'];
            ?>
            </td>
            <td align='center' valign='middle'>
            <?php
               echo $date_received = date("F j, Y", strtotime($date_received = $row1234['date_received']));
            ?>
            </td>
            
            <td align='left' valign='middle'>
            <?php
            echo $resolution = $row1234['resolution'];
			if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case"){
				echo "&nbsp;&nbsp;<font color='#6C94D5'>(";
					echo $case_number = $row1234['case_number'];
				echo ")</font>";
			}
            ?>
            </td>
            </tr>
            <?php
            } ?>
          </table>
	</td>
    </tr>
    </table> 
	<?php
    } ?>
   </td>
</tr>
</table>


<?php
}

?>
</body>

</html>

