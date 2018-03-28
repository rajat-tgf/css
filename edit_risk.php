<?php
require_once("includes\security.php");


$risk_id = $_GET['risk_id'];
$result = sqlsrv_query($conncss,"SELECT * from risk_types WHERE id = '$risk_id'"); 
$row = sqlsrv_fetch_array( $result );;


$sccba = $row['sccba'];
$hlcp = $row['hlcp'];
$sacaf = $row['sacaf'];
$crr = $row['crr'];

$category_type = $row['category_type'];
$sub_category_type = $row['sub_category_type'];
$risk_type = $row['risk_type'];
$risk = $row['risk'];
$risk_action = $row['action'];

$department = $row['department'];
$agency = $row['agency'];
$description = $row['description'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Entity Log</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<script>
$(function() {
$( "input[type=submit], button" )
.button()
});
</script>  


<script>

function sccbaoptions(sccba){
	
	var select = document.getElementById("hlcp");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	
	

	
	if (sccba.value!=="Strategy Partnerships Fundraising")
	{ 
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	
	
	}

	if (sccba.value=="Strategy Partnerships Fundraising")
	{ 
	var select = document.getElementById("hlcp");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Corporate Strategy', 'Corporate Strategy');
	select.options[select.options.length] = new Option('Partnerships', 'Partnerships');
	select.options[select.options.length] = new Option('Fundraising', 'Fundraising');
	select.options[select.options.length] = new Option('Allocation', 'Allocation');
	}
	
	if (sccba.value=="Grant Management Activities")
	{ 
	
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	
	var select = document.getElementById("hlcp");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Access to Funding', 'Access to Funding');
	select.options[select.options.length] = new Option('Grant Making', 'Grant Making');
	select.options[select.options.length] = new Option('Programatic & Service quality', 'Programatic & Service quality');
	select.options[select.options.length] = new Option('Data quality and Availability', 'Data quality and Availability');
	select.options[select.options.length] = new Option('Grant Monitoring including LFA', 'Grant Monitoring including LFA');
	select.options[select.options.length] = new Option('Grant Revision', 'Grant Revision');
	select.options[select.options.length] = new Option('Grant Closure', 'Grant Closure');
	select.options[select.options.length] = new Option('Procurement PPM', 'Procurement PPM');
	select.options[select.options.length] = new Option('Supply Chain', 'Supply Chain');
	select.options[select.options.length] = new Option('Grant Financial Management', 'Grant Financial Management');
	select.options[select.options.length] = new Option('Recoveries', 'Recoveries');
	
	}
	if (sccba.value=="Corporate Finance")
	{ 
	var select = document.getElementById("hlcp");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Treasury Management', 'Treasury Management');
	select.options[select.options.length] = new Option('Planning and budgeting', 'Planning and budgeting');
	select.options[select.options.length] = new Option('Monitoring and control', 'Monitoring and control');
	select.options[select.options.length] = new Option('Reporting', 'Reporting');
	}
	if (sccba.value=="Risk Management")
	{ 
	var select = document.getElementById("hlcp");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Identifying', 'Identifying');
	select.options[select.options.length] = new Option('Managing/Mitigating', 'Managing/Mitigating');
	select.options[select.options.length] = new Option('Monitoring', 'Monitoring');
	select.options[select.options.length] = new Option('Risk oversight (Sr Mgt/Board)', 'Risk oversight (Sr Mgt/Board)');
	}
	if (sccba.value=="Corporate Enablers")
	{ 
	var select = document.getElementById("hlcp");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Legal', 'Legal');
	select.options[select.options.length] = new Option('Compliance', 'Compliance');
	select.options[select.options.length] = new Option('HR', 'HR');
	select.options[select.options.length] = new Option('IT', 'IT');
	select.options[select.options.length] = new Option('Business Continuity', 'Business Continuity');
	select.options[select.options.length] = new Option('Support Administration', 'Support Administration');
	select.options[select.options.length] = new Option('Change Management', 'Change Management');
	select.options[select.options.length] = new Option('Ethics', 'Ethics');
	select.options[select.options.length] = new Option('Communications', 'Communications');
	select.options[select.options.length] = new Option('Corporate Procurement', 'Corporate Procurement');
	}
	if (sccba.value=="Governance")
	{ 
	var select = document.getElementById("hlcp");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Governance', 'Governance');
	
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Weak Governance and Oversight', 'Weak Governance and Oversight');
	}
	
}


function hlcpoptions(hlcp){
	
	 
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	
	
	if (hlcp.value=="Corporate Strategy")
	{ 
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Design', 'Design');
	select.options[select.options.length] = new Option('Implementation', 'Implementation');
	select.options[select.options.length] = new Option('Monitoring', 'Monitoring');
	}
	if (hlcp.value=="Programatic & Service quality")
	{ 
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('HIV', 'HIV');
	select.options[select.options.length] = new Option('TB', 'TB');
	select.options[select.options.length] = new Option('Malaria', 'Malaria');
	}
	if (hlcp.value=="Grant Monitoring including LFA")
	{ 
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Quality Control', 'Quality Control');
	select.options[select.options.length] = new Option('Oversight by Secretariat to PR to SR to SSR', 'Oversight by Secretariat to PR to SR to SSR');
	}
	if (hlcp.value=="Procurement PPM")
	{ 
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Quantification', 'Quantification');
	select.options[select.options.length] = new Option('Forecasting', 'Forecasting');
	select.options[select.options.length] = new Option('Purchasing', 'Purchasing');
	}
	if (hlcp.value=="Supply Chain")
	{ 
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Inventory Management', 'Inventory Management');
	select.options[select.options.length] = new Option('Distribution (confirm includes last mile)', 'Distribution (confirm includes last mile)');
	select.options[select.options.length] = new Option('Dispensing', 'Dispensing');
	select.options[select.options.length] = new Option('Warehousing', 'Warehousing');
	select.options[select.options.length] = new Option('Quality Assurance In-Country', 'Quality Assurance In-Country');
	select.options[select.options.length] = new Option('Quality Assurance - Supplier', 'Quality Assurance - Supplier');
	}
	if (hlcp.value=="Grant Financial Management")
	{ 
	var select = document.getElementById("sacaf");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Planning and budgeting', 'Planning and budgeting');
	select.options[select.options.length] = new Option('Monitoring and control', 'Monitoring and control');
	select.options[select.options.length] = new Option('Reporting', 'Reporting');
	}
	
	if (hlcp.value=="Partnerships")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Sustainability and Transition Risk', 'Sustainability and Transition Risk');
	select.options[select.options.length] = new Option('Partnerships', 'Partnerships');
	}
	if (hlcp.value=="Fundraising")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Future Funding/Replenishment (2017-19)', 'Future Funding/Replenishment (2017-19)');
	}
	if (hlcp.value=="Access to Funding")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Sustainability and Transition Risk', 'Sustainability and Transition Risk');
	select.options[select.options.length] = new Option('Resilient and Sustainable Systems for Health (RSSH)', 'Resilient and Sustainable Systems for Health (RSSH)');
	select.options[select.options.length] = new Option('Human Rights and Gender Inequality', 'Human Rights and Gender Inequality');
	}
	if (hlcp.value=="Grant Making")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Human Rights and Gender Inequality', 'Human Rights and Gender Inequality');
	select.options[select.options.length] = new Option('Value for Money/Cost-Effectiveness', 'Value for Money/Cost-Effectiveness');
	}
	if (hlcp.value=="Data quality and Availability")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Strategic Data Quality and Availability', 'Strategic Data Quality and Availability');
	}
	if (hlcp.value=="Treasury Management")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Foreign Exchange Risk', 'Foreign Exchange Risk');
	}
	if (hlcp.value=="Planning and budgeting")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Value for Money/Cost-Effectiveness', 'Value for Money/Cost-Effectiveness');
	}
	if (hlcp.value=="Managing/Mitigating")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Risk Management Framework not fully adopted and operationalized evidenced by gaps/weaknesses', 'Risk Management Framework not fully adopted and operationalized evidenced by gaps/weaknesses');
	}
	if (hlcp.value=="Legal")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Privileges and Immunities', 'Privileges and Immunities');
	}
	if (hlcp.value=="HR")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Staff Health', 'Staff Health');
	}
	if (hlcp.value=="IT")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('IT Risks', 'IT Risks');
	}
	if (hlcp.value=="Business Continuity")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('IT Risks', 'IT Risks');
	select.options[select.options.length] = new Option('Privileges and Immunities', 'Privileges and Immunities');
	}
	if (hlcp.value=="Change Management")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('New Projects/Initiatives', 'New Projects/Initiatives');
	}
	if (hlcp.value=="Ethics")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Ethical Misconduct', 'Ethical Misconduct');
	}
	if (hlcp.value=="Governance")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Weak Governance and Oversight', 'Weak Governance and Oversight');
	}
}

