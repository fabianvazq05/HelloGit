<?php
include 'conexion.php'; 

// 1. Ejecuta la consulta para obtener los datos de la tabla 'personas'
$consulta = "SELECT Nombre, Apellido FROM personas"; 
$resultado = $conexion->query($consulta);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mi Formulario y Datos</title>
</head>
<body>
    
    <h1>Datos de la Base de Datos</h1>
    <?php
    // 2. Muestra los resultados si la consulta fue exitosa
    if ($resultado && $resultado->num_rows > 0) {
        echo "<ul>";
        while($fila = $resultado->fetch_assoc()) {
            echo "<li>" . $fila['Nombre'] . " " . $fila['Apellido'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay datos en la tabla 'personas' para mostrar.</p>";
    }
    
    // 3. Cierra la conexión
    $conexion->close();
    ?>

    <h1>Formulario de Envío</h1>
    <form action="procesar.php" method="post"> <label for="nombre">Nombre:
            <input type="text" name="nombre" id="nombre">
        </label>
        <br>
        <label for="apellido">Primer Apellido:</label>
        <input type="text" name="apellido" id="apellido">
        <button type="submit">Enviar</button>     
    </form>
</body>
</html>