<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .carousel-item img {
            max-width: 100%;
            height: auto;
            margin: auto;
        }

        @media (min-width: 768px) {
            .carousel-inner {
                height: 400px; /* Ajusta la altura del carrusel en pantallas grandes */
            }
            
            .carousel-item img {
                max-height: 400px; /* Ajusta la altura máxima de las imágenes en pantallas grandes */
                object-fit: cover; /* Asegura que las imágenes se ajusten y se centren */
                object-position: center; /* Centra la imagen en el contenedor */
            }
        }

        @media (max-width: 767px) {
            .carousel-inner {
                height: auto; /* Altura automática en pantallas pequeñas */
            }
            
            .carousel-item img {
                max-height: none; /* No limitar la altura máxima en pantallas pequeñas */
            }
        }
    </style>
    <!-- Incluye los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/w.jpg" alt="First slide"> 
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/mike.jpg" alt="Second slide"> 
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/killer.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Incluye los archivos JS de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
