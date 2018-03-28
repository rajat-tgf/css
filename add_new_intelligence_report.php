 <?php
require_once("includes\security.php");
$Security->GoSecure();
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
	$( "input[type=submit], button" )
	.button()
	});

$(function(){
  $('#datepickerrequest').datepicker({dateFormat: 'yy-mm-dd'});
});
$(function(){
  $('#datepickerresponse').datepicker({dateFormat: 'yy-mm-dd'});
});
$(function(){
  $('#datepickerdob').datepicker({dateFormat: 'yy-mm-dd', changeYear:true, yearRange: "1900:2025"});

});
$(function(){
  $.datepicker.setDefaults(
    $.extend($.datepicker.regional[''])
  );
  $('#date_received').datepicker({dateFormat: 'yy-mm-dd'});
  $('#date_report_complete').datepicker({dateFormat: 'yy-mm-dd'});


});

function validate(){  

if(document.new_ir.date_received.value==""){ 

window.alert("You must enter the date of when the information was received");       
return false;     
}

if(document.new_ir.reporter.selectedIndex == 0){       

window.alert("You must select a reporter");      
 
return false;     
}

if(document.new_ir.information_source.value==""){       

window.alert("Information source field can not be empty");      
 
return false;     
}

if(document.new_ir.country.selectedIndex == 0){       

window.alert("You must select a country");      
 
return false;     
}

if(document.new_ir.entities_interest.value==""){       

window.alert("Entities of interest field can not be empty");      
 
return false;     
}

if(document.new_ir.title.value==""){       

window.alert("Title field can not be empty");      
 
return false;     
}
if(document.new_ir.circumstances.value==""){       

window.alert("Circumstances field can not be empty");      
 
return false;     
}
if(document.new_ir.information_recieved.value==""){       

window.alert("Information received field can not be empty");      
 
return false;     
}
if(document.new_ir.comments.value==""){       

window.alert("Comments field can not be empty");      
 
return false;     
}
}
</script>


</head>

<body>


<form name = "new_ir" id= "new_ir" action="save_new_intelligence_report.php" method="post" enctype="multipart/form-data" onSubmit="return validate();">
                
        
<table width="100%" align="center" style="background-color:#FFFFFF">
  <tr>
    <td align="center"><button TYPE = "Submit" Name = "Submit" VALUE = "Submit report">Save New Intelligence Report</button></td>
    </tr>
</table>
<br>                
                
<table width="98%" align="center" class="zui-table zui-table-rounded" style="background-color:#FFFFFF">
  <tr>
    <th height="47" colspan="2" align="center" bgcolor="#4B768D"><font color="#FFF"; size="+3"><strong>Intelligence Report</strong></font></th>
    </tr>
  <tr>
    <td width="21%" valign="top" ><strong>Date information received</strong></td>
    <td width="79%" style="background-color:#FFFFFF; border-color:#FFFFFF"><input id="date_received" type="text" name="date_received" class="text ui-widget-content ui-corner-all"/></td>
    </tr>
      <tr>
    <td valign="top"><strong>Reporter</strong></td>
    <td style="background-color:#FFFFFF">
    <select name="reporter" id="reporter" class="text ui-widget-content ui-corner-all">
              <option></option>
              <option>Secretariat</option>
              <optgroup label="Investigators">
                    <?php
					  $result = sqlsrv_query($conn,"SELECT * FROM investigators ORDER BY investigator ASC"); 
                      while($row = sqlsrv_fetch_array($result)){
						  $username = $row['investigator'];
						  $active = $row['active'];
						  if ($active == 'yes'){
						  	echo "<option>$username</option>";
						  }
                      }
					  ?>
                </optgroup>
                <optgroup label="Auditors">
                    <?php
					  $result = sqlsrv_query($conn,"SELECT * FROM auditors ORDER BY auditor ASC"); 
                      while($row = sqlsrv_fetch_array($result)){
						  $username = $row['auditor'];
						  	echo "<option>$username</option>";
                      }
					  ?>
                </optgroup>
            </select>
    </td>
    </tr>
      <tr>
        <td valign="top"><strong>Case / Allegation Number related to</strong></td>
        <td style="background-color:#FFFFFF">
        <select name="allegation" id="allegation" class="text ui-widget-content ui-corner-all">
        <option>N/A</option>
        <?php
        $result_all_allegations = sqlsrv_query($conncss,"SELECT * FROM allegation_details"); 
         while($row_all_allegation = sqlsrv_fetch_array($result_all_allegations)){
            $country_allegation = $row_all_allegation['country'];
            $allegation_number = $row_all_allegation['id'];
            echo "<option value='$allegation_number'>$allegation_number$dash$country_allegation</option>";
        }
        ?>
      </select>
        
        </td>
      </tr>
      <tr>
        <td valign="top"><strong>Date report completed</strong></td>
        <td style="background-color:#FFFFFF"><?php $date_creation = date('Y-m-d'); 
		
		echo $date_creation = date('F j, Y', strtotime($date_creation));
		
		?></td>
      </tr>
      <tr>
    <td valign="top"><strong>Information source</strong></td>
    <td style="background-color:#FFFFFF">
    <textarea name="information_source" id="information_source" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all"></textarea>
    
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Country</strong></td>
    <td style="background-color:#FFFFFF">
    <select name="country" id="country" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
       $result = sqlsrv_query($conncss,"SELECT * FROM countries ORDER BY country"); 
      
      while($row1 = sqlsrv_fetch_array($result)){
          $country = $row1['country'];
              echo "<option>$country</option>";
      }
      ?>
    </select>
    </td>
  </tr>
  <tr>
    <td valign="top" ><strong>Entities of interest</strong></td>
    <td style="background-color:#FFFFFF">
    <textarea name="entities_interest" id="entities_interest" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all"></textarea>
    </td>
    </tr>
  <tr>
    <td valign="top"><strong>Supporting documents?</strong></td>
    <td style="background-color:#FFFFFF">
    <select name="docs" id="docs" class="text ui-widget-content ui-corner-all">
        <option></option>
        <option>Yes</option>
        <option>No</option>
      </select>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Urgent / Immediate action required?</strong><br><br>