function sacafoptions(sacaf){
	
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	
	
	if (sacaf.value=="Design")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Sustainability and Transition Risk', 'Sustainability and Transition Risk');
	select.options[select.options.length] = new Option('Resilient and Sustainable Systems for Health (RSSH)', 'Resilient and Sustainable Systems for Health (RSSH)');
	select.options[select.options.length] = new Option('Human Rights and Gender Inequality', 'Human Rights and Gender Inequality');
	select.options[select.options.length] = new Option('New Strategy Implementation and Allocation Model', 'New Strategy Implementation and Allocation Model');
	}
	if (sacaf.value=="Implementation")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('New Strategy Implementation and Allocation Model', 'New Strategy Implementation and Allocation Model');
	}
	if (sacaf.value=="Monitoring")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Impact/Mission Risk', 'Impact/Mission Risk');
	}
	if (sacaf.value=="Grant Monitoring including LFA")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Poor Quality of Programs/Services', 'Poor Quality of Programs/Services');
	select.options[select.options.length] = new Option('Low Absorption (use of funds)', 'Low Absorption (use of funds)');
	select.options[select.options.length] = new Option('Poor Grant Oversight & Compliance (at PR level)', 'Poor Grant Oversight & Compliance (at PR level)');
	}
	if (sacaf.value=="Oversight by Secretariat to PR to SR to SSR")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Poor Quality of Programs/Services', 'Poor Quality of Programs/Services');
	select.options[select.options.length] = new Option('Low Absorption (use of funds)', 'Low Absorption (use of funds)');
	select.options[select.options.length] = new Option('Weak Governance and Oversight', 'Weak Governance and Oversight');
	}
	if (sacaf.value=="Quantification")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Value for Money/Cost-Effectiveness', 'Value for Money/Cost-Effectiveness');
	}
	if (sacaf.value=="Quality Assurance In-Country")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Value for Money/Cost-Effectiveness', 'Value for Money/Cost-Effectiveness');
	select.options[select.options.length] = new Option('Substandard Quality of Health Products', 'Substandard Quality of Health Products');
	}
	if (sacaf.value=="Quality Assurance - Supplier")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('New Strategy Implementation and Allocation Model', 'New Strategy Implementation and Allocation Model');
	select.options[select.options.length] = new Option('Substandard Quality of Health Products', 'Substandard Quality of Health Products');
	}
	if (sacaf.value=="Reporting")
	{ 
	var select = document.getElementById("crr");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Poor Financial Reporting by Countries', 'Poor Financial Reporting by Countries');
	}
}




