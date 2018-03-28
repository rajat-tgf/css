<?php

require_once("includes\\opendb.php");
$file="active_cases.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

$sql = $_GET['sql'];

$sql_result = sqlsrv_query($conncss, $sql);
?>
<table border="1">
     <tr>
         <th>#</th>
          <th>Country</th>
          <th>Region</th>
          <th>Title</th>
          <th>Type allegation</th>
          <th>Status</th>
          <th>Resolution</th>
          <th>Case / Allegation number</th>
          <th>Category type</th>
          <th>Date received</th>
        </tr>
<?php
while ($row = sqlsrv_fetch_array($sql_result)) {			
$allegation_id = $row['id'];
		$type_allegation = $row['type_allegation'];
		$country = $row['country'];
		$date_received = $row['date_received'];
		$status = $row['status'];
		$title = $row['summary'];
		$resolution = $row['resolution'];
		$case_number = $row['case_number'];
		$category_type = $row['category_type'];
		
?>
<tr>
<td><?php echo $allegation_id ;?></td>
<td><?php echo $country ?></td>
<td><?php 
		$result_region = sqlsrv_query($conncss,"SELECT * FROM impact_asia WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_hi1 = sqlsrv_num_rows($result_region);
        if ( $region_hi1 != 0 ){
            echo  "High Impact Asia";
        }
		$result_region = sqlsrv_query($conncss,"SELECT * FROM impact_africa1 WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_hi1 = sqlsrv_num_rows($result_region);
        if ( $region_hi1 != 0 ){
            echo  "High Impact Africa I";
        }
		
		$result_region = sqlsrv_query($conncss,"SELECT * FROM impact_africa2 WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_hi2 = sqlsrv_num_rows($result_region);
        if ( $region_hi2 != 0 ){
            echo  "High Impact Africa II";
        }

		$result_region = sqlsrv_query($conncss,"SELECT * FROM region_sea WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_sea = sqlsrv_num_rows($result_region);
        if ( $region_sea != 0 ){
            echo  "South East Asia";
        }
        
        $result_region = sqlsrv_query($conncss,"SELECT * FROM region_sa WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_sa = sqlsrv_num_rows($result_region);
        if ( $region_sa != 0 ){
            echo  "Southern Africa";	
        }
        
        $result_region = sqlsrv_query($conncss,"SELECT * FROM region_mena WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_mena = sqlsrv_num_rows($result_region);
        if ( $region_mena != 0 ){
            echo  "MENA";
        }
    
        $result_region = sqlsrv_query($conncss,"SELECT * FROM region_wa WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_wa = sqlsrv_num_rows($result_region);
        if ( $region_wa != 0 ){
            echo  "Western Africa";	
        }
        
        $result_region = sqlsrv_query($conncss,"SELECT * FROM region_ca WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_ca = sqlsrv_num_rows($result_region);
        if ( $region_ca != 0 ){
            echo  "Central Africa";	
        }
        
        $result_region = sqlsrv_query($conncss,"SELECT * FROM region_eeca WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_eeca = sqlsrv_num_rows($result_region);
        if ( $region_eeca != 0 ){
            echo  "EECA";	
        }
        
        $result_region = sqlsrv_query($conncss,"SELECT * FROM region_lac WHERE country = '$country'", array(), array( "Scrollable" => 'buffered'));
        $region_lac = sqlsrv_num_rows($result_region);
        if ( $region_lac != 0 ){
            echo  "LAC";	
        }
		if ( $country == "Internal" ){
            echo  "Internal";	
        }


?></td>
<td><?php echo $title ?></td>
<td><?php echo $type_allegation ?></td>
<td><?php echo $status ?></td>
<td><?php echo $resolution ?></td>
<td><?php echo $case_number ?></td>
<td><?php echo $category_type ?></td>
<td><?php echo $date_received = date('F j, Y', strtotime($date_received)); ?></td>
</tr>
<?php
}
?>
  </table>
