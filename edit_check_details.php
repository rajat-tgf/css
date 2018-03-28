<?php
require_once("includes\security.php");
$Security->GoSecure();

$id_check = $_GET['id_check'];
$result = sqlsrv_query($conncss,"select * from checks WHERE id = '$id_check'"); 
$row = sqlsrv_fetch_array( $result );

$status = $row['status'];
$type = $row['type'];
$referred = $row['referred'];
$datepickerrequest = $row['datepickerrequest'];
$datepickerresponse = $row['datepickerresponse'];
$name = $row['name'];
$alt_name = $row['alt_name'];
$datepickerdob = $row['datepickerdob'];
$email = $row['email'];
$notes = $row['notes'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<script>
	$(function(){
	  $.datepicker.setDefaults(
		$.extend($.datepicker.regional[''])
	  );
	  $('#datepicker2').datepicker({dateFormat: 'yy-mm-dd'});
	
	});
	
	$(function() {
	$( "input[type=submit], button" )
	.button()
	});

</script>

<style>
	div#entities-contain { width: 100%; margin: 10px 0; }
	div#entities-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; alignment-adjust:central; font-size:14px }
	div#entities-contain table td { border: 0px; padding: .3em 10px; text-align: left;font-size:13px }
	div#entities-contain table th { border: 0px; padding: .3em 10px; text-align: center; background:#F2F2F2; font-style:normal; color:#000000 ;font-size:13px }
hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }
body {
	background-color: #FFFFFF;
}
</style>

<script>
$(function(){
  $('#datepickerrequest').datepicker({dateFormat: 'yy-mm-dd'});
});
$(function(){
  $('#datepickerresponse').datepicker({dateFormat: 'yy-mm-dd'});
});
$(function(){
  $('#datepickerdob').datepicker({dateFormat: 'yy-mm-dd', changeYear:true, yearRange: "1900:2016"});

});
</script>

</head>



<body>


<div id="entities-contain">
<form method="POST" action="modify_details_check.php?id_check=<?php echo $id_check ?>" id="modifycheck" name="modifycheck" >
    <table>
          <tr>
            <td width="137" valign="top" bgcolor="#FFFFFF"><strong>Type of Request :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <select name="type" id="type" class="text ui-widget-content ui-corner-all">
      		<option selected="selected" value ="<?php echo $type ?>"><?php echo $type;?></option>
            <option>Background Screening</option>
            <option>Due Diligence</option>
		    </select>
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Referred from :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <select name="referred" id="referred" class="text ui-widget-content ui-corner-all">
			<option selected="selected" value ="<?php echo $referred ?>"><?php echo $referred;?></option>
            <option>Horus</option>
            <option>Secretariat</option>
            <option>Other</option>
		    </select>
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Request date :</strong></td>
            <td valign="top" bgcolor="#FFFFFF"><input id="datepickerrequest" type="text" name="datepickerrequest" value ="<?php echo $datepickerrequest ?>" class="text ui-widget-content ui-corner-all"/></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>OIG Response date :</strong></td>
            <td valign="top" bgcolor="#FFFFFF"><input id="datepickerresponse" type="text" name="datepickerresponse" value ="<?php echo $datepickerresponse ?>" class="text ui-widget-content ui-corner-all"/></td>
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
            <input name="name" type="text" id="name" value ="<?php echo $name ?>" style="width:100%" maxlength="100" class="text ui-widget-content ui-corner-all">
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Alternative name :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <input name="alt_name" type="text" id="alt_name" value ="<?php echo $alt_name ?>" style="width:100%" maxlength="100" class="text ui-widget-content ui-corner-all">
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>DOB :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <input id="datepickerdob" type="text" name="datepickerdob" value ="<?php echo $datepickerdob ?>" class="text ui-widget-content ui-corner-all"/>
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Email :</strong></td>
            <td valign="top" bgcolor="#FFFFFF"><input name="email" type="text" id="email" value ="<?php echo $email ?>" style="width:100%" maxlength="100" /></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Notes :</strong></td>
            <td valign="top" bgcolor="#FFFFFF"><textarea name="notes" style="width:100%" id="notes" cols="100" rows="10" class="text ui-widget-content ui-corner-all"><?php echo $notes ?></textarea></td>
          </tr>
          <tr>
                  <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF"><button type = "submit" name="save" value="Save Modifications">Save</button>
&nbsp;&nbsp;&nbsp;
<input type="submit" name="close" value="Finalised" /></td>
        </tr>
     </table>
</form>

    </body>
</html>
