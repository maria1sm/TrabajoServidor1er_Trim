<?php 
/*if(!isset($_SESSION["usuario"])){
    header("Location: controller/LoginFormController.php");
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My css -->
    <link href="../view/css/style.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
        defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Icon -->
    <link rel="shortcut icon" href="" type="image/xpng">
    <title>VedruTech</title>
</head>
<body>
<!-- Navbar items -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container px-3">
            <!-- Brand -->
            <a class="navbar-brand  fs-2" href="../controller/IndexController.php"><span class="text-primary fw-bold">Vedru</span>Tech</a>

            <!-- Navbar toggler button for small screens -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto pe-3">
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="IndexController.php">Products</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="ServiceController.php">Services</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="AboutUsController.php">About Us</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="ProfileController.php">User</a>
                    </li>
                </ul>
            </div>

            <!-- Cart icon opening a modal -->
            <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="cartOffcanvas">
                <i class="bi bi-cart"></i>
            </button>
        </div>
    </nav>
</body>
</html>