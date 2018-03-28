 <?php
include("..\includes\\opendb.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
      google.charts.load('current', {packages:['wordtree']});
      google.charts.setOnLoadCallback(drawChart);


<?php
$country = "Nigeria";

?>

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          [ ['Phrases', 'size'],
		  <?php
		  $result_allegations2016 = sqlsrv_query($conn, "SELECT * FROM cases LEFT JOIN $cmsdb.closure_memos ON cases.ref_number = closure_memos.ref_number WHERE cases.country = '$country' AND cases.creation_date BETWEEN '2014-01-01' AND '2016-12-31'");
		  		$num_cases = sqlsrv_num_rows($result_allegations2016);	
				$color = 10;
				while($rowallegations2016 = sqlsrv_fetch_array($result_allegations2016)){
					$ref_number = $rowallegations2016['ref_number'];
					$current_status = $rowallegations2016['current_status']; 
					$case_closure = $rowallegations2016['case_closure'];
					
					if ( $case_closure == "Closed after preliminary investigation" ){
						$case_closure = "Case Closure Memo";
					}else if ( $case_closure == "Closed after full investigation" ){
						$case_closure = "Report";
					}
					
					$stage = $rowallegations2016['stage'];
					if ( $current_status == "Finalised" ){
						$stage = "";
						$stagetext = "";
					}else{
						$stagetext = " (Stage ".$stage.")";
					}
					
					$justification = $rowallegations2016['justification'];
					
					if ( $current_status == "Finalised" && $stage == "3" ){
						if ( $justification == "" ){
						$justification = "Without justification";
						$stagetext = "";
						}
					}
					
					
					
					$result = sqlsrv_query($conn, "SELECT * FROM closure_memos_dates WHERE ref_number = '$ref_number'");	
					$row = sqlsrv_fetch_array($result);
					$uploaded_actions = $row['uploaded_actions'];
					
					if ( $uploaded_actions == "" || $uploaded_actions == "N/A" ){
						if ( $current_status == "Finalised" ){
						$uploaded_actions = "Without AMAs";
						$color = 0;
						}
					} else{
						$uploaded_actions = "With AMAs";
					}
					
					
					
					?>		  
            ['<?php echo $country ?> <?php echo $current_status ?> <?php echo $case_closure ?> <?php echo $justification ?> <?php echo $uploaded_actions ?> <?php echo $ref_number.$stagetext ?>', 5], <?php } ?>
          ]
        );

       
	   
	    var options = {
			maxFontSize: 16,
          wordtree: {
            format: 'implicit',
            type: 'suffix',
            word: '<?php echo $country ?>'         }
        };

        var chart = new google.visualization.WordTree(document.getElementById('wordtree_basic'));
        chart.draw(data, options);
      }
    </script>


</head>

<body>


<div id="wordtree_basic" style="width: 1300px; height: 500px;"></div>


</body>
</html>