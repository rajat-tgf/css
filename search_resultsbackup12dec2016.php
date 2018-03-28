<link rel="stylesheet" href="style.css" type="text/css" media="screen" /> 
<style>
.detailblock {
	font-family:'century gothic', arial, sans-serif;
	font-size:13px;
	color:#5C5C5C;
	margin: 2px 2px 2px 30px;
}

.highlight_word {
	color:#B00
}

</style>  

<style>
	div#entities-table { width: 100%; margin: 0px 0; }
	div#entities-table table { margin: 1em 0; border-collapse: collapse; font-family: 'century gothic', arial, sans-serif; width:97% }
	div#entities-table table td { font-size:13px; border: 1px solid #DBE5F1; padding:5px; text-align: left; background-color:#F7F7F7; }
	div#entities-table table th { font-size:12px; border: 1px solid #DBE5F1; padding: 0.4em; text-align: left; background:#EAEAEA ; color:#000}
</style>


<style>
	div#entities-table1 { width: 100%; margin: 0px 0; }
	div#entities-table1 table { margin: 1px 0; border-collapse: collapse; font-family: 'century gothic', arial, sans-serif; width:97% }
	div#entities-table1 table td { font-size:13px; border: 0px solid #DBE5F1; padding:1px; text-align: left; }
	div#entities-table1 table th { font-size:12px; border: 0px solid #DBE5F1; padding: 1px; text-align: left; background:#CCC; }
</style>

<style>
	div#entities-table2 { width: 100%; margin: 0px 0; }
	div#entities-table2 table { margin: 1px 0; border-collapse: collapse; font-family: 'century gothic', arial, sans-serif; color:#000000; width:97% }
	div#entities-table2 table td { font-size:13px; border: 1px solid #DBE5F1; padding:1px; text-align: left; color:#000000; }
	div#entities-table2 table th { font-size:12px; border: 1px solid #DBE5F1; padding:1px; text-align: left; color:#000000; background:#DBE5F1; }
</style>
<SCRIPT LANGUAGE="JavaScript">



	
	function showDialog(sr){
		parent.show_sr_Popup(sr);
	};
	
	function showDialogir(ir){
		parent.show_ir_Popup(ir);
	};
	
	
	function showDialogcase(ref_number){
		parent.show_case_Popup(ref_number);
	};
	
	



function frmSubmit() {
document.supportform.submit();
}
</script>  

<?php


$filterwords = array("and","the","a","an","this","that","these","those", "my","your","his","her","its","our","out","their","much","many","most","some", "any","enough","all","both","half","either","neither","each","every","other","another","such","what","rather","quite","same");

require_once("includes\\opendb.php");
date_default_timezone_set("Europe/Madrid");

function processWhere($query)
{
	preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', trim($query), $matches);
	$wordlist = $matches[0];
	$wherecomponents = array();
	
	
	
	$counter=0;
	foreach ($wordlist as $value) {
		if (strlen($value) <= 3) {
		unset($wordlist[$counter]);
		}
		$counter++;
	}
	
	
	$filterwords = array("and","the","a","an","this","that","these","those", "my","your","his","her","its","our","out","their","much","many","most","some", "any","enough","all","both","half","either","neither","each","every","other","another","such","what","rather","quite","same");
	
	
	$tags = array_diff($wordlist, $filterwords);
	
	print_r($tags);
	
	
	
	$cleanedstring = implode(' ', $wordlist);
	
	return array($cleanedstring);
	

}

function highlightWords($text, $words)
{
	$text;
	preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', $words, $matches);
	$wordlist = $matches[0];
	$wordlist = array_filter($wordlist, function($val) { //remove words less than 2 characters
		return strlen($val) >= 3;
	});
	
	
        /*** loop of the array of words ***/
        foreach ($wordlist as $word)
        {
                /*** quote the text for regex ***/
                $word = preg_quote($word);
                /*** highlight the words ***/
                $text = preg_replace("/\b($word)\b/i", '<span class="highlight_word">\1</span>', $text);
        }
        /*** return the text ***/
        return $text;
}

