 <?php

require_once("includes\\opendb.php");

include ("stats/sea_east.php");
include ("stats/sa.php");
include ("stats/mena.php");
include ("stats/wa.php");
include ("stats/ca.php");
include ("stats/eeca.php");
include ("stats/lac.php");

					  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#FFFFFF;
	text-align: left;
}
table.gridtable th {
	font-size:14px;
	padding: 3px;
	color:#666666;
	border:none;
	background-color: #FFFFFF;
	font-weight:bold;
}
table.gridtable td {
	color:#666666;
	padding: 3px;
	border:none;
	background-color: #FFFFFF;
}
</style>


<script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapall);

      function drawRegionsMapall() {

        var data1 = google.visualization.arrayToDataTable([
			['Country', 'Complaints'],
			['Afghanistan', <?php echo $num_Afghanistan2014; ?>],
			['Bangladesh', <?php echo $num_Bangladesh2014; ?>],
			['Bhutan', <?php echo $num_Bhutan2014 ?>],
			['Cambodia', <?php echo $num_Cambodia2014 ?>],
			['China', <?php echo $num_China2014 ?>],
			['Cook Islands', <?php echo $num_CookIslands2014 ?>],
			['India', <?php echo $num_India2014 ?>],
			['Indonesia', <?php echo $num_Indonesia2014 ?>],
			['Iran', <?php echo $num_Iran2014 ?>],
			['Democratic Peoples Republic of Korea', <?php echo $num_DemocraticPeoplesRepublicofKorea2014 ?>],
			['Republic of Korea', <?php echo $num_RepublicofKorea2014 ?>],
			['Lao Peoples Democratic Republic', <?php echo $num_Lao2014 ?>],
			['Malaysia', <?php echo $num_Malaysia2014 ?>],
			['Maldives', <?php echo $num_Maldives2014 ?>],
			['Micronesia', <?php echo $num_Micronesia2014 ?>],
			['Mongolia', <?php echo $num_Mongolia2014 ?>],
			['Myanmar', <?php echo $num_Myanmar2014 ?>],
			['Nauru', <?php echo $num_Nauru2014 ?>],
			['Nepal', <?php echo $num_Nepal2014 ?>],
			['Niue', <?php echo $num_Niue2014 ?>],
			['Pakistan', <?php echo $num_Pakistan2014 ?>],
			['Philippines', <?php echo $num_Philippines2014 ?>],
			['Sri Lanka', <?php echo $num_SriLanka2014 ?>],
			['Thailand', <?php echo $num_Thailand2014 ?>],
			['Timor-Leste', <?php echo $num_TimorLeste2014 ?>],
			['Tuvalu', <?php echo $num_Tuvalu2014 ?>],
			['Viet Nam', <?php echo $num_VietNam2014 ?>],
			['Fiji', <?php echo $num_Fiji2014 ?>],
			['Kiribati', <?php echo $num_Kiribati2014 ?>],		  
			['Marshall Islands', <?php echo $num_MarshallIslands2014 ?>],
			['Palau', <?php echo $num_Palau2014 ?>],
			['Papua New Guinea', <?php echo $num_PapuaNewGuinea2014 ?>],
			['Samoa', <?php echo $num_Samoa2014 ?>],
			['Solomon Islands', <?php echo $num_SolomonIslands2014 ?>],
			['Tonga', <?php echo $num_Tonga2014 ?>],
			['Vanuatu', <?php echo $num_Vanuatu2014 ?>],
			['Angola', <?php echo $num_Angola2014 ?>],
			['Botswana', <?php echo $num_Botswana2014 ?>],
			['Comoros', <?php echo $num_Comoros2014 ?>],
			['Democratic Republic of the Congo', <?php echo $num_DemocraticRepublicoftheCongo2014 ?>],
			['Lesotho', <?php echo $num_Lesotho2014 ?>],
			['Madagascar', <?php echo $num_Madagascar2014 ?>],
			['Malawi', <?php echo $num_Malawi2014 ?>],
			['Mauritius', <?php echo $num_Mauritius2014 ?>],
			['Mozambique', <?php echo $num_Mozambique2014 ?>],
			['Namibia', <?php echo $num_Namibia2014 ?>],
			['Rwanda', <?php echo $num_Rwanda2014 ?>],		  
			['Seychelles', <?php echo $num_Seychelles2014 ?>],
			['Swaziland', <?php echo $num_Swaziland2014 ?>],
			['Tanzania', <?php echo $num_Tanzania2014 ?>],
			['Zambia', <?php echo $num_Zambia2014 ?>],
			['Zanzibar', <?php echo $num_Zanzibar2014 ?>],
			['Zimbabwe', <?php echo $num_Zimbabwe2014 ?>],
			['Algeria', <?php echo $num_Algeria2014 ?>],
			['Bahrain', <?php echo $num_Bahrain2014 ?>],
			['Djibouti', <?php echo $num_Djibouti2014 ?>],
			['Egypt', <?php echo $num_Egypt2014 ?>],
			['Eritrea', <?php echo $num_Eritrea2014 ?>],
			['Ethiopia', <?php echo $num_Ethiopia2014 ?>],
			['Kenya', <?php echo $num_Kenya2014 ?>],
			['Libya', <?php echo $num_Libya2014 ?>],
			['Mauritania', <?php echo $num_Mauritania2014 ?>],
			['Morocco', <?php echo $num_Morocco2014 ?>],
			['Somalia', <?php echo $num_Somalia2014 ?>],
			['South Sudan', <?php echo $num_SouthSudan2014 ?>],		  
			['Tunisia', <?php echo $num_Tunisia2014 ?>],
			['Uganda', <?php echo $num_Uganda2014 ?>],
			['Yemen', <?php echo $num_Yemen2014 ?>],
			['Iraq', <?php echo $num_Iraq2014 ?>],
			['Jordan', <?php echo $num_Jordan2014 ?>],
			['Syria', <?php echo $num_Syria2014 ?>],
			['Cameroon', <?php echo $num_Cameroon2014 ?>],
			['Cape Verde', <?php echo $num_CapeVerde2014 ?>],
			['Chad', <?php echo $num_Chad2014 ?>],
			['Gambia', <?php echo $num_Gambia2014 ?>],
			['Guinea', <?php echo $num_Guinea2014 ?>],
			['Guinea-Bissau', <?php echo $num_GuineaBissau2014 ?>],
			['Mali', <?php echo $num_Mali2014 ?>],
			['Niger', <?php echo $num_Niger2014 ?>],
			['Sao Tome and Principe', <?php echo $num_Sao2014 ?>],
			['Senegal', <?php echo $num_Senegal2014 ?>],
			['Benin', <?php echo $num_Benin2014 ?>],
			['Burkina Faso', <?php echo $num_BurkinaFaso2014 ?>],
			['Burundi', <?php echo $num_Burundi2014 ?>],
			['Central African Republic', <?php echo $num_CentralAfricanRepublic2014 ?>],
			['Congo', <?php echo $num_Congo2014 ?>],
			['CI', <?php echo $num_IvoryCoast2014 ?>],
			['Equatorial Guinea', <?php echo $num_EquatorialGuinea2014 ?>],
			['Gabon', <?php echo $num_Gabon2014 ?>],
			['Ghana', <?php echo $num_Ghana2014 ?>],
			['Liberia', <?php echo $num_Liberia2014 ?>],
			['Nigeria', <?php echo $num_Nigeria2014 ?>],
			['Sierra Leone', <?php echo $num_SierraLeone2014 ?>],
			['Togo', <?php echo $num_Togo2014 ?>],
			['South Africa', <?php echo $num_SouthAfrica2014 ?>],
			['Sudan', <?php echo $num_Sudan2014 ?>],
			['Albania', <?php echo $num_Albania2014 ?>],
			['Belarus', <?php echo $num_Belarus2014 ?>],
			['Bosnia and Herzegovina', <?php echo $num_BosniaandHerzegovina2014 ?>],
			['Bulgaria', <?php echo $num_Bulgaria2014 ?>],
			['Croatia', <?php echo $num_Croatia2014 ?>],
			['Estonia', <?php echo $num_Estonia2014 ?>],
			['Kosovo', <?php echo $num_Kosovo2014 ?>],
			['Kyrgyzstan', <?php echo $num_Kyrgyzstan2014 ?>],
			['Latvia', <?php echo $num_Latvia2014 ?>],
			['Macedonia', <?php echo $num_Macedonia2014 ?>],
			['Moldova', <?php echo $num_Moldova2014 ?>],
			['Montenegro', <?php echo $num_Montenegro2014 ?>],
			['Romania', <?php echo $num_Romania2014 ?>],
			['Russian Federation', <?php echo $num_RussianFederation2014 ?>],
			['Serbia', <?php echo $num_Serbia2014 ?>],
			['Ukraine', <?php echo $num_Ukraine2014 ?>],
			['Armenia', <?php echo $num_Armenia2014 ?>],
			['Azerbaijan', <?php echo $num_Azerbaijan2014 ?>],
			['Georgia', <?php echo $num_Georgia2014 ?>],
			['Kazakhstan', <?php echo $num_Kazakhstan2014 ?>],
			['Tajikistan', <?php echo $num_Tajikistan2014 ?>],
			['Turkmenistan', <?php echo $num_Turkmenistan2014 ?>],
			['Uzbekistan', <?php echo $num_Uzbekistan2014 ?>],
			['Colombia', <?php echo $num_Colombia2014 ?>],
			['Ecuador', <?php echo $num_Ecuador2014 ?>],
			['Peru', <?php echo $num_Peru2014 ?>],
			['Venezuela', <?php echo $num_Venezuela2014 ?>],
			['Guyana', <?php echo $num_Guyana2014 ?>],
			['Suriname', <?php echo $num_Suriname2014 ?>],
			['French Guiana', <?php echo $num_FrenchGuiana2014 ?>],
			['Brazil', <?php echo $num_Brazil2014 ?>],
			['Bolivia', <?php echo $num_Bolivia2014 ?>],
			['Chile', <?php echo $num_Chile2014 ?>],
			['Argentina', <?php echo $num_Argentina2014 ?>],
			['Uruguay', <?php echo $num_Uruguay2014 ?>],
			['Paraguay', <?php echo $num_Paraguay2014 ?>],
			['Mexico', <?php echo $num_Mexico2014 ?>],
			['Guatemala', <?php echo $num_Guatemala2014 ?>],
			['El Salvador', <?php echo $num_ElSalvador2014 ?>],
			['Belize', <?php echo $num_Belize2014 ?>],
			['Honduras', <?php echo $num_Honduras2014 ?>],
			['Nicaragua', <?php echo $num_Nicaragua2014 ?>],
			['Costa Rica', <?php echo $num_CostaRica2014 ?>],
			['Panama', <?php echo $num_Panama2014 ?>],
			['Anguilla', <?php echo $num_Anguilla2014 ?>],
			['Antigua and Barbuda', <?php echo $num_AntiguaandBarbuda2014 ?>],
			['Aruba', <?php echo $num_Aruba2014 ?>],
			['Bahamas', <?php echo $num_Bahamas2014 ?>],
			['Barbados', <?php echo $num_Barbados2014 ?>],
			['Bermuda', <?php echo $num_Bermuda2014 ?>],
			['British Virgin Islands', <?php echo $num_BritishVirginIslands2014 ?>],
			['Cayman Islands', <?php echo $num_CaymanIslands2014 ?>],
			['Cuba', <?php echo $num_Cuba2014 ?>],
			['Dominican Republic', <?php echo $num_DominicanRepublic2014 ?>],
			['Grenada', <?php echo $num_Grenada2014 ?>],
			['Guadeloupe', <?php echo $num_Guadeloupe2014 ?>],
			['Haiti', <?php echo $num_Haiti2014 ?>],
			['Jamaica', <?php echo $num_Jamaica2014 ?>],
			['Martinique', <?php echo $num_Martinique2014 ?>],
			['Montserrat', <?php echo $num_Montserrat2014 ?>],
			['Netherlands Antilles', <?php echo $num_NetherlandsAntilles2014 ?>],
			['Saint Kitts and Nevis', <?php echo $num_SaintKitts2014 ?>],
			['Saint Lucia', <?php echo $num_SaintLucia2014 ?>],
			['Saint Vincent and Grenadines', <?php echo $num_SaintVincent2014 ?>],
			['Trinidad and Tobago', <?php echo $num_TrinidadandTobago2014 ?>],
			['Turks and Caicos Islands', <?php echo $num_Turks2014 ?>]
        ]);
        var options = {
			width: 808,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chart1 = new google.visualization.GeoChart(document.getElementById('regions_div_all'));
		
        chart1.draw(data1, options);
      }
    </script>    







    

    
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapasia);

      function drawRegionsMapasia() {

        var data1 = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
          ['Afghanistan', <?php echo $num_Afghanistan2014; ?>],
		  ['Bangladesh', <?php echo $num_Bangladesh2014; ?>],
		  ['Bhutan', <?php echo $num_Bhutan2014 ?>],
		  ['Cambodia', <?php echo $num_Cambodia2014 ?>],
		  ['China', <?php echo $num_China2014 ?>],
		  ['Cook Islands', <?php echo $num_CookIslands2014 ?>],
		  ['India', <?php echo $num_India2014 ?>],
		  ['Indonesia', <?php echo $num_Indonesia2014 ?>],
		  ['Iran', <?php echo $num_Iran2014 ?>],
		  ['Democratic Peoples Republic of Korea', <?php echo $num_DemocraticPeoplesRepublicofKorea2014 ?>],
		  ['Republic of Korea', <?php echo $num_RepublicofKorea2014 ?>],
		  ['Lao Peoples Democratic Republic', <?php echo $num_Lao2014 ?>],
		  ['Malaysia', <?php echo $num_Malaysia2014 ?>],
		  ['Maldives', <?php echo $num_Maldives2014 ?>],
		  ['Micronesia', <?php echo $num_Micronesia2014 ?>],
		  ['Mongolia', <?php echo $num_Mongolia2014 ?>],
		  ['Myanmar', <?php echo $num_Myanmar2014 ?>],
		  ['Nauru', <?php echo $num_Nauru2014 ?>],
		  ['Nepal', <?php echo $num_Nepal2014 ?>],
		  ['Niue', <?php echo $num_Niue2014 ?>],
		  ['Pakistan', <?php echo $num_Pakistan2014 ?>],
		  ['Philippines', <?php echo $num_Philippines2014 ?>],
		  ['Sri Lanka', <?php echo $num_SriLanka2014 ?>],
		  ['Thailand', <?php echo $num_Thailand2014 ?>],
		  ['Timor-Leste', <?php echo $num_TimorLeste2014 ?>],
		  ['Tuvalu', <?php echo $num_Tuvalu2014 ?>],
		  ['Viet Nam', <?php echo $num_VietNam2014 ?>]
        ]);
        var options = {
			region: '142',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chart1 = new google.visualization.GeoChart(document.getElementById('regions_div_sea_east'));
		
        chart1.draw(data1, options);

      }

    </script>    
    
	
	
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapasia);

      function drawRegionsMapasia() {

        var data1 = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
		  ['Fiji', <?php echo $num_Fiji2014 ?>],
		  ['Kiribati', <?php echo $num_Kiribati2014 ?>],		  
		  ['Marshall Islands', <?php echo $num_MarshallIslands2014 ?>],
		  ['Palau', <?php echo $num_Palau2014 ?>],
		  ['Papua New Guinea', <?php echo $num_PapuaNewGuinea2014 ?>],
		  ['Samoa', <?php echo $num_Samoa2014 ?>],
		  ['Solomon Islands', <?php echo $num_SolomonIslands2014 ?>],
		  ['Tonga', <?php echo $num_Tonga2014 ?>],
		  ['Vanuatu', <?php echo $num_Vanuatu2014 ?>]
        ]);
        var options = {
			region: '009',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chart1 = new google.visualization.GeoChart(document.getElementById('regions_div_sea_oce'));
		
        chart1.draw(data1, options);
      }
    </script>
    
    
    
    


    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapasia);

      function drawRegionsMapasia() {

        var data1 = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
          ['Angola', <?php echo $num_Angola2014 ?>],
		  ['Botswana', <?php echo $num_Botswana2014 ?>],
		  ['Comoros', <?php echo $num_Comoros2014 ?>],
		  ['Democratic Republic of the Congo', <?php echo $num_DemocraticRepublicoftheCongo2014 ?>],
		  ['Lesotho', <?php echo $num_Lesotho2014 ?>],
		  ['Madagascar', <?php echo $num_Madagascar2014 ?>],
		  ['Malawi', <?php echo $num_Malawi2014 ?>],
		  ['Mauritius', <?php echo $num_Mauritius2014 ?>],
		  ['Mozambique', <?php echo $num_Mozambique2014 ?>],
		  ['Namibia', <?php echo $num_Namibia2014 ?>],
		  ['Rwanda', <?php echo $num_Rwanda2014 ?>],		  
		  ['Seychelles', <?php echo $num_Seychelles2014 ?>],
		  ['Swaziland', <?php echo $num_Swaziland2014 ?>],
		  ['Tanzania', <?php echo $num_Tanzania2014 ?>],
		  ['Zambia', <?php echo $num_Zambia2014 ?>],
		  ['Zanzibar', <?php echo $num_Zanzibar2014 ?>],
		  ['Zimbabwe', <?php echo $num_Zimbabwe2014 ?>]
        ]);
        var options = {
			region: '002',
			width: 808,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chart1 = new google.visualization.GeoChart(document.getElementById('regions_div_sa'));
		
        chart1.draw(data1, options);

      }

    </script>
    
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapasia);

      function drawRegionsMapasia() {

        var data1 = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
          ['Algeria', <?php echo $num_Algeria2014 ?>],
		  ['Bahrain', <?php echo $num_Bahrain2014 ?>],
		  ['Djibouti', <?php echo $num_Djibouti2014 ?>],
		  ['Egypt', <?php echo $num_Egypt2014 ?>],
		  ['Eritrea', <?php echo $num_Eritrea2014 ?>],
		  ['Ethiopia', <?php echo $num_Ethiopia2014 ?>],
		  ['Kenya', <?php echo $num_Kenya2014 ?>],
		  ['Libya', <?php echo $num_Libya2014 ?>],
		  ['Mauritania', <?php echo $num_Mauritania2014 ?>],
		  ['Morocco', <?php echo $num_Morocco2014 ?>],
		  ['Somalia', <?php echo $num_Somalia2014 ?>],
		  ['South Sudan', <?php echo $num_SouthSudan2014 ?>],		  
		  ['Tunisia', <?php echo $num_Tunisia2014 ?>],
		  ['Uganda', <?php echo $num_Uganda2014 ?>]
		  ]);
        var options = {
			region: '002',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chart1 = new google.visualization.GeoChart(document.getElementById('regions_div_mena_na'));
		
        chart1.draw(data1, options);

      }

    </script>
    
    
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapasia);

      function drawRegionsMapasia() {

        var data1 = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
		  ['Yemen', <?php echo $num_Yemen2014 ?>],
		  ['Iraq', <?php echo $num_Iraq2014 ?>],
		  ['Jordan', <?php echo $num_Jordan2014 ?>],
		  ['Syria', <?php echo $num_Syria2014 ?>]
        ]);
        var options = {
			region: '142',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chart1 = new google.visualization.GeoChart(document.getElementById('regions_div_mena_me'));
		
        chart1.draw(data1, options);

      }

    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapasia);

      function drawRegionsMapasia() {

        var data1 = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
          ['Cameroon', <?php echo $num_Cameroon2014 ?>],
		  ['Cape Verde', <?php echo $num_CapeVerde2014 ?>],
		  ['Chad', <?php echo $num_Chad2014 ?>],
		  ['Gambia', <?php echo $num_Gambia2014 ?>],
		  ['Guinea', <?php echo $num_Guinea2014 ?>],
		  ['Guinea-Bissau', <?php echo $num_GuineaBissau2014 ?>],
		  ['Mali', <?php echo $num_Mali2014 ?>],
		  ['Niger', <?php echo $num_Niger2014 ?>],
		  ['Sao Tome and Principe', <?php echo $num_Sao2014 ?>],
		  ['Senegal', <?php echo $num_Senegal2014 ?>]
        ]);
        var options = {
			region: '002',
			width: 808,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chart1 = new google.visualization.GeoChart(document.getElementById('regions_div_wa'));
		
        chart1.draw(data1, options);

      }

    </script>



    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapca);

      function drawRegionsMapca() {

        var dataca = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
          ['Benin', <?php echo $num_Benin2014 ?>],
		  ['Burkina Faso', <?php echo $num_BurkinaFaso2014 ?>],
		  ['Burundi', <?php echo $num_Burundi2014 ?>],
		  ['Central African Republic', <?php echo $num_CentralAfricanRepublic2014 ?>],
		  ['Congo', <?php echo $num_Congo2014 ?>],
		  ['CI', <?php echo $num_IvoryCoast2014 ?>],
		  ['Equatorial Guinea', <?php echo $num_EquatorialGuinea2014 ?>],
		  ['Gabon', <?php echo $num_Gabon2014 ?>],
		  ['Ghana', <?php echo $num_Ghana2014 ?>],
		  ['Liberia', <?php echo $num_Liberia2014 ?>],
		  ['Nigeria', <?php echo $num_Nigeria2014 ?>],
		  ['Sierra Leone', <?php echo $num_SierraLeone2014 ?>],
		  ['Togo', <?php echo $num_Togo2014 ?>],
		  ['South Africa', <?php echo $num_SouthAfrica2014 ?>],
		  ['Sudan', <?php echo $num_Sudan2014 ?>]
        ]);
        var options = {
			region: '002',
			width: 808,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chartca = new google.visualization.GeoChart(document.getElementById('regions_div_ca'));
		
        chartca.draw(dataca, options);

      }

    </script>
    
    
    
   <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapeeca);

      function drawRegionsMapeeca() {

        var dataca = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
          ['Albania', <?php echo $num_Albania2014 ?>],
		  ['Belarus', <?php echo $num_Belarus2014 ?>],
		  ['Bosnia and Herzegovina', <?php echo $num_BosniaandHerzegovina2014 ?>],
		  ['Bulgaria', <?php echo $num_Bulgaria2014 ?>],
		  ['Croatia', <?php echo $num_Croatia2014 ?>],
		  ['Estonia', <?php echo $num_Estonia2014 ?>],
		  ['Kosovo', <?php echo $num_Kosovo2014 ?>],
		  ['Kyrgyzstan', <?php echo $num_Kyrgyzstan2014 ?>],
		  ['Latvia', <?php echo $num_Latvia2014 ?>],
		  ['Macedonia', <?php echo $num_Macedonia2014 ?>],
		  ['Moldova', <?php echo $num_Moldova2014 ?>],
		  ['Montenegro', <?php echo $num_Montenegro2014 ?>],
		  ['Romania', <?php echo $num_Romania2014 ?>],
		  ['Russian Federation', <?php echo $num_RussianFederation2014 ?>],
		  ['Serbia', <?php echo $num_Serbia2014 ?>],
		  ['Ukraine', <?php echo $num_Ukraine2014 ?>]
        ]);
        var options = {
			region: '150',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chartca = new google.visualization.GeoChart(document.getElementById('regions_div_eeca_ee'));
		
        chartca.draw(dataca, options);

      }

    </script>
    
    
            <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapeeca);

      function drawRegionsMapeeca() {

        var dataca = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
		  ['Armenia', <?php echo $num_Armenia2014 ?>],
		  ['Azerbaijan', <?php echo $num_Azerbaijan2014 ?>],
		  ['Georgia', <?php echo $num_Georgia2014 ?>],
		  ['Kazakhstan', <?php echo $num_Kazakhstan2014 ?>],
		  ['Tajikistan', <?php echo $num_Tajikistan2014 ?>],
		  ['Turkmenistan', <?php echo $num_Turkmenistan2014 ?>],
		  ['Uzbekistan', <?php echo $num_Uzbekistan2014 ?>]
        ]);
        var options = {
			region: '142',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chartca = new google.visualization.GeoChart(document.getElementById('regions_div_eeca_ca'));
		
        chartca.draw(dataca, options);

      }

    </script>
    
    
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapeeca);

      function drawRegionsMapeeca() {

        var dataca = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
		  ['Colombia', <?php echo $num_Colombia2014 ?>],
		  ['Ecuador', <?php echo $num_Ecuador2014 ?>],
		  ['Peru', <?php echo $num_Peru2014 ?>],
		  ['Venezuela', <?php echo $num_Venezuela2014 ?>],
		  ['Guyana', <?php echo $num_Guyana2014 ?>],
		  ['Suriname', <?php echo $num_Suriname2014 ?>],
		  ['French Guiana', <?php echo $num_FrenchGuiana2014 ?>],
		  ['Brazil', <?php echo $num_Brazil2014 ?>],
		  ['Bolivia', <?php echo $num_Bolivia2014 ?>],
		  ['Chile', <?php echo $num_Chile2014 ?>],
		  ['Argentina', <?php echo $num_Argentina2014 ?>],
		  ['Uruguay', <?php echo $num_Uruguay2014 ?>],
		  ['Paraguay', <?php echo $num_Paraguay2014 ?>]
        ]);
        var options = {
			region: '005',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chartca = new google.visualization.GeoChart(document.getElementById('regions_div_lac_south'));
		
        chartca.draw(dataca, options);

      }

    </script>
    
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapeeca);

      function drawRegionsMapeeca() {

        var dataca = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
		  ['Mexico', <?php echo $num_Mexico2014 ?>],
		  ['Guatemala', <?php echo $num_Guatemala2014 ?>],
		  ['El Salvador', <?php echo $num_ElSalvador2014 ?>],
		  ['Belize', <?php echo $num_Belize2014 ?>],
		  ['Honduras', <?php echo $num_Honduras2014 ?>],
		  ['Nicaragua', <?php echo $num_Nicaragua2014 ?>],
		  ['Costa Rica', <?php echo $num_CostaRica2014 ?>],
		  ['Panama', <?php echo $num_Panama2014 ?>]
        ]);
        var options = {
			region: '013',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chartca = new google.visualization.GeoChart(document.getElementById('regions_div_lac_central'));
		
        chartca.draw(dataca, options);

      }

    </script>
    
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMapeeca);

      function drawRegionsMapeeca() {

        var dataca = google.visualization.arrayToDataTable([
          ['Country', 'Complaints'],
          	['Anguilla', <?php echo $num_Anguilla2014 ?>],
			['Antigua and Barbuda', <?php echo $num_AntiguaandBarbuda2014 ?>],
			['Aruba', <?php echo $num_Aruba2014 ?>],
			['Bahamas', <?php echo $num_Bahamas2014 ?>],
			['Barbados', <?php echo $num_Barbados2014 ?>],
			['Bermuda', <?php echo $num_Bermuda2014 ?>],
			['British Virgin Islands', <?php echo $num_BritishVirginIslands2014 ?>],
			['Cayman Islands', <?php echo $num_CaymanIslands2014 ?>],
			['Cuba', <?php echo $num_Cuba2014 ?>],
			['Dominican Republic', <?php echo $num_DominicanRepublic2014 ?>],
			['Grenada', <?php echo $num_Grenada2014 ?>],
			['Guadeloupe', <?php echo $num_Guadeloupe2014 ?>],
			['Haiti', <?php echo $num_Haiti2014 ?>],
			['Jamaica', <?php echo $num_Jamaica2014 ?>],
			['Martinique', <?php echo $num_Martinique2014 ?>],
			['Montserrat', <?php echo $num_Montserrat2014 ?>],
			['Netherlands Antilles', <?php echo $num_NetherlandsAntilles2014 ?>],
			['Saint Kitts and Nevis', <?php echo $num_SaintKitts2014 ?>],
			['Saint Lucia', <?php echo $num_SaintLucia2014 ?>],
			['Saint Vincent and Grenadines', <?php echo $num_SaintVincent2014 ?>],
			['Trinidad and Tobago', <?php echo $num_TrinidadandTobago2014 ?>],
			['Turks and Caicos Islands', <?php echo $num_Turks2014 ?>]
        ]);
        var options = {
			region: '029',
			width: 760,
			colorAxis: {colors: ['#99FF66', '#00853a', '#e31b23']},
			};

        var chartca = new google.visualization.GeoChart(document.getElementById('regions_div_lac_caribbean'));
		
        chartca.draw(dataca, options);

      }

    </script>


