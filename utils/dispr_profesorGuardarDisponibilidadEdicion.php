<?php
include 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDisponibilidad = $_POST['idDisponibilidad'];
    $turno = $_POST['turno'];
    $horaInicio = $_POST['horaInicio'];
    $horaFin = $_POST['horaFin'];

    // Verifica que no haya campos vacíos
    if (empty($turno) || empty($horaInicio) || empty($horaFin)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Actualiza los datos en la tabla docenteDisponibilidad
    $sql = "UPDATE docenteDisponibilidad SET turno = ?, horaInicio = ?, horaFin = ? WHERE idDisponibilidad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $turno, $horaInicio, $horaFin, $idDisponibilidad);

    if ($stmt->execute()) {
        header("Location: ../templates/index_profesores.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
