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
        <div class="px-2 mb-4 d-flex flex-wrap gap-5 flex-row align-items-center ms-auto">  
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="priceDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Category
                </button>
                <ul class="dropdown-menu" aria-labelledby="priceDropdown">
                <li><a class="dropdown-item" href="../controller/CategoryController.php?cat=1">ComputerParts</a></li>
                <li><a class="dropdown-item" href="../controller/CategoryController.php?cat=2">Peripherals</a></li>
                <li><a class="dropdown-item" href="../controller/CategoryController.php?cat=3">Keys</a></li>
                </ul>
            </div>
            <div class="d-flex flex-row ms-auto align-items-center gap-3">
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
    </div>
    <!-- Cart Modal -->
    

    <!--content-->

    <div class="container mb-5" id="product_container">
        <div class="d-flex flex-wrap gap-4 justify-content-around">
            <?php foreach ($products as $pro): ?>
                <?php $catName = getCategoryNameByCategoryId($pdo, $pro->category_id) ?>
                <div class="">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="img-div"><img src="data:image/jpeg;base64,<?= $pro->image; ?>" class="card-img-top" alt="image"></div>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= $pro->name; ?></h5>
                            <p class="card-text"><?= $pro->description; ?></p>
                            <p class="card-text fw-bold"><?= $pro->price."€" ?></p>
                            <p class="card-text">Category: <a href="../controller/CategoryController.php?cat=<?=$pro->category_id?>"><?= $catName; ?></a></p>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <?php if($admin) : ?>
                                <a class="button btn btn-secondary btn-block w-50" href="../controller/ProductCrudController.php?id=<?= $pro->id?>">Edit</a>
                            <?php else: ?>
                                <a class="button btn btn-primary btn-block w-75" href="../controller/CookieController.php?id=<?= $pro->id?>&type=<?= $pro->type?>">Buy Now</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>