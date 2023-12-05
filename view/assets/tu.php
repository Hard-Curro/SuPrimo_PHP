<?php

try {
    require_once dirname(__DIR__) . "\\model\\Connection.php";
    echo '<br>';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($pdo);
    // Consulta SQL para obtener todas las imágenes de la tabla products
    $sql = "SELECT image FROM products";
    $stmt = $pdo->query($sql);

    // Mostrar las imágenes
    while ($row = $stmt->fetch()) {
        $imageData = $row['image'];
        $base64Image = base64_encode($imageData);

        // Mostrar la imagen en un elemento img
        echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Imagen" /><br>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$pdo = null;

?>