<?php include('../templates/header.php'); ?>
<?php include('logic/notas.php') ?>
<?php include('logic/variables.php'); ?>
  
<?php print_r($cursoElegido); ?>


<h1>Tabla de notas</h1>

<h2 class="titulo-notas">Estudiantes Registrados</h2>
<h3>Asignatura: <?php echo $asignatura; ?></h3>
<button class="btn-descargar"><a href="logic/registroNotas.php" target="_blank" >Descargar Registro</a> </button>
  <div class="table-container-notas">
    <table id="tablaUsuarios" class="tabla-notas">
      <thead>
        <tr>
          <th>ID</th>
          <th>Apellidos y Nombres</th>
          <th>Continua 1</th>
          <th>Parcial 1</th>
          <th>Continua 2</th>
          <th>Parcial 2</th>
          <th>Continua 3</th>
          <th>Parcial 3</th>
          <th class="esp_notaFinal" >Nota Final</th>
          <th>Operacion</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($listaDeEstudiantes as $estudiante){ ?>
          <tr class="espacios-tabla">
            <td> <?php echo $estudiante['id_alumno']; ?> </td>
            <td class="names"> <?php echo $estudiante['nombres_apellidos']; ?> </td>
            <td> <?php echo $estudiante['continua_1']; ?> </td>
            <td> <?php echo $estudiante['parcial_1']; ?> </td>
            <td> <?php echo $estudiante['continua_2']; ?> </td>
            <td> <?php echo $estudiante['parcial_2']; ?> </td>
            <td> <?php echo $estudiante['continua_3']; ?> </td>
            <td> <?php echo $estudiante['parcial_3']; ?> </td>
            <td class="esp_notaFinal"> <?php echo $estudiante['nota_final']; ?> </td>
            <td class="btns">
              <form method="post" action="view_form_editar_alumno.php">
                <input type="hidden" name="id" value="<?php echo $estudiante['id_alumno']; ?>">
                <input type="hidden" name="curso" value="<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Editar</button>
              </form>
              <form method="post" action="view_info_alumno.php" >
                <input type="hidden" name="id" value="ver_<?php echo $estudiante['id_alumno']; ?>">
                <input type="hidden" name="curso" value="ver_<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Ver</button>
              </form>
            </td>
          </tr>
        <?php 
          } 
        ?>
      </tbody>  
    </table>
  </div>
  <br><br>
  <h3>Datos del Curso</h3>
  <br>
  <div class="table-info-aula-ti">
  <table id="tablaUsuarios" class="tabla-notas">
    <tbody>
      <tr>
        <td>Estudiantes Aprobados</td>
        <td> <?php echo $numApr; ?> </td>
        <td> <?php echo $porcentApr . "%"; ?> </td>
      </tr>
      <tr>
        <td>Estudiantes Desaprobados</td>
        <td> <?php echo $numDesap; ?> </td>
        <td> <?php echo $porcentDesap . "%"; ?> </td>
      </tr>
      <tr>
        <td>Mayor Nota Aprobatoria(Final)</td>
        <td> <?php echo $notaMayor; ?> </td>
      </tr>
      <tr>
        <td>Menor Nota Aprobatoria(Final)</td>
        <td> <?php echo $notaMenor; ?> </td>
      </tr>
      <tr>
        <td>Nota Promedio(Final)</td>
        <td> <?php echo $notaProm; ?> </td>
      </tr>
    </tbody>
  </table>
  <br><br>
  <h2 class="titulo-notas">Estudiantes en peligro de desaprobar el curso (tomando como referencia notas de la primera fase)</h2>
  <table id="tablaUsuarios" class="tabla-notas">
    <thead>
      <tr>
        <th>Estudiante</th>
        <th>Nota</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Lupo Condori Avelino</td>
        <td> <?php echo "8"; ?> </td>
      </tr>
      <tr>
        <td>Zhong Callasi Linghai Joaquin</td>
        <td> <?php echo "9"; ?> </td>
      </tr>
    </tbody>  
  </table>
  </div>

<?php include('../templates/footer.php'); ?>