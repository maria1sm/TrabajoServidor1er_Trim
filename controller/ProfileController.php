<?php
require_once("../connection/Connection.php");
require_once("../controller/CarritoDisplayController.php");
session_start();
if (!isset($_SESSION["usuario"])){
    header("Location: ../controller/LoginFormController.php");
}
$user = $_SESSION["usuario"];
$purchases = selectOrdersByUserId($pdo, $user->user_id);

$_SESSION["lastVisited"] = $_SERVER['REQUEST_URI'];


require_once("../view/navbar.php");
require_once("../view/carrito.php");
require_once("../view/profile.php");
$pdo = null;
?>