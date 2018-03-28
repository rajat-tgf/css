<?php
require_once("includes\security.php");
$Security->GoSecure();

if ( isset ($_GET['id_report'])) {
	$id = $_GET['id_report'];
	$_SESSION['report_id']=$id;
}else{
$id = $_SESSION['report_id'];
}
		$result = sqlsrv_query($conncss,"select * from intelligence_reports WHERE id = '$id'"); 
		$row = sqlsrv_fetch_array( $result );


if ( isset ($_GET['saved'])) {
	echo "<script>alert('Draft has have been saved')</script>";
}
if ( isset ($_GET['new_comments'])) {
	echo "<script>alert('New comments have been saved')</script>";
}

if ( isset ($_GET['sent_for_review'])) {
	echo "<script>alert('Draft Report has have sent for review to the Screening Officer')</script>";
}

if ( isset ($_GET['approved'])) {
	echo "<script>alert('Draft Report has been approved')</script>";
}
if ( isset ($_GET['return'])) {
	echo "<script>alert('Draft Report has been returned')</script>";
}



if ( isset ($_GET['new_followupir'])) {
	echo "<script>alert('New Follow up for Intelligence Report has been saved')</script>";
}

if ( isset ($_GET['modifiy_followupir'])) {
	echo "<script>alert('Follow up for Intelligence Report has been modified')</script>";
}

if ( isset ($_GET['newnotes'])) {
	echo "<script>alert('New Note has been saved')</script>";
}


if ( isset ($_GET['new_entity'])) {
	echo "<script>alert('New Entity has been saved and linked to this Intelligence Report')</script>";
}
	
if ( isset ($_GET['unlink_grant'])) {
	echo "<script>alert('Grant has been Unlinked')</script>";
}
	
	


date_default_timezone_set("Europe/Madrid");

//header('Access-Control-Allow-Origin: http://192.168.1.2');

$username = $_SESSION['username'];




// retrive comments
$comment_query = sqlsrv_query($conncss,"SELECT id FROM comments_ir WHERE ir_report = '$id'", array(), array( "Scrollable" => 'buffered'));
$num_comments = sqlsrv_num_rows($comment_query);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>CSS</title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 

<script type="text/javascript">
    $(function() {
    $( "#tabs" ).tabs();

    $( "input[type=submit], button" )
    .button()
    });
	
$(function(){
  $.datepicker.setDefaults(
    $.extend($.datepicker.regional[''])
  );
  $('#date_received').datepicker({dateFormat: 'yy-mm-dd'});
  $('#date_report_complete').datepicker({dateFormat: 'yy-mm-dd'});


});

function showRow(rowId) {
document.getElementById(rowId).style.display = "";
}
function hideRow(rowId) {
document.getElementById(rowId).style.display = "none";
}


$(function() {
	var dialog, form,
	
	dialog = $( "#new-entity-interest-form" ).dialog({
		autoOpen: false,
		position: ['top', 5],
		height: 700,
		width: 1100,
		modal: true,
		resizable: false,
		draggable: false,
		overlay: {
					opacity: 0.5,
					background: "black"
				},
				
				
		buttons: {
			"Link": function() {
				$( "#iframedetails_links").contents().find("#link_entity").submit();
				alert ("Entity has been linked to the Intelligence Report");
				window.location.reload()
				
			},
			"Close": function() {
				$( this ).dialog( "close" );
			},
		

		},
		
	});
	
	
	
	$( "#link_entity_interest" ).click(function() {
		dialog.dialog( "open" );
	});

});


</script>



<script>
$(function() {
	var dialog, form,
	
	dialog = $( "#intel_link_form" ).dialog({
		autoOpen: false,
		height: 700,
		width: 1010,
		modal: true,
		resizable: false,
		draggable: false,
		overlay: {
					opacity: 0.5,
					background: "black"
				},
				
				
		buttons: {
			"Link": function() {
				$( "#iframedetails_links_intel").contents().find("#link_intel_report").submit();
				alert ("Link has been created between the Intelligence Reports");
				window.location.reload()
				
			},
			"Close": function() {
				$( this ).dialog( "close" );
			},
		

		},
		
	});
	
	
	$( "#link_intel_reports" ).click(function() {
		$( "#intel_link_form" ).dialog( "open" );
	});

});
</script>


<script>

$(function(){
  $('#date_notified').datepicker({dateFormat: 'yy-mm-dd'});
});
$(function(){
  $('#date_follow_up').datepicker({dateFormat: 'yy-mm-dd'});

});

$(function() {
var dialog, form,
date = $( "#date_follow_up" ),
request = $( "#request" ),
allFields = $( [] ).add( request ).add( date ),
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

function checkLength( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
return false;
} else {
return true;
}
}

function addfollowup() {
var valid = true;
allFields.removeClass( "ui-state-error" );
valid = valid && checkLength( request, 3 );
valid = valid && checkdate( date );

	if ( valid ) {
		$('#newfollowup').submit();
		alert ("New Follow up has been saved");
	}
	return valid;
}

dialog = $( "#dialog-form-followup" ).dialog({
	autoOpen: false,
	height: 800,
	width: 1100,
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
	"Add Follow Up": addfollowup,


	Cancel: function() {
	$( this ).dialog( "close" );
	}
},


});

