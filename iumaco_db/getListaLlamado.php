<?php
require 'conexion.php';

$query = "SELECT
    lc.idLlamadoAtencion AS idLlamadoAtencion,
    lc.ficha AS ficha,
    lc.nota AS nota,
    lc.instructorFK AS instructorFK,
    lc.fecha AS fecha,

    ap.nombre AS aprendizFK

FROM listallamadoatencion lc
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