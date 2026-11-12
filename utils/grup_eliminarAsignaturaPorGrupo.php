<?php
include 'db_conexion.php';

if (isset($_GET['idAsignaturaPorGrupo'])) {
    $idAsignaturaPorGrupo = $_GET['idAsignaturaPorGrupo'];

    $sql = "DELETE FROM asignaturaPorGrupo WHERE idAsignaturaPorGrupo = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $idAsignaturaPorGrupo);

        if ($stmt->execute()) {
            echo "Registro eliminado exitosamente.";
            header("Location: ../templates/index_asignaturas.php");
            exit();
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID de registro no proporcionado.";
}
?>
