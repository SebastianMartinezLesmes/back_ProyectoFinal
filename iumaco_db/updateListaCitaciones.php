<?php
require 'conexion.php';

  $idCita = $_GET['newId'];
  $nuevaDecision = $_GET['newDecision'];

  $query = "UPDATE listaCitados SET decisionComite = '$nuevaDecision' WHERE idCitacion = $idCita";

  $resultado=mysqli_query($conn, $query);
  
  if ($resultado) {
    echo "1";
  }else{
    echo "2";
  }

?>
