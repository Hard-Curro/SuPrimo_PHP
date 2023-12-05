<?php
require_once dirname(__DIR__) . "\\model\\ServiciosDAO.php";
require_once dirname(__DIR__) . "\\model\\Service.php";

session_start();

function selectServices($pdo)
{
    try {
        $statement = $pdo->prepare("SELECT * FROM services");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {

            $image = $p["image"];
            $image2 = base64_encode($image);
            $productos = new Servicio($p["service_id"], $p["ser_name"], $p["ser_description"], $p["price"], $image2);
            array_push($results, $productos);
        }

        return $results;

    } catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

function selectServiceById($pdo, $id)
{
    try {
        $sql = "SELECT * FROM services WHERE service_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        if ($res) {
            $image = $res["image"];
            $base64Image = base64_encode($image);
            $service = new Service(
                $res["service_id"],
                $res["ser_name"],
                $res["ser_description"],
                $res["price"],
                $base64Image
            );
            return $service;
        }
    } catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


?>