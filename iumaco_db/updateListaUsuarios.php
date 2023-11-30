<?php
require 'conexion.php';

  $idUser = $_GET['newId'];

  $query = "UPDATE usuarios SET estado = 'inactivo' WHERE idUsuario = '$idUser'";

  $resultado=mysqli_query($conn, $query);
  
  if ($resultado) {
    echo "1";
  }else{
    echo "2";
  }

?>
