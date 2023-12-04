<?php 
require_once("../connection/Connection.php");

session_start();

if(isset($_GET["empty"])){
    setcookie('my_cookie', '', time() - (86400 * 2 + 1), '/');
}
if(isset($_GET["id"]) && isset($_GET["type"])){
    $itemId = $_GET["id"];
    $itemType = $_GET["type"];
    echo "B";
    $items = unserialize(base64_decode($_COOKIE["my_cookie"]));
    function deleteItemByKeys(&$items, $value1, $value2) {
        $cont = 0;
        foreach ($items as $item) {
            echo "C";

            if ($item["type"] === $value1 && $item["id"] === $value2) {
                echo "D";
                //Unset del item y posiciones
                array_splice($items, $cont, 1);
                //$items[$cont] = $item;
                $cookieItems = base64_encode(serialize($items));
                setcookie("my_cookie", $cookieItems, time() + (86400 * 2), "/");
                header("Location: ".$_SESSION["lastVisited"]);
                // Found the associative array
            }
            $cont++;
        }
    }
    deleteItemByKeys($items, $itemType, $itemId);
}


$pdo = null;
header("Location: ".$_SESSION["lastVisited"]);
//include_once("../view/carrito.php");


?>