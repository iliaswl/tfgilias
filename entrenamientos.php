<?php
session_start();
require 'econfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrenamientos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header class="container">
        <?php require 'header.php'; ?>
    </header>
    <?php require 'carrousel.php'; ?>
    <!-- Titulo -->
    <h2 class="espaciado text-center mb-4">Entrenamientos</h2>

    <!-- Videos entreno -->
    <div class="container py-5">
        <div class="row mt-5" id="trainingCards">
            <?php
            $stmt = $pdo->query("SELECT * FROM entrenamientos");
            $count = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hidden = $count >= 3 ? 'd-none' : '';
                ?>
                <div class="col-lg-4 col-sm-12 col-md-6 mb-3 training-card <?php echo $hidden; ?>">
                    <div class="card bg-danger border-dark h-100 d-flex flex-column">
                        <img class="img" src="<?php echo htmlspecialchars($row['imagen']); ?>"
                            alt="<?php echo htmlspecialchars($row['titulo']); ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-light text-center"><?php echo htmlspecialchars($row['titulo']); ?>
                            </h5>
                            <p class="card-text text-light"><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <a href="<?php echo htmlspecialchars($row['link']); ?>"
                                class="btn btn-dark text-warning mt-auto">Link</a>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
            }
            ?>
        </div>
        <div class="text-center mt-4">
            <button id="showMoreBtn" class="btn btn-primary">Ver Más...</button>
        </div>
    </div>

    <!-- FOOTER -->
    <?php require 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const showMoreBtn = document.getElementById("showMoreBtn");
            const trainingCards = document.querySelectorAll(".training-card.d-none");

            showMoreBtn.addEventListener("click", function () {
                trainingCards.forEach(card => {
                    card.classList.remove("d-none");
                });
                showMoreBtn.style.display = "none"; // Ocultar el botón después de mostrar todas las cards
            });
        });
    </script>
</body>

</html>