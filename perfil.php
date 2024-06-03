<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tfg");

// Verificar conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Obtener los datos del usuario
$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT Nombre, Apellido, CorreoElectronico FROM Usuarios WHERE ID='$usuario_id'";
$resultado = mysqli_query($conexion, $sql);
$usuario = mysqli_fetch_assoc($resultado);

// Cerrar conexión
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .edit-field { display: none; }
    </style>
</head>
<body>
    <header class="container">
        <?php require("header.php"); ?>
    </header>
    <div class=" espaciado container mt-5">
        <h1 class="text-center">Perfil de Usuario</h1>
        <div class="card">
            <div class="card-body">
                <form id="perfilForm" action="perfil_procesar.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <span id="nombre-text"><?php echo htmlspecialchars($usuario['Nombre']); ?></span>
                        <input type="text" class="form-control edit-field" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['Nombre']); ?>">
                        <button type="button" class="btn btn-link" onclick="editField('nombre')">Cambiar</button>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <span id="apellido-text"><?php echo htmlspecialchars($usuario['Apellido']); ?></span>
                        <input type="text" class="form-control edit-field" id="apellido" name="apellido" value="<?php echo htmlspecialchars($usuario['Apellido']); ?>">
                        <button type="button" class="btn btn-link" onclick="editField('apellido')">Cambiar</button>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Nueva Contraseña:</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="current_password">Contraseña Actual:</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function editField(field) {
            document.getElementById(field + '-text').style.display = 'none';
            document.getElementById(field).style.display = 'block';
            document.getElementById(field).focus();
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
