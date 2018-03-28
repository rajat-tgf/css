 <?php
 
require_once("..\\includes\\opendb.php");


$result_proactive_2016 = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE type_allegation = 'Proactive' AND date_received BETWEEN '2016-01-01' AND '2016-12-31' ORDER BY date_received DESC");		
$proactive_2016 = sqlsrv_fetchall($result_proactive_2016);
$num_proactive_2016 = count($proactive_2016);

$total_allegations_involved_2016 = 0;
foreach ($proactive_2016 as $rowallegations2016) {

	$allegation_id = $rowallegations2016['id'];
	$SQL_CHECK_EXIST = sqlsrv_query($conncss, "SELECT * FROM proactive_link WHERE id = '$allegation_id'");
    	$allegations_proactive_2016 = sqlsrv_fetchall($SQL_CHECK_EXIST);
		$num_allegation_involved = count($allegations_proactive_2016);
        	$total_allegations_involved_2016 = $total_allegations_involved_2016 + $num_allegation_involved;
      }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="../style.css" type="text/css" media="screen" /> 

</head>

<body>
<table align="center" class="gridtable">
<tr>
<td><strong><font color="#666666" size="+2">Proactive Assessments opened: </font><font size="+2"; color="#990000"><?php echo $num_proactive_2016 ?></strong></font><br />
</td>
</tr>
<tr>
<td align="right"><strong>
<strong><font color="#666666" size="+1">Allegations involved: </font><font size="+1"; color="#990000"><?php echo $total_allegations_involved_2016 ?></strong></font><br />
</td>
</tr>
</table>




<div id="entities-contain1" align="center">

<?php
//while($rowallegations2016 = sqlsrv_fetch_array($result_proactive_2016)){
	foreach ($proactive_2016 as $rowallegations2016) {	
?>



<table width="1324" border="0" align="center">
<tr>
    <td width="328" align="center" valign="middle">
    <img src="../images/Pro-icon1.png" alt="" width="20" height="20" align="top"/>&nbsp;&nbsp;<strong>
        <font color="#000000" size="+1">
        <?php 
		$id = $rowallegations2016['id'];
		echo $country = $rowallegations2016['country']; ?>
        </font></strong>
        <br />
        <font color="#666666">
        <?php
        echo $summary = $rowallegations2016['summary']; ?>
        <br />
        <strong>
        <font color="#666666">
        Report Number : </strong>
        <font color="#666666">
        <?php
        echo $id; ?>
        <br />
        <strong>
        <font color="#666666">
        Region : </strong>
        
 <?php       
 $result_region = sqlsrv_query($conncss, "SELECT * FROM impact_asia WHERE country = '$country'");
        $region_hi1 = sqlsrv_num_rows($result_region);
        if ( $region_hi1 != 0 ){
            echo  "High Impact Asia";
        }
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_africa1 WHERE country = '$country'");
        $region_hi1 = sqlsrv_num_rows($result_region);
        if ( $region_hi1 != 0 ){
            echo  "High Impact Africa 1";
        }
		
		$result_region = sqlsrv_query($conncss, "SELECT * FROM impact_africa2 WHERE country = '$country'");
        $region_hi2 = sqlsrv_num_rows($result_region);
        if ( $region_hi2 != 0 ){
            echo  "High Impact Africa 2";
        }

		$result_region = sqlsrv_query($conncss, "SELECT * FROM region_sea WHERE country = '$country'");
        $region_sea = sqlsrv_num_rows($result_region);
        if ( $region_sea != 0 ){
            echo  "South East Asia";
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_sa WHERE country = '$country'");
        $region_sa = sqlsrv_num_rows($result_region);
        if ( $region_sa != 0 ){
            echo  "Southern Africa";	
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_mena WHERE country = '$country'");
        $region_mena = sqlsrv_num_rows($result_region);
        if ( $region_mena != 0 ){
            echo  "MENA";
        }
    
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_wa WHERE country = '$country'");
        $region_wa = sqlsrv_num_rows($result_region);
        if ( $region_wa != 0 ){
            echo  "Western Africa";	
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_ca WHERE country = '$country'");
        $region_ca = sqlsrv_num_rows($result_region);
        if ( $region_ca != 0 ){
            echo  "Central Africa";	
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_eeca WHERE country = '$country'");
        $region_eeca = sqlsrv_num_rows($result_region);
		if ( $region_eeca != 0 ){
            echo  "EECA";	
        }
        
        $result_region = sqlsrv_query($conncss, "SELECT * FROM region_lac WHERE country = '$country'");
        $region_lac = sqlsrv_num_rows($result_region);
        if ( $region_lac != 0 ){
            echo  "LAC";	
        }

        if ( $country == "Internal" ){
            echo  "Internal";	
        }       
?>   </font>     
  <br />
      
        
        
        
        
        <strong>
        <font color="#666666">
        Date opened : </strong>
        <?php 
		$id = $rowallegations2016['id'];
		$date_received = $rowallegations2016['date_received']; 
		echo $date_received_newDate = date('F j, Y', strtotime($date_received));
		?>
        </font>
        <br />

    </td>
	<td width="935">
    <?php
	
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM proactive_link WHERE id = '$id'", array(), array( "Scrollable" => 'buffered'));
	$allegations_proactive_2016 = sqlsrv_fetchall($result_proactive_linked);
	$num_total_allegations_linked = count($allegations_proactive_2016);
	
	if ( $num_total_allegations_linked != 0 ){ ?>
    <div id="entities-contain">
  		<table>
                <tr>
                  <th align="center" valign="middle">#</th>
                      <th align="center" valign="middle">Country</th>
                      <th align="center" valign="middle">Title</th>
                      
                      <th align="center" valign="middle">Status</th>
                      <th align="center" valign="middle">Resolution</th>
                </tr>
			  <?php
  					foreach ($allegations_proactive_2016 as $row_proactive){
                          
						  $allegation_linked = $row_proactive['linked_to'];

                          $result_profile_details = sqlsrv_query($conncss, "SELECT * FROM allegation_details WHERE id = '$allegation_linked'");
                          $row_allegation_linked_details = sqlsrv_fetch_array($result_profile_details);
						  
						  
						  $country = $row_allegation_linked_details['country'];
						  $summary = $row_allegation_linked_details['summary'];
						  $status = $row_allegation_linked_details['status'];
						  $resolution = $row_allegation_linked_details['resolution'];
						  
						 ?>
                        <td align="center"><strong><?php echo $allegation_linked; ?></strong></td>
                        
                        <td align="center"><?php echo $country; ?></td>
                        <td align="center"><?php echo $summary; ?></td>
                        <td align="center"><?php echo $status; ?></td>
                        <td align="center"><?php echo $resolution; ?></td>
                        </tr>
                        <?php 
						}
						?>
				</table>
      
</div> 
 <?php } else { echo "No previous allegations linked"; }?>   
    </td>
    </tr>
</table>

<?php }  ?>

</div>



</body>
</html>