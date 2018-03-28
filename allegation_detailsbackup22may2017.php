<?php
require_once("includes\security.php");
$Security->GoSecure();

// CONFIRMATION OF ACTIONS
	if ( isset ($_GET['ok'])) {
	echo "<script>alert('Screening Report has been saved')</script>";
	
	}
	if ( isset ($_GET['okreopen'])) {
	echo "<script>alert('Screening Report has been Re-opened')</script>";
	
	}
	if ( isset ($_GET['sent_for_review'])) {
	echo "<script>alert('Screening Report has been forwarded to the Officer for review and approval')</script>";
	}
	if ( isset ($_GET['approved'])) {
	echo "<script>alert('You have approved the Screening Report. Case administrator has been notified')</script>";
	}
	
	if ( isset ($_GET['reject_report'])) {
	echo "<script>alert('Your comments have been saved and the Screening Report has been returned for review')</script>";
	}
	
	if ( isset ($_GET['finalise'])) {
	echo "<script>alert('Screening Report has been finalised')</script>";
	}
	
	if ( isset ($_GET['reject_report'])) {
	echo "<script>alert('Your comments have been saved and the screening report has been returned for review')</script>";
	}
	if ( isset ($_GET['new_notes'])) {
	echo "<script>alert('You Notes have been saved')</script>";
	}
	if ( isset ($_GET['new_comments'])) {
	echo "<script>alert('New comments have been saved')</script>";
	}
	if ( isset ($_GET['new_followup'])) {
	echo "<script>alert('New Follow up has been added')</script>";
	}
	if ( isset ($_GET['follow_up_modified'])) {
	echo "<script>alert('Modifications for the Follow up have been saved')</script>";
	}
	if ( isset ($_GET['unlink_entity'])) {
		echo "<script>alert('Entity has been unlinked')</script>";
	}
	if ( isset ($_GET['newnotes'])) {
		echo "<script>alert('New note has been saved')</script>";
	}
	if ( isset ($_GET['link_grant'])) {
	echo "<script>alert('Grant has been linked')</script>";
	}
		if ( isset ($_GET['unlink_grant'])) {
	echo "<script>alert('Grant has been Unlinked')</script>";
	}

date_default_timezone_set("Europe/Madrid");


if ( isset ($_GET['id'])) {

$_SESSION['id']=$_GET['id'];

}

$id = $_SESSION['id'];
$username = $_SESSION['username'];


$result_allegation = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$id'"); 
$row_allegation = sqlsrv_fetch_array( $result_allegation );

// retrive comments
$comment_query = sqlsrv_query($conncss,"SELECT id FROM comments WHERE allegation_id = '$id'", array(), array( "Scrollable" => 'buffered'));
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
  $('#date_updated').datepicker({dateFormat: 'yy-mm-dd'});


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

	$(function() {
	var comment_reject = $( "#comment_reject" ),
	allFields = $( [] ).add( comment_reject ),
	tips = $( ".validateTips" );
	
	$( "#dialog-form-reject" ).dialog({
	autoOpen: false,
	draggable: true,
	resizable: false,
	height: 480,
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
	"Add comments and return report": function() {
			var comment_reject = $("#comment_reject").val();
			$.post("save_reject_report.php", {"comment_reject": comment_reject});
			$(this).dialog('close');
			alert("You comments have been saved and report has been returned");
			window.top.location.reload();
	},
	
	Cancel: function() {
		$( this ).dialog( "close" );
	}
	
	},
	close: function() {
		allFields.val( "" ).removeClass( "ui-state-error" );
	}
	});
	
	$( "#Rejectreport" )
	
	.button()
	.click(function() {
	$( "#dialog-form-reject" ).dialog( "open" );
	});
	});

$(function() {
$( "#tabsver" ).tabs().addClass( "ui-tabs-horizontal ui-helper-clearfix" );
$( "#tabsver li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
});

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
	}
	return valid;
}

dialog = $( "#dialog-form-notes" ).dialog({
	autoOpen: false,
	height: 500,
	width: 1000,
	modal: true,
	position: 'top',
	
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
	dialog.dialog( "open" );
});


});

