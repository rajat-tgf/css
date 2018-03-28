<style>
.detailblock {
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
	color:#5C5C5C;
	margin: 2px 2px 2px 30px;
}

.highlight_word {
	background-color:#E6F2FF;
}

.notedetail {
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
	color: #999999;
	margin: 2px 2px 2px 30px;
}

.notedetail p {
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
	color:#5C5C5C;
	margin: 2px 2px 2px 30px;
}

.errormsg {
	font-size:13px;
	color: red;
}
</style>

<?php
require_once("includes\\opendb.php");

date_default_timezone_set("Europe/Madrid");


if(isset($_POST['entity_id'])){ 
		$entity_id = $_POST['entity_id'];
		$fragment = $_POST['fragment'];
		$query = $_POST['query'];
		$subindex = $_POST['subindex'];
		switch ($fragment)
		{
			case "Entity":
				$searchquery = "select name from list_name where entity_id = '$entity_id'";					
				break;
			
		}
		
		$result = sqlsrv_query($conncss,$searchquery);
		$all_rows = sqlsrv_fetchall($result);
		$answercount = count($all_rows);	
		if ($all_rows && $answercount > 0)
		{
			foreach ($all_rows as $row)
			{
				switch ($fragment)
				{
					case "Entity":
						displayGeneral($row[0], $query);	
						break;
				}
			}
		}
		else
		{
			echo "";
		}					
}	
?>