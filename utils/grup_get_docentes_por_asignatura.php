<?php
include 'db_conexion.php';

if (isset($_GET['codigoAsignatura'])) {
    $codigoAsignatura = $_GET['codigoAsignatura'];

    $sql = "SELECT d.numeroEmpleado, d.nombreCompleto 
            FROM docente d
            JOIN docenteImparte di ON d.numeroEmpleado = di.numeroEmpleado
            WHERE di.codigoAsignatura = ? AND d.estado = 'Activo'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $codigoAsignatura);
    $stmt->execute();
    $result = $stmt->get_result();

    $docentes = [];
    while ($row = $result->fetch_assoc()) {
        $docentes[] = $row;
    }

    echo json_encode($docentes);

    $stmt->close();
}

$conn->close();
?>
