<?php
include 'db_conexion.php';

$idAula = $_GET['idAula'];
$idDias = $_GET['idDias'];
$idSemestre = $_GET['idSemestre'];
$horaInicioHorario = $_GET['horaInicioHorario'];
$horaFinHorario = $_GET['horaFinHorario'];

$query = "SELECT * FROM horarios 
          WHERE idAula = '$idAula' 
          AND idDias = '$idDias' 
          AND idSemestre = '$idSemestre' 
          AND (horaInicioHorario <= '$horaFinHorario' AND horaFinHorario >= '$horaInicioHorario')";
$result = mysqli_query($conn, $query);

$data = array('concurrencia' => false);

if ($result && mysqli_num_rows($result) > 0) {
    $data['concurrencia'] = true;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
