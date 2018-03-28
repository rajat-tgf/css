<?php
require_once("includes\security.php");
$Security->GoSecure();

if ( isset ($_GET['id_report'])) {
	$id = $_GET['id_report'];
	session_start(); 
	$_SESSION['report_id']=$id;
}else{
	session_start();
$id = $_SESSION['report_id'];
}
		$result = sqlsrv_query($conncss,"select * from intelligence_reports WHERE id = '$id'"); 
		$row = sqlsrv_fetch_array( $result );


if ( isset ($_GET['saved'])) {
	echo "<script>alert('Draft has have been saved')</script>";
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

date_default_timezone_set("Europe/Madrid");

//header('Access-Control-Allow-Origin: http://192.168.1.2');

$username = $_SESSION['username'];




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
  $('#date_received').datepicker({dateFormat: 'yy-mm-dd'});
  $('#date_report_complete').datepicker({dateFormat: 'yy-mm-dd'});


});
</script>
<script>
$(function() {
	var dialog, form,
	
	dialog = $( "#new-entity-interest-form" ).dialog({
		autoOpen: false,
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
	
	
	
	$( "#link_entity_interest" ).button().on( "click", function() {
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
	
	
	
	$( "#link_intel_reports" ).button().on( "click", function() {
		dialog.dialog( "open" );
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
$( "#add_followup" ).button().on( "click", function() {
dialog.dialog( "open" );
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
$( "#add_note" ).button().on( "click", function() {
dialog.dialog( "open" );
});
});

$(function(){
  $('#datepickernote').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>

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
<br />  
<div id="tabs">
<ul>
<li><a href="#tabs-1">Report</a></li>
<li><a href="#tabs-2">IOE Assessment / Notes</a></li>
<li><a href="#tabs-3">Entities of Interest</a></li>
<li><a href="#tabs-4">Associated Intelligence Reports</a></li>
<li><a href="#tabs-5">Follow Ups</a></li>

</ul>
<div id="tabs-1">

<table width="100%" align="center" class="zui-table zui-table-rounded" style="background-color:#FFFFFF">
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
        <td valign="top"><strong>Case / Allegation Number related to</strong></td>
        <td style="background-color:#FFFFFF">
        <?php echo $reporter = $row['case_number']; ?>
        
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
</div> 
<?php

//.------------------------------------------------------------------TAB2

?>

<div id="tabs-2">

<form action="save_ioe_comments_intelligence_report.php" method="post">
<br>
                    
<table width="100%" align="center" style="background-color:#FFFFFF">
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
	
	if ( $status == "Finalised"){
		$button_submit_draft_officer = "disabled='disabled'";
	}
	
    ?>
      <button TYPE = "Submit" Name = "save_draft" VALUE = "Save draft" <?php echo "$button_save_draft" ?>>Save draft</button>
      <button TYPE = "Submit" Name = "submit_draft" VALUE = "Submit draft to Officer" <?php echo "$button_submit_draft_officer" ?>>Submit draft to Officer</button>
      <button TYPE = "Submit" Name = "approve_draft" VALUE = "Approve report"  <?php echo "$button_approve_report" ?>>Approve Report</button>
      <button TYPE = "Submit" Name = "return_draft" VALUE = "Return report"  <?php echo "$button_reject_report" ?>>Return Report</button></td>
    </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%" align="left" valign="middle"><table width="475" class="zui-table zui-table-rounded" >
      <tr>
        <td width="145" align="right"><strong>Status :</strong></td>
        <td width="206" style="background:#FFF"><?php echo $status  = $row['status'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>days :</strong></td>
        <td style="background:#FFF"><font size="+1">
          <?php
	  if ( $reviewed_by_officer_date = $row['reviewed_by_officer_date'] != "Unknown" ){
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
          <font <?php echo $color ?>><?php echo $screening_days; ?></font>
          <?php } ?></td>
      </tr>
      <tr>
        <td align="right"><strong>Screening Member :</strong></td>
        <td style="background:#FFF"><?php echo $member = $row['member']; ?></td>
      </tr>
    </table></td>
    <td width="50%" align="right" valign="top"><table width="475" class="zui-table zui-table-rounded" >
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
    </table></td>
    </tr>
</table>
<br>
<br>
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

    <table width="100%" align="center" style="background-color:#FFFFFF" class="zui-table zui-table-rounded">
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
</table>
<br>
<br>

<table width="100%" class="gridtable">
<tr>
    <td style="background-color:#FFFFFF">
    <strong>IOE comments / observations / outcome / dissemination restrictions</strong>
    </td></tr>
    <td>
    <textarea name="ioe_comments" id="ioe_comments" style="width:100%" rows="12" class="text ui-widget-content ui-corner-all"><?php echo $ioe_comments;?></textarea>
    </td>
  </tr>
  </table>
</form>


</div>
<?php

//-----------------------------------------------------TAB3

?>
<div id="tabs-3">



<table width="100%">
<tr>
<td align="right">
<button id="link_entity_interest" form="link_entity_interest"><img src="images/link-add-icon1.png" width="25" height="19" align="middle" title="link"/></button>
</td>
</tr>
</table>

<div id="new-entity-interest-form" title="Link entity to Intelligence Report">
       <iframe name="iframedetails_links" id="iframedetails_links" src="search_entity_link_intelligence.php" width="100%" height="100%" style="padding:1px;border:0px;">
       </iframe>
</div> 



<div id="entities-contain">

                <table id="entities-contain">
                <tr>
                  <th width="8%">Id</th>
                  <th width="47%">Name</th>
                  <th width="15%">City</th>
                  <th width="27%">Nationality / Country based</th>
                  <th width="3%"></th>
                </tr>
                <?php

                    $result_entity = sqlsrv_query($conncss,"SELECT * FROM entities_intel_reports WHERE report_id = '$id'");
					
                    while($row_entity = sqlsrv_fetch_array($result_entity))
                      {
						  $entity_id = $row_entity['entity_id'];
                          $result_entity_details = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id'");
                          $row_entity_details = sqlsrv_fetch_array($result_entity_details);

                        ?>
                        <tr>
                        <td align="center"><?php echo $entity_id; ?></td>
                        <td>
						<?php
							if ( $type_entity = $row_entity_details['type_entity'] != "Person" ){
								$icon = "entity-icon.png";
							}else{
								$icon = "user-silhouette-icon.png";
							}
								
							?>
							<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle" title="Person"/>
						
						<?php echo $name = $row_entity_details['name']; ?></td>
                        <td align="center"><?php echo $accro = $row_entity_details['head_city']; ?></td>
                        <td align="center"><?php echo $country = $row_entity_details['head_country']; ?></td>
                        <td>
                        <a href="unlink_entity_from_intel_report.php?&entity_to_unlink=<?php echo $entity_id ?>">
                         <img src="images/unlink-icon.png" width="20" height="20" align="top" title="Unlink Entity <?php echo $entity_id ?>"/>
                         </a>
                        </td>

                        <?php
                    }
				?>
				</table>
      
</div> 
</div>

<?php

//---------------------------------------------TAB4

?>

<div id="tabs-4">

<table width="100%">
<tr>
<td align="right">
<button id="link_intel_reports" form="link_intel_reports"><img src="images/link-add-icon1.png" width="25" height="19" align="middle" title="link"/></button>
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
                        ?>
                        <tr>
                         <td>
							<?php 
							$dash = "IR";
							echo $dash.$id_report = $row['id']; ?>
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
                                <a href="unlink_intel_from_intel_report.php?&intel_to_unlink=<?php echo $id_report ?>">
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

<table width="100%">
<tr>
<td align="right">
<button id="add_followup">Add Follow Up</button>
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
                                <img src="images/Edit-image-icon.png" width="20" height="20" align="top" title="Edit Follow up"/>
                                </a>

                        </td>
                        </tr>

						<?php }?>
				</table>

</div>             




 
</div>
    <div id="divIdal" title="Edit Follow up - Intelligence Report">
        <iframe id="modalIframeIden" frameborder="0" width="960" height="710">
        Your browser is not supported
        </iframe>
	</div>  

</body>
</html>
