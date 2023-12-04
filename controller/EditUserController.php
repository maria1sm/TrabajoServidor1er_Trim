<?php 
require_once("../connection/Connection.php");
require_once("../controller/CarritoDisplayController.php");

session_start();
if (isset($_SESSION["usuario"])){
    if(isset($_POST["submit"])){
        $username = isset($_POST["username"]) ? trim($_POST["username"]) : false;
        $mail = isset($_POST["mail"]) ? trim($_POST["mail"]) : false;
        $pass = isset($_POST["password"]) ? trim($_POST["password"]) : false;
        $address = isset($_POST["address"]) ?trim($_POST["address"]) : false;
        $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : false;
        $country = isset($_POST["country"]) ? trim($_POST["country"]) : false;
        echo $mail;

        $arrayErrores = array();
        //Hacemos validadores necesarios
        if (!empty($username) && !is_numeric($username)) {
            $usernameValidado = true;
        } else {
            $usernameValidado = false;
            $arrayErrores["username"] = "El username no es valido";
        }

        /*Prevent SQL Injection*/
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username= ?");
        $stmt->execute([$username]);
        $rowCount = $stmt->rowCount();

        if ($usernameValidado && $rowCount > 0 && !($username == $_SESSION["usuario"]->username)){
            $usernameValidado = false;
            $arrayErrores["username"] = "Este username ya está en uso".$rowCount.$username;
        }

        if (!empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailValidado = true;
        } else {
            $mailValidado = false;
            echo $mail;
            $arrayErrores["mail"] = "El mail no es valido".$mail;
        }
        /*Prevent SQL Injection PENDING*/
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$mail]);
        $rowCount = $stmt->rowCount();

        if ($mailValidado && $rowCount > 0 && !($mail == $_SESSION["usuario"]->email)) {
            $mailValidado = false;
            $arrayErrores["mail"] = "Este mail ya ha sido registrado";
        }

        if (!empty($pass)) {
            $passValidado = true;
        } else {
            $passValidado = false;
            $arrayErrores["password"] = "El password no es valido";
        }

        $guardarUsuario = false;
        if(count($arrayErrores) === 0) {
            $guardarUsuario = true;
            
            $passSegura = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 4]);
 
            
            //Insert user on userImpl
            $userEdited = new User($_SESSION["usuario"]->user_id, $username, $passSegura, $address, $phone, $mail, $country, $_SESSION["usuario"]->role_id);
            $userEdited = updatetUser($pdo, $userEdited);
            $_SESSION["usuario"] = $userEdited;

            if ($stmt) {
                header("Location: ../controller/ProfileController.php");
            } else {
                header("Location: ../errors/Error.php");
            }
        } else {
            $_SESSION["errores"] = $arrayErrores;
            header("Location: ../errors/Error.php");
            //echo $username;
            //var_dump($_SESSION["errores"]);
        }
    } else {
        include("../view/navbar.php");
        include("../view/editUser.php");
        include("../view/carrito.php");
    }
} else {
    header("Location: ../controller/LoginFormController.php");
}
$pdo=null;
?>