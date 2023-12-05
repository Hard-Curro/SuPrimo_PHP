<?php
require_once dirname(__DIR__) . "\\model\\ProductosDAO.php";

session_start();

function selectPublications($pdo, $category)
{
    try {
        $statement = $pdo->prepare("SELECT * FROM products WHERE x_category_id = :category");
        $statement->bindParam(':category', $category, PDO::PARAM_INT);
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            $image = $p["image"];
            $image2 = productImage($image);
            $productos = new Producto($p["product_id"], $p["pro_name"], $p["pro_description"], $p["price"], $image2, $p["x_category_id"]);
            array_push($results, $productos);

        }

        return $results;

    } catch (PDOException $e) {
        echo "No se ha podido completar la transacción";
    }
}

function productImage($foto)
{
    $base64Image = base64_encode($foto);
    return $base64Image;
}
?>