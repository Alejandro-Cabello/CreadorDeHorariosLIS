<?php
include 'db_conexion.php';

if (isset($_GET['numeroEmpleado'])) {
    $numeroEmpleado = $_GET['numeroEmpleado'];
    $sql = "SELECT nombreCompleto FROM docente WHERE numeroEmpleado = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $numeroEmpleado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $docente = $result->fetch_assoc();
        echo json_encode($docente);
    } else {
        echo json_encode(['error' => 'Docente no encontrado']);
    }

    $stmt->close();
}

$conn->close();
?>
