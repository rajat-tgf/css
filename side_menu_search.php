<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
error_reporting(0);

require_once("includes\\opendb.php");

session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");  // Redirecting To Home Page
}


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.10.4.custom.css">
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="script.js"></script>  
</head>

<body>

<table class="gridtablefilter">
  <tr>
  <td><img src="images/team.png" width="18" height="18" align="absmiddle"/></td>
    <td align="left">
      <a href="results.php?all=all" target='contentRightresults'>
        Everyone</a></td>
  </tr>
      <?php
    $result_members = sqlsrv_query($conncss,"SELECT * FROM $cmsdb.screening_member ORDER BY name ASC");
	while($row_members = sqlsrv_fetch_array($result_members)){ 
	$member = $row_members['name'];
		$result_number_allegations_member = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE team_member = '$member' AND status = 'Closed' AND date_received BETWEEN '2016-01-01' AND '2016-12-31'", array(), array( "Scrollable" => 'buffered'));
		
			$num_allegations_member = sqlsrv_num_rows($result_number_allegations_member);
			if ( $num_allegations_member != 0 ){
				?>
      <tr>
        <td><img src="images/person-icon.png" width="18" height="18" align="absmiddle"/></td>
        <td>
          <a href="results.php?member=<?php echo $member ?>&year=2016" target='contentRightresults'>
            <?php echo $member; ?>
            (
            <?php	echo $num_allegations_member ; ?>
            closed ) </a>
 </td></tr>
      <?php } }?>
</table>



</body>
</html>