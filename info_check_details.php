<?php

require_once("includes\\opendb.php");

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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Information Follow up details</title>


<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />


<script>
$(function(){
  $.datepicker.setDefaults(
    $.extend($.datepicker.regional[''])
  );
  $('#datepicker2').datepicker({dateFormat: 'yy-mm-dd'});

});
</script>
<style>
	body {
	background-color: #FFFFFF;
</style>
    <script>
    $(function() {
    $( "#tabs" ).tabs();
    });
    </script>
<style type="text/css">
table.gridtable1 {
	font-size:13px;
	color:#FFFFFF;
	border-color: #EDEDED;
	border-collapse: collapse;
}
table.gridtable1 th {
	font-size:13px;
	border-width: 1px;
	padding: 2px;
	border-style: solid;
	border-color: #000000;
	background-color: #959595;
	color: #FFFFFF;
}
table.gridtable1 td {
	font-size:13px;
	border-width: 0px;
	color:#666666;
	padding: 3px;
	border-style: solid;
	border-color: #EDEDED;
	background-color: #ffffff;
}
hr { border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }
</style>


 <script>
$(function() {
$( "input[type=submit], button" )
.button()
});
</script>


</head>



<body>
              <table width="100%" border="0" align="center"  class="gridtable1">
              <tr>
                <td width="19%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                <td width="44%" bgcolor="#FFFFFF">&nbsp;</td>
                <td width="32%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>Status :</strong></td>
                  <td bgcolor="#FFFFFF"><?php echo $status;?></td>
                  <td align="right" bgcolor="#FFFFFF"><strong>Referred from :</strong></td>
                  <td colspan="2" bgcolor="#FFFFFF">
				  <?php	echo $referred ?></td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>Type of Request :</strong></td>
                  <td bgcolor="#FFFFFF"><?php echo $type?></td>
                  <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
                  <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#FFFFFF"><strong>Request date :</strong></td>
                    <td colspan="4" valign="top" bgcolor="#FFFFFF"><?php 
					if ($datepickerrequest != ""){
					echo $datepickerrequest = date('F j, Y', strtotime($datepickerrequest)); 
					}
					?></td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF"><strong>OIG Response date :</strong></td>
                    <td valign="top" bgcolor="#FFFFFF">
                    <?php
					if ( $datepickerresponse != "" ){
						echo $datepickerresponse = date('F j, Y', strtotime($datepickerresponse)); 
					}else{
						?>
                        <font color="#990000"> <?php
                        echo "Waiting to send response";	 ?>
                        </font>
                        <?php	
					}
					?>

                    </td>
                    <td colspan="2" valign="top" bgcolor="#FFFFFF"></td>
                    <td width="3%" colspan="1" valign="top" bgcolor="#FFFFFF">
                    
                    </td>
                 </tr>
                <tr>
                    <td colspan="5" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5" align="left" bgcolor="#FFFFFF"><font size="+1"><strong>Details of entity</strong></font></td>
                </tr>
                <tr>
                    <td colspan="5" align="left" bgcolor="#FFFFFF"><hr /></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>Name :</strong></td>
                  <td colspan="4" align="left" bgcolor="#FFFFFF"><?php echo $name ?></td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>Alternative name :</strong></td>
                  <td colspan="4" align="left" bgcolor="#FFFFFF"><?php echo $alt_name ?></td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>DOB :</strong></td>
                  <td colspan="4" align="left" bgcolor="#FFFFFF"><?php 
					if ($datepickerdob != ""){
					echo $datepickerdob = date('F j, Y', strtotime($datepickerdob)); 
					}
					?></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF"><strong>Email : </strong></td>
                  <td colspan="4" valign="top" bgcolor="#FFFFFF"><?php echo $email ?></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF"><strong>Notes</strong></td>
                  <td colspan="4" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="5" valign="top" bgcolor="#FFFFFF"><?php echo nl2br($notes) ?>
                  </td>
                </tr>
                </table>
    
</body>
</html>