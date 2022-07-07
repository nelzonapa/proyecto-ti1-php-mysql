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
<!DOCTYPE HTML>
    <html>
    <head>

  </head>

<h1>Tabla de Asistencia</h1>

<h2 class="titulo-notas">Estudiantes Registrados</h2>
<h3>Asignatura: Trabajo Interdisciplinar <?php //echo $asignatura; ?></h3>
<button class="btn-editar"><a href="../pages/logic/registroAsistencia.php" >Descargar Registro</a> </button>
  <div class="table-container-notas">
  <h2>Siempre Asistieron</h2>
  <table id="tablaUsuarios" class="tabla-notas">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos y Nombres</th>
        <th>Total De Asistencia</th>
        <th>Total de Faltas</th>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($presentes as $estudiante){ 
              $totalAsistentes = $totalAsistentes + 1;
            ?>
            <td> <?php echo $estudiante['id_alumno']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres_apellidos']; ?> </td>
            <td> <?php echo $estudiante['totalP']; ?> </td>
            <td> <?php echo $estudiante['totalF']; ?> </td>
        </tr>

    <?php } ?>

    </tbody>
</table>

<h2>Abandonos</h2>
<table class="tabla-asistencias">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos y Nombres</th>
        <th>Total De Asistencia</th>
        <th>Total de Faltas</th>
      </tr>
    </thead>
    
    <tbody class="espacios-tabla">
        <tr class="espacios-tabla">
            <?php foreach($abandonos as $estudiante){ 
              $totalAbandonos = $totalAbandonos + 1;
            ?>
            <td> <?php echo $estudiante['id_alumno']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres_apellidos']; ?> </td>
            <td> <?php echo $estudiante['totalP']; ?> </td>
            <td> <?php echo $estudiante['totalF']; ?> </td>
        </tr>
            <?php } ?>
    </tbody>  
  </table>
  </div>

  <?php
      $mixto = 20 - $totalAsistentes - $totalAbandonos;
      $dataPoints = array( 
        array("y" => $totalAsistentes, "label" => "Siempre Presentes" ),
        array("y" => $totalAbandonos, "label" => "Abandonos" ),
        array("y" => $mixto, "label" => "Presentes/Faltas" ),
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
            text: "Asistentes y Faltantes"
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
    <div id="chartContainer" style="height: 370px; width: 800;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <button id="botonRegresar" class="boton" type="button" onclick="location.href='../view_estadisticaMenu.php'">Volver</button>
    </body>
    </html>