<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- HEADER -->
    <header>
        <?php require("header.php"); ?>
    </header>

    <!-- FORMULARIO DE INSCRIPCIÓN -->
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Inscribirse a una Sesión</h1>
        <form id="formInscripcion" method="POST">
            <div class="form-group">
                <label for="id_sesion">Seleccione la sesión:</label>
                <select class="form-control" id="id_sesion" name="id_sesion" required>
                    <!-- Opciones de sesión obtenidas de la base de datos -->
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "contraseña", "tfg");
                    $consulta_sesiones = "SELECT ID, Descripcion FROM sesionesentrenamiento WHERE Aforo > 0";
                    $resultado_sesiones = mysqli_query($conexion, $consulta_sesiones);

                    if (mysqli_num_rows($resultado_sesiones) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado_sesiones)) {
                            echo "<option value='" . $fila['ID'] . "'>" . $fila['Descripcion'] . "</option>";
                        }
                    }

                    mysqli_close($conexion);
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Inscribirse</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalInscripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resultado de la inscripción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Mensaje de resultado -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#formInscripcion').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'procesar_inscripcion.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        var result = JSON.parse(response);
                        $('#modalBody').text(result.message);
                        $('#modalInscripcion').modal('show');
                        if (result.success) {
                            setTimeout(function() {
                                window.location.href = 'sesiones.php';
                            }, 3000); // Redirige después de 3 segundos
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
