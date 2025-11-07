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

    <!-- Importar Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

    <!-- Íconos de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="grey lighten-4">

    <div class="container">
        <h4 class="center-align blue-text text-darken-2">Editar Registro</h4>

        <div class="card white z-depth-2">
            <div class="card-content">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

                    <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input id="nombre" type="text" name="nombre" value="<?php echo $fila['Nombre']; ?>" required>
                        <label for="nombre" class="active">Nombre</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">badge</i>
                        <input id="apellido" type="text" name="apellido" value="<?php echo $fila['Apellido']; ?>" required>
                        <label for="apellido" class="active">Apellido</label>
                    </div>

                    <div class="center-align">
                        <button type="submit" class="btn waves-effect waves-light blue">
                            <i class="material-icons left">save</i>Guardar Cambios
                        </button>

                        <a href="index.php" class="btn grey lighten-1 black-text waves-effect">
                            <i class="material-icons left">arrow_back</i>Volver
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>


