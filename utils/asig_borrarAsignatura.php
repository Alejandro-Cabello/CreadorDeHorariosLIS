<?php
include 'db_conexion.php';

if (isset($_GET['codigoAsignatura'])) {
    $codigoAsignatura = $_GET['codigoAsignatura'];

    $sql = "DELETE FROM asignaturas WHERE codigoAsignatura = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $codigoAsignatura);

    if ($stmt->execute()) {
        // Redirigir a la página anterior o mostrar un mensaje de éxito
        header("Location: ../templates/index_asignaturas.php");
        exit();
    } else {
        echo "Error al borrar el registro: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Parámetros no válidos.";
}
?>
