<?php 
require_once("../connection/Connection.php");
require("../model/employeeImpl.php");

session_start();
//$_SESSION["lastPage"] = $_SERVER['HTTP_REFERER'];
/*if(!isset($_SESSION["usuario"])){
    header("Location: ../controller/LoginFormController.php");
}*/
$user = $_SESSION['usuario'];
$employees = selectAllEmployees($pdo);



$pdo = null;
include_once("../view/aboutUs.php");


?>