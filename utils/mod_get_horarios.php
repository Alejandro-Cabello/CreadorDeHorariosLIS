<?php
include 'db_conexion.php';

// Obtener filtros desde la solicitud
$filtros = [];
if (isset($_GET['nombreSemestre'])) {
    $filtros[] = "s.nombreSemestre = '" . mysqli_real_escape_string($conn, $_GET['nombreSemestre']) . "'";
}
if (isset($_GET['nombreAula'])) {
    $filtros[] = "a.nombreAula = '" . mysqli_real_escape_string($conn, $_GET['nombreAula']) . "'";
}
if (isset($_GET['nombreDias'])) {
    $filtros[] = "d.nombreDias = '" . mysqli_real_escape_string($conn, $_GET['nombreDias']) . "'";
}
if (isset($_GET['grupo'])) {
    $filtros[] = "apg.grupo = '" . mysqli_real_escape_string($conn, $_GET['grupo']) . "'";
}
if (isset($_GET['semestreAsignatura'])) {
    $filtros[] = "asi.semestre = '" . mysqli_real_escape_string($conn, $_GET['semestreAsignatura']) . "'";
}
if (isset($_GET['nombreCompleto'])) {
    $filtros[] = "doc.nombreCompleto = '" . mysqli_real_escape_string($conn, $_GET['nombreCompleto']) . "'";
}

$query = "SELECT h.idHorario, a.nombreAula, d.nombreDias, s.nombreSemestre, h.horaInicioHorario, h.horaFinHorario, asi.nombreAsignatura, asi.semestre, apg.grupo, apg.turno, doc.nombreCompleto
          FROM horarios h 
          JOIN aulas a ON h.idAula = a.idAula 
          JOIN diasSemana d ON h.idDias = d.idDias 
          JOIN semestres s ON h.idSemestre = s.idSemestre 
          JOIN asignaturaPorGrupo apg ON h.idAsignaturaPorGrupo = apg.idAsignaturaPorGrupo
          JOIN asignaturas asi ON apg.codigoAsignatura = asi.codigoAsignatura
          JOIN docente doc ON apg.numeroEmpleado = doc.numeroEmpleado"; // Consulta base

if (!empty($filtros)) {
    $query .= " WHERE " . implode(" AND ", $filtros); // Agregar filtros a la consulta
}

$result = mysqli_query($conn, $query);

$data = array(); // Inicializa los datos

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json'); // Establece el tipo de contenido de la respuesta
echo json_encode($data); // Devuelve los datos como JSON
?>

