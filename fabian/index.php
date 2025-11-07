<?php
// Incluimos el archivo de conexión
include 'conexion.php'; 

// CONSULTA DE DATOS
$consulta = "SELECT id, Nombre, Apellido FROM personas"; 
$resultado = $conexion->query($consulta);

// CERRAMOS CONEXIÓN (se reabre cuando se necesite)
$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP y Materialize</title>

    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

    <!-- Íconos de Material -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Estilos -->
    <style>
        body { background: #f5f5f5; }
        .card { border-radius: 12px; }
        h4 { border-radius: 10px; }
        table td, table th { text-align: center; }
        .action-btn { margin: 0 3px; }
    </style>
</head>
<body>

<div class="container">

    <!-- Título -->
    <h4 class="center-align amber darken-3 white-text z-depth-2" style="padding:15px;">
        Gestión de Personas (PHP + MySQL + Materialize)
    </h4>

    <!-- TABLA -->
    <div class="card white z-depth-2" style="margin-top: 30px;">
        <div class="card-content">
            <table class="highlight responsive-table">
                <thead class="amber lighten-4">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultado && $resultado->num_rows > 0) {
                        while($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $fila['id'] . "</td>";
                            echo "<td>" . htmlspecialchars($fila['Nombre']) . "</td>";
                            echo "<td>" . htmlspecialchars($fila['Apellido']) . "</td>";
                            echo "<td>
                                    <a href='editar.php?id={$fila['id']}' class='btn-small amber darken-3 white-text action-btn'>
                                        <i class='material-icons'>edit</i>
                                    </a>
                                    <a href='eliminar.php?id={$fila['id']}' class='btn-small red darken-3 white-text action-btn' onclick='return confirm(\"¿Seguro que quieres eliminar este registro?\")'>
                                        <i class='material-icons'>delete</i>
                                    </a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='grey-text'>No hay datos para mostrar</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- FORMULARIO DE REGISTRO -->
    <h5 class="center-align amber darken-3 white-text z-depth-2" style="padding:15px;">Agregar Nuevo Registro</h5>

    <div class="card white z-depth-2" style="max-width:500px; margin:30px auto;">
        <div class="card-content">
            <form action="procesar.php" method="post">
                <div class="input-field">
                    <input id="nombre" name="nombre" type="text" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field">
                    <input id="apellido" name="apellido" type="text" required>
                    <label for="apellido">Apellido</label>
                </div>
                <div class="center-align">
                    <button type="submit" class="btn amber darken-3 waves-effect waves-light">
                        <i class="material-icons left">save</i>Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- JS de Materialize -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
