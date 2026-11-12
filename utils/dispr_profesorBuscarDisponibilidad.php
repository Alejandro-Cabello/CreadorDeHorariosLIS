<?php
include 'db_conexion.php';

if (isset($_GET['idDisponibilidad'])) {
    $idDisponibilidad = $_GET['idDisponibilidad'];

    $sql = "SELECT dd.idDisponibilidad, dd.numeroEmpleado, d.nombreCompleto, dd.turno, dd.horaInicio, dd.horaFin
            FROM docenteDisponibilidad dd
            JOIN docente d ON dd.numeroEmpleado = d.numeroEmpleado
            WHERE dd.idDisponibilidad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idDisponibilidad);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo json_encode(["error" => "No se encontró la disponibilidad."]);
        }
    } else {
        echo json_encode(["error" => "Error al buscar disponibilidad."]);
    }

    $stmt->close();
    $conn->close();
}
?>
