
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
        $id = $_POST["botonAlumno"];
        echo "<label id='id' class='columna'> ID del alumno: ".$id."</label>";
    }

    $conexionDB = BaseDatos::crearInstancia();


    $sql1="SELECT * FROM `estudiantes` WHERE id_alumno=$id";

    $consulta = $conexionDB->prepare($sql1);
    $consulta->execute();
    $numpresentes = $consulta->fetchAll();
    ?>

    <h1>Asistencias y Faltas por Alumno</h1>

<h2 class="titulo-notas">Estudiantes Registrados</h2>
<h3>Asignatura: Trabajo Interdisciplinar<?php //echo $asignatura; ?></h3>
<button class="btn-editar"><a href="../pages/logic/registroAsistencia.php" >Descargar Registro</a> </button>
  <div class="table-container-notas">
  <table id="tablaUsuarios" class="tabla-notas">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos y Nombres</th>
        <th>Dia 1</th>
        <th>Dia 2</th>
        <th>Dia 3</th>
        <th>Dia 4</th>
        <th>Dia 5</th>
        <th>Dia 6</th>
        <th>Dia 7</th>
        <th>Dia 8</th>
        <th>Dia 9</th>
        <th>Dia 10</th>
        <th>Dia 11</th>
        <th>Dia 12</th>
        <th>Dia 13</th>
        <th>Dia 14</th>
        <th>Dia 15</th>
        <th>Dia 16</th>
        <th>Dia 17</th>
        <th>Dia 18</th>
        <th>Dia 19</th>
        <th>Dia 20</th>
        <th>Total De Asistencia</th>
        <th>Total de Faltas</th>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($numpresentes as $estudiante){ ?>
            <td> <?php echo $estudiante['id_alumno']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres_apellidos']; ?> </td>
            <?php 
            for($i = 1; $i<=20; $i++){
                echo "<td>".$estudiante["dia_$i"]."</td>";  
            }
            ?>
            
            <td> <?php echo $estudiante['totalP']; ?> </td>
            <td> <?php echo $estudiante['totalF']; ?> </td>
        </tr>

    <?php } ?>

    </tbody>

</table>    
  </div>
    <?php
      $dataPoints = array( 
        array("y" => $estudiante['totalP'], "label" => "Presentes" ),
        array("y" => $estudiante['totalF'], "label" => "Faltas" ),
    );

  ?>

  <!--Recien empieza-->
    <h2>Grafica</h2>
    <script>
    window.onload = function() {
      
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Asistencias y Faltas"
        },
        axisY: {
            title: "Cantidad de Asistencia"
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
    <div id="chartContainer" style="height: 370px; width: 800;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <button id="botonRegresar" class="boton" type="button" onclick="location.href='../view_estadisticaMenu.php'">Volver</button>
    </body>
    </html>
