<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php";

    $tabla = mysqli_real_escape_string($conexion, $_POST['tabla']);
    $campos = [];
    $valores = [];

    foreach ($_POST as $key => $value) {
        if ($key !== 'tabla' && $value !== '') {
            $campos[] = mysqli_real_escape_string($conexion, $key);
            $valores[] = "'" . mysqli_real_escape_string($conexion, $value) . "'";
        }
    }

    $sql = "INSERT INTO $tabla (" . implode(',', $campos) . ") VALUES (" . implode(',', $valores) . ")";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ver_registros.php?tabla=$tabla");
    } else {
        echo "Error al agregar el registro: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    header("Location: admin.php");
    exit();
}
?>
