<?php
class dbUsuarios{
  //Atributos para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="usuarios";
  //Conector
  private $conexion;
  //Propiedades para controlar errores
  private $error=false;
  function __construct(){
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }
  //Funcion para ver si hay error en la conexion
  function hayError(){
    return $this->error;
  }

  //funcion para insertar datos en la tabla usuarios
  public function devolverUltimoUsuario(){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT * FROM usuario ORDER BY id DESC LIMIT 1");
      return $resultado;
    }else{
      return null;
    }
  }

  //funcion para insertar datos en la tabla usuarios
  public function devolverUsuarioId($id){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT * FROM usuario WHERE id=".$id);
      return $resultado;
    }else{
      return null;
    }
  }

  //funcion para insertar datos en la tabla usuarios
  public function insertarUsuario($nombre,$apellidos,$edad){
    if($this->error==false){
      $insert_sql="INSERT INTO usuario (id, nombre, apellidos, edad) VALUES (NULL,'".$nombre."', '".$apellidos."', ".$edad.")";
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló la insercion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  //funcion para actualizar usuarios
  public function actualizarUsuario($id,$nombre,$apellidos,$edad){
    if($this->error==false){
      $insert_sql="UPDATE usuario SET nombre='".$nombre."', apellidos='".$apellidos."', edad=".$edad." WHERE id=".$id;
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló la actualizacion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  //funcion para borrar usuarios
  public function borrarUsuario($id){
    if($this->error==false){
      $insert_sql="DELETE FROM usuario WHERE id=".$id;
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló el borrado del usuario: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
}
 ?>
