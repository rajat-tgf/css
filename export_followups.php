<?php

require_once("includes\\opendb.php");

$columns = array("id"
      ,"allegation_id"
      ,"request"
      ,"response"
      ,"status"
      ,"category"
      ,"responsable"
      ,"name"
      ,"date_notified"
      ,"date_follow_up"
      ,"comments"
      ,"email_notification"
      ,"member");
$sQuery="select * from follow_ups ORDER BY id";
						
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
header("Content-Disposition: attachment; filename=exportfile.xls");
header("Pragma: no-cache");
header("Expires: 0");
print sprintf($html, $thead, $tbody);
exit; 

?>