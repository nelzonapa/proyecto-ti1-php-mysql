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
//$nombre,$apellidos,$usuario,$password
  public function insertarNuevoUsuario($nombres,$apellidos,$usuario,$password){
    $resNumUsuarios = $this->queryExecute("SELECT COUNT(codigo) as 'cantidadUsua' FROM usuarios");
    $numUsuarios = $resNumUsuarios[0]['cantidadUsua'];
    $nuevoCodigo = $numUsuarios+1;
    
    $sql = "INSERT INTO `usuarios` (`codigo`, `usuario`, `password`, `nombres`, `apellidos`, `email`, `permiso`) VALUES ($nuevoCodigo, '$usuario', '$password', '$nombres', '$apellidos', '', '')";
    $query = $this->conexion->prepare($sql);
    $query->execute();
  }

}

?>

