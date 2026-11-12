<?php
include 'db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreSemestre = $_POST['nombreSemestre'];

    $sql = "INSERT INTO semestres (nombreSemestre) VALUES (?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nombreSemestre);

        if ($stmt->execute()) {
            echo "Registro guardado con éxito.";
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
