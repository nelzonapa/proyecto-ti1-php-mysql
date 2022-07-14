<?php include('../templates/view_cursos_header.php'); ?>
<?php include('logic/cursos.php') ?>
  
<?php 
  // print_r($listaDeEstudiantes); 
  //print_r($apellidos_nombres_TrabInter);
?>
<section class="all">
<h1>Tabla de notas</h1>
<!-- botones -->
<h2 class="titulo-notas">Estudiantes Registrados</h2>
<h3>Asignatura: <?php echo $cursoElegido; ?></h3>
<button class="btn_pdf"><a class="a_name" href="logic/registroNotas.php" target="_blank" >Descargar Registro</a> </button>
    <a class="btn_pdf" href="#f1" >Ver Primera Fase</a>
    <a class="btn_pdf" href="#f2" >Ver Segunda Fase</a>
    <a class="btn_pdf" href="#f3" >Ver Tercera Fase</a>
    <a class="btn_pdf" href="#finales">Ver Notas Finales</a>
    <a class="btn_pdf" href="#estadisticas">Ver Estadisticas del curso</a>
    <br>
    <a class="btn_pdf" href="#graf1">Ver grafico 1</a>
    <a class="btn_pdf" href="#graf2">Ver grafico 2</a>
    <a class="btn_pdf" href="#graf3">Ver grafico 3</a>
    <a class="btn_pdf" href="#graf4">Ver grafico 4</a>
    <a class="btn_pdf" href="#graf5">Ver grafico 5</a>
    <a class="btn_pdf" href="#graf6">Ver grafico 6</a>
    <a class="btn_pdf" href="#graf7">Ver grafico 7</a>
    <br><br>

  <div cslass="table-container-notas">
    <h2 class="subtitulo" id="f1">Primera Fase</h2>
    <table id="tablaUsuarios1F" class="tabla">
      <thead>
        <tr>
          <th>ID</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Trabajo 1</th>
          <th>Trabajo 2</th>
          <th>Trabajo 3</th>
          <th>Trabajo 4</th>
          <th>Trabajo 5</th>
          <th>Trabajo 6</th>
          <th>Continua 1</th>
          <th>Parcial 1</th>
          <th>Operacion</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        <?php foreach($notas_TrabInter as $nota){ ?>
          <tr class="espacios-tabla">
            <td> <?php echo $nota['id_est']; ?> </td>
            <td> <?php echo $apellidos_nombres_TrabInter[$i]['apellidos']; ?> </td>
            <td> <?php echo $apellidos_nombres_TrabInter[$i]['nombres']; ?> </td>
            <td> <?php echo $nota['trabajo_1_c1']; ?> </td>
            <td> <?php echo $nota['trabajo_2_c1']; ?> </td>
            <td> <?php echo $nota['trabajo_3_c1']; ?> </td>
            <td> <?php echo $nota['trabajo_4_c1']; ?> </td>
            <td> <?php echo $nota['trabajo_5_c1']; ?> </td>
            <td> <?php echo $nota['trabajo_6_c1']; ?> </td>
            <td> <?php echo round($nota['continua_1']); ?> </td>
            <td> <?php echo $nota['parcial_1']; ?> </td>
            <td class="btns">
              <form method="post" action="view_form_editar_alumno.php">
                <input type="hidden" name="id" value="<?php echo $nota['id_est']; ?>">
                <input type="hidden" name="curso" value="<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Editar</button>
              </form>
              <form method="post" action="view_info_alumno.php" >
                <input type="hidden" name="id" value="<?php echo $nota['id_est']; ?>">
                <input type="hidden" name="curso" value="<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Ver</button>
              </form>
            </td>
          </tr>
        <?php 
            $i++;
          } 
        ?>
      </tbody>  
    </table>
    <h2 class="subtitulo" id="f2">Segunda Fase</h2>
    <table id="tablaUsuarios2F" class="tabla">
      <thead>
        <tr>
          <th>ID</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Trabajo 1</th>
          <th>Trabajo 2</th>
          <th>Trabajo 3</th>
          <th>Trabajo 4</th>
          <th>Trabajo 5</th>
          <th>Trabajo 6</th>
          <th>Continua 2</th>
          <th>Parcial 2</th>
          <th>Operacion</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        <?php foreach($notas_TrabInter as $nota){ ?>
          <tr class="espacios-tabla">
            <td> <?php echo $nota['id_est']; ?> </td>
            <td> <?php echo $apellidos_nombres_TrabInter[$i]['apellidos']; ?> </td>
            <td> <?php echo $apellidos_nombres_TrabInter[$i]['nombres']; ?> </td>
            <td> <?php echo $nota['trabajo_1_c2']; ?> </td>
            <td> <?php echo $nota['trabajo_2_c2']; ?> </td>
            <td> <?php echo $nota['trabajo_3_c2']; ?> </td>
            <td> <?php echo $nota['trabajo_4_c2']; ?> </td>
            <td> <?php echo $nota['trabajo_5_c2']; ?> </td>
            <td> <?php echo $nota['trabajo_6_c2']; ?> </td>
            <td> <?php echo round($nota['continua_2']); ?> </td>
            <td> <?php echo $nota['parcial_2']; ?> </td>
            <td class="btns">
              <form method="post" action="view_form_editar_alumno.php">
                <input type="hidden" name="id" value="<?php echo $nota['id_est']; ?>">
                <input type="hidden" name="curso" value="<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Editar</button>
              </form>
              <form method="post" action="view_info_alumno.php" >
                <input type="hidden" name="id" value="<?php echo $nota['id_est']; ?>">
                <input type="hidden" name="curso" value="<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Ver</button>
              </form>
            </td>
          </tr>
        <?php 
            $i++;
          } 
        ?>
      </tbody>  
    </table>
    <h2 class="subtitulo" id="f3">Tercera Fase</h2>
    <table id="tablaUsuarios3F" class="tabla">
      <thead>
        <tr>
          <th>ID</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Trabajo 1</th>
          <th>Trabajo 2</th>
          <th>Trabajo 3</th>
          <th>Trabajo 4</th>
          <th>Trabajo 5</th>
          <th>Trabajo 6</th>
          <th>Continua 3</th>
          <th>Parcial 3</th>
          <th>Operacion</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        <?php foreach($notas_TrabInter as $nota){ ?>
          <tr class="espacios-tabla">
            <td> <?php echo $nota['id_est']; ?> </td>
            <td> <?php echo $apellidos_nombres_TrabInter[$i]['apellidos']; ?> </td>
            <td> <?php echo $apellidos_nombres_TrabInter[$i]['nombres']; ?> </td>
            <td> <?php echo $nota['trabajo_1_c3']; ?> </td>
            <td> <?php echo $nota['trabajo_2_c3']; ?> </td>
            <td> <?php echo $nota['trabajo_3_c3']; ?> </td>
            <td> <?php echo $nota['trabajo_4_c3']; ?> </td>
            <td> <?php echo $nota['trabajo_5_c3']; ?> </td>
            <td> <?php echo $nota['trabajo_6_c3']; ?> </td>
            <td> <?php echo round($nota['continua_3']); ?> </td>
            <td> <?php echo $nota['parcial_3']; ?> </td>
            <td class="btns">
              <form method="post" action="view_form_editar_alumno.php">
                <input type="hidden" name="id" value="<?php echo $nota['id_est']; ?>">
                <input type="hidden" name="curso" value="<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Editar</button>
              </form>
              <form method="post" action="view_info_alumno.php" >
                <input type="hidden" name="id" value="ver_<?php echo $nota['id_est']; ?>">
                <input type="hidden" name="curso" value="ver_<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Ver</button>
              </form>
            </td>
          </tr>
        <?php 
            $i++;
          } 
        ?>
      </tbody>  
    </table>
    <h2 class="subtitulo" id="finales">Libreta de Notas</h2>
    <table id="tablaUsuariosNotasFinales" class="tabla">
      <thead>
        <tr>
          <th>ID</th>
          <th>Apellidos</th>
          <th>Nombres</th>
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
        <?php $i=0; ?>
        <?php foreach($notas_TrabInter as $nota){ ?>
          <tr class="espacios-tabla">
            <td> <?php echo $nota['id_est']; ?> </td>
            <td> <?php echo $apellidos_nombres_TrabInter[$i]['apellidos']; ?> </td>
            <td> <?php echo $apellidos_nombres_TrabInter[$i]['nombres']; ?> </td>
            <td> <?php echo round($nota['continua_1'],2); ?> </td>
            <td> <?php echo round($nota['parcial_1'],2); ?> </td>
            <td> <?php echo round($nota['continua_2'],2); ?> </td>
            <td> <?php echo round($nota['parcial_2'],2); ?> </td>
            <td> <?php echo round($nota['continua_3'],2); ?> </td>
            <td> <?php echo round($nota['parcial_3'],2); ?> </td>
            <td class="esp_notaFinal"> <?php echo round($nota['nota_final'],2); ?> </td>
            <td class="btns">
              <form method="post" action="view_form_editar_alumno.php">
                <input type="hidden" name="id" value="<?php echo $nota['id_est']; ?>">
                <input type="hidden" name="curso" value="<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Editar</button>
              </form>
              <form method="post" action="view_info_alumno.php" >
                <input type="hidden" name="id" value="<?php echo $nota['id_est']; ?>">
                <input type="hidden" name="curso" value="<?php echo $cursoElegido; ?>">
                <button class="btn-en-tabla" type="submit">Ver</button>
              </form>
            </td>
          </tr>
        <?php 
            $i++;
          } 
        ?>
      </tbody>  
    </table>
  </div>
  <br><br>
  <h3 id="estadisticas">Datos Generales del Curso</h3>
  <br>
  <div class="table-info-aula-ti">
  <table id="tablaUsuarios" class="tabla izq">
    <tbody>
      <tr>
        <td><b>Estudiantes Aprobados</b></td>
        <td> <?php echo $numApr; ?> </td>
        <td> <?php echo $porcentApr . "%"; ?> </td>
      </tr>
      <tr>
        <td><b>Estudiantes Desaprobados</b></td>
        <td> <?php echo $numDesap; ?> </td>
        <td> <?php echo $porcentDesap . "%"; ?> </td>
      </tr>
    </tbody>
  </table>
  <br><br>
  <table class="tabla izq">
    <thead>
      <tr>
        <th><b>Criterio</b></th>
        <th><b>Estudiante</b></th>
        <th><b>Nota</b></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Mayor Nota Aprobatoria(Continua 1)</td>
        <td> <?php echo $maxima_nota_c1[0]["apellidos"].$maxima_nota_c1[0]['nombres']; ?> </td>
        <td> <?php echo round($maxima_nota_c1[0]["maxim"]); ?> </td>
      </tr>
      <tr>
        <td>Menor Nota Aprobatoria(Continua 1)</td>
        <td> <?php echo $minima_nota_c1[0]["apellidos"].$minima_nota_c1[0]['nombres']; ?> </td>
        <td> <?php echo round($minima_nota_c1[0]["minim"],2); ?> </td>
      </tr>
      <tr>
        <td>Mayor Nota Aprobatoria(Parcial 1)</td>
        <td> <?php echo $maxima_nota_p1[0]["apellidos"].$maxima_nota_p1[0]['nombres']; ?> </td>
        <td> <?php echo round($maxima_nota_p1[0]["maxim"],2); ?> </td>
      </tr>
      <tr>
        <td>Menor Nota Aprobatoria(Parcial 1)</td>
        <td> <?php echo $minima_nota_p1[0]["apellidos"].$minima_nota_p1[0]['nombres']; ?> </td>
        <td> <?php echo round($minima_nota_p1[0]["minim"],2); ?> </td>
      </tr>
      <tr>
        <td>Mayor Nota Aprobatoria(Continua 2)</td>
        <td> <?php echo $maxima_nota_c2[0]["apellidos"].$maxima_nota_c3[0]['nombres']; ?> </td>
        <td> <?php echo round($maxima_nota_c2[0]["maxim"],2); ?> </td>
      </tr>
      <tr>
        <td>Menor Nota Aprobatoria(Continua 2)</td>
        <td> <?php echo $minima_nota_c2[0]["apellidos"].$minima_nota_c2[0]['nombres']; ?> </td>
        <td> <?php echo round($minima_nota_c2[0]["minim"],2); ?> </td>
      </tr>
      <tr>
        <td>Mayor Nota Aprobatoria(Parcial 2)</td>
        <td> <?php echo $maxima_nota_p2[0]["apellidos"].$maxima_nota_p2[0]['nombres']; ?> </td>
        <td> <?php echo round($maxima_nota_p2[0]["maxim"],2); ?> </td>
      </tr>
      <tr>
        <td>Menor Nota Aprobatoria(Parcial 2)</td>
        <td> <?php echo $minima_nota_p2[0]["apellidos"].$minima_nota_p2[0]['nombres']; ?> </td>
        <td> <?php echo round($minima_nota_p2[0]["minim"],2); ?> </td>
      </tr>
      <tr>
        <td>Mayor Nota Aprobatoria(Continua 3)</td>
        <td> <?php echo $maxima_nota_c3[0]["apellidos"].$maxima_nota_c3[0]['nombres']; ?> </td>
        <td> <?php echo round($maxima_nota_c3[0]["maxim"],2); ?> </td>
      </tr>
      <tr>
        <td>Menor Nota Aprobatoria(Continua 3)</td>
        <td> <?php echo $minima_nota_c3[0]["apellidos"].$minima_nota_c3[0]['nombres']; ?> </td>
        <td> <?php echo round($minima_nota_c3[0]["minim"],2); ?> </td>
      </tr>
      <tr>
        <td>Mayor Nota Aprobatoria(Parcial 3)</td>
        <td> <?php echo $maxima_nota_p3[0]["apellidos"].$maxima_nota_p3[0]['nombres']; ?> </td>
        <td> <?php echo round($maxima_nota_p3[0]["maxim"],2); ?> </td>
      </tr>
      <tr>
        <td>Menor Nota Aprobatoria(Parcial 3)</td>
        <td> <?php echo $minima_nota_p3[0]["apellidos"].$minima_nota_p3[0]['nombres']; ?> </td>
        <td> <?php echo round($minima_nota_p3[0]["minim"],2); ?> </td>
      </tr>
      <tr>
        <td>Mayor Nota Aprobatoria(Final)</td>
        <td> <?php echo $maxima_nota_info[0]["apellidos"].$maxima_nota_info[0]['nombres']; ?> </td>
        <td> <?php echo round($maxima_nota_info[0]["maxim"],2); ?> </td>
      </tr>
      <tr>
        <td>Menor Nota Aprobatoria(Final)</td>
        <td> <?php echo $min_nota_info[0]["apellidos"].$min_nota_info[0]['nombres']; ?> </td>
        <td> <?php echo round($min_nota_info[0]["minim"],2); ?> </td>
      </tr>
    </tbody>
  </table>
  <br><br>
  <table class="tabla izq">
    <thead>
      <th>Tipo de Promedio</th>
      <th>Nota del Aula</th>
    </thead>
    <tbody>
      <tr>
        <td>Promedio del Aula (Continua 1)</td>
        <td class="nota_td"> <?php echo round($promedioAula_notaContinua1[0]['nota'],2); ?> </td>
      </tr>
      <tr>
        <td>Promedio del Aula (Parcial 1)</td>
        <td class="nota_td"> <?php echo round($promedioAula_notaParcial1[0]['nota'],2); ?> </td>
      </tr>
      <tr>
        <td>Promedio del Aula (Continua 2)</td>
        <td class="nota_td"> <?php echo round($promedioAula_notaContinua2[0]['nota'],2); ?> </td>
      </tr>
      <tr>
        <td>Promedio del Aula (Parcial 2)</td>
        <td class="nota_td"> <?php echo round($promedioAula_notaParcial2[0]['nota'],2); ?> </td>
      </tr>
      <tr>
        <td>Promedio del Aula (Continua 3)</td>
        <td class="nota_td"> <?php echo round($promedioAula_notaContinua3[0]['nota'],2); ?> </td>
      </tr>
      <tr>
        <td>Promedio del Aula (Parcial 3)</td>
        <td class="nota_td"> <?php echo round($promedioAula_notaParcial3[0]['nota'],2); ?> </td>
      </tr>
      <tr>
        <td>Promedio del Aula (Final)</td>
        <td class="nota_td"> <?php echo round($promedioAula_notaFinal[0]['nota'],2); ?> </td>
      </tr>
    </tbody>
  </table>
  <br><br>
  <h3 class="subtitulo">Estudiantes en peligro de desaprobar el curso (tomando como referencia notas de la primera fase)</h3>
  <table id="tablaUsuarios" class="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Continua 1</th>
        <th>Parcial 1</th>
        <th>Continua 2</th>
        <th>Parcial 2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php foreach($peligro as $estudiante){ ?>
        <td> <?php echo $estudiante['id_est']; ?> </td>
        <td class="names"> <?php echo $estudiante['apellidos']; ?> </td>
        <td class="names"> <?php echo $estudiante['nombres']; ?> </td>
        <td class="names"> <?php echo round($estudiante['continua_1'],2); ?> </td>
        <td class="names"> <?php echo $estudiante['parcial_1']; ?> </td>
        <td class="names"> <?php echo round($estudiante['continua_2'],2); ?> </td>
        <td class="names"> <?php echo $estudiante['parcial_2']; ?> </td>
      </tr>
          <?php } ?>
    </tbody>
  </table>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <script src="../js/graficos.js"></script>

  <?php for($i=1; $i<=7; $i++){ ?>
    <br><br>
    <div class="graficos">
      <h2 class="subtitulo" id="graf<?php echo $i; ?>">Grafica <?php echo $i; ?> : Aprobados y Desaprobados segun <?php echo $arrayTitulosNotas[$i]; ?></h2>
      <div class="graficos">
        <canvas id="myChart<?php echo $i; ?>" width="100" height="60"></canvas>
        <button onclick="Descargar('myChart<?php echo $i; ?>')">Download</button>
        <!-- <button href="myChart<?php echo $i; ?>.toDataURL('image/png');" download>Download</button> -->
      </div>
    </div>
    <br><br>
  <?php } ?>
  
  <br>


