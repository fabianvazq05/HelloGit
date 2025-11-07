<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM personas WHERE id = $id";
    $resultado = $conexion->query($consulta);
    $fila = $resultado->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $sql = "UPDATE personas SET Nombre='$nombre', Apellido='$apellido' WHERE id=$id";
    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php?status=success&i=1");
        exit();
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
</head>
<body>
    <h2>Editar Registro</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $fila['Nombre']; ?>"><br>
        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $fila['Apellido']; ?>"><br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>

