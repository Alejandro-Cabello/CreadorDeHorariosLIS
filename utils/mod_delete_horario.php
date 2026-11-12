<?php
include 'db_conexion.php'; // Conexión a la base de datos

$idHorario = $_GET['id']; // Obtiene el ID del horario desde la solicitud

$query = "DELETE FROM horarios WHERE idHorario = '$idHorario'"; // Consulta para eliminar el registro

if (mysqli_query($conn, $query)) {
    echo "Horario eliminado exitosamente.";
    header("Location: ../templates/index_horarios.php");
    exit();

} else {
    echo "Error al eliminar el horario: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
