<?php
include 'db_conexion.php';

if (isset($_GET['numeroEmpleado'])) {
    $numeroEmpleado = $_GET['numeroEmpleado'];

    // Preparar y ejecutar la consulta de eliminación
    $stmt = $conn->prepare("DELETE FROM docente WHERE numeroEmpleado = ?");
    $stmt->bind_param("i", $numeroEmpleado);

    if ($stmt->execute()) {

      echo "Registro eliminado exitosamente.";
      header("Location: ../templates/index_profesores.php");
      exit();

    } else {
      echo "Error al eliminar el registro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID de registro no proporcionado.";
}
?>
