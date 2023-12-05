<?php
//require_once("../connection/Connection.php");
require_once dirname(__DIR__) . "\\model\\Order.php";
require_once dirname(__DIR__) . "\\model\\PaginaDAO.php";
require_once dirname(__DIR__) . "\\model\\ServicesDAO.php";


//TRANSACCION TANTO PARA COOKIES COMO PARA INSERTAR EN ORDER Y ORDER DETAILS    PENDING
function insertOrders($pdo) {
    try{
        $pdo->beginTransaction();
        //INSERT INTO orders
        $sql = "INSERT INTO orders VALUES (0, ?, NOW())";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION["usuario"]["user_id"]]);
            
            //Crear variable sesion cuando te logueas, check login (fuera del metodo)       PENDING

        //SELECT last id
        $sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $lastOrderId = $stmt->fetch(PDO::FETCH_ASSOC)['order_id'];
        echo "AAAAAAA".$lastOrderId;

        //Cookie foreach Item
        $cookie = unserialize(base64_decode($_COOKIE['cookieGod'])); //Cuidado cookie name
        foreach($cookie as $item){
            //INSERT Order Details
            insertOrderDetails($pdo, $item, $lastOrderId);
        }
        $pdo->commit();
        setcookie('cookieGod', '', time() - (86400 * 2 + 1), '/');
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