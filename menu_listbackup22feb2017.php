<style>

ul {
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:#BCBCBC;

}

li {
    float: left;
			font-family:'century gothic', arial, sans-serif;
	font-size:13px;
}

li a, .dropbtn {
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
    display: inline-block;
    color:#000;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
			font-family:'century gothic', arial, sans-serif;
	font-size:13px;
    background-color:#999999;
}

li.dropdown {
    display: inline-block;
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
}

.dropdown-content {
		font-family:'century gothic', arial, sans-serif;
	font-size:13px;
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
			font-family:'century gothic', arial, sans-serif;
	font-size:13px;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color:#999999}

.dropdown:hover .dropdown-content {
    display:block;
}
</style>




<ul>
<li class="dropdown">
<a href="#" class="dropbtn"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;New</a>
<div class="dropdown-content">
<a style="text-decoration:none" href="" onClick="return parent.showDialog_new_allegation()"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Allegation</a>
<a style="text-decoration:none" href="" onClick="return parent.showDialognewir()"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Intelligence Report</a>
<a style="text-decoration:none" href="" onClick="return parent.showDialognewentity()"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Entity</a>
<a style="text-decoration:none" href="" onClick="return parent.showDialognewcheck()"><img src="images/addition-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Background check</a>

</div>
</li>
<li class="dropdown">
<a href="#" class="dropbtn"><img src="images/allocation-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Allocation</a>
<div class="dropdown-content">
<a style="text-decoration:none" href="" onClick="return parent.showDialog_allocate_allegation()"><img src="images/allocation-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Allegation</a>
<a style="text-decoration:none" href="" onClick="return parent.showDialog_allocate_ir()"><img src="images/allocation-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Intelligence Report</a>
<hr />

<a style="text-decoration:none" href="" onClick="return parent.showDialog_reallocate_allegation()"><img src="images/re_allocate_icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Re-allocate Allegation</a>
<a style="text-decoration:none" href="" onClick="return parent.showDialog_reallocate_ir()"><img src="images/re_allocate_icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Re-allocate Intelligence Report</a>

</div>
</li>
<li><a href="statistics.php"><img src="images/stats-2-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Statistics</a></li>
<li class="dropdown">
<a href="#" class="dropbtn"><img src="images/search-green-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Search</a>
<div class="dropdown-content">
<a style="text-decoration:none" href="search_allegations.php"><img src="images/search-green-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Allegations</a>
<a style="text-decoration:none" href="intelligence_reports.php"><img src="images/search-green-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Intelligence Reports</a>
<a style="text-decoration:none" href="search_entities.php"><img src="images/search-green-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Entities</a>
</div>
</li>


<li><a href="list_follow_ups.php"><img src="images/tag-orange-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Follow ups</a></li>
<li><a href="list_checks.php"><img src="images/screening.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Background checks and GF Due Diligence</a></li>
<li class="dropdown">
<a href="#" class="dropbtn"><img src="images/export-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Export</a>
<div class="dropdown-content">
	<a style="text-decoration:none" href="Export_allegations.php"><img src="images/table-export-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Allegations</a>
    <a style="text-decoration:none" href="export_irs.php"><img src="images/table-export-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Intelligence Reports</a>
	<a style="text-decoration:none" href="Export_entities.php"><img src="images/table-export-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Entities</a>
    <a style="text-decoration:none" href="export_followups.php"><img src="images/table-export-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Follow Ups</a>
    <a style="text-decoration:none" href="export_checks.php"><img src="images/table-export-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Background checks</a>
	<a style="text-decoration:none" href="" onClick="return parent.showDialogreport()"><img src="images/Word_download.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Monthly Management Report</a>
	<a style="text-decoration:none" href="" onClick="return parent.showDialogrereport()"><img src="images/Word_download.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Regional Report</a>
</div>
</li>
<li><a href="documents.php"><img src="images/Template-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Templates</a></li>


<?php
$username = $_SESSION['username'];
if ( $username == "Francisco INFANTE" ){ ?>
    <li class="dropdown">
    <a href="#" class="dropbtn"><img src="images/set.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;Manage</a>
    <div class="dropdown-content">
    <a style="text-decoration:none" href="manage_entities.php"><img src="images/manage.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;&nbsp;Entities</a>

    </div>
    </li>
<?php } 

$result9 = sqlsrv_query($conn,"SELECT * FROM screening_managers WHERE name = '$username'", array(), array( "Scrollable" => 'buffered'));
if ($cnt = sqlsrv_num_rows($result9) > 0){ ?>

    <li><a style="text-decoration:none" href="team_performance.php">
    <img src="images/Stopwatch.png" width="23" height="23" alt="" align="absmiddle" />
    Team Performance</a></li>
<?php } ?>

<li><a href="https://cms.inspectorgeneral.local/portal/" target="_blank"><img src="images/1oig-icon.png" width="22" height="22" alt="" align="absmiddle" />&nbsp;1OIG</a></li>
<table align="right"><tr><td valign="middle"><a href="logout.php" target="_parent"><img src="images/Log-Out-icon.png" alt="Log out" width="30" height="30" align="bottom"/></a></td></tr></table>
</ul>

