<?php
session_start();

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tfg");

// Verificar conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);

// Verificar las credenciales del usuario
$sql = "SELECT ID, Nombre, Contraseña FROM Usuarios WHERE CorreoElectronico='$email'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $usuario = mysqli_fetch_assoc($resultado);
    if (password_verify($password, $usuario['Contraseña'])) {
        // Iniciar sesión
        $_SESSION['usuario_id'] = $usuario['ID'];
        $_SESSION['usuario_nombre'] = $usuario['Nombre'];
        header("Location: perfil.php");
        exit();
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
    }
} else {
    // Usuario no encontrado
    echo "No se encontró una cuenta con ese correo electrónico.";
}

// Cerrar conexión
mysqli_close($conexion);
?>
