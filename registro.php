<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro2</title>
    <meta name="description" content="Ejemplo: Login 1">
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,500&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10+Charted&display=swap" rel="stylesheet">
    <link rel="preload" href="css/styles.css" as="style">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <section class="fondo fondo--registro">
        <div class="capa-fondo">

            <main class="contenedor">

                <div class="contenido">

                    <h1>Crea tu cuenta</h1>

                    <form class="formulario-registro" id="registroForm">

                        <div class="campoIzq nombre">
                            <input class="registro__field  nombre-field" type="name" placeholder="Nombre" id="nombre" name="nombre">
                        </div>

                        <div class="campoDer apellido">
                            <input class="registro__field apellido-field" type="name" placeholder="Apellido" id="apellido" name="apellido">
                        </div>


                        <div class="campoIzq email1">
                            <input class="registro__field email-field" type="email" placeholder="Correo Electronico" id="email">
                        </div>

                        <div class="campoDer email2">
                            <input class="registro__field email-field" type="email" placeholder="Confirma el correo electronico" id="email" name="email">
                        </div>


                        <div class="campoIzq contraseña1">
                            <input class="registro__field contraseña-field" type="password" placeholder="Contraseña"
                                id="contraseña" name="contraseña">
                        </div>

                        <div class="campoDer contraseña2">
                            <input class="registro__field contraseña-field" type="password" placeholder="Confirma la contraseña"
                                id="contraseña">
                        </div>

                        <div class="campoIzq boton1">
                            <a href="login.php" class="boton boton--secundario">Login</a>
                        </div>

                        <div class="campoDer boton2">
                            <input type="submit" value="Crear Cuenta" class="boton boton--primario">
                        </div>

                    </form>
                    
                </div> <!-- Fin div contendio-->
            </main><!-- Fin div main-->
        </div><!-- Fin div capa de fondo-->
    </section><!-- Fin fondo-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registroForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: 'registro_procesar.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response === 'success') {
                            alert('Usuario registrado correctamente');
                            window.location.href = 'login.php';
                        } else {
                            alert('Error al registrar el usuario: ' + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la solicitud AJAX: ' + error);
                    }
                });
            });
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






</body>

</html>