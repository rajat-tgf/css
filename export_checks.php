<?php

require_once("includes\\opendb.php");

$columns = array("id"
      ,"status"
      ,"type"
      ,"referred"
      ,"datepickerrequest"
      ,"datepickerresponse"
      ,"name"
      ,"alt_name"
      ,"datepickerdob"
      ,"email"
      ,"notes"
      ,"member");
$sQuery="select * from checks ORDER BY id";
						
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
header("Content-Disposition: attachment; filename=exportfilechecks.xls");
header("Pragma: no-cache");
header("Expires: 0");
print sprintf($html, $thead, $tbody);
exit; 

?>