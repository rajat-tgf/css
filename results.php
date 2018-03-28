<?php
require_once("includes\security.php");
$Security->GoSecure();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




<style type="text/css">
table.gridtable3 {
	border: none;
	border-collapse: collapse;
	border-spacing: 0px;
	font-size: 11px;
	color: #669900;
}
table.gridtable3 td {
	font-weight: normal;
	font-size: 12px;
	color: #666666;
	padding-top: 4px;
	padding-bottom: 4px;
	padding-left: 8px;
	padding-right: 0px;
}
    fieldset {
    border:1px solid #999;
    border-radius:8px;
    box-shadow:0 0 10px #999;
}
</style>  



<script type="text/javascript">
	function showDialogeditnotes(id){
		
	
	   $("#divcnote").dialog("open");
	   $("#modalIframeIdalnotes").attr("src","edit_comment.php?id=" + id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divcnote").dialog({
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
			   height: 530,
			   width: 940,
			   resizable: false,
			   draggable: false,
			   position: 'top',

		  });
	});
</script> 


<script type="text/javascript">
	function showDialog(allegation_id){
		
	
	   $("#divscreeningreport").dialog("open");
	   $("#modalIframeIdal").attr("src","details_sr.php?allegation_id=" + allegation_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divscreeningreport").dialog({
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
			   position: 'top',
			   

		  });
	});
</script> 

<script type="text/javascript">
	function showDialogcomments(id){
		
	
	   $("#divcomments").dialog("open");
	   $("#modalIframecomments").attr("src","comments_list.php?allegation_id=" + id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divcomments").dialog({
		   show: {
					effect: 'fade',
					duration: 500
				},
				hide: {
					effect: 'fade',
					duration: 500
				},
		   position: 'top',
			   autoOpen: false,
			   modal: true,
			   height: 800,
			   width: 1050,
			   resizable: false,
			   draggable: false,
			   

		  });
	});
</script>



<script>
function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}
</script>


<SCRIPT LANGUAGE="JavaScript">

function edit_comment(id) 
{
		var windowW=855
		var windowH=730
		var windowX = 100
		var windowY = 130
		var url = "edit_comment.php?id=" + id;

		s = "scrollbars=yes"+",width="+windowW+",height="+windowH;

		blwindow = window.open(url,"Popup1",","+s);
		windowX = (screen.width) ? (screen.width-windowW)/2 : 0;
		windowY = (screen.height) ? (screen.height-windowH)/2 : 0;
		blwindow.focus();
		blwindow.resizeTo(windowW,windowH);
		blwindow.moveTo(windowX,windowY);
}
</script>


</head>

<body>
<?php

