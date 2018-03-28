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

<script type="text/javascript">
	function showDialog(sr){
	parent.show_sr_Popup(sr);
	};

	function showDialogir(ir){
	parent.show_ir_Popup(ir);
	};

	function showDialognewallegation(){
	parent.show_new_allegation_Popup();
	};
	
	function showDialognewir(){
	parent.show_new_ir_Popup();
	};
	
</script> 
<script type="text/javascript">


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
	   $("#modalIframeIdfcheck").attr("src","intelligence_report_details.php?id_report=" + id_report);
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


function show_new_allegation_Popup(){
	   $("#divIdnewallegation").dialog("open");
	   $("#modalIframeIdnewallegation").attr("src","add_new_allegation_received.php");
	   return false;
	}
	$(document).ready(function() {
	   $("#divIdnewallegation").dialog({
			   autoOpen: false,
			   modal: true,
			   height: 940,
			   width: '95%',
			   resizable: false,
			   draggable: false,
		   
			   buttons : {
                "Add new allegation" : function() {
                  $('#new_allegation').submit();
				   $('#new_allegation').trigger('submit');
					alert ("New Allegation has been saved");
					$(this).dialog('close');
					
                }}
			   
		  });
	});
	
	
	function show_new_ir_Popup(){
	   $("#divIdnewir").dialog("open");
	   $("#modalIframeIdnewir").attr("src","add_new_intelligence_report.php");
	   return false;
	}
	$(document).ready(function() {
	   $("#divIdnewir").dialog({
			   autoOpen: false,
			   modal: true,
				height: 950,
				width: 1250,
			   resizable: false,
			   draggable: false,
		   
			   buttons : {
                "Add new Intelligence Report" : function() {
                  $('#new_allegation').submit();
				   $('#new_allegation').trigger('submit');
					alert ("New Allegation has been saved");
					$(this).dialog('close');
					
                }}
			   
		  });
	});
</script>

<script>
$(function() {
var dialog, form,

id_number = $( "#id_number" ),
team_member = $( "#team_member" ),
allFields = $( [] ).add( id_number ).add( team_member ),
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
updateTips( "You must select a allegation" );
return false;
} else {
return true;
}
}


function checkLength2( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
updateTips( "You must select a member" );
return false;
} else {
return true;
}
}


function allocatedcheck() {
var valid = true;
allFields.removeClass( "ui-state-error" );
valid = valid && checkLength( id_number, 3 );
valid = valid && checkLength2( team_member, 3 );

	if ( valid ) {
		$('#allocation').submit();
		dialog.dialog( "close" );
	}
	return valid;
}

	dialog = $( "#divIdallocateallegation" ).dialog({
		autoOpen: false,
		height: 230,
		width: 500,
		modal: true,
	
		buttons: {
		"Allocate": allocatedcheck,
	
		Cancel: function() {
		$( this ).dialog( "close" );
		}
	},

});
});

function showDialog_allocate(){
   $("#divIdallocateallegation").dialog("open");
   return false;
}

$(function() {
var dialog, form,

id_number = $( "#id_number" ),
team_member = $( "#team_member" ),
allFields = $( [] ).add( id_number ).add( team_member ),
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
updateTips( "You must select a complaint" );
return false;
} else {
return true;
}
}


function checkLength2( o, min ) {
if ( o.val().length < min ) {
o.addClass( "ui-state-error" );
updateTips( "You must select a member" );
return false;
} else {
return true;
}
}


function reallocatedcheck() {
var valid = true;
allFields.removeClass( "ui-state-error" );
valid = valid && checkLength( id_number, 3 );
valid = valid && checkLength2( team_member, 3 );

	if ( valid ) {
		$('#reallocation').submit();
		dialog.dialog( "close" );
	}
	return valid;
}

	dialog = $( "#redivId" ).dialog({
		autoOpen: false,
		height: 230,
		width: 500,
		modal: true,
		
	
		buttons: {
		"Re-allocate": reallocatedcheck,
	
		Cancel: function() {
		$( this ).dialog( "close" );
		}
	},
	

});
});

function showDialogre(){
   $("#redivId").dialog("open");
   return false;
}

	$(function() {
	var dialog, form,
	
	month = $( "#month" ),
	allFields = $( [] ).add( month ),
	tips = $( ".validateTips" );
	function updateTips( t ) {
	tips
	.text( t )
	.addClass( "ui-state-highlight" );
	setTimeout(function() {
	tips.removeClass( "ui-state-highlight", 1500 );
	}, 500 );
	}

	dialog = $( "#reportdivId" ).dialog({
		autoOpen: false,
		height: 180,
		width: 460,
		modal: true,
	
		buttons: {
		"Generate Report": function() {
			$('#report').submit();
			dialog.dialog( "close" );
		},
	
		Close: function() {
		$( this ).dialog( "close" );
		}
	},

	});
	});
	
	function showDialogreport(){
	   $("#reportdivId").dialog("open");
	   return false;
	}

$(function() {
var dialog, form,

region = $( "#region" ),
allFields = $( [] ).add( region ),
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
updateTips( "You must select a region" );
return false;
} else {
return true;
}
}




function reportcheck() {
var valid = true;
allFields.removeClass( "ui-state-error" );
valid = valid && checkLength( region, 3 );

	if ( valid ) {
		$('#rereport').submit();
		dialog.dialog( "close" );
	}
	return valid;
}

	dialog = $( "#reredivId" ).dialog({
		autoOpen: false,
		height: 220,
		width: 460,
		modal: true,
	
		buttons: {
		"Generate Report": reportcheck,
	
		Close: function() {
		$( this ).dialog( "close" );
		}
	},

});
});

function showDialogrereport(){
   $("#reredivId").dialog("open");
   return false;
}

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


<div id="divIdnewallegation" title="Add new Allegation">
    <iframe id="modalIframeIdnewallegation" frameborder="0" width="95%" height="870">
    Your browser is not supported
    </iframe>
</div>  

<div id="divIdnewir" title="Add new Intelligence Report">
    <iframe id="modalIframeIdnewir" frameborder="0" width="1220" height="800">
    Your browser is not supported
    </iframe>
</div> 

<div id="divIdallocateallegation" title="Allocate Allegation">
        <form id = "allocation" name = "allocation" method="post" action="save_allocated_allegation.php" >
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
                
                
<div id="redivId" title="Re-Allocate Allegation">
        <form id = "reallocation" name = "reallocation" method="post" action="save_re_allocated_allegation.php" enctype="multipart/form-data">
        <table border="0" align="center"  class="gridtable">
        <tr>
        <td height="28"><strong>Allegation :</td>
        <td>
        <select name="id_number" id="id_number" class="text ui-widget-content ui-corner-all">
        <option></option>
        <?php
        $result_allegations_no_allocated = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member != 'Not Allocated' AND status != 'Closed'"); 
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
            
            
            
            
            
            
            
            
            
            
            
            
            
               
        <?php
			if ( isset ($_GET['new_allegation_saved'])) {
		echo "<script>alert('New Allegation has been saved')</script>";
	}
				if ( isset ($_GET['new_intel_report'])) {
		echo "<script>alert('New Intelligence Reprot has been saved')</script>";
	}
					if ( isset ($_GET['reallocate'])) {
		echo "<script>alert('Allegation has been re-allocated')</script>";
	}
	if ( isset ($_GET['allocated'])) {
		echo "<script>alert('Allegation has been allocated')</script>";
	}
		?>
        
        
</body>
</html>