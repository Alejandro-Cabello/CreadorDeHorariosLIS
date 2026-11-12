<?php
include 'db_conexion.php';

if (isset($_GET['codigoAsignatura'])) {
    $codigoAsignatura = $_GET['codigoAsignatura'];

    $sql = "SELECT * FROM asignaturas WHERE codigoAsignatura = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $codigoAsignatura);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $asignatura = $result->fetch_assoc();
        echo json_encode($asignatura);
    } else {
        echo json_encode(['error' => 'No se encontraron datos.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Parámetros no válidos.']);
}
?>
