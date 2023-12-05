<?php
class Service extends Item
{

    public function __construct($id, $name, $description, $price, $image)
    {
        parent::__construct(2, $id, $name, $description, $price, $image);
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function pushToData($data, $value)
    {
        $this->{$data}[] = $value;
    }

    public function __toString()
    {
        return parent::__toString();
    }
}