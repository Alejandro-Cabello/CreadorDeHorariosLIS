<?php
include 'db_conexion.php';
$periodo = $_GET['periodo'];
$query = "SELECT codigoAsignatura, nombreAsignatura FROM asignaturas WHERE semestre = $periodo";
$result = mysqli_query($conn, $query);
$asignaturas = array();
while ($row = mysqli_fetch_assoc($result)) {
    $asignaturas[] = $row;
}
echo json_encode($asignaturas);
?>
