<?php
include 'db_conexion.php'; // Conexión a la base de datos

$idAsignaturaPorGrupo = $_GET['id']; // Obtiene el ID de Asignatura por Grupo desde la solicitud

$query = "SELECT COUNT(*) as count, SUM(h.horasSesión) as horasTotales, apg.horasSemanales
          FROM horarios h
          JOIN asignaturaPorGrupo apg ON h.idAsignaturaPorGrupo = apg.idAsignaturaPorGrupo
          WHERE h.idAsignaturaPorGrupo = '$idAsignaturaPorGrupo'"; // Consulta para obtener las horas totales y semanales y el conteo de registros
$result = mysqli_query($conn, $query);

$data = array('count' => 0, 'horasTotales' => 0, 'horasSemanales' => 0); // Inicializa los datos

if ($result && $row = mysqli_fetch_assoc($result)) {
    $data['count'] = (int)$row['count'];
    $data['horasTotales'] = (int)$row['horasTotales'];
    $data['horasSemanales'] = (int)$row['horasSemanales'];
}

header('Content-Type: application/json'); // Establece el tipo de contenido de la respuesta
echo json_encode($data); // Devuelve los datos como JSON
?>

