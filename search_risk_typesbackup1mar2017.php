<?php

require_once("includes\security.php");
$Security->GoSecure();
error_reporting(0);

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
	
	
	
	function riskoptions(risk_type){
	
	if (risk_type.value=="Programmatic & Performance Risks")
	{ 
	
	var select = document.getElementById("risk");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Limited Program Relevance', 'Limited Program Relevance');
	select.options[select.options.length] = new Option('Inadequate M&E and poor data quality', 'Inadequate M&E and poor data quality');
	select.options[select.options.length] = new Option('Not achieving grant output targets', 'Not achieving grant output targets');
	select.options[select.options.length] = new Option('Not achieving program outcome & impact targets', 'Not achieving program outcome & impact targets');
	select.options[select.options.length] = new Option('Poor aid effectiveness and sustainability', 'Poor aid effectiveness and sustainability');
	}
	
	if (risk_type.value=="Financial & Fiduciary Risks")
	{ 

	var select = document.getElementById("risk");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Low absorption or over-commitment', 'Low absorption or over-commitment');
	select.options[select.options.length] = new Option('Poor Financial Efficiency', 'Poor Financial Efficiency');
	select.options[select.options.length] = new Option('Fraud, Corruption, or Theft of Funds', 'Fraud, Corruption, or Theft of Funds');
	select.options[select.options.length] = new Option('Theft or Diversion of Non-financial Assets', 'Theft or Diversion of Non-financial Assets');
	select.options[select.options.length] = new Option('Market and Macroeconomic Losses', 'Market and Macroeconomic Losses');
	select.options[select.options.length] = new Option('Poor Financial Reporting', 'Poor Financial Reporting');
	}
	
	if (risk_type.value=="Health Services & Products Risks")
	{ 

	var select = document.getElementById("risk");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Treatment Disruptions', 'Treatment Disruptions');
	select.options[select.options.length] = new Option('Substandard Quality of Health Products', 'Substandard Quality of Health Products');
	select.options[select.options.length] = new Option('Poor Quality of Health Services', 'Poor Quality of Health Services');
	select.options[select.options.length] = new Option('Poor Access and Promotion of Equity and Human Rights', 'Poor Access and Promotion of Equity and Human Rights');
	}
	
	if (risk_type.value=="Governance, Oversight & Management Risks")
	{ 

	var select = document.getElementById("risk");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Inadequate CCM Governance & Oversight', 'Inadequate CCM Governance & Oversight');
	select.options[select.options.length] = new Option('Inadequate PR Governance & Oversight', 'Inadequate PR Governance & Oversight');
	select.options[select.options.length] = new Option('Inadequate PR Reporting & Compliance', 'Inadequate PR Reporting & Compliance');
	select.options[select.options.length] = new Option('Inadequate Secretariat and LFA Management & Oversight', 'Inadequate Secretariat and LFA Management & Oversight');
	
	}
	if (risk_type.value=="Other")
	{ 

	var select = document.getElementById("risk");
	select.options.length = 0;
	select.options[select.options.length] = new Option('Other', 'Other');
	}
	}
	
