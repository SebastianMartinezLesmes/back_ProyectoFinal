<?php
require 'conexion.php';

$query = "SELECT lp.id, lp.estado, lp.nota, lp.linkEvidencias, ap.nombre AS aprendiz, ap.idUsuario AS idAprendiz, ap.ficha AS ficha, ins.nombre AS instructor, ins.idUsuario AS idInstructor, ins.correo AS correoInstructor, ap.correo AS correoAprendiz
FROM listapeticiones lp
INNER JOIN usuarios ap ON lp.aprendizFK = ap.idUsuario
INNER JOIN usuarios ins ON lp.instructorFK = ins.idUsuario";
if($is_query_run = mysqli_query($conn, $query)){
  $userData = [];
  while($query_executed = mysqli_fetch_assoc($is_query_run)){
    $userData[] = $query_executed;
  }
}
else{
  echo "Error in execution";
}

echo json_encode($userData);
