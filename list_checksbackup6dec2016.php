<?php
error_reporting(0);

require_once("includes\\opendb.php");


if ( isset ($_GET['save_check'])) {
echo "<script>alert('Modifications has been saved')</script>";

}
if ( isset ($_GET['close_check'])) {
echo "<script>alert('This check has been closed in the system')</script>";

}
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
        
        <script type="text/javascript">
            $(document).ready(function () {
                $('#menu').fileMenu({
                    slideSpeed: 500
                });
            });
        </script>       

        <!-- fileMenu CSS file -->
        <link rel="stylesheet" type="text/css" href="src/css/fileMenu.min.css">

   
<script>
    $(function() {
    $( "#tabs" ).tabs();
	$( "input[type=submit], button" )
	.button()
	});
</script>      
       


<script type="text/javascript">
	function showDialogcheck(id_check){
		
	
	   $("#divIdcheck").dialog("open");
	   $("#modalIframeIdfcheck").attr("src","info_check_details.php?id_check=" + id_check);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdcheck").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 800,
			   width: 1000,
			   resizable: false,
			   draggable: false,
			   
		  });
	});
</script>




<script>
$(function() {
var dialog, form,

type = $( "#type" ),
referred = $( "#referred" ),
datepickerrequest = $( "#datepickerrequest" ),
name = $( "#name" ),
notes = $( "#notes" ),



allFields = $( [] ).add( type ).add( referred ).add( datepickerrequest ).add( name ).add( notes ),
tips = $( ".validateTips" );
function updateTips( t ) {
tips
.text( t )
.addClass( "ui-state-highlight" );
setTimeout(function() {
tips.removeClass( "ui-state-highlight", 1500 );
}, 500 );
}




function checkdate( o ) {
if ( o.val() == "" ) {
o.addClass( "ui-state-error" );
return false;
} else {
return true;
}
}


function checkLengthtype( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
return false;
} else {
return true;
}
}

function checkLengthreferred( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
return false;
} else {
return true;
}
}

function checkLengthname( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
return false;
} else {
return true;
}
}

function checkLengthnotes( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
return false;
} else {
return true;
}
}


function addnote() {
var valid = true;
allFields.removeClass( "ui-state-error" );

valid = valid && checkLengthtype( type, 3 );
valid = valid && checkLengthreferred( referred, 3 );
valid = valid && checkLengthname( name, 3 );

valid = valid && checkdate( datepickerrequest );
valid = valid && checkLengthnotes( notes, 3 );




	if ( valid ) {
		
		
		$('#newcheck').submit();
		dialog.dialog( "close" );
		
	}
	return valid;
}


dialog = $( "#dialog-form-check" ).dialog({
	autoOpen: false,
	height: 720,
	width: 1000,
	modal: true,
	position: 'top',
	show: {
		effect: 'fade',
		duration: 500
	},
	hide: {
		effect: 'fade',
		duration: 500
	},

	buttons: {
	"Save": addnote,


	Cancel: function() {
	$( this ).dialog( "close" );
	}
},


});

form = dialog.find( "newcheck" ).on( "submit", function( event ) {
event.preventDefault();
addnote();
});

$( "#add_check" ).click(function() {
	dialog.dialog( "open" );
});

});

</script>

<script>
$(function(){
  $('#datepickerrequest').datepicker({dateFormat: 'yy-mm-dd'});
});
$(function(){
  $('#datepickerresponse').datepicker({dateFormat: 'yy-mm-dd'});
});
$(function(){
  $('#datepickerdob').datepicker({dateFormat: 'yy-mm-dd', changeYear:true, yearRange: "1900:2025"});

});
</script>



<script type="text/javascript">
	function showDialogedit(id_check){
		
	
	   $("#divIdal").dialog("open");
	   $("#modalIframeIden").attr("src","edit_check_details.php?id_check=" + id_check);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdal").dialog({
	autoOpen: false,
	height: 760,
	width: 500,
	modal: true,
	position: 'top',
	show: {
		effect: 'fade',
		duration: 500
	},
	hide: {
		effect: 'fade',
		duration: 500
	},
		  });
		  
		  
});


</script>




</head>
<body>
<?php
include ("menu_list.php");

