<?php 
$host = "localhost"; /* Host name */ 
$user = "root"; /* User */ 
$password = ""; /* Password */ 
$dbname = "historico_estudiantes_epcc"; /* Database name */ 
$con = mysqli_connect($host, $user, $password,$dbname); 
// Check connection 
if (!$con) { 
die("Connection failed: " . mysqli_connect_error()); 
}
$chartQuery = "SELECT nombres_apellidos, dia_1 FROM estudiantes ORDER BY id_alumno"; 
$chartQueryRecords = mysqli_query($con,$chartQuery); 
?>