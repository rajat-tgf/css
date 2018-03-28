<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Monthly_Management_Report.doc");

require_once("includes\\opendb.php");

$month_selected = $_POST['month'];

if ( $month_selected == "January 2016" ){
	$month = "'2016-01-01' AND '2016-01-31'";
}
if ( $month_selected == "February 2016" ){
	$month = "'2016-02-01' AND '2016-02-31'";
}
if ( $month_selected == "March 2016" ){
	$month = "'2016-03-01' AND '2016-03-31'";
}
if ( $month_selected == "April 2016" ){
	$month = "'2016-04-01' AND '2016-04-31'";
}
if ( $month_selected == "May 2016" ){
	$month = "'2016-05-01' AND '2016-05-31'";
}
if ( $month_selected == "June 2016" ){
	$month = "'2016-06-01' AND '2016-06-31'";
}
if ( $month_selected == "July 2016" ){
	$month = "'2016-07-01' AND '2016-07-31'";
}
if ( $month_selected == "August 2016" ){
	$month = "'2016-08-01' AND '2016-08-31'";
}
if ( $month_selected == "September 2016" ){
	$month = "'2016-09-01' AND '2016-09-31'";
}
if ( $month_selected == "October 2016" ){
	$month = "'2016-10-01' AND '2016-10-31'";
}
if ( $month_selected == "November 2016" ){
	$month = "'2016-11-01' AND '2016-11-31'";
}
if ( $month_selected == "December 2016" ){
	$month = "'2016-12-01' AND '2016-12-31'";
}


?>
<html>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
<head>

<style>
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
</style>

<style type="text/css">
table.gridtable_table {
	background-color:#FFF;
	border: 1px #000000 solid;
	border-collapse: collapse;
	border-spacing: 0px;
	font-size: 11px;
	color: #669900;
}
table.gridtable_table th {
	font-size:11px;
	border-width: 1px;
	padding: 3px;
	border-style: solid;
	border-color: #000000;
	background-color:#CCC;
}
table.gridtable_table td {
	border-bottom: 1px #6699CC dotted;
	font-family: Verdana, sans-serif, Arial;
	font-weight: normal;
	font-size: 11px;
	color: #666666;
	background-color: #FFF;
	padding-top: 4px;
	padding-bottom: 4px;
	padding-left: 8px;
	padding-right: 0px;
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
	padding: 1px;
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
		color: #ffffff;
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
		font-size: 8px;
		color:#FFF;
		border-width: 1px;
		border-color:#BBD5EE;
		border-collapse: collapse;
	}
	table.table-style-three1 th {
		border-width: 1px;
		font-size: 10px;
		padding: 5px;
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
		font-size: 10px;
		color:#333;
		padding: 5px;
		border-style: solid;
		border-color:#BBD5EE;
	}
</style>

</head>
<body>
  <table class="gridtable_report_head" width="762" align="center">
  <tr>
    <td colspan="3" align="center">
      <strong><font size="+2">Monthly Management Summary CSS Report</strong></font></strong>
</td>
</tr>
  <tr>
    <td colspan="3" align="center">
      <strong><?php echo $month_selected ?></strong>