$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE status = 'In Progress'", array(), array( "Scrollable" => 'buffered'));
$num_active_follow_ups = sqlsrv_num_rows($result_follow_ups);

$result_ip_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE status = 'Partially implemented / In Progress'", array(), array( "Scrollable" => 'buffered'));
$num_pi_follow_ups = sqlsrv_num_rows($result_ip_follow_ups);

$result_implementes_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE status = 'Implemented'", array(), array( "Scrollable" => 'buffered'));
$num_implemented_follow_ups = sqlsrv_num_rows($result_implementes_follow_ups);

$result_no_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE status = 'No longer applicable'", array(), array( "Scrollable" => 'buffered'));
$num_no_follow_ups_na = sqlsrv_num_rows($result_no_follow_ups);

$total = $num_active_follow_ups + $num_pi_follow_ups + $num_implemented_follow_ups + $num_no_follow_ups_na;



if ($_REQUEST["status"]<>''){
	$status = " AND status = '".sqlsrv_real_escape_string($_REQUEST["status"])."'";	
}

if ($_REQUEST["referred_from"]<>''){
	$referred_from = " AND referred = '".sqlsrv_real_escape_string($_REQUEST["referred_from"])."'";	
}

if ($_REQUEST["type"]<>''){
	$type = " AND type = '".sqlsrv_real_escape_string($_REQUEST["type"])."'";	
}


$sql = "SELECT * FROM checks WHERE id>0".$status.$referred_from.$type." ORDER BY datepickerrequest DESC";;
$sql_result = sqlsrv_query($conncss, $sql, array(), array( "Scrollable" => 'buffered'));
$all_rows = sqlsrv_fetchall($sql_result);
$num_hits = count($all_rows);


$result_bs = sqlsrv_query($conncss,"SELECT * FROM checks WHERE type = 'Background Screening'", array(), array( "Scrollable" => 'buffered'));
$num_bs = sqlsrv_num_rows($result_bs);

$result_dd = sqlsrv_query($conncss,"SELECT * FROM checks WHERE type = 'Due Diligence'", array(), array( "Scrollable" => 'buffered'));
$num_dd = sqlsrv_num_rows($result_dd);

$result_total = sqlsrv_query($conncss,"SELECT * FROM checks", array(), array( "Scrollable" => 'buffered'));
$num_total = sqlsrv_num_rows($result_total);

?>

<div id="dialog-form-check" title="Add New Background check and GF Due Diligence">
<form action="save_new_check.php" id="newcheck" name="newcheck" method="post">

    <table width="100%" border="0" align="center" class="gridtable">
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Type of Request :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <select name="type" id="type" class="text ui-widget-content ui-corner-all">
      		<option></option>
            <option>Background Screening</option>
            <option>Due Diligence</option>
		    </select>
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Referred from :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <select name="referred" id="referred" class="text ui-widget-content ui-corner-all">
      		<option></option>
            <option>Horus</option>
            <option>Secretariat</option>
            <option>Other</option>
		    </select>
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Request date :</strong></td>
            <td valign="top" bgcolor="#FFFFFF"><input id="datepickerrequest" type="text" name="datepickerrequest" class="text ui-widget-content ui-corner-all"/></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>OIG Response date :</strong></td>
            <td valign="top" bgcolor="#FFFFFF"><input id="datepickerresponse" type="text" name="datepickerresponse" class="text ui-widget-content ui-corner-all"/></td>
          </tr>
          
          <tr>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><font size="+1"><strong>Details of entity</strong></font></td>
        </tr>
          <tr>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><hr /></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Name : </strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <input name="name" type="text" id="name" size="100" maxlength="100" class="text ui-widget-content ui-corner-all">
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Alternative name :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <input name="alt_name" type="text" id="alt_name" size="100" maxlength="100" class="text ui-widget-content ui-corner-all">
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>DOB :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <input id="datepickerdob" type="text" name="datepickerdob"  class="text ui-widget-content ui-corner-all"/>
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Email :</strong></td>
            <td valign="top" bgcolor="#FFFFFF"><input name="email" type="text" id="email" size="100" maxlength="100" class="text ui-widget-content ui-corner-all"/></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Notes :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <td colspan="2" valign="top" bgcolor="#FFFFFF"><textarea name="notes" id="notes" cols="118" rows="10" class="text ui-widget-content ui-corner-all"></textarea></td>
     </table>