(Further explanation)
    </td>
    <td style="background-color:#FFFFFF"><p>
      <select name="urgent" id="urgent" class="text ui-widget-content ui-corner-all">
        <option></option>
        <option>Yes</option>
        <option>No</option>
      </select>
<br>
        <textarea name="further_explanation" id="further_explanation" style="width:100%" rows="13" class="text ui-widget-content ui-corner-all"></textarea>
      </td>
    </tr>
    
    
 <tr>
    <td colspan="2" valign="top" style="background-color:#FFFFFF"><br />
<br />


    <table align="center" style="background-color:#FFFFFF" class="zui-table zui-table">
    <tr>
      <td colspan="3"><font color="#66696C" size="+0.5"><strong>Source Evaluation</strong></font></td>
      <td colspan="3"><font color="#66696C" size="+0.5"><strong>Information/Intel Evaluation</strong></font></td>
      </tr>
    <tr>
      <td width="2%" style="background-color:#FFFFFF"><strong>A</strong></td>
      <td width="3%" style="background-color:#FFFFFF"><input name="checkbox1" type="checkbox" value="" class="ui-widget" <?php echo $checkbox1 ?>/></td><td width="34%" style="background-color:#FFFFFF"><strong>Always  reliable</strong></td>
      <td width="1%" style="background-color:#FFFFFF"><strong>1</strong></td>
      <td width="2%" style="background-color:#FFFFFF"><input name="checkbox2" type="checkbox" value="" class="ui-widget" <?php echo $checkbox2 ?>/></td><td width="58%" style="background-color:#FFFFFF"><strong>True</strong>
        (known to be true without reservation & confirmed by other sources)
      </td></tr>
    <tr>
      <td style="background-color:#FFFFFF"><strong>B</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox3" type="checkbox" value="" class="ui-widget" <?php echo $checkbox3 ?>/></td><td style="background-color:#FFFFFF"><strong>Mostly  reliable</strong></td>
      <td style="background-color:#FFFFFF"><strong>2</strong></td>
    <td style="background-color:#FFFFFF"><input name="checkbox4" type="checkbox" value="" class="ui-widget" <?php echo $checkbox4 ?>/></td><td style="background-color:#FFFFFF"><strong>Probably  true</strong>
    (known personally to source & confirmed in part by other sources)
    </td></tr>
    <tr>
      <td style="background-color:#FFFFFF"><strong>C</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox5" type="checkbox" value="" class="ui-widget" <?php echo $checkbox5 ?>/></td><td style="background-color:#FFFFFF"><strong>Sometimes  reliable</strong></td>
      <td style="background-color:#FFFFFF"><strong>3</strong></td>
    <td style="background-color:#FFFFFF"><input name="checkbox6" type="checkbox" value="" class="ui-widget" <?php echo $checkbox6 ?>/></td>
    <td style="background-color:#FFFFFF"><strong>Possibly  true</strong>
(not personally known to source but corroborated in part by other sources)
</td></tr>
    <tr>
      <td style="background-color:#FFFFFF"><strong>D</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox7" type="checkbox" value="" class="ui-widget" <?php echo $checkbox7 ?>/></td>
      <td style="background-color:#FFFFFF"><strong>Unreliable</strong></td>
      <td style="background-color:#FFFFFF"><strong>4</strong></td>
    <td style="background-color:#FFFFFF"><input name="checkbox8" type="checkbox" value="" class="ui-widget" <?php echo $checkbox8 ?>/></td><td style="background-color:#FFFFFF"><strong>Doubtful</strong>
(unconfirmed and contradicts estimate/cannot be judged)
</td></tr>
    <tr>
      <td style="background-color:#FFFFFF"><strong>E</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox9" type="checkbox" value="" class="ui-widget" <?php echo $checkbox9 ?>/></td>
      <td style="background-color:#FFFFFF"><strong>Untested  source</strong></td>
      <td style="background-color:#FFFFFF"><strong>5</strong></td>
      <td style="background-color:#FFFFFF"><input name="checkbox10" type="checkbox" value="" class="ui-widget" <?php echo $checkbox10 ?>/></td>
      <td style="background-color:#FFFFFF"><strong>Probably  false</strong>
(suspected to be false or malicious) 
</td>
    </tr>
</table><br />
<br />

</td>
</tr>   
    
    
    
  <tr>
    <td valign="top"><strong>Title</strong></td>
    <td style="background-color:#FFFFFF"><input name="title" type="text" id="title" style="width:100%" maxlength="200" class="text ui-widget-content ui-corner-all"/></td>
    </tr>
  <tr>
    <td colspan="2" valign="top" style="background-color:#FFFFFF">
    <br>
    <strong>1. What were  the circumstances of your contact with the source – describe?</strong><br>
<textarea name="circumstances" id="circumstances" style="width:100%" rows="20" class="text ui-widget-content ui-corner-all"></textarea>
<br>
<br>

<strong>2. Information received from source</strong><br>
<textarea name="information_recieved" id="information_recieved" style="width:100%" rows="20" class="text ui-widget-content ui-corner-all"></textarea>
<br>
<br>

<strong>3. OIG comments and assessment</strong><br>
<textarea name="comments" id="comments" style="width:100%" rows="20" class="text ui-widget-content ui-corner-all"></textarea>
</td>
</tr>


</table>

</form>



</body>
</html>