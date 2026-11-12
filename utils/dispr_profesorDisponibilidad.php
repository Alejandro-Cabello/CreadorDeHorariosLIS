<?php
include '../utils/db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $numeroEmpleado = $_POST['numeroEmpleadoDisp'];
    $turno = $_POST['turno'];
    $horaInicio = $_POST['horaInicio'];
    $horaFin = $_POST['horaFin'];

    // Validar datos
    if (empty($numeroEmpleado) || empty($turno) || empty($horaInicio) || empty($horaFin)) {
        echo "Por favor, complete todos los campos.";
        exit;
    }

    // Insertar datos en la base de datos
    $sql = "INSERT INTO docenteDisponibilidad (numeroEmpleado, turno, horaInicio, horaFin) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $numeroEmpleado, $turno, $horaInicio, $horaFin);

    if ($stmt->execute()) {
        echo "Disponibilidad guardada exitosamente.";
        header("Location: ../templates/index_profesores.php");
        exit();
    } else {
        echo "Error al guardar la disponibilidad: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
