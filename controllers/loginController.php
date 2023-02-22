<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Clases\Email;

class loginController
{

    public static  function login(Router $router)
    {
        $errores = [];
        $verificando  = [];
        $auth = new Usuario();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $auth = new Usuario($_POST);

            $errores = $auth->validarLogin();

            if (empty($errores)) {

                $usuario = Usuario::where("email", $auth->email);

                if ($usuario) {

                    $verificando = $usuario->comprobarPassAndVerificado($auth->password);

                    if ($verificando == true) {

                        session_start();

                        $_SESSION["id"] = $usuario->id;
                        $_SESSION["nombre"] = $usuario->nombre;
                        $_SESSION["email"] = $usuario->email;
                        $_SESSION["login"] = true;


                        //redireccionamiento
                        if ($usuario->admin == "1") {
                            $_SESSION["admin"] = $usuario->admin ?? null;
                            header("location: /admin");
                        } else {
                            header("location: /appointment");
                        }
                    }
                } else {
                    Usuario::setAlerta("error", "0");
                }
            }
        }

        $errores =  Usuario::getAlertas();

        $router->render("/auth/login", [
            "errores" => $errores,
            "auth" => $auth,
            "verificando" => $verificando
        ]);
    }

    public static function logout()
    {
        session_start();

        $_SESSION = [];
        header("location: /");
    }

    public static function olvide(Router $router)
    {
     
        $alertas = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarEmail();


            if (empty($alertas)) {

                $usuario = Usuario::where("email", $usuario->email);

                if ($usuario && $usuario->confirmado === "1") {

                    $usuario->crearToken();
                    $usuario->guardar();
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token, "");
                    $email->recuperarEmail();
                    header("location: authenticate_user?id=" . $usuario->id . "");
                } else {
                    Usuario::setAlerta("error", [0]);
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render("/auth/olvide", [
            "alertas" => $alertas
        ]);
    }

    public static function recuperar(Router $router)
    {
        $id = $_GET["id"] ?? "";


        $token = $_GET["token"] ??  "";

        usuarioToken($token, $id, "recover_password", "recuperar");

        $errores = Usuario::getAlertas();


        $router->render("/auth/authenticate_user", [
            "errores" => $errores,
            "token" => $token,
            "id" => $id
        ]);
    }

    public static function cambiar(Router $router)
    {

        $token = $_GET["token"];
        $usuario = new Usuario();
        $usuario = Usuario::where("token", $token);

        if ($usuario) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $password = new Usuario($_POST);

                $errores = $password->validarPass();

                if (empty($errores)) {


                    $usuario->password = "";

                    $usuario->password = $password->password;

                    $usuario->hashPassword();
                    $usuario->token =  "";

                    $resultado = $usuario->guardar();



                    if ($resultado) {

                        header("location: /");
                    }
                }
            }
        } else {
            header("location: /");
        }


        $errores = Usuario::getAlertas();

        $router->render("/auth/recover_password", [
            "token" => $token,
            "errores" => $errores
        ]);
    }

    public static function crear(Router $router)
    {

        $usuario = new Usuario();
        $errores = Usuario::getAlertas();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = new Usuario($_POST);

            $errores = $usuario->validar();

            if (empty($errores)) {
                $resultado = $usuario->validarUsuario();

                if ($resultado->num_rows) {
                    $errores = Usuario::getAlertas();
                } else {
                    //hashear password
                    $usuario->hashPassword();

                    //generar un token unico
                    $usuario->crearToken();

                    //crear guarda
                    $resultado = $usuario->guardar();


                    $resultado = Usuario::where("email", $usuario->email);

                    //enviar el email
                 
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token, $resultado->id);

                    $email->enviarEmail();
                    if ($resultado) {
                        header("Location: /confirm_account?id=" . $resultado->id . "");
                    }
                }
            }
        }

        $router->render("/auth/crear_cuenta", [
            "usuario" => $usuario,
            "errores" => $errores,
        ]);
    }

    public static function activar(Router $router)
    {
        $id = $_GET["id"] ?? "";

        $token = $_GET["token"] ??  "";

        usuarioToken($token, $id, "", "validar");

        $errores = Usuario::getAlertas();

        $router->render("/auth/confirm_account", [
            "errores" => $errores,
            "token" => $token,
            "id" => $id
        ]);
    }
}
