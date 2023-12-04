<?php 

if(!isset($user)){
    header("Location: ../controller/LoginFormController.php");
}
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
    <div class="container my-5" id="profile_container">
        <div class="d-flex flex-wrap gap-4 justify-content-around">
            <div class="">
                <div class="card h-100" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">User Profile</h5>
                        <p class="card-text">Username: <?= $user->username; ?></p>
                        <p class="card-text">Email: <?= $user->email; ?></p>
                        <p class="card-text">Phone: <?= $user->phone?></p>
                        <p class="card-text">Address: <?= $user->address; ?></p>
                        <p class="card-text">Country: <?= $user->country; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-5 my-4">
            <a href="../controller/EditUserController.php" class="button btn btn-primary">Edit Profile</a>
            <a href="../controller/LogoutController.php" class="button btn btn-danger">Logout</a>
        </div>
        
    </div>
    
    <div class="container mb-5" id="purchases_container">
        <h3>Old Purchases</h3>
        <div class="d-flex flex-column gap-4">
    <?php foreach ($purchases as $cart): ?>
        <div class="accordion" id="accordion<?= $cart->order_id ?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-text fw-bold">Cart id: <?= $cart->order_id ?></p>
                    <p class="card-text">Date: <?= $cart->order_date ?></p>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $cart->order_id ?>" aria-expanded="false" aria-controls="collapse<?= $cart->order_id ?>">
                        Show Cart Items
                    </button>
                </div>
            </div>
            <div id="collapse<?= $cart->order_id ?>" class="collapse">
                <div class="d-flex flex-wrap align-items-center gap-4 mt-3">
                    <?php $totalPrice = 0; ?>
                    <?php foreach ($cart->items as $item): ?>
                        <?php $totalPrice += $item["item"]->price * $item["quantity"]; ?>
                        <div class="card h-100" style="width: 18rem;">
                            <div class="img-div">
                                <img src="data:image/jpeg;base64,<?= $item["item"]->image; ?>" class="card-img-top" alt="image">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $item["item"]->name; ?></h5>
                                <p class="card-text"><?= $item["item"]->description; ?></p>
                                <p class="card-text fw-bold"><?= $item["item"]->price * $item["quantity"] . "€" ?></p>
                                <p class="card-text">Quantity: <?= $item["quantity"]; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="fw-bold">Total Price: <?= $totalPrice . "€" ?></p>
            </div>
        </div>
        <hr class="w-100">
    <?php endforeach; ?>
</div>

    </div>

</body>
</html>