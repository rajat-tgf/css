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
<li><a href="#tabs-1">Follow ups coming up</a></li>
<li><a href="#tabs-2">Past active Follow ups</a></li>
</ul>
<div id="tabs-1">

  
<div id="entities-contain1">    
    <table width="100%">
      <?php
	  // CHECK NOTIFICATION FOR FOLLOW UPS
		$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE status = 'In Progress' OR status = 'Partially implemented / In Progress' ORDER BY date_follow_up ASC");
		 while ($row_follow_ups = sqlsrv_fetch_array($result_follow_ups)){
			$id_follow_up = $row_follow_ups['id'];
			$date_follow_up = $row_follow_ups['date_follow_up'];
			$status = $row_follow_ups['status'];
			$follow_up_id = $row_follow_ups['id'];
			$member = $row_follow_ups['member'];
			$category = $row_follow_ups['category'];
			$allegation_id = $row_follow_ups['allegation_id']; 
			

			$today = date('Y-m-d');
			$deadline = date("Y-m-d",strtotime("+1 week"));
			
		
			if ($date_follow_up == $today ){ ?>

                <tr>
                <td><img src="images/alarm.png" width="20" height="20" align="absmiddle"/></td>
                <td>
                
                <?php 
                
                $result_details_allegation = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$allegation_id'");
                $row_details_allegation = sqlsrv_fetch_array($result_details_allegation);
                $country_allegation = $row_details_allegation['country'];
                
                
                $date_follow_up = $row_follow_ups['date_follow_up'];
                echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
                ?>
                </td>
                <td><a style="text-decoration:underline" onclick="return parent.showDialog(<?php echo $allegation_id ?>)"><?php echo $allegation_id; ?> - <?php echo $country_allegation; ?></a> - <?php echo $member; ?></td>
                <td>
                <a style="text-decoration:underline" onclick="return parent.showDialogfollowup(<?php echo $id_follow_up ?>)">
                <img src="images/preview.png" width="20" height="20" title="<?php echo $id_follow_up ?>"/> </a>
                </td>
                </tr>
                <?php		
			}
			
			
			if (($date_follow_up > $today) && ($date_follow_up < $deadline)){ ?>

                <tr>
                <td></td>
                <td>
                <?php 
                
                $result_details_allegation = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$allegation_id'");
                $row_details_allegation = sqlsrv_fetch_array($result_details_allegation);
                $country_allegation = $row_details_allegation['country'];
                
                
                $date_follow_up = $row_follow_ups['date_follow_up'];
                echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
                ?>
                </td>
                <td><a style="text-decoration:underline" onclick="return parent.showDialog(<?php echo $allegation_id ?>)"><?php echo $allegation_id; ?> - <?php echo $country_allegation; ?></a> - <?php echo $member; ?></td>
                <td>
                <a style="text-decoration:underline" onclick="return parent.showDialogfollowup(<?php echo $id_follow_up ?>)">
                <img src="images/preview.png" width="20" height="20" title="<?php echo $id_follow_up ?>"/> </a>
                </td>
                </tr>
                <?php		
			}
		}
		

	  // CHECK NOTIFICATION FOR IR
		$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups_ir WHERE status = 'In Progress' OR status = 'Partially implemented / In Progress' ORDER BY date_follow_up ASC");
		 while ($row_follow_ups = sqlsrv_fetch_array($result_follow_ups)){
			 $id_follow_up = $row_follow_ups['id'];
			$date_follow_up = $row_follow_ups['date_follow_up'];
			$status = $row_follow_ups['status'];
			$follow_up_id = $row_follow_ups['id'];
			$member = $row_follow_ups['member'];
			$category = $row_follow_ups['category'];
			$report_id = $row_follow_ups['report_id']; 
			
			$today = date('Y-m-d');
			
			
			$deadline = date("Y-m-d",strtotime("+1 week"));
			
		
			if (($date_follow_up > $today) && ($date_follow_up < $deadline) || $date_follow_up == $today){ ?>
            
            <tr>
            <td></td>
            <td>
            <?php 
			
			$result_details_allegation = sqlsrv_query($conncss,"SELECT country FROM intelligence_reports WHERE id = '$report_id'");
		 	$row_details_allegation = sqlsrv_fetch_array($result_details_allegation);
			$country_allegation = $row_details_allegation['country'];
			
			$date_follow_up = $row_follow_ups['date_follow_up'];
			echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
            ?>
            
            </td>
           <td><a style="text-decoration:underline" onclick="return parent.showDialogir(<?php echo $report_id ?>)">IR<?php echo $report_id; ?> - <?php echo $country_allegation; ?></a> - <?php echo $member; ?></td>

            <td>
            <a style="text-decoration:underline" onclick="return parent.showDialogfollowupir(<?php echo $id_follow_up ?>)">
			<img src="images/preview.png" width="19" height="19" align="absmiddle" title="<?php echo $id_follow_up ?>"/>
            </td>
            
            </tr>
            
			<?php		
					
				
			}
		}
	  
	  ?>
      
    </table>
    </div>
