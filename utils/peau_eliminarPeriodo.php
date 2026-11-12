<?php
include 'db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idSemestre = $_GET['idSemestre'];

    $sql = "DELETE FROM semestres WHERE idSemestre = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $idSemestre);

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
