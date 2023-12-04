<?php 
    require_once("../connection/Connection.php");
    require_once("../controller/CarritoDisplayController.php");
    
    session_start();
    

    if (isset($_GET["cat"]) && ($_GET["cat"] > 0 && $_GET["cat"] < 4)) {
        $category = $_GET["cat"];
        $_SESSION["prodCategory"] = $category;
    } else if (!isset($_SESSION["prodCategory"])){
        header ("Location: ../controller/IndexController.php");
    } else {
        $category = $_SESSION["prodCategory"];
    }

    $productsCat = selectProductsByCategory($pdo,$category);
    
    if (isset($_GET["price"])){
        $order = $_GET["price"];
        if ($order == "higher"){
            $productsCat = orderByPriceDesc($productsCat);
        } else if ($order == "lower"){
            $productsCat = orderByPriceAsc($productsCat);
        }
    }
    if (isset($_GET["name"])){
        $order = $_GET["name"];
        if ($order == "az"){
            $productsCat = orderByNameAsc($productsCat);
        } else if ($order == "za"){
            $productsCat = orderByNameDesc($productsCat);
        }
    }

    $_SESSION["lastVisited"] = $_SERVER['REQUEST_URI'];

    //AdminCRUD
    $admin = false;
    if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]->role_id == 1) {
            $admin = true;
        }
    }
    
    include_once("../view/navbar.php");
    include_once("../view/category.php");
    include_once("../view/carrito.php");
    $pdo = null;


?>