function reportingoptions(category_type){
	
	if (category_type.value=="Corruption")
	{ 
	
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Bribery', 'Bribery');
	select.options[select.options.length] = new Option('Facilitation Payments', 'Facilitation Payments');
	select.options[select.options.length] = new Option('Inappropriate Gratuities', 'Inappropriate Gratuities');
	
	}
	
	if (category_type.value=="Fraud")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Accounting fraud', 'Accounting fraud');
	select.options[select.options.length] = new Option('Misrepresentation of information', 'Misrepresentation of information');
	select.options[select.options.length] = new Option('Theft / Diversion of misappropriation of funds, or other assets', 'Theft / Diversion of misappropriation of funds, or other assets');
	}
	
	if (category_type.value=="Coercion")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Assault', 'Assault');
	select.options[select.options.length] = new Option('Intimidation / Threats', 'Intimidation / Threats');
	}
	
	if (category_type.value=="Collusion")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Bidding / Tender irregularities', 'Bidding / Tender irregularities');
	select.options[select.options.length] = new Option('Conflict of Interest', 'Conflict of Interest');
	select.options[select.options.length] = new Option('Other', 'Other');
	}
	
	if (category_type.value=="Non-Compliance with laws / Grant agreements")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Obstruction', 'Obstruction');
	select.options[select.options.length] = new Option('Other', 'Other');
	}
	
	if (category_type.value=="Human Rights Violations")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Discriminatory denial of access to GF supported services', 'Discriminatory denial of access to GF supported services');
	select.options[select.options.length] = new Option('Use of unproven medical practices', 'Use of unproven medical practices');
	select.options[select.options.length] = new Option('Testing, treatment or health services without informed consent', 'Testing, treatment or health services without informed consent');
	select.options[select.options.length] = new Option('Torture, cruel, inhuman or degrading treatment', 'Torture, cruel, inhuman or degrading treatment');
	select.options[select.options.length] = new Option('Violations of medical confidentiality or right to privacy', 'Violations of medical confidentiality or right to privacy');
	select.options[select.options.length] = new Option('Involuntary medical detention/isolation', 'Involuntary medical detention/isolation');
	}
	
	if (category_type.value=="Product Issues (JIATF)")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Diversion', 'Diversion');
	select.options[select.options.length] = new Option('Counterfeit', 'Counterfeit');
	select.options[select.options.length] = new Option('Theft', 'Theft');
	select.options[select.options.length] = new Option('Faulty Product', 'Faulty Product');
	select.options[select.options.length] = new Option('Expired Drugs', 'Expired Drugs');
	}
	
	
	}		
	
</script>      
</head>
<body>

<?php

if ($_REQUEST["risk_type"]<>''){
	$risk_type = " AND risk_types.risk_type = '".sqlsrv_real_escape_string($_REQUEST["risk_type"])."'";	
}

if ($_REQUEST["risk"]<>''){
	$risk = " AND risk_types.risk = '".sqlsrv_real_escape_string($_REQUEST["risk"])."'";	
}

if ($_REQUEST["category_type"]<>''){
	$category_type = " AND risk_types.category_type = '".sqlsrv_real_escape_string($_REQUEST["category_type"])."'";	
}

if ($_REQUEST["sub_category_type"]<>''){
	$sub_category_type = " AND risk_types.sub_category_type = '".sqlsrv_real_escape_string($_REQUEST["sub_category_type"])."'";	
}

if ($_REQUEST["country"]<>''){
	$country = " AND country = '".sqlsrv_real_escape_string($_REQUEST["country"])."'";	
}

if ($_REQUEST["action"]<>''){
	$action = " AND action = '".sqlsrv_real_escape_string($_REQUEST["action"])."'";	
}


$sql_query = "SELECT * FROM allegation_details LEFT JOIN risk_types ON allegation_details.id = risk_types.allegation_id WHERE allegation_details.id = risk_types.allegation_id".$risk_type.$country.$risk.$category_type.$sub_category_type.$action." ORDER BY risk_types.id ASC";
$sql_result = sqlsrv_query($conncss, $sql_query, array(), array( "Scrollable" => 'buffered'));
$all_rows = sqlsrv_fetchall($sql_result);
$num_hits = count($all_rows);


include ("menu_list.php");
?>
<br />



<form id="form1" name="form1" method="post" action="search_risk_types.php">

<table width="100%" class="gridtablefilter">

<tr valign="middle">
  <td width="11%" align="right"><strong>Risk Type</strong> <strong>:</strong></td>
  <td width="24%" align="left">
    <select name="risk_type" id="risk_type" onChange="riskoptions(this)" class="text ui-widget-content ui-corner-all">
      <option></option>
      <option value="Programmatic &amp; Performance Risks">Programmatic &amp; Performance Risks</option>
      <option value="Financial &amp; Fiduciary Risks">Financial &amp; Fiduciary Risks</option>
      <option value="Health Services &amp; Products Risks">Health Services &amp; Products Risks</option>
      <option value="Governance, Oversight &amp; Management Risks">Governance, Oversight &amp; Management Risks</option>
      <option>Other</option>
      </select>
  </td>
  <td width="7%" align="right"><strong>Country :</strong></td>
  <td width="24%" align="left">
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
  
  <td width="27%" align="center">
  <button type = "submit" name = "Submit" value = "Filter">Filter</button>
    <button type = "submit" name = "Submit" value = "All" onclick="window.location.href='list_checks.php'">Show all</button>
  </td>
  <td width="7%" align="right">&nbsp;</td>
  
