<!-- /* Including the header.php file. */ -->
<?php include('../templates/header.php'); ?>
<?php include('logic/estudiantes.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/nav.css">
  <title>Inicio</title>
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
        <li class="list active">
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
        <li class="list">
          <a href="view_cursos.php">
            <span class="icon"><ion-icon name="library-outline"></ion-icon></span>
            <span class="title">Cursos</span>
          </a>
        </li>
        <li class="list">
          <a href="view_trabinter.php">
            <span class="icon"><ion-icon name="pencil-outline"></ion-icon></span>
            <span class="title">Notas</span>
          </a>
        </li>
        <li class="list">
          <a href="view_ajustes.php">
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
          <span><?php echo $_SESSION['usuario']; ?></span>
          <div class="user">
            <img id="user" src="../img/user.jpg">
          </div>
        </div>
      </div>
      <!-- cards -->
      <div class="cardBox">
        <div class="card">
          <div>
            <div class="numbers">226</div>
            <div class="cardName">Estudiantes</div>
          </div>
          <div class="iconBx">
            <ion-icon name="people-outline"></ion-icon>
          </div>
        </div>
        <div class="card">
          <div>
            <div class="numbers">7</div>
            <div class="cardName">Asignaturas</div>
          </div>
          <div class="iconBx">
            <ion-icon name="book-outline"></ion-icon>
          </div>
        </div>
        <div class="card">
          <div>
            <div class="numbers">2</div>
            <div class="cardName">Usuarios</div>
          </div>
          <div class="iconBx">
            <ion-icon name="person-circle-outline"></ion-icon>
          </div>
        </div>
        <div class="card">
          <div>
            <div class="numbers">05</div>
            <div class="cardName">Julio 2022</div>
          </div>
          <div class="iconBx">
            <ion-icon name="calendar-outline"></ion-icon>
          </div>
        </div>
      </div>

      <div class="estudiantes_table">
        <table id="tablaUsuarios" class="tabla-notas">
          <thead>
            <tr>
              <th>ID</th>
              <th>Apellidos</th>
              <th>Nombres</th>
              <th>Semestre</th>
              <th>Informacion</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($listaDeEstudiantes as $estudiante){ ?>
              <tr class="espacios-tabla">
                <td> <?php echo $estudiante['id_est']; ?> </td>
                <td> <?php echo $estudiante['apellidos']; ?> </td>
                <td> <?php echo $estudiante['nombres']; ?> </td>
                <td> III </td>
                <td class="btns">
                  <form method="post" action="view_info_alumno.php" >
                    <input type="hidden" name="id" value="ver_<?php echo $estudiante['id_est']; ?>">
                    <input type="hidden" name="curso" value="ver_<?php echo $cursoElegido; ?>">
                    <button class="btn-en-tabla" type="submit">Ver</button>
                  </form>
                </td>
              </tr>
            <?php 
              } 
            ?>
          </tbody>  
        </table>
      </div>


    </div>
  </div>
  
  <script src="../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<!-- /* Including the footer.php file. */ -->
<?php include('../templates/footer.php'); ?>