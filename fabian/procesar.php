<?php
// Incluimos la conexión. Esto nos da acceso a la variable $conexion
include 'conexion.php'; 

// 1. Verificar que el método de envío fue POST (por seguridad y convención)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Recoger los datos y usar real_escape_string para prevenir inyecciones SQL
    // Los nombres de los campos ('nombre', 'apellido') deben coincidir con el 'name' del HTML
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    
    // 3. Crear la consulta de inserción (INSERT INTO)
    // Los nombres de las columnas (Nombre, Apellido) deben coincidir con la tabla 'personas'
    $sql_insert = "INSERT INTO personas (Nombre, Apellido) VALUES ('$nombre', '$apellido')";
    
    // 4. Ejecutar la consulta
    if ($conexion->query($sql_insert) === TRUE) {
        
        // Si el registro fue exitoso, redirige al usuario a la página principal
        header("Location: index.php?status=success");
        exit();
        
    } else {
        // Muestra un error detallado si la base de datos falla
        echo "<h1>¡ERROR!</h1>";
        echo "Error al guardar el registro. Revise si los nombres de columnas coinciden con la tabla 'personas'.";
        echo "<p>Detalle del error: " . $conexion->error . "</p>";
    }
} else {
    // Si alguien intenta acceder directamente a procesar.php
    echo "<h1>Acceso Inválido</h1>";
    echo "Por favor, utiliza el formulario en la página principal (index.php) para enviar datos.";
}

// 5. Cierra la conexión
$conexion->close();
?>