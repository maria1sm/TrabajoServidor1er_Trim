<?php 
session_start();
require_once("../connection/Connection.php");
require("../model/productImpl.php");
require("../model/serviceImpl.php");

if(!isset($_COOKIE["my_cookie"]) && isset($_GET["type"]) && isset($_GET["id"])) {
    //SET COOKIE
    $cookie_name = "my_cookie";
    //$new_item = ;
    $itemId = $_GET["id"];
    $itemType = $_GET["type"];
    $array =[];
    $assocArray = [
        "type"=>$itemType,
        "id"=>$itemId,
        "quantity"=>1
    ];
    array_push($array, $assocArray);
    $cookie_value = base64_encode(serialize($array));
    setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");
    header("Location: ../controller/IndexController.php");
    echo "A";
} else if (isset($_GET["type"]) && isset($_GET["id"])){
    $itemId = $_GET["id"];
    $itemType = $_GET["type"];
    echo "B";
    $items = unserialize(base64_decode($_COOKIE["my_cookie"]));
    function searchArrayByKeys(&$items, $value1, $value2) {
        $cont = 0;
        foreach ($items as $item) {
            echo "C";

            if ($item["type"] === $value1 && $item["id"] === $value2) {
                echo "D";
                $item["quantity"] = $item["quantity"] + 1;
                
                $items[$cont] = $item;
                $cookieItems = base64_encode(serialize($items));
                setcookie("my_cookie", $cookieItems, time() + (86400 * 2), "/");
                header("Location: ../controller/IndexController.php");
                return true; // Found the associative array
            }
            $cont++;
        }
        return false; // Not found
    }
    $itemExists = searchArrayByKeys($items, $itemType, $itemId);
    if (!$itemExists) {
        echo "E";
        //NewItem push into array
        $assocArray = [
            "type"=>$itemType,
            "id"=>$itemId,
            "quantity"=>1
        ];
        
        array_push($items, $assocArray);
        $cookieItems = base64_encode(serialize($items));
        setcookie("my_cookie", $cookieItems, time() + (86400 * 2), "/");
        header("Location: ../controller/IndexController.php");
    }

}


//header("Location: ".$_SESSION["lastVisited"]);
header("Location: ../controller/IndexController.php");

?>