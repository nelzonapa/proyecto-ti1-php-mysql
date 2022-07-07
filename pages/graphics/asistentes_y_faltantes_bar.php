
<?php
    class BaseDatos{
        public static $instancia = null;
        public static function crearInstancia(){
          if(!isset(self::$instancia)){ //si la instancia tiene algo?
            $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instancia = new PDO('mysql:host=localhost;dbname=nelzon','root','',$opciones);
            echo "Conexion satisfactoria a la Base de Datos ...";
          }
          return self::$instancia;
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dia = $_POST["botonDia"];
        echo "<label id='dia' class='columna'>".$dia."</label>";
    }

    $conexionDB = BaseDatos::crearInstancia();

    $sql = "SELECT * FROM estudiantes";
    $consulta = $conexionDB->prepare($sql);
    $consulta->execute();
    $listaDeEstudiantes = $consulta->fetchAll();

    $sql1="SELECT COUNT($dia) as 'presentes'
        FROM estudiantes
        WHERE $dia='P'
        ";
    $sql2="SELECT COUNT($dia) as 'faltantes'
        FROM estudiantes
        WHERE $dia='F'
        ";
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

    $dataPoints = array( 
        array("y" => $dato, "label" => "Presentes" ),
        array("y" => $dato2, "label" => "Faltantes" ),
    );

    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <script>
    window.onload = function() {
      
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Asistentes y Faltantes del dia 1"
        },
        axisY: {
            title: "Cantidad de Alumnos"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## alumnos",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    }
    </script>
    </head>
    <body>
    <button class="btn-editar"><a href="../pages/logic/registroAsistencia.php" >Descargar Registro</a> </button>
  <div class="table-container-notas">
  <table id="tablaUsuarios" class="tabla-notas">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos y Nombres</th>
        <?php echo "<th>".$dia."</th>";?>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($listaDeEstudiantes as $estudiante){ ?>
            <td> <?php echo $estudiante['id_alumno']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres_apellidos']; ?> </td>
            <?php 
                echo "<td>".$estudiante[$dia]."</td>";  
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
  <table id="tablaUsuarios" class="tabla-notas">
    <thead>
      <tr>
        <th>ID</th>
        <th>Condicion</th>
        <?php echo "<th>".$dia."</th>";?>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
      <?php foreach($listaDecondiciones as $estudiante){ ?>
        <tr class="espacios-tabla">
          <td> <?php echo $estudiante['id']; ?> </td>
          <td class="names"> <?php echo $estudiante['condicion']; ?> </td>
          <?php 

                echo "<td>".$estudiante[$dia]."</td>";  

          ?>
          
        </tr>
      <?php 
        } 
      ?>

    </tbody>
</table>
    <!--Recien empieza-->
    <h2>Grafica</h2>
    <div id="chartContainer" style="height: 370px; width: 800;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <button id="botonRegresar" class="boton" type="button" onclick="location.href='../view_estadisticaMenu.php'">Volver</button>
    </body>
    </html>



