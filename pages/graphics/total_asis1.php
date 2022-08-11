<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ../index.php');
}
class BaseDatos{
    public static $instancia = null;
    public static function crearInstancia(){
      if(!isset(self::$instancia)){ //si la instancia tiene algo?
        $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instancia = new PDO('mysql:host=localhost;dbname=nelzon','root','',$opciones);
        //echo "Conexion satisfactoria a la Base de Datos ...";
      }
      return self::$instancia;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $dia = $_POST["botonTotal"];
    //echo "<label id='dia' class='columna'>".$dia."</label>";
}

$conexionDB = BaseDatos::crearInstancia();


$sql1="SELECT Total as 'presentes' FROM `estadistica_diaria` WHERE id=1";
$sql2="SELECT Total as 'faltantes' FROM `estadistica_diaria` WHERE id=2";

$consulta = $conexionDB->prepare($sql1);
$consulta->execute();
$numpresentes = $consulta->fetchAll();
// print_r($numpresentes);
$dato=$numpresentes[0]['presentes'];
// print_r($dato);

$consulta2 = $conexionDB->prepare($sql2);
$consulta2->execute();
$numfaltantes = $consulta2->fetchAll();
$dato2=$numfaltantes[0]['faltantes'];
// print_r($dato2);

$sql = "SELECT * FROM estadistica_diaria";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$columnas = $consulta->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/nav.css">
  <link rel="stylesheet" href="../../styles/asistencia.css">
  <link rel="stylesheet" href="../../styles/graficos.css">
  <link rel="stylesheet" href="../../styles/tablas.css">
  <title>Inicio</title>
</head>
<body>
  <div class="container">
    <!-- Seccion 1 Navegacion -->
    <div class="navigation">
      <ul>
      <li class="list">
          <a href="../view_inicio.php">
            <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
            <span class="title">Historical Student</span>
          </a>
        </li>
        <li class="list">
          <a href="../view_inicio.php">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Inicio</span>
          </a>
        </li>
        <li class="list">
          <a href="../view_estudiantes.php">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Estudiantes</span>
          </a>
        </li>
        <li class="list active">
          <a href="../view_asistencia.php">
            <span class="icon"><ion-icon name="laptop-outline"></ion-icon></ion-icon></span>
            <span class="title">Asistencia</span>
          </a>
        </li>
        <li class="list">
          <a href="../view_cursos.php">
            <span class="icon"><ion-icon name="library-outline"></ion-icon></span>
            <span class="title">Cursos</span>
          </a>
        </li>
        <li class="list">
          <a href="../view_ajustes.php">
            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
            <span class="title">Ajustes</span>
          </a>
        </li>
        <li class="list">
          <a href="../logic/cerrar_sesion.php">
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
            <img id="user" src="../../img/user.jpg">
          </div>
        </div>
      </div>
      <!-- cards -->
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <section class="all">
    <h2>Total de Asistencias/Faltas del semestre</h2>
    <h3>Asignatura: Trabajo Interdisciplinar <?php //echo $asignatura; ?></h3>

    <button class="btn_pdf"><a class="a_name" href="../logic/DocTotal.php" >Descargar Registro</a> </button>
  <div class="table-container-notas">
  <table id="tablaUsuarios" class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Condicion</th>
        <?php echo "<th>".$dia."</th>";?>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
      <?php foreach($columnas as $columna){ ?>
        <tr class="espacios-tabla">
          <td> <?php echo $columna['id']; ?> </td>
          <td class="names"> <?php echo $columna['condicion']; ?> </td>
          <?php 
            echo "<td>".$columna[$dia]."</td>";  
          ?>
          
        </tr>
      <?php 
        } 
      ?>

    </tbody>
</table>
</div>
    <!--Recien empieza-->
    <br><br>
    <h2 class="centrar">Grafica</h2>
    <div class="graficos">
            <canvas id="myChart" width="130" height="80"></canvas>
            <button onclick="Descargar()">Descargar</button>
        </div>
    </body>
    <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='../view_menu_Est_general.php'">Volver</button>
    </section>

        <script>
const ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Presentes','Faltas'],
    datasets: [{
      label: 'Total',
      backgroundColor: [
        "rgb(0, 150, 254)",
        "rgb(150, 100, 50)"      ],
      data: [<?php echo $dato.",".$dato2 ?>],
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});

function Descargar(){
        const imageLink = document.createElement('a');
        const canvas = document.getElementById('myChart');
        imageLink.download = 'Total.png';
        imageLink.href = canvas.toDataURL('image/png');
        imageLink.click();

        console.log(imageLink);
    };
</script>

</div>
  </div>
  <script src="../../js/nav.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>


</html>



