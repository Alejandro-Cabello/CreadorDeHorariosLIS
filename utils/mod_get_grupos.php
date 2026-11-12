<?php
include 'db_conexion.php';
$codigo = $_GET['codigo'];
$query = "SELECT DISTINCT grupo FROM asignaturaPorGrupo WHERE codigoAsignatura = '$codigo'";
$result = mysqli_query($conn, $query);
$grupos = array();
while ($row = mysqli_fetch_assoc($result)) {
    $grupos[] = $row;
}
echo json_encode($grupos);
?>
