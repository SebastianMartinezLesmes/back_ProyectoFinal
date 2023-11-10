<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $rawPostData = file_get_contents('php://input');
    $postData = json_decode($rawPostData, true);

    if ($postData && isset($postData["id"])) {
        $idToDelete = $postData["id"];

        if (!$conn) {
            die("Error en la conexión a la base de datos: " . mysqli_connect_error());
        }

        // Realiza la consulta SQL para eliminar el registro con el ID proporcionado
        $query = "DELETE FROM listaPeticiones WHERE id = $idToDelete";

        if (mysqli_query($conn, $query)) {
            echo "Registro eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conn);
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conn);
    } else {
        echo "Error: Datos no válidos.";
    }
}
?>
