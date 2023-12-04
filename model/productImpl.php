<?php
//require_once("../connection/Connection.php");
require_once("../model/Product.php");

function selectProductById($pdo, $id){
    try {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        if ($res) {
            $imageData = $res["image"];
            $base64Image = base64_encode($imageData);
            $product = new Product($res["product_id"], $res["pro_name"], $res["pro_description"], $res["price"],
            $res["stock"], $base64Image, $res["x_category_id"]);
            return $product;
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}
function getCategoryNameByCategoryId($pdo, $categoryId){
    try {
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$categoryId]);
        $res = $stmt->fetch();

        if ($res) {
            return $res["name"]; //return category name
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "No se ha podido completar la transacción";
    }
}
function selectAllProducts($pdo){
    try {
        $sql = "SELECT * FROM products";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        while ($res = $stmt->fetch()) {
            $imageData = $res["image"];
            $base64Image = base64_encode($imageData);
            $product = new Product(
                $res["product_id"],
                $res["pro_name"],
                $res["pro_description"],
                $res["price"],
                $res["stock"],
                $base64Image,
                $res["x_category_id"]
            );
            $products[] = $product;
        }
        return $products;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}
function selectProductsByCategory($pdo, $categoryId){
    try {
        $sql = "SELECT * FROM products WHERE x_category_id = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$categoryId]);
        while ($res = $stmt->fetch()) {
            $imageData = $res["image"];
            $base64Image = base64_encode($imageData);
            $product = new Product(
                $res["product_id"],
                $res["pro_name"],
                $res["pro_description"],
                $res["price"],
                $res["stock"],
                $base64Image,
                $res["x_category_id"]
            );
            $products[] = $product;
        }
        return $products;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

function orderByPriceAsc($array){
    usort($array, array('Product','compareByPriceAsc'));
    return $array;
}
function orderByPriceDesc($array){
    usort($array, array('Product','compareByPriceDesc'));
    return $array;
}
function orderByNameAsc($array){
    usort($array, array('Product','compareByNameAsc'));
    return $array;
}
function orderByNameDesc($array){
    usort($array, array('Product','compareByNameDesc'));
    return $array;
}

//usort($array, array('Product','compareByPriceAsc'));

function productImage($img){
    $base64Image = base64_encode($img);
    return $base64Image;
}

?>