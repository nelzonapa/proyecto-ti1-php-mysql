<?php
session_start();

if(!isset($_SESSION['usuario'])){
  header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="stylesheet" href="../styles/tabla_notas.css">
    <link rel="stylesheet" href="../styles/form_editar.css">
    <link rel="stylesheet" href="../styles/inicio.css">
    <link rel="stylesheet" href="../styles/seleccionDia.css">
    <link rel="stylesheet" href="../styles/cursos.css">
    
    <script type="text/javascript" src="../sections/codigo.js"></script> 
    <title>Document</title>
  </head>
  <body>
    <!-- Header -->
    <div class="nav-container">
      <nav class="nav-bar">
        <h2 class="logo">System<span> Attendance</span></h2>
        <ul>
          <li><a href="view_inicio.php">Inicio</a></li>
          <li><a href="view_menuAsistencia.php">Asistencia</a></li>
          <li><a href="view_cursos.php">Notas</a></li>
          <li><a href="view_nosotros.php">Nosotros</a></li>
        </ul>
        <button type="button" onclick="location.href='logic/cerrar.php'">Cerrar Sesion</button>
      </nav>
    </div>

    