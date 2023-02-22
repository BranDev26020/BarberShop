<?php

namespace Model;

class Servicio extends ActiveRecord{

    //BASE DE DATOS
    protected static $tabla = "servicios";
    protected static $columnasDB = ["id", "categoria","nombre", "precio"];

    public $id;
    public $categoria;
    public $nombre;
    public $precio;
    
    public function __construct($arg=[])
    {
        $this->id = $arg["id"] ?? null;
        $this->categoria = $arg["categoria"] ?? "";
        $this->nombre = $arg["nombre"] ?? "";
        $this->precio = $arg["precio"] ?? "";
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas[1] = 1;
        }
        if (!$this->precio) {
            self::$alertas[2] = 2;
        }
        if (!$this->categoria) {
            self::$alertas[3] = 3;
        }
        
        return self::$alertas;
    }
}

?>