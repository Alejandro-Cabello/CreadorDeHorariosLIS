<?php
include 'db_conexion.php';

if (isset($_GET['numeroEmpleado'])) {
    $numeroEmpleado = $_GET['numeroEmpleado'];

    // Obtener los datos del docente
    $stmt = $conn->prepare("SELECT * FROM docente WHERE numeroEmpleado = ?");
    $stmt->bind_param("i", $numeroEmpleado);
    $stmt->execute();
    $result = $stmt->get_result();
    $docente = $result->fetch_assoc();

    if ($docente) {
        // Retornar los datos del docente como JSON para ser utilizados en el modal
        echo json_encode($docente);
    } else {
        echo json_encode(['error' => 'Docente no encontrado']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Número de empleado no especificado']);
}
?>

