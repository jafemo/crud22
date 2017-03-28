<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar la base de datos</title>
  </head>
  <body>
  <?php
  //Incluimos la conexion
  include "dbUsuarios.php";
  $user=new dbUsuarios();
  //Actualizamos el usuario
  $resultadoActualizar=$user->actualizarUsuario($_POST["id"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"]);
  //Y aqui lo devolvemos
  if($resultadoActualizar==true){
    $resultado=$user->devolverUsuarioId($_POST["id"]);
    $fila=$resultado->fetch_assoc();
    echo "id: ".$fila["id"]."</br>";
    echo "nombre: ".$fila["nombre"]."</br>";
    echo "apellidos: ".$fila["apellidos"]."</br>";
    echo "edad: ".$fila["edad"]."</br>";
    echo "<a href='actualizar.php?id=".$fila["id"]."&nombre=".$fila["nombre"]."&apellidos=".$fila["apellidos"]."&edad=".$fila["edad"]."'>Actualizar Registro</a>";
  }else{
    echo "Error en la insercion";
  }
  ?>
  </body>
</html>
