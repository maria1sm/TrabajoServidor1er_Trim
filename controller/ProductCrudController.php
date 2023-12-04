<?php
require_once("../connection/Connection.php");
include_once("../controller/CarritoDisplayController.php");
session_start();
$admin = false;
if(isset($_SESSION["usuario"])){
    if($_SESSION["usuario"]->role_id == 1) {
        $admin = true;
    }
}

if ($admin && isset($_GET["id"])) {
    if(isset($_POST["submit"])){
    $product_name = isset($_POST["product_name"]) ? trim($_POST["product_name"]) : false;
    $pro_description = isset($_POST["pro_description"]) ? trim($_POST["pro_description"]) : false;
    $price = isset($_POST["price"]) ? trim($_POST["price"]) : false;
    $stock = isset($_POST["stock"]) ? trim($_POST["stock"]) : false;
    $x_category_id = isset($_POST["x_category_id"]) ? trim($_POST["x_category_id"]) : false;
    try{
        updateProductById($pdo, $_GET["id"], $product_name, $pro_description, $price, $stock, $x_category_id);
        header("Location: ../controller/IndexController.php");
    } catch (PDOException $e){
        header("Location: ../errors/Error.php");
    }
    } else {
        $idProdEdit = $_GET["id"];
        include("../view/navbar.php");
        include("../view/productEdit.php");
        include("../view/carrito.php");
    }
    
} else {
    header("Location: ../controller/IndexController.php");
}


$pdo = null;
?>