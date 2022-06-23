<?php 
include "config4.php"; 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"> 
<script src="https://www.google.com/jsapi"></script> 
<style> 
.pie-chart { 
width: 600px; 
height: 400px; 
margin: 0 auto; 
} 
.text-center{ 
text-align: center; 
} 
</style> 
</head> 
<body> 
<h2 class="text-center">Generar grafico Pie Chart en PHP</h2> 
<div id="chartDiv" class="pie-chart"></div> 
<div class="text-center"> 
<h2>Toma de asistencia</h2> 
</div> 
<script type="text/javascript"> 
window.onload = function() { 
google.load("visualization", "1.1", { 
packages: ["corechart"], 
callback: 'drawChart' 
}); 
}; 
function drawChart() { 
var data = new google.visualization.arrayToDataTable([ 
['nombres_apellidos', 'dia_1'], 
<?php 
while($row = mysqli_fetch_assoc($chartQueryRecords)){ 
echo "['".$row['nombres_apellidos']."', ".$row['dia_1']."],"; 
} 
?> 
]); 
var options = { 
title: 'Asistencia', 
}; 
var chart = new google.visualization.PieChart(document.getElementById('chartDiv')); 
chart.draw(data, options); 
} 
</script> 
</body> 
</html>