</td>
</tr>
</table> 
<br /><br />

  
  
                    <table width="762" align="center" class="gridtable">
						  <tr>
						    <td align="left" valign="middle">
                            <table width="761" align="right" class="gridtable">
					          <tr>
					            <td width="407" rowspan="14" align="right" valign="top" style="border-right:thin solid #CCC"><strong><font color="#999999"; size="+2">Summary &nbsp;</font></strong></td>
					            <td width="3" rowspan="14" align="center" valign="top">&nbsp;</td>
					            <td colspan="2"><strong>New complaints  : &nbsp;
					              <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
					            </strong></td>
					            <td align="left">&nbsp;</td>
				              </tr>
					          <tr>
					            <td>&nbsp;</td>
					            <td>
                                <font color='#FF0000'>High &nbsp;
                                <?php
                                $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE priority = 'High' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 	echo $num = sqlsrv_num_rows($result);
								 ?>
                             </font>
                                </td>
					            <td align="center"></td>
				              </tr>
					          <tr>
					            <td>&nbsp;</td>
					            <td><font color='#FF9933'>Medium &nbsp;
                                <?php
                                $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE priority = 'Medium' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 	echo $num = sqlsrv_num_rows($result);
								 ?>
                                 </font>
                                </td>
					            <td align="center"></td>
				              </tr>
					          <tr>
					            <td>&nbsp;</td>
					            <td><font color='#339933'>Low &nbsp;
                                <?php
                                $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE priority = 'Low' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 	echo $num = sqlsrv_num_rows($result);
								 ?>
                                 </font>
                                </td>
					            <td align="center"></td>
				              </tr>
					          <tr>
					            <td colspan="2">&nbsp;</td>
					            <td align="center"></td>
				              </tr>
					          <tr>
					            <td colspan="2"><strong>Complaints finalized : &nbsp;
					              <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
					            </strong></td>
					            <td width="3" align="center"></td>
				              </tr>
					          <tr>
					            <td width="9" align="left">&nbsp;</td>
					            <td width="315" align="left">Open cases :&nbsp;
                                <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE resolution = 'Open case in CMS' AND reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
                                </td>
					            <td></td>
				              </tr>
					          <tr>
					            <td align="left">&nbsp;</td>
					            <td align="left">Merge with existing case :&nbsp;
                                <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE resolution = 'Merge with an existing Case' AND reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
                                </td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="left">&nbsp;</td>
					            <td align="left">Merge with existing allegation :&nbsp;
                             <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE resolution = 'Merge with an existing Allegation' AND reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
                                </td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="left">&nbsp;</td>
					            <td align="left">Referral to Secretariat for management action :&nbsp;
                                <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE resolution = 'Referral to Secretariat for management action' AND reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
                                </td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="left">&nbsp;</td>
					            <td align="left">Referral to Secretariat for information only :&nbsp;
                                 <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE resolution = 'Referral to Secretariat for information only' AND reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
                                </td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="left">&nbsp;</td>
					            <td align="left">Referral to external agency :&nbsp;
                                <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE resolution = 'Referral to external agency' AND reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
                                </td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="left">&nbsp;</td>
					            <td align="left">Information Report :&nbsp;
                                <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE resolution = 'Information report' AND reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
                                </td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="left">&nbsp;</td>
					            <td align="left">No Further action :&nbsp;
                                <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE resolution = 'No further action' AND reviewed_by_officer_date BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							 echo $num = sqlsrv_num_rows($result);	
									?>
                                </td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="right" valign="top">&nbsp;</td>
					            <td align="center" valign="top">&nbsp;</td>
					            <td align="right">&nbsp;</td>
					            <td align="right">&nbsp;</td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="right" valign="top" >&nbsp;</td>
					            <td align="center" valign="top">&nbsp;</td>
					            <td align="right">&nbsp;</td>
					            <td align="right">&nbsp;</td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td align="right" valign="top" >&nbsp;</td>
					            <td align="center" valign="top">&nbsp;</td>
					            <td align="right">&nbsp;</td>
					            <td align="right">&nbsp;</td>
					            <td>&nbsp;</td>
				              </tr>
					          <tr>
					            <td colspan="5" align="right" valign="top">
                                
                                <table width="745">
                                
                                <tr>
                                <td width="208" valign="top">
                                <strong>
                                <font color="#666666" size="+1">
                                Method of referral               
                                </font>
                                </strong><br />
                                <table width="171" class="table-style-three1">
                                  
                                  <tr>
                                    <td width="137" style="background-color:#A0BFDE"><strong>Whistleblower E-mail</strong></td>
                                    <td width="22">
                                    <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE received_via = 'Whistleblower E-mail' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							echo $num = sqlsrv_num_rows($result);	
									?>
                                    
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Other E-mail</strong></td>
                                    <td>
                                    <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE received_via = 'Other E-mail' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							echo $num = sqlsrv_num_rows($result);	
									?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Fax</strong></td>
                                    <td>
                                    <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE received_via = 'Fax' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							echo $num = sqlsrv_num_rows($result);	
									?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Post</strong></td>
                                    <td>
                                    <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE received_via = 'Post' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							echo $num = sqlsrv_num_rows($result);	
									?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Personal complaint</strong></td>
                                    <td>
                                    <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE received_via = 'Personal complaint' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							echo $num = sqlsrv_num_rows($result);	
									?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Online report</strong></td>
                                    <td>
                                    <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE received_via = 'Online report' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							echo $num = sqlsrv_num_rows($result);	
									?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>External Hotline</strong></td>
                                    <td>
                                    <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE received_via = 'External hotline' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							echo $num = sqlsrv_num_rows($result);	
									?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Internal Hotline</strong></td>
                                    <td>
                                    <?php
                             $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE received_via = 'Internal hotline' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
							echo $num = sqlsrv_num_rows($result);	
									?>
                                    </td>
                                  </tr>
                                </table>
                                  <p>&nbsp;</p>
                                  <p>&nbsp;</p>
                                
                                </td>
                                <td width="525" align="left" valign="top">
                                <strong>
                                <font color="#666666" size="+1">
                                Source               
                                </font>
                                </strong><br />

                                <table width="367" class="table-style-three1">
                                  <tr>
                                    <td style="background-color:#A0BFDE">&nbsp;</td>
                                    <td style="background-color:#A0BFDE"><strong>Confidential Whistleblower</strong></td>
                                    <td style="background-color:#A0BFDE"><strong>Anonymous Whistleblower</strong></td>
                                    <td style="background-color:#A0BFDE"><strong>Reporter</strong></td>
                                    <td style="background-color:#A0BFDE"><strong>Confidential Informant</strong></td>
                                    <td style="background-color:#A0BFDE"><strong>Witness</strong></td>
                                    <td style="background-color:#A0BFDE"><strong>Other</strong></td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>OIG Investigations</strong></td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Investigations' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>OIG Audit</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Audit' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>  
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>OIG Other</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'OIG Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'OIG Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'OIG Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'OIG Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'OIG Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'OIG Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Secretariat</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Secretariat' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Secretariat' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Secretariat' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Secretariat' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Secretariat' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Secretariat' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>   
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Secretariat (LFA)</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Secretariat (via LFA)' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>   
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>LFA</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'LFA' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'LFA' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'LFA' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'LFA' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'LFA' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'LFA' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>CCM</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'CCM' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'CCM' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'CCM' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'CCM' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'CCM' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'CCM' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>   
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>PR</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'PR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'PR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'PR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'PR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'PR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'PR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>   
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>SR</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'SR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'SR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'SR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'SR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'SR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'SR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>SSR</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'SSR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'SSR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'SSR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'SSR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'SSR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'SSR' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>  
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Supplier</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Supplier' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Supplier' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Supplier' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Supplier' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Supplier' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Supplier' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Inter-agency</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Inter-agency' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>   
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="background-color:#A0BFDE"><strong>Other</strong></td>
                                    <td align="center">
                                                                        <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Whistleblower' AND source_subcategory = 'Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Anonymous Whistleblower' AND source_subcategory = 'Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Reporter' AND source_subcategory = 'Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Confidential Informant' AND source_subcategory = 'Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Witness' AND source_subcategory = 'Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?>                                    
                                    </td>
                                    <td align="center">
                                    <?php
                                    $result = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE source_category = 'Other' AND source_subcategory = 'Other' AND date_received BETWEEN ". $month ."", array(), array( "Scrollable" => 'buffered'));		