</tr>
<tr valign="middle">
  <td align="right"><strong>Risk</strong> <strong>:</strong></td>
  <td align="left"><select name="risk" id="risk" class="text ui-widget-content ui-corner-all">
    <option></option>
  </select></td>
  <td align="right"><strong>Action :</strong></td>
  <td align="left">
  
  <select name="action" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
      <?php
	$sql = sqlsrv_query($conncss,"SELECT distinct action FROM risk_types ORDER BY action");
	$all_action = sqlsrv_fetchall($sql);      
	foreach ($all_action as $row) {
		echo "<option>".$row["action"]."</option>";
	}
	?>
  </select>
  
  </td>
  <td align="center">&nbsp;</td>
  <td align="right">&nbsp;</td>
</tr>
<tr valign="middle">
  <td align="right"><strong>Category:</strong></td>
  <td align="left">
    <select name="category_type" id="category_type" onChange="reportingoptions(this)" class="text ui-widget-content ui-corner-all">
        <option></option>
        <option value="Corruption">Corruption</option>
        <option value="Fraud">Fraud</option>
        <option value="Coercion">Coercion</option>
        <option value="Collusion">Collusion</option>
        <option value="Non-Compliance with laws / Grant agreements">Non-Compliance with laws / Grant agreements</option>
        <option value="Human Rights Violations">Human Rights Violations</option>
        <option value="Product Issues (JIATF)">Product Issues (JIATF)</option>
        <option>N/A</option>
    </select>
  </td>
  <td align="right">&nbsp;</td>
  <td align="left">&nbsp;</td>
  <td align="center">&nbsp;</td>
  <td align="right">&nbsp;</td>
</tr>
<tr valign="middle">
  <td align="right"><strong>Sub-category</strong> <strong>:</strong></td>
  <td align="left">
  <select name="sub_category_type" id="sub_category_type" class="text ui-widget-content ui-corner-all">
     <option></option>
  </select>
  </td>
  <td align="right">&nbsp;</td>
  <td align="left">&nbsp;</td>
  <td align="center">&nbsp;</td>
  <td align="right">&nbsp;</td>
</tr>

</table>
</form>


<table width="100%" align="center" id="entities" class="gridtablefilter">
  <tr>
    <td width="98%" align="right"><strong>Number of risks found :</strong></td>
    <td width="2%"><font color="#FF0000"><strong><?php echo $num_hits ?></strong></font></td>
  </tr>

 </table>



<p>
  <?php
if ( $num_hits == 0 ){
	echo "<font color='#666666'>";
	echo "No results found";
	echo "</font>";
	
}else{
	
?>
</p>
<div id="entities-contain" align="center">
  <table >
                <tr>
                  <th>Id</th>
                  <th>Country</th>
                  <th align="center">Risk Type</th>
                  <th align="center"><strong>Risk</strong></th>
                  <th><strong>Category</strong></th>
                  <th><strong>Sub-category</strong></th>
                  <th><strong>Action</strong></th>
                </tr>
                <?php
					if ($num_hits>0) {
					foreach($all_rows as $row) {
						$allegation_id = $row['allegation_id'];
				  	  ?>
						 <tr>
	                         <td>
							<?php echo $allegation_id = $row['allegation_id']; ?>
							</td>
                             <td>
							<?php echo $country = $row['country']; ?>
							</td>
	                         <td align="left"><?php 
							 
							 echo $risk_type = $row['risk_type']; 
							 
							 ?></td>
							<td align="center">
                            
                            <?php echo $risk = $row['risk']; ?>

							</td>
                            <td align="center">
                            <?php echo $category_type = $row['category_type']; ?>
							</td>
                            <td align="center">
                            <?php echo $sub_category_type = $row['sub_category_type']; ?>
							</td>
                            <td align="center">
                            <?php echo $action = $row['action']; ?>
							</td>
            </tr>

						<?php }}?>
</table>  
</div> 
<?php } ?>

    </body>
</html>
