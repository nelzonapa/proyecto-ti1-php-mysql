<?php
    class BaseDatos{
        public static $instancia = null;
        public static function crearInstancia(){
          if(!isset(self::$instancia)){ //si la instancia tiene algo?
            $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instancia = new PDO('mysql:host=localhost;dbname=historico_estudiantes_epcc','root','',$opciones);
            echo "Conexion satisfactoria a la Base de Datos ...";
          }
          return self::$instancia;
        }
    }
    $conexionDB = BaseDatos::crearInstancia();

    $sql1="SELECT COUNT(dia_1) as 'presentes'
        FROM estudiantes
        WHERE dia_1='P'
        ";
    $sql2="SELECT COUNT(dia_1) as 'faltantes'
        FROM estudiantes
        WHERE dia_1='F'
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
            title: "Gold Reserves (in tonnes)"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## tonnes",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
      
    }
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 370px; width: 800;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>
    </html>                              