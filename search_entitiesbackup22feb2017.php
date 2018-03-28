<?php
require_once("includes\security.php");
$Security->GoSecure();

$username = $_SESSION['username'];
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
        
    
        <script type="text/javascript" src="src/js/filemenu.min.js"></script>

<script>
	$(function() {
	$( "#tabs" ).tabs();
	$( "input[type=submit], button" )
	.button()
	});
</script>  



<SCRIPT LANGUAGE="JavaScript">

	function showDialog1(entity_id){
		
	
	   $("#divIden").dialog("open");
	   $("#modalIframeIden").attr("src","info_entity_details.php?entity_id=" + entity_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIden").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
			   autoOpen: false,
			   modal: true,
			   height: 1100,
			   width: 1220,
			   resizable: false,
			   draggable: false,
		  });
		  
		  
});

	function showDialog(allegation_id){
		
	
	   $("#divIdal").dialog("open");
	   $("#modalIframeIdal").attr("src","details_sr.php?allegation_id=" + allegation_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdal").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 940,
			   resizable: false,
			   draggable: false,
			   

		  });
	});
	
	
	
	function showDialogir(report_id){
		
	
	   $("#divIdcheck").dialog("open");
	   $("#modalIframeIdfcheck").attr("src","intelligence_report_details.php?id_report=" + report_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdcheck").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 900,
			   width: 1170,
			   resizable: false,
			   draggable: false,
			   
		  });
	});
	
	

	function showDialogcase(ref_number){
		
	
	   $("#divIdcase").dialog("open");
	   $("#modalIframeIdcase").attr("src","cases_details_search.php?ref_number=" + ref_number);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdcase").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
			   autoOpen: false,
			   modal: true,
			   height: 925,
			   width: 1000,
			   resizable: false,
			   draggable: false,
			   
		  });
	});

function frmSubmit() {
document.supportform.submit();
}
</script>


<style type="text/css">


.tabs-menu {
    height: 80px;
	overflow-y: scroll;

}

</style>

<style>
.detailblock {
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
	color:#5C5C5C;
	margin: 2px 2px 2px 30px;
}

.highlight_word {
	color:#B00
}

</style>  

<style>
	div#entities-table { width: 100%; margin: 0px 0; }
	div#entities-table table { margin: 1em 0; border-collapse: collapse; font-family: 'century gothic', arial, sans-serif; width:97% }
	div#entities-table table td { font-size:12px; border: 1px solid #DBE5F1; padding:5px; text-align: left; background-color:#F2F2F2 }
	div#entities-table table th { font-size:13px; border: 1px solid #DBE5F1; padding: 0.4em; text-align: left; background:#99A4AE; color:#FFF }
</style>


<style>
	div#entities-table1 { width: 100%; margin: 0px 0; }
	div#entities-table1 table { margin: 1px 0; border-collapse: collapse; font-family: 'century gothic', arial, sans-serif; width:97% }
	div#entities-table1 table td { font-size:12px; border: 0px solid #DBE5F1; padding:1px; text-align: left; }
	div#entities-table1 table th { font-size:13px; border: 0px solid #DBE5F1; padding: 1px; text-align: left; background:#CCC; }
</style>

<style>
	div#entities-table2 { width: 100%; margin: 0px 0; }
	div#entities-table2 table { margin: 1px 0; border-collapse: collapse; font-family: 'century gothic', arial, sans-serif; color:#000000; width:97% }
	div#entities-table2 table td { font-size:12px; border: 1px solid #DBE5F1; padding:1px; text-align: left; color:#000000; }
	div#entities-table2 table th { font-size:12px; border: 1px solid #DBE5F1; padding:1px; text-align: left; color:#000000; background:#DBE5F1; }
</style>

<script type="text/javascript">
	$(function() {
	$( "input[type=submit], button" )
	.button()
	});

	$(document).ready(function() {
		$('#menu').fileMenu({
			slideSpeed: 500
		});
	   $("#divIdinv").dialog({
			   autoOpen: false,
			   position: ['top', 5],
			   modal: true,
			   height: 850,
				width: 1165,
			   resizable: false,
			   draggable: false,
			   

		  });
	   $("#divIdccm").dialog({
			   autoOpen: false,
			   position: ['top', 5],
			   modal: true,
			   height: 850,
				width: 1165,
			   resizable: false,
			   draggable: false,
			   

		  });
	   $("#divIdcase").dialog({
			   autoOpen: false,
			   modal: true,
			   position: ['top', 5],
			   height: 925,
			   width: 1040,
			   resizable: false,
			   draggable: false,
			   
		  });

		$('#searchinput').on('input', onDynamicSearch);
		$('#submitbutton').on('click', dynamicSearch);
		$('#fuzzySearch').on('change', onDynamicSearch);
		
		$('#csssearch').on('change', onDynamicSearch);
		$('#cmssearch').on('change', onDynamicSearch);
		
		$('#searchinput').focus();
	});
	
	function displayFragement(element, entity_id, source, query, subindex)
	{
		var anchor = $(element);
		var subdiv = anchor.parent().parent().parent().next();
		if (subdiv.text().length > 0)
		{
			anchor.first().html('more...');
			subdiv.html('');
		}
		else
		{
			anchor.first().html('hide...');
			searchrequest = {query: query, fragment: source, entity_id: entity_id, subindex: subindex};
			subdiv.load("search_fragment.php", searchrequest);
		}
	}

	function onDynamicSearch()
	{
		clearTimeout($.data(this, 'timer'));
		var searchstring = $('#searchinput').val();
		if (searchstring.length > 0)
		{
			$(this).data('timer', setTimeout(dynamicSearch, 350));
		}
		else
		{
			$('#results').fadeOut();
			$('#results').html("");
		}
	}
	
	function dynamicSearch()
	{
		clearTimeout($.data(this, 'timer'));
		$('#results').fadeOut();
		var searchstring = $('#searchinput').val();
		var isfuzzy = $('#fuzzySearch').prop('checked');
		
		var iscsssearch = $('#csssearch').prop('checked');
		var iscmssearch = $('#cmssearch').prop('checked');
		
		searchrequest = {query: searchstring, fuzzy: isfuzzy, iscsssearch: iscsssearch, iscmssearch: iscmssearch};
		$('#results').load("search_results.php", searchrequest, function () {
			
		$('#results').fadeIn();
		});
	}
</script>



</head>
<body>
<?php include("menu_list.php"); ?>
<br />
<br />

<form onsubmit="return false;">
    <table align="center" class="gridtable">
    <tr><td valign="bottom">
    </td>
    <td width="336" align="left" valign="middle">
    <input id="searchinput" type="text" style="width: 310px" placeholder="Search here?" name="query" class="text ui-widget-content ui-corner-all">
    </td>
    <td width="92" align="left" valign="middle">
    <input id="submitbutton" type = "submit" name = "submit" value = "Search" class="text ui-widget-content ui-corner-all" />
    </td>
    <td width="184" align="left" valign="middle"><p>
      <input type="checkbox" id="fuzzySearch" name="fuzzy" checked="checked" />
      Perform a Fuzzy </p></td>
    </tr>
    </table>
</form>

<div id="results"></div>

</body>
    

</html>