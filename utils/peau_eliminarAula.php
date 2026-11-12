<?php
include '../utils/db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idAula = $_GET['idAula'];

    $sql = "DELETE FROM aulas WHERE idAula = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $idAula);

        if ($stmt->execute()) {
            echo "Registro eliminado con éxito.";
            header("Location: ../templates/index_aulas.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método no permitido.";
}
?>
