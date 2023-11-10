<?php
require 'conexion.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $rawPostData = file_get_contents('php://input');
    $postData = json_decode($rawPostData, true);

    if($postData){
        $nota = $postData["nota"];
        $aprendizFK = $postData["aprendizFK"];
        $instructorFK = $postData["instructorFK"];
        $ficha = $postData["ficha"];
        $fechaCitacion = $postData["fechaCitacion"];

        $query = "INSERT INTO listaCitados (aprendizFK, ficha, instructorFK, nota, fechaCitacion) VALUES ($aprendizFK,$ficha,$instructorFK,'$nota','$fechaCitacion')";

        if(mysqli_query($conn, $query)){echo "Data inserted sucerfully";}
    }
}

?>