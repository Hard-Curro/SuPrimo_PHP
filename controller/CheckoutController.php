<?php 
require_once dirname(__DIR__) . "\\model\\Connection.php";
require_once dirname(__DIR__) . "\\model\\OrderImplDAO.php";

var_dump($_SESSION["usuario"]);
if (!isset($_SESSION["usuario"])){
    echo "A";
    header("Location: ../controller/LoginController.php");
} else {
    echo "B";
    insertOrders($pdo);
}



$pdo = null;


?>