<!-- /* The PHP code that is used to check if the user is logged in or not. */ -->
<?php
session_start();
if($_POST){
  $mensaje = 'Usuario o clave incorrecta';
  if($_POST['usuario']=='admin1' && $_POST['password']=='clave'){
    $_SESSION['usuario'] = $_POST['usuario'];
    // echo "Login Correcto";
    header('Location: pages/view_inicio.php');
  }
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link href='https://css.gg/organisation.css' rel='stylesheet'> -->
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
      <form class="formulario">
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
        <input class="input-form" type="text" name="nombre" id="nombre" placeholder="Nombre">
        <input class="input-form" type="email" name="email" id="email" placeholder="Email">
        <input class="input-form" type="password" name="password" id="password" placeholder="Contraseña">
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