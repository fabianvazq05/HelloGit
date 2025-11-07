<?php
include 'conexion.php';

$id = $_GET['id'];
$conexion->query("DELETE FROM personas WHERE id=$id");

header("Location: index.php");
$conexion->close();
?>
