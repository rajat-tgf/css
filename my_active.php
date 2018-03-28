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

</head>
             <?php
			 $rowId = 0;
				$quey1="select * from allegation_details WHERE team_member = '$username' AND status != 'Closed' ORDER BY date_received ASC"; 
				$result=sqlsrv_query($conncss,$quey1);
				
				$quey2="select * from intelligence_reports WHERE member = '$username' AND status = 'Under Review' ORDER BY id ASC"; 
				$result2=sqlsrv_query($conncss,$quey2);
			?>
<body>

<?php include("menu_list.php"); ?>
<br />

  
  <div id="entities-contain" align="center">
    <table>
    <tr><td colspan="8"><strong><font color="#464646"; size="+1">My active Screening / Assessment</font></strong></td></tr>
        <tr>
          <th width="51" align="center" valign="middle">#</th>
          <th width="451" align="center" valign="middle">Title</th>
          <th width="193" align="center" valign="middle">Country</th>
          <th width="251" align="center" valign="middle">Status</th>
          <th width="87" align="center" valign="middle">Priority</th>
          <th width="56" align="center" valign="middle">Days</th>
          <th colspan="2" align="center" valign="middle">Member in Charge</th>
        </tr>
            
            <?php
            
    
            while($row = sqlsrv_fetch_array($result)){
            ?>
                        <tr>
                        <td align='center' valign='top' style="font-size:14px"><strong>
                        <a href='allegation_details.php?id=<?php echo $id = $row['id']; ?>' target="_parent">
                       	 <?php  echo $id; ?>
                        </a>
                        </strong>
                        </td>
                
                        <td valign='top'>
                        <?php
                        echo $summary = $row['summary'];
                        ?>
                        </td>
                
        
                        <td align='center' valign='top'>
                        <?php
                        echo $country = $row['country'];
                        ?>
                        </td>
                
                        <td align='center' valign='top'>
                        
    
                        <strong>
                        <?php
                        echo $status = $row['status'];
                        echo "<br />";
    
                        $resolution = $row['resolution'];
                        
                        if ( $resolution != "" ){	
                        echo "<font color='#999999'>(";
                        echo $resolution = $row['resolution'];
                        echo ")";
                        }
                        
                        ?>
                        </strong>
                        </td>
                        
                        <td align='center' valign='top'>
                        <?php
                        $priority = $row['priority'];
                        if ( $priority == "High" ){
                                            
                                echo "<font color='#FF0000'>";
                                echo $priority;
                                echo "</font>";
                            }
                            if ( $priority == "Medium" ){
                                echo "<font color='#FF9933'>";
                                echo $priority;
                                echo "</font>";	
                            }
                            if ( $priority == "Low" ){
                                echo "<font color='#339933'>";
                                echo $priority;
                                echo "</font>";	
                            }
                        ?>
                        </td>
                        <td align='left' valign='top'>
                        <?php
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
                        
                        <font <?php echo $color ?> size="+1"><?php echo $screening_days; ?></font>
                        </td>
                        <td width="235" align='left' valign='top'>
                        <?php
                        echo $team_member = $row['team_member'];
                        ?>
                        </td>
                        <td width="32" align='center' valign="middle">
                            <a onclick="return parent.showDialog(<?php echo $id ?>)">
                            <img src="images/document-icon-sr.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
                         </a>
                            
                        </td>
    
                        </tr>
    <?php
    }
	
	
	while($row_ir = sqlsrv_fetch_array($result2)){
            ?>
                        <tr>
                        <td align='center' valign='top' style="font-size:14px"><strong>
                        <?php $ir_id = $row_ir['id']; ?>
                        <strong>
                        <a href='intelligence_report_details.php?id_report=<?php echo $ir_id; ?>' target="_parent">IR<?php echo $ir_id;?></a>
                        </strong>
                        </td>
                
                        <td valign='top'>
                        <?php
                        echo $title = $row_ir['title'];
                        ?>
                        </td>
                
        
                        <td align='center' valign='top'>
                        <?php
                        echo $country = $row_ir['country'];
                        ?>
                        </td>
                
                        <td align='center' valign='top'>
                        
    
                        <strong>
                        <?php
                        echo $status = $row_ir['status'];
                        ?>
                        </strong>
                        </td>
                        
                        <td align='center' valign='top'>
                        </td>
                        <td align='left' valign='top'>
                        <?php
                        $date1 = new DateTime($row_ir['date_report_complete']);
                        $date2 = new DateTime($row_ir['reviewed_by_officer_date']);
                        
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
                        
                        <font <?php echo $color ?> size="+1"><?php echo $screening_days; ?></font>
                        </td>
                        <td width="235" align='left' valign='top'>
                        <?php
                        echo $team_member = $row_ir['member'];
                        ?>
                        </td>
                        <td width="32" align='center' valign="middle">
						<a onclick="return parent.showDialogir(<?php echo $ir_id ?>)">
                            <img src="images/ir.png" width="24" height="24" align="absmiddle" title="Quick view Screening Report"/>
                         </a>
                            
                        </td>
    
                        </tr>
    <?php
    }
	
	
	
    ?>
    </table>
</div>
<div id="divscreeningreport" title="Screening Report Details">
        <iframe id="modalIframeIdal" frameborder="0" width="920" height="850">
        Your browser is not supported
        </iframe>
	</div>

</body>
</html>