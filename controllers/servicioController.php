<?php

namespace Controllers;

use Model\Servicio;
use Model\Usuario;
use MVC\Router;

class servicioController
{


    public static function index(Router $router)
    {
        session_start();
        isAdmin();
        $servicios = Servicio::all();

        $router->render("servicios/index", [
            "servicios" => $servicios
        ]);
    }

    public static function crear(Router $router)
    {
        session_start();
        isAdmin();
        $errores = [];
        $servicio = new Servicio();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $servicio->sincronizar($_POST);
            $errores = $servicio->validar();


            if (empty($errores)) {

                $servicio->guardar();
                header("location: /services");
            }
        }
        $router->render("servicios/crear", [
            "errores" => $errores,
            "servicio" => $servicio
        ]);
    }


    public static function actualizar(Router $router)
    {
        session_start();
        isAdmin();
        $errores = [];
        if (!is_numeric($_GET["id"])) {
            header("location: /services");
        }
        $servicio = Servicio::find($_GET["id"]);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $servicio->sincronizar($_POST);
            $errores = $servicio->validar();

            if (empty($errores)) {
                $servicio->guardar();
                header("location: /services");
            }
        }

        $router->render("servicios/actualizar", [
            "servicio" => $servicio,
            "errores" => $errores
        ]);
    }


    public static function eliminar(Router $router)
    {
        isAdmin();
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_POST["id"];
            if (is_numeric($id)) {
                $servicio = Servicio::find($id);
                $servicio->eliminar();
                header("location: /services");
            }
        }
    }
}
