<?php
require_once dirname(__DIR__) . "\\model\\Connection.php";
require_once dirname(__DIR__) . "\\model\\CategoryDAO.php";

// Obtener la categoría seleccionada de la URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Verificar si se seleccionó una categoría
if ($category !== null) {
    $resultado = selectPublications($pdo, $category);
    require_once dirname(__DIR__) . "\\view\\PaginaView.php";
} else {
    // Manejar el caso en que no se seleccionó ninguna categoría
    echo "Seleccione una categoría.";
}

$pdo = null;
?>

