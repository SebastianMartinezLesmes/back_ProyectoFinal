<?php
require 'conexion.php';

$query = "SELECT
    lc.id AS id,
    lc.estado AS estado,
    lc.nota AS nota,
    lc.instructorFK AS instructorFK,
    lc.linkEvidencias AS linkEvidencias,
    lc.accion AS accion, 
    lc.fecha AS fecha,
    lc.fechaPeticionInstructor AS fechaPeticionInstructor,

    ap.nombre AS aprendizFK

FROM listapeticiones lc
INNER JOIN usuarios ap ON lc.aprendizFK = ap.idUsuario";

if($is_query_run = mysqli_query($conn, $query)){
  $userData = [];
  while($query_executed = mysqli_fetch_assoc($is_query_run)){
    $userData[] =$query_executed;
  }
}
else{
  echo "Error in execution";
}

echo json_encode($userData);

?>