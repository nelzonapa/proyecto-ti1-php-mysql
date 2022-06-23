<?php include('../templates/header.php'); ?>
<?php include('logic/notas.php') ?>

<?php

$id = isset($_POST['id'])?$_POST['id']:'';
$c1 = isset($_POST['continua_1']) ? $_POST['continua_1'] : '';
$c2 = isset($_POST['continua_2']) ? $_POST['continua_2'] : '';
$c3 = isset($_POST['continua_3']) ? $_POST['continua_3'] : '';
$p1 = isset($_POST['parcial_1']) ? $_POST['parcial_1'] : '';
$p2 = isset($_POST['parcial_2']) ? $_POST['parcial_2'] : '';
$p3 = isset($_POST['parcial_3']) ? $_POST['parcial_3'] : '';

print_r($_POST);


$sql5 = "UPDATE `estudiantes` 
        SET continua_1=:c1, continua_2=:c2, continua_3=:c3, parcial_1=:p1, parcial_2=:p2,parcial_3=:p3
        WHERE id_alumno=:id";
$consulta5 = $conexionDB->prepare($sql5);
$consulta5->bindParam(':id',$id);
$consulta5->bindParam(':c1',$c1);
$consulta5->bindParam(':c2',$c2);
$consulta5->bindParam(':c3',$c3);
$consulta5->bindParam(':p1',$p1);
$consulta5->bindParam(':p2',$p2);
$consulta5->bindParam(':p3',$p3);

$consulta5->execute();

?>

<span>Actualizacion de Datos del Estudiante realizada con exito</span>
<button class="btn-regresar" onclick="location.href='view_cursos.php'">Volver a cursos</button>

<?php include('../templates/footer.php'); ?>