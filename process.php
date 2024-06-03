<?php
require("conexion.php");

// Verificar si se han enviado datos de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta para verificar las credenciales en la base de datos
    $sql = "SELECT * FROM Usuarios WHERE CorreoElectronico = '$email' AND Contraseña = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Iniciar sesión
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;

        // Redirigir al usuario a la página deseada
        header("location: entrenamientos.php");
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        echo "Error: Credenciales incorrectas.";
    }
}


