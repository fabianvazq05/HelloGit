<?php
include 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$actualizar = "UPDATE personas SET Nombre='$nombre', Apellido='$apellido' WHERE id=$id";

if ($conexion->query($actualizar)) {
    header("Location: index.php");
} else {
    echo "Error al actualizar: " . $conexion->error;
}
$conexion->close();
?>