</head>

<body>
<table align="right" class="gridtable">
<tr><td><font color="#1365A8" size="+1">
Complaints 2013 - Today
</font>
</td></tr>
<tr><td>
</td></tr>
</table><br /><br />


<div id="tabssub">
                            <ul>
                            <li><a href="#tabs-811">All Countries</a></li>
                            <li><a href="#tabs-111" title="South and East Asia">SEA</a></li>
                            <li><a href="#tabs-211" title="Souther Africa">SA</a></li>
                            <li><a href="#tabs-311" title="Middle East and north Africa">MENA</a></li>
                            <li><a href="#tabs-411" title="Wester Africa">WA</a></li>
                            <li><a href="#tabs-511" title="Central Africa">CA</a></li>
                            <li><a href="#tabs-611" title="East Europe & Central Asia">EECA</a></li>
                            <li><a href="#tabs-711" title="Latin America & the Caribbean">LAC</a></li>
                            
                            </ul>
                            
                            <div id="tabs-811">
                           	  	<div id="regions_div_all" style="width: 900px; height: 500px;"></div>
  							</div>
                            
                            <div id="tabs-111">
                                <table align="center" class="gridtable">
                                <tr><td><font color="#1365A8" size="+1">
                                	South and East Asia
                                </font>
                                </td></tr>
                                <tr><td>
                                </td></tr>
                                </table>
 
                                <div id="tabssub1">
                                        <ul>
                                            <li><a href="#tabs-11" title="South Asia">South Asia</a></li>
                                            <li><a href="#tabs-12" title="East Asia">East Asia</a></li>
                                        </ul>
                                   
                                   
                                        <div id="tabs-11">
                                            <div id="regions_div_sea_east" style="width: 900px; height: 500px;"></div>
                                        </div>
                                        
                                        <div id="tabs-12">
                                            <div id="regions_div_sea_oce" style="width: 900px; height: 500px;"></div>
                                        </div>
                                </div>

