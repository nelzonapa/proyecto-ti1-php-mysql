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

    $sql1="SELECT COUNT(nota_final) as 'aprobados'
        FROM estudiantes
        WHERE nota_final>=11
        ";
    $sql2="SELECT COUNT(nota_final) as 'desaprobados'
        FROM estudiantes
        WHERE nota_final<11
        ";
    $consulta = $conexionDB->prepare($sql1);
    $consulta->execute();
    $numaprobados = $consulta->fetchAll();
    // print_r($numaprobados);
    $dato=$numaprobados[0]['aprobados'];
    // print_r($dato);

    $consulta2 = $conexionDB->prepare($sql2);
    $consulta2->execute();
    $numdesaprobados = $consulta2->fetchAll();
    $dato2=$numdesaprobados[0]['desaprobados'];
    // print_r($dato2);

    $dataPoints = array( 
        array("y" => $dato, "label" => "Aprobados" ),
        array("y" => $dato2, "label" => "Desaprobados" ),

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
            text: "Aprobados y desaprobados"
        },
        axisY: {
            title: "Cantidad de estudiantes"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## estudiantes",
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