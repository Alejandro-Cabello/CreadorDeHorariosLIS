<?php
include 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroEmpleado = $_POST['numeroEmpleado'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $gradoAcademico = $_POST['gradoAcademico'];
    $gradoAcademico2 = $_POST['gradoAcademico2'];
    $sindicalizado = $_POST['sindicalizado'];
    $estado = $_POST['estado'];

    // Preparar la consulta de actualización
    $stmt = $conn->prepare("UPDATE docente SET nombreCompleto = ?, gradoAcademico = ?, gradoAcademico2 = ?, sindicalizado = ?, estado = ? WHERE numeroEmpleado = ?");
    $stmt->bind_param("sssssi", $nombreCompleto, $gradoAcademico, $gradoAcademico2, $sindicalizado, $estado, $numeroEmpleado);

    if ($stmt->execute()) {
      echo "Asignación guardada correctamente.";
      header("Location: ../templates/index_profesores.php");
      exit();

    } else {
      echo "Error al guardar la asignación: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método no permitido";
}
?>
