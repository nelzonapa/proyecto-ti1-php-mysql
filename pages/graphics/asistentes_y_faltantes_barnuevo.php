<!-- /* Including the view_asistencia_header.php file. */ -->
<?php include('../../templates/view_asistencia_header_graficos.php'); ?>

<?php
class BaseDatos
{
  public static $instancia = null;
  public static function crearInstancia()
  {
    if (!isset(self::$instancia)) { //si la instancia tiene algo?
      $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      self::$instancia = new PDO('mysql:host=localhost;dbname=nelzon', 'root', '', $opciones);
      //echo "Conexion satisfactoria a la Base de Datos ...";
    }
    return self::$instancia;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dia = $_POST["botonDia"];
  //echo "<label id='dia' class='columna'>".$dia."</label>";
}

$conexionDB = BaseDatos::crearInstancia();

$sql = "SELECT * FROM estudiantes";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDeEstudiantes = $consulta->fetchAll();

$sql1 = "SELECT COUNT($dia) as 'presentes'
        FROM estudiantes
        WHERE $dia='P'
        ";
$sql2 = "SELECT COUNT($dia) as 'faltantes'
        FROM estudiantes
        WHERE $dia='F'
        ";
$consulta = $conexionDB->prepare($sql1);
$consulta->execute();
$numpresentes = $consulta->fetchAll();
// print_r($numpresentes);
$dato = $numpresentes[0]['presentes'];
// print_r($dato);

$consulta2 = $conexionDB->prepare($sql2);
$consulta2->execute();
$numfaltantes = $consulta2->fetchAll();
$dato2 = $numfaltantes[0]['faltantes'];
// print_r($dato2);

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<section class="all">
  <h2>Asistencia por Dia</h2>
  <h3>Asignatura: Trabajo Interdisciplinar <?php //echo $asignatura; 
                                            ?></h3>
  <br>

  <form method="POST" action="../logic/DocDia.php" name="form" id="form">
    <input type="hidden" name="base64" id="base64" />
    <button class="btn_pdf" name="boton" type="submit" id="sBtn" value="<?php echo $dia ?>">Descargar Registro</button>
  </form>

  <!--<form action="../logic/DocDia.php" method="post">
    <button id="bboton1" name="boton" class="btn_pdf" type="submit" value="<?php echo $dia ?>">Descargar Registro</button></form>-->
  <div class="table-container-notas">
    <table id="tablaUsuarios" class="tabla">
      <thead>
        <tr>
          <th>ID</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <?php echo "<th>" . $dia . "</th>"; ?>
        </tr>
      </thead>

      <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
          <?php foreach ($listaDeEstudiantes as $estudiante) { ?>
            <td> <?php echo $estudiante['id_est']; ?> </td>
            <td class="names"> <?php echo $estudiante['apellidos']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres']; ?> </td>
            <?php
            echo "<td>" . $estudiante[$dia] . "</td>";
            ?>
        </tr>

      <?php } ?>

      </tbody>
    </table>
    <?php
    $sql = "SELECT * FROM estadistica_diaria";
    $consulta = $conexionDB->prepare($sql);
    $consulta->execute();
    $listaDecondiciones = $consulta->fetchAll();
    ?>
    <br><br>
    <table id="tablaUsuarios" class="tabla">
      <thead>
        <tr>
          <th>ID</th>
          <th>Condicion</th>
          <?php echo "<th>" . $dia . "</th>"; ?>
        </tr>
      </thead>

      <tbody class="espacios-tabla">
        <?php foreach ($listaDecondiciones as $estudiante) { ?>
          <tr class="espacios-tabla">
            <td> <?php echo $estudiante['id']; ?> </td>
            <td class="names"> <?php echo $estudiante['condicion']; ?> </td>
            <?php

            echo "<td>" . $estudiante[$dia] . "</td>";

            ?>

          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>
    <!--Recien empieza-->
    <br><br>

    <h2 class="centrar">Grafica</h2>

    <div class="graficos">
      <canvas id="canvas" width="130" height="80"></canvas>
      <button onclick="Descargar()">Descargar</button>
    </div>

    <button id="botonRegresar" class="btn_volver" type="button" onclick="location.href='../view_menu_estadistica_dia.php'">Volver</button>
    </body>

    <script>
      const ctx = document.getElementById('canvas').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Presentes', 'Faltas'],
          datasets: [{
            label: 'Total',
            backgroundColor: [
              "rgb(0, 150, 254)",
              "rgb(150, 100, 50)"
            ],
            data: [<?php echo $dato . "," . $dato2 ?>],
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

      function Descargar() {
        const imageLink = document.createElement('a');
        const canvas = document.getElementById('canvas');
        imageLink.download = 'est_dia.png';
        imageLink.href = canvas.toDataURL('image/png');
        imageLink.click();
        console.log(imageLink);
      };
    </script>

    <script>
      sBtn.addEventListener("click", function() {
        var ncanva = document.getElementById("canvas");
        var img = ncanva.toDataURL("image/png");
        document.getElementById('base64').value = img;
      });
    </script>

    </html>