<?php
$serverName = "sql1"; //serverName\instanceName
$connectionInfo = array( "Database"=>"cms", "CharacterSet" => "UTF-8", "Encrypt" => true, "TrustServerCertificate"=>true);
$conn = sqlsrv_connect( $serverName, $connectionInfo) or die ('Error connecting to CMS database');
$connectionInfocss = array( "Database"=>"css", "CharacterSet" => "UTF-8", "Encrypt" => true, "TrustServerCertificate"=>true);
$conncss = sqlsrv_connect( $serverName, $connectionInfocss) or die ('Error connecting to CSS database');
$cssdb = "CSS.dbo";
$cmsdb = "CMS.dbo";
$webdavroot = "https://" . $_SERVER["SERVER_NAME"] . "/webdav/";
$reportingyears = array("2016", "2015", "2014");

date_default_timezone_set("Europe/Madrid");	 

//equivelent to mysql_real_escape_string
function sqlsrv_real_escape_string($data) {
				if ( !isset($data) or empty($data) ) return '';
				if ( is_numeric($data) ) return $data;

				$data = str_replace('“', '"', $data);
				$data = str_replace('”', '"', $data);
				$non_displayables = array(
						'/%0[0-8bcef]/',            // url encoded 00-08, 11, 12, 14, 15
						'/%1[0-9a-f]/',             // url encoded 16-31
						'/[\x00-\x08]/',            // 00-08
						'/\x0b/',                   // 11
						'/\x0c/',                   // 12
						'/[\x0e-\x1f]/'             // 14-31
				);
				foreach ( $non_displayables as $regex )
						$data = preg_replace( $regex, '', $data );
				$data = str_replace("'", "''", $data );
				return $data;
		}

		
function sqlsrv_fetchall($resultset, $columns = null) {
	$allrows = array();
	if ($resultset === false)
	{
		return false;
	}
	if ($columns == null)
	{
		while ($row = sqlsrv_fetch_array($resultset)) {
			$allrows[] = $row;
		}
	}
	else
	{
		while ($row = sqlsrv_fetch_array($resultset))
		{
			$myrow = array();
			foreach ($columns as $col => $transform )
			{
				if (is_null($transform))
				{
					if (isset($row[$col]))
					{
						$myrow[$col] = $row[$col];
					}
					else
					{
						$myrow[$col] = "";
					}
				}
				else if (is_array($transform))
				{
					$valuedata = "";
					if (isset($transform['colname']))
					{
						$valuedata = $row[$transform['colname']];
					}
					if (isset($transform['function']))
					{
						$myrow[$col] = $transform['function']($valuedata);
					}
					else
					{
						$myrow[$col] = $valuedata;
					}
				}
				else
				{
					$myrow[$col] = $transform;
				}
			}
			$allrows[] = $myrow;
		}
	}
	return $allrows;
}

function sqlsrv_fetch_single($resultset) {
	if ($resultset === false)
	{
		return false;
	}
	$row = sqlsrv_fetch_array($resultset);
	if ($row === false )
	{
		return false;
	}
	return $row[0];
}

?> 