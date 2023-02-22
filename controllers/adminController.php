<?php

namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController
{

    public static function index(Router $router)
    {
        session_start();

        isAdmin();

        date_default_timezone_set('America/New_York');
        $fecha = $_GET["date"] ?? date('Y-m-d');
        $validarFecha = explode("-", $fecha);
     
        if(!checkdate($validarFecha[1], $validarFecha[2], $validarFecha[0])){
            header("location: /404");
        }   

        //consultar la base de datos 
        $consulta = "SELECT citas.id, concat(usuarios.nombre,' ', usuarios.apellido) as nombre, ";
        $consulta .= "usuarios.telefono, usuarios.telefono,concat( citas.hora,'. ' ,' Date: ' , citas.fecha) as hora, servicios.nombre as servicio, servicios.precio";
        $consulta .= " FROM usuarios ";
        $consulta .= " INNER JOIN citas ";
        $consulta .= " ON citas.usuarioId = usuarios.Id ";
        $consulta .= " INNER JOIN citasServicios ";
        $consulta .= " ON citas.id = citasServicios.citaId";
        $consulta .= " INNER JOIN servicios";
        $consulta .= " ON servicios.id = citasServicios.servicioId ";
        $consulta .= " WHERE fecha =  '{$fecha}' ";

        $citas = AdminCita::SQL($consulta);



        $router->render("admin/index", [
            "citas" => $citas,
            "fecha" => $fecha
        ]);
    }
}
