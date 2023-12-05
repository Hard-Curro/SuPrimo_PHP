<?php
require_once dirname(__DIR__) . "\\model\\Connection.php";
require("Usuario.php");


function updateUser($pdo) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = $_POST['username'];
    $Gmail = $_POST['email'];
    $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $floor = $_POST['floor'];
    $userId = $_SESSION['usuario']['user_id'];

    try {
        $statement = $pdo->prepare("UPDATE users SET user_name=?, user_password=?, address=?, phone=?, email=?, floor=? WHERE user_id=?");

        $statement->bindParam(1, $Usuario);
        $statement->bindParam(2, $Password);
        $statement->bindParam(3, $address);
        $statement->bindParam(4, $phone);
        $statement->bindParam(5, $Gmail);
        $statement->bindParam(6, $floor);
        $statement->bindParam(7, $userId);


        $statement->execute();

        $results = [] ;
        foreach ($statement->fetchAll() as $p) {

            $objectP = new User($p["id"], $p["username"], $p["email"], $p["password"], $p["address"], $p["phone"], $p["floor"], 1);
            array_push($results, $objectP);
        }
        return $results;
    } catch (PDOException $e) {
        //header("Location: ../errors/error.php");
        exit;
    }

    $pdo = null;
}
}

?>