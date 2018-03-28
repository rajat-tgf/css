<?php

require_once("includes\\opendb.php");

session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");  // Redirecting To Home Page
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 
<script>
    $(function() {
		$( "#tabs" ).tabs();
	});
	
	
	
	
</script>
<style type="text/css">
#tabs .ui-tabs-panel {
    height: 120px;
    overflow: auto;
}
</style>
</head>

<body>
<div id="tabs" style="width:97%; display:block; ">
<ul>
<li><a href="#tabs-1">Investigations finalized in the last month</a></li>
</ul>
<div id="tabs-1">
<div id="entities-contain1">
<table width="100%">
      <?php
		$result_cases_recently_closed = sqlsrv_query($conn,"SELECT ref_number, current_status, stage, proactive, title, stage, country, assigned_to, case_closure, date_finalised FROM cases WHERE current_status = 'Finalised' ORDER BY date_finalised DESC");		
		while ($row_cases = sqlsrv_fetch_array($result_cases_recently_closed)){
		
		$date_finalised = $row_cases['date_finalised'];
		
		$today = date('Y-m-d');
		$date_last_month = date("Y-m-d",strtotime("-4 week"));
		
		$ref_number = $row_cases['ref_number'];
		$proactive = $row_cases['proactive'];
		$stage = $row_cases['stage'];
		$country = $row_cases['country'];
		$title = $row_cases['title'];	
		
		if (($date_finalised == $today ) ||($date_finalised > $date_last_month)){?>
          <tr>
          <td width="25%">
          <?php
            echo $date_finalised = date('F j, Y', strtotime($date_finalised)); 
          ?>
          </td>
          <td>
          <?php
			$addthis = "9";
			$ref_number_code = str_replace("/","",$ref_number);
			$ref_number_code = $addthis.$ref_number_code;
			
			if ( $proactive == 'Yes' ){ ?>
			  <img src="images/Pro-icon1.png" width="18" height="18" align="absmiddle"/>&nbsp;
              <?php
		  }
		  ?>
          <a onclick="return parent.showDialogcase(<?php echo $ref_number_code ?> )">
	      <?php
          echo $ref_number. " - ".$country;
          ?>
          </a>
         <?php
		 if ( $stage == '10' ){ 
			 	//GETS THE PROJECT CODE FOR THE REPORT
				$result_get_code = sqlsrv_query($conn,"SELECT * FROM list_project_cases WHERE case_number = '$ref_number'");	
				$row_get_code = sqlsrv_fetch_array($result_get_code);
				$Project_Code = $row_get_code['Project_Code'];
				$filename = $Project_Code.".pdf";
		 
		 ?> &nbsp;&nbsp;&nbsp;
          <a onclick="parent.showreport('<?php echo $filename ?>')"><?php echo $Project_Code ?></a>
         <?php } ?>
          
          
          </td>
          </tr>
          <tr>
          <td></td>
          <td>
          <strong><?php
          echo $title;
          ?></strong>
          </td>
          </tr>
      <?php
		}

		}
	  ?>
      </table>
      </div>

</div>
</div>
    
</body>
</html>