<?php
include 'db_conexion.php';

$idAsignaturaPorGrupo = $_GET['idAsignaturaPorGrupo'];
$idSemestre = $_GET['idSemestre'];
$idDias = $_GET['idDias'];
$horaInicioHorario = $_GET['horaInicioHorario'];
$horaFinHorario = $_GET['horaFinHorario'];

// Obtén el numeroEmpleado basado en idAsignaturaPorGrupo
$queryEmpleado = "SELECT numeroEmpleado FROM asignaturaPorGrupo WHERE idAsignaturaPorGrupo = '$idAsignaturaPorGrupo'";
$resultEmpleado = mysqli_query($conn, $queryEmpleado);
$rowEmpleado = mysqli_fetch_assoc($resultEmpleado);
$numeroEmpleado = $rowEmpleado['numeroEmpleado'];

// Verifica los conflictos de horario para el docente
$query = "SELECT apg.numeroEmpleado
          FROM horarios h
          JOIN asignaturaPorGrupo apg ON h.idAsignaturaPorGrupo = apg.idAsignaturaPorGrupo
          WHERE apg.numeroEmpleado = '$numeroEmpleado'
          AND (h.idSemestre = '$idSemestre' AND h.idDias = '$idDias')
          AND (h.horaInicioHorario = '$horaInicioHorario' OR h.horaFinHorario = '$horaFinHorario')";
$result = mysqli_query($conn, $query);

$data = array('conflicto' => false, 'numeroEmpleado' => '');

if ($result && $row = mysqli_fetch_assoc($result)) {
    $data['conflicto'] = true;
    $data['numeroEmpleado'] = $row['numeroEmpleado'];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
