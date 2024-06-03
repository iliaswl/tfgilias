<?php
// Verificación de sesión y rol de administrador
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tfg");

// Verificar conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Procesamiento de solicitud GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['tabla']) || !isset($_GET['id'])) {
        die("Falta información necesaria.");
    }

    $tabla = mysqli_real_escape_string($conexion, $_GET['tabla']);
    $id = (int) $_GET['id'];

    // Obtener los datos del registro específico
    $sql = "SELECT * FROM $tabla WHERE ID = $id";
    $resultado = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($resultado);

    if (!$registro) {
        die("Registro no encontrado.");
    }
}

// Procesamiento de solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tabla = mysqli_real_escape_string($conexion, $_POST['tabla']);
    $id = (int) $_POST['id'];

    $campos = [];
    foreach ($_POST as $campo => $valor) {
        if ($campo !== 'tabla' && $campo !== 'id') {
            $campos[] = "$campo = '" . mysqli_real_escape_string($conexion, $valor) . "'";
        }
    }

    $sql = "UPDATE $tabla SET " . implode(', ', $campos) . " WHERE ID = $id";

    if (mysqli_query($conexion, $sql)) {
        mysqli_close($conexion);
        header("Location: admin.php");
        exit();
    } else {
        echo "Error actualizando el registro: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="container">
        <?php require("header.php"); ?>
    </header>
    <div class="espaciado container mt-5">
        <h1 class="text-center">Editar Registro</h1>
        <form action="editar_registro.php" method="POST">
            <input type="hidden" name="tabla" value="<?php echo htmlspecialchars($tabla); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <?php if ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
                <?php foreach ($registro as $campo => $valor): ?>
                    <?php if ($campo === 'ID') continue; ?>
                    <div class="form-group">
                        <label for="<?php echo htmlspecialchars($campo); ?>"><?php echo htmlspecialchars($campo); ?>:</label>
                        <input type="text" class="form-control" id="<?php echo htmlspecialchars($campo); ?>" name="<?php echo htmlspecialchars($campo); ?>" value="<?php echo htmlspecialchars($valor); ?>">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
