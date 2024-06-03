<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['usuario_id'])) {
    header("Location: perfil.php");
    exit();
}

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    $sql = "SELECT * FROM Usuarios WHERE CorreoElectronico = '$email'";
    $result = mysqli_query($conexion, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['Contraseña'])) {
        $_SESSION['usuario_id'] = $user['ID'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: perfil.php");
        exit();
    } else {
        $error = "Correo electrónico o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login2</title>
    <meta name="description" content="Ejemplo: Login 1">
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10+Charted&display=swap" rel="stylesheet">
    <link rel="preload" href="css/styles.css" as="style">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <section class="fondo">
        <div class="capa-fondo">

            <main class="contenedor">

                <div class="contenido">

                    <h1 class="text-light">Bienvenido</h1>

                    <form class="formulario" action="login.php" method="post">

                        <div class="campo1"><label class="text-light campo__label email" for="email">E-mail</label></div>
                        <div class="campo2"><input class="campo__field email-field" type="email" placeholder="Tu Email"
                                id="email" name="email"></div>
                        <div class="campo1"><label class="text-light campo__label contraseña" for="password">Contraseña</label>
                        </div>
                        <div class="campo2"><input class="campo__field contraseña-field" type="password"
                                placeholder="Tu contraseña" id="password" name="password"></div>
                        <div class="campo3"><a href="registro.php" class="boton boton--secundario">Registrarse</a></div>
                        <div class="campo4"><input type="submit" value="Login" class="boton boton--primario"></div>

                    </form>
                </div> <!-- Fin div contendio-->
            </main><!-- Fin div main-->
        </div><!-- Fin div capa de fondo-->
    </section><!-- Fin fondo-->
    <?php if (isset($error)): ?>
        <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
    <?php endif; ?>

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




</body>

</html>