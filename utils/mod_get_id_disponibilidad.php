<?php
include 'db_conexion.php'; // Conexión a la base de datos

$numeroEmpleado = $_GET['numeroEmpleado']; // Obtiene el numeroEmpleado desde la solicitud

$query = "SELECT idDisponibilidad FROM docenteDisponibilidad WHERE numeroEmpleado = '$numeroEmpleado'";
$result = mysqli_query($conn, $query);

$data = array('idDisponibilidad' => '');

if ($result && $row = mysqli_fetch_assoc($result)) {
    $data['idDisponibilidad'] = $row['idDisponibilidad'];
}

header('Content-Type: application/json'); // Establece el tipo de contenido de la respuesta
echo json_encode($data); // Devuelve los datos como JSON
?>