echo $num = sqlsrv_num_rows($result);
?> 
                                    </td>
                                  </tr>
                                </table></td>
                                </tr>
                                </table>

                                </td>
				              </tr>
				            </table>
					</td>
				      </tr>
						  <tr>
						    <td align="left" valign="middle">

					 </td>
				      </tr>
                    </table>

<br style="page-break-before: always">    


<table width="763" align="center" class="gridtable">
<tr>
  <td><strong>
<font color="#666666" size="+1">
New Complaints received              
</font>
</strong>
</td>
</tr>
</table>
<br />
<br />
                    
   <table width="763" align="center" class="table-style-three">
                    <tr>
                  	  <th width="27" align="center" valign="middle"><strong><font color="#333333">ID</strong></th>
                      
                      <th width="277" align="center" valign="middle"><strong><font color="#333333">Title</strong></th>
    
                      <th width="148" align="center" valign="middle"><strong><font color="#333333">Country</strong></th>
                      
                      <th width="172" align="center" valign="middle"><strong><font color="#333333">Status</strong></th>
                      
                      <th width="115" align="center" valign="middle"><strong><font color="#333333">Date received</strong></th>
                    </tr>
                        
						<?php
						$quey1="SELECT * FROM allegation_details WHERE date_received BETWEEN ". $month ." ORDER BY country";
						$result=sqlsrv_query($conncss,$quey1);

						while($row = sqlsrv_fetch_array($result)){

						?>
									<tr>
							
									<td align='center' valign='middle'><strong>

									<?php
                                    echo $id = $row['id'];
									?>
									</td>
							
									<td valign='middle'>
                                    <?php
									echo $summary = $row['summary'];
									?>
									</td>
							
					
									<td align='center' valign='middle'>
                                    <?php
									echo $country = $row['country'];
									?>
									</td>
							
									<td align='center' valign='middle'>
									<?php
									echo $status = $row['status'];
									?>
									</td>
									
                                    <td align='center' valign='middle'>
									<?php
                                    echo $date_received = $row['date_received'];
									?>
									</td>
									</tr>
                                    
                                    
			<?php
            }
            ?>
              </table>                 
                    
 <br style="page-break-before: always">
 
                    