<table border="0" class="gridtable">
<?php
	$result_countries_sea = "SELECT * FROM region_sea";
	$sql_result_sea = sqlsrv_query ($result_countries_sea);
	$num_countries_sea = sqlsrv_num_rows($sql_result_sea);
	while($row_country = sqlsrv_fetch_array($sql_result_sea))
    {
		$country = $row_country['country'];
		
		$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
		$sql_result_num = sqlsrv_query ($result_num_allegations);
		$num_allegations = sqlsrv_num_rows($sql_result_num);
		?>
        <tr>
        <td>
        	<table>
            <tr>
            <td><font color="#1365A8"?<strong>
        	<?php
			echo $country;
			echo " (".$num_allegations." complaints)";
			?>
            </strong></font>
            </td>
            </tr>
            <tr>
            <td>
			Cases Opened in CMS :
            <?php
				$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND resolution = 'Open case in CMS' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
				$sql_result_num = sqlsrv_query ($result_num_allegations);
				echo $num_allegations = sqlsrv_num_rows($sql_result_num);
			?>
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
                            
                            
                            <div id="tabs-211">
                            <table align="center" class="gridtable">
                                <tr><td><font color="#1365A8" size="+1">
                                	Souther Africa
                                </font>
                                </td></tr>
                                <tr><td>
                                </td></tr>
                                </table>
                            <div id="regions_div_sa" style="width: 900px; height: 500px;"></div>
                            
 <table border="0" class="gridtable">
<?php
	$result_countries_sa = "SELECT * FROM region_sa";
	$sql_result_sa = sqlsrv_query ($result_countries_sa);
	$num_countries_sa = sqlsrv_num_rows($sql_result_sa);
	while($row_country = sqlsrv_fetch_array($sql_result_sa))
    {
		$country = $row_country['country'];
		
		$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
		$sql_result_num = sqlsrv_query ($result_num_allegations);
		$num_allegations = sqlsrv_num_rows($sql_result_num);
		?>
        <tr>
        <td>
        	<table>
            <tr>
            <td><font color="#1365A8"?<strong>
        	<?php
			echo $country;
			echo " (".$num_allegations." complaints)";
			?>
            </strong></font>
            </td>
            </tr>
            <tr>
            <td>
			Cases Opened in CMS :
            <?php
				$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND resolution = 'Open case in CMS' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
				$sql_result_num = sqlsrv_query ($result_num_allegations);
				echo $num_allegations = sqlsrv_num_rows($sql_result_num);
			?>
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
                            
                           
                            <div id="tabs-311">
                            <table align="center" class="gridtable">
                                <tr><td><font color="#1365A8" size="+1">
                                	Middle East and North Africa
                                </font>
                                </td></tr>
                                <tr><td>
                                </td></tr>
                                </table>
                            
                            	<div id="tabssub3">
                                    <ul>
                                        <li><a href="#tabs-31" title="Middle East">Middle East</a></li>
                                        <li><a href="#tabs-32" title="North Africa">North Africa</a></li>
                                    </ul>
                               
                               
                                    <div id="tabs-31">
                                        <div id="regions_div_mena_me" style="width: 900px; height: 500px;"></div>
                                    </div>
                                    
                                    <div id="tabs-32">
										<div id="regions_div_mena_na" style="width: 900px; height: 500px;"></div>
                                    </div>
                             	</div>
<table border="0" class="gridtable">
<?php
	$result_countries_mena = "SELECT * FROM region_mena";
	$sql_result_mena = sqlsrv_query ($result_countries_mena);
	$num_countries_mena = sqlsrv_num_rows($sql_result_mena);
	while($row_country = sqlsrv_fetch_array($sql_result_mena))
    {
		$country = $row_country['country'];
		
		$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
		$sql_result_num = sqlsrv_query ($result_num_allegations);
		$num_allegations = sqlsrv_num_rows($sql_result_num);
		?>
        <tr>
        <td>
        	<table>
            <tr>
            <td><font color="#1365A8"?<strong>
        	<?php
			echo $country;
			echo " (".$num_allegations." complaints)";
			?>
            </strong></font>
            </td>
            </tr>
            <tr>
            <td>
			Cases Opened in CMS :
            <?php
				$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND resolution = 'Open case in CMS' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
				$sql_result_num = sqlsrv_query ($result_num_allegations);
				echo $num_allegations = sqlsrv_num_rows($sql_result_num);
			?>
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
                            

                            <div id="tabs-411">
                            <table align="center" class="gridtable">
                                <tr><td><font color="#1365A8" size="+1">
                                	Western Africa
                                </font>
                                </td></tr>
                                <tr><td>
                                </td></tr>
                                </table>

                            	<div id="regions_div_wa" style="width: 900px; height: 500px;"></div>
<table border="0" class="gridtable">
<?php
	$result_countries_wa = "SELECT * FROM region_wa";
	$sql_result_wa = sqlsrv_query ($result_countries_wa);
	$num_countries_wa = sqlsrv_num_rows($sql_result_wa);
	while($row_country = sqlsrv_fetch_array($sql_result_wa))
    {
		$country = $row_country['country'];
		
		$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
		$sql_result_num = sqlsrv_query ($result_num_allegations);
		$num_allegations = sqlsrv_num_rows($sql_result_num);
		?>
        <tr>
        <td>
        	<table>
            <tr>
            <td><font color="#1365A8"?<strong>
        	<?php
			echo $country;
			echo " (".$num_allegations." complaints)";
			?>
            </strong></font>
            </td>
            </tr>
            <tr>
            <td>
			Cases Opened in CMS :
            <?php
				$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND resolution = 'Open case in CMS' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
				$sql_result_num = sqlsrv_query ($result_num_allegations);
				echo $num_allegations = sqlsrv_num_rows($sql_result_num);
			?>
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

                            <div id="tabs-511">
                            <table align="center" class="gridtable">
                                <tr><td><font color="#1365A8" size="+1">
                                	Central Africa
                                </font>
                                </td></tr>
                                <tr><td>
                                </td></tr>
                                </table>
                                
   	                            <div id="regions_div_ca" style="width: 900px; height: 500px;"></div>
<table border="0" class="gridtable">
<?php
	$result_countries_ca = "SELECT * FROM region_ca";
	$sql_result_ca = sqlsrv_query ($result_countries_ca);
	$num_countries_ca = sqlsrv_num_rows($sql_result_ca);
	while($row_country = sqlsrv_fetch_array($sql_result_ca))
    {
		$country = $row_country['country'];
		
		$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
		$sql_result_num = sqlsrv_query ($result_num_allegations);
		$num_allegations = sqlsrv_num_rows($sql_result_num);
		?>
        <tr>
        <td>
        	<table>
            <tr>
            <td><font color="#1365A8"?<strong>
        	<?php
			echo $country;
			echo " (".$num_allegations." complaints)";
			?>
            </strong></font>
            </td>
            </tr>
            <tr>
            <td>
			Cases Opened in CMS :
            <?php
				$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND resolution = 'Open case in CMS' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
				$sql_result_num = sqlsrv_query ($result_num_allegations);
				echo $num_allegations = sqlsrv_num_rows($sql_result_num);
			?>
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
                            
                            
                            <div id="tabs-611">
                            <table align="center" class="gridtable">
                                <tr><td><font color="#1365A8" size="+1">
                                	East Europe and Central Asia
                                </font>
                                </td></tr>
                                <tr><td>
                                </td></tr>
                                </table>
                            

                            
                            	<div id="tabssub6">
                                    <ul>
                                        <li><a href="#tabs-61" title="East Europe">East Europe</a></li>
                                        <li><a href="#tabs-62" title="Central Asia">Central Asia</a></li>
                                    </ul>
                               
                               
                                    <div id="tabs-61">
                                        <div id="regions_div_eeca_ee" style="width: 900px; height: 500px;"></div>
                                    </div>
                                    
                                    <div id="tabs-62">
										<div id="regions_div_eeca_ca" style="width: 900px; height: 500px;"></div>
                                    </div>
                             	</div>
<table border="0" class="gridtable">
<?php
	$result_countries_eeca = "SELECT * FROM region_eeca";
	$sql_result_eeca = sqlsrv_query ($result_countries_eeca);
	$num_countries_eeca = sqlsrv_num_rows($sql_result_eeca);
	while($row_country = sqlsrv_fetch_array($sql_result_eeca))
    {
		$country = $row_country['country'];
		
		$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
		$sql_result_num = sqlsrv_query ($result_num_allegations);
		$num_allegations = sqlsrv_num_rows($sql_result_num);
		?>
        <tr>
        <td>
        	<table>
            <tr>
            <td><font color="#1365A8"?<strong>
        	<?php
			echo $country;
			echo " (".$num_allegations." complaints)";
			?>
            </strong></font>
            </td>
            </tr>
            <tr>
            <td>
			Cases Opened in CMS :
            <?php
				$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND resolution = 'Open case in CMS' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
				$sql_result_num = sqlsrv_query ($result_num_allegations);
				echo $num_allegations = sqlsrv_num_rows($sql_result_num);
			?>
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
                            
                            <div id="tabs-711">
                            <table align="center" class="gridtable">
                                <tr><td><font color="#1365A8" size="+1">
                                	Latin America and Caribbean
                                </font>
                                </td></tr>
                                <tr><td>
                                </td></tr>
                                </table>
                           
                           		 <div id="tabssub7">
                                    <ul>
                                        <li><a href="#tabs-71" title="South America">South America</a></li>
                                        <li><a href="#tabs-72" title="Central America">Central America</a></li>
                                        <li><a href="#tabs-73" title="Caribbean">Caribbean</a></li>
                                    </ul>
                               
                               
                                    <div id="tabs-71">
                                        <div id="regions_div_lac_south" style="width: 900px; height: 500px;"></div>
                                    </div>
                                    
                                    <div id="tabs-72">
										<div id="regions_div_lac_central" style="width: 900px; height: 500px;"></div>
                                    </div>
                                    
                                    <div id="tabs-73">
										<div id="regions_div_lac_caribbean" style="width: 900px; height: 500px;"></div>
                                    </div>
                             	</div>
 <table border="0" class="gridtable">
<?php
	$result_countries_eeca = "SELECT * FROM region_lac";
	$sql_result_eeca = sqlsrv_query ($result_countries_eeca);
	$num_countries_eeca = sqlsrv_num_rows($sql_result_eeca);
	while($row_country = sqlsrv_fetch_array($sql_result_eeca))
    {
		$country = $row_country['country'];
		
		$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
		$sql_result_num = sqlsrv_query ($result_num_allegations);
		$num_allegations = sqlsrv_num_rows($sql_result_num);
		?>
        <tr>
        <td>
        	<table>
            <tr>
            <td><font color="#1365A8"?<strong>
        	<?php
			echo $country;
			echo " (".$num_allegations." complaints)";
			?>
            </strong></font>
            </td>
            </tr>
            <tr>
            <td>
			Cases Opened in CMS :
            <?php
				$result_num_allegations = "SELECT * FROM allegation_details WHERE country = '$country' AND resolution = 'Open case in CMS' AND date_received BETWEEN '2013-01-01' AND '2016-12-31'";
				$sql_result_num = sqlsrv_query ($result_num_allegations);
				echo $num_allegations = sqlsrv_num_rows($sql_result_num);
			?>
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
                            
</div>

</body>
</html>