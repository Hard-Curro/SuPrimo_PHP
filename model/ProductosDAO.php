<?php
require_once dirname(__DIR__) . "\\model\\Item.php";

class Producto extends Item
{

    protected $category_id;
    protected $stock;

    public function __construct($id, $nombre, $descripcion, $precio, $fotos, $category_id)
    {
        parent::__construct(1, $id, $nombre, $descripcion, $precio, $fotos);
        $this->category_id = $category_id;
    }
    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __toString()
    {
        return parent::__toString() . " " . $this->stock . " " . $this->category_id;
    }
}
?>