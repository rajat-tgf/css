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
<title>CSS</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 


<div id="dialog" title="Help">
<font style="font-size:13px">
<p><strong>Subject</strong></p>
    <p>A person or organization as a subject of interest, alleged or suspected to be involved in wrong doing.</p>
    <p><strong>Whistleblower</strong></p>
    <p>A person who in good faith alerts a third party that a person or entity is doing something wrong, or reports a concern, allegation or information that indicates a prohibited practice is occurring, or has occurred in the Global Fund, or a Global Fund financed operation.

The Global Fund is committed to safeguard whistle-blowers, and provides the opportunity to treat all whistle-blowing reports as either confidential or anonymous, the choice of which remains that of the whistle-blower alone to choose.</p>
    <p><strong>Reporter</strong></p>
    <p>A reporter is a generic term to describe a person or organization who makes a firsthand report or refers by some means a report of alleged wrongdoing, concern, complaint or allegation, and who is prepared to be openly associated with the role of reporting such issues.</p>
    <p><strong>Confidential Informant</strong></p>
    <p>A confidential informant is a person purposefully identified within a case assessment, or within an investigation, or who has come forward to voluntarily assist an investigation, and who provides information to the investigator in good faith, but ‘in confidence’ in order to protect against any retaliation towards them, or otherwise public disclosure of their confidential support role to an investigation.</p>
    <p><strong>Witness</strong></p>
    <p>A witness is a person who has been identified within a case assessment as a potential witness, or by an investigation, or who has otherwise assisted an investigation, who voluntarily or under legal compulsion provides testimonial evidence in open support to that investigation, often in the form of a witness statement, or record of interview that may be publically disclosed.</p>
    <p><strong>Other</strong></p>
    <p>‘Other persons’ are reporters or alternative sources of information that otherwise do not fit the specific definitions or status of person.</p>
</font>
</div>

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


	$(function() {
		$("#dialog").dialog({
			position: "center",
			autoOpen: false,
			draggable: false,
			resizable: false,
			height: 700,
			width: 800,
			modal: true,
		});
		$("#button").on("click", function() {
			$("#dialog").dialog("open");
		});
	});
</script>
<script type="text/javascript">
	function showDialog(sr){
	show_sr_Popup(sr);
	};
	
	function showDialogcase(ref_number){
	show_case_Popup(ref_number);
	};

	function showDialogir(ir){
	show_ir_Popup(ir);
	};

	function showDialognewallegation(){
	show_new_allegation_Popup();
	};
	
	function showDialognewir(){
	show_new_ir_Popup();
	};
	
	function showDialognewentity(){
	show_new_entity_Popup();
	};
	
	function showDialognewcheck(){
	show_new_check_Popup();
	};
	
	function showDialogfollowup(id_follow_up){
	show_follow_up_Popup(id_follow_up);
	};
	
	
	function showDialogfollowupir(id_follow_up){
	show_follow_up_ir_Popup(id_follow_up);
	};
	
	
	$(function(){
  $.datepicker.setDefaults(
    $.extend($.datepicker.regional[''])
  );
  $('#date_received').datepicker({dateFormat: 'yy-mm-dd'});
  $('#date2').datepicker({dateFormat: 'yy-mm-dd'});
  $('#date_received_info').datepicker({dateFormat: 'yy-mm-dd'});


});
	


	function showDialogentitydetails(entity_id){
	   $("#divIdentitydetails").dialog("open");
	   $("#modalIframeIdentitydetails").attr("src","info_entity_details.php?entity_id=" + entity_id);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdentitydetails").dialog({
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
			   height: 760,
			   width: 1300,
			   resizable: false,
			   draggable: false,
		  });
		  
		  
});


function show_sr_Popup(allegation_id){
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
			   width: 1050,
			   resizable: false,
			   draggable: false,
			   position: 'top',
			   

		  });
	});
	
	
function show_follow_up_Popup(id_follow_up){
	   $("#divfollowupsrdetails").dialog("open");
	   $("#modalIframeIdfollowupsrdetails").attr("src","follow_up_details_sr.php?id_follow_up=" + id_follow_up);
	   return false;
	}
	$(document).ready(function() {
	   $("#divfollowupsrdetails").dialog({
		   show: {
					effect: 'clip',
					duration: 1000
				},
				hide: {
					effect: 'clip',
					duration: 1000
				},
			   autoOpen: false,
			   modal: true,
			   height: 785,
			   width: 980,
			   resizable: false,
			   draggable: false,
			   position: 'top',
			   

		  });
	});	
	
	
