<html>
  <head>
    <meta charset="utf-8">
    <title>Documento para borrar un usuario</title>
  </head>
  <body>
  <?php
  //Incluir la conexion
  include "dbUsuarios.php";
  $user=new dbUsuarios();
  //insertar un usuario
  $resultadoBorrar=$user->borrarUsuario($_GET["id"]);
  //Devolvemos el usuario borrado
  if($resultadoBorrar==true){
    echo "Registro ".$_GET["id"]." borrado";
  }else{
    echo "Error al borrar usuario";
  }
  ?>
  </body>
</html>
