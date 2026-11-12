<?php
include '../utils/db_conexion.php'; // Conexión a la base de datos

// Obtención de los valores del formulario
$idAsignaturaPorGrupo = $_POST['idAsignaturaPorGrupo'];
$idAula = $_POST['idAula'];
$idDias = $_POST['idDias'];
$horasSesion = $_POST['horasSesión'];
$horaInicioHorario = $_POST['InicioDeClase'];
$horaFinHorario = $_POST['FinDeClase'];
$idSemestre = $_POST['selectSemestre'];

// Consulta para obtener el idDisponibilidad
$query = "SELECT idDisponibilidad FROM docenteDisponibilidad dd
          JOIN asignaturaPorGrupo apg ON dd.numeroEmpleado = apg.numeroEmpleado
          WHERE apg.idAsignaturaPorGrupo = '$idAsignaturaPorGrupo' LIMIT 1";
$result = mysqli_query($conn, $query);
$idDisponibilidad = null;

if ($result && $row = mysqli_fetch_assoc($result)) {
    $idDisponibilidad = $row['idDisponibilidad'];
}

// Inserción de los datos en la tabla horarios
if ($idDisponibilidad !== null) {
    $query = "INSERT INTO horarios (idAsignaturaPorGrupo, idAula, idDias, horasSesión, horaInicioHorario, horaFinHorario, idSemestre, idDisponibilidad)
              VALUES ('$idAsignaturaPorGrupo', '$idAula', '$idDias', '$horasSesion', '$horaInicioHorario', '$horaFinHorario', '$idSemestre', '$idDisponibilidad')";

    if (mysqli_query($conn, $query)) {
        echo "Horario guardado exitosamente.";
        header("Location: ../templates/index_horarios.php");
        exit();
    } else {
        echo "Error al guardar el horario: " . mysqli_error($conn);
    }
} else {
    echo "No se encontró disponibilidad del docente.";
}

mysqli_close($conn);
?>
