<?php
require_once dirname(__DIR__) . "\\model\\Connection.php";
require("Usuario.php");


function createUser($pdo)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Usuario = $_POST['username'];
        $Gmail = $_POST['email'];
        $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $floor = $_POST['floor'];

        try {
            $statement = $pdo->prepare("INSERT INTO users VALUES ( 0, (?) , (?), (?), (?) , (?), (?) , 1)");

            $statement->bindParam(1, $Usuario);
            $statement->bindParam(2, $Password);
            $statement->bindParam(3, $address);
            $statement->bindParam(4, $phone);
            $statement->bindParam(5, $Gmail);
            $statement->bindParam(6, $floor);


            $statement->execute();

            $results = [];
            foreach ($statement->fetchAll() as $p) {

                $objectP = new User($p["id"], $p["username"], $p["email"], $p["password"], $p["address"], $p["phone"], $p["floor"], 1);
                array_push($results, $objectP);
            }
            return $results;
        } catch (PDOException $e) {
            exit;
        }

        $pdo = null;
    }
}

?>