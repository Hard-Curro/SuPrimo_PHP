<?php
require_once dirname(__DIR__) . "\\model\\Item.php";

class Servicio extends Item
{


    public function __construct($id, $nombre, $descripcion, $precio, $fotos)
    {
        parent::__construct(2, $id, $nombre, $descripcion, $precio, $fotos);

    }

    public function get($atributo)
    {
        return $this->$atributo;
    }
}
?>