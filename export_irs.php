<?php

require_once("includes\\opendb.php");

$columns = array("id"
      ,"date_received"
      ,"reporter"
      ,"case_number"
      ,"date_report_complete"
      ,"information_source"
      ,"country"
      ,"entities_interest"
      ,"entity_number"
      ,"docs"
      ,"urgent"
	  ,"further_explanation"
	  ,"title"
	  ,"circumstances"
	  ,"information_recieved"
	  ,"comments"
	  ,"ioe_comments"
	  ,"checkbox1"
	  ,"checkbox2"
	  ,"checkbox3"
	  ,"checkbox4"
	  ,"checkbox5"
	  ,"checkbox6"
	  ,"checkbox7"
	  ,"checkbox8"
	  ,"checkbox9"
	  ,"checkbox10"
	  ,"member"
	  ,"status"
	  ,"submitted_to_officer"
	  ,"submitted_date_officer"
	  ,"reviewed_by_officer"
	  ,"reviewed_by_officer_date"
	  ,"approved_by");
	  
$sQuery="select * from intelligence_reports ORDER BY id";
						
$rResult = sqlsrv_query($conncss, $sQuery) or trigger_error("SQL query Failed", E_USER_ERROR);
$count = count($columns);
$html = '<table border="1" valign="top" align="left"><thead><tr>%s</tr><thead><tbody>%s</tbody></table>';
$thead = '';
$tbody = '';
$line = '<tr valign="top" align="left">%s</tr>';
for ($i = 0; $i < $count; $i++){         
$thead .= sprintf('<th>%s</th>',$columns[$i]);
}   
while(false !== ($row = sqlsrv_fetch_array($rResult))){ 
$trow = '';
foreach($columns as $field){
$trow .= sprintf('<td valign="top" align="left">%s</td>', $row[$field]);
}
$tbody .= sprintf($line, $trow);
}
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: attachment; filename=export_intelligence_reports.xls");
header("Pragma: no-cache");
header("Expires: 0");
print sprintf($html, $thead, $tbody);
exit; 

?>