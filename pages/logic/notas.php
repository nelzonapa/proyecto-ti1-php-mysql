<?php
include_once '../config/db.php';
$conexionDB = BaseDatos::crearInstancia();

// print_r($_POST);

$id = isset($_POST['id_alumno'])?$_POST['id_alumno']:'';
$asignatura = isset($_POST['botonCurso'])?$_POST['botonCurso']:'';


//------------------- lista de estudaintes y sus notas ---------------
$sql = "SELECT * FROM estudiantes";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDeEstudiantes = $consulta->fetchAll();
//------------------- lista de estudaintes y sus notas ---------------ojoooooooo
$sql = "SELECT * FROM estadistica_diaria";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDecondiciones = $consulta->fetchAll();
// ---------------- Numero de desaprobados ----------------------
$sql2 = "SELECT COUNT(id_alumno) as 'CantDesaprobados'
        FROM estudiantes WHERE nota_final<10.5";
$consulta2 = $conexionDB->prepare($sql2);
$consulta2->execute();
$cantDesap = $consulta2->fetchAll();

$numDesap = $cantDesap[0]['CantDesaprobados'];
$porcentDesap = ($numDesap/40)*100;

// ---------------- Numero de Aprobados ----------------------
$sql3 = "SELECT COUNT(id_alumno) as 'CantAprobados'
        FROM estudiantes WHERE nota_final>=10.5";
$consulta3 = $conexionDB->prepare($sql3);
$consulta3->execute();
$cantApr = $consulta3->fetchAll();

$numApr = $cantApr[0]['CantAprobados'];
$porcentApr = ($numApr/40)*100;

//----------------Mayor nota final-----------------------
$sql6 = "SELECT nombres_apellidos, MAX(nota_final) as 'nota_mayor'
FROM estudiantes";
$consulta6 = $conexionDB->prepare($sql6);
$consulta6->execute();
$maxNota = $consulta6->fetchAll();
$notaMayor = $maxNota[0]['nota_mayor'];

//----------------Menor nota final-----------------------
$sql7 = "SELECT nombres_apellidos, MIN(nota_final) as 'nota_menor'
FROM estudiantes";
$consulta7 = $conexionDB->prepare($sql7);
$consulta7->execute();
$minNota = $consulta7->fetchAll();
$notaMenor = $minNota[0]['nota_menor'];

//----------------Nota Promedio de las notas finales-----------------------
$sql8 = "SELECT AVG(nota_final) as 'nota_Prom' FROM estudiantes";
$consulta8 = $conexionDB->prepare($sql8);
$consulta8->execute();
$notaPromedio = $consulta8->fetchAll();
$notaProm = $notaPromedio[0]['nota_Prom'];

// ----------------- Estudiantes con probabilidad de 
$sql9 = "SELECT nombres_apellidos,continua_1,parcial_1 
FROM estudiantes";
$consulta9 = $conexionDB->prepare($sql9);
$consulta9->execute();
$conjuntoDeNotas = $consulta9->fetchAll();
foreach ($conjuntoDeNotas as $i) {
  $i["continua_1"]*0.2;
  $i["parcial_1"]*0.1;
  
}
// print_r($conjuntoDeNotas);

// print_r($cantDesap);
// print_r($numDesap);
// print_r($porcentDesap);

?>