function show_follow_up_ir_Popup(id_follow_up){
	   $("#divfollowupsrdetails").dialog("open");
	   $("#modalIframeIdfollowupsrdetails").attr("src","follow_up_details_ir.php?id_follow_up=" + id_follow_up);
	   return false;
	}
	$(document).ready(function() {
	   $("#divfollowupsrdetails").dialog({
		   show: {
					effect: 'clip',
					duration: 1000
				},
				hide: {
					effect: 'clip',
					duration: 1000
				},
			   autoOpen: false,
			   modal: true,
			   height: 785,
			   width: 980,
			   resizable: false,
			   draggable: false,
			   position: 'top',
			   

		  });
	});		
	



function show_ir_Popup(id_report){
	   $("#divIdcheck").dialog("open");
	   $("#modalIframeIdfcheck").attr("src","ir_details.php?id_report=" + id_report);
	   return false;
	}
	$(document).ready(function() {
	   $("#divIdcheck").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 940,
			   width: 1220,
			   resizable: false,
			   draggable: false,
			   
		  });
	});
	
	
	
function show_case_Popup(ref_number){
	   $("#divcase").dialog("open");
	   $("#modalIframeIdcase").attr("src","cases_details_search.php?ref_number=" + ref_number);
	   return false;
	}
	$(document).ready(function() {
	   $("#divcase").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 940,
			   width: 1450,
			   resizable: false,
			   draggable: false,
			   
		  });
	});	
	

function show_report_Popup(report) {
		$("#divIdreport").dialog({
		height: 925,
		width: 1180,
		resizable: false,
		draggable: false,
		modal: true,
		position: 'center'	
		});
		$("#modalIframeIdreport").attr("src","../portal/files/reports/" + report);
}
	
	
function show_new_ir_Popup(){
   $("#divIdnewir").dialog("open");
   return false;
}

$(function() {
	   $("#divIdnewir").dialog({
			   autoOpen: false,
			   modal: true,
				height: 950,
				width: 1250,
			   resizable: false,
			   draggable: false,
			   buttons : {
                "Save" : function() {
				$('#new_intel').submit();
					dialog.dialog( "close" );
					
                },
				Cancel: function() {
				  $( this ).dialog( "close" );
				}
				}
			   
		  });
	});



function show_new_entity_Popup(){
   $("#divIdnewentity").dialog("open");
   return false;
}

$(function() {
	   $("#divIdnewentity").dialog({
			   autoOpen: false,
			   modal: true,
				height: 950,
				width: 1150,
			   resizable: false,
			   draggable: false,
			   buttons : {
                "Save" : function() {
				$('#new_entity').submit();
					dialog.dialog( "close" );
					
                },
				Cancel: function() {
				  $( this ).dialog( "close" );
				}
				}
			   
		  });
	});
	
	
	
function show_new_check_Popup(){
   $("#divIdnewcheck").dialog("open");
   return false;
}

$(function() {
	   $("#divIdnewcheck").dialog({
			   autoOpen: false,
			   modal: true,
				height: 760,
				width: 430,
			   resizable: false,
			   draggable: false,
			   buttons : {
                "Save" : function() {
				$('#newcheck').submit();
					dialog.dialog( "close" );
					
                }
				}
			   
		  });
	});	
	






function showDialog_new_allegation(){
   $("#divIdnewallegation").dialog("open");
   return false;
}

