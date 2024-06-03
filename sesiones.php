<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones de Entrenamiento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-responsive {
            margin-top: 20px;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle !important;
        }

        .table th,
        .table td {
            border-top: none;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <header>
        <?php require ("header.php"); ?>
    </header>
    <?php require ("carrousel.php"); ?>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Sesiones de Entrenamiento</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Hora</th>
                        <th scope="col" class="text-center">Entrenador</th>
                        <th scope="col" class="text-center">Duración</th>
                        <th scope="col" class="text-center">Descripción</th>
                        <th scope="col" class="text-center">Aforo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "contraseña", "tfg");
                    if (!$conexion) {
                        die("La conexión falló: " . mysqli_connect_error());
                    }
                    $consulta = "SELECT SesionesEntrenamiento.ID, FechaSesion, Entrenadores.Nombre AS NombreEntrenador, Duracion, Descripcion, Aforo 
                                 FROM SesionesEntrenamiento 
                                 INNER JOIN Entrenadores ON SesionesEntrenamiento.IDEntrenador = Entrenadores.ID";
                    $resultado = mysqli_query($conexion, $consulta);
                    if (mysqli_num_rows($resultado) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $fila['FechaSesion'] . "</td>";
                            echo "<td>" . $fila['NombreEntrenador'] . "</td>";
                            echo "<td>" . $fila['Duracion'] . "</td>";
                            echo "<td>" . $fila['Descripcion'] . "</td>";
                            echo "<td>" . $fila['Aforo'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron sesiones de entrenamiento.</td></tr>";
                    }
                    mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <form method="POST" action="inscribir.php">
                <button type="submit" class="btn btn-primary btn-lg">Inscribirse a una clase</button>
            </form>
        </div>

    </div>
    <div class="espaciado">
        <?php require ("footer.php"); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>