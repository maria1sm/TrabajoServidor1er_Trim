<?php 
    require_once("../connection/Connection.php");
    require_once("../controller/CarritoDisplayController.php");
    /*if(!isset($_COOKIE[$cookie_name])) {
        
    }*/


    session_start();
    //var_dump(json_decode($_COOKIE["order"]));
    /*if(!isset($_SESSION["usuario"])){
        header("Location: ../controller/LoginFormController.php");
    }*/
    //$user = $_SESSION['usuario'];

    $services = selectAllServices($pdo);

    if (isset($_GET["price"])){
        $order = $_GET["price"];
        if ($order == "higher"){
            $services = orderByPriceDesc($services);
        } else if ($order == "lower"){
            $services = orderByPriceAsc($services);
        }
    }
    if (isset($_GET["name"])){
        $order = $_GET["name"];
        if ($order == "az"){
            $services = orderByNameAsc($services);
        } else if ($order == "za"){
            $services = orderByNameDesc($services);
        }
    }
    
    //$productsCat1 = selectProductsByCategory($pdo, 1);
    //$productsCat1 = orderByNameDesc($productsCat1);
    //$productsCat1 = orderByPriceAsc($productsCat1);

    /*$productsCat2 = selectProductsByCategory($pdo, 2);
    $productsCat3 = selectProductsByCategory($pdo, 3);
    $employees = selectAllEmployees($pdo);*/
    //$service = selectServiceById($pdo, 1);


    $_SESSION["lastVisited"] = $_SERVER['REQUEST_URI'];

    //AdminCRUD
    $admin = false;
    if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]->role_id == 1) {
            $admin = true;
        }
    }

    $pdo = null;
    include_once("../view/navbar.php");
    include_once("../view/services.php");
    include_once("../view/carrito.php");


?>