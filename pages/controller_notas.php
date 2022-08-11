<?php
class Conexion{
  protected $host;
  protected $db;
  protected $usuario;
  protected $password;
  protected $conexion;

  public function __construct(){
    $this->host = "localhost";
    $this->db = "sistemaasistencia";
    $this->usuario = "root";
    $this->password = "";
    try {
      $this->conexion = new PDO ("mysql:host=".$this->host."; dbname=".$this->db,$this->usuario,$this->password);
      $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $this->conexion->exec("SET NAMES utf8");
    } catch (Exception $e) {
      echo "Error al conectar con la base de datos: Linea => ". $e->getLine();
    }
  }
  public function queryExecute($sql){
    $query = $this->conexion->prepare($sql);
    $query->execute();
    $res = $query->fetchAll();
    return $res;
  }
  public function getEstudiantes($curso){ //ti
    $consulta = "SELECT notas_"."$curso".".*, estudiantes_"."$curso".".apellidos, estudiantes_"."$curso".".nombres
                  FROM notas_"."$curso"."
                  INNER JOIN estudiantes_"."$curso"."
                  ON notas_"."$curso".".id_est
                  WHERE estudiantes_"."$curso".".id_est=notas_"."$curso".".id_est;";
                  //print_r($consulta);
    $listaDeEstudiantes = $this->queryExecute($consulta);
    return $listaDeEstudiantes; 
  }
  public function getTotalEstudiantes($curso){
    $consulta = "SELECT COUNT(id_est) as 'cantidadEst' FROM estudiantes_$curso";
    $num = $this->queryExecute($consulta);
    $res = $num[0]['cantidadEst'];
    return $res;
  }
  public function get_Id_Nombre_Cursos(){
    $consulta = "SELECT id_curso,nombre_curso FROM cursos";
    $res = $this->queryExecute($consulta);
    return $res;
  }
  public function numAprobados($curso,$tipoDeNota){
    $consulta = "SELECT COUNT(id_est) as 'CantAprobados' FROM notas_".$curso." WHERE $tipoDeNota>=10.5";
    $cantApr = $this->queryExecute($consulta);
    $res = $cantApr[0]['CantAprobados'];
    return $res;
  }
  public function numDesaprobados($curso,$tipoDeNota){
    $consulta = "SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas_".$curso." WHERE $tipoDeNota<10.5";
    $cantApr = $this->queryExecute($consulta);
    $res = $cantApr[0]['CantDesaprobados'];
    return $res;
  }
  public function getPromedioNota($curso,$tipoDeNota){
    $consulta = "SELECT AVG(".$tipoDeNota.") as 'nota' FROM notas_".$curso;
    $promedio = $this->queryExecute($consulta);
    $res = $promedio[0]['nota'];
    return $res;
  }
  public function getMaximaNota($curso,$tipoDeNota){
    $consulta = "SELECT notas_$curso.id_est, estudiantes_$curso.nombres, estudiantes_$curso.apellidos, notas_$curso.$tipoDeNota as 'maxim'
                FROM notas_$curso
                INNER JOIN estudiantes_$curso
                ON notas_$curso.id_est -- Mientras el id_est exista
                WHERE notas_$curso.$tipoDeNota=
                (SELECT MAX(notas_$curso.$tipoDeNota) FROM notas_$curso) AND estudiantes_$curso.id_est=notas_$curso.id_est";
    $res = $this->queryExecute($consulta);
    return $res;
  }
  public function getMinimaNota($curso,$tipoDeNota){
    $consulta = "SELECT notas_$curso.id_est, estudiantes_$curso.nombres, estudiantes_$curso.apellidos, notas_$curso.$tipoDeNota as 'minim'
                FROM notas_$curso
                INNER JOIN estudiantes_$curso
                ON notas_$curso.id_est -- Mientras el id_est exista
                WHERE notas_$curso.$tipoDeNota=
                (SELECT MIN(notas_$curso.$tipoDeNota) FROM notas_$curso) AND estudiantes_$curso.id_est=notas_$curso.id_est";
    $res = $this->queryExecute($consulta);
    return $res;
  }
  public function getEstudiantesEnPeligro($idcurso){
    $consulta = "SELECT notas_$idcurso.id_est, estudiantes_$idcurso.apellidos, estudiantes_$idcurso.nombres, 
                notas_$idcurso.continua_1, notas_$idcurso.parcial_1, notas_$idcurso.continua_2, notas_$idcurso.parcial_2, 
                notas_$idcurso.med_peligro as 'peligro'
                FROM notas_$idcurso
                INNER JOIN estudiantes_$idcurso
                ON notas_$idcurso.id_est -- Mientras el id_est exista
                WHERE notas_$idcurso.med_peligro='M' AND estudiantes_$idcurso.id_est=notas_$idcurso.id_est;";
    $res = $this->queryExecute($consulta);
    return $res;
  }

  public function actualizarPeligro($idcurso,$cantidadEstudiantes){
    for ($i=1; $i<=$cantidadEstudiantes; $i++){
      $consulta1 = "UPDATE notas_$idcurso 
                INNER JOIN cursos 
                ON notas_$idcurso.id_est 
                SET notas_$idcurso.med_peligro='M' -- MALO 
                WHERE notas_$idcurso.id_est=$i 
                AND cursos.id_curso=$idcurso -- ALERTA CON ESTE NUMEROOOOOOOOOOOOOOO 
                AND ((notas_$idcurso.continua_1*cursos.porcentaje_c1)+(notas_$idcurso.continua_2*cursos.porcentaje_c2)+(notas_$idcurso.parcial_1*cursos.porcentaje_p1)+(notas_$idcurso.parcial_2*cursos.porcentaje_p2))<4.8"; 
      $query = $this->conexion->prepare($consulta1);
      $query->execute();

      $consulta2 = "UPDATE notas_$idcurso 
                  INNER JOIN cursos 
                  ON notas_$idcurso.id_est 
                  SET notas_$idcurso.med_peligro='B' -- MALO 
                  WHERE notas_$idcurso.id_est=$i 
                  AND cursos.id_curso=$idcurso -- ALERTA CON ESTE NUMEROOOOOOOOOOOOOOO 
                  AND ((notas_$idcurso.continua_1*cursos.porcentaje_c1)+(notas_$idcurso.continua_2*cursos.porcentaje_c2)+(notas_$idcurso.parcial_1*cursos.porcentaje_p1)+(notas_$idcurso.parcial_2*cursos.porcentaje_p2))>=4.8"; 
      $query = $this->conexion->prepare($consulta2);
      $query->execute();
    }
  }
  public function getNotasByEstudiante($idcurso,$id){
    $consulta = "SELECT * FROM notas_$idcurso WHERE id_est=$id";
    $res = $this->queryExecute($consulta);
    $notas = $res[0];
    return $notas;
  }
};


?>