<table width="763" align="center" class="gridtable">
<tr>
  <td><strong>
<font color="#666666" size="+1">
Complaints finalized               
</font>
</strong>
</td>
</tr>
</table>
<br />
<br />
                    
   <table width="763" align="center" class="table-style-three">
                    <tr>
                  	  <th width="27" align="center" valign="middle"><strong><font color="#333333">ID</strong></th>
                      
                      <th width="277" align="center" valign="middle"><strong><font color="#333333">Title</strong></th>
    
                      <th width="148" align="center" valign="middle"><strong><font color="#333333">Country</strong></th>
                      
                      <th width="172" align="center" valign="middle"><strong><font color="#333333">Resolution</strong></th>
                      
                      <th width="115" align="center" valign="middle"><strong><font color="#333333">Category</strong></th>
                    </tr>
                        
						<?php
						$quey1="SELECT * FROM allegation_details WHERE reviewed_by_officer_date BETWEEN ". $month ." ORDER BY resolution";
						$result=sqlsrv_query($conncss,$quey1);

						while($row = sqlsrv_fetch_array($result)){

						?>
									<tr>
							
									<td align='center' valign='middle'><strong>

									<?php
                                    echo $id = $row['id'];
									?>
									</td>
							
									<td valign='middle'>
                                    <?php
									echo $summary = $row['summary'];
									?>
									</td>
							
					
									<td align='center' valign='middle'>
                                    <?php
									echo $country = $row['country'];
									?>
									</td>
							
									<td align='center' valign='middle'>
                                    

									<?php
									echo $resolution = $row['resolution'];
									
									if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case"){
										echo "<br />";
										echo "<font color='#CCCCCC'>(";
											echo $case_number = $row['case_number'];
											echo ")";	
										echo "</font>";
									}
								
									?>
									</td>
									
                                    <td align='center' valign='middle'>
									<?php
                                    echo $category_type = $row['category_type'];
									?>
									</td>
									</tr>
                                    
                                    
			<?php
            }
            ?>
              </table>                      
    
 
</body>

</html>

