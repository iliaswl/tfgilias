<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tfg");

// Verificar conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$password = mysqli_real_escape_string($conexion, $_POST['contraseña']);

// Verificar si el correo ya está registrado
$sql_verificar = "SELECT ID FROM Usuarios WHERE CorreoElectronico='$email'";
$resultado_verificar = mysqli_query($conexion, $sql_verificar);

if (mysqli_num_rows($resultado_verificar) > 0) {
    echo "El correo electrónico ya está registrado.";
    exit();
}

// Hashear la contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar datos en la base de datos
$sql = "INSERT INTO Usuarios (Nombre, Apellido, CorreoElectronico, Contraseña, FechaRegistro) VALUES ('$nombre', '$apellido', '$email', '$password_hash', NOW())";

if (mysqli_query($conexion, $sql)) {
    echo "success";
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Cerrar conexión
mysqli_close($conexion);
?>
