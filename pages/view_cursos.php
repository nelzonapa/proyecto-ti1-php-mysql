<?php include('../templates/header.php'); ?>
<!-- /* Including the file `variables.php` in the current file. */ -->
<?php include('logic/variables.php'); ?>
Elegir curso

<div class="container-cursos">
  <form action="view_notas.php" method="post">
    <button id="boton1" name="botonCurso" class="boton" type="submit" value="ti1" >Trabajo Interdisciplinar 1</button>
    <button id="boton2" name="botonCurso" class="boton" type="submit" value="dbp" >Desarrollo Basado en Plataformas</button>
    <button id="boton3" name="botonCurso" class="boton" type="submit" value="cc2" >Ciencia de la Computacion II</button>
    <button id="boton4" name="botonCurso" class="boton" type="submit" value="aqc" >Arquitectura de Computadores</button>
    <button id="boton5" name="botonCurso" class="boton" type="submit" value="itp3" >Ingles Tecnico Profesional III</button>
    <button id="boton6" name="botonCurso" class="boton" type="submit" value="cei" >Ciudadania e Inteculturalidad</button>
    <button id="boton7" name="botonCurso" class="boton" type="submit" value="cvv" >Calculo en Varias Variables</button>
  </form>
</div>

<?php include('../templates/footer.php'); ?>
