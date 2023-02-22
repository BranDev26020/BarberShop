<?php
use Model\Usuario;
use Clases\Email;

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {

    if (is_null($html)) {
        return '';
    }

    if (isset($html)) {
        $html = htmlspecialchars($html);
    }

    return $html;
}


function usuarioToken($token, $id, $enlace, $tipo){

 

    if ($token !== "") {
    
        $usuario = Usuario::where("token", $token);
        if (empty($usuario)) {
            $errores = Usuario::setAlerta("error", "token");
        } else {
            $usuario->confirmado = "1";
            if($tipo == "validar"){
                $usuario->token = "";
            }
            $usuario->guardar();
            header("location: /".$enlace."?token=".$token."");
        }
    }

    if (isset($_POST["submit1"])) {
        //buscar usuario
        $usuario = Usuario::find($id);
   
        //crear token
        $usuario->crearToken();
        //enviar email
    
        $email = new Email($usuario->nombre, $usuario->email, $usuario->token, $usuario->id);
        if($tipo == "recuperar"){
            $email->recuperarEmail();
        }else{
            $email->enviarEmail();
        }
        //guardar
        $usuario->guardar();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $usuario = new Usuario($_POST);

        $errores = $usuario->validarToken();

        if (empty($errores)) {
            $usuario = Usuario::where("token", $usuario->token);
          
          
            if (empty($usuario)) {
                $errores = Usuario::setAlerta("error", "token");
                
            } else {
                $usuario->confirmado = "1";
                if($tipo == "validar"){
                    $usuario->token = "";
                }
                $usuario->guardar();
         
                header("location: /".$enlace."?token=".$usuario->token."");
            }
        }
    }
}

//funcion que rrevisa usuario autentificado
function isAuth():void{

    if(!isset($_SESSION["login"])){
        header("location: /");
    }

}

function isAdmin():void{
    if(!isset($_SESSION["admin"])){
        header("location: /");
    }
}