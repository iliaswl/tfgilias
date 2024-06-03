<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['tabla']) || !isset($_GET['id'])) {
    header("Location: admin.php");
    exit();
}

$tabla = $_GET['tabla'];
$id = $_GET['id'];

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM $tabla WHERE ID = $id";
    mysqli_query($conexion, $sql);
    header("Location: ver_registros.php?tabla=$tabla");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro - <?php echo $tabla; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="container">
        <?php require ("header.php"); ?>
    </header>
    <div class=" espaciado container mt-5">
        <h1 class="text-center">Eliminar Registro - <?php echo $tabla; ?></h1>
        <p>¿Estás seguro de que deseas eliminar este registro?</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?tabla=$tabla&id=$id"; ?>" method="post">
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>