<?php
include 'db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idAsignaturaPorGrupo = $_GET['idAsignaturaPorGrupo'];

    $sql = "SELECT * FROM asignaturaPorGrupo WHERE idAsignaturaPorGrupo = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $idAsignaturaPorGrupo);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $asignaturaPorGrupo = $result->fetch_assoc();
            echo json_encode($asignaturaPorGrupo);
        } else {
            echo json_encode(["error" => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => $conn->error]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Método no permitido."]);
}
?>
