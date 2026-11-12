<?php
include 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAsignaturaPorGrupo = $_POST['idAsignaturaPorGrupo'];
    $grupo = $_POST['grupo'];
    $horasSemanales = $_POST['horasSemanales'];
    $turno = $_POST['turno'];
    $idSemestre = $_POST['idSemestre'];

    $sql = "UPDATE asignaturaPorGrupo SET grupo = ?, horasSemanales = ?, turno = ?, idSemestre = ? WHERE idAsignaturaPorGrupo = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sisii", $grupo, $horasSemanales, $turno, $idSemestre, $idAsignaturaPorGrupo);

        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente.";
            header("Location: ../templates/index_asignaturas.php");
            exit();
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>
