<?php
include '../utils/db_conexion.php'; // Conexión a la base de datos

$idAula = $_GET['idAula']; // Obtiene los parámetros de la solicitud
$idDias = $_GET['idDias'];
$idSemestre = $_GET['idSemestre'];

$query = "SELECT h.idHorario, a.nombreAula, d.nombreDias, s.nombreSemestre, h.horaInicioHorario, h.horaFinHorario, asi.nombreAsignatura, asi.semestre, apg.grupo
          FROM horarios h 
          JOIN aulas a ON h.idAula = a.idAula 
          JOIN diasSemana d ON h.idDias = d.idDias 
          JOIN semestres s ON h.idSemestre = s.idSemestre 
          JOIN asignaturaPorGrupo apg ON h.idAsignaturaPorGrupo = apg.idAsignaturaPorGrupo
          JOIN asignaturas asi ON apg.codigoAsignatura = asi.codigoAsignatura
          WHERE h.idAula = '$idAula' 
          AND h.idDias = '$idDias' 
          AND h.idSemestre = '$idSemestre'
          ORDER BY h.horaInicioHorario"; // Consulta para obtener las asignaciones con las columnas adicionales y ordenar por hora de inicio

$result = mysqli_query($conn, $query);

$data = array(); // Inicializa los datos

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json'); // Establece el tipo de contenido de la respuesta
echo json_encode($data); // Devuelve los datos como JSON
?>
