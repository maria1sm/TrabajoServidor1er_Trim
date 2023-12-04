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
    
    <!-- Icon -->
    <link rel="shortcut icon" href="" type="image/xpng">
    <title>VedruTech</title>
</head>
<body>
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

    <div class="container mb-5" id="service_container">
        <div class="d-flex flex-wrap gap-4 justify-content-around">
            <?php foreach ($services as $ser): ?>
                <div class="">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="img-div"><img src="data:image/jpeg;base64,<?= $ser->image; ?>" class="card-img-top" alt="image"></div>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= $ser->name; ?></h5>
                            <p class="card-text"><?= $ser->description; ?></p>
                            <p class="card-text fw-bold"><?= $ser->price."€" ?></p>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <a class="button btn btn-primary btn-block w-75" href="../controller/CookieController.php?id=<?= $ser->id?>&type=<?= $ser->type?>">Buy Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>