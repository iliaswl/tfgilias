<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "contraseña";
$database = "tfg";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

