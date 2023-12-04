<?php
//require_once("../connection/Connection.php");
require("../model/User.php");


function selectUserById($pdo, $userId){
    try {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$userId]);
        $res = $stmt->fetch();
        if ($res) {
            $user = new User($res["user_id"], $res["username"], $res["password"], $res["address"],
            $res["phone"], $res["email"], $res["country"], $res["x_rol_id"]);

            //PENDING
            //Set User Orders array 
            //setUserOrders($pdo, $user);
            return $user;
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

function insertUser($pdo, User $user){
    $sql = "INSERT INTO users VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([0, $user->username, $user->password, $user->address, $user->phone, $user->email, $user->country, $user->role_id]);
    return $stmt;
}
function updatetUser($pdo, User $user){
    $sql = "UPDATE users SET username = ?, password = ?, address = ?, phone = ?, email = ?, country = ? WHERE user_id = $user->user_id;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$user->username, $user->password, $user->address, $user->phone, $user->email, $user->country]);
    return $user;
}



?>