$(function() {
    $("#divIdnewallegation").dialog({
      autoOpen: false,
      height: 950,
	  width: '95%',
      modal: true,
	  resizable: false,
      draggable: false,
      buttons: {
        "Save": function() {
			$('#new_allegation').submit();
			alert("dasdsadsadas");
			dialog.dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});






function showDialog_allocate_allegation(){
   $("#dialog-form-allocate-allegation").dialog("open");
   return false;
}

$(function() {
    $( "#dialog-form-allocate-allegation" ).dialog({
      autoOpen: false,
      height: 230,
	  width: 500,
      modal: true,
      buttons: {
        "Allocate": function() { //on click of save button of dialog
            $('#allocation').submit();
			dialog.dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});




function showDialog_allocate_ir(){
   $("#dialog-form-allocate-ir").dialog("open");
   return false;
}

$(function() {
    $( "#dialog-form-allocate-ir" ).dialog({
      autoOpen: false,
      height: 230,
	  width: 500,
      modal: true,
      buttons: {
        "Allocate": function() { //on click of save button of dialog
            $('#allocationir').submit();
			dialog.dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});



function showDialog_reallocate_allegation(){
   $("#dialog-form-reallocate-allegation").dialog("open");
   return false;
}

$(function() {
    $( "#dialog-form-reallocate-allegation" ).dialog({
      autoOpen: false,
      height: 230,
	  width: 500,
      modal: true,
      buttons: {
        "Re-Allocate": function() { //on click of save button of dialog
            $('#reallocation').submit();
			dialog.dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});




function showDialog_reallocate_ir(){
   $("#dialog-form-reallocate-ir").dialog("open");
   return false;
}

$(function() {
    $( "#dialog-form-reallocate-ir" ).dialog({
      autoOpen: false,
		height: 230,
		width: 500,
      modal: true,
      buttons: {
        "Re-Allocate": function() { //on click of save button of dialog
            $('#reallocateintelligence').submit();
			dialog.dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});



function showDialogreport(){
   $("#reportdivId").dialog("open");
   return false;
}

$(function() {
    $( "#reportdivId" ).dialog({
      autoOpen: false,
      height: 190,
	  width: 450,
      modal: true,
      buttons: {
        "Generate Report": function() { //on click of save button of dialog
            $('#report').submit();
			dialog.dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});


function showDialogrereport(){
   $("#reredivId").dialog("open");
   return false;
}

$(function() {
    $( "#reredivId" ).dialog({
      autoOpen: false,
      height: 220,
	  width: 450,
      modal: true,
      buttons: {
        "Generate Report": function() { //on click of save button of dialog
            $('#rereport').submit();
			dialog.dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});



</script>


<script type="text/javascript">
function validate1(){  
	if(document.allocation.id_number.selectedIndex == 0){       
	
	window.alert("You must select an Allegation");      
	 
	return false;     
	}   
	
	if(document.allocation.team_member.selectedIndex == 0){       
	
	window.alert("You must select a member");      
	 
	return false;     
	}
	
}
function validate2(){	
	if(document.reallocation.id_number.selectedIndex == 0){       
	
	window.alert("You must select an Allegation");      
	 
	return false;     
	}   
	
	if(document.reallocation.team_member.selectedIndex == 0){       
	
	window.alert("You must select a member");      
	 
	return false;     
	}
}

function validate3(){	
	if(document.allocationir.id_number.selectedIndex == 0){       
	
	window.alert("You must select an Intelligence Report");      
	 
	return false;     
	}   
	
	if(document.allocationir.team_member.selectedIndex == 0){       
	
	window.alert("You must select a member");      
	 
	return false;     
	}
}
	
function validate4(){	
	if(document.reallocateintelligence.id_number.selectedIndex == 0){       
	
	window.alert("You must select an Intelligence Report");      
	 
	return false;     
	}   
	
	if(document.reallocateintelligence.team_member.selectedIndex == 0){       
	
	window.alert("You must select a member");      
	 
	return false;     
	}
}
</script>

<script language="javascript">     
function validatenew_allegation(){  

if(document.new_allegation.priority.selectedIndex == 0){       

window.alert("You must select a priority for the allegation");      
 
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

window.alert("You must enter the date of when the allegation was received");      
 
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

window.alert("You must enter the date of when the allegation was acknowledged");      
 
return false;     
}

if(document.new_allegation.profile_id_to_link.value == false){       

window.alert("You must select a complainant.");      
 
return false;     
}  

} 



function validatenew_ir(){  

if(document.new_intel.date_received_info.value==""){ 

window.alert("You must enter the date of when the information was received");       
return false;     
}

if(document.new_intel.reporter.selectedIndex == 0){       

window.alert("You must select a reporter");      
 
return false;     
}

if(document.new_intel.information_source.value==""){       

window.alert("Information source field can not be empty");      
 
return false;     
}

if(document.new_intel.country.selectedIndex == 0){       

window.alert("You must select a country");      
 
return false;     
}

if(document.new_intel.entities_interest.value==""){       

window.alert("Entities of interest field can not be empty");      
 
return false;     
}

if(document.new_intel.title.value==""){       

window.alert("Title field can not be empty");      
 
return false;     
}
if(document.new_intel.circumstances.value==""){       

window.alert("Circumstances field can not be empty");      
 
return false;     
}
if(document.new_intel.information_recieved.value==""){       

window.alert("Information received field can not be empty");      
 
return false;     
}
if(document.new_intel.comments.value==""){       

window.alert("Comments field can not be empty");      
 
return false;     
}
}


function validatenewentity(){  

	if(document.new_entity.type_entity.selectedIndex == 0){
	
	window.alert("You must select an entity type (Person or Organization)");      
	 
	return false;     
	}
	
	if(document.new_entity.name_entity.value == ""){       
	
	window.alert("You must write the name of the entity");      
	 
	return false;     
	}
	
	
	if(document.new_entity.category.selectedIndex == 0){
	
	window.alert("You must select a Category for the entity log ");
	 
	return false;     
	} 
	
	if(document.new_entity.type_profile.selectedIndex == 0){
	
	window.alert("You must select a Type for the entity log ");
	 
	return false;     
	}

} 


    $(function() {
        $("#dialoghelp5").dialog({
            autoOpen: false,
            draggable: false,
            resizable: false,
            height: 450,
            width: 700,
            modal: true,
            position: 'center',
            show: {
                effect: 'fade',
                duration: 500
            },
            hide: {
                effect: 'fade',
                duration: 500
            },
        });
        $("#buttonhelp5").on("click", function() {
            $("#dialoghelp5").dialog("open");
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
			position: 'center',
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
<header id="header">
                <div id="logo">
                    Complaint Screening System
                </div>
</header>
        <nav id="nav">
            <div class="innertube">
                <iframe src="side_menu_bar.php" name="side_menu" style="position: absolute; height: 99%; width: 99%; border: none" >
                </iframe> 
            </div>
        </nav>
  

		       
        <main>
			<div class="innertube">
				<iframe  src="right_page.php" name="contentRight" id="contentRight" align="top" style="position: absolute; height: 99%; width: 100%; border: none">
        		</iframe>
			</div>
		</main>
        
         <footer id="footer">
			<div class="innertube">
                <table width="100%" align="center">
                <tr>
                <td align="center"></td>
                </tr>
                </table>
			</div>
		</footer>

<div id="divIdentitydetails" title="Entity Details" align="center">
        <iframe id="modalIframeIdentitydetails" frameborder="0" width="1240" height="695">
        Your browser is not supported
        </iframe>
</div>


        
<div id="divscreeningreport" title="Screening Report Details">
    <iframe id="modalIframeIdal" frameborder="0" width="1010" height="850">
    Your browser is not supported
    </iframe>
</div>     

<div id="divfollowupsrdetails" title="Follow Up details">
    <iframe id="modalIframeIdfollowupsrdetails" frameborder="0" width="960" height="710">
    Your browser is not supported
    </iframe>
</div>    

<div id="divcase" title="Case Details">
    <iframe id="modalIframeIdcase" frameborder="0" width="1400" height="850">
    Your browser is not supported
    </iframe>
</div>     

<div id="divIdcheck" title="Intelligence Report details">
    <iframe id="modalIframeIdfcheck" frameborder="0" width="1190" height="870">
    Your browser is not supported
    </iframe>
</div>  





<div id="divIdnewallegation" title="Add new Allegation">

<form name="new_allegation" id="new_allegation" method="post" action="save_allegation.php" enctype="multipart/form-data" onSubmit="return validatenew_allegation();">
<div id="entities-contain1" align="center">
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
  &nbsp;&nbsp;&nbsp;<img src="images/question.jpg" name="buttonhelp5" width="35" height="35" align="top" id="buttonhelp5" /></td>
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
    </select>
    <img src="images/question.jpg" width="35" height="35" id="buttonhelp4" align="top" /></td>
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
</div>
</form>
</div>  




<div id="divIdnewir" title="Add new Intelligence Report">
<form name = "new_intel" id= "new_intel" action="save_new_intelligence_report.php" method="post" enctype="multipart/form-data" onSubmit="return validatenew_ir();">
           
                
<table width="98%" align="center" class="zui-table zui-table-rounded" style="background-color:#FFFFFF">
  <tr>
    <th height="47" colspan="2" align="center" bgcolor="#4B768D"><font color="#FFF"; size="+3"><strong>Intelligence Report</strong></font></th>
    </tr>
  <tr>
    <td width="21%" valign="top" ><strong>Date information received</strong></td>
    <td width="79%" style="background-color:#FFFFFF; border-color:#FFFFFF"><input id="date_received_info" type="text" name="date_received_info" class="text ui-widget-content ui-corner-all"/></td>
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







</div>


<div id="dialog-form-allocate-allegation" title="Allocate Allegation">
        <form id = "allocation" name = "allocation" method="post" action="save_allocated_allegation.php" onSubmit="return validate1();">
        <table width="363" border="0" align="center" class="gridtable">
        <tr>
        <td width="142" height="28" align="center"><strong>Allegation :</td>
        <td width="203">
        <select name="id_number" id="id_number" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_allegations_no_allocated = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = 'Not Allocated' AND status = 'Screening Review'"); 
        while($row_allegations_no_allocated = sqlsrv_fetch_array($result_allegations_no_allocated)){
        
        $id = $row_allegations_no_allocated['id'];
        $country = $row_allegations_no_allocated['country'];
        
        echo "<option value='$id'>$id - $country</option>";
        }
        ?>
        </select>
        </td>
        </tr>
        <tr>
        <td height="36" align="center"><strong>Member :</td>
        <td>
        <select name="team_member" id="team_member" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_officer = sqlsrv_query($conn,"SELECT * FROM screening_officer"); 
        while($row_officer = sqlsrv_fetch_array($result_officer)){
        $officer = $row_officer['name'];
        echo "<option value='$officer'>$officer</option>";
        }
        $result_members = sqlsrv_query($conn,"SELECT * FROM screening_member"); 
        while($row_members = sqlsrv_fetch_array($result_members)){
        $team_member = $row_members['name'];
        echo "<option value='$team_member'>$team_member</option>";
        }
        ?>
        </select>
        </td>
        </tr>
        </table>
        </form>
</div>




<div id="dialog-form-allocate-ir" title="Allocate Intelligence Report">
        <form id = "allocationir" name = "allocationir" method="post" action="save_allocated_intelligence_report.php" onSubmit="return validate3();">
        <table width="363" border="0" align="center" class="gridtable">
        <tr>
        <td width="142" height="28" align="center"><strong>Intelligence Report :</td>
        <td width="203">
        <select name="id_number" id="id_number" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_allegations_no_allocated = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE member = 'Not Allocated' AND status = 'Under Review'"); 
        while($row_allegations_no_allocated = sqlsrv_fetch_array($result_allegations_no_allocated)){
        
        $id = $row_allegations_no_allocated['id'];
        $country = $row_allegations_no_allocated['country'];
        ?>
        <option value="<?php echo $id ?>">IR<?php echo $id ?> - <?php echo $country ?></option>
<?php } ?>
        </select>
        </td>
        </tr>
        <tr>
        <td height="36" align="center"><strong>Member :</td>
        <td>
        <select name="team_member" id="team_member" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_officer = sqlsrv_query($conn,"SELECT * FROM screening_officer"); 
        while($row_officer = sqlsrv_fetch_array($result_officer)){
        $officer = $row_officer['name'];
        echo "<option value='$officer'>$officer</option>";
        }
        $result_members = sqlsrv_query($conn,"SELECT * FROM screening_member"); 
        while($row_members = sqlsrv_fetch_array($result_members)){
        $team_member = $row_members['name'];
        echo "<option value='$team_member'>$team_member</option>";
        }
        ?>
        </select>
        </td>
        </tr>
        </table>
        </form>
</div>
                
                
<div id="dialog-form-reallocate-allegation" title="Re-Allocate Allegation">
        <form id = "reallocation" name = "reallocation" method="post" action="save_re_allocated_allegation.php" enctype="multipart/form-data" onSubmit="return validate2();">
        <table border="0" align="center"  class="gridtable">
        <tr>
        <td height="28"><strong>Allegation :</td>
        <td>
        <select name="id_number" id="id_number" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_allegations_no_allocated = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member != 'Not Allocated' AND status = 'Screening Review'"); 
        while($row_allegations_no_allocated = sqlsrv_fetch_array($result_allegations_no_allocated)){
        
        $id = $row_allegations_no_allocated['id'];
        $country = $row_allegations_no_allocated['country'];
        
        echo "<option value='$id'>$id - $country</option>";
        }
        ?>
        </select>
        </td>
        </tr>
        <tr>
        <td height="36"><strong>Member :</td>
        <td>
        <select name="team_member" id="team_member" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_officer = sqlsrv_query($conn,"SELECT * FROM screening_officer"); 
        while($row_officer = sqlsrv_fetch_array($result_officer)){
        $officer = $row_officer['name'];
        echo "<option value='$officer'>$officer</option>";
        }
        $result_members = sqlsrv_query($conn,"SELECT * FROM screening_member"); 
        while($row_members = sqlsrv_fetch_array($result_members)){
        $team_member = $row_members['name'];
        echo "<option value='$team_member'>$team_member</option>";
        }
        ?>
        </select>
        
        </td>
        </tr>
        </table>
        </form>
</div>


<div id="dialog-form-reallocate-ir" title="Re-Allocate Intelligence Report">
        <form id = "reallocateintelligence" name = "reallocateintelligence" method="post" action="save_re_allocated_ir.php" enctype="multipart/form-data" onSubmit="return validate4();">
        <table border="0" align="center"  class="gridtable">
        <tr>
        <td height="28"><strong>Intelligence Report :</td>
        <td>
        <select name="id_number" id="id_number" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_allegations_no_allocated = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE member != 'Not Allocated' AND status = 'Under Review'"); 
        while($row_allegations_no_allocated = sqlsrv_fetch_array($result_allegations_no_allocated)){
        
        $id = $row_allegations_no_allocated['id'];
        $country = $row_allegations_no_allocated['country'];
        ?>
        <option value="<?php echo $id ?>">IR<?php echo $id ?> - <?php echo $country ?></option>
        <?php
        }
        ?>
        </select>
        </td>
        </tr>
        <tr>
        <td height="36"><strong>Member :</td>
        <td>
        <select name="team_member" id="team_member" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_officer = sqlsrv_query($conn,"SELECT * FROM screening_officer"); 
        while($row_officer = sqlsrv_fetch_array($result_officer)){
        $officer = $row_officer['name'];
        echo "<option value='$officer'>$officer</option>";
        }
        $result_members = sqlsrv_query($conn,"SELECT * FROM screening_member"); 
        while($row_members = sqlsrv_fetch_array($result_members)){
        $team_member = $row_members['name'];
        echo "<option value='$team_member'>$team_member</option>";
        }
        ?>
         </select>
        </td>
        </tr>
        </table>
       
        </form>
</div>


<div id="reportdivId" title="Monthly Report">                 
    <form id = "report" name = "report" method="post" action="export_report.php" enctype="multipart/form-data">
    <table width="355" border="0" align="center"  class="gridtable">
    <tr>
    <td width="134" height="28" align="right"><strong>Month :</strong></td>
    <td width="211" align="left">
    <?php
    $curr_month = date("m");
    $month = array (1=>"January 2016", "February 2016", "March 2016", "April 2016", "May 2016", "June 2016", "July 2016", "August 2016", "September 2016", "October 2016", "November 2016", "December 2016");
    $select = "<select name='month'>\n";
    foreach ($month as $key => $val) {
        $select .= "\t<option val=\"".$key."\"";
        if ($key == $curr_month) {
            $select .= " selected=\"selected\">".$val."</option>\n";
        } else {
            $select .= ">".$val."</option>\n";
        }
    }
    $select .= "</select>";
    echo $select;
    ?>
    </td>
    </tr>
    </table>
    </form>
</div>

<div id="reredivId" title="Regional Report">                
    <form id = "rereport" name = "rereport" method="post" action="export_region_report_2016.php" enctype="multipart/form-data">
    <table width="355" border="0" align="center"  class="gridtable">
    <tr>
    <td width="103" height="28" align="right"><strong>Region :</strong></td>
    <td width="242" align="left">
    <select name="region" id="region" class="text ui-widget-content ui-corner-all">
        <option></option>
        <option value ="impact_africa1">High Impact Africa 1</option>
        <option value ="impact_africa2">High Impact Africa 2</option>
        <option value ="impact_asia">High Impact Asia</option>
        <option value ="region_sea">South East Asia</option>
        <option value ="region_sa">Southern Africa</option>
        <option value ="region_wa">Western Africa</option>
        <option value ="region_ca">Central Africa</option>
        <option value ="region_mena">Middle East & North Africa</option>
        <option value ="region_eeca">East Europe Central Asia</option>
        <option value ="region_lac">Latin America and Caribbean</option>
    </select>
    </td></tr>
    <tr>
    <td width="134" height="28" align="right"><strong>Month :</strong></td>
    <td width="211" align="left">
    <?php
    $curr_month = date("m");
    $month = array (1=>"January 2016", "February 2016", "March 2016", "April 2016", "May 2016", "June 2016", "July 2016", "August 2016", "September 2016", "October 2016", "November 2016", "December 2016");
    $select = "<select name='month'>\n";
    foreach ($month as $key => $val) {
        $select .= "\t<option val=\"".$key."\"";
        if ($key == $curr_month) {
            $select .= " selected=\"selected\">".$val."</option>\n";
        } else {
            $select .= ">".$val."</option>\n";
        }
    }
    $select .= "</select>";
    echo $select;
    ?>
    </td>
    </tr>
    </table>
    </form>

</div>  


<div id="divIdnewcheck" title="Add new Background check and GF Due Diligence">
<form action="save_new_check.php" id="newcheck" name="newcheck" method="post">

      <table border="0" align="center" class="gridtablefilter">
          <tr>
            <td width="137" valign="top" bgcolor="#FFFFFF"><strong>Type of Request :</strong></td>
            <td width="210" valign="top" bgcolor="#FFFFFF">
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
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><strong>Details of entity</strong></td>
        </tr>
          <tr>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><hr /></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Name : </strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <input name="name" type="text" id="name" style="width:100%" maxlength="100" class="text ui-widget-content ui-corner-all">
            </td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Alternative name :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">
            <input name="alt_name" type="text" id="alt_name" style="width:100%" maxlength="100" class="text ui-widget-content ui-corner-all">
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
            <td valign="top" bgcolor="#FFFFFF"><input name="email" type="text" id="email" style="width:100%" maxlength="100" class="text ui-widget-content ui-corner-all"/></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Notes :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <td colspan="2" valign="top" bgcolor="#FFFFFF"><textarea name="notes" id="notes" style="width:100%" rows="10" class="text ui-widget-content ui-corner-all"></textarea></td>
     </table>
</form>

</div>



<div id="divIdnewentity" title="Add new Entity">
<form name="new_entity" id="new_entity" action="save_new_entity.php" method="post" enctype="multipart/form-data" onSubmit="return validatenewentity();"> 
 <table border="0" align="center" class="gridtable">
              <tr>
                <td align="right"><strong><font color="#CC0000">* Entity Type :</font></strong></td>
                <td colspan="5">
                
                <select name="type_entity" id="type_entity" class="text ui-widget-content ui-corner-all">
                  <option></option>
                  <option>Person</option>
                  <option>Organization</option>
                </select></td>
              </tr>
              <tr>
                <td align="right"><p><strong><font color="#CC0000">* Name :</font></strong></p></td>
                <td colspan="5"><input name="name_entity" id="name_entity" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Alt. name :</strong></td>
                <td colspan="5" valign="top"><input name="alternative_name" id="alternative_name" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Acronym :</strong></td>
                <td valign="top"><input name="acro" id="acro" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>&nbsp;&nbsp;Nationality / Country based :</strong></td>
                <td align="right" valign="top"><select name="head_country" id="head_country" class="text ui-widget-content ui-corner-all">
                  <option></option>
                  <?php
					  $result2 = sqlsrv_query($conncss,"SELECT * FROM countries ORDER BY country ASC"); 
                      while($row2 = sqlsrv_fetch_array($result2)){
						  $country = $row2['country'];
						  echo "<option value ='$country'>$country</option>";
                      }
					  ?>
                </select></td>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="head_city" id="head_city" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
 </table> 
            <table border="0" align="center" class="gridtable">
              <tr>
                <td colspan="5" align="left" valign="baseline">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="5" align="left" valign="baseline"><img src="images/profile-icon.png" width="15" height="15" align="top"/>&nbsp;Log</td>
              </tr>
               
               <tr>
                <td colspan="5" align="right" valign="top"><hr /></td>
              </tr>
              <tr>
                <td align="right" valign="middle"><strong><font color="#CC0000">* Category :</font></strong></td>
                <td align="center" valign="middle">
                <script>
				$(function() {
					$('#row_dim').hide(); 
					$('#category').change(function(){
						if($('#category').val() == 'Whistleblower') {
							$('#row_dim').show(); 
						} else if($('#category').val() == 'Confidential Informant') {
							$('#row_dim').show(); 
						} else if($('#category').val() == 'Witness') {
							$('#row_dim').show(); 	
						}else {
							$('#row_dim').hide(); 
						} 
					});
				});
				</script>
                <img src="images/question.jpg" width="35" height="35" align="top" id="button" /></td>
                <td align="left" valign="middle"><div class="row">
                  <select name="category" id="category" class="text ui-widget-content ui-corner-all" onchange="selectChangeHandler(this)">
                    <option value =""></option>
                    <option value ="Whistleblower">Whistleblower</option>
                    <option value ="Confidential Informant">Confidential Informant</option>
                    <option value ="Reporter">Reporter</option>
                    <option value ="Witness">Witness</option>
                    <option value ="Subject">Subject</option>
                    <option value ="Other">Other</option>
                  </select>
                  <script>
function selectChangeHandler(selectNode) {
	if (selectNode.selectedIndex == 1) {
		alert("Specific entities such as 'Whistleblower' or 'Confidential Informant' will require particular safeguards regarding how personal information details are recorded, stored and protected within OIG systems.");
	}
	if (selectNode.selectedIndex == 2) {
		alert("Specific entities such as 'Whistleblower' or 'Confidential Informant' will require particular safeguards regarding how personal information details are recorded, stored and protected within OIG systems.");
	}
}
                </script>
                </div></td>
                
                <td colspan="2" align="left" valign="middle">
                <div class="row" id="row_dim">
                <table>
                <tr><td align="left"><input type="checkbox" style="border: 0; background:transparent" name="protection" /></td>
                <td> <strong><font color="#993300">Protection </font></strong></td>
                </tr>
                </table>
                </div>

                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Position :</strong></td>
                <td colspan="4" valign="top"><input id="position" name="position" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong><font color="#CC0000">* Type :</font></strong></td>
                <td colspan="2" valign="top"><select name="type_profile" class="text ui-widget-content ui-corner-all">
                  <option value =""></option>
                  <option value ="PR Employee">PR Employee</option>
                  <option value ="SR Employee">SR Employee</option>
                  <option value ="SSR Employee">SSR Employee</option>
                  <option value ="LFA Employee">LFA Employee</option>
                  <option value ="CCM Employee">CCM Employee</option>
                  <option value ="Supplier Employee">Supplier Employee</option>
                  <option value ="Global Fund Employee">Global Fund Employee</option>
                  <option value ="PR">PR</option>
                  <option value ="SR">SR</option>
                  <option value ="SSR">SSR</option>
                  <option value ="LFA">LFA</option>
                  <option value ="CCM">CCM</option>
                  <option value ="Supplier">Supplier</option>
                  <option value ="Global Fund">Global Fund</option>
                  <option value ="Other">Other</option>
                </select></td>
                <td align="right" valign="top"><strong>Home phone number :</strong></td>
                <td valign="top"><input name="home_phone_number" id="home_phone_number" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 1 :</strong></td>
                <td colspan="2" valign="top"><input name="email1" id="email1" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Office phone number :</strong></td>
                <td valign="top"><input name="office_phone_number" id="office_phone_number" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Email 2 :</strong></td>
                <td colspan="2" valign="top"><input name="email2" id="email2" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Mobile :</strong></td>
                <td valign="top"><input name="mobile" id="mobile" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Skype :</strong></td>
                <td colspan="2" valign="top"><input name="skype" id="skype" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                <td align="right" valign="top"><strong>Fax :</strong></td>
                <td valign="top"><input name="fax" id="fax" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Web :</strong></td>
                <td colspan="4" valign="top"><input name="web_page" id="web_page" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td rowspan="2" align="right" valign="top"><strong>Address :</strong></td>
                <td colspan="2" rowspan="2" valign="top"><textarea name="address" id="address" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none" ></textarea></td>
                <td align="right" valign="top"><strong>Post code :</strong></td>
                <td valign="top"><input name="post_code" id="post_code" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>City :</strong></td>
                <td valign="top"><input name="city" id="city" type="text" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Country :</strong></td>
                <td colspan="4" valign="top"><select name="country" id="country" class="text ui-widget-content ui-corner-all">
                  <option></option>
                  <?php
					  $result2 = sqlsrv_query($conncss,"SELECT * FROM countries ORDER BY country ASC"); 
                      while($row2 = sqlsrv_fetch_array($result2)){
						  $country = $row2['country'];
						  echo "<option value ='$country'>$country</option>";
                      }
					  ?>
                </select></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Notes :</strong></td>
                <td colspan="4" valign="top"><textarea name="notes" id="notes" style="width:100%" rows="3" class="text ui-widget-content ui-corner-all" style="resize:none"></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top">&nbsp;</td>
                <td colspan="4" align="left" valign="top"><strong>Link this Log to Allegation  :
                  <select name="allegation_to_link" id="allegation_to_link" class="text ui-widget-content ui-corner-all">
                    <option></option>
                    <?php
								$dash = " - ";
								$result_all_allegations = sqlsrv_query($conncss,"SELECT * FROM allegation_details"); 
								 while($row_all_allegation = sqlsrv_fetch_array($result_all_allegations)){
									$country_allegation = $row_all_allegation['country'];
									$allegation_number = $row_all_allegation['id'];
									echo "<option value='$allegation_number'>$allegation_number$dash$country_allegation</option>";
								}
								?>
                    </select>
               &nbsp;&nbsp;&nbsp;Link this Log to Case  :</strong>
                  <select name="case_to_link" id="case_to_link" class="text ui-widget-content ui-corner-all">
                    <option></option>
                    <?php
								$dash = " - ";
								$result_all_cases = sqlsrv_query($conncss,"SELECT * FROM $cmsdb.cases"); 
								 while($row_all_cases = sqlsrv_fetch_array($result_all_cases)){
									$country_case = $row_all_cases['country'];
									$ref_number = $row_all_cases['ref_number'];
									echo "<option value='$ref_number'>$ref_number$dash$country_case</option>";
								}
								?>
                </select></td>
              </tr>
              
          </table>  
  </form>
</div>
<div id="dialoghelp5" title="Help">
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
      <script type="text/javascript" src="js/jquery.dataTables1.js"></script>
      <script src="js/dynamic-table1.js"></script>

  
            
            
<?php
	if ( isset ($_GET['new_allegation_saved'])) {
		echo "<script>alert('New Allegation has been saved')</script>";
	}
				if ( isset ($_GET['new_intel_report'])) {
		echo "<script>alert('New Intelligence Report has been saved')</script>";
	}
	if ( isset ($_GET['new_entity'])) {
		echo "<script>alert('New Entity has been saved')</script>";
	}
					if ( isset ($_GET['reallocate'])) {
		echo "<script>alert('Allegation has been re-allocated')</script>";
	}
	if ( isset ($_GET['allocated'])) {
		echo "<script>alert('Allegation has been allocated')</script>";
	}
		if ( isset ($_GET['allocatedir'])) {
		echo "<script>alert('Intelligence Report has been allocated')</script>";
	}
	
			if ( isset ($_GET['reallocateir'])) {
		echo "<script>alert('Intelligence Report has been re-allocated')</script>";
	}
	
	if ( isset ($_GET['new_check'])) {
	echo "<script>alert('New Check has been saved')</script>";
	
	}
		?>
 <div id="divIdreport" style="display: none;" title="Report">
    <iframe id="modalIframeIdreport" frameborder="0" width="100%" height="850">
    </iframe>
</div>       
        
</body>
</html>