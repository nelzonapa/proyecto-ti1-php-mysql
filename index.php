<?php
include_once 'config/db.php';

session_start();
$conexionDB = BaseDatos::crearInstancia();

$nombre = isset($_POST['nombreRe']) ? $_POST['nombreRe'] : '';
$email = isset($_POST['nombreRe']) ? $_POST['emailRe'] : '';
$password = isset($_POST['nombreRe']) ? $_POST['passwordRe'] : '';

$sql = "SELECT * FROM usuarios";
$sql2 = "INSERT INTO usuarios (`usuario`, `email`, `clave`) VALUES ('$nombre','$email','$password')";

$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDeUsuarios = $consulta->fetchAll();

if(isset($_POST['nombreRe'])){
  $consulta = $conexionDB->prepare($sql2);
  $consulta->execute();
  $_SESSION['usuario'] = $_POST['nombreRe'];
  echo "<script>alert('Usuario Registrado');</script>";
  header('Location: pages/view_inicio.php');
}

if($_POST){
  $mensaje = 'Usuario o clave incorrecta';
  // if($_POST['usuario']=='admin1' && $_POST['password']=='clave'){
  foreach($listaDeUsuarios as $user){
    if($_POST['usuario']==$user['usuario'] && $_POST['password']==$user['clave']){
      $_SESSION['usuario'] = $_POST['usuario'];
      $_SESSION['password'] = $_POST['password'];
      // echo "Login Correcto";
      header('Location: pages/view_inicio.php');
    }
  }
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css?20220504">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Bienvenido a Student System</title>
  </head>

  <body>
    <div class="container-form sign-up">
      <div class="welcome-back">
        <div class="message">
          <h2 class="message-contraste">Bienvenido a Student System UNSA</h2>
          <p class="message-contraste">Si ya tiene una cuenta de docente inicie sesion aqui</p>
          <button class="sign-up-btn">Iniciar Sesion</button>
        </div>
      </div>
      <form class="formulario" method="post">
        <h2 class="create-account">Crear una cuenta</h2>
        <div class="iconos">
          <div class="border-icon">
            <i class='bx bxl-instagram'></i>
          </div>
          <div class="border-icon">
            <i class='bx bxl-facebook-circle'></i>
          </div>
        </div>
        <p class="cuenta-nueva">Crear una cuenta</p>
        <input class="input-form" type="text" name="nombreRe" id="nombre" placeholder="Nombre">
        <input class="input-form" type="email" name="emailRe" id="email" placeholder="Email">
        <input class="input-form" type="password" name="passwordRe" id="password" placeholder="Contraseña">
        <input type="submit" value="Registrarse">
      </form>
    </div>

    <div class="container-form sign-in">
      <form class="formulario" method="post">
        <h2 class="create-account">Iniciar Sesion</h2>
        <div class="iconos">
          <div class="border-icon">
            <i class='bx bxl-instagram'></i>
          </div>
          <div class="border-icon">
            <i class='bx bxl-facebook-circle'></i>
          </div>
        </div>
        <p class="cuenta-nueva">¿Aun no tienes una cuenta?</p>
        <input class="input-form" type="text" name="usuario" id="usuario" placeholder="Usuario">
        <input class="input-form" type="password" name="password" id="password" placeholder="Contraseña">
        <?php 
            if(isset($mensaje)){
              echo "<script> alert('$mensaje'); </script>";
            }
          ?>
        <input type="submit" value="Iniciar Sesion">
      </form>
      <div class="welcome-back">
        <div class="message">
          <h2>Bienvenido de nuevo</h2>
          <p>Si aun no tiene una cuenta por favor registrese aqui</p>
          <button class="sign-in-btn">Registrarse</button>
        </div>
      </div>
    </div>
    <script src="js/login.js"></script>
  </body>

</html>