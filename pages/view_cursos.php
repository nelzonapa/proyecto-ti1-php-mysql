<?php include('../templates/header.php'); ?>
<?php include('logic/cursos.php') ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/nav.css">
  <link rel="stylesheet" href="../styles/cursos.css">
  <title>Cursos</title>
</head>
<body>
  <div class="container">
    <!-- Seccion 1 Navegacion -->
    <div class="navigation">
      <ul>
        <li class="list">
          <a href="#">
            <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
            <span class="title">Historical Student</span>
          </a>
        </li>
        <li class="list">
          <a href="view_inicio.php">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Inicio</span>
          </a>
        </li>
        <li class="list">
          <a href="view_estudiantes.php">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Estudiantes</span>
          </a>
        </li>
        <li class="list">
          <a href="view_asistencia.php">
            <span class="icon"><ion-icon name="laptop-outline"></ion-icon></ion-icon></span>
            <span class="title">Asistencia</span>
          </a>
        </li>
        <li class="list active">
          <a href="view_cursos.php">
            <span class="icon"><ion-icon name="library-outline"></ion-icon></span>
            <span class="title">Cursos</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"><ion-icon name="pencil-outline"></ion-icon></span>
            <span class="title">Notas</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
            <span class="title">Ajustes</span>
          </a>
        </li>
        <li class="list">
          <a href="logic/cerrar_sesion.php">
            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
            <span class="title">Sign Out</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- Seccion 2 Principal -->
    <div class="main">
      <!-- Top Bar (Toggle Buscar y User) -->
      <div class="topbar">
        <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
        </div>
        <!-- buscar -->
        <div class="search">
          <label for="">
            <input type="text" placeholder="Busque Aqui">
            <ion-icon name="search-outline"></ion-icon>
          </label>
        </div>
        <!-- Imagen de usuario -->
        <div class="user-container">
          <span>Usuario1</span>
          <div class="user">
            <img id="user" src="../img/user.jpg">
          </div>
        </div>
      </div>
      <!-- cards cursos-->
      <div class="cardBox">
        <form class="form_seleccionCurso" action="view_notas.php" method="post">
          <?php foreach($listaCursos as $curso){ ?>  
          <button class="card" name="botonCurso" value="<?php echo $curso['nombre_curso']; ?>">
            <div>
              <div class="numbers"><?php echo $curso['id_curso']; ?></div>
              <div class="cardName"><?php echo $curso['nombre_curso']; ?></div>
            </div>
            <div class="iconBx">
              <ion-icon name="people-outline"></ion-icon>
            </div>
          </button>
          <?php 
            } 
          ?>
        </form>
    </div>
    <!-- <div class="cardBox">
        <?php// foreach($listaCursos as $curso){ ?>
          <div class="card">
            <div>
              <div class="numbers"><?php //echo $curso['id_curso']; ?></div>
              <div class="cardName"><?php //echo $curso['nombre_curso']; ?></div>
            </div>
            <div class="iconBx">
              <ion-icon name="people-outline"></ion-icon>
            </div>
          </div>
        <?php 
         // } 
        ?>
    </div>    -->
  </div>
  
  <script src="../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php include('../templates/footer.php'); ?>