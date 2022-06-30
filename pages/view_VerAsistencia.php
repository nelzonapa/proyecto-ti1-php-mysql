<?php include('../templates/header.php'); ?>
<?php include('logic/notas.php') ?>
<?php include('logic/variables.php'); ?>
  
<?php print_r($cursoElegido); ?>
<?php
            include("../pages/logic/baseDatos.php");
            $Base = new baseDEdatos("localhost","root","","historico_estudiantes_epcc");
            $Base->conectar();
?>


<h1>Tabla de Asistencia</h1>

<h2 class="titulo-notas">Estudiantes Registrados</h2>
<h3>Asignatura: <?php echo $asignatura; ?></h3>
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
            <?php foreach($listaDeEstudiantes as $estudiante){ ?>
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
<table class="tabla-asistencias">
    <thead>
      <tr>
        <th>ID</th>
        <th>Condicion</th>
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
        <th>Total<th>
      </tr>
    </thead>
    <tbody class="espacios-tabla">
      <?php foreach($listaDecondiciones as $estudiante){ ?>
        <tr class="espacios-tabla">
          <td> <?php echo $estudiante['id']; ?> </td>
          <td class="names"> <?php echo $estudiante['condicion']; ?> </td>
          <?php 
            for($i = 1; $i<=20; $i++){
                echo "<td>".$estudiante["dia_$i"]."</td>";  
            }
          ?>
          <td> <?php echo $estudiante['Total']; ?> </td>
          
        </tr>
      <?php 
        } 
      ?>
    <?php $Base->cerrar(); ?>
    </tbody>  
  </table>
  </div>
  <button id="botonRegresar" class="boton" type="button" onclick="location.href='view_menuAsistencia.php'">Volver</button>


<?php include('../templates/footer.php'); ?>