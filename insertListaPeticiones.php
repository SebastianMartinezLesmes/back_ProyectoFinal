<?php
require 'conexion.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $rawPostData = file_get_contents('php://input');
    $postData = json_decode($rawPostData, true);

    if($postData){
        $nota = $postData["nota"];
        $aprendizFK = $postData["aprendizFK"];
        $instructorFK = $postData["instructorFK"];
        $linkEvidencias = $postData["linkEvidencias"];
    
        $query = "INSERT INTO listapeticiones (estado,nota,aprendizFK,instructorFK,linkEvidencias) VALUES ('activo','$nota',$aprendizFK,'$instructorFK','$linkEvidencias')";
    
        if(mysqli_query($conn, $query)){echo "Data inserted sucerfully";}
    }
}

?>