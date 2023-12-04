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
    $service_name = isset($_POST["service_name"]) ? trim($_POST["service_name"]) : false;
    $serv_description = isset($_POST["serv_description"]) ? trim($_POST["serv_description"]) : false;
    $serv_price = isset($_POST["serv_price"]) ? trim($_POST["serv_price"]) : false;
    try{
        updateServiceById($pdo, $_GET["id"], $service_name, $serv_description, $serv_price);
        header("Location: ../controller/ServiceController.php");
    } catch (PDOException $e){
        header("Location: ../errors/Error.php");
    }
    } else {
        $idServEdit = $_GET["id"];
        include("../view/navbar.php");
        include("../view/serviceEdit.php");
        include("../view/carrito.php");
    }
    
} else {
    header("Location: ../controller/IndexController.php");
}


$pdo = null;
?>