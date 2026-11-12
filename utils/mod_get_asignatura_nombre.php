<?php
include 'db_conexion.php';
$codigo = $_GET['codigo'];
$query = "SELECT nombreAsignatura FROM asignaturas WHERE codigoAsignatura = '$codigo'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
?>
