<?php
require_once dirname(__DIR__) . "\\model\\ProductosDAO.php";

function selectPublications($pdo, $orderBy = "product_id", $orderDirection = "ASC") {
    try {
        $statement = $pdo->prepare("SELECT * FROM products ORDER BY $orderBy $orderDirection");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            $image = $p["image"];
            $image2 = productImage($image);
            $productos = new Producto($p["product_id"], $p["pro_name"], $p["pro_description"], $p["price"], $image2, $p["x_category_id"]);
            array_push($results, $productos);
        }
        //$id, $nombre, $descripcion, $precio, $stock, $fotos, $category_id
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

function selectProductById($pdo, $id){
    try {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        if ($res) {
            $imageData = $res["image"];
            $image2 = base64_encode($imageData);
            $product = new Producto($res["product_id"], $res["pro_name"], $res["pro_description"], $res["price"],
            $image2, $res["x_category_id"]);
            return $product;
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}
?>

