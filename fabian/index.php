<?php
// Incluimos el archivo que establece la conexión a la DB
include 'conexion.php'; 

// 1. CONSULTA PARA MOSTRAR LOS DATOS (Lectura)
$consulta_lectura = "SELECT Nombre, Apellido FROM personas"; 
$resultado_lectura = $conexion->query($consulta_lectura);

// 2. Cerramos la conexión después de la lectura
// La conexión se reabrirá automáticamente en procesar.php
$conexion->close(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario y Datos PHP/MySQL</title>
</head>
<body>
    
    <h1>Datos Guardados en la Base de Datos</h1>
    <?php
    if ($resultado_lectura && $resultado_lectura->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Apellido</th></tr>";
        // Recorremos los resultados y los mostramos en filas
        while($fila = $resultado_lectura->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['Nombre'] . "</td>";
            echo "<td>" . $fila['Apellido'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay datos en la tabla 'personas' para mostrar.</p>";
    }
    ?>

    <hr>

    <h1>Guardar Nuevo Registro</h1>
    <form action="procesar.php" method="post">
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        
        <label for="apellido">Primer Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
        <br><br>
        
        <button type="submit">Enviar y Guardar</button>
        
    </form>
</body>
</html>