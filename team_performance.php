<?php
require_once("includes\security.php");
$Security->GoSecure();
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
$( "input[type=submit], button" )
.button()
});

$(function() {
	$( "#tabs" ).tabs();
});
</script>      
       

<SCRIPT LANGUAGE="JavaScript">

function info_follow_up_details(id_follow_up) 
{
		var windowW=950
		var windowH=780
		var windowX = 100
		var windowY = 130
		var url = "info_follow_up_details.php?id_follow_up=" + id_follow_up;

		s = "scrollbars=no"+",width="+windowW+",height="+windowH;

		blwindow = window.open(url,"Popup",","+s);
		windowX = (screen.width) ? (screen.width-windowW)/2 : 0;
		windowY = (screen.height) ? (screen.height-windowH)/2 : 0;
		blwindow.focus();
		blwindow.resizeTo(windowW,windowH);
		blwindow.moveTo(windowX,windowY);
}
</script>
<style>
	body { font-size: 65.5%; }
	div#entities-contain { width: 1450px; margin: 10px 0; }
	div#entities-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; alignment-adjust:central; font-size:14px }
	div#entities-contain table td { border: 1px solid #DBE5F1; padding: .3em 10px; text-align: left;font-size:14px }
	div#entities-contain table th { border: 1px solid #DBE5F1; padding: .3em 10px; text-align: center; background:#F2F2F2; font-style:normal; color:#666666;font-size:14px }
hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }
</style>

<style type="text/css">
table.gridtable {
font-family: Georgia, "Times New Roman", Times, serif;
font-size:14px;
color:#EFEFEF;

}
table.gridtable th {
font-size:14px;
border-width: 1px;
padding: 2px;
border-style: solid;
border-color: #000000;
background-color: #EDEDED;
border:2px;

}
table.gridtable td {
font-size:14px;
border-width: 1px;
color:#666666;
padding: 2px;
border-color: #EDEDED;
border-spacing:2px;
border:2px;

}

</style>

<script type="text/javascript">

	function showDialog(sr){
		parent.show_sr_Popup(sr);
	};
</script>




</head>
<body>

<br />

<div id="tabs">
<ul>
<li><a href="#tabs-1">2017</a></li>
<li><a href="#tabs-2">2016</a></li>
</ul>


<div id="tabs-1">
<table width="100%">
    <tr>
    <td valign="top" width="17%">
        <iframe name="side_menu" src="side_menu_search_2017.php" width="100%" height="700" frameborder="0" align="top">
        <p>Your browser does not support iframes.</p>
        </iframe> 
    </td>
    <td valign="top" width="83%">
        <iframe src="results_2017.php?all=all" name="contentRightresults2017" width="100%" height="700" frameborder="0" align="top">
        <p>Your browser does not support iframes.</p>
        </iframe>
   </td>
   </tr>
</table>



</div>
    
<div id="tabs-2">
<table width="100%">
    <tr>
    <td valign="top" width="17%">
        <iframe name="side_menu" src="side_menu_search.php" width="100%" height="700" frameborder="0" align="top">
        <p>Your browser does not support iframes.</p>
        </iframe> 
    </td>
    <td valign="top" width="83%">
        <iframe src="results.php?all=all" name="contentRightresults" width="100%" height="700" frameborder="0" align="top">
        <p>Your browser does not support iframes.</p>
        </iframe>
   </td>
   </tr>
</table>



    <div id="divIdal" title="Screening Report Details">
        <iframe id="modalIframeIdal" frameborder="0" width="920" height="850">
        Your browser is not supported
        </iframe>
	</div>
    
    <div id="divIdfollow" title="Follow Up Details">
        <iframe id="modalIframeIdfollow" frameborder="0" width="835" height="700">
        Your browser is not supported
        </iframe>
	</div>
</div>
    </body>
</html>
