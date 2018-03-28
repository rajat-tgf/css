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
</script>

 

<script>
$(function(){
  $.datepicker.setDefaults(
    $.extend($.datepicker.regional[''])
  );
  $('#date_received').datepicker({dateFormat: 'yy-mm-dd'});
  $('#date2').datepicker({dateFormat: 'yy-mm-dd'});


});
</script>



<script language="javascript">     
function validate(){  

if(document.new_allegation.priority.selectedIndex == 0){       

window.alert("You must select a priority for the complaint");      
 
return false;     
}   

if(document.new_allegation.country.selectedIndex == 0){       

window.alert("You must enter a country");      
 
return false;     
}



if(document.new_allegation.summary.value==""){       

window.alert("You must enter a title");      
 
return false;     
} 

if(document.new_allegation.date_received.value==""){       

window.alert("You must enter the date of when the complaint was received");      
 
return false;     
}


if(document.new_allegation.received_via.selectedIndex == 0){       

window.alert("You must select a method of referral");      
 
return false;     
}

if(document.new_allegation.referred_from.selectedIndex == 0){       

window.alert("You must select a category for Referred from");      
 
return false;     
}

if(document.new_allegation.source_category.selectedIndex == 0){       

window.alert("You must select a source category");      
 
return false;     
}

if(document.new_allegation.source_subcategory.selectedIndex == 0){       

window.alert("You must select a source subcategory");      
 
return false;     
}




if(document.new_allegation.allegations.value==""){       

window.alert("You must enter a description of the allegations");      
 
return false;     
}


if(document.new_allegation.date2.value==""){       

window.alert("You must enter the date of when the complaint was acknowledged");      
 
return false;     
}

if(document.forms[0].profile_id_to_link.value == false){       

window.alert("You must select a complainant.");      
 
return false;     
}  

} 

</script>

