<?php
$nombre_get="Aaron"
// Incluir el archivo de conexión
include 'conexion.php'; 
// Ahora puedes usar la variable $conexion para hacer consultas:
$consulta = "SELECT * FROM nombre_de_tu_tabla"; 
$resultado = $conexion->query($consulta);
// ... código para mostrar los resultados ...
$conexion->close(); // Cierra la conexión al finalizar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HOLAAAA</h1>
    <form action="#" method="get">
        <label for="">$nombre_get
            <input type="text" name="nombre" id="">
        <br>
        <h1>Holaaaaa</h1>
        </label>
        <label for="">primer apellido</label>
            <input type="text" name="primerApellido" id="">
        <button type="submit">Enviar</button>    
    </form>
</body>
</html>