<?php
include 'db_conexion.php';

if (isset($_GET['idDisponibilidad'])) {
    $idDisponibilidad = $_GET['idDisponibilidad'];

    // Elimina el registro de la tabla docenteDisponibilidad
    $sql = "DELETE FROM docenteDisponibilidad WHERE idDisponibilidad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idDisponibilidad);

    if ($stmt->execute()) {
        echo "Disponibilidad eliminada correctamente.";
        header("Location: ../templates/index_profesores.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