<script language="javascript"> 
    $(function() {
        $("#dialoghelp51").dialog({
            autoOpen: false,
            draggable: false,
            resizable: false,
            height: 450,
            width: 700,
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
        $("#buttonhelp51").on("click", function() {
            $("#dialoghelp51").dialog("open");
        });
    });



	$(function() {
		$("#dialoghelp4").dialog({
			autoOpen: false,
			draggable: false,
			resizable: false,
			height: 400,
			width: 700,
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
		$("#buttonhelp4").on("click", function() {
			$("#dialoghelp4").dialog("open");
		});
	});
</script>
</head>

<body>



<div id="entities-contain1" align="center">
<form name="new_allegation" id="new_allegation" method="post" action="save_allegation.php" enctype="multipart/form-data" onSubmit="return validate();">

  
<table align="center">
  <tr>
    <td width="18%"><strong><font color="#FF0000">* </font>Type of Allegation :</strong></td>
    <td width="19%"><select name="type_allegation" id="type_allegation" class="text ui-widget-content ui-corner-all">
      <option value="" selected="selected">Reactive</option>
      <option value="Proactive">Proactive</option>
    </select></td>
    <td width="3%">&nbsp;</td>
    <td width="12%"><strong><font color="#FF0000">* </font>Referred from :</strong></td>
    <td width="16%"><select name="referred_from" id="referred_from" class="text ui-widget-content ui-corner-all">
      <option value=""></option>
      <option value="OIG Investigations">OIG Investigations</option>
      <option value="OIG Audit">OIG Audit</option>
      <option value="OIG Other">OIG Other</option>
      <option value="Secretariat">Secretariat</option>
      <option value="Secretariat (via LFA)">Secretariat (via LFA)</option>
      <option value="LFA">LFA</option>
      <option value="CCM">CCM</option>
      <option value="PR">PR</option>
      <option value="SR">SR</option>
      <option value="SSR">SSR</option>
      <option value="Supplier">Supplier</option>
      <option value="Inter-agency">Inter-agency</option>
      <option value="Other">Other</option>
      <optgroup label="Proactive">
        <option>Tactical Assessment</option>
        </optgroup>
      </select></td>
    <td width="12%"><strong><font color="#FF0000">* </font>Source Category :</strong></td>
    <td width="20%"><select name="source_category" id="source_category" class="text ui-widget-content ui-corner-all">
      <option value=""></option>
      <option value="Anonymous Whistleblower">Anonymous Whistleblower</option>
      <option value="Confidential Whistleblower">Confidential Whistleblower</option>
      <option value="Reporter">Reporter</option>
      <option value="Confidential Informant">Confidential Informant</option>
      <option value="Witness">Witness</option>
      <option value="Subject">Subject</option>
      <option value="Other">Other</option>
      <optgroup label="Proactive">
        <option>Tactical Assessment</option>
        </optgroup>
      </select></td>
  </tr>
  <tr>
    <td><strong><font color="#FF0000">* </font>Priority :</strong></td>
    <td><select name="priority" id="priority" class="text ui-widget-content ui-corner-all">
      <option></option>
      <option>Low</option>
      <option>Medium</option>
      <option>High</option>
      </select>
  &nbsp;&nbsp;&nbsp;<img src="images/question.jpg" width="35" height="35" align="top" id="buttonhelp51" /></td>
    <td>&nbsp;</td>
    <td><strong><font color="#FF0000">*</font> Source Sub-Category :</strong></td>
    <td><select name="source_subcategory" id="source_subcategory" class="text ui-widget-content ui-corner-all">
      <option value=""></option>
      <option value="OIG Investigations">OIG Investigations</option>
      <option value="OIG Audit">OIG Audit</option>
      <option value="OIG Other">OIG Other</option>
      <option value="Secretariat">Secretariat</option>
      <option value="Secretariat (via LFA)">Secretariat (via LFA)</option>
      <option value="LFA">LFA</option>
      <option value="CCM">CCM</option>
      <option value="PR">PR</option>
      <option value="SR">SR</option>
      <option value="SSR">SSR</option>
      <option value="Supplier">Supplier</option>
      <option value="Inter-agency">Inter-agency</option>
      <option value="Other">Other</option>
      <optgroup label="Proactive">
        <option>Tactical Assessment</option>
        </optgroup>
    </select></td>
    <td><strong><font color="#FF0000">* </font>Method of referral :</strong></td>
    <td><select name="received_via" id="received_via" class="text ui-widget-content ui-corner-all">
      <option></option>
      <option>Whistleblower E-mail</option>
      <option>Other E-mail</option>
      <option>Fax</option>
      <option>Post</option>
      <option>Personal complaint</option>
      <option>Online report</option>
      <option>External hotline</option>
      <option>Internal hotline</option>
      <optgroup label="Proactive">
        <option>Tactical Assessment</option>
        </optgroup>
    </select>&nbsp;&nbsp;&nbsp;<img src="images/question.jpg" width="35" height="35" id="buttonhelp4" align="top" /></td>
  </tr>
  <tr>
    <td><strong><font color="#FF0000">* </font>Country :</strong></td>
    <td><select name="country" id="country" class="text ui-widget-content ui-corner-all">
      <option></option>
      <?php
					   $result = sqlsrv_query($conncss,"SELECT * FROM countries ORDER BY country"); 
					  
                      while($row1 = sqlsrv_fetch_array($result)){
						  $country = $row1['country'];
							  echo "<option>$country</option>";
                      }
					  ?>
    </select></td>
    <td>&nbsp;</td>
    <td colspan="4"><strong><font color="#FF0000">* </font>Title :</strong></td>
  </tr>
  <tr>
    <td><strong><font color="#FF0000">* </font>Date Received :</strong></td>
    <td><input id="date_received" type="text" name="date_received" class="text ui-widget-content ui-corner-all"/></td>
    <td>&nbsp;</td>
    <td colspan="4"><input name="summary" type="text" id="summary" style="width:100%" maxlength="120" class="text ui-widget-content ui-corner-all"/></td>
  </tr>
  <tr>
    <td><strong>Disease Area :</strong></td>
    <td><select name="disease_area" id="disease_area" class="text ui-widget-content ui-corner-all">
      <option>N/A</option>
      <option>TB</option>
      <option>Malaria</option>
      <option>HIV</option>
      <option>HSS</option>
    </select></td>
    <td>&nbsp;</td>
    <td colspan="4"><strong><font color="#FF0000">* </font>Summary of allegations</strong></td>
  </tr>
  <tr>
    <td><strong><font color="#FF0000">* </font>Complaint acknowledged</strong></td>
    <td><input id="date2" type="text" name="date2" class="text ui-widget-content ui-corner-all"/></td>
    <td>&nbsp;</td>
    <td colspan="4" rowspan="3" valign="top"><p>
      <textarea name="allegations" id="allegations" style="width:100%" rows="20" class="text ui-widget-content ui-corner-all"></textarea>
    </p>
      <p><strong>Grant Number (s) :</strong> </p>
      <p>
        <textarea name="grant_number" id="grant_number" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all"></textarea>
      </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
    
    <table align="center" id="sample_1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Acronym</th>
          <th>Country</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
                            
                            $sql = "SELECT list_name.*, profiles.* ". "FROM list_name, profiles "."WHERE list_name.entity_id = profiles.list_name_id AND profiles.category != 'Subject' AND profiles.category != 'Other' AND profiles.category != 'Witness' ORDER BY name ASC";
                            
                            $sql_result = sqlsrv_query($conncss, $sql);
                            
                            while ($row = sqlsrv_fetch_array($sql_result)) {
                            $entity_id_to_link = $row['entity_id'];
                            $type_entity = $row['type_entity'];
                            $name = $row['name'];
                            $alt_name = $row["alternative_name"];
                            $accro = $row["accro"];
                            $head_country = $row["head_country"];
                            
                            $complainant_entity_profile_id = $row["id"];
                            $whistleblower_protection = $row["whistleblower_protection"];
                            $whistleblower_protection = $row["whistleblower_protection"];
                            $witness_protection = $row["witness_protection"];
                            $category = $row["category"];
                            ?>
        <tr>
          <td><?php
                            if ( $type_entity != "Person" ){
                            $icon = "entity-icon.png";
                            }else{
                            $icon = "user-silhouette-icon.png";
                            }
                            
                            ?>
            <img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle" title="Person"/> <font color="#136CD9"><strong> <?php echo $row["name"]; 
                            echo "</strong></font>";
                            echo "</font>";
                            if ( $alt_name != "" ){
                            echo "<br />";
                            echo "<font size='-1' color='#999999'>";
                            echo "( ".$alt_name." )";
                            echo "</font>";
                            }
                            ?> <br />
            <img src="images/profile-icon.png" width="12" height="12" align="absmiddle"/> <font> <strong>Category : </strong><font color="#990000"><?php echo $category; ?></font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php
                            if ( $whistleblower_protection == "Yes" ){
                            ?>
              <img src="images/Protect-Red-icon.png" width="23" height="23" align="top" title="Whistleblower Protection"/>
              <?php
                            }
                            ?>
              <br />
              <strong>Type : </strong><?php echo $row["type"]; ?> <br />
              <strong>Position : </strong><?php echo $row["position"]; ?> <br />
              <strong>Email : </strong><?php echo $row["email1"]; ?> <br />
            </font> <br /></td>
          <td><font color="#136CD9"><strong> <?php echo $accro; ?></strong></font></td>
          <td><font color="#136CD9"><strong> <?php echo $head_country; ?></strong></font></td>
          <td align="right"><input type="radio" id="profile_id_to_link" name="profile_id_to_link" value="<?php echo $complainant_entity_profile_id; ?>" title="<?php echo $complainant_entity_profile_id; ?>"/></td>
        </tr>
        <?php	
                            }
                            ?>
      </tbody>
    </table></td>
    <td>&nbsp;</td>
    </tr>
</table>
</form>

</div>


      <script type="text/javascript" src="js/jquery.dataTables1.js"></script>
      <script src="js/dynamic-table1.js"></script>
      
      
<div id="dialoghelp51" title="Help">
    <font style="font-size:13px">
    <font color="#C10005">High Priority </font><br />
    •	Criminal aspect to allegation – terrorist financing, police investigation etc<br />
    •	Referral from Secretariat – with expectation   of OIG support<br />
    •	New allegation to be merged with existing investigation case – and mission imminent<br />
    •	Referral from OIG management – with decree of urgency<br /><br />
    <font color="#FF9933">Medium Priority</font><br />
    •	Those cases not identified as high or low priority<br /><br />
    <font color="#339933">Low Priority</font><br />
    •	Not within OIG mandate<br />
    •	Minor programmatic issue – low level of program consequence<br />
    •	Complaints from individuals  based on employment  matters<br />
    •	Information referred to OIG for interest of advocacy reasons - health petitions etc<br />
    </font>
</div>
<div id="dialoghelp4" title="Help">
    <font style="font-size:13px">
    <p><strong>Whistleblower E-mail : </strong>I speak out now email account</p>
    <p><strong>Other E-mail : </strong>IG email account. This email account will be used for the Secretariat to report allegations</p>
    <p><strong>Fax : </strong>Fax machine</p>
    <p><strong>Post : </strong>Letter received by post</p>
    <p><strong>Personal complaint : </strong> Complaints received by a person who directly talked to an OIG staff member</p>
    <p><strong>Online Report : </strong>NAVEX online form</p>
    <p><strong>External hotline : </strong>NAVEX phone hotline</p>
    <p><strong>Internal hotline : </strong>OIG phone hotline</p>
    </font>
</div>
</body>
</html>