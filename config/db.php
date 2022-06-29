<?php

// /* It creates a singleton instance of a PDO connection to a MySQL database. */
class BaseDatos{
  public static $instancia = null;
  public static function crearInstancia(){
    if(!isset(self::$instancia)){ //si la instancia tiene algo?
      $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      self::$instancia = new PDO('mysql:host=localhost;dbname=historico_estudiantes_epcc','root','',$opciones);
      //echo "Conexion satisfactoria a la Base de Datos ...";
    }
    return self::$instancia;
  }
}

?>