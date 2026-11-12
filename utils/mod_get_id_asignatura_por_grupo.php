<?php
include 'db_conexion.php';
$codigo = $_GET['codigo'];
$grupo = $_GET['grupo'];
$semestre = $_GET['semestre'];
$query = "SELECT idAsignaturaPorGrupo FROM asignaturaPorGrupo WHERE codigoAsignatura = '$codigo' AND grupo = '$grupo' AND idSemestre = $semestre";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
?>
