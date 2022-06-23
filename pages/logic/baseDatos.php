<?php
class baseDEdatos{
  private $host;
  private $usuario;
  private $pass;
  private $db;
  private $conexion;

  function __construct($host,$usuario,$pass,$db){
    $this->host = $host;
    $this->usuario = $usuario;
    $this->pass = $pass;
    $this->db = $db;
  }

  function conectar(){
    $this->conexion = mysqli_connect($this->host,$this->usuario,$this->pass,$this->db);
    $this->conexion->set_charset("utf8");
    if(mysqli_connect_errno()){
      echo "Error al conectarse a la base de datos";
    }
  }

  function insAsistencia($asistencia,$id,$dia){
    mysqli_query($this->conexion,"UPDATE estudiantes SET $dia = ('".$asistencia."') WHERE id_alumno = $id");
    $error = mysqli_error($this->conexion);
    if(empty($error)){
      return true;
    }
    echo "Error al insertar cliente";
    return false;
  }

  function cerrar(){
    mysqli_close($this->conexion);
  }
}