function ppfoptions(ppf){
	if (category_type.value=="")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	}
	
	if (category_type.value=="Corrupt Practices")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Bribery', 'Bribery');
	select.options[select.options.length] = new Option('Kickbacks', 'Kickbacks');
	select.options[select.options.length] = new Option('Facilitation payments', 'Facilitation payments');
	}
	if (category_type.value=="Fraudulent Practices")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Misrepresentation', 'Misrepresentation');
	select.options[select.options.length] = new Option('Counterfeit', 'Counterfeit');
	select.options[select.options.length] = new Option('Falsified', 'Falsified');
	select.options[select.options.length] = new Option('Substitution', 'Substitution');
	select.options[select.options.length] = new Option('Manipulation - data and documents', 'Manipulation - data and documents');
	}
	if (category_type.value=="Coercive Practices")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Impair or harm an individual or organisation', 'Impair or harm an individual or organisation');
	select.options[select.options.length] = new Option('Threats to impair harm an individual or organisation', 'Threats to impair harm an individual or organisation');
	}
	if (category_type.value=="Collusive Practices")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Limiting Competition', 'Limiting Competition');
	select.options[select.options.length] = new Option('Price Fixing', 'Price Fixing');
	select.options[select.options.length] = new Option('Conflict of Interest', 'Conflict of Interest');
	select.options[select.options.length] = new Option('Other', 'Other');
	}
	if (category_type.value=="Abusive Practices")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Theft', 'Theft');
	select.options[select.options.length] = new Option('Misappropriation', 'Misappropriation');
	select.options[select.options.length] = new Option('Embezzlement', 'Embezzlement');
	select.options[select.options.length] = new Option('Waste', 'Waste');
	select.options[select.options.length] = new Option('Product Diversion', 'Product Diversion');
	}
	if (category_type.value=="Obstructive Practices")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Destroying, falsifying, altering or concealing evidence material to an inquiry by the Global Fund, or making false statements in order to impede a Global Fund inquiry into allegations of Prohibited Practices', 'Destroying, falsifying, altering or concealing evidence material to an inquiry by the Global Fund, or making false statements in order to impede a Global Fund inquiry into allegations of Prohibited Practices');
	select.options[select.options.length] = new Option('Threatening, harassing or intimidating any party to prevent it from disclosing, or as retaliation for disclosing, its knowledge of matters relevant to a Global Fund inquiry or from pursuing the inquiry', 'Threatening, harassing or intimidating any party to prevent it from disclosing, or as retaliation for disclosing, its knowledge of matters relevant to a Global Fund inquiry or from pursuing the inquiry');
	select.options[select.options.length] = new Option('Failing to comply with the duty to report as defined in the Whistleblowing Policy, in a timely manner', 'Failing to comply with the duty to report as defined in the Whistleblowing Policy, in a timely manner');
	select.options[select.options.length] = new Option('Engaging in acts which impede the exercise of the Global Fund’s access rights, including the access rights', 'Engaging in acts which impede the exercise of the Global Fund’s access rights, including the access rights');
	}
	if (category_type.value=="Retaliation")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Intentional discrimination', 'Intentional discrimination');
	select.options[select.options.length] = new Option('Reprisal', 'Reprisal');
	select.options[select.options.length] = new Option('Harassment', 'Harassment');
	}
	if (category_type.value=="Money Laundering")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Conversion or transfer of property/assets from criminal activity, or helping any person who is involved in such activities evade the legal consequences of their actions', 'Conversion or transfer of property/assets from criminal activity, or helping any person who is involved in such activities evade the legal consequences of their actions');
	select.options[select.options.length] = new Option('Concealing or disguising the illicit origin, source, location, disposition, movement or ownership of property when that such property is derived from criminal activity', 'Concealing or disguising the illicit origin, source, location, disposition, movement or ownership of property when that such property is derived from criminal activity');
	select.options[select.options.length] = new Option('Acquisition, possession or use of property when such property is derived from criminal activity', 'Acquisition, possession or use of property when such property is derived from criminal activity');
	}
	if (category_type.value=="Financing of Terrorism")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Direct/Indirect provision or collection of funds to carry out acts of terrorism', 'Direct/Indirect provision or collection of funds to carry out acts of terrorism');
	}
	if (category_type.value=="Human Rights Violations")
	{ 
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Discriminatory denial of access to GF supported services', 'Discriminatory denial of access to GF supported services');
	select.options[select.options.length] = new Option('Use of unproven medical practices', 'Use of unproven medical practices');
	select.options[select.options.length] = new Option('Torture, cruel, inhuman or degrading treatment', 'Torture, cruel, inhuman or degrading treatment');
	select.options[select.options.length] = new Option('Testing treatment or health services without informed consent', 'Testing treatment or health services without informed consent');
	select.options[select.options.length] = new Option('Violations of medical confidentiality or right to privacy', 'Violations of medical confidentiality or right to privacy');
	select.options[select.options.length] = new Option('Involuntary medical detention/isolation', 'Involuntary medical detention/isolation');
	}
}

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

