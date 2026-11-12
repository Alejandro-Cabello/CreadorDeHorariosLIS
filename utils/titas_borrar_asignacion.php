<?php
include 'db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroEmpleado = $_POST['numeroEmpleado'];
    $codigoAsignatura = $_POST['codigoAsignatura'];

    $sql = "DELETE FROM docenteImparte WHERE numeroEmpleado = ? AND codigoAsignatura = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $numeroEmpleado, $codigoAsignatura);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: ../templates/index_profesores.php");
    exit();
} else {
    echo "Método no permitido";
}
?>