function displayGeneral($keyrecord, $query)
{
	preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', $query, $matches);
	$wordlist = $matches[0];
	$wordlist = array_filter($wordlist, function($val) { //remove words less than 2 characters
		return strlen($val) >= 3;
	});

	echo "<div class='detailblock'>";
	echo nl2br(highlightWords($keyrecord, $wordlist));
	echo "</div>";
}


$hit_found = 0;
$time_start = microtime(true);
if(isset($_POST['query'])){ 


			
		$userquery = $_POST['query'];
		$isfuzzy = $_POST['fuzzy'];

		//list($cleanedstring) = processWhere($userquery);
		
		
	
		
if ($isfuzzy == 'true')
{		

	preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', trim($userquery), $matches);
	$wordlist = $matches[0];
	$counter=0;
	foreach ($wordlist as $value) {
		if (strlen($value) <= 3) {
		unset($wordlist[$counter]);
		}
		$counter++;
	}



foreach ($wordlist as $key=>$value) {
   if (in_array($value,$filterwords)){
      unset($wordlist[$key]);
   }
}

$cleanedstring = implode(' ', $wordlist);

$cleanedstring = str_replace(' ', ' AND ', $cleanedstring);

		
$searchquery = "SELECT ftt.RANK as ranking, entity_id FROM list_name st INNER JOIN CONTAINSTABLE(list_name, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id
 
union SELECT ftt.RANK as ranking, list_name_id as entity_id FROM profiles st INNER JOIN CONTAINSTABLE(profiles, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id

order by ftt.RANK desc;";

						
						
		}else{
			
	preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', trim($userquery), $matches);
	$wordlist = $matches[0];
	$counter=0;
	foreach ($wordlist as $value) {
		if (strlen($value) <= 3) {
		unset($wordlist[$counter]);
		}
		$counter++;
	}



foreach ($wordlist as $key=>$value) {
   if (in_array($value,$filterwords)){
      unset($wordlist[$key]);
   }
}

$cleanedstring = implode(' ', $wordlist);			
			
			
			
			//$searchquery = "SELECT ftt.RANK as ranking, entity_id FROM list_name st INNER JOIN FREETEXTTABLE(list_name, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id
 
//union SELECT ftt.RANK as ranking, list_name_id as entity_id FROM profiles st INNER JOIN FREETEXTTABLE(profiles, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id

//order by ftt.RANK desc;";



$searchquery = "SELECT ftt.RANK as ranking, entity_id FROM list_name st INNER JOIN FREETEXTTABLE(list_name, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id
 
union SELECT ftt.RANK as ranking, list_name_id as entity_id FROM profiles st INNER JOIN FREETEXTTABLE(profiles, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id

order by ftt.RANK desc;";

			
			
			//$searchquery = "SELECT ftt.RANK as ranking, * FROM list_name st INNER JOIN CONTAINSTABLE(list_name, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id";
			
			//$searchquery = "SELECT * FROM list_name WHERE CONTAINS (name, 'fran*')";
			
			//$searchquery = "SELECT * FROM list_name WHERE CONTAINS (name, ‘FORMSOF (INFLECTIONAL, 'Fran')')";
			
			//$searchquery = "SELECT * FROM list_name WHERE CONTAINS (*, 'Franci%')";

			
			//$searchquery = "SELECT * FROM list_name WHERE name LIKE '%$cleanedstring%'"; 


			

/*..
$searchquery = "SELECT ftt.RANK as ranking, entity_id as entity_id FROM list_name st INNER JOIN FREETEXTTABLE(list_name, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id
 
union SELECT ftt.RANK as ranking, list_name_id as entity_id FROM profiles st INNER JOIN FREETEXTTABLE(profiles, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id

order by ftt.RANK desc;";

..*/

		}
//union SELECT ftt.RANK as ranking, *, list_name_id as entity_id FROM profiles st INNER JOIN FREETEXTTABLE(profiles, *, '$cleanedstring', 20) as ftt ON ftt.[KEY]=st.id 
		
		$result = sqlsrv_query($conncss,$searchquery);
		if ($result === false)
		{
			echo "No matches Found";
			exit();
		}
		$all_rows = sqlsrv_fetchall($result);
		$answercount = count($all_rows);	
		?>
        
        <table align="center" class="gridtablefilter">
        <tr>
        <td>
		<?php
		$time_end = microtime(true);
		$time = $time_end - $time_start;
		?>
        <strong><font style="font-family:'century gothic', arial, sans-serif; font-size:13px; color:#BF0000"><?php echo $answercount; ?></font></strong>
        &nbsp;matches Found
        </td></tr>
        </table>
		<?php
		if ($all_rows && $answercount > 0){
										
			foreach ($all_rows as $row){
				echo "<div id='entities-table'>";
				$entity_id = $row['entity_id'];
									
				$morelink = false;	
				//$ranking = $row['ranking'];
				//$subindex = $row['subindex'];
				$searchquery_entity = sqlsrv_query($conncss,"SELECT * FROM list_name WHERE entity_id = '$entity_id'");
				$entity_rows = sqlsrv_fetch_array( $searchquery_entity );
				$entity_id = $entity_rows['entity_id'];
				$name = $entity_rows['name'];
				$type_entity = $entity_rows['type_entity'];
				$alternative_name = $entity_rows['alternative_name'];
				$accro = $entity_rows['accro'];
				$head_city = $entity_rows['head_city'];
				$head_country = $entity_rows['head_country'];

				//echo $link;
				if ( $type_entity != "Person" ){
					$icon = "entity-icon.png";
				}else{
					$icon = "user-silhouette-icon.png";
				}
           		?>
                <div id="entities-contain1" align="center">
                
                <table>
                <tr><th colspan="2">
     			<img src="images/<?php echo $icon ?>" width="15" height="15" align="absmiddle"/>&nbsp;&nbsp;
                <strong><font style="font-family:'century gothic', arial, sans-serif; font-size:14px;">
                <a href="" onclick="return parent.showDialogentitydetails('<?php echo $entity_id ?>')">
                <?php 
				echo highlightWords($name, $cleanedstring);
				?>
                </a>
				</font></strong>
               
                </th>
                  <th width="8%" align="right"><strong>Entity Id:</strong>&nbsp;<?php echo highlightWords($entity_id, $cleanedstring); ?></th>
                </tr>
                  <?php
            $result_entities_linked = sqlsrv_query($conncss,"select link FROM entities_link WHERE entity_id = '$entity_id'");
			$all_linked = sqlsrv_fetchall($result_entities_linked );
			if ( $entities_linked = count($all_linked) > 0 ){
			?>
  <tr>
    <td colspan="3">
         <div id='entities-table1'>
    <table>
      <tr>
        <td width="9%" valign="top"><strong>Linked Entities : </strong></td>
        <td width="91%" ><?php
                    foreach ($all_linked as $row_result_entities_linked)
                    {
                        $link = $row_result_entities_linked['link'];
                        
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
                                    $entity_if_link = $row_resultentity_linked_main_details['entity_id'];
                                    ?>
                      <strong><a href="" onclick="return parent.showDialogentitydetails('<?php echo $entity_if_link ?>')"> <?php echo $complainant = $row_resultentity_linked_main_details['name'];?> </a></strong>
                      <?php
                        $alternative_name_complainant = $row_resultentity_linked_main_details['alternative_name'];
                        if ( $alternative_name_complainant != "" ){
							echo " (".$alternative_name_complainant.")";
                        }
                        echo "<br />";
                    }
                    ?></td>
                  </tr>
                </table>
                </div> 
				</td>
                </tr>
                
				
		<?php } ?> 

               
              <tr><td valign="top" width="25%">
                 <?php
				if ($alternative_name != ""){ ?>
                    <strong>Alt. name:</strong>&nbsp;<?php echo highlightWords($alternative_name, $cleanedstring); ?>
                    <br />
                    <?php
				}
				
				?>
				<?php
				if ($accro != ""){ ?>
	    	            <strong>Accronym:</strong>&nbsp;<?php echo highlightWords($accro, $cleanedstring); ?>
                    <br />
                    <?php	
				}
				
				if ($head_city != ""){ ?>
	    	            <strong>City:</strong>&nbsp;<?php echo highlightWords($head_city, $cleanedstring);?>
                    <br />
                    <?php	
				}
				
				if ($head_country != ""){ ?>
	    	            <strong>Nationality / Country Based:</strong>&nbsp;<?php echo highlightWords($head_country, $cleanedstring); ?>
                    <br />
                 <?php } ?>
                 </td>
                 <td colspan="2">
                
                
                
                
                
                
                <?php

//SEARCH THE PROFILES OF THE ENTITY........................................

	$sql123 = "SELECT * FROM profiles WHERE list_name_id = '$entity_id'";
	$sql_result1 = sqlsrv_query($conncss, $sql123);
	while ($row123 = sqlsrv_fetch_array($sql_result1)){	
		$profile_id = $row123['id'];
		$list_name_id = $row123['list_name_id'];
		$whistleblower_protection = $row123["whistleblower_protection"];
		$informant_protection = $row123["informant_protection"];
		$witness_protection = $row123["witness_protection"];
		$category = $row123["category"];
		?>
          <div id='entities-table1'>
          <table width="420">
            <tr>
              <td colspan="4" align="right" valign="middle"><img src="images/profile-icon.png" alt="Profile" width="10" height="10" align="absmiddle"/><font color="steelblue">&nbsp;<strong><?php echo $category; ?></strong></font>
                <?php
                    if ( $whistleblower_protection == "Yes" ){
                    ?>
                <img src="images/Protect-Red-icon.png" width="23" height="23" align="top" title="Whistleblower Protection"/>
                <?php
                    }
                    if ( $informant_protection == "Yes" ){
                    ?>
                <img src="images/Protect-Green-icon.png" width="23" height="23" align="top" title="Informant Protection"/>
                <?php
                    }
                    if ( $witness_protection == "Yes" ){
                    ?>
                <img src="images/Protect-Blue-icon.png" width="23" height="23" align="top" title="Witness Protection"/>
              <?php
                    }
                    ?></td>
              <td align="right" valign="middle">&nbsp;</td>
            </tr>
            <tr>
            
              <td width="20" align="right" valign="middle">&nbsp;</td>
              <td colspan="3" align="left" valign="top"><strong>Type : </strong><?php echo $row123["type"]; ?> <br />
                <?php
                $profile_position = $row123["position"];
                if  ( $type_entity == "Person" || $profile_position != "" ){ ?>
				
	    	            <strong>Position:</strong>&nbsp;<?php echo  highlightWords($profile_position, $cleanedstring); ?>
                    
                    <br />
                 <?php }
                 
                $email1 = $row123["email1"];
                if  ( $email1 != "" ){ ?>
				
	    	            <strong>Email 1:</strong>&nbsp;<?php echo  highlightWords($email1, $cleanedstring); ?>
                    
                    <br />
                 <?php } 
				 $email2 = $row123["email2"];
                if  ( $email2 != "" ){ ?>
				
	    	            <strong>Email 2:</strong>&nbsp;<?php echo  highlightWords($email2, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 
				$skype = $row123["skype"];
                if  ( $skype != "" ){ ?>
				
	    	            <strong>Skype:</strong>&nbsp;<?php echo  highlightWords($skype, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 
				 $address = $row123["address"];
                if  ( $address != "" ){ ?>
				
	    	            <strong>Address:</strong>&nbsp;<?php echo  highlightWords($address, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 $city = $row123["city"];
                if  ( $city != "" ){ ?>
				
	    	            <strong>City:</strong>&nbsp;<?php echo  highlightWords($city, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 $country = $row123["country"];
                if  ( $country != "" ){ ?>
				
	    	            <strong>Country:</strong>&nbsp;<?php echo  highlightWords($country, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 $home_phone_number = $row123["home_phone_number"];
                if  ( $home_phone_number != "" ){ ?>
				
	    	            <strong>Home Phone Number:</strong>&nbsp;<?php echo  highlightWords($home_phone_number, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 $office_phone_number = $row123["office_phone_number"];
                if  ( $office_phone_number != "" ){ ?>
				
	    	            <strong>Office Phone Number:</strong>&nbsp;<?php echo  highlightWords($office_phone_number, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 $mobile = $row123["mobile"];
                if  ( $mobile != "" ){ ?>
				
	    	            <strong>Mobile:</strong>&nbsp;<?php echo  highlightWords($mobile, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 $fax = $row123["fax"];
                if  ( $fax != "" ){ ?>
				
	    	            <strong>Fax:</strong>&nbsp;<?php echo  highlightWords($fax, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 $web_page = $row123["web_page"];
                if  ( $web_page != "" ){ ?>
				
	    	            <strong>Web:</strong>&nbsp;<?php echo  highlightWords($web_page, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 $notes = $row123["notes"];
                if  ( $notes != "" ){ ?>
				
	    	            <strong>Notes:</strong>&nbsp;<?php echo  highlightWords($notes, $cleanedstring); ?>
                    
                    <br />
                 <?php }
				 ?>	
                <br />

      			</td>
                
              <td width="483" valign="top"> 
               
               
               
               <?php
            //SEARCH FOR ALLEGATIONS OR CASES LINKED
                $result_related_complainant = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE complainant = '$profile_id'"); 
				$all_related_complainant = sqlsrv_fetchall($result_related_complainant);
                $num_complainant = count($all_related_complainant);
                
                $result_related_other = sqlsrv_query($conncss,"SELECT * FROM entities_allegations WHERE profile_id = '$profile_id'");
				$all_related_other = sqlsrv_fetchall($result_related_other);
                $num_other = count($all_related_other);
				
				$result_ir_linked = sqlsrv_query($conncss,"SELECT report_id FROM entities_intel_reports WHERE profile_id = '$profile_id'");
				$linked_ir = sqlsrv_fetchall($result_ir_linked );
				$num_ir = count($linked_ir);
                
                if ($num_complainant == 0 && $num_other == 0 && $num_ir == 0){	
                ?>
            <table>
              <tr>
                <td align="left"><strong>Not linked to any Allegations, Cases or Intelligence Reports</strong></td>
              </tr>
            </table>
              <?php
                }else{
                 ?>
<div id="entities-table2">
            <table align="right">
              <tr>
                <th align="center" valign="top"><strong>&nbsp;Report</strong></th>
                <th align="center" valign="top"><strong>&nbsp;&nbsp;Resolution</strong></th>
                <th align="center" valign="top"><strong>&nbsp;&nbsp;Case / Allegation</strong></th>
              </tr><?php
					//$result_ir_linked = sqlsrv_query($conncss,"SELECT report_id FROM entities_intel_reports WHERE profile_id = '$profile_id'");
					//$linked_ir = sqlsrv_fetchall($result_ir_linked );
					if ( $ir_linked = count($linked_ir) > 0 ){
							$dash = "IR";
							foreach ($linked_ir as $row_ir_linked)
							{  
							$report_id = $row_ir_linked['report_id'];
							?>
                            <tr>
                            <td>
                            <img src="images/ir.png" width="15" height="15" align="absmiddle"/>
								<a onclick="return showDialogir(<?php echo $report_id ?> )"><?php echo $dash.$report_id; ?> </a>
                            </td>
                            <td></td>
                            <td></td>
                            </tr>
				 <?php }
				 }
							
 
                        if ($num_complainant != 0){	
                            foreach ($all_related_complainant as $row_result_related_allegations_complainant)
                            {
                            ?>
              <tr>
                <td align="left" valign="middle"><?php	
                                        $allegation_id = $row_result_related_allegations_complainant['id'];
                                        $allegation_resolution = $row_result_related_allegations_complainant['resolution'];
                                        $case_related_open = $row_result_related_allegations_complainant['case_number'];
                                        $allegation_status = $row_result_related_allegations_complainant['status'];	
                                    ?>
                  <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/> <a onclick="return showDialog(<?php echo $allegation_id ?> )"><?php echo $allegation_id;?></a></td>
                <td><?php echo $allegation_resolution; ?></td>
                <td align="center"><?php
                                    if ( $allegation_resolution == "Open case in CMS" || $allegation_resolution == "Merge with an existing Case"){
                                        ?>
                  <img src="images/case-icon.png" width="16" height="16" align="absmiddle"/>
                  <?php
                                            $addthis = "9";
                                            $ref_number = str_replace("/","",$case_related_open);
                                            $ref_number = $addthis.$ref_number;
                                            ?>
                  <a onclick="return showDialogcase(<?php echo $ref_number ?> )"> <?php echo $case_related_open;?></a>
                  <?php
                                    }else if ( $allegation_resolution == "Merge with an existing Allegation" ){
                                    ?>
                  <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/> <a onclick="return showDialog(<?php echo $case_related_open ?> )"><?php echo $case_related_open;?></a>
                  <?php
                                    }
                                    ?></td>
              </tr>
              <?php	
                         } 
                      }
                
                
                //LINKED AS OTHER
                
                        if ($num_other != 0){	
                            foreach ($all_related_other as $row_result_related_allegations_complainant)
                            {
	
                                $allegation_id = $row_result_related_allegations_complainant['allegation_id'];
                                $case_related_open = $row_result_related_allegations_complainant['case_number'];
                                
                                if ( $allegation_id != "" )
                                {
									?>
              <tr>
                <td align="left" valign="middle"><img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/> <a onclick="return showDialog(<?php echo $allegation_id ?> )"> <?php echo $allegation_id;?> </a></td>
                <td><?php
                                        $result_resolution = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE id = '$allegation_id'"); 
                                        $row_resolution = sqlsrv_fetch_array($result_resolution);
                                        echo $resolution = $row_resolution['resolution'];
                                            ?></td>
                <td><?php 
                                        $case_number = $row_resolution['case_number'];
										if ($case_number != ""){
											if ( $resolution == "Open case in CMS" || $resolution == "Merge with an existing Case"){
												 ?>
                  <img src="images/case-icon.png" width="16" height="16" align="absmiddle"/>
                  <?php
													$addthis = "9";
													$ref_number = str_replace("/","",$case_number);
													$ref_number = $addthis.$ref_number;
													?>
                  <a onclick="return showDialogcase(<?php echo $ref_number ?> )"> <?php echo $case_number;?></a>
                  <?php
											}else if ( $resolution == "Merge with an existing Allegation" ){
													?>
                  <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/> <a onclick="return showDialog(<?php echo $case_number ?> )"><?php echo $case_number;?></a>
                  <?php
											 }
										}
                                      ?></td>
              </tr>
              <?php
                                }else{
                                    
                                    ?>
              <tr>
                <td align="left" valign="middle"><?PHP
                                        $result_related_allegation = sqlsrv_query($conncss,"SELECT * FROM allegation_details WHERE case_number = '$case_related_open' AND resolution = 'Open case in CMS' AND country != 'Internal'"); 
                                        if ($row_result = sqlsrv_fetch_array($result_related_allegation)){
                                            $allegation_id = $row_result['id'];
                                            $allegation_related_resolution = $row_result['resolution'];
                                            ?>
                  <img src="images/document-icon-sr.png" width="16" height="16" align="absmiddle"/> <a onclick="return showDialog(<?php echo $allegation_id ?> )"><?php echo $allegation_id;?></a>
                  <?php   
                                        }	
                                    ?></td>
                <td><?php
										//echo $allegation_related_resolution;
										?></td>
                <td><img src="images/case-icon.png" width="16" height="16" align="absmiddle"/>
                  <?php
                                            $addthis = "9";
                                            $ref_number = str_replace("/","",$case_related_open);
                                            $ref_number = $addthis.$ref_number;
                                            ?>
                  <a onclick="return showDialogcase(<?php echo $ref_number ?> )"> <?php echo $case_related_open;?></a></td>
                <?php	
                                }
                                
								}
                      }?>
              </tr>
            </table></div>
          <?php }?></td>
			</tr></table></div><?php } ?>      
                
			</td>
                </tr>
                </table><br />

				<?php
			}
			echo "</div>";	
			echo "</div>";	
		}
		else
		{
			$answercount = 0;
		}
}	
?>

