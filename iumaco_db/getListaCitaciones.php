<?php
require 'conexion.php';

$query = "SELECT
    lc.idCitacion AS idCita,
    ap.idUsuario AS idA,
    ap.nombre AS aprendiz,
    ap.TI AS tipoDocumento,
    ap.numeroTI AS numeroTI,
    fi.idFicha AS ficha,
    fi.jornada AS jornada,
    fi.programa AS programa,
    ap.correo AS correoAprendiz,
    ins.nombre AS instructor,
    ins.correo AS correoInstructor,
    lc.nota AS nota,
    lc.decisionComite AS decisionComite,
    lc.fechaCitacion AS fechaCitacion
FROM listaCitados lc
INNER JOIN listaFichas fi ON lc.ficha = fi.idFicha
INNER JOIN usuarios ap ON lc.aprendizFK = ap.idUsuario
INNER JOIN usuarios ins ON lc.instructorFK = ins.idUsuario";

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