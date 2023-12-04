<?php 
    require_once("../connection/Connection.php");
    //require("../model/UserImpl.php");
    require_once("../controller/CarritoDisplayController.php");

    session_start();

    $products = selectAllProducts($pdo);

    if (isset($_GET["price"])){
        $order = $_GET["price"];
        if ($order == "higher"){
            $products = orderByPriceDesc($products);
        } else if ($order == "lower"){
            $products = orderByPriceAsc($products);
        }
    }
    if (isset($_GET["name"])){
        $order = $_GET["name"];
        if ($order == "az"){
            $products = orderByNameAsc($products);
        } else if ($order == "za"){
            $products = orderByNameDesc($products);
        }
    }
    
    $_SESSION["lastVisited"] = $_SERVER['REQUEST_URI'];


    
    include_once("../view/navbar.php");
    include_once("../index.php");
    include_once("../view/carrito.php");
    $pdo = null;


?>