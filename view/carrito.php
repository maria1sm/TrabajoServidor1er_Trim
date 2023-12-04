<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My css -->
    <link href="../view/css/style.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    
    <!-- Icon -->
    <link rel="shortcut icon" href="" type="image/xpng">
    <title>VedruTech</title>
</head>
<body>
    <?php /*
    require_once("../connection/Connection.php");
    require_once("../model/orderImpl.php");
        var_dump(unserialize(base64_decode($_COOKIE['my_cookie'])));
    //SET Items Carrito from Cookies
        if (isset($_COOKIE['my_cookie'])) {
            // Decode and unserialize the data
            $decodedData = unserialize(base64_decode($_COOKIE['my_cookie']));
            $items = [];
            foreach($decodedData as $item){
                if($item["type"] == 1){
                    $prod = selectProductById($pdo, $item["id"]);
                    $item = [
                        "item"=>$prod,
                        "quantity"=>$item["quantity"]
                    ];
                    array_push($items, $item);
                } else {
                    $serv = selectServiceById($pdo, $item["id"]);
                    $item = [
                        "item"=>$serv,
                        "quantity"=>$item["quantity"]
                    ];
                    array_push($items, $item);
                }
            }
            // Use the data as needed
        } else {
            echo "Cart is empty :(";
        }
*/
        

    //CARRITO
    
    ?>
    <!-- View Cart Items -->
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="cartOffcanvasLabel">Shopping Cart</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0 overflow-auto">
                    <!-- Cart content -->
                    <div class="d-flex flex-wrap gap-4 justify-content-around">
                        <hr class="w-100">
                        <?php if (isset($_COOKIE['my_cookie'])): ?>
                            <?php $totalPrice = 0;?>
                                <?php foreach ($items as $item): ?>
                                    <?php
                                        $pro = $item["item"];
                                        $totalPrice+= $item["quantity"]*$pro->price;
                                    ?>
                                    
                                    <div class="card cart-card border-0 p-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <div class="img-div"><img src="data:image/jpeg;base64,<?= $pro->image?>" class="img-fluid rounded-start" alt="image"></div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $pro->name; ?></h5>
                                                    <p class="card-text"><?= $pro->description; ?></p>
                                                    <p class="card-text fw-bold"><?= $pro->price*$item["quantity"]."€" ?></p>
                                                    <div class="d-flex justify-content-between">
                                                        <p class="card-text fw-bold"><?= "Quantity: ".$item["quantity"] ?></p>
                                                        <a class="delete-icon" href="../controller/CartController.php?id=<?= $pro->id?>&type=<?= $pro->type?>"><i class="bi bi-plus-circle-fill"></i></a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <hr class="w-100">
                                <?php endforeach; ?>
                            <div class="d-flex flex-column w-100 p-3">
                                    <p><?= "Total price: ".$totalPrice."€"?></p>
                                    <a href="../controller/CartController.php?empty">Empty Cart</a>
                            </div>
                                
                                
                            <?php endif ?>
                            <p class="text-center w-100"><?=$empty?></p>
                    </div>
                </div>
                <div class="modal-footer mb-5 mx-auto mt-3">
                    <a type="button" class="btn btn-primary button" href="CheckoutController.php">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>