$(function(){
  $('#datepickernote').datepicker({dateFormat: 'yy-mm-dd'});
});
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
	height: 830,
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
	dialog.dialog( "open" );
});


});

	function showDialogfollowup(id_follow_up){
	   $("#divIdal").dialog("open");
	   $("#modalIframeIden").attr("src","edit_follow_up_details.php?id_follow_up=" + id_follow_up);
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


	function showDialogcomments(allegation_id){
	   $("#divcomments").dialog("open");
	   $("#modalIframecomments").attr("src","comments_list.php?allegation_id=" + allegation_id);
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


	function showDialogsr(allegation_id){
		
	
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




    $(function() {
        $("#dialoghelp5").dialog({
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


	$(function() {
		$("#dialoghelp3").dialog({
			autoOpen: false,
			draggable: false,
			resizable: false,
			height: 870,
			width: 1500,
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
		$("#buttonhelp3").on("click", function() {
			$("#dialoghelp3").dialog("open");
		});
	});


	$(function() {
		$("#dialoghelp1").dialog({
			autoOpen: false,
			draggable: false,
			resizable: false,
			height: 300,
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
		$("#buttonhelp1").on("click", function() {
			$("#dialoghelp1").dialog("open");
		});
	});


    $(function() {
        $("#dialoghelp6").dialog({
            autoOpen: false,
            draggable: false,
            resizable: false,
            height: 350,
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
        $("#buttonhelp6").on("click", function() {
            $("#dialoghelp6").dialog("open");
        });
    });


    $(function() {
        $("#dialoghelp7").dialog({
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
        $("#buttonhelp7").on("click", function() {
            $("#dialoghelp7").dialog("open");
        });
    });


    $(function() {
        $("#dialoghelp8").dialog({
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
        $("#buttonhelp8").on("click", function() {
            $("#dialoghelp8").dialog("open");
        });
    });


function reportingoptions(category_type){
	
	if (category_type.value=="Corruption")
	{ 
	
	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Bribery', 'Bribery');
	select.options[select.options.length] = new Option('Facilitation Payments', 'Facilitation Payments');
	select.options[select.options.length] = new Option('Inappropriate Gratuities', 'Inappropriate Gratuities');
	
	}
	
	if (category_type.value=="Fraud")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Accounting fraud', 'Accounting fraud');
	select.options[select.options.length] = new Option('Misrepresentation of information', 'Misrepresentation of information');
	select.options[select.options.length] = new Option('Theft / Diversion of misappropriation of funds, or other assets', 'Theft / Diversion of misappropriation of funds, or other assets');
	}
	
	if (category_type.value=="Coercion")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Assault', 'Assault');
	select.options[select.options.length] = new Option('Intimidation / Threats', 'Intimidation / Threats');
	}
	
	if (category_type.value=="Collusion")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Bidding / Tender irregularities', 'Bidding / Tender irregularities');
	select.options[select.options.length] = new Option('Conflict of Interest', 'Conflict of Interest');
	select.options[select.options.length] = new Option('Other', 'Other');
	}
	
	if (category_type.value=="Non-Compliance with laws / Grant agreements")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Obstruction', 'Obstruction');
	select.options[select.options.length] = new Option('Other', 'Other');
	}
	
	if (category_type.value=="Human Rights Violations")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Discriminatory denial of access to GF supported services', 'Discriminatory denial of access to GF supported services');
	select.options[select.options.length] = new Option('Use of unproven medical practices', 'Use of unproven medical practices');
	select.options[select.options.length] = new Option('Testing, treatment or health services without informed consent', 'Testing, treatment or health services without informed consent');
	select.options[select.options.length] = new Option('Torture, cruel, inhuman or degrading treatment', 'Torture, cruel, inhuman or degrading treatment');
	select.options[select.options.length] = new Option('Violations of medical confidentiality or right to privacy', 'Violations of medical confidentiality or right to privacy');
	select.options[select.options.length] = new Option('Involuntary medical detention/isolation', 'Involuntary medical detention/isolation');
	}
	
	if (category_type.value=="Product Issues (JIATF)")
	{ 

	var select = document.getElementById("sub_category_type");
	select.options.length = 0;
	select.options[select.options.length] = new Option('', '');
	select.options[select.options.length] = new Option('Diversion', 'Diversion');
	select.options[select.options.length] = new Option('Counterfeit', 'Counterfeit');
	select.options[select.options.length] = new Option('Theft', 'Theft');
	select.options[select.options.length] = new Option('Faulty Product', 'Faulty Product');
	select.options[select.options.length] = new Option('Expired Drugs', 'Expired Drugs');
	}
	
	
	}
	
	
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
	
	




function showDialognewrisktype(){
	show_new_risktype_Popup();
};


function show_new_risktype_Popup(){
   $("#divIdnewrisktype").dialog("open");
   return false;
}

$(function() {
	   $("#divIdnewrisktype").dialog({
			   autoOpen: false,
			   modal: true,
				height: 480,
				width: '80%',
			   resizable: false,
			   draggable: false,
			   buttons : {
                "Add Risk Type" : function() {
				$('#newrisktype').submit();
					dialog.dialog( "close" );
					
                },
				Cancel: function() {
				  $( this ).dialog( "close" );
				}
				}
			   
		  });
	});


	function show_quart_guide() {
			$("#newstyle").dialog({
			height: 'auto',
			width: '75%',
			resizable: false,
			draggable: false,
			modal: true,
			position: 'center'	
			});
			$("#frame").attr("src", "files/QUART_Guidelines.pdf");
		}

</script>


</head>

<body>
<header id="header">
        <div id="logo">
            Complaint Screening System
		</div><br />
        <table align="center">
        	<tr><td><strong><?php echo $id." - ".$country = $row_allegation['country']; ?></strong></td></tr>
        </table>
</header>                        
                      

<mainsr>
<?php include("menu_list_home.php"); ?>

<div id="tabs">
<ul>
    <li><a href="#tabs-1">Screening Report</a></li>
    <li><a href="#tabs-2">Entities of Interest</a></li>
    <li><a href="#tabs-3">Intelligence Reports Linked</a></li>
    <li><a href="#tabs-6">Notes</a></li>
    <li><a href="#tabs-7">Follow Ups</a></li>
    <li><a href="#tabs-8">Links</a></li>
    <li><a href="#tabs-9">General</a></li>
    <li><a href="#tabs-10">History</a></li>
    <?php	
          $type_allegation = $row_allegation['type_allegation'];
    if ( $type_allegation == 'Proactive' ){ 
        $result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM proactive_link WHERE id = '$id'", array(), array( "Scrollable" => 'buffered'));
        $num_rows = sqlsrv_num_rows($result_proactive_linked);
    ?>
    <li><a href="#tabs-4">Allegations Linked (<?php echo $num_rows ?>)</a></li><?php
    }
    ?>
</ul>

<div id="tabs-1">


<!--BUTTONS-->
<table align="center">
    <tr><td align="center"><button id="add_comment">Make comments</button></td>
    <?php
    $button_reopen = "disabled='disabled'";
    $result_administrator = sqlsrv_query($conn,"SELECT name FROM administrators WHERE name = '$username'", array(), array( "Scrollable" => 'buffered')); 
    if(sqlsrv_num_rows($result_administrator))
    {
        if($status = $row_allegation['status'] == "Closed" || $status = $row_allegation['status'] == "Pending finalization"){
            $button_reopen = "";
        }
    } 
    ?>
    
    <td align="center">
        <Form Method="POST" ACTION="reopen_screening_report.php?id_number=<?php echo $id ?>" enctype="multipart/form-data">
            <button TYPE = "Submit" Name = "reopen" VALUE = "Reopen Report" <?php echo "$button_reopen" ?>>Reopen Report</button>
        </form>    
    </td>
    </tr>
</table>
    
    
    <Form Method="POST" ACTION="save_screening_report.php?id_number=<?php echo $id ?>" enctype="multipart/form-data">
    
    <!--BUTTONS-->
    <table width="836" align="center">
      <tr>
        <td align="center" >
        <?php
        $status = $row_allegation['status'];
        $submitted_to_officer = $row_allegation['submitted_to_officer'];
        $reviewed_by_officer = $row_allegation['reviewed_by_officer'];
        $reviewed_by_officer = $row_allegation['reviewed_by_officer'];
        $team_member = $row_allegation['team_member'];
    
        $button_save_draft = "disabled='disabled'";
        $button_submit_draft_officer = "disabled='disabled'";
        $button_approve_report = "disabled='disabled'";
        $button_reject_report = "disabled='disabled'";
        
        if ( $submitted_to_officer == "" && $team_member == $username ){
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
        
        if ( $submitted_to_officer == "Yes" && $screening_officer == $username && $reviewed_by_officer == "" ){
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
        
        if ( $status !== "Screening Review"){
            $button_submit_draft_officer = "disabled='disabled'";
        }
        
        ?>
    
        <button TYPE = "Submit" Name = "save_draft" VALUE = "Save draft" <?php echo "$button_save_draft" ?>>Save draft</button>
        <button TYPE = "Submit" Name = "submit_draft" VALUE = "Submit draft to Officer" <?php echo "$button_submit_draft_officer" ?>>Submit draft to Officer</button>
        <button TYPE = "Submit" Name = "approve_draft" VALUE = "Approve report"  <?php echo "$button_approve_report" ?>>Approve report</button>
        
        <div id="dialog-form-reject" title="Return report and make comments">
              <?php
                include("reject_report.php");
                ?>
        </div>
        
        <button id="Rejectreport" form="Rejectreport" <?php echo "$button_reject_report" ?>>Return report</button>
        <a href="print_report.php?id_number=<?php echo $id ?>">
            <img src="images/printer-icon.png" width="33" height="33" align="absmiddle"/>
        </a>
        </td>
        
         <td>
          <img src="images/notification-icon.png" alt="" width="28" height="28" align="absmiddle"/>
            <font color="#FF0000"><?php echo $num_comments; ?></font>
            <a onclick="return showDialogcomments(<?php echo $id ?> )">Comments</a>
          </td>
         </tr>
    </table>
    
    <br />
    
    <!--NAME OF COUNTRY-->
    <table width="100%" align="center">
    <tr>
    <td align="center">
    <font color="steelblue" size="+2">
    <strong>
      <?php	
        if ( $type_allegation == 'Proactive' ){ ?>
            <img src="images/Pro-icon1.png" width="45" height="45" align="absmiddle"/>&nbsp;
      <?php
        }
        echo $id." - ".$country; ?>
    </strong>
    </font>
    </td>
    </tr>
    </table>
    
    
    <!--GENERAL INFORMATION-->
    
    <div class="form-style-5">
    <fieldset>
    <legend><span class="number">1</span> General Information</legend>
    
    <table width="100%" class="report">
     <?php
        
        //SEARCH IF THERE IS ANY PROACTIVE LINKED
        
         $result_linked_proactive = sqlsrv_query($conncss,"SELECT * FROM proactive_link WHERE linked_to = '$id'");
         $all_linked = sqlsrv_fetchall($result_linked_proactive);
         $linkedrows = count($all_linked);
            if ( $linkedrows != 0 ){ ?>
            <tr>
            <td colspan="5" align="center">
            <?php
                $row_linked_pro = $all_linked[0];
                $proactive_allegation  = $row_linked_pro['id'];
                $result_details_proactive = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$proactive_allegation'");
                $row_details = sqlsrv_fetch_array($result_details_proactive);
                $proactive_country  = $row_details['country'];
            ?>
                <font color="#8C0000">
                <?php
                echo  "This allegation is linked to Proactive CSS ".$proactive_allegation. " - ". $proactive_country; ?>
                <a onclick="return showDialogsr(<?php echo $proactive_allegation ?>)">
                <img src="images/document-icon-sr.png" width="21" height="21" align="top" title="Quick view Screening Report"/>
                </a>
                </font>
            </td>
            </tr>
            <?php	
            } 
            ?>  
    <tr>
    <td><strong>Title</strong></td>
    <td colspan="3"><input name="summary" type="text" id="summary" style="width:100%"  maxlength="200" value="<?php echo $summary = $row_allegation['summary']; ?>" class="text ui-widget-content ui-corner-all"></td>
    <td rowspan="6">
    <!--  MAIN DETAILS OF SR-->
         <table align="right">
            <tr>
              <td><strong>Priority :</strong></td>
              <td>
                <?php echo $priority  = $row_allegation['priority'];?>
                </td>
              </tr>
            <tr>
              <td><strong>Status :</strong></td>
              <td>
                <?php echo $status  = $row_allegation['status'];?>
                </td>
              </tr>
            <tr>
              
              <td><strong>Conclusion :</strong></td>
              <td><?php echo $resolution = $row_allegation['resolution']; ?> <?php echo $case_number = $row_allegation['case_number'];?></td>
              
              </tr>
            <tr>
              <td><strong>Date received :</strong></td>
              <td><?php
                                echo $date_received_newDate = date('F j, Y', strtotime($row_allegation['date_received']));
                            ?></td>
              </tr>
            <tr>
              <td><strong>Screening days :</strong></td>
              <td>
                <?php
                  if ( $reviewed_by_officer_date = $row_allegation['reviewed_by_officer_date'] != "Unknown" ){
                        $date1 = new DateTime($row_allegation['date_received']);
                        $date2 = new DateTime($row_allegation['reviewed_by_officer_date']);
                        
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
              <td><strong>Prepared by :</strong></td>
              <td>
                <?php 
                    if ( $team_member = $row_allegation['team_member'] == "" ){
                        echo "<font color='red'>To be allocated";
                        echo "</font>";
                        
                    }else{
                        echo $team_member = $row_allegation['team_member'];
                    }
    
                    $submitted_to_officer = $row_allegation['submitted_to_officer'];
                    $submitted_date_officer = $row_allegation['submitted_date_officer'];
                    
                    if ( $submitted_to_officer != "" ){
                        echo " - <font color='green'>";
                        echo $submitted_date_officer_newDate = date('F j, Y', strtotime($submitted_date_officer));
                        echo "</font>";
                    } ?>
                </td>
              </tr>
            <tr>
              <td><strong>Approved by :</strong></td>
              <td>
              <?php
                $approved_by = $row_allegation['approved_by'];
                
                $submitted_to_officer = $row_allegation['submitted_to_officer'];
                $reviewed_by_officer = $row_allegation['reviewed_by_officer'];
                $reviewed_by_officer_date = $row_allegation['reviewed_by_officer_date'];
                
                
                if ( $approved_by != "" && $reviewed_by_officer != ""){
                    echo $approved_by;
                    echo " - <font color='green'>";
                    echo $reviewed_by_officer_date_newDate = date('F j, Y', strtotime($reviewed_by_officer_date));
                    echo "</font>";
                }else{
                    echo "<font color='red'>Pending</font>";	
                } ?>
                </td>
              </tr>
            </table>
      </td>
    </tr>
    <tr>
      <td><strong>Priority :</strong></td>
      <td>
        <select name="priority" id="priority" class="text ui-widget-content ui-corner-all">
          <option><?php echo $priority  = $row_allegation['priority']; ?></option>
          <option>Low</option>
          <option>Medium</option>
          <option>High</option>
          </select>&nbsp;&nbsp;&nbsp;<img src="images/question.jpg" width="35" height="35" id="buttonhelp5" align="top" />
    </td>
      <td><strong>Method of referral :</strong></td>
      <td><select name="received_via" id="received_via" class="text ui-widget-content ui-corner-all">
        <option><?php echo $received_via  = $row_allegation['received_via']; ?></option>
        <option>Whistleblower E-mail</option>
        <option>Other E-mail</option>
        <option>Fax</option>
        <option>Post</option>
        <option>Personal complaint</option>
        <option>Online report</option>
        <option>External hotline</option>
        <option>Internal hotline</option>
        </select>
        &nbsp;&nbsp;&nbsp;<img src="images/question.jpg" width="35" height="35" id="buttonhelp4" align="top" /></td>
      </tr>
    <tr>
    <td><strong>Country :</strong></td>
    <td><select name="country" id="country" class="text ui-widget-content ui-corner-all">
      <option><?php echo $country  = $row_allegation['country']; ?></option>
      <?php
          $result = sqlsrv_query($conncss,"SELECT * FROM countries"); 
          while($row1 = sqlsrv_fetch_array($result)){
              $country = $row1['country'];
              echo "<option>$country</option>";
          }
          ?>
      </select>
    </td>
    <td><strong>Referred from :</strong></td>
    <td><select name="referred_from" id="referred_from" class="text ui-widget-content ui-corner-all">
      <option><?php echo $referred_from  = $row_allegation['referred_from']; ?></option>
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
    </select></td>
    </tr>
      <tr>
       <td ><strong>Related to previous allegations?</strong></td>
        <td><select name="previous_allegations" id="previous_allegations" class="text ui-widget-content ui-corner-all">
          <?php $previous_allegations = $row_allegation['previous_allegations'];?>
          <option value="<?php echo $previous_allegations?>"><?php echo $previous_allegations;?></option>
          <option>Yes</option>
          <option>No</option>
        </select></td>
        <td><strong>Source Category :</strong></td>
        <td><select name="source_category" id="source_category" class="text ui-widget-content ui-corner-all">
          <option><?php echo $source_category  = $row_allegation['source_category']; ?></option>
          <option value="Anonymous Whistleblower">Anonymous Whistleblower</option>
          <option value="Confidential Whistleblower">Confidential Whistleblower</option>
          <option value="Reporter">Reporter</option>
          <option value="Confidential Informant">Confidential Informant</option>
          <option value="Witness">Witness</option>
          <option value="Subject">Subject</option>
          <option value="Other">Other</option>
        </select></td>
      </tr>
         <tr>
         <td><strong>Allegation related : </strong></td>
            <td>
            <?php
                $allegation_related = $row_allegation['allegation_related'];
                $result_country_allegation_related = sqlsrv_query($conncss,"SELECT country FROM allegation_details WHERE id = '$allegation_related'"); 
                $row_country_allegation_related = sqlsrv_fetch_array($result_country_allegation_related);
                $country_related = $row_country_allegation_related['country'];
                $fulltext_allegation_related = $allegation_related." - ".$country_related;
             ?>
            <select name="allegation_related" id="allegation_related" class="text ui-widget-content ui-corner-all">
              <option value="<?php echo $allegation_related?>"><?php echo $fulltext_allegation_related;?></option>
              <?php
                  $result_all_allegation = sqlsrv_query($conncss,"SELECT id, country FROM allegation_details"); 
                  while($row_all_allegation = sqlsrv_fetch_array($result_all_allegation)){
                    $allegation_related = $row_all_allegation['id'];
                    $allegation_related_country = $row_all_allegation['country'];
                    $fulltext = $allegation_related." - ".$allegation_related_country;
                    
                    echo "<option value='$allegation_related'>$fulltext</option>";
                    }
                ?>
              <option></option>
            </select>
            </td>
            <td><strong>Source Sub-Category :</strong></td>
            <td><select name="source_subcategory" id="source_subcategory" class="text ui-widget-content ui-corner-all">
              <option><?php echo $source_subcategory  = $row_allegation['source_subcategory']; ?></option>
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
            </select></td>
      </tr>
      <tr>
           <td valign="top"><strong>Disease area :</strong></td>
           <td valign="top"><select name="disease_area" id="disease_area" class="text ui-widget-content ui-corner-all">
             <option><?php echo $disease_area  = $row_allegation['disease_area']; ?></option>
             <option>TB</option>
             <option>Malaria</option>
             <option>HIV</option>
             <option>HSS</option>
             <option>N/A</option>
           </select></td>
           <td valign="top"><strong></strong></td>
           <td valign="top"><?php echo $source_details = $row_allegation['source_details']; ?></td>
      </tr>
      <tr>
        <td valign="top"><strong>Primary Level of wrongdoing :</strong></td>
        <td valign="top">
        <select name="wrongdoing1" id="wrongdoing1" class="text ui-widget-content ui-corner-all">
            <option><?php echo $wrongdoing1  = $row_allegation['wrongdoing_level1']; ?></option>
                <option value=""></option>
                <option value="Secretariat">Secretariat</option>
                <option value="CCM">CCM</option>
                <option value="LFA">LFA</option>
                <option value="PR">PR</option>
                <option value="SR">SR</option>
                <option value="SSR">SSR</option>
                <option value="Supplier">Supplier</option>
                <option value="Other">Other</option>
        </select>
        </td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><strong>Secondary Level of wrongdoing :</strong></td>
        <td valign="top"><select name="wrongdoing2" id="wrongdoing2" class="text ui-widget-content ui-corner-all">
          <option><?php echo $wrongdoing2  = $row_allegation['wrongdoing_level2']; ?></option>
          <option value="Secretariat">Secretariat</option>
          <option value=""></option>
          <option value="CCM">CCM</option>
          <option value="LFA">LFA</option>
          <option value="PR">PR</option>
          <option value="SR">SR</option>
          <option value="SSR">SSR</option>
          <option value="Supplier">Supplier</option>
          <option value="Other">Other</option>
        </select></td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    
    </fieldset>
    </div> 
    
    
    <!--GRANT DETAILS-->
    
    <div class="form-style-5">
    <?php
    $checkbox8 = $row_allegation['checkbox8'];
    $checkbox9 = $row_allegation['checkbox9'];
    $checkbox10 = $row_allegation['checkbox10'];
    $checkbox11 = $row_allegation['checkbox11'];
    $checkbox12 = $row_allegation['checkbox12'];
    $checkbox13 = $row_allegation['checkbox13'];
    $checkbox14 = $row_allegation['checkbox14'];
    $checkbox15 = $row_allegation['checkbox15'];
    $checkbox16 = $row_allegation['checkbox16'];
    $checkbox17 = $row_allegation['checkbox17'];
    $checkbox18 = $row_allegation['checkbox18'];
    $checkbox19 = $row_allegation['checkbox19'];
    $checkbox20 = $row_allegation['checkbox20'];
    $checkbox21 = $row_allegation['checkbox21'];
    ?> 
    <fieldset>
    <legend><span class="number">2</span> Grants Details </legend>
    
    <table class="report" width="100%">
    <tr>
      <td width="20%" valign="top">
    
           <div id="entities-contain">
          <table>
          <tr>
          <th colspan="4"><strong>Health Products</strong></th>
          </tr>
                <tr><td><input name="checkbox9" type="checkbox" value="" class="ui-widget" <?php echo $checkbox9 ?>/></td><td>ART</td>
                  <td><input name="checkbox12" type="checkbox" value="" class="ui-widget" <?php echo $checkbox12 ?>/></td><td>ACT</td></tr>
                <tr><td><input name="checkbox10" type="checkbox" value="" class="ui-widget" <?php echo $checkbox10 ?>/></td><td>ITNS & LLINS</td>
                  <td ><input name="checkbox13" type="checkbox" value="" class="ui-widget" <?php echo $checkbox13 ?>/></td>
                  <td>Condoms</td>
                </tr>
                <tr>
                  <td><input name="checkbox11" type="checkbox" value="" class="ui-widget" <?php echo $checkbox11 ?>/></td>
                  <td>Syringes / Needles</td>
                  <td><input name="checkbox14" type="checkbox" value="" class="ui-widget" <?php echo $checkbox14 ?>/></td>
                  <td>Other</td>
                </tr>
          </table>
      </div>      
      </td>
      
      
       <td width="100%" rowspan="3" valign="top">
         <iframe src="link_grants_to_allegation.php" align="top" width="100%" height="400" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"> </iframe>
        <table width="100%">
            <tr>
            <td width="9%"><strong>Comments</strong></td>
            <td width="91%">
            <textarea name="grant_number" id="grant_number" style="width:98%" rows="4" class="text ui-widget-content ui-corner-all"><?php echo $grant_number = $row_allegation['grant_number'];?></textarea>
            </td>
            </tr>
        </table> 
      </td>
      
      </tr>
    <tr>
      <td valign="top">
        <div id="entities-contain">
          <table>
          <tr>
          <th colspan="4"><strong>Non - Health Products</strong></th>
          </tr>
            <tr>
              <td><input name="checkbox15" type="checkbox" value="" class="ui-widget" <?php echo $checkbox15 ?>/></td>
              <td style="background:#FFF">Vehicle</td>
              <td><input name="checkbox18" type="checkbox" value="" class="ui-widget" <?php echo $checkbox18 ?>/></td>
              <td style="background:#FFF">Training</td>
              </tr>
            <tr>
              <td><input name="checkbox16" type="checkbox" value="" class="ui-widget" <?php echo $checkbox16 ?>/></td>
              <td>Petrol</td>
              <td><input name="checkbox19" type="checkbox" value="" class="ui-widget" <?php echo $checkbox19 ?>/></td>
              <td>Food vouchers</td>
              </tr>
            <tr>
              <td><input name="checkbox17" type="checkbox" value="" class="ui-widget" <?php echo $checkbox17 ?>/></td>
              <td>Office furniture</td>
              <td><input name="checkbox20" type="checkbox" value="" class="ui-widget" <?php echo $checkbox20 ?>/></td>
              <td>Other</td>
              </tr>
            </table>
          </div>      
        
      </td>
      </tr>
    <tr>
      <td valign="top">
           <div id="entities-contain">
          <table>
          <tr>
          <th colspan="2"><strong>Health Products</strong></th>
          </tr>
            <tr>
              <td><input name="checkbox21" type="checkbox" value="" class="ui-widget" <?php echo $checkbox21 ?>/></td>
              <td>Recruitment / HR</td>
              </tr>
            <tr>
              <td><input name="checkbox8" type="checkbox" value="" class="ui-widget" <?php echo $checkbox8 ?>/></td>
              <td>Procurement related</td>
              </tr>
            </table>
          </div> 
        
      </td>
      </tr>
    </table>  
    </fieldset>
    </div> 
    
    
    <!--ALLEGATIONS DETAILS-->
    
    
    <div class="form-style-5">
    <fieldset>
    <legend><span class="number">3</span> Allegations Details</legend>
    
    <?php
        $allegations = $row_allegation['allegations'];
        if ( $allegations != "" ){ ?>
                            <table width="100%" class="report">
                <tr>
                <td width="51%" valign="top">
                
                <table>
                <tr>
                <td><strong>Category :</strong></td>
                <td width="432" align="left">
                <select name="category_type" id="category_type" onChange="reportingoptions(this)" class="text ui-widget-content ui-corner-all">
                <option><?php echo $category_type  = $row_allegation['category_type']; ?></option>
                <option>N/A</option>
                <option value="Corruption">Corruption</option>
                <option value="Fraud">Fraud</option>
                <option value="Coercion">Coercion</option>
                <option value="Collusion">Collusion</option>
                <option value="Non-Compliance with laws / Grant agreements">Non-Compliance with laws / Grant agreements</option>
                <option value="Human Rights Violations">Human Rights Violations</option>
                <option value="Product Issues (JIATF)">Product Issues (JIATF)</option>  
                </select>
                </td>
                </tr>
                <tr>
                  <td><strong>Subcategory :</strong></td>
                  <td align="left"><select name="sub_category_type" id="sub_category_type" class="text ui-widget-content ui-corner-all">
                    <option><?php echo $sub_category_type  = $row_allegation['sub_category_type']; ?></option>
                  </select></td>
                </tr>
            </table>
            
            </td>
                <td width="49%"valign="top"><table>
                  <tr>
                    <td valign="top" ><strong>Other categories related</strong></td>
                    <td colspan="2"  style="background:#FFF"><?php
                        $checkbox1 = $row_allegation['checkbox1'];
                        $checkbox2 = $row_allegation['checkbox2'];
                        $checkbox3 = $row_allegation['checkbox3'];
                        $checkbox4 = $row_allegation['checkbox4'];
                        $checkbox5 = $row_allegation['checkbox5'];
                        $checkbox6 = $row_allegation['checkbox6'];
                        $checkbox7 = $row_allegation['checkbox7'];
                        ?>
                      <table style="background:#FFF" BORDER=0>
                        <tr>
                          <td style="background:#FFF"><input name="checkbox1" type="checkbox" value="" class="ui-widget" <?php echo $checkbox1 ?>/></td>
                          <td style="background:#FFF">Corruption</td>
                          <td style="background:#FFF"><input name="checkbox2" type="checkbox" value="" class="ui-widget" <?php echo $checkbox2 ?>/></td>
                          <td style="background:#FFF">Fraud</td>
                        </tr>
                        <tr>
                          <td style="background:#FFF"><input name="checkbox3" type="checkbox" value="" class="ui-widget" <?php echo $checkbox3 ?>/></td>
                          <td style="background:#FFF">Coercion</td>
                          <td style="background:#FFF"><input name="checkbox4" type="checkbox" value="" class="ui-widget" <?php echo $checkbox4 ?>/></td>
                          <td style="background:#FFF">Collusion</td>
                        </tr>
                        <tr>
                          <td style="background:#FFF"><input name="checkbox5" type="checkbox" value="" class="ui-widget" <?php echo $checkbox5 ?>/></td>
                          <td style="background:#FFF">Non-Compliance with laws / Grant agreements</td>
                          <td style="background:#FFF"><input name="checkbox6" type="checkbox" value="" class="ui-widget" <?php echo $checkbox6 ?>/></td>
                          <td style="background:#FFF">Human Rights Violations</td>
                        </tr>
                        <tr>
                          <td style="background:#FFF"><input name="checkbox7" type="checkbox" value="" class="ui-widget" <?php echo $checkbox7 ?>/></td>
                          <td style="background:#FFF">Product Issues (JIATF)</td>
                          <td style="background:#FFF"></td>
                          <td style="background:#FFF"></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            
      </tr>
            
            <tr>
            <td colspan="2">
             <?php echo nl2br($allegations); ?>
             </td>
      </tr>
            </table>
            
        <?php }else{ ?>
            <iframe src="list_risk_types.php" align="top" width="100%" height="500" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"> </iframe>
        <?php } ?>
    </fieldset>
    </div>
    
    
    <!--ASSESSMENT AND CONCLUSION-->
    
    <div class="form-style-5">
    <fieldset>
    <legend><span class="number">4</span> Assessment and Conclusion</legend>
    <textarea name="comments" id="comments" style="width:100%" rows="18" class="text ui-widget-content ui-corner-all"><?php echo $comments = $row_allegation['comments'];?></textarea>
    <br />
        <table class="report">
        <tr>
            <td><strong><font color="#FF0000">Conclusion and recommendation</font></strong></td>
            <td>
              <select name="resolution" id="resolution" class="text ui-widget-content ui-corner-all">
              <?php $resolution = $row_allegation['resolution'];?>
                      <option value="<?php echo $resolution?>"><?php echo $resolution;?></option>
                        <option value="Open case in CMS">Open case in CMS</option>
                        <option value="Merge with an existing Case">Merge with an existing Case in CMS</option>
                        <option value="Merge with an existing Allegation">Merge with an existing Allegation</option>
                        <option value="No further action">No further action</option>
                        <option value="Referral to Secretariat for information only">Referral to Secretariat for information only</option>
                        <option value="Referral to Secretariat for management action">Referral to Secretariat for management action</option>
                        <option value="Referral to external agency">Referral to external agency</option>
                        <option value="Referral to OIG Audit">Referral to OIG Audit</option>
                        <option value="Information report">Information report</option>
                        <option></option>
                      </select>
              </td>
            </tr>
        </table>  
    </fieldset>
    </div>
    
    
    <!--OLD CASE SUMMARY-->
    <?php
    $case_summary = $row_allegation['case_summary'];
    if ( $case_summary != "" ){
    ?>
        <table width="100%" class="report">
        <tr>
        <td valign="top">
            <div class="form-style-5">
                <fieldset>
                <legend><span class="number">5</span> Case Summary</legend>
                <?php
                    echo nl2br($case_summary);
                ?>
                </fieldset>
            </div>
        </td>
        </tr>
        
        </table>
    <?php } ?>
    
    
    </form>

        
</div>


<!--ENTITIES TAB-->

<div id="tabs-2">
    <?php
    include ("add_entity_interest.php");
    ?>	
</div>


<!--INTELLIGENCE REPORT TAB-->

<div id="tabs-3">
<?php
    include ("link_intelligence_reports_to_allegation.php");
    ?>	
</div>

<!--ALLEGATIONS LINKED FOR PROACTIVE TAB-->

<?php	
if ( $type_allegation == 'Proactive' ){ 
	$result_proactive_linked = sqlsrv_query($conncss,"SELECT * FROM proactive_link WHERE id = '$id'", array(), array( "Scrollable" => 'buffered'));
	$num_rows = sqlsrv_num_rows($result_proactive_linked);
?>
<div id="tabs-4">
    <p>
    <?php
    include ("link_allegation_proactive.php");
    ?>	
    </p>
</div>
<?php } ?>


<!--NOTES TAB-->

<div id="tabs-6">
<table align="right" class="gridtable">
<tr>
<td align="right">

<a style="text-decoration:none" href="#" id="add_note"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Add Note</a>

</td>
</tr>
</table>



<div id="dialog-form-notes" title="Add new note">
<form action="save_new_note.php" id="newnote" name="newnote" method="post">
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
    $notes_query = sqlsrv_query($conncss,"SELECT * FROM notes WHERE allegation_id = '$id' ORDER BY date_note DESC, id DESC");
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


<!--TAB FOLLOW UPS-->

<div id="tabs-7">  
<p>   

<table width="100%">
<tr>
<td align="right">

<a style="text-decoration:none" href="#" id="add_followup"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Add Follow Up</a>


</td>
</tr>
</table>



<div id="dialog-form-followup" title="Add new Follow Up">

<form action="save_new_follow_up.php" id="newfollowup" name="newfollowup" method="post">

<div id="notes-contain"> 
<table width="100%" border="0" align="center">
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
                  <td width="162" align="left" bgcolor="#FFFFFF"><strong>Status :</strong></td>
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
                  <td width="265" bgcolor="#FFFFFF">
                  <select name="responsable" id="responsable" class="text ui-widget-content ui-corner-all">
                    <option></option>
                    <option>FPM</option>
                    <option>Head Department</option>
                    <option>Regional Manager</option>
                    <option>Investigator</option>
                    <option>Auditor</option>
                    <option>Complainant</option>
                    <option>Other</option>
                  </select></td>
                  <td width="91" bgcolor="#FFFFFF"><strong>Name :</strong></td>
                  <td colspan="2" bgcolor="#FFFFFF"><input name="name_responsable" type="text" id="name_responsable" style="width:100%" class="text ui-widget-content ui-corner-all"/></td>
                </tr>
                
                  <tr>
                    <td valign="middle" bgcolor="#FFFFFF"><strong>Date notified :</strong></td>
                    <td valign="middle" bgcolor="#FFFFFF"><input type="text" id="date_notified" name="date_notified" class="text ui-widget-content ui-corner-all"/></td>
                    <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="435" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="middle" bgcolor="#FFFFFF"><strong>Date to follow up:</strong></td>
                    <td valign="middle" bgcolor="#FFFFFF"><input type="text" id="date_follow_up" name="date_follow_up" class="text ui-widget-content ui-corner-all"/></td>
                    <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
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
</div>



<div id="entities-contain">
<table>
                <tr>
                  <th width="2" align="center"></th>
                  <th width="200">Status</th>
                  <th width="200"><strong>Responsable</strong></th>
                  <th width="250" align="center"><strong>Name</strong></th>
                  <th width="150">Follow up date</th>
                  <th width="150">Created by</th>
                  <th width="5"></th>
  </tr>
                <?php
					$id = $_SESSION['id']; 
					$result_follow_ups = sqlsrv_query($conncss,"SELECT * FROM follow_ups WHERE allegation_id = '$id' ORDER BY status");
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


<!--LINKS TAB-->

<div id="tabs-8">
<div id="notes-contain"> 
			<table width="100%" border="0" align="center">
       			    <tr>
                      <td width="151" align="left"><strong>Allegations related:</strong></td>
                      <td width="1139">
                      
					  <?php
						$id = $_SESSION['id'];
						$result_allegation_related = sqlsrv_query($conncss,"select * from allegation_details WHERE id = '$id'"); 
						$row_allegation_related = sqlsrv_fetch_array( $result_allegation_related );
						
						$allegation_related = $row_allegation_related['allegation_related'];
						if ( $allegation_related != "" ){
						?>
	                        <a href="details_sr.php?allegation_id=<?php echo $allegation_related ?>" target="iframe"><img src="images/document-icon-sr.png" width="20" height="20" align="top" title="Allegation <?php echo $allegation_related ?>"/></a>
                     <?php       
					 echo $allegation_related;
					 
					 
							$result_other3_related_allegations = sqlsrv_query($conncss,"select * from allegation_details WHERE allegation_related = '$allegation_related'"); 
							while($row_result_other3_related_allegations = sqlsrv_fetch_array($result_other3_related_allegations))
							{
								$other3_allegation_related = $row_result_other3_related_allegations['id'];
								
								if ( $other3_allegation_related != $id ) {
								?>
									<a href="details_sr.php?allegation_id=<?php echo $other3_allegation_related ?>" target="iframe"><img src="images/document-icon-sr.png" width="20" height="20" align="top" title="Allegation <?php echo $other3_allegation_related ?>"/></a>
	               			 <?php
								echo $other3_allegation_related;
								}
							}
							
							$result_other4_related_allegations = sqlsrv_query($conncss,"select * from allegation_details WHERE id = '$allegation_related'");
					 		$row_result_other4_related_allegations = sqlsrv_fetch_array($result_other4_related_allegations);
							$other4_allegation_related = $row_result_other4_related_allegations['allegation_related'];
							if ( $other4_allegation_related != "" ){
								?>
	                        <a href="details_sr.php?allegation_id=<?php echo $other4_allegation_related ?>" target="iframe"><img src="images/document-icon-sr.png" width="20" height="20" align="top" title="Allegation <?php echo $other4_allegation_related ?>"/></a>
                     <?php       
							 echo $other4_allegation_related;
					 
							}
							
							
								$result_other7_related_allegations = sqlsrv_query($conncss,"select * from allegation_details WHERE allegation_related = '$id'"); 
									while($row_result_other7_related_allegations = sqlsrv_fetch_array($result_other7_related_allegations))
									{
										$other7_allegation_related = $row_result_other7_related_allegations['id'];
										
										if ( $other7_allegation_related != $id ) {
										?>
											<a href="details_sr.php?allegation_id=<?php echo $other7_allegation_related ?>" target="iframe"><img src="images/document-icon-sr.png" width="20" height="20" align="top" title="Allegation <?php echo $other7_allegation_related ?>"/></a>
									 <?php
										echo $other7_allegation_related;
										}
									}	
									
							
				 
						}else{
				 

				
						$result_other5_related_allegations = sqlsrv_query($conncss,"select * from allegation_details WHERE allegation_related = '$id'");	
						$all_alleg = sqlsrv_fetchall($result_other5_related_allegations); 
						$num_allegations_related = count($all_alleg);						
						if ( $num_allegations_related != 0 ) {
								$row_result_other5_related_allegations = $all_alleg[0];
								$allegation_related = $row_result_other5_related_allegations['id'];
								?>
								<a href="details_sr.php?allegation_id=<?php echo $allegation_related ?>" target="iframe"><img src="images/document-icon-sr.png" width="20" height="20" align="top" title="Allegation <?php echo $allegation_related ?>"/></a>
							<?php
								echo $allegation_related;
								
								
								$result_other6_related_allegations = sqlsrv_query($conncss,"select * from allegation_details WHERE allegation_related = '$allegation_related'"); 
									while($row_result_other6_related_allegations = sqlsrv_fetch_array($result_other6_related_allegations))
									{
										$other6_allegation_related = $row_result_other6_related_allegations['id'];
										
										if ( $other6_allegation_related != $id )
										{
										?>
											<a href="details_sr.php?allegation_id=<?php echo $other6_allegation_related ?>" target="iframe"><img src="images/document-icon-sr.png" width="20" height="20" align="top" title="Allegation <?php echo $other6_allegation_related ?>"/></a>
									 <?php
										echo $other6_allegation_related;
										}
									}
						}
						}
?>
                    
                      </td>
                    </tr>
			</table>
</div>            
<?php
if ( $allegation_related != "" ){
?>	
	<div align="center">
		<p>
		<iframe
			name="iframe"
			width="1300"
			height="800"
			src="details_sr.php?allegation_id=<?php echo $allegation_related ?>"
			frameborder="no"
			scrolling="yes">
		</iframe>
		<p>
	</div>
<?php
}
?>            

            
</div>


<!--GENERAL TAB-->

<div id="tabs-9">
        
<form method="post" action="save_finalise_allegation.php?id=<?php echo $id ?>" enctype="multipart/form-data">       

<table class="gridtablefilter">
       			    
       			    <tr>
                      <td align="left"><strong>Allegation Id:</strong></td>
                      <td colspan="3">
                      <?php echo $id; ?>
                      </td>
  </tr>
                    <tr>
                      <td align="left"><strong>Status:</strong></td>
                      <td colspan="3"><?php echo $status = $row_allegation['status'];?></td>
                    </tr>
                    <tr>
                      <td align="left"><strong>Resolution:</strong></td>
                      <td colspan="3">
					  <select name="resolution" id="resolution" class="text ui-widget-content ui-corner-all">
						<?php $resolution = $row_allegation['resolution'];?>
                        <option value="<?php echo $resolution;?>"><?php echo $resolution;?></option>
                        <option value="Open case in CMS">Open case in CMS</option>
                        <option value="Merge with an existing Case">Merge with an existing Case in CMS</option>
                        <option value="Merge with an existing Allegation">Merge with an existing Allegation</option>
                        <option value="No further action">No further action</option>
                        <option value="Referral to Secretariat for information only">Referral to Secretariat for information only</option>
                        <option value="Referral to Secretariat for management action">Referral to Secretariat for management action</option>
                        <option value="Referral to external agency">Referral to external agency</option>
                        <option value="Referral to OIG Audit">Referral to OIG Audit</option>
                        <option value="Information report">Information report</option>
                        <option></option>
                      </select>
                      </td>
                    </tr>
                    
						<tr>
						  <td align="left"><strong>Case / Allegation Number:</strong></td>
                          <td colspan="3">
							  <select name="case_number" id="case_number" class="text ui-widget-content ui-corner-all">
                              
								<?php 

								
								$case_number = $row_allegation['case_number'];
								$dash = " - ";
								?>
								<option value="<?php echo $case_number;?>"><?php echo $case_number;?></option>
                                <optgroup label="Cases">
								<?php
								$result_cases = sqlsrv_query($conncss,"SELECT * FROM $cmsdb.cases"); 
								 while($row_cases = sqlsrv_fetch_array($result_cases)){
									$country_case = $row_cases['country'];
									$case_number = $row_cases['ref_number'];
									echo "<option value='$case_number'>$case_number$dash$country_case</option>";
								}
								?>
                                </optgroup>
                                <optgroup label="Allegations">
                                <?php
								$result_all_allegations = sqlsrv_query($conncss,"SELECT * FROM allegation_details"); 
								 while($row_all_allegation = sqlsrv_fetch_array($result_all_allegations)){
									$country_allegation = $row_all_allegation['country'];
									$allegation_number = $row_all_allegation['id'];
									echo "<option value='$allegation_number'>$allegation_number$dash$country_allegation</option>";
								}
								?>
                                
                                </optgroup>
							  </select>
						  </td>
						</tr>
    <tr>
  <td align="left"><strong>Complainant Updated :</strong></td>
  <td align="left">
		<?php
        $complainant_updated = $row_allegation['complainant_updated'];
        $check4 = $row_allegation['check4'];
        if ($check4 != "checked"){
        	if ($complainant_updated != ""){
				echo $complainant_updated_newDate = date('F j, Y', strtotime($complainant_updated));
        	}else{
        		?>

                <input id="date_updated" type="text" name="date_updated" class="text ui-widget-content ui-corner-all"/>
                <?php
        	}
        }
        
        ?></td>
  <td align="right"><strong>Not required</strong></td>
  <td align="left"><input type="checkbox" style="border: 0; background:transparent" name="check4" <?php echo $check4 ?> class="text ui-widget-content ui-corner-all"/></td>
  </tr>
<tr>
  <td align="left"><strong>Updated Via:</strong></td>
  <td colspan="3" align="left">
  <select name="updated_via" id="updated_via" class="text ui-widget-content ui-corner-all">
    <option> <?php echo $updated_via  = $row_allegation['updated_via'];?></option>
    <option>Email</option>
    <option>Global Compliance</option>
    <option>Phone</option>
    <option>Other</option>
  </select>
  </td>
  </tr>
    <tr>
      <td colspan="4" align="center">
      <?php
        //$result_allegation_finalised = sqlsrv_query($conncss,"select status, resolution, case_number, complainant_updated, check4, updated_via  FROM allegation_details WHERE id = '$id'"); 
        //$row_allegation_finalised = sqlsrv_fetch_array( $result_allegation_finalised );
        
      $status = $row_allegation['status'];
      if ( $status == "Pending finalization" ){
      ?><br />
<br />

        <a href="javascript:finalise_allegation(<?php echo $id ?>)">
        <button TYPE = "Submit" Name = "Submit" VALUE = "Finalise allegation">Finalise allegation</button>
        </a>
       <?php } ?> 
      </td>
  </tr>
   </table>
   </form>
</div>


<!--HISTORY TAB-->


<div id="tabs-10">
<?PHP
$result_allegation_ckeck = sqlsrv_query($conncss,"select * from allegation_details WHERE id = '$id'"); 
$row_allegation_check = sqlsrv_fetch_array( $result_allegation_ckeck );
$reviewed_by_officer = $row_allegation_check['reviewed_by_officer'];
$reviewed_by_officer_date = $row_allegation_check['reviewed_by_officer_date'];
?>
      
 <table class="gridtablefilter">
                         				<tr>
                         				  <td align="left"><strong>Number of screening days:</strong></td>
                         				  <td><font size="+1">
                         				    <?php
										  if ( $row_allegation_check['reviewed_by_officer_date'] != "Unknown" ){
												$date1 = new DateTime($row_allegation_check['date_received']);
												$date2 = new DateTime($row_allegation_check['reviewed_by_officer_date']);
												echo $screening_days = $date2->diff($date1)->format("%a");
										  }
										  ?>
                         				  </font></td>
                         				  <td>&nbsp;</td>
                         				  <td>&nbsp;</td>
                       				  </tr>
                         				<tr>
                         				  <td align="left"><strong>Complaint Received:</strong></td>
                         				  <td><?php
										  
										  		

											$received_date = date('F j, Y', strtotime($row_allegation_check['date_received']));
											echo $received_date;
										?></td>
                         				  <td>&nbsp;</td>
                         				  <td>&nbsp;</td>
  </tr>
                                        <tr>
                         				  <td align="left"><strong>Complaint Acknowledged:</strong></td>
                         				  <td><?php
											$complaint_ack = $row_allegation_check['complaint_acknowledged_date'];
											$complaint_ack_newDate = date('F j, Y', strtotime($complaint_ack));
												if ($complaint_ack != ""){
													echo $complaint_ack_newDate;
												}else{
													echo "<font color='red'>Unknown</font>";											
												}
										?></td>
                         				  <td align="right">&nbsp;</td>
                         				  <td align="left">&nbsp;</td>
               				          </tr>
                                      <tr>
                         				  <td align="left" valign="top"><strong>Complaint Allocated:</strong></td>
                         				  <td valign="top">
										  <?php
											$result_allocation = sqlsrv_query($conncss,"SELECT * FROM allocation WHERE allegation_id = '$id'");
											while ($row_allocation = sqlsrv_fetch_array($result_allocation)) {
												
												 if ($date_allocated = $row_allocation['date_allocated'] != "" ){
													echo $date_allocated = date('F j, Y', strtotime($row_allocation['date_allocated']));
												 }else{
													echo "  (date Unknown)";
												 }
												 echo "&nbsp;&nbsp;( ";
												  echo $team_member = $row_allocation['team_member'];
												  echo " )";
												echo "<br />";
											}
										  ?>
                                        </td>
                         				  <td colspan="2">&nbsp;</td>
                       				  </tr>
                                      
                                      
                                      	
                         				<tr>
                         				  <td align="left"><strong>SR submitted to Screening Officer:</strong></td>
                         				  <td><?php
											$submitted_to_officer = $row_allegation_check['submitted_to_officer'];
											$submitted_date_officer = $row_allegation_check['submitted_date_officer'];


											if ($submitted_to_officer == "Yes" && $submitted_date_officer == "Unknown"){
												echo "Date unknown";
											}else if ($submitted_to_officer == "Yes" && $submitted_date_officer != "Unknown"){
												$submitted_date_officer_newDate = date('F j, Y', strtotime($submitted_date_officer));
												echo $submitted_date_officer_newDate;
											}else{
												echo "<font color='red'>Pending</font>";											
											}												
										?></td>
                         				  <td>&nbsp;</td>
                         				  <td>&nbsp;</td>
               				          </tr>
                         				<tr>
                         				  <td align="left"><strong>SR aprroved by Screening Officer:</strong></td>
                         				  <td><?php
											
											
											if ($reviewed_by_officer == "Yes" && $reviewed_by_officer_date == "Unknown"){
												echo "Date unknown";
											}else if ($reviewed_by_officer == "Yes" && $reviewed_by_officer_date != "Unknown"){
												$submitted_date_officer_newDate = date('F j, Y', strtotime($reviewed_by_officer_date));
												echo $submitted_date_officer_newDate;
											}else{
												echo "<font color='red'>Pending</font>";											
											}
											
										
										?></td>
                         				  <td>&nbsp;</td>
                         				  <td>&nbsp;</td>
               				          </tr>
                         				<tr>
                                  <td align="left"><strong>Complainant Updated :</strong></td>
                                  <td><?php
										  $complainant_updated = $row_allegation_check['complainant_updated'];
											$complainant_updated_newDate = date("F j, Y", strtotime($complainant_updated));
											$check4 = $row_allegation_check['check4'];
											if ($check4 != "checked"){
												if ($complainant_updated != ""){
													echo $complainant_updated_newDate;													
												}else{
													echo "<font color='red'>Pending</font>"; 
												}
											}else{
												echo "Not Required";
											}
								?></td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  
                                   <tr>
                                      <td align="left"><strong>Updated Via:</strong></td>
                                      <td><?php echo $updated_via = $row_allegation_check['updated_via'];?></td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
  </tr>
                                    <tr><td colspan="4"><hr /></td></tr>
                                    
                                    <tr>
                                      <td colspan="4" align="left" valign="top"><strong>Previous Actions:</strong><br />
</td>
									  <?php 
									  $result_reopen_allegation = sqlsrv_query($conncss,"SELECT * FROM reopen WHERE allegation_id = '$id'");
											while ($row_reopen = sqlsrv_fetch_array($result_reopen_allegation)) {
                                            ?>
                                                <table class="gridtable">
                                                <tr>
                                                <td>
                                                Report submitted by:
                                                </td>
                                                <td>
                                                <?php
												echo $member = $row_reopen['member'];
												?>
                                                </td>
                                                </tr>
                                                
                                                <tr>
                                                <td>
                                                Report submitted to Screening Officer:
                                                </td>
                                                <td>
                                                <?php
												$submitted_date_officer = $row_reopen['submitted_date_officer'];
												echo $submitted_date_officer_new = date('F j, Y', strtotime($submitted_date_officer));
												?>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                Report aprroved by Screening Officer:
                                                </td>
                                                <td>
                                                <?php
												$reviewed_by_officer_date = $row_reopen['reviewed_by_officer_date'];
												echo $reviewed_by_officer_date = date('F j, Y', strtotime($reviewed_by_officer_date));
												?>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                Complainant Updated :
                                                </td>
                                                <td>
                                                <?php
												$complainant_updated = $row_reopen['complainant_updated'];
												echo $complainant_updated = date('F j, Y', strtotime($complainant_updated));
												?>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                Reopened on:
                                                </td>
                                                <td>
                                                <?php
												$reopened_date = $row_reopen['reopened_date'];
												echo $reopened_date = date('F j, Y', strtotime($reopened_date));
												?>
                                                </td>
                                                </tr>
                                                </table>
											<?php
											}
									  ?>
                           			</tr>       
                                  
                                  
                                  
                        </table>
</div>        


</div>


</mainsr>

<div id="dialoghelp5" title="Help">
    <font style="font-size:13px">
    <strong>Prioritization of allegations for screening</strong> <br /><br />
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

<div id="dialoghelp3" title="Help">
   <?php include ("category_definition.php"); ?>
</div>

<div id="dialoghelp1" title="Help">
    <font style="font-size:13px">                   
    <strong>Primary level</strong> wrong doing refers to the main organizational entity subject of the reported issues under assessment, often referred to as the subjects of investigation, or the main perpetrators of wrongdoing. The drop down fields should be used to identify the business organization role primarily responsible for reported acts of fraud and abuse.
    <br />
    <br />
    <strong>Secondary level</strong> of wrong doing refers to co-conspirators who may have played an equal or lessor role in the wrongdoing, or otherwise knowingly or unknowingly acted as facilitators for the wrong doing.
    </font>
</div>

<div id="dialoghelp6" title="Help">
    <font style="font-size:13px">
    Provide a brief summary of reported matters.<br>
    This should include a short introductory paragraph that sets the context of the allegation, followed by a schedule of identified complaints described in simple English, and grouped (where applicable) in the four key risk types of the Global Fund<br><br />
    
    1. Programmatic & Performance<br>
    2. Financial & Fiduciary<br>
    3. Health Services & Product <br>
    4. Governance, Oversight & Management<br>
         &nbsp;&nbsp;&nbsp;4a. <br>
         &nbsp;&nbsp;&nbsp;4b.<br>
         &nbsp;&nbsp;&nbsp;4c. <br>
         </font>
</div>  
<div id="dialoghelp7" title="Help">
    <font style="font-size:13px">
    Include key additional information discovered during research that will influence the assessment and conclusion.<br>
    <br><br />
    
    
    Working through the numbered allegations, assess materiality, source credibility, risk and impact of each allegation strand. Make conclusions and recommendations for resolution.<br>
    <br><br />
    
    
    This section should read as an executive summary of the allegations, analysis, and conclusions in order to provide the reader with a succinct overview of all key issues.
    </font>
</div> 


<div id="dialoghelp8" title="Help">
    <font style="font-size:13px">
    As a header to this section include a new succinct Case Title (if different from the original CSS Title).<br><br />
    Where all, or partial allegations are recommended for OIG investigation, set them out in the key risk type format and numbering.<br><br />
    This section will populate the General Information field of CMS for the new case.
    </font>
</div> 

<div id="divcomments" title="Comments allegation <?php echo $id ?> - <?php echo $row_allegation['country']; ?>">
    <iframe id="modalIframecomments" frameborder="0" width="1000" height="720">
    Your browser is not supported
    </iframe>
</div>

<div id="divIdal" title="Edit Follow up">
    <iframe id="modalIframeIden" frameborder="0"  width="960" height="710">
    Your browser is not supported
    </iframe>
</div>


<div id="divscreeningreport" title="Screening Report Details">
    <iframe id="modalIframeIdal" frameborder="0" width="920" height="850">
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








<div id="dialog-form-comment" title="Add new comment">
    <form action="save_make_comment.php" id="Newcomments" name="Newcomments" method="post">
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




<div id="newstyle" style="display: none;" title="QUART Guide">
    <iframe id="frame" frameborder="0" width="100%" height="850">
    </iframe>
</div>

</body>
</html>
