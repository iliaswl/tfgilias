<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "contraseña", "tfg");

// Verificar conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$usuario_id = $_SESSION['usuario_id'];
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
$current_password = mysqli_real_escape_string($conexion, $_POST['current_password']);
$new_password = isset($_POST['new_password']) ? mysqli_real_escape_string($conexion, $_POST['new_password']) : '';

// Verificar la contraseña actual
$sql = "SELECT Contraseña FROM Usuarios WHERE IDUsuario='$usuario_id'";
$resultado = mysqli_query($conexion, $sql);
$usuario = mysqli_fetch_assoc($resultado);

if (!password_verify($current_password, $usuario['Contraseña'])) {
    echo "Contraseña actual incorrecta.";
    exit();
}

// Preparar la actualización
$update_fields = [];
if (!empty($nombre)) {
    $update_fields[] = "Nombre='$nombre'";
}
if (!empty($apellido)) {
    $update_fields[] = "Apellido='$apellido'";
}
if (!empty($email)) {
    $update_fields[] = "CorreoElectronico='$email'";
}
if (!empty($new_password)) {
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $update_fields[] = "Contraseña='$hashed_password'";
}

// Realizar la actualización
if (!empty($update_fields)) {
    $update_sql = "UPDATE Usuarios SET " . implode(', ', $update_fields) . " WHERE IDUsuario='$usuario_id'";
    if (mysqli_query($conexion, $update_sql)) {
        $_SESSION['usuario_nombre'] = $nombre; // Actualizar el nombre en la sesión
        header("Location: perfil.php");
    } else {
        echo "Error actualizando los datos: " . mysqli_error($conexion);
    }
} else {
    echo "No hay datos para actualizar.";
}

// Cerrar conexión
mysqli_close($conexion);
?>
