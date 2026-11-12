<?php
include 'db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idSemestre = $_POST['idPeriodoGeneral'];

    // Verificar que se ha recibido el idSemestre
    if (isset($idSemestre)) {
        // Actualizar todos los registros en la columna idSemestre de la tabla asignaturaPorGrupo
        $sql = "UPDATE asignaturaPorGrupo SET idSemestre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idSemestre);

        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente.";
            header("Location: ../templates/index_asignaturas.php");
            exit();
        } else {
            echo "Error al actualizar los registros: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "No se ha recibido un idSemestre válido.";
    }
}

$conn->close();
?>