form = dialog.find( "newfollowup" ).on( "submit", function( event ) {
event.preventDefault();
addfollowup();
});

$( "#add_followup" ).click(function() {
	$( "#dialog-form-followup" ).dialog( "open" );
});

});

	function showDialogfollowup(id_follow_up){
		
	
	   $("#divIdal").dialog("open");
	   $("#modalIframeIden").attr("src","edit_follow_up_ir_details.php?id_follow_up=" + id_follow_up);
	   return false;
	}
	
	
	
	$(document).ready(function() {
	   $("#divIdal").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 785,
			   width: 980,
			   resizable: false,
			   draggable: false,
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


<script>
$(function() {
var dialog, form,

new_notes = $( "#new_notes" ),
date = $( "#datepickernote" ),
allFields = $( [] ).add( new_notes ).add( date ),
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
updateTips( "You must select a date" );
return false;
} else {
return true;
}
}

function checkLength( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
updateTips( "Notes must not be empty" );
return false;
} else {
return true;
}
}

function addnote() {
var valid = true;
allFields.removeClass( "ui-state-error" );
valid = valid && checkdate( date );
valid = valid && checkLength( new_notes, 3 );

	if ( valid ) {
		$('#newnote').submit();
		dialog.dialog( "close" );
	}
	return valid;
}

dialog = $( "#dialog-form-notes" ).dialog({
	autoOpen: false,
	height: 500,
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
	"Add Note": addnote,


	Cancel: function() {
	$( this ).dialog( "close" );
	}
},


});

form = dialog.find( "newnote" ).on( "submit", function( event ) {
event.preventDefault();
addnote();
});


$( "#add_note" ).click(function() {
	$( "#dialog-form-notes" ).dialog( "open" );
});


});

