<?php
include 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoAsignatura = $_POST['codigoAsignatura'];
    $nombreAsignatura = $_POST['nombreAsignatura'];
    $semestre = $_POST['semestre'];
    $creditos = $_POST['creditos'];
    $academia = $_POST['academia'];
    $nucleoDeFormacion = $_POST['nucleoDeFormacion'];
    $optativa = $_POST['optativa'];

    $sql = "UPDATE asignaturas SET nombreAsignatura = ?, semestre = ?, creditos = ?, academia = ?, nucleoDeFormacion = ?, optativa = ? WHERE codigoAsignatura = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssis", $nombreAsignatura, $semestre, $creditos, $academia, $nucleoDeFormacion, $optativa, $codigoAsignatura);

    if ($stmt->execute()) {
        // Redirigir a la página anterior o mostrar un mensaje de éxito
        header("Location: ../templates/index_asignaturas.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
