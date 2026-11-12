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

    $sql = "INSERT INTO asignaturas (codigoAsignatura, nombreAsignatura, semestre, creditos, academia, nucleoDeFormacion, optativa)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssi", $codigoAsignatura, $nombreAsignatura, $semestre, $creditos, $academia, $nucleoDeFormacion, $optativa);

    if ($stmt->execute()) {
        // Redirigir a la página anterior o mostrar un mensaje de éxito
        header("Location: ../templates/index_asignaturas.php");
        exit();
    } else {
        echo "Error al guardar el registro: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>