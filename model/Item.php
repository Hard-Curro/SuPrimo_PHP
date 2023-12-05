<?php
abstract class Item {
    protected $type;
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    protected $fotos;

    public function __construct($type, $id, $nombre, $descripcion, $precio, $fotos){
        $this->type = $type;
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->fotos = $fotos;
    }

   
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
    
    public function pushToData($data,$value) {
        $this->{$data}[] = $value;
    }

    public function __toString(){
        return $this->type." ".$this->id." ".$this->nombre." ".$this->descripcion." ".$this->precio." ".$this->fotos;
    }
}
?>