<?php 
    session_start();
    
    if (isset($_SESSION["usuario"])) {
        session_destroy();
    }
    $pdo=null;
    header("Location: IndexController.php");
?>