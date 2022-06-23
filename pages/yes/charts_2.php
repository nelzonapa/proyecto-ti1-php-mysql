<script type="text/javascript" src="https:/www.gstatic.com/charts/loader.js"></script>
<div class="container">
	<div class="jumbotron">
		<h1>Google Charts</h1>
 		<p>Generar gráfico con Codeigniter</p>
	</div>
	<script>
		google.charts.load("current",{"packages":[corechart"]});
		google.charts.setOnLoadCallback(drawChart);
		
		function drawChart(){
			var data=google.visualization.arrayToDataTable([		
				["Service Name","Offers Count"],
				<?php
				foreach($has_offers_rate as $service){
					echo "['".$service['ServiceNameEN']."', ".$service['offers']."],";
				}
				?>
			]);
			var options ={
				title: "Percentage of services Provider subscribed"
			};
			
			var chart = new google.visualization.PieChart(document.getElementById("piechart2"));
			
			chart.draw(data,options);
		}
	</script>
	<div id="piechart2" style="width: 900px;height: 500px;></div>

</div>
