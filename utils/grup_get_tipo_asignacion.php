<?php
include 'db_conexion.php';

if (isset($_GET['numeroEmpleado']) && isset($_GET['codigoAsignatura'])) {
    $numeroEmpleado = $_GET['numeroEmpleado'];
    $codigoAsignatura = $_GET['codigoAsignatura'];

    $sql = "SELECT tipoAsignacion FROM docenteImparte WHERE numeroEmpleado = ? AND codigoAsignatura = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $numeroEmpleado, $codigoAsignatura);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['tipoAsignacion' => $row['tipoAsignacion']]);
    } else {
        echo json_encode(['error' => 'No existe asignación']);
    }

    $stmt->close();
}

$conn->close();
?>
