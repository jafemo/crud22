<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insertar Usuario</title>
  </head>
  <body>
  <?php
  //Incluir la conexion
  include "dbUsuarios.php";
  $user=new dbUsuarios();
  //insertar un usuario
  $resultadoInsert=$user->insertarUsuario($_POST["nombre"],$_POST["apellidos"],$_POST["edad"]);
  //Devolver el usuario insertado
  if($resultadoInsert==true){
    $resultado=$user->devolverUltimoUsuario();
    $fila=$resultado->fetch_assoc();
    echo "id: ".$fila["id"]."</br>";
    echo "nombre: ".$fila["nombre"]."</br>";
    echo "apellidos: ".$fila["apellidos"]."</br>";
    echo "edad: ".$fila["edad"]."</br>";
    echo "<a href='actualizar.php?id=".$fila["id"]."&nombre=".$fila["nombre"]."&apellidos=".$fila["apellidos"]."&edad=".$fila["edad"]."'>Actualizar Registro</a></br>";
    echo "<a href='borrar.php?id=".$fila["id"]."'>Borrar Registro</a>";
  }else{
    echo "Error en la insercion";
  }
  ?>
  </body>
</html>
