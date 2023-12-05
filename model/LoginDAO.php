<?php
session_start();
require_once dirname(__DIR__) . "\\model\\Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = $_POST['username'];
    $Password = $_POST['password'];

    $result = $pdo->query("SELECT * FROM users WHERE user_name=('$Usuario')");


    $row = $result->fetch(PDO::FETCH_ASSOC);

    if (password_verify($Password, $row['user_password'])) {
        $_SESSION['usuario'] = $row;
        header("Location: ../index.php");
        exit;

    } else {
        header("Location: ../controller/LoginController.php");  
        exit;
    }
    $pdo = null;
}

?>
