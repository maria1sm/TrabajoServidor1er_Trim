<?php
//require_once("../connection/Connection.php");
require_once("../model/Order.php");
require_once("../model/productImpl.php");
require_once("../model/serviceImpl.php");
require_once("../model/userImpl.php");

function selectOrderById($pdo, $id){
    try {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        if ($res) {
            $product = new Order($res["product_id"], $res["pro_name"], $res["pro_description"], $res["price"],
            $res["stock"], $res["image"], $res["x_category_id"]);
            return $product;
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}
//SelectOrdersByUserId
function selectOrdersByUserId($pdo, $id) {
    $sql = "SELECT * FROM orders WHERE x_user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $orders = [];
    while ($res = $stmt->fetch()) {
        $order = new Order ($res["order_id"],$res["x_user_id"],$res["order_date"]);
        $orderItems = selectItemsByOrderId($pdo, $order->order_id);
        $order->items = $orderItems;
        array_push($orders, $order);
    }
    return $orders;
}
//SelectItemsByOrderId
function selectItemsByOrderId($pdo, $id) {
    $sql = "SELECT * FROM orderDetails WHERE x_order_id = ('$id')";
    $stmt= $pdo->prepare($sql);
    $stmt->execute();
    $items = [];
    while ($res = $stmt->fetch()) {
        if($res["x_product_id"] != null) {
            $item = selectProductById($pdo, $res["x_product_id"]);
        } else {
            $item = selectServiceById($pdo, $res["x_service_id"]);
        }
        //assoc array to add item quantity
        $item = ["item"=> $item, "quantity"=> $res["quantity"]];
        array_push($items, $item);
    }
    //Returns items con quantity asociada, hay que usar funcion para calcular quantity
    return $items;
}
function getCartItemByTypeId($pdo, $type, $id) {
    if ($type == 1) {
            //Product
            return selectProductById($pdo, $id);
        } elseif ($type == 2) {
            //Service
            return selectServiceById($pdo, $id);
    } else {
        echo "Tipo de item no valido";
    }
}


//TRANSACCION TANTO PARA COOKIES COMO PARA INSERTAR EN ORDER Y ORDER DETAILS    PENDING
function insertOrders($pdo) {
    try{
        $pdo->beginTransaction();
        //INSERT INTO orders
        $sql = "INSERT INTO orders VALUES (0, ?, NOW())";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION["usuario"]->user_id]);
            
            //Crear variable sesion cuando te logueas, check login (fuera del metodo)       PENDING

        //SELECT last id
        $sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $lastOrderId = $stmt->fetch(PDO::FETCH_ASSOC)['order_id'];
        echo "AAAAAAA".$lastOrderId;

        //Cookie foreach Item
        $cookie = unserialize(base64_decode($_COOKIE['my_cookie'])); //Cuidado cookie name
        foreach($cookie as $item){
            //INSERT Order Details
            insertOrderDetails($pdo, $item, $lastOrderId);
        }
        $pdo->commit();
        setcookie('my_cookie', '', time() - (86400 * 2 + 1), '/');
        $pdo = null;
    } catch (PDOException $e)  {
        // Si hay algún error, revertir la transacción
        $pdo->rollBack();
        echo "E";
        echo "Error: ".$e;
    }
    
}
function insertOrderDetails($pdo, $item, $orderId) {
    $sql = "INSERT INTO orderdetails VALUES (?, ?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    if ($item["type"] == 1) {
        $stmt->execute([0,$orderId, $item["id"], null, $item["quantity"]]);
    } elseif ($item["type"] == 2){
        $stmt->execute([0,$orderId, null, $item["id"], $item["quantity"]]);
    }
}

?>