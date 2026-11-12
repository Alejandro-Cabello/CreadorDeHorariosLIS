<?php
// Configuración de la base de datos
$servername = "localhost";  // Cambia esto si tu servidor de base de datos no está en localhost
$username = "administrador";   
$password = "uaeh"; 
$dbname = "horariosSoftware"; // Nombre de la base de datos

try {
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar conexión
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }
    

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
