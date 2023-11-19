<?php
require 'conexion.php';

$ficha = $_GET['ficha'];
$aprendizFK = $_GET['aprendizFK'];
$instructorFK = $_GET['instructorFK'];
$nota = $_GET['nota'];

// Use prepared statements to avoid SQL injection
$query = "INSERT INTO listafelicitaciones (ficha, aprendizFK, instructorFK, nota, fecha) VALUES (?, ?, ?, ?, NOW())";
$stmt = mysqli_prepare($conn, $query);

// Check if the statement was prepared successfully
if ($stmt) {
    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "iiis", $ficha, $aprendizFK, $instructorFK, $nota);
    if (mysqli_stmt_execute($stmt)) {
        echo "1";
    } else {
        echo "2";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "2";
}

// Close the database connection
mysqli_close($conn);
?>
