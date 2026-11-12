<?php
// Incluir el archivo de conexión a la base de datos
include 'db_conexion.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $codigoAsignatura = $_POST['codigoAsignatura'];
    $numeroEmpleado = $_POST['numeroEmpleado'];
    $grupo = $_POST['grupo'];
    $horasSemanales = $_POST['horasSemanales'];
    $turno = $_POST['turno'];
    $idSemestre = $_POST['idSemestre'];

    // Preparar y ejecutar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO asignaturaPorGrupo (codigoAsignatura, numeroEmpleado, grupo, horasSemanales, turno, idSemestre)
            VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sisisi", $codigoAsignatura, $numeroEmpleado, $grupo, $horasSemanales, $turno, $idSemestre);

        if ($stmt->execute()) {
            echo "Registro guardado exitosamente.";
            header("Location: ../templates/index_asignaturas.php");
            exit();
        } else {
            echo "Error al guardar el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>
