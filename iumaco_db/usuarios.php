<?php
require 'conexion.php';

$query = "SELECT 
    lu.IdUsuario AS IdUsuario,
    lu.nombre AS nombre,
    lu.credenciales AS credenciales,
    lu.cargo As cargo,
    lu.correo AS correo,
    lu.ficha As ficha,
    fi.programa AS programa,
    lu.TI AS TI,
    lu.numeroTI AS numeroTI,
    lu.estado AS estado
    FROM usuarios lu
    INNER JOIN listaFichas fi ON lu.ficha = fi.idFicha";
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