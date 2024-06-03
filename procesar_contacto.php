<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y sanitizar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "tfg";  

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y bindear
    $stmt = $conn->prepare("INSERT INTO mensajes_contacto (nombre, correo, asunto, mensaje) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $correo, $asunto, $mensaje);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a una página de éxito
        header("Location: gracias.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si no se accede al script mediante POST, redirigir al formulario de contacto
    header("Location: contacto.php");
    exit();
}
?>
