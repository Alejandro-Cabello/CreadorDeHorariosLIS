<?php
include 'db_conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $numeroEmpleado = $_POST['numeroEmpleado'];
  $nombreCompleto = $_POST['nombreCompleto'];
  $gradoAcademico = $_POST['gradoAcademico'];
  $gradoAcademico2 = $_POST['gradoAcademico2'];
  $sindicalizado = $_POST['sindicalizado'];
  $estado = $_POST['estado'];

  // Preparar la consulta SQL
  $stmt = $conn->prepare("INSERT INTO docente (numeroEmpleado, nombreCompleto, gradoAcademico, gradoAcademico2, sindicalizado, estado) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("isssis", $numeroEmpleado, $nombreCompleto, $gradoAcademico, $gradoAcademico2, $sindicalizado, $estado);

  // Ejecutar la declaración
  if ($stmt->execute()) {
    // Mostrar una alerta y redirigir después de 1 segundos
          echo "Registro guardado con éxito.";
          header("Location: ../templates/index_profesores.php");
          exit();

  } else {
          echo "Error al guardar el registro: " . $stmt->error;
  }

  // Cerrar la declaración y la conexión
  $stmt->close();
  $conn->close();
}
?>

