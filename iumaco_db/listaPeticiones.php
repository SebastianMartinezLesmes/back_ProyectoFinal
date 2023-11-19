<?php
require 'conexion.php';

$query = "SELECT lp.accion AS accion, lp.fecha AS fechaAccion, fi.programa AS programa, fi.jornada AS jornada, lp.id, lp.estado, lp.nota, lp.linkEvidencias, ap.nombre AS aprendiz, ap.idUsuario AS idAprendiz, ap.TI AS tnA, ap.numeroTI AS numeroTIA, ap.correo AS correoAprendiz, ap.ficha AS fichaA, ins.nombre AS instructor, ins.idUsuario AS idInstructor, ins.correo AS correoInstructor, ins.numeroTI AS numeroTII, ins.ficha AS fichaI
FROM listapeticiones lp
INNER JOIN usuarios ap ON lp.aprendizFK = ap.idUsuario
INNER JOIN listaFichas fi ON ap.ficha = fi.idFicha
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
