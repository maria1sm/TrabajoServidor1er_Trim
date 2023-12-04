<?php 
    require_once("../connection/Connection.php");
    require("../model/UserImpl.php");
    require("../model/productImpl.php");
    require("../model/serviceImpl.php");
    require("../model/employeeImpl.php");
    require_once("../model/orderImpl.php");
    /*if(!isset($_COOKIE[$cookie_name])) {
        
    }*/


    session_start();
    //var_dump(json_decode($_COOKIE["order"]));
    /*if(!isset($_SESSION["usuario"])){
        header("Location: ../controller/LoginFormController.php");
    }*/
    //$user = $_SESSION['usuario'];

    //$services = selectAllServices($pdo);
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
    
    //CARRITO

        //var_dump(unserialize(base64_decode($_COOKIE['my_cookie'])));
    //SET Items Carrito from Cookies
        if (isset($_COOKIE['my_cookie'])) {
            $empty = "";
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
            $empty = "Your cart is empty :(";
        }
    


    //$productsCat1 = selectProductsByCategory($pdo, 1);
    //$productsCat1 = orderByNameDesc($productsCat1);
    //$productsCat1 = orderByPriceAsc($productsCat1);

    /*$productsCat2 = selectProductsByCategory($pdo, 2);
    $productsCat3 = selectProductsByCategory($pdo, 3);
    $employees = selectAllEmployees($pdo);*/
    //$service = selectServiceById($pdo, 1);


    $_SESSION["lastVisited"] = $_SERVER['REQUEST_URI'];


    $pdo = null;
    include_once("../index.php");
    include_once("../view/carrito.php");


?>