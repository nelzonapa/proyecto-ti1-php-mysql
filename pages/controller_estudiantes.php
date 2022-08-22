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

  public function getAllEstudiantesEpcc(){
    $consulta = "SELECT * FROM estudiantes_epcc";
    $res = $this->queryExecute($consulta);
    return $res;             
  }

  public function getInfoByEstudiante($idEst){
    $consulta = "SELECT * FROM estudiantes_epcc WHERE id_epcc=$idEst";
    $res = $this->queryExecute($consulta);
    $infoEst = $res[0];
    return $infoEst;  
  }
  
  public function getNombresCursos(){
    $consulta = "SELECT id_curso,nombre_curso FROM cursos";
    $res = $this->queryExecute($consulta);
    return $res; 
  }

  public function getInfoEstadoCursos($idEst){
    $consulta = "SELECT * FROM estado_completo WHERE id_est=$idEst";
    $res = $this->queryExecute($consulta);
    $infoCursos = $res[0];
    return $infoCursos; 
  }

  public function asignarEstadoByAbreviatura($abreviatura):string {
    if($abreviatura == "A"){
      return "APROBADO";
    } else if($abreviatura == "D") {
      return "DESAPROBADO";
    } else if($abreviatura == "NA") {
      return "NO APTO";
    } else if($abreviatura == "SA") {
      return "SI APTO";
    } 
  }

  public function getEstadisticasCursosByEstudiante($idEst) {
    $consulta = "SELECT estado_curso,COUNT(estado_curso) as 'cantidad'
                FROM(
                    SELECT C1 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst
                    UNION ALL
                    SELECT C2 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C3 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C4 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C5 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C6 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C7 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C8 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C9 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C10 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C11 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C12 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C13 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C14 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C15 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C16 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C17 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C18 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C19 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C20 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C21 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C22 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C23 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C24 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                    UNION ALL
                    SELECT C25 estado_curso FROM estado_completo WHERE estado_completo.id_est=$idEst 
                )T
                GROUP BY estado_curso";
    $res = $this->queryExecute($consulta);
    // $estadisctica = $res["cantidad"];
    return $res; 
  }
}



?>

