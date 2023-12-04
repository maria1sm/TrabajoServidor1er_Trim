<?php 
require_once("../connection/Connection.php");
require("../model/orderImpl.php");

session_start();
if (!isset($_SESSION["usuario"])){
    echo "A";
    header("Location: ../controller/LoginFormController.php");
} else {
    echo "B";
    insertOrders($pdo);
    //header("Location: ../view/carrito.php");
}
//$_SESSION["lastPage"] = $_SERVER['HTTP_REFERER'];
/*if(!isset($_SESSION["usuario"])){
    header("Location: ../controller/LoginFormController.php");
}*/


$pdo = null;
//include_once("../view/aboutUs.php");


?>