<script>
  const ctx1 = document.getElementById('myChart1').getContext('2d');
  const ctx2 = document.getElementById('myChart2').getContext('2d');
  const ctx3 = document.getElementById('myChart3').getContext('2d');
  const ctx4 = document.getElementById('myChart4').getContext('2d');
  const ctx5 = document.getElementById('myChart5').getContext('2d');
  const ctx6 = document.getElementById('myChart6').getContext('2d');
  const ctx7 = document.getElementById('myChart7').getContext('2d');
  var myChart1 = new Chart(ctx1, {
    type: 'pie',
    data: {
      labels: ['Aprobados', 'Desaprobados'],
      datasets: [{
        label: 'Cantidad de Estudiantes',
        backgroundColor: [
          "rgb(155, 40, 154)",
          "rgb(150, 100, 50)"
        ],
        data: [<?php echo $numAprc1.",".$numDesapc1; ?>],
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

  var myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: ['Aprobados', 'Desaprobados'],
      datasets: [{
        label: 'Cantidad de Estudiantes',
        backgroundColor: [
          "rgb(60, 240, 154)",
          "rgb(150, 100, 50)"
        ],
        data: [<?php echo $numAprp1.",".$numDesapp1; ?>],
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

  var myChart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
      labels: ['Aprobados', 'Desaprobados'],
      datasets: [{
        label: 'Cantidad de Estudiantes',
        backgroundColor: [
          "rgb(60, 190, 154)",
          "rgb(0, 100, 50)"
        ],
        data: [<?php echo $numAprc2.",".$numDesapc2; ?>],
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

  var myChart4 = new Chart(ctx4, {
    type: 'pie',
    data: {
      labels: ['Aprobados', 'Desaprobados'],
      datasets: [{
        label: 'Cantidad de Estudiantes',
        backgroundColor: [
          "rgb(100, 190, 30)",
          "rgb(0, 100, 50)"
        ],
        data: [<?php echo $numAprp2.",".$numDesapp2; ?>],
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

  var myChart5 = new Chart(ctx5, {
    type: 'pie',
    data: {
      labels: ['Aprobados', 'Desaprobados'],
      datasets: [{
        label: 'Cantidad de Estudiantes',
        backgroundColor: [
          "rgb(60, 122, 154)",
          "rgb(15, 0, 180)"
        ],
        data: [<?php echo $numAprc3.",".$numDesapc3; ?>],
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

  var myChart6 = new Chart(ctx6, {
    type: 'pie',
    data: {
      labels: ['Aprobados', 'Desaprobados'],
      datasets: [{
        label: 'Cantidad de Estudiantes',
        backgroundColor: [
          "rgb(60, 70, 45)",
          "rgb(15, 0, 180)"
        ],
        data: [<?php echo $numAprp3.",".$numDesapp3; ?>],
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
  ///////////////////////////////////////////////////

  var myChart7 = new Chart(ctx7, {
    type: 'pie',
    data: {
      labels: ['Aprobados', 'Desaprobados'],
      datasets: [{
        label: 'Cantidad de Estudiantes',
        backgroundColor: [
          "rgb(200, 60, 0)",
          "rgb(150, 100, 50)"
        ],
        data: [<?php echo $numApr.",".$numDesap; ?>],
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
</script>


<br><br>

  </div>

</section>

<?php include('../templates/view_asistencia_footer.php'); ?>