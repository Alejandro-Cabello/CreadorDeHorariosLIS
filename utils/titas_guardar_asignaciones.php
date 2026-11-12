<?php
include 'db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroEmpleado = $_POST['numeroEmpleadoDispA'];
    $codigoAsignatura = $_POST['codigoAsignatura'];
    $tipoAsignacion = $_POST['tipoAsignacion'];

    $sql = "INSERT INTO docenteImparte (numeroEmpleado, codigoAsignatura, tipoAsignacion) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $numeroEmpleado, $codigoAsignatura, $tipoAsignacion);

    if ($stmt->execute()) {
        echo "Asignación guardada correctamente.";
    } else {
        echo "Error al guardar la asignación: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: ../templates/index_profesores.php");
    exit();
} else {
    echo "Método no permitido";
}
?>
