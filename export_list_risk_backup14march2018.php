<?php

require_once("includes\\opendb.php");
$file="list_risk_types.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

$sql = "SELECT * FROM allegation_details LEFT JOIN risk_types ON allegation_details.id = risk_types.allegation_id WHERE allegation_details.id = risk_types.allegation_id";


$sql_result = sqlsrv_query($conncss, $sql);
?>
<table border="1">
     <tr>
         <th>allegation_number</th>
          <th>Country</th>
          <th>Date received</th>
          <th>Category</th>
          <th>Sub_category</th>
          <th>Risk_type</th>
          <th>Risk</th>
          <th>description</th>
          <th>action</th>
          <th>member</th>
        </tr>
<?php
while ($row = sqlsrv_fetch_array($sql_result)) {			
?>
<tr>
<td><?php echo $row['allegation_id'];?></td>
<td><?php echo $row['country']; ?></td>
<td><?php echo $row['date_received']; ?></td>
<td><?php echo $row['category_type']; ?></td>
<td><?php echo $row['sub_category_type']; ?></td>
<td><?php echo $row['risk_type']; ?></td>
<td><?php echo $row['risk']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['action']; ?></td>
<td><?php echo $row['member']; ?></td>
</tr>
<?php
}
?>
  </table>
