<?php include('../templates/header.php'); ?>
<?php include('logic/notas.php') ?>
<?php include('logic/variables.php'); ?>
    
Formulario de edicion


<?php 
print_r($_POST);
echo "<h1>El curso es: $curso</h1>"; 


$id = isset($_POST['id']) ? $_POST['id'] : '';
$sql4 = "SELECT * FROM estudiantes WHERE  id_alumno=:id";
$consulta4 = $conexionDB->prepare($sql4);
$consulta4->bindParam(':id',$id);
$consulta4->execute();
$datos = $consulta4->fetch(PDO::FETCH_ASSOC);
// print_r($datos);


?>

<button class="btn-en-tabla" value="" onclick="location.href='view_notas.php'">Volver a tabla</button>

<div class="form-editar-alumno">
  <form action="view_actualizacion_exitosa.php" method="post">
    <span>Estudiante: <?php echo $datos['nombres_apellidos']; ?></span><br>
    <br><span>Primera Fase:</span><br>
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <span>Continua 1 </span>
    <input type="text" name="continua_1" id="continua_1" value="<?php echo $datos['continua_1'] ?>">
    <span>Parcial 1</span>
    <input type="text" name="parcial_1" id="parcial_1" value="<?php echo $datos['parcial_1'] ?>">
    <br><span>Segunda Fase: </span><br>
    <span>Continua 2 </span>
    <input type="text" name="continua_2" id="continua_2" value="<?php echo $datos['continua_2'] ?>">
    <span>Parcial 2 </span>
    <input type="text" name="parcial_2" id="parcial_2" value="<?php echo $datos['parcial_2'] ?>">
    <br><span>Tercera Fase:</span><br>
    <span>Continua 3 </span>
    <input type="text" name="continua_3" id="continua_3" value="<?php echo $datos['continua_3'] ?>">
    <span>Parcial 3</span>
    <input type="text" name="parcial_3" id="parcial_3" value="<?php echo $datos['parcial_3'] ?>">
    <br>
    <button type="submit" name="actualizar">Guardar Cambios</button>
  </form>
</div>
<br>

<?php include('../templates/footer.php'); ?>