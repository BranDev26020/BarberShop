<?php

namespace Model;

class CitaServicio extends ActiveRecord{
    protected static $tabla = "CitasServicios";
    protected static $columnasDB =  ["id","citaId","servicioId"];

    public $id;
    public $citaId;
    public $servicioId;

    public function __construct($arg=[])
    {
        $this->id = $arg["id"] ?? null;
        $this->citaId = $arg["citaId"] ?? "100";
        $this->servicioId = $arg["servicioId"] ?? "100";
    }
}

?>

