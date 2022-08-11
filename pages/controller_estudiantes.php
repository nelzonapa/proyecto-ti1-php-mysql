<?php
//SELECT id_est, apellidos, nombres FROM `estudiantes_2`;
//unir tablas
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
}



?>