</form>
</div>
<br />

<form id="form1" name="form1" method="post" action="list_checks.php">
<table width="100%" class="gridtablefilter">
<tr valign="middle">
  <td width="84" height="48" align="right"><strong>Status</strong> <strong>:</strong></td>
  <td width="220"><select name="status" id="status" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
    <option>In Progress</option>
    <option>Closed</option>
  </select></td>
  <td width="184" align="right"><strong>Referred From</strong> <strong>:</strong></td>
  <td width="220" align="left"><select name="referred_from" id="referred_from" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
    <option>Horus</option>
    <option>Secretariat</option>
    <option>Other</option>
  </select></td>
  <td width="109" align="right"><strong>Type</strong> <strong>:</strong></td>
  <td width="220" align="left">
  <select name="type" id="type" class="text ui-widget-content ui-corner-all">
    <option value=""></option>
    <option>Background Screening</option>
    <option>Due Diligence</option>
  </select></td>
  <td width="199" align="right">
  <button type = "submit" name = "Submit" value = "Filter">Filter</button>
    <button type = "submit" name = "Submit" value = "All" onclick="window.location.href='list_checks.php'">Show all</button>
  </td>
  <td width="178" align="left"><font><strong>Found : <font color="#FF0000"><?php echo $num_hits ?></font></strong></font>
  </td>
  
</tr>

</table>
</form>
<div id="entities-contain" class="ui-widget">
  <?php
if ( $num_hits == 0 ){
	echo "<font color='#666666'>";
	echo "No results found";
	echo "</font>";
	
}else{
	
?>
<div id="entities-contain" align="center">
  <table>
                <tr>
                  <th>Status</th>
                  <th align="center" width="500">Entity Name</th>
                  <th align="center"><strong>Type</strong></th>
                  <th><strong>Referred from</strong></th>
                  <th align="center">Request date</th>
                  <th>OIG Response date</th>
                  <th>&nbsp;</th>
                </tr>
                <?php
					if ($num_hits>0) {
					foreach($all_rows as $row) {
						  $id_check = $row['id'];	  ?>
						 <tr>
                        
	                         <td>
							<?php echo $status = $row['status']; ?>
							</td>
	                         <td align="left"><?php 
							 
							 echo $name = $row['name']; 
							 $alt_name = $row['alt_name']; 
							 if ( $alt_name != "" ){
								echo "<br />";
								
								echo "<font color='#999999'>";
					            echo "( ".$alt_name." )";
					            echo "</font>";
							 }
							 ?></td>
							<td align="center">
                            
                            <?php echo $type = $row['type']; ?>

							</td>
                           <td>
                            <?php echo $referred = $row['referred']; ?>
						   </td>
							
							<td>
                            <?php

								echo $datepickerrequest = date('F j, Y', strtotime($datepickerrequest = $row['datepickerrequest'])); 
							
							?>
							</td>
							
							
                            
                            <td>
							<?php
							$datepickerresponse = $row['datepickerresponse'];
							
							if ( $datepickerresponse != "" ){
								echo $datepickerresponse = date('F j, Y', strtotime($datepickerresponse = $row['datepickerresponse'])); 
							}else{
								?>
                                <font color="#990000"> <?php
								echo "Waiting to send response";	 ?>
                                </font>
                                <?php
							}
							?>
							</td>
						
                            <td>
                            <a onclick="return showDialogcheck(<?php echo $id_check ?> )">
                            <img src="images/preview.png" width="24" height="24" align="top" title="Info"/></a>
                             <a onclick="return showDialogedit(<?php echo $id_check ?> )">
                                <img src="images/edit.png" width="24" height="24" align="top" title="Edit Follow up"/>
                             </a>
                            </td>
            </tr>

						<?php }}?>
</table>   
<?php } ?>
</div>


   
<div id="divIdcheck" title="Background check and GF Due Diligence details">
        <iframe id="modalIframeIdfcheck" frameborder="0" width="950" height="700">
        Your browser is not supported
        </iframe>
	</div>
    
    <div id="divIdal" title="Edit Background check and GF Due Diligence">
        <iframe id="modalIframeIden" frameborder="0" width="410" height="700">
        Your browser is not supported
        </iframe>
	</div>
 
    </body>
</html>
