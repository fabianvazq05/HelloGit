<?php
include 'conexion.php'; 

// 1. Verificar que el método de envío fue POST (por seguridad y convención)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    
    $sql_insert = "INSERT INTO personas (Nombre, Apellido) VALUES ('$nombre', '$apellido')";
    
    // 4. Ejecutar la consulta
    if ($conexion->query($sql_insert) === TRUE) {
        
        header("Location: index.php?status=success");
        exit();
        
    } else {
        echo "<h1>¡ERROR!</h1>";
        echo "Error al guardar el registro. Revise si los nombres de columnas coinciden con la tabla 'personas'.";
        echo "<p>Detalle del error: " . $conexion->error . "</p>";
    }
} else {
    echo "<h1>Acceso Inválido</h1>";
    echo "Por favor, utiliza el formulario en la página principal (index.php) para enviar datos.";
}

$conexion->close();
?>