<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");  // Redirecting To Home Page
}
error_reporting(0);

require_once("includes\\opendb.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>CSS</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>  
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

<script>
    $(function() {
		$( "#tabs" ).tabs();
	$( "input[type=submit], button" )
	.button()
	});
</script>



<script type="text/javascript">
	function showDialog(sr){
	parent.show_sr_Popup(sr);
	};
</script>


</head>
<body>
<?php include("menu_list.php"); ?>
<br />


<form id="form1" name="form1" method="post" action="search_allegations.php">

<table width="100%" class="gridtablefilter">
<tr>
<td width="14%" align="right"><strong>Country :</strong></td>
  <td width="33%">
  
  <select name="country" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
      <?php
	$sql = sqlsrv_query($conncss,"SELECT distinct country FROM allegation_details ORDER BY country");
	$all_countries = sqlsrv_fetchall($sql);      
	foreach ($all_countries as $row) {
		echo "<option>".$row["country"]."</option>";
	}
	?>
  </select>
  
  
  </td>
  <td width="8%" rowspan="6"><button type = "submit" name = "Submit" value = "Filter">Filter</button></td>
  <td width="18%" align="right">&nbsp;</td>
  <td width="27%">&nbsp;</td>
  </tr>
    
<tr>
  <td align="right"><strong>Region :</strong></td>
  <td><select name="region" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
    <optgroup label="Regions">
      <option>Central Africa</option>
      <option>East Europe and Central Asia</option>
      <option>Latin America and Caribbean</option>
      <option>Middle East and North Africa</option>
      <option>South and East Asia</option>
      <option>Southern Africa</option>
      <option>Western Africa</option>
      </optgroup>
    <optgroup label="High Impact Countries">
      <option>High Impact Africa I</option>
      <option>High Impact Africa II</option>
      <option>High Impact Asia</option>
      </optgroup>
    <optgroup label="Regional Teams">
      <option value="david_team">David WOLFE - WA, CA, High Impact Africa I</option>
      <option value="andrew_team">Andrew MCLOUGHLIN - SA, MENA, High Impact Africa II</option>
      <option value="sarah_team">Sarah RITCH - SEA, High Impact Asia</option>
      <option value="christopher_team">Christopher MARSHALL</option>
      </optgroup>
    </select>
  </td>
  <td align="right"><strong>Referred from :</strong></td>
  <td>
  <select name="referred_from" class="text ui-widget-content ui-corner-all">
        <option></option>
      <?php
	  $sql = sqlsrv_query($conncss,"SELECT distinct referred_from FROM allegation_details ORDER BY referred_from");
	$all = sqlsrv_fetchall($sql);      
	foreach ($all as $row) {
		echo "<option>".$row["referred_from"]."</option>";
	}
?>
  </select>
  </td>
  </tr>
<tr>
<td align="right"><strong>Year received :</strong></td>
  <td>
    
    <select name="year" class="text ui-widget-content ui-corner-all">
      <option value=""></option>
      <option value="2010">2010</option>
      <option value="2011">2011</option>
      <option value="2012">2012</option>
      <option value="2013">2013</option>
      <option value="2014">2014</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      </select>
    
    
  </td>
  <td align="right"><strong>Method of referral :</strong></td>
  <td>
  <select name="received_via" class="text ui-widget-content ui-corner-all">
  <option></option>
      <?php
	  $sql = sqlsrv_query($conncss,"SELECT distinct received_via FROM allegation_details ORDER BY received_via");
	$all = sqlsrv_fetchall($sql);      
	foreach ($all as $row) {
		echo "<option>".$row["received_via"]."</option>";
	}
?>
</select></td>
  </tr>    
    
    
    
<tr>
  <td align="right"><strong>Resolution  :</strong></td>
  <td><select name="resolution" class="text ui-widget-content ui-corner-all">
    <option></option>
    <?php
	  $sql = sqlsrv_query($conncss,"SELECT distinct resolution FROM allegation_details ORDER BY resolution");
	$all = sqlsrv_fetchall($sql);      
	foreach ($all as $row) {
		echo "<option>".$row["resolution"]."</option>";
	}
?>
    
  </select></td>
  <td align="right"><strong>Source Category :</strong></td>
  <td><select name="source_category" class="text ui-widget-content ui-corner-all">
     <option></option>
      <?php
	  $sql = sqlsrv_query($conncss,"SELECT distinct source_category FROM allegation_details ORDER BY source_category");
	$all = sqlsrv_fetchall($sql);      
	foreach ($all as $row) {
		echo "<option>".$row["source_category"]."</option>";
	}
?>
</select></td>
</tr>
<tr>
  <td align="right"><strong>Category :</strong></td>
  <td>
    <select name="category_type" class="text ui-widget-content ui-corner-all">
      <option></option>
      <?php
	  $sql = sqlsrv_query($conncss,"SELECT distinct category_type FROM allegation_details ORDER BY category_type");
	$all = sqlsrv_fetchall($sql);      
	foreach ($all as $row) {
		echo "<option>".$row["category_type"]."</option>";
	}
?>
      
      </select>
    
    
  </td>
  <td align="right"><strong>Source Sub-Category :</strong></td>
  <td><select name="source_subcategory" class="text ui-widget-content ui-corner-all">
    
    <option></option>
      <?php
	  $sql = sqlsrv_query($conncss,"SELECT distinct source_subcategory FROM allegation_details ORDER BY source_subcategory");
	$all = sqlsrv_fetchall($sql);      
	foreach ($all as $row) {
		echo "<option>".$row["source_subcategory"]."</option>";
	}
?>
  </select></td>
</tr>
<tr>
  <td height="30" align="right"><strong>Report type :</strong></td>
  <td align="left">
    <select name="type_report" class="text ui-widget-content ui-corner-all">
      <option></option>
      <?php
	  $sql = sqlsrv_query($conncss,"SELECT distinct type_allegation FROM allegation_details ORDER BY type_allegation");
	$all = sqlsrv_fetchall($sql);      
	foreach ($all as $row) {
		echo "<option>".$row["type_allegation"]."</option>";
	}
?>
    </select></td>
  <td align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>
</form>


<?php


if ($_REQUEST["received_via"]<>''){
	$received_via = " AND received_via='".sqlsrv_real_escape_string($_REQUEST["received_via"])."'";	
}

if ($_REQUEST["referred_from"]<>''){
	$referred_from = " AND referred_from='".sqlsrv_real_escape_string($_REQUEST["referred_from"])."'";	
}

if ($_REQUEST["source_category"]<>''){
	$source_category = " AND source_category='".sqlsrv_real_escape_string($_REQUEST["source_category"])."'";	
}

if ($_REQUEST["source_subcategory"]<>''){
	$source_subcategory = " AND source_subcategory='".sqlsrv_real_escape_string($_REQUEST["source_subcategory"])."'";	
}


if ($_REQUEST["type_report"]<>''){
	$type_report = " AND type_allegation='".sqlsrv_real_escape_string($_REQUEST["type_report"])."'";	
}

if ($_REQUEST["country"]<>''){
	$country = " AND country='".sqlsrv_real_escape_string($_REQUEST["country"])."'";	
}

if ($_REQUEST["year"]<>''){
	
	if ( $_REQUEST["year"] == "2010" ){
		
		$year = " AND date_received BETWEEN '2010-01-01' AND '2010-12-31'";
		
	}
	if ( $_REQUEST["year"] == "2011" ){
		
		$year = " AND date_received BETWEEN '2011-01-01' AND '2011-12-31'";
		
	}
	if ( $_REQUEST["year"] == "2012" ){
		
		$year = " AND date_received BETWEEN '2012-01-01' AND '2012-12-31'";
		
	}
	if ( $_REQUEST["year"] == "2013" ){
		
		$year = " AND date_received BETWEEN '2013-01-01' AND '2013-12-31'";
		
	}
	if ( $_REQUEST["year"] == "2014" ){
		
		$year = " AND date_received BETWEEN '2014-01-01' AND '2014-12-31'";
		
	}
	if ( $_REQUEST["year"] == "2015" ){
		
		$year = " AND date_received BETWEEN '2015-01-01' AND '2015-12-31'";
		
	}
	if ( $_REQUEST["year"] == "2016" ){
		
		$year = " AND date_received BETWEEN '2016-01-01' AND '2016-12-31'";
		
	}
	if ( $_REQUEST["year"] == "2017" ){
		
		$year = " AND date_received BETWEEN '2017-01-01' AND '2017-12-31'";
		
	}

}

	if ($_REQUEST["resolution"]<>''){
		$resolution = " AND resolution='".sqlsrv_real_escape_string($_REQUEST["resolution"])."'";	
	}



	
	if ( $_REQUEST["category_type"] == "Corruption" ){
	
		$search_category_type = " AND (category_type = '".sqlsrv_real_escape_string($_REQUEST["category_type"])."' OR checkbox1 = 'checked')";	
	}
	if ( $_REQUEST["category_type"] == "Fraud" ){
	
		$search_category_type = " AND (category_type = '".sqlsrv_real_escape_string($_REQUEST["category_type"])."' OR checkbox2 = 'checked')";	
	}
	if ( $_REQUEST["category_type"] == "Coercion" ){
	
		$search_category_type = " AND (category_type = '".sqlsrv_real_escape_string($_REQUEST["category_type"])."' OR checkbox3 = 'checked')";	
	}
	if ( $_REQUEST["category_type"] == "Collusion" ){
	
		$search_category_type = " AND (category_type = '".sqlsrv_real_escape_string($_REQUEST["category_type"])."' OR checkbox4 = 'checked')";	
	}
	if ( $_REQUEST["category_type"] == "Non-Compliance with laws / Grant agreements" ){
	
		$search_category_type = " AND (category_type = '".sqlsrv_real_escape_string($_REQUEST["category_type"])."' OR checkbox5 = 'checked')";	
	}
	if ( $_REQUEST["category_type"] == "Human Rights Violations" ){
	
		$search_category_type = " AND (category_type = '".sqlsrv_real_escape_string($_REQUEST["category_type"])."' OR checkbox6 = 'checked')";	
	}
	if ( $_REQUEST["category_type"] == "Product Issues (JIATF)" ){
	
		$search_category_type = " AND (category_type = '".sqlsrv_real_escape_string($_REQUEST["category_type"])."' OR checkbox7 = 'checked')";	
	}
	



if ($_REQUEST["region"]<>''){

		$region_selected = sqlsrv_real_escape_string($_REQUEST["region"]);
		
		if ( $region_selected == "Central Africa"){
		$region_selected = "region_ca";	
		}
		if ( $region_selected == "East Europe and Central Asia"){
		$region_selected = "region_eeca";	
		}
		if ( $region_selected == "Latin America and Caribbean"){
		$region_selected = "region_lac";	
		}
		if ( $region_selected == "Middle East and North Africa"){
		$region_selected = "region_mena";	
		}
		if ( $region_selected == "South and East Asia"){
		$region_selected = "region_sea";	
		}
		if ( $region_selected == "Southern Africa"){
		$region_selected = "region_sa";	
		}
		if ( $region_selected == "Western Africa"){
		$region_selected = "region_wa";	
		}
		if ( $region_selected == "High Impact Africa I"){
		$region_selected = "impact_africa1";	
		}
		if ( $region_selected == "High Impact Africa II"){
		$region_selected = "impact_africa2";	
		}
		if ( $region_selected == "High Impact Asia"){
		$region_selected = "impact_asia";	
		}
		
		
		
		if ( $region_selected == "david_team"){
		$region_selected = "david_team";	
		}
		if ( $region_selected == "andrew_team"){
		$region_selected = "andrew_team";	
		}
		if ( $region_selected == "sarah_team"){
		$region_selected = "sarah_team";	
		}
		if ( $region_selected == "christopher_team"){
		$region_selected = "christopher_team";	
		}
		
		
		
if ($_REQUEST["category_type"]<>''){	

		$category_type = sqlsrv_real_escape_string($_REQUEST["category_type"]);
		
		if ( $category_type == "Corruption" ){
					
			$sql = "SELECT * FROM allegation_details LEFT JOIN $cmsdb.".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country = ".$region_selected.".country AND (allegation_details.category_type = '$category_type' OR allegation_details.checkbox1 = 'checked')".$type_report.$year.$resolution.$received_via.$referred_from.$source_category.$source_subcategory."";


		}
		if ( $category_type == "Fraud" ){
					
			
			$sql = "SELECT * FROM allegation_details LEFT JOIN $cmsdb.".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country = ".$region_selected.".country AND (allegation_details.category_type = '$category_type' OR allegation_details.checkbox2 = 'checked')".$type_report.$year.$resolution.$received_via.$referred_from.$source_category.$source_subcategory."";
	
	
		}
		if ( $category_type == "Coercion" ){
					
$sql = "SELECT * FROM allegation_details LEFT JOIN $cmsdb.".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country = ".$region_selected.".country AND (allegation_details.category_type = '$category_type' OR allegation_details.checkbox3 = 'checked')".$type_report.$year.$resolution.$received_via.$referred_from.$source_category.$source_subcategory."";
		}
		if ( $category_type == "Collusion" ){
					
			$sql = "SELECT * FROM allegation_details LEFT JOIN $cmsdb.".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country = ".$region_selected.".country AND (allegation_details.category_type = '$category_type' OR allegation_details.checkbox4 = 'checked')".$type_report.$year.$resolution.$received_via.$referred_from.$source_category.$source_subcategory."";
			
		}
		if ( $category_type == "Non-Compliance with laws / Grant agreements" ){
					
			$sql = "SELECT * FROM allegation_details LEFT JOIN $cmsdb.".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country = ".$region_selected.".country AND (allegation_details.category_type = '$category_type' OR allegation_details.checkbox5 = 'checked')".$type_report.$year.$resolution.$received_via.$referred_from.$source_category.$source_subcategory."";
			
		}
		if ( $category_type == "Human Rights Violations" ){
					
			$sql = "SELECT * FROM allegation_details LEFT JOIN $cmsdb.".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country = ".$region_selected.".country AND (allegation_details.category_type = '$category_type' OR allegation_details.checkbox6 = 'checked')".$type_report.$year.$resolution.$received_via.$referred_from.$source_category.$source_subcategory."";
			
		}	
		
		if ( $category_type == "Product Issues (JIATF)" ){
							
			$sql = "SELECT * FROM allegation_details LEFT JOIN $cmsdb.".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country = ".$region_selected.".country AND (allegation_details.category_type = '$category_type' OR allegation_details.checkbox7 = 'checked')".$type_report.$year.$resolution.$received_via.$referred_from.$source_category.$source_subcategory."";
							
		}
        

}else{
	

		
		$sql = "SELECT * FROM allegation_details LEFT JOIN $cmsdb.".$region_selected." ON allegation_details.country = ".$region_selected.".country WHERE allegation_details.country = ".$region_selected.".country ".$type_report.$year.$resolution.$received_via.$referred_from.$source_category.$source_subcategory."";


}


} else{
	
	$sql = "SELECT * FROM allegation_details WHERE id>0".$type_report.$country.$year.$resolution.$search_category_type.$received_via.$referred_from.$source_category.$source_subcategory." ORDER BY id";

}

$sql_result = sqlsrv_query($conncss, $sql);
$all_rows = sqlsrv_fetchall($sql_result);
$hits = count($all_rows)

?>
<table width="100%" align="center" id="entities" class="gridtablefilter">
  <tr>
    <td width="98%" align="right"><strong>Number of allegations found :</strong></td>
    <td width="2%"><font color="#FF0000"><strong><?php echo $hits ?></strong></font></td>
  </tr>
    <tr>
    <td colspan="2" align="right"><a href="export_list.php?sql=<?php echo $sql ?>">Export list</a></td>
  </tr>
 </table>

<div id="entities-contain" align="center">
<table align="center">
        <tr>
          <th>#</th>
          <th>Country</th>
          <th>Title</th>
          <th>Status</th>
          <th>Resolution</th>
          <th>Category type</th>
          <th>Date received</th>
          <th></th>
        </tr>
        <?php
if ($hits>0) {
	
	foreach($all_rows as $row) {
		
		$allegation_id = $row['id'];
		$type_allegation = $row['type_allegation'];
		$country = $row['country'];
		$date_received = $row['date_received'];
		$title = $row['summary'];
		$status = $row['status'];
		$resolution = $row['resolution'];
		$case_number = $row['case_number'];
		$category_type = $row['category_type'];
?>
<tr>
<td><?php echo $allegation_id ;
		if ( $type_allegation == 'Proactive' ){ ?>
		<img src="images/Pro-icon1.png" width="15" height="15" align="top"/>&nbsp;
		<?php
		}

?></td>
<td><?php echo $country ?><br />
<?php 
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
<td><?php echo $status ?>
</td>
<td><?php echo $resolution ;
if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case" || $resolution == "Merge with an existing Allegation"){
echo "<br />";
echo $case_number = $row['case_number'];
	
}
?></td>
<td><?php echo $category_type ?></td>
<td><?php echo $date_received = date('F j, Y', strtotime($date_received)); ?></td>
<td align="right" valign="middle">
<a onclick="return showDialog(<?php echo $allegation_id ?> )">
<img src="images/document-icon-sr.png" width="21" height="21" align="absmiddle" title="Quick view Screening Report"/>
</a></td>
</tr>
<?php
}
?>
  </table>
<?php
}
?>
</div>
 <div id="divIdal" title="Screening Report Details">
	<iframe id="modalIframeIdal" frameborder="0" width="920" height="850">
	</iframe>
    </div>

 
    


    
</body>
</html>