if (isset($_GET['all'])){

$rowId = 0;
include ("stats/allegations_performance_all_members.php");


$quey1 = "SELECT * FROM allegation_details LEFT JOIN comments_manager ON allegation_details.id = comments_manager.id WHERE allegation_details.status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31' ORDER BY allegation_details.date_received DESC"; 

$result=sqlsrv_query($conncss,$quey1) or trigger_error("SQL query Failed", E_USER_ERROR);

?>
<br />


<div id="entities-contain">
   <table>
     <tr>
       <th>#</th>
       <th>Country</th>
       <th>Status</th>
       <th>Priority</th>
       <th>Days</th>
       <th>Comments</th>
       <th>Returns</th>
       <th>Rate</th>
       <th>Member</th>
       <th></th>
     </tr>
     <?php
	while($row = sqlsrv_fetch_array($result)){
		$rowId = $rowId + 1;
		
		$id = $row['id'];
		$notes_manager = nl2br($row['comment']);

		$rate1 = $row['rate1'];
		$rate2 = $row['rate2'];
		$rate3 = $row['rate3'];
		$rate4 = $row['rate4'];	
		
		$total_rate = $rate1 + $rate2 + $rate3 + $rate4;
	?>
     <tr>
       <td style="font-size:14px"><strong>
	   <a onclick="return parent.showDialog(<?php echo $id ?>)">
	   <?php echo $id; ?>
       </a>
       </strong></td>
       <td><?php echo $country = $row['country']; ?></td>
       <td>
       <strong>
       <?php
			$status = $row['status'];

			if ( $status == "Screening Review" || $status == "Pending finalization"){ 
				echo "<font color='#BF0000'>";
				echo $status;
				echo "<br />";
				echo "</font>";
			}else {
				echo "<font color='#999999'>";
				echo $status;
				echo "&nbsp;-&nbsp;";
				echo "</font>";
			}
			$resolution = $row['resolution'];
			
			if ( $resolution != "" ){	
			echo "<font color='#999999'>";
			echo $resolution = $row['resolution'];
			}
			if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case" || $resolution == "Merge with an existing Allegation"){
			echo "&nbsp;";
			echo $case_number = $row['case_number'];
				
			}
			
			?>
       </strong>
       </td>
       <?php
			$priority = $row['priority'];
			$bgcolor = "";
			$colorpriority = "";

			if ( $priority == "High" ){
				$colorpriority = "style='color:#C10005'";
				$bgcolor = "bgcolor='#EC797C'";
			}
			if ( $priority == "Medium" ){
				$colorpriority = "style='color:#FF9933'";
				$bgcolor = "bgcolor='#FDE9AC'";
			}
			if ( $priority == "Low" ){
				$colorpriority = "style='color:#339933'";
				$bgcolor = "bgcolor='#B0E18C'";
			}
												
			?>
       <td <?php echo $bgcolor ?>><font <?php echo $colorpriority ?>><?php echo $priority; ?></font></td>
       <td><?php
			if ( $reviewed_by_officer_date = $row['reviewed_by_officer_date'] != "Unknown" ){
			$date1 = new DateTime($row['date_received']);
			$date2 = new DateTime($row['reviewed_by_officer_date']);
			
			$screening_days = $date2->diff($date1)->format("%a");
			$color = "";
			if ( $screening_days < 7 || $screening_days == 7 ){
				$color = "style='color:#339933'";
			}
			if ( $screening_days > 7 || $screening_days == 14 ){
				$color = "style='color:#FF9933'";
			}
			if ( $screening_days > 15 ){
				$color = "style='color:#FF0000'";
			}
			?>
         <font <?php echo $color ?>><strong><?php echo $screening_days; ?></strong></font>
         <?php } ?></td>
        <td>
        <a onclick="return showDialogcomments(<?php echo $id ?> )">
		<?php
            $result_comments = sqlsrv_query($conncss,"SELECT * FROM comments WHERE allegation_id = '$id'", array(), array( "Scrollable" => 'buffered'));
            echo $num_comments = sqlsrv_num_rows($result_comments);
            ?>
        </a>
        </td> 
         <td><?php
	       $result_return = sqlsrv_query($conncss,"SELECT * FROM returns WHERE allegation_id = '$id'", array(), array( "Scrollable" => 'buffered'));
            echo $num_returnd = sqlsrv_num_rows($result_return);
		?></td>
       <td>
       <?php
	   
   
	   if ( $total_rate == 0 ){
		?>
       <img src="images/0star.png" width="64" height="16" align="absmiddle"/>
       <?php
	   }
	   else if ( $total_rate == 1 ){
		?>
       <img src="images/1star.png" width="64" height="16" align="absmiddle"/>
       <?php
	   }else if ( $total_rate == "2" ){
		?>
       <img src="images/2star.png" width="64" height="16" align="absmiddle"/>
       <?php   
	   }
	   else if ( $total_rate == 3 ){
		?>
       <img src="images/3star.png" width="64" height="16" align="absmiddle"/>
       <?php   
	   }else if ( $total_rate == 4 ){
		?>
       <img src="images/4star.png" width="64" height="16" align="absmiddle"/>
       <?php   
	   }
	   ?>
       </td>
        
        
        
       <td><?php
	       echo $team_member = $row['team_member'];
		?></td>
       
       <td align='center'>
        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a>
        <a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
        </td>
        
        
        
     </tr>
     <tr id="<?php echo $rowId ?>" style="display: none;">
    <td colspan="11" width="100%">
      <br />
               <a onclick="return showDialogeditnotes(<?php echo $id ?>)">Edit</a>

        <br /><br />

        <?php
			echo $notes_manager;
	 ?>
	</td>
   
    </tr>
     <?php
     }
     ?>
   </table>
 </div>



<?php

}




/////////////////////////////////////////////////////////////////////////REQUEST MEMBER --------------------------------------------



