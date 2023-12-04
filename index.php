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
    <link href="/view/css/style.css" rel="stylesheet" type="text/css"/>
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
            <a class="navbar-brand  fs-2" href="#"><span class="text-primary fw-bold">Vedru</span>Tech</a>

            <!-- Navbar toggler button for small screens -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="IndexController.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Cart icon opening a modal -->
            <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="cartOffcanvas">
                <i class="bi bi-cart"></i>
            </button>
        </div>
    </nav>
    <!-- ORDER BY -->
    <div class="container mt-5">
        <div class=" px-2 mb-4 d-flex flex-row gap-5 flex-row align-items-center ms-auto">

            <p class="fw-bold m-0 ms-auto">Order By:</p>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="priceDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Price
                </button>
                <ul class="dropdown-menu" aria-labelledby="priceDropdown">
                <li><a class="dropdown-item" href="?price=higher">Higher Price</a></li>
                <li><a class="dropdown-item" href="?price=lower">Lower Price</a></li>
                </ul>
            </div>


            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="nameDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Name
                </button>
                <ul class="dropdown-menu" aria-labelledby="nameDropdown">
                <li><a class="dropdown-item" href="?name=az">A-Z</a></li>
                <li><a class="dropdown-item" href="?name=za">Z-A</a></li>
                </ul>
            </div>
            <div>
                <a class="btn btn-secondary button" href="?">Reset</a>
            </div>
        </div>
    </div>
    <!-- Cart Modal -->
    

    <!--content-->

    <div class="container mb-5" id="product_container">
        <div class="d-flex flex-wrap gap-4 justify-content-around">
            <?php foreach ($products as $pro): ?>
                <div class="">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="img-div"><img src="data:image/jpeg;base64,<?= $pro->image; ?>" class="card-img-top" alt="image"></div>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= $pro->name; ?></h5>
                            <p class="card-text"><?= $pro->description; ?></p>
                            <p class="card-text fw-bold"><?= $pro->price."€" ?></p>
                            <p class="card-text">Category: <?= $pro->category_id; ?></p>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <a class="button btn btn-primary btn-block w-75" href="../controller/CookieController.php?id=<?= $pro->id?>&type=<?= $pro->type?>">Buy Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>