</div>

<div id="tabs-2">

    
    <?php //--------------------------------------------PAST FOLLOW UPS ?>
    
    
    <div id="entities-contain1">    
    <table>
      
      <?php
	  // CHECK NOTIFICATION FOR FOLLOW UPS
		$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE status = 'In Progress' OR status = 'Partially implemented / In Progress' ORDER BY date_follow_up ASC");
		 while ($row_follow_ups = sqlsrv_fetch_array($result_follow_ups)){
			$id_follow_up = $row_follow_ups['id'];
			$date_follow_up = $row_follow_ups['date_follow_up'];
			$status = $row_follow_ups['status'];
			$follow_up_id = $row_follow_ups['id'];
			$member = $row_follow_ups['member'];
			$category = $row_follow_ups['category'];
			$allegation_id = $row_follow_ups['allegation_id']; 
			
			$today = date('Y-m-d');
		
			if (($date_follow_up < $today)){ ?>
            
            <tr>
            
            <td>
            <?php 
			
			$result_details_allegation = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$allegation_id'");
		 	$row_details_allegation = sqlsrv_fetch_array($result_details_allegation);
			$country_allegation = $row_details_allegation['country'];
			
			$date_follow_up = $row_follow_ups['date_follow_up'];
			echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
            ?>
            </td>
            

            <td><a style="text-decoration:underline" onclick="return parent.showDialog(<?php echo $allegation_id ?>)"><?php echo $allegation_id; ?> - <?php echo $country_allegation; ?></a> - <?php echo $member; ?></td>
            
            
            <td>
            <a style="text-decoration:underline" onclick="return parent.showDialogfollowup(<?php echo $id_follow_up ?>)">
			<img src="images/preview.png" width="19" height="19" align="absmiddle" title="<?php echo $id_follow_up ?>"/>
            </td>
            
            </tr>

			<?php		
					
				
			}
		}
		

	  // CHECK NOTIFICATION FOR IR
		$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups_ir WHERE status = 'In Progress' OR status = 'Partially implemented / In Progress' ORDER BY date_follow_up ASC");
		 while ($row_follow_ups = sqlsrv_fetch_array($result_follow_ups)){
			 $id_follow_up = $row_follow_ups['id'];
			$date_follow_up = $row_follow_ups['date_follow_up'];
			$status = $row_follow_ups['status'];
			$follow_up_id = $row_follow_ups['id'];
			$member = $row_follow_ups['member'];
			$category = $row_follow_ups['category'];
			$report_id = $row_follow_ups['report_id']; 
			
			$today = date('Y-m-d');
		
			if (($date_follow_up < $today)){ ?>
            
            <tr>
            
            <td>
            <?php 
			
			$result_details_allegation = sqlsrv_query($conncss,"SELECT country FROM intelligence_reports WHERE id = '$report_id'");
		 	$row_details_allegation = sqlsrv_fetch_array($result_details_allegation);
			$country_allegation = $row_details_allegation['country'];
			
			
			$date_follow_up = $row_follow_ups['date_follow_up'];
			echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
            ?>
            </td>

           <td><a style="text-decoration:underline" onclick="return parent.showDialogir(<?php echo $report_id ?>)">IR<?php echo $report_id; ?> - <?php echo $country_allegation; ?></a> - <?php echo $member; ?></td>
            
            <td>
            <a style="text-decoration:underline" onclick="return parent.showDialogfollowupir(<?php echo $id_follow_up ?>)">
            <img src="images/preview.png" width="20" height="20" title="<?php echo $id_follow_up ?>"/> </a>
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