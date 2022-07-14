<!-- /* Including the view_asistencia_header.php file. */ -->
<?php include('../../templates/view_asistencia_header_graficos.php'); ?>

<?php
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
        $dia = $_POST["botonT"];
        //echo "<label id='dia' class='columna'>".$dia."</label>";
    }

    $conexionDB = BaseDatos::crearInstancia();

    $sql1="SELECT * FROM `estudiantes` WHERE totalP=0";
    $sql2="SELECT * FROM `estudiantes` WHERE totalF=0";

    $consulta = $conexionDB->prepare($sql1);
    $consulta->execute();
    $abandonos = $consulta->fetchAll();

    $consulta2 = $conexionDB->prepare($sql2);
    $consulta2->execute();
    $presentes = $consulta2->fetchAll();

    $totalAsistentes = 0;
    $totalAbandonos = 0;
    $mixto = 0;
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

<section class="all">
<h1>Estadistica General</h1>

<h3>Asignatura: Trabajo Interdisciplinar <?php //echo $asignatura; ?></h3>
<button class="btn_pdf"  ><a class="a_name" href="../logic/DocAbandonos.php" >Descargar Registro</a> </button>
  <div class="table-container-notas">
  <h2 class="centrar">Siempre Asistieron</h2>
  <table id="tablaUsuarios" class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Total De Asistencia</th>
        <th>Total de Faltas</th>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($presentes as $estudiante){ 
              $totalAsistentes = $totalAsistentes + 1;
            ?>
            <td> <?php echo $estudiante['id_est']; ?> </td>
            <td class="names"> <?php echo $estudiante['apellidos']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres']; ?> </td>
            <td> <?php echo $estudiante['totalP']; ?> </td>
            <td> <?php echo $estudiante['totalF']; ?> </td>
        </tr>

    <?php } ?>
    </tbody>
</table>
<br><br>
<h2 class="centrar">Abandonos</h2>
<table class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Total De Asistencia</th>
        <th>Total de Faltas</th>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($abandonos as $estudiante){ 
              $totalAbandonos = $totalAbandonos + 1;
            ?>
            <td> <?php echo $estudiante['id_est']; ?> </td>
            <td class="names"> <?php echo $estudiante['apellidos']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres']; ?> </td>
            <td> <?php echo $estudiante['totalP']; ?> </td>
            <td> <?php echo $estudiante['totalF']; ?> </td>
        </tr>
            <?php } ?>
    </tbody>  
  </table>
  </div>

  <?php
      $mixto = 40 - $totalAsistentes - $totalAbandonos;
  ?>

  <!--Recien empieza-->
  <br><br>
    <h2 class="centrar">Grafica</h2>

    <div class="graficos">
            <canvas id="myChart" width="130" height="80"></canvas>
            <button onclick="Descargar()">Descargar</button>
    </div>

    <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='../view_menu_Est_general.php'">Volver</button>
    </section>
    </body>

    <script>
const ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Siempre Asistio','Abandono','Pre./Falt.'],
    datasets: [{
      label: 'Cantidad de Estudiantes',
      backgroundColor: [
        "rgb(0, 150, 254)",
        "rgb(150, 100, 50)",
        "rgb(255, 50, 254)"
      ],
      data: [<?php echo $totalAsistentes.",".$totalAbandonos.",".$mixto ?>],
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
        imageLink.download = 'Abandono.png';
        imageLink.href = canvas.toDataURL('image/png');
        imageLink.click();

        console.log(imageLink);
    };
    </script>


    </html>


<!-- /* Including the view_asistencia_footer.php file. */ -->
<?php include('../../templates/view_asistencia_footer.php'); ?>

