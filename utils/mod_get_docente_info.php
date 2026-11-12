<?php
include 'db_conexion.php';

$numeroEmpleado = $_GET['id'];

$query = "SELECT dd.turno 
          FROM docenteDisponibilidad dd 
          WHERE dd.numeroEmpleado = '$numeroEmpleado'";
$result = mysqli_query($conn, $query);

$data = array();

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
}

header('Content-Type: application/json');
echo json_encode($data);
?>
