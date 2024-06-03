<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['tabla'])) {
    header("Location: admin.php");
    exit();
}

require_once "config.php";

$tabla = mysqli_real_escape_string($conexion, $_GET['tabla']);

// Obtener los datos de la tabla
$sql = "SELECT * FROM $tabla";
$result = mysqli_query($conexion, $sql);

if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
}

$fields = mysqli_fetch_fields($result);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Registros - <?php echo $tabla; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php require ("header.php"); ?>
    </header>
    <div class="espaciado container mt-5">
        <h1 class="text-center">Ver Registros - <?php echo $tabla; ?></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <th><?php echo htmlspecialchars($field->name); ?></th>
                    <?php endforeach; ?>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <?php foreach ($row as $key => $cell): ?>
                            <td><?php echo htmlspecialchars($cell); ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="editar_registro.php?tabla=<?php echo urlencode($tabla); ?>&id=<?php echo urlencode($row['ID']); ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_registro.php?tabla=<?php echo urlencode($tabla); ?>&id=<?php echo urlencode($row['ID']); ?>"
                                class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <tr>
                    <form action="añadir_registro.php" method="POST">
                        <input type="hidden" name="tabla" value="<?php echo htmlspecialchars($tabla); ?>">
                        <?php foreach ($fields as $field): ?>
                            <?php if ($field->name != 'ID'): ?>
                                <td><input type="text" name="<?php echo htmlspecialchars($field->name); ?>"
                                        class="form-control"></td>
                            <?php else: ?>
                                <td>Auto</td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td><button type="submit" class="btn btn-success btn-sm">Añadir</button></td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
mysqli_close($conexion);
?>