<?php 
include("BaseDatos.php");
include("../view_asistencia.php");
$BaseDatos = new baseDEdatos("localhost","root","","historico_estudiantes_epcc");
$BaseDatos->conectar();

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $dia = $_POST["dia"];
  for ($a = 1; $a<=40; $a++){
    $asist = $_POST["asist$a"];
    $BaseDatos->insAsistencia($asist,$a,$dia);
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $totalAsistentes = $_POST["totalP"];
  $totalAusentes = $_POST["totalA"];
  $BaseDatos->insTotalDia($totalAsistentes,$totalAusentes,$dia);
}
$BaseDatos->cerrar();



?>
