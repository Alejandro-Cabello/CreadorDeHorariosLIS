<?php
include 'db_conexion.php';
$id = $_GET['id'];
$query = "
    SELECT s.nombreSemestre, a.nombreAsignatura, a.semestre, apg.grupo, apg.numeroEmpleado, dd.horaInicio, dd.horaFin, d.nombreCompleto, apg.horasSemanales
    FROM asignaturaPorGrupo apg
    JOIN semestres s ON s.idSemestre = apg.idSemestre
    JOIN asignaturas a ON a.codigoAsignatura = apg.codigoAsignatura
    JOIN docenteDisponibilidad dd ON dd.numeroEmpleado = apg.numeroEmpleado
    JOIN docente d ON d.numeroEmpleado = apg.numeroEmpleado
    WHERE apg.idAsignaturaPorGrupo = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
?>