</script>

</head>
<body>

<form action="save_risk_type_modifications.php?risk_id=<?php echo $risk_id ?>" id="editrisktype" name="editrisktype" method="post">
<div id="notes-contain">
<table width="100%">
<tr>
<td>
  
  <fieldset>
    <legend>Focus</legend>
  <table>
  <tr>
  <td><strong>Scheme category / Core Business Activities :</strong>
  <select name="sccba" id="sccba" onChange="sccbaoptions(this)" class="text ui-widget-content ui-corner-all">
  <option><?php echo $sccba; ?></option>
    <option></option>
    <option value="Strategy Partnerships Fundraising">Strategy Partnerships Fundraising</option>
    <option value="Grant Management Activities">Grant Management Activities</option>
    <option value="Corporate Finance">Corporate Finance</option>
    <option value="Risk Management">Risk Management</option>
    <option value="Corporate Enablers">Corporate Enablers</option>
    <option value="Governance">Governance</option>
  </select>
  </td>
  </tr>
  <tr>
  <td><strong>High level Corporate Process :</strong>
  <select name="hlcp" id="hlcp" onChange="hlcpoptions(this)" class="text ui-widget-content ui-corner-all">
  <option><?php echo $hlcp; ?></option>
    <option></option>
  </select>
  </td>
  </tr>
  <tr>
  <td><strong>Sub-Activity / Corporate Activity Focus :</strong>
  <select name="sacaf" id="sacaf" onChange="sacafoptions(this)" class="text ui-widget-content ui-corner-all">
  <option><?php echo $sacaf; ?></option>
    <option></option>
  </select>
  </td>
  </tr>
    
  <tr>
  <td><strong>Corporate Risk Register :</strong>
  <select name="crr" id="crr" class="text ui-widget-content ui-corner-all">
  <option><?php echo $crr; ?></option>
    <option></option>
  </select>
  <a onclick="parent.show_crr_Popup()">
  <img src="images/question.jpg" width="28" height="28" align="absmiddle" />
  </a>
  </td>
  </tr>
  </table>
  </fieldset>
  
  <fieldset>
    <legend>Prohibative Practice</legend>
  <table>
  <tr>
  <td><strong>Category :</strong>
  <select name="category_type" id="category_type" onChange="ppfoptions(this)" class="text ui-widget-content ui-corner-all">
  <option><?php echo $category_type; ?></option>
    <option></option>
    <option value="Corrupt Practices">Corrupt Practices</option>
    <option value="Fraudulent Practices">Fraudulent Practices</option>
    <option value="Coercive Practices">Coercive Practices</option>
    <option value="Collusive Practices">Collusive Practices</option>
    <option value="Abusive Practices">Abusive Practices</option>
    <option value="Obstructive Practices">Obstructive Practices</option>
    <option value="Retaliation">Retaliation</option>
    <option value="Money Laundering">Money Laundering</option>
    <option value="Financing of Terrorism">Financing of Terrorism</option>
    <option value="Human Rights Violations">Human Rights Violations</option>
  </select>
  <a href="#" onClick="parent.show_pp_guide()"><img src="images/question.jpg" width="28" height="28" align="absmiddle" /></a>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td colspan="2"><strong>Sub-Category :</strong>
  <select name="sub_category_type" id="sub_category_type" class="text ui-widget-content ui-corner-all">
  <option><?php echo $sub_category_type; ?></option>
    <option></option>
  </select>
  </td>
  </tr>
  </table>
  </fieldset>
  
  
  
  <fieldset>
    <legend>QUART</legend>
  <table>
  <tr>    
  <td width="38%" valign="top"><strong>Risk Type :</strong>
  <select name="risk_type" id="risk_type" onChange="riskoptions(this)" class="text ui-widget-content ui-corner-all">
  <option><?php echo $risk_type; ?></option>
      <option></option>
      <option value="Programmatic &amp; Performance Risks">Programmatic &amp; Performance Risks</option>
      <option value="Financial &amp; Fiduciary Risks">Financial &amp; Fiduciary Risks</option>
      <option value="Health Services &amp; Products Risks">Health Services &amp; Products Risks</option>
      <option value="Governance, Oversight &amp; Management Risks">Governance, Oversight &amp; Management Risks</option>
      <option>Other</option>
      </select> <a href="#" onClick="parent.show_quart_guide()"><img src="images/question.jpg" width="35" height="35" align="absmiddle" /></a>
      </td>
      <td width="62%" valign="top"><strong>Risk :</strong>
      <select name="risk" id="risk" class="text ui-widget-content ui-corner-all">
      <option><?php echo $risk; ?></option>
        <option></option>
        </select></td>
      </tr>
    </table>
  </fieldset>
