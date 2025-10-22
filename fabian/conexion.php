
<?php
// Paso 1: Definir las variables de conexión con TUS DATOS
$host = "sql100.infinityfree.com"; 
$usuario_db = "if0_40222634"; 
$contraseña_db = "DeVkhYrrbZMBCIp"; // ¡REEMPLAZA ESTO!
$nombre_db = "if0_40222634_datos"; 

// Paso 2: Crear la Conexión usando MySQLi (Orientado a Objetos)

$conexion = new mysqli($host, $usuario_db, $contraseña_db, $nombre_db);

// Paso 3: Verificar la conexión y manejar errores

if ($conexion->connect_error) {
    // Si la conexión falla, muestra un mensaje de error y detiene el script
    die("Error de Conexión a la Base de Datos: " . $conexion->connect_error);
}

// Opcional: Si quieres probar la conexión una vez, puedes descomentar la siguiente línea
// echo "¡Conexión exitosa!";
?>