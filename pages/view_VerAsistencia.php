<?php include('../templates/header.php'); ?>
<?php include('logic/notas.php') ?>
<?php include('logic/variables.php'); ?>
  
<?php print_r($cursoElegido); ?>


<h1>Tabla de notas</h1>

<h2 class="titulo-notas">Estudiantes Registrados</h2>
<h3>Asignatura: <?php echo $asignatura; ?></h3>
<button class="btn-editar"><a href="../resources/pdf_de_prueba.pdf" download>Descargar Registro</a> </button>
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
        <th>Total De Asistencia<th>
        <th>Total de Faltas<th>
      </tr>
    </thead>
    <?php
            include("../pages/logic/baseDatos.php");
            $Base = new baseDEdatos("localhost","root","","historico_estudiantes_epcc");
            $Base->conectar();
    ?>
    <tbody>
      <?php foreach($listaDeEstudiantes as $estudiante){ ?>
        <tr class="espacios-tabla">
          <td> <?php echo $estudiante['id_alumno']; ?> </td>
          <?php $totalPresentes = 0;
          $totalAusentes = 0;?>
          <td class="names"> <?php echo $estudiante['nombres_apellidos']; ?> </td>
          
          <td> <?php echo $estudiante['dia_1']; ?> </td>
            <?php
            if($estudiante['dia_1']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_1']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_2']; ?> </td>
            <?php
            if($estudiante['dia_2']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_2']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_3']; ?> </td>
            <?php
            if($estudiante['dia_3']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_3']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_4']; ?> </td>
            <?php
            if($estudiante['dia_4']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_4']=='F'){
                $totalAusentes++;
            }
            ?>

          <td> <?php echo $estudiante['dia_5']; ?> </td>
            <?php
            if($estudiante['dia_5']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_5']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_6']; ?> </td>
            <?php
            if($estudiante['dia_6']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_6']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_7']; ?> </td>
            <?php
            if($estudiante['dia_7']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_7']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_8']; ?> </td>
            <?php
            if($estudiante['dia_8']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_8']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_9']; ?> </td>
            <?php
            if($estudiante['dia_9']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_9']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_10']; ?> </td>
            <?php
            if($estudiante['dia_10']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_10']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_11']; ?> </td>
            <?php
            if($estudiante['dia_11']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_11']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_12']; ?> </td>
            <?php
            if($estudiante['dia_12']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_12']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_13']; ?> </td>
            <?php
            if($estudiante['dia_13']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_13']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_14']; ?> </td>
            <?php
            if($estudiante['dia_14']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_14']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_15']; ?> </td>
            <?php
            if($estudiante['dia_15']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_15']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_16']; ?> </td>
            <?php
            if($estudiante['dia_16']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_16']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_17']; ?> </td>
            <?php
            if($estudiante['dia_17']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_17']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_18']; ?> </td>
            <?php
            if($estudiante['dia_18']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_18']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_19']; ?> </td>
            <?php
            if($estudiante['dia_19']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_19']=='F'){
                $totalAusentes++;
            }
            ?>
          <td> <?php echo $estudiante['dia_20']; ?> </td>
            <?php
            if($estudiante['dia_20']=='P'){
                $totalPresentes++;
            }
            if($estudiante['dia_20']=='F'){
                $totalAusentes++;
            }
            ?>
        <?php          
            $Base->insTotal($totalPresentes,$totalAusentes,$estudiante['id_alumno']);
        ?>
          <td> <?php echo $estudiante['totalP']; ?> </td>

          <td> <?php echo $estudiante['totalF']; ?> </td>


        </tr>
      <?php 
        } 
      ?>
    </tbody>
    <?php $Base->cerrar(); ?>
</table>    
<table id="tablaUsuarios" class="tabla-notas">
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
    <tbody>
      <?php foreach($listaDecondiciones as $estudiante){ ?>
        <tr class="espacios-tabla">
          <td> <?php echo $estudiante['id']; ?> </td>
          <td class="names"> <?php echo $estudiante['condicion']; ?> </td>
          <td> <?php echo $estudiante['dia_1']; ?> </td>
          <td> <?php echo $estudiante['dia_2']; ?> </td>
          <td> <?php echo $estudiante['dia_3']; ?> </td>
          <td> <?php echo $estudiante['dia_4']; ?> </td>
          <td> <?php echo $estudiante['dia_5']; ?> </td>
          <td> <?php echo $estudiante['dia_6']; ?> </td>
          <td> <?php echo $estudiante['dia_7']; ?> </td>
          <td> <?php echo $estudiante['dia_8']; ?> </td>
          <td> <?php echo $estudiante['dia_9']; ?> </td>
          <td> <?php echo $estudiante['dia_10']; ?> </td>
          <td> <?php echo $estudiante['dia_11']; ?> </td>
          <td> <?php echo $estudiante['dia_12']; ?> </td>
          <td> <?php echo $estudiante['dia_13']; ?> </td>
          <td> <?php echo $estudiante['dia_14']; ?> </td>
          <td> <?php echo $estudiante['dia_15']; ?> </td>
          <td> <?php echo $estudiante['dia_16']; ?> </td>
          <td> <?php echo $estudiante['dia_17']; ?> </td>
          <td> <?php echo $estudiante['dia_18']; ?> </td>
          <td> <?php echo $estudiante['dia_19']; ?> </td>
          <td> <?php echo $estudiante['dia_20']; ?> </td>
          <td> <?php echo $estudiante['Total']; ?> </td>



        </tr>
      <?php 
        } 
      ?>
    </tbody>  
  </table>
  </div>

<?php include('../templates/footer.php'); ?>