</td>
</tr>
</table>

<table>
<tr>
  <td width="28%">
<strong>Action :</strong>
    <select name="risk_action" id="risk_action" class="text ui-widget-content ui-corner-all">
    <option><?php echo $risk_action; ?></option>
      <option></option>
      <option value="Refer to Investigation">Refer to Investigation</option>
      <option value="Refer to Secretariat for Information">Refer to Secretariat for Information</option>
      <option value="Refer to Secretariat for Action">Refer to Secretariat for Action</option>
      <option value="Refer to Audit">Refer to Audit</option>
      <option value="Refer to External agency">Refer to External agency</option>
      <option value="Information">Information</option>
      <option value="No further action">No further action</option>
    </select>
      </td>
        <td width="24%">
	<strong>Department :</strong>
    <select name="department" id="department" class="text ui-widget-content ui-corner-all">
    <option><?php echo $department; ?></option>
      <option></option>
      <option>Risk</option>
      <option>Ethics</option>
      <option>Human Resources</option>
      <option>Country Team</option>
    </select>
      </td>
      <td width="48%">
	<strong>Agency :</strong>
    <select name="agency" id="agency" class="text ui-widget-content ui-corner-all">
    <option><?php echo $agency; ?></option>
      <option></option>
      <option>UNDP</option>
      <option>USAID</option>
      <option>UNICEF</option>
      <option>UNOPS</option>
      <option>Other</option>
    </select>
      </td>
    </tr>
<tr>
<td colspan="3"><strong>Details :</strong></td></tr>
 
  
<tr>
  <td colspan="3">
   <textarea name="description" id="description" style="width:98%" rows="20" class="text ui-widget-content ui-corner-all"><?php echo $description ?></textarea>
 </td>
  </tr>
</table>

  </fieldset>
  
  
  
</td>

</tr>

</table>      
     </div>
     <table align="right">
     <tr>
            <td colspan="2">
            <button TYPE = "Submit" Name = "Submit" VALUE = "Save">Save modifications</button>
            </td>
            </tr>          
     </table>
     
</form>

</body>
</html>