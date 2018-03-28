<?php

require_once("includes\\opendb.php");
	$ref_number = $_GET['ref_number'];
	$result_report = sqlsrv_query($conncss,"SELECT top 1 * FROM allegation_details WHERE case_number = '$ref_number' AND resolution = 'Open case in CMS'");
	$all_rows = sqlsrv_fetchall($result_report);
	$num_rows = count($all_rows);
	if ($num_rows == 0)
	{
		$row_report = false;
	}
	else
	{
		$row_report = $all_rows[0];
	}
	
	$allegation_number = $row_report['id'];
	$approved_by = $row_report['approved_by'];
	$reviewed_by_officer = $row_report['reviewed_by_officer'];
	$reviewed_by_officer_date = $row_report['reviewed_by_officer_date'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type="text/css">
table.gridtable {
font-family: verdana,arial,sans-serif;
font-size:12px;
color:#EFEFEF;

}
table.gridtable th {
	font-size:10px;
	color:#666666;
	border-width: 1px;
	padding: 1px;
	border-style: solid;
	border-color: #666666;
	background-color: #EFEFEF;
	border:1px;
}
table.gridtable td {
font-size:11px;
border-width: 1px;
color:#666666;
padding: 3px;
border-color: #EDEDED;
border-spacing:2px;
border:2px;

}
hr{ border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 3px 1px black; } 


textarea {
font-family: verdana,arial,sans-serif;
font-size:11px;
color:#333333;
border-style:groove;
background:#EFEFEF;
background-repeat: repeat;
}
input {
font-family: verdana,arial,sans-serif;
font-size:11px;
color:#333333;
background:#EFEFEF;
background-repeat: repeat;
}
select {
font-family: verdana,arial,sans-serif;
font-size:11px;
color:#333333;
border-style:groove;
background:#EFEFEF;
background-repeat: repeat;
}
</style>

</head>

<body>
<table width="764" align="left" class="gridtable">
  <tr>
    <td width="153" align="left" valign="middle"><strong>Screening Report :</strong></td>
    <td width="599" align="left" valign="middle"><?php
						
						if ($num_rows > 0) {
							$main_allegation_number = $row_report['id'];
						  ?><img src="images/document-icon-sr.png" width="20" height="20" align="top" title="Allegation <?php echo $allegation_number ?>"/>
                          <a href="details_sr.php?allegation_id=<?php echo $main_allegation_number ?>" target="iframedetails_allegations"><?php echo $main_allegation_number; ?></a>
						      
				      <?php
						}
							else {
							  echo "Screening Report is not available";
						} ?>
      </td>
  </tr>
  <tr>
    <td align="left" valign="middle"><strong>Related allegations :</strong></td>
    <td align="left" valign="middle"><?php
	$result_other_allegations = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE case_number = '$ref_number' AND Resolution = 'Merge with an existing Case'");
						
		while($row_other_allegations = sqlsrv_fetch_array($result_other_allegations)){
			$allegation_number = $row_other_allegations['id'];
			?><img src="images/document-icon-sr.png" width="20" height="20" align="top" title="Allegation <?php echo $allegation_number ?>"/>
      		<a href="details_sr.php?allegation_id=<?php echo $allegation_number ?>" target="iframedetails_allegations"><?php echo $allegation_number; ?></a>
      		<?php
		}
		?>
      </td>
  </tr>
  
</table>

</body>
</html>