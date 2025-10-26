
<?php
$host = "sql100.infinityfree.com"; 
$usuario_db = "if0_40222634"; 
$contraseña_db = "DeVkhYrrbZMBCIp"; 
$nombre_db = "if0_40222634_datos"; 

$conexion = new mysqli($host, $usuario_db, $contraseña_db, $nombre_db);

if ($conexion->connect_error) {
    // Si la conexión falla, muestra un mensaje de error y detiene el script
    die("Error de Conexión a la Base de Datos: " . $conexion->connect_error);
}
?>