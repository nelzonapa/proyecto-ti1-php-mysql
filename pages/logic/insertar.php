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

$BaseDatos->cerrar();
?>