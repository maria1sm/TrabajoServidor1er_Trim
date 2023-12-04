<?php 
require_once("../connection/Connection.php");
require_once("../controller/CarritoDisplayController.php");
require("../model/employeeImpl.php");

session_start();
//$_SESSION["lastPage"] = $_SERVER['HTTP_REFERER'];
/*if(!isset($_SESSION["usuario"])){
    header("Location: ../controller/LoginFormController.php");
}*/

//$user = $_SESSION['usuario'];
$employees = selectAllEmployees($pdo);

$_SESSION["lastVisited"] = $_SERVER['REQUEST_URI'];

$pdo = null;
include_once("../view/navbar.php");
include_once("../view/aboutUs.php");
include_once("../view/carrito.php");


?>