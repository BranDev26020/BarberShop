<?php

namespace Model;

class AdminCita extends ActiveRecord{

    protected static $tabla = "usuarios";
    protected static $columnasDB = ["id","nombre","telefono","hora","servicio", "precio"];


    public $id;
    public $nombre;
    public $telefono;
    public $hora;
    public $servicio;
    public $precio;

    public function __construct($arg = [])
    {
        $this->id = $arg["id"] ?? null;
        $this->nombre  = $arg["nombre"] ??  "";
        $this->telefono = $arg["telefono"] ?? "";
        $this->hora = $arg["hora"] ?? "";
        $this->servicio = $arg["servicio"] ?? "";
        $this->precio = $arg["precio"] ?? "";
    }


}


?>