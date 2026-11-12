<?php
include 'db_conexion.php';

$idAsignaturaPorGrupo = $_GET['id'];

$query = "SELECT apg.turno, apg.numeroEmpleado 
          FROM asignaturaPorGrupo apg 
          WHERE apg.idAsignaturaPorGrupo = '$idAsignaturaPorGrupo'";
$result = mysqli_query($conn, $query);

$data = array();

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
}

header('Content-Type: application/json');
echo json_encode($data);
?>
