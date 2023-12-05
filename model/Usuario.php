<?php

class User
{
    protected $id;
    protected $Usuario;
    protected $Password;
    protected $address;
    public $phone;
    public $Gmail;
    public $floor;


    public function __construct($id, $Usuario, $Password, $address, $phone, $Gmail, $floor)
    {
        $this->id = $id;
        $this->Usuario = $Usuario;
        $this->Password = $Password;
        $this->address = $address;
        $this->phone = $phone;
        $this->Gmail = $Gmail;
        $this->floor = $floor;


    }


    public function __get($atributo)
    {
        return $this->$atributo;
    }

}

?>