$(function(){
  $('#datepickernote').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>


<script type="text/javascript">
	function showDialog(profile_id_linked)
	{
		var profile_id_linked = profile_id_linked;
		

		$("#dialog-modal").dialog(
			{
				width: 400,
				height: 200,
				buttons: {
						"Unlink": function() {
							$.post("unlink_entity_from_intel_report.php", {"profile_id_linked": profile_id_linked});
							alert ("Entity has been unlinked");
							window.top.location.reload();
							$( this ).dialog( "close" );
						},
						Cancel: function() {
							$( this ).dialog( "close" );
						}
					}
			 });
	}; 
	
	
	
	
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




function show_new_entity_Popup(){
   $("#divIdnewentityir").dialog("open");
   return false;
}

$(function() {
	   $("#divIdnewentityir").dialog({
			   autoOpen: false,
			   modal: true,
				height: 930,
				width: 1130,
			   resizable: false,
			   draggable: false,
			   buttons : {
                "Save new entity and link it to this Intelligence Report" : function() {
				$('#new_entity_link_ir').submit();
					dialog.dialog( "close" );
					
                },
				Cancel: function() {
				  $( this ).dialog( "close" );
				}
				}
			   
		  });
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




$(function() {
var dialog, form,

comment = $( "#comment" ),
allFields = $( [] ).add( comment ),
tips = $( ".validateTips" );
function updateTips( t ) {
tips
.text( t )
.addClass( "ui-state-highlight" );
setTimeout(function() {
tips.removeClass( "ui-state-highlight", 1500 );
}, 500 );
}




function checkLength( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
updateTips( "Comments must not be empty" );
return false;
} else {
return true;
}
}


function addnote() {
	var valid = true;
	allFields.removeClass( "ui-state-error" );
	valid = valid && checkLength( comment, 3 );
	
	if ( valid ) {
			$('#Newcomments').submit();
		}
		return valid;
}


dialog = $( "#dialog-form-comment" ).dialog({
	autoOpen: false,
	height: 580,
	width: 1000,
	modal: true,
	position: 'top',

	buttons: {
	"Add Comments": addnote,


	Cancel: function() {
	$( this ).dialog( "close" );
	}
},


});

form = dialog.find( "Newcomments" ).on( "submit", function( event ) {
event.preventDefault();
addnote();
});
$( "#add_comment" ).button().on( "click", function() {
dialog.dialog( "open" );
});
});


	function showDialogcomments(ir_report){
	   $("#divcomments").dialog("open");
	   $("#modalIframecomments").attr("src","comments_ir_list.php?ir_report=" + ir_report);
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
	
	
	function show_grant_details_Popup(grant){
	   $("#divIdgrant").dialog("open");
	   $("#modalIframeIdgrant").attr("src","grant_details.php?grant=" + grant);
	   return false;
	}
	$(document).ready(function() {
	   $("#divIdgrant").dialog({
			   autoOpen: false,
			   modal: true,
			  	height: 925,
				width: '90%',
			   resizable: false,
			   draggable: false,
			   
		  });
	});
	
	
	
</script> 

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

</head>
<body>
<header id="header">
        <div id="logo">
            Complaint Screening System
		</div><br />
        <table align="center">
        	<tr><td><strong>IR<?php echo $id." - ".$country = $row['country']; ?></strong></td></tr>
        </table>
</header>                        
                      

<mainsr>
<?php include("menu_list_home.php"); ?>

<div id="tabs">
<ul>
<li><a href="#tabs-1">Intelligence Report</a></li>
<li><a href="#tabs-2">Entities of Interest</a></li>
<li><a href="#tabs-3">Allegations Linked</a></li>
<li><a href="#tabs-4">Intelligence Reports Linked</a></li>
<li><a href="#tabs-5">Notes</a></li>
<li><a href="#tabs-6">Follow Ups</a></li>
<li><a href="#tabs-7">Grants</a></li>


</ul>
<div id="tabs-1">
<table>
<tr><td style="border-right: solid; border-right-color:#999;" width="50%" valign="top">

<table width="96%" align="left" class="zui-table zui-table-rounded" style="background-color:#FFFFFF">
  <tr>
    <th height="47" colspan="2" align="center" bgcolor="#4B768D"><font color="#FFF"; size="+3"><strong>Intelligence Report</strong></font></th>
  </tr>
  <tr>
    <td width="338" valign="top" ><strong>Id</strong></td>
    <td width="1005" style="background-color:#FFFFFF; border-color:#FFFFFF">
    <strong>IR<?php echo $id;	?></strong>
    </td>
  </tr>
  <tr>
    <td valign="top" ><strong>Date information received</strong></td>
    <td style="background-color:#FFFFFF; border-color:#FFFFFF">
    <?php $date_received = $row['date_received'];
	echo $date_received_newDate = date('F j, Y', strtotime($date_received));
	?>
    </td>
  </tr>
      <tr>
    <td valign="top"><strong>Reporter</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo $reporter = $row['reporter']; ?>
    </td>
    </tr>
      <tr>
        <td valign="top"><strong>Date report completed</strong></td>
        <td style="background-color:#FFFFFF"><?php 
		$date_report_complete = $row['date_report_complete'];
		
		
		echo $date_report_completed = date('F j, Y', strtotime($date_report_complete));
		
		?></td>
      </tr>
      <tr>
    <td valign="top"><strong>Information source</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo nl2br($row['information_source']);?>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Country</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo $country = $row['country']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" ><strong>Entities of interest</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo nl2br($row['entities_interest']);?>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Entity number</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo nl2br($row['entity_number']);?>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Supporting documents?</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo $docs = $row['docs']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" class="gridtable"><strong>Urgent / Immediate action required?</strong><br>

(Further explanation)
    </td>
    <td style="background-color:#FFFFFF"><p>
      <?php echo $urgent = $row['urgent']; ?>
		<br>
        <?php echo nl2br($row['further_explanation']);?>
    </td>
  </tr>
  <tr>
    <td valign="top" class="gridtable"><strong>Title</strong></td>
    <td style="background-color:#FFFFFF">
    <?php echo nl2br($row['title']);?>
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top" style="background-color:#FFFFFF">
    <br>
    <font size="+1"><strong>1. What were  the circumstances of your contact with the source – describe?</strong></font><br>
    <br>
    <?php echo nl2br($row['circumstances']);?>
<br><br>


<font size="+1"><strong>2. Information received from source</strong></font>
<br><br>

<?php echo nl2br($row['information_recieved']);?>
<br><br>


<font size="+1"><strong>3. OIG comments and assessment</strong></font>
<br><br>

<?php echo nl2br($row['comments']);?><br>

</td></tr>
</table>



</td>
<td valign="top">

<table align="center">
    <tr><td align="center"><button id="add_comment">Make comments</button></td>
    <td>
    <a href="print_intel_report.php?id_number=<?php echo $id ?>">
            <img src="images/printer-icon.png" width="33" height="33" align="absmiddle"/>
    </a>
    </td>
    </tr>
</table>





<form action="save_ioe_comments_intelligence_report.php" method="post">
                    
<table width="97%" align="right" style="background-color:#FFFFFF">
  <tr>
    <td colspan="2" align="center"><?php
	$status = $row['status'];
	$submitted_to_officer = $row['submitted_to_officer'];
	$reviewed_by_officer = $row['reviewed_by_officer'];
	$team_member = $row['member'];
	

	$button_save_draft = "disabled='disabled'";
	$button_submit_draft_officer = "disabled='disabled'";
	$button_approve_report = "disabled='disabled'";
	$button_reject_report = "disabled='disabled'";
	
	if ( $submitted_to_officer != "Yes" && $team_member == $username ){
		$button_save_draft = "";
		$button_submit_draft_officer = "";
	}

	$result_officer = sqlsrv_query($conn,"SELECT * FROM screening_officer ORDER BY name"); 
	$row_screening_officer = sqlsrv_fetch_array($result_officer);
	$screening_officer = $row_screening_officer['name'];
	if ( $screening_officer == $username ){
		$button_save_draft = "disabled='disabled'";
		$button_submit_draft_officer = "disabled='disabled'";
	}
	
	if ( $submitted_to_officer == "Yes" && $screening_officer == $username && $reviewed_by_officer != "Yes" ){
		$button_approve_report = "";
		$button_reject_report = "";
	}
	
	if ( $submitted_to_officer == "" && $screening_officer == $team_member){
		$button_save_draft = "";
		$button_submit_draft_officer = "";
	}
	
	if ( $submitted_to_officer == "Yes" && $screening_officer == $team_member && $reviewed_by_officer == "" ){
		$button_approve_report = "";
		$button_reject_report = "";
	}
	
	if ( $status == "Finalised"){
		$button_submit_draft_officer = "disabled='disabled'";
	}
	
    ?>
      <button TYPE = "Submit" Name = "save_draft" VALUE = "Save draft" <?php echo "$button_save_draft" ?>>Save draft</button>
      <button TYPE = "Submit" Name = "submit_draft" VALUE = "Submit draft to Officer" <?php echo "$button_submit_draft_officer" ?>>Submit draft to Officer</button>
      <button TYPE = "Submit" Name = "approve_draft" VALUE = "Approve report"  <?php echo "$button_approve_report" ?>>Approve Report</button>
      <button TYPE = "Submit" Name = "return_draft" VALUE = "Return report"  <?php echo "$button_reject_report" ?>>Return Report</button></td>
      <td>
      
      <img src="images/notification-icon.png" alt="" width="28" height="28" align="absmiddle"/>
     	<font color="#FF0000"><?php echo $num_comments; ?></font>
        <a onclick="return showDialogcomments(<?php echo $id ?> )">Comment(s)</a>
      </td>
    </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%" align="left" valign="middle">
    <table width="100%" align="right" class="zui-table zui-table-rounded" >
      <tr>
        <td width="145" align="right"><strong>Status :</strong></td>
        <td width="206" style="background:#FFF"><?php echo $status  = $row['status'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>days :</strong></td>
        <td style="background:#FFF"><font size="+1">
          <?php
	  if ( $reviewed_by_officer_date = $row['reviewed_by_officer_date'] != "Unknown" ){
	$date1 = new DateTime($row['date_report_complete']);
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
          <font <?php echo $color ?>><?php echo $screening_days; ?></font>
          <?php } ?></td>
      </tr>
      <tr>
        <td align="right"><strong>Screening Member :</strong></td>
        <td style="background:#FFF"><?php echo $member = $row['member']; ?></td>
      </tr>
    </table></td>
    <td width="50%" align="right" valign="top">
    <table width="100%" align="right" class="zui-table zui-table-rounded" >
      <tr>
        <td width="265" align="right"><strong>Date Submitted to Officer for approval :</strong></td>
        <td width="198" style="background:#FFF">
		<?php
		if ( $submitted_to_officer == "Yes" ){
			$submitted_date_officer = $row['submitted_date_officer'];
			echo $submitted_date_newDate = date('F j, Y', strtotime($submitted_date_officer));
		}else{
			echo "<font color='red'>Pending</font>";
		
		}
		?></td>
      </tr>
      <tr>
        <td align="right"><strong>Date approved by Officer :</strong></td>
        <td style="background:#FFF">
        <?php
		if ( $reviewed_by_officer == "Yes" ){
			$reviewed_by_officer_date = $row['reviewed_by_officer_date'];
			echo $reviewed_by_officer_date_newDate = date('F j, Y', strtotime($reviewed_by_officer_date));
		}else{
			echo "<font color='red'>Pending</font>";
		
		}
		?>
        
        </td>
      </tr>
    </table>
    </td>
    </tr>
</table>

    <?php
	$checkbox1 = $row['checkbox1'];
	$checkbox2 = $row['checkbox2'];
	$checkbox3 = $row['checkbox3'];
	$checkbox4 = $row['checkbox4'];
	$checkbox5 = $row['checkbox5'];
	$checkbox6 = $row['checkbox6'];
	$checkbox7 = $row['checkbox7'];
	$checkbox8 = $row['checkbox8'];
	$checkbox9 = $row['checkbox9'];
	$checkbox10 = $row['checkbox10'];
	$ioe_comments = $row['ioe_comments'];
	?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />



<table width="95%" align="right" style="background-color:#FFFFFF" class="zui-table zui-table-rounded">
    <tr>
      <td colspan="3"><font color="#66696C" size="+0.5"><strong>Source Evaluation</strong></font></td>
      <td colspan="3"><font color="#66696C" size="+0.5"><strong>Information/Intel Evaluation</strong></font></td>
      </tr>
    <tr>
      <td width="2%" style="background-color:#FFFFFF"><strong>A</strong></td>
      <td width="2%" style="background-color:#FFFFFF"><input name="checkbox1" type="checkbox" value="" class="ui-widget" <?php echo $checkbox1 ?>/></td><td width="39%" style="background-color:#FFFFFF"><strong>Always  reliable</strong></td>
      <td width="1%" style="background-color:#FFFFFF"><strong>1</strong></td>
      <td width="2%" style="background-color:#FFFFFF"><input name="checkbox2" type="checkbox" value="" class="ui-widget" <?php echo $checkbox2 ?>/></td><td width="54%" style="background-color:#FFFFFF"><strong>True</strong>
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
    <td style="background-color:#FFFFFF"><input name="checkbox8" type="checkbox" value="" class="ui-widget" <?php echo $checkbox8 ?>/></td><td style="background-color:#FFFFFF"><strong>Cannot be judged</strong>
(unconfirmed and contradicts estimate/doubtful)
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

<tr>
    <td style="background-color:#FFFFFF" colspan="6"><br />

    <strong>IOE comments / observations / outcome / dissemination restrictions</strong>
<br />

    <textarea name="ioe_comments" id="ioe_comments" style="width:100%" rows="30" class="text ui-widget-content ui-corner-all"><?php echo $ioe_comments;?></textarea>
    </td>
  </tr>
  </table>
</form>




</td>
</tr>
</table>


</div>
<?php

//.------------------------------------------------------------------TAB2

?>


<?php

//-----------------------------------------------------TAB3

?>
<div id="tabs-2">



<table align="right">
<tr>
  <td align="left">
  <a style="text-decoration:none" href="#" onClick="return show_new_entity_Popup()"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />New Entity</a>

  </td>
<td align="right">

<a style="text-decoration:none" href="#" id="link_entity_interest"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Entity</a>
</td>
</tr>
</table><br />


<div id="divIdnewentityir" title="Add new Entity">
<form name="new_entity_link_ir" id="new_entity_link_ir" action="save_new_entity_link_to_ir.php" method="post" enctype="multipart/form-data"> 
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

<table width="95%" border="0" align="left" class="gridtable">
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
    </table>  
  </form>
</div>

<div id="new-entity-interest-form" title="Link entity to Intelligence Report">
       <iframe name="iframedetails_links" id="iframedetails_links" src="search_entity_to_link_to_ir.php" width="100%" height="100%" style="padding:1px;border:0px;">
       </iframe>
</div> 



<div id="entities-contain">

 <?php


$result_entity1 = sqlsrv_query($conncss,"SELECT id FROM entities_intel_reports WHERE report_id = '$id'", array(), array( "Scrollable" => 'buffered'));	
$num_entities_linked = sqlsrv_num_rows($result_entity1); 

// IF THERE ARE ENTITIES LINKED, SHOW TABLE
if ( $num_entities_linked != 0 ){
?>

<div id="entities-contain">
  <table>
                <tr>
                  <th width="52%">Name</th>
                  <th width="12%">Type</th>
                  <th width="10%">Acronym</th>
                  <th width="16%">Country</th>
                  <th width="6%" colspan="2"></th>
                </tr>
                <?php
			$rowId = 100;
				
			$result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_intel_reports WHERE report_id = '$id'");
			$all_rows = sqlsrv_fetchall($result_entity);
	
					foreach ($all_rows as $row_entity)
                      {
                          $rowId = $rowId + 1;
						  $profile = $row_entity['profile_id'];
                          $result_profile_details = sqlsrv_query($conncss,"SELECT * FROM profiles WHERE id = '$profile'");
                          $row_profile_details = sqlsrv_fetch_array($result_profile_details);
						  
						  $profile_category = $row_profile_details['category'];
						  $entity_id_main_details = $row_profile_details['list_name_id'];
						  $position_profile = $row_profile_details['position'];
						  $type_profile = $row_profile_details['type'];
						  $email_profile = $row_profile_details['email1'];

						  $result_entity_id_main_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id_main_details'");
                          $row_entity_id_main_details = sqlsrv_fetch_array($result_entity_id_main_details);
						  $type_entity = $row_entity_id_main_details['type_entity'];
						  $name = $row_entity_id_main_details['name'];
						  $alternative_name = $row_entity_id_main_details['alternative_name'];
						  $accro = $row_entity_id_main_details['accro'];
						  $country = $row_entity_id_main_details['head_country'];
                        ?>
                        <tr>
                        <td>
						<?php
							if ( $type_entity != "Person" ){
								$icon = "entity-icon.png";
							}else{
								$icon = "user-silhouette-icon.png";
							}
						?>

						<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>
                        <a href="" onclick="return showDialogentitydetails('<?php echo $entity_id_main_details ?>')">
						<?php echo $name;  ?>
                        </a>
                        <?php
						if ( $alternative_name != "" ){
							echo "<br />";
							echo "<font size='-1' color='#999999'>";
							echo "( ".$alternative_name." )";
							echo "</font>";
						}
						?>
                        </td>
                        <td align="center"><?php echo $type_entity; ?></td>
                        <td align="center"><?php echo $accro; ?></td>
                        <td align="center"><?php echo $country; ?></td>
                        
                        
                        <td align='center'>
                        <a href="javascript: void(0);" onclick="showRow('<?php echo $rowId ?>');"><img src="images/Arrow-expand-icon.png" width="15" height="15" /></a><a href="javascript: void(0);" onclick="hideRow('<?php echo $rowId ?>');"><img src="images/Arrow-collapse-icon.png" width="15" height="15" /></a>
                        
                        </td>
                        
                        <td align='center'>
                        
                        <a href="javascript:void(null);" onClick="showDialog(<?php echo $profile ?>);">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity profile <?php echo $profile ?>"/>
                         </a>
                         
                         <div id="dialog-modal" title="Unlink entity?" style="display: none;">
                         <font style="font-size:13px">
                            Do you want to unlink this entity from the Intelligence Report?
                           </font>
                         </div>
                        </td>
                        </tr>
                        <tr id="<?php echo $rowId ?>" style="display: none;">
                        <td colspan="6" >
                       <table>
                        <tr>
                        <td style="border:none">
                                <strong>Category : </strong>
                                <font color="#993333">
                                <?php echo $profile_category;?>
                                </font>
                                <br />
                                <strong>Type : </strong><?php echo $type_profile; ?>
                                <br />
                                <?php 
								if ( $type_entity == "Person" ){
								?>
                                <strong>Position : </strong><?php echo $position_profile; ?>
                                <br />
                                <?php } ?>
                                <table style="border:hidden">
                                <tr><td valign="top">
                                
                                <strong>Linked Entities : </strong>
                                <br />
                                

								<?php
								$result_entities_linked_complainant = sqlsrv_query($conncss,"select * from entities_link WHERE entity_id = '$entity_id_main_details'"); 
								while($row_result_entities_linked_complainant = sqlsrv_fetch_array($result_entities_linked_complainant))
			                    {
									$link = $row_result_entities_linked_complainant['link'];
									
									$result_entity_linked_main_details = sqlsrv_query($conncss,"select * from list_name WHERE entity_id = '$link'"); 
									$row_resultentity_linked_main_details = sqlsrv_fetch_array($result_entity_linked_main_details);
									
									$type_entity_complainant = $row_resultentity_linked_main_details['type_entity'];

										if ( $type_entity_complainant != "Person" ){
											$icon = "entity-icon.png";
										}else{
											$icon = "user-silhouette-icon.png"; 
										}
									?>
										<img src="images/<?php echo $icon ?>" width="15" height="15" align="middle"/>
									<?php
                                    echo $complainant = $row_resultentity_linked_main_details['name'];
									$alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];

									if ( $alternative_name_complainant != "" ){
										echo "<font size='-1' color='#999999'>";
										echo " (".$alternative_name_complainant.")";
										echo "</font>";
									}
									echo "<br />";
								}
								?>
                          </td></tr></table>
                                <br />
                        </td>
                        </tr>
                        </table>
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
      
</div> 
</div>


<?php

//---------------------------------------------TAB3

?>



<div id="tabs-3">
<p>
  <?php
    include ("link_allegation_to_ir.php");
    ?>	
    </p>
</div>




<?php

//---------------------------------------------TAB4

?>

<div id="tabs-4">

<table width="100%">
<tr>
<td align="right">

<a style="text-decoration:none" href="#" id="link_intel_reports"><img src="images/link.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Link Intelligence Report</a>

</td>
</tr>
</table>

<div id="intel_link_form" title="Link Intelligence Report to another Intelligence Report">

        <iframe name="iframedetails_links_intel" id="iframedetails_links_intel" src="search_intel_report.php" width="100%" height="100%" style="padding:1px;border:0px;">

        </iframe>
    

    
</div> 



<div id="entities-contain">

                <table id="entities-contain">
                <tr>
                  <th width="8%">Id</th>
                  <th width="16%">Country</th>
                  <th width="18%">Reporter</th>
                  <th width="55%">Title</th>
                  <th width="3%"></th>
                </tr>
                <?php

                    $result_report = sqlsrv_query($conncss,"SELECT * FROM intel_reports_linked WHERE report_id = '$id'");
					
                    while($row_report = sqlsrv_fetch_array($result_report))
                      {
						  $link_report_id = $row_report['link'];
                          $result_link_report_details = sqlsrv_query($conncss,"SELECT * FROM intelligence_reports WHERE id = '$link_report_id'");
                          $row = sqlsrv_fetch_array($result_link_report_details);
						  $id_report = $row['id'];
                        ?>
                        <tr>
                         <td>
                        
                         <a onclick="return parent.show_ir_Popup(<?php echo $id_report ?>)">
							<?php 
							$dash = "IR";
							echo $dash.$id_report; ?>
                            </a>
							</td>
                             <td>
							<?php echo $country = $row['country']; ?>
							</td>
	                         <td align="left"><?php 
							 
							 echo $reporter = $row['reporter']; 
							 
							 ?></td>
							<td align="center">
                            
                            <?php echo $title = $row['title']; ?>

							</td>
                            
                            <td>
                                <a href="unlink_intel_from_intel_report.php?intel_to_unlink=<?php echo $id_report ?>">
                                 <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Intelligence Report"/>
                         		</a>
                            </tr>

                        <?php
                    }
				?>
				</table>


</div>


</div> 

<?php

//-----------------------------------------------------------------TAB5

?>



<div id="tabs-5">

<table align="right" class="gridtable">
<tr>
<td align="right">

<a style="text-decoration:none" href="#" id="add_note"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Add Note</a>

</td>
</tr>
</table>



<div id="dialog-form-notes" title="Add new note">
<form action="save_new_note_ir.php" id="newnote" name="newnote" method="post">
<div id="notes-contain">
      <table width="100%" border="0" align="center">
          <tr>
            <td width="71" valign="top" bgcolor="#FFFFFF"><strong>Date :</strong></td>
            <td width="842" valign="top" bgcolor="#FFFFFF"><input id="datepickernote" type="text" name="date" class="text ui-widget-content ui-corner-all"/></td>
          </tr>
          
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><strong>Notes :</strong></td>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <td colspan="2" valign="top" bgcolor="#FFFFFF"><textarea name="new_notes" id="new_notes" style="width:100%" rows="13" class="text ui-widget-content ui-corner-all"></textarea></td>
     </table>
     </div>
</form>
</div>

<div id="notes-contain">
	<?php
    $notes_query = sqlsrv_query($conncss,"SELECT * FROM notes_ir WHERE report_id = '$id' ORDER BY date_note DESC, id DESC");
	$all_notes = sqlsrv_fetchall($notes_query);      
	foreach ($all_notes as $note) {
    ?>
        <table>
        <tr>
        <td valign="top" width="9">
        <img src="images/icon_person.png" alt="" width="25" height="25" align="top"/>
        </td>
        <td>
        <strong>
        <?php $date = $note['date_note'];
        echo $note['member'] ?> made a note on <?php echo $date_newDate = date('F j, Y', strtotime($date)); ?></strong>
        <br /><?php echo $note = nl2br($note['note'])?>
        </td>
        </tr>
        </table>
    <br />
    <?php }?>
</div>


</div>


<?php

//-----------------------------------------------------------------TAB6

?>



<div id="tabs-6">

<table width="100%">
<tr>
<td align="right">


<a style="text-decoration:none" href="#" id="add_followup"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Add Follow Up</a>

</td>
</tr>
</table>



<div id="dialog-form-followup" title="Add new Follow Up - Intelligence Report IR <?php echo $id ?>&nbsp; <?php echo $country ?>">

<form action="save_new_follow_up_ir.php" id="newfollowup" name="newfollowup" method="post">

<table class="gridtable" width="100%">
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><strong>Follow Up on :</strong></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF">
                  <textarea name="request" id="request" style="width:100%" rows="6" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><strong>Responses / Actions Taken :</strong></td>
                </tr>
                <tr>
                  <td colspan="5" align="left" bgcolor="#FFFFFF"><textarea name="response" id="response" style="width:100%" rows="6" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>Status :</strong></td>
                  <td bgcolor="#FFFFFF"><select name="status" id="status" class="text ui-widget-content ui-corner-all">
                    <option selected="selected">In Progress</option>
                    <option>Partially implemented / In Progress</option>
                    <option>Implemented</option>
                    <option>No longer applicable</option>
                  </select></td>
                  <td bgcolor="#FFFFFF"><strong>Category :</strong></td>
                  <td colspan="2" bgcolor="#FFFFFF">
                  <select name="category" id="category" class="text ui-widget-content ui-corner-all">
                    <option></option>
                    <option>Follow up (internal)</option>
                    <option>Referred to secretariat for action</option>
                    <option>Referred to secretariat for information</option>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#FFFFFF"><strong>Responsable :</strong></td>
                  <td bgcolor="#FFFFFF">
                  <select name="responsable" id="responsable" class="text ui-widget-content ui-corner-all">
                    <option></option>
                    <option><?php echo $username ?> </option>
                    <option>FPM</option>
                    <option>Head Department</option>
                    <option>Regional Manager</option>
                    <option>Investigator</option>
                    <option>Auditor</option>
                    <option>Complainant</option>
                    <option>Other</option>
                  </select></td>
                  <td bgcolor="#FFFFFF"><strong>Name :</strong></td>
                  <td colspan="2" bgcolor="#FFFFFF"><input name="name_responsable" type="text" id="name_responsable" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                </tr>
                  <tr>
                    <td valign="middle" bgcolor="#FFFFFF"><strong>Date notified :</strong></td>
                    <td valign="middle" bgcolor="#FFFFFF"><input type="text" id="date_notified" name="date_notified" class="text ui-widget-content ui-corner-all"/></td>
                    <td colspan="3" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="middle" bgcolor="#FFFFFF"><strong>Date to follow up:</strong></td>
                    <td valign="middle" bgcolor="#FFFFFF"><input type="text" id="date_follow_up" name="date_follow_up" class="text ui-widget-content ui-corner-all"/></td>
                    <td colspan="3" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    			</tr>
                  <td valign="top" bgcolor="#FFFFFF"><strong>Comments:</strong></td>
                  <td colspan="4" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="5" valign="top" bgcolor="#FFFFFF"><textarea name="comments" id="comments" style="width:100%" rows="6" class="text ui-widget-content ui-corner-all"></textarea>
                  </td>
                </tr>
              </table>
              </div>
              </form>
              
<div id="entities-contain">
<table align="center">
                <tr>
                  <th></th>
                  <th>Status</th>
                  <th>Responsable</th>
                  <th>Name</th>
                  <th>Follow up date</th>
                  <th>Created by</th>
                  <th></th>
  				</tr>
                <?php
					$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups_ir WHERE report_id = '$id' ORDER BY status");
					while($row_follow_up = sqlsrv_fetch_array($result_follow_ups))
					  {
						  $id_follow_up = $row_follow_up['id'];	  ?>
						 <tr>
							<td align="center">
                            <?php $category = $row_follow_up['category']; 
							if ( $category == "Follow up (internal)" ){
							?>
                            <img src="images/Calendar-icon-green.png" width="18" height="18" title="Follow up (internal)"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for action" ){
							?>
                            <img src="images/Calendar-icon-red.png" width="17" height="17" title="Referred to secretariat for action"/>
                            <?php	
							}
							
							if ( $category == "Referred to secretariat for information" ){
							?>
                            <img src="images/Calendar-icon-blue.png" width="18" height="18" title="Referred to secretariat for information"/>
                            <?php	
							}
							
							?>
							<td>
							<?php echo $status = $row_follow_up['status']; ?>
							</td>

							</td>
                            <td>
                            <?php echo $responsable = $row_follow_up['responsable']; ?>


							</td>
							
							<td>
                            <?php echo $name = $row_follow_up['name']; ?>
							</td>
							
                            
                            <td>
                            <?php
							$date_follow_up = $row_follow_up['date_follow_up'];
                            if ( $date_follow_up != "" ){
								echo $date_follow_up = date('F j, Y', strtotime($date_follow_up)); 
							}else{
								echo "No date set";	
							}
							?>
							
							</td>
                            <td>
                            <?php echo $author = $row_follow_up['member']; ?>
							</td>
						
                            <td align="center">
                                <a onclick="return showDialogfollowup(<?php echo $id_follow_up ?> )">
                                <img src="images/edit.png" width="20" height="20" align="top" title="Edit Follow up"/>
                                </a>

                        </td>
                        </tr>

						<?php }?>
				</table>

</div>   
</div>          


<div id="tabs-7">
    <?php
    include ("link_grants_to_ir.php");
    ?>	
</div>

 
</div>


<div id="dialog-form-comment" title="Add new comment">
    <form action="save_make_comment_ir.php" id="Newcomments" name="Newcomments" method="post">
		<table width="100%" border="0" class="gridtable">
            <tr>
            <td>
            <textarea name="comment" id="comment" style="width:100%" rows="21" class="text ui-widget-content ui-corner-all"></textarea>
            </td>
            </tr>
            <tr>
            <td align="right" >
            <input name="notify" id="notify" type="checkbox" style="border: 0; background:transparent"/>
              Send Notification</td>
        </table>
    </form>
</div>

<div id="divcomments" title="Comments Intelligence Report <?php echo $id ?> - <?php echo $row['country']; ?>">
    <iframe id="modalIframecomments" frameborder="0" width="1000" height="720">
    Your browser is not supported
    </iframe>
</div>

<div id="divIdentitydetails" title="Entity Details" align="center">
        <iframe id="modalIframeIdentitydetails" frameborder="0" width="1240" height="695">
        Your browser is not supported
        </iframe>
</div>



    <div id="divIdal" title="Edit Follow up - Intelligence Report">
        <iframe id="modalIframeIden" frameborder="0" width="960" height="710">
        Your browser is not supported
        </iframe>
	</div>  
    
<div id="divscreeningreport" title="Screening Report Details">
    <iframe id="modalIframeIdal" frameborder="0" width="1010" height="850">
    Your browser is not supported
    </iframe>
</div> 

<div id="divIdcheck" title="Intelligence Report details">
    <iframe id="modalIframeIdfcheck" frameborder="0" width="1190" height="870">
    Your browser is not supported
    </iframe>
</div> 


<div id="divIdgrant" style="display: none;" title="Grant details">
    <iframe id="modalIframeIdgrant" frameborder="0" width="100%" height="850">
    </iframe>
</div>  

</body>
</html>
