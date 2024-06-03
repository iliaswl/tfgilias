<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once "config.php";

// Obtener todas las tablas de la base de datos
$sql = "SHOW TABLES";
$result = mysqli_query($conexion, $sql);

$tables = [];
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="container">
        <?php require ("header.php"); ?>
    </header>
    <div class=" espaciado container mt-5">
        <h1 class="text-center">Panel de Administración</h1>
        <ul class="list-group">
            <?php foreach ($tables as $table): ?>
                <li class="list-group-item">
                    <a href="ver_registros.php?tabla=<?php echo $table; ?>"><?php echo $table; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>