if (isset($_REQUEST["member"]) && $_REQUEST["member"]<>''){
	
	if ($_REQUEST["year"]<>''){
		$request_year =  sqlsrv_real_escape_string($_REQUEST["year"]);
		
		if ($request_year == "2016"){
			$year = " AND allegation_details.date_received BETWEEN '2016-01-01' AND '2016-12-31'";
		}
		if ($request_year == "2017"){
			$year = " AND allegation_details.date_received BETWEEN '2017-01-01' AND '2017-12-31'";
		}
	}
$requet_member =  sqlsrv_real_escape_string($_REQUEST["member"]);
	
$rowId = 0;



//2016-------------------------------------------------------------------------------------------------------
//HIGH ALLEGATIONS
$result_allegations_high2016 = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$requet_member' AND priority = 'High' AND status = 'Closed'".$year."");		



$num_allegations_high2016 = 0;

$total_number_days_screening_high2016 = 0;
$average_high2016 = 0;
while ($row_allegations_high2016 = sqlsrv_fetch_array($result_allegations_high2016)) {	
	$date1 = new DateTime($row_allegations_high2016['date_received']);
	$date2 = new DateTime($row_allegations_high2016['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_high2016 = $total_number_days_screening_high2016 + $screening_days;
	$num_allegations_high2016 = $num_allegations_high2016 + 1;
}
if ( $total_number_days_screening_high2016 != 0 && $num_allegations_high2016 != 0 ){
	$average_high2016 = $total_number_days_screening_high2016 / $num_allegations_high2016 ;
	$average_high2016 = round($average_high2016, 0);
}



//MIDIUM ALLEGATIONS
$result_allegations_midium2016 = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$requet_member' AND priority = 'Medium' AND status = 'Closed'".$year."");		
$num_allegations_midium2016 = 0;

$total_number_days_screening_medium2016 = 0;
$average_midium2016 = 0 ;
while ($row_allegations_midium2016 = sqlsrv_fetch_array($result_allegations_midium2016)) {	
	$date1 = new DateTime($row_allegations_midium2016['date_received']);
	$date2 = new DateTime($row_allegations_midium2016['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_medium2016 = $total_number_days_screening_medium2016 + $screening_days;
	$num_allegations_midium2016 = $num_allegations_midium2016 + 1;
}

if ( $total_number_days_screening_medium2016 != 0 && $num_allegations_midium2016 != 0 ){
	$average_midium2016 = $total_number_days_screening_medium2016 / $num_allegations_midium2016 ;
	$average_midium2016 = round($average_midium2016, 0);
}


//LOW ALLEGATIONS
$result_allegations_low2016 = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$requet_member' AND priority = 'Low' AND status = 'Closed'".$year."");		
$num_allegations_low2016 = 0;

$total_number_days_screening_low2016 = 0;
$average_low2016 = 0;
while ($row_allegations_low2016 = sqlsrv_fetch_array($result_allegations_low2016)) {	
	$date1 = new DateTime($row_allegations_low2016['date_received']);
	$date2 = new DateTime($row_allegations_low2016['reviewed_by_officer_date']);
	$screening_days = $date2->diff($date1)->format("%a");
	$total_number_days_screening_low2016 = $total_number_days_screening_low2016 + $screening_days;
	$num_allegations_low2016 = $num_allegations_low2016 + 1;
}
if ( $total_number_days_screening_low2016 != 0 && $num_allegations_low2016 != 0 ){
	$average_low2016 = $total_number_days_screening_low2016 / $num_allegations_low2016 ;
	$average_low2016 = round($average_low2016, 0);
}
?>
<table width="100%" align="center">
  <tr>
  <td height="136" colspan="2" align="right" valign="top">
    <p><strong><font color="#464646"; size="+1">
      <?php echo $requet_member ?>
      </font></strong>
      
      <?php

$result_rate = sqlsrv_query($conncss,"SELECT * FROM allegation_details LEFT JOIN comments_manager ON allegation_details.id = comments_manager.id WHERE allegation_details.team_member = '$requet_member' AND allegation_details.status = 'Closed'".$year.""); 
$all_rows = sqlsrv_fetchall($result_rate);
$num_rates = count($all_rows);

$rate_0_star = 0;
$rate_1_star = 0;
$rate_2_star = 0;
$rate_3_star = 0;
$rate_4_star = 0;

$ratetime = 0;
$ratecompl = 0;
$ratequa = 0;
$ratecon = 0;

foreach($all_rows as $row){

$rate1 = $row['rate1'];
$rate2 = $row['rate2'];
$rate3 = $row['rate3'];
$rate4 = $row['rate4'];	

$total_rate = $rate1 + $rate2 + $rate3 + $rate4;
   
	   if ( $total_rate == 0 ){
			$rate_0_star = $rate_0_star + 1;
	   }else if ( $total_rate == 1 ){
			$rate_1_star = $rate_1_star + 1;
	   }else if ( $total_rate == 2 ){
			$rate_2_star = $rate_2_star + 1;   
	   }
	   else if ( $total_rate == 3 ){
			$rate_3_star = $rate_3_star + 1; 
	   }else if ( $total_rate == 4 ){
			$rate_4_star = $rate_4_star + 1;
	   }
	   
	   
	    if ( $rate1 == 1 ){
		  $ratetime = $ratetime + 1;
	  }
		if ( $rate2 == 1 ){
		  $ratecompl = $ratecompl + 1;
	  }
		if ( $rate3 == 1 ){
		  $ratequa = $ratequa + 1;
	  }
		if ( $rate4 == 1 ){
		  $ratecon = $ratecon + 1;
	  }
	   
}


$per_ratetime = ($ratetime / $num_rates) * 100;
$per_ratetime = round($per_ratetime);

$per_ratecompl = ($ratecompl / $num_rates) * 100;
$per_ratecompl = round($per_ratecompl);

$per_ratequa = ($ratequa / $num_rates) * 100;
$per_ratequa = round($per_ratequa);

$per_ratecon = ($ratecon / $num_rates) * 100;
$per_ratecon = round($per_ratecon);
?>
      <br />
      
    <br></td>
  <td align="center" valign="bottom">
    
    <div id="entities-contain">
      <table>
        <tr>
          <th><strong>Priority</strong></th>
          <th align="center"><strong># Allegations</strong></th>
          <th align="center">Total days</th>
          <th align="center"><strong>Average in days</strong></th>
          </tr>
        <tr>
          <td><font color="#FF0000">High</font></td>
          <td align="center"><?php echo $num_allegations_high2016 ?></td>
          <td align="center"><?php echo $total_number_days_screening_high2016 ?></td>
          <td align="center"><?php echo $average_high2016 ?></td>
          </tr>
        <tr>
          <td><font color="#FF9933">Medium</font></td>
          <td align="center"><?php echo $num_allegations_midium2016 ?></td>
          <td align="center"><?php echo $total_number_days_screening_medium2016 ?></td>
          <td align="center"><?php echo $average_midium2016 ?></td>
          </tr>
        <tr>
          <td><font color="#009900">Low</font></td>
          <td align="center"><?php echo $num_allegations_low2016 ?></td>
          <td align="center"><?php echo $total_number_days_screening_low2016 ?></td>
          <td align="center"><?php echo $average_low2016 ?></td>
          </tr>
        <tr>
          <td align="center" style="border-top:double"><strong>TOTAL</strong></td>
          <td align="center" style="border-top:double"><strong><?php echo $total_number_allegations2016 = $num_allegations_high2016 + $num_allegations_midium2016 + $num_allegations_low2016 ?></strong></td>
          <td align="center" style="border-top:double"><strong><?php echo $total_number_days2016 = $total_number_days_screening_high2016 + $total_number_days_screening_medium2016 + $total_number_days_screening_low2016 ?></strong></td>
          <td align="center" style="border-top:double"><strong>
            <?php 
	   if ( $total_number_days2016 != 0 && $total_number_allegations2016 != 0 ){
	 echo  $averagetottal2016 = round($total_number_days2016 / $total_number_allegations2016, 0);
	   }else{
		   echo "0";
	   }
	 ?>
            </strong> <?php echo "<font size='-2'>    (average)</font>"; ?></td>
          </tr>
        </table>
      </div>
  </td>
  <td width="1" align="center" valign="middle">&nbsp;</td>
</tr>
<tr>
  <td width="83" align="right" valign="top">
    
    
    <script type="text/javascript">
		google.charts.load('current', {packages: ['corechart', 'bar']});

	google.charts.setOnLoadCallback(drawchart);
	
	function drawchart() {
		  var data = google.visualization.arrayToDataTable([
			['', '', { role: 'style' }, {type: 'string', role: 'annotation'}],
			['', <?php echo $rate_4_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_4_star ?>'],            
			 ['', <?php echo $rate_3_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_3_star ?>'],          
			 ['', <?php echo $rate_2_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_2_star ?>'],
			 ['', <?php echo $rate_1_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_1_star ?>' ],
			 ['', <?php echo $rate_0_star ?>, 'stroke-color: #FCC60A; stroke-width: 2; fill-color: gold', '<?php echo $rate_0_star ?>' ],
		  ]);
		  var options = {
			chartArea: {'width': '60%', 'height': '60%', 'left': '1%', 'top': '1%'},

			legend: { position: "none" },
			hAxis: {gridlines: {count: 3}},
			
		  };
		  var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
		  chart.draw(data, options);
		}
</script>
    <table class="gridtable3">
      <tr>
        <td><img src="images/4star.png" width="64" height="16" align="absmiddle"/></td>
        </tr>
      <tr>
        <td><img src="images/3star.png" width="64" height="16" align="absmiddle"/></td>
        </tr>
      <tr>
        <td><img src="images/2star.png" width="64" height="16" align="absmiddle"/></td>
        </tr>
      <tr>
        <td><img src="images/1star.png" width="64" height="16" align="absmiddle"/></td>
        </tr>
      <tr>
        <td><img src="images/0star.png" width="64" height="16" align="absmiddle"/></td>
        </tr>
    </table></td>
  <td width="443" align="left" valign="top"><div id="chart_div1" align="right"></div></td>
  <td align="center" valign="top">
    
    
    <script type="text/javascript">
	google.charts.setOnLoadCallback(drawAxisTickColors);
	
	function drawAxisTickColors() {
		  var data = google.visualization.arrayToDataTable([
			['City', '', { role: 'style' }, {type: 'string', role: 'annotation'}],
			['Timeliness', <?php echo $per_ratetime ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF', '<?php echo $per_ratetime ?>%'],            
			 ['Completion of the Report / Research / Entities', <?php echo $per_ratecompl ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF', '<?php echo $per_ratecompl ?>%'],          
			 ['Quality of the Report', <?php echo $per_ratequa ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF', '<?php echo $per_ratequa ?>%'],
			 ['Conclusion', <?php echo $per_ratecon ?>, 'stroke-color: #1C7CC4; stroke-width: 2; fill-color: #99BADF', '<?php echo $per_ratecon ?>%' ],
		  ]);
		  var options = {
			chartArea: {'width': '30%', 'height': '60%', 'right': '25%', 'top': '1%'},

			legend: { position: "none" },
			vAxis: {
				  textStyle: {
					fontSize: 11,
					bold: true,
					color: '#333'
				  },
         	 }
		  };
		  var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
		  chart.draw(data, options);
		}
</script>
    <div id="chart_div" align="right"></div>  
  </td>
  </tr>
</table>



<?php

$quey1 = "SELECT * FROM allegation_details WHERE team_member = '$requet_member' AND status = 'Closed'".$year." ORDER BY date_received DESC";
$result=sqlsrv_query($conncss,$quey1) or trigger_error("SQL query Failed", E_USER_ERROR);
	
?>

<div id="entities-contain">
   <table>
     <tr>
       <th>#</th>
       <th>Country</th>
       <th>Status</th>
       <th>Priority</th>
       <th>Days</th>
       <th>Comments</th>
       <th>Returns</th>
       <th>Rate</th>
       <th>Member</th>
       <th></th>
     </tr>
     <?php
	while($row = sqlsrv_fetch_array($result)){
		$rowId = $rowId + 1;
		
		$id = $row['id'];
		
		$result_comment = sqlsrv_query($conncss,"SELECT * FROM comments_manager WHERE id = '$id'"); 
		$row_comment = sqlsrv_fetch_array( $result_comment );
		$rate1 = $row_comment['rate1'];
		$rate2 = $row_comment['rate2'];
		$rate3 = $row_comment['rate3'];
		$rate4 = $row_comment['rate4'];
		$notes_manager = nl2br($row_comment['comment']);
	?>
     <tr>
       <td style="font-size:14px"><strong>
	   <a onclick="return parent.showDialog(<?php echo $id ?>)">
	   <?php echo $id; ?>
       </a>
       </strong></td>

       <td><?php
									echo $country = $row['country'];
									?></td>
       <td><strong>
         <?php
									$status = $row['status'];

									if ( $status == "Screening Review" || $status == "Pending finalization"){ 
										echo "<font color='#BF0000'>";
										?>
										      <td align="center" style="border-top:double"><strong>
											  <?php echo $total_number_days2016 = $total_number_days_screening_high2016 + $total_number_days_s;

										echo $status;
										echo "<br />";
										echo "</font>";
									}else {
										echo "<font color='#999999'>";
										echo $status;
										echo "&nbsp;-&nbsp;";
										echo "</font>";
									}
									$resolution = $row['resolution'];
									
									if ( $resolution != "" ){	
									echo "<font color='#999999'>";
									echo $resolution = $row['resolution'];
									}
									if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case" || $resolution == "Merge with an existing Allegation"){
									echo "&nbsp;";
									echo $case_number = $row['case_number'];
										
									}
									
									?>
       </strong></td>
       <?php
									$priority = $row['priority'];
									$bgcolor = "";
									$colorpriority = "";

									if ( $priority == "High" ){
										$colorpriority = "style='color:#C10005'";
										$bgcolor = "bgcolor='#EC797C'";
									}
									if ( $priority == "Medium" ){
										$colorpriority = "style='color:#FF9933'";
										$bgcolor = "bgcolor='#FDE9AC'";
									}
									if ( $priority == "Low" ){
										$colorpriority = "style='color:#339933'";
										$bgcolor = "bgcolor='#B0E18C'";
									}
																		
									?>
       <td <?php echo $bgcolor ?>><font <?php echo $colorpriority ?>><?php echo $priority; ?></font></td>
       <td><?php
									if ( $reviewed_by_officer_date = $row['reviewed_by_officer_date'] != "Unknown" ){
									$date1 = new DateTime($row['date_received']);
									$date2 = new DateTime($row['reviewed_by_officer_date']);
									
									$screening_days = $date2->diff($date1)->format("%a");
									$color = "";
									if ( $screening_days < 7 || $screening_days == 7 ){
										$color = "style='color:#339933'";
									}
									if ( $screening_days > 7 || $screening_days == 14 ){
										$color = "style='color:#FF9933'";
									}
									if ( $screening_days > 15 ){
										$color = "style='color:#FF0000'";
									}
									?>
         <font <?php echo $color ?>><strong><?php echo $screening_days; ?></strong></font>
         <?php } ?></td>
        <td>
        <a onclick="return showDialogcomments(<?php echo $id ?> )">
		<?php
            $result_comments = sqlsrv_query($conncss,"SELECT * FROM comments WHERE allegation_id = '$id'", array(), array( "Scrollable" => 'buffered'));
            echo $num_comments = sqlsrv_num_rows($result_comments);
            ?>
        </a>
        </td> 
         <td><?php
	       $result_return = sqlsrv_query($conncss,"SELECT * FROM returns WHERE allegation_id = '$id'", array(), array( "Scrollable" => 'buffered'));
            echo $num_returnd = sqlsrv_num_rows($result_return);
		?></td>
       <td>
       <?php
	   
	   $total_rate = $rate1 + $rate2 + $rate3 + $rate4;
	   
	   if ( $total_rate == 0 ){
		?>
       <img src="images/0star.png" width="64" height="16" align="absmiddle"/>
       <?php
	   }
	   if ( $total_rate == 1 ){
		?>
       <img src="images/1star.png" width="64" height="16" align="absmiddle"/>
   	   <?php }else if ( $total_rate == "2" ){
		?>
       <img src="images/2star.png" width="64" height="16" align="absmiddle"/>
       <?php   
	   }
	   else if ( $total_rate == 3 ){
		?>
       <img src="images/3star.png" width="64" height="16" align="absmiddle"/>
       <?php   
	   }else if ( $total_rate == 4 ){
		?>
       <img src="images/4star.png" width="64" height="16" align="absmiddle"/>
       <?php   
	   }
	   ?>
       
       </td>
        
        
        
       <td><?php
	       echo $team_member = $row['team_member'];
		?></td>
      
       <td align='center'>
        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a>
        <a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
        </td>
        
        
        
     </tr>
     <tr id="<?php echo $rowId ?>" style="display: none;">
    <td colspan="11" width="100%">
<a onclick="return showDialogeditnotes(<?php echo $id ?>)">Edit</a><br />


        <?php
			echo $notes_manager;
	 ?>
	</td>
   
    </tr>
     <?php
     }
     ?>
   </table>
 </div>



<?php

}




?>




<div id="divcomments" title="Comments allegation <?php echo $id ?>">
    <iframe id="modalIframecomments" frameborder="0" width="1000" height="720">
    Your browser is not supported
    </iframe>
</div>

<div id="divscreeningreport" title="Screening Report Details">
<iframe id="modalIframeIdal" frameborder="0" width="920" height="850">
Your browser is not supported
</iframe>
</div>

<div id="divcnote" title="Edit Notes">
<iframe id="modalIframeIdalnotes" frameborder="0" width="840" height="455">
Your browser is not supported
</iframe>

</div>
</body>
</html>