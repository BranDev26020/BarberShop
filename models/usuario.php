<?php

namespace Model;

class Usuario extends ActiveRecord
{

    protected static $tabla = "Usuarios";
    public static $columnasDB =  ["id", "nombre", "apellido", "email", "password", "telefono", "admin", "confirmado", "token"];
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($arg = [])
    {
        $this->id = $arg["id"] ?? null;
        $this->nombre = $arg["nombre"] ?? "";
        $this->apellido = $arg["apellido"] ?? "";
        $this->email = $arg["email"] ?? "";
        $this->password = $arg["password"] ?? "";
        $this->telefono = $arg["telefono"] ?? "";
        $this->admin = $arg["admin"] ?? "0";
        $this->confirmado = $arg["confirmado"] ?? "0";
        $this->token = $arg["token"] ?? "";
    }


    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas[1] = 1;
        }
        if (!$this->apellido) {
            self::$alertas[2] = 2;
        }
        if (!$this->telefono || strlen($this->telefono) < 10) {
            self::$alertas[3] = 3;
        }
        if (!$this->email) {
            self::$alertas[4] = 4;
        }
        if (!filter_var($this->email, FILTER_SANITIZE_EMAIL)) {
            self::$alertas[5] = 5;
        }
        if (!$this->password) {
            self::$alertas[6] = 6;
        }
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $this->password)) {
            self::$alertas[7] = 7;
        }
        return self::$alertas;
    }

    public function validarPass(){
        if (!$this->password) {
            self::$alertas["falta_contrasena"] = 0;
            return self::$alertas;
        }
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $this->password)) {
            self::$alertas["contrasena_no-valida"] = 0;
            return self::$alertas;
        }
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertas[1] = 1;
        }
        if (!$this->password) {
            self::$alertas[2] = 2;
        }
        return self::$alertas;
    }


    public function validarEmail()
    {


        if (!$this->email) {
            self::$alertas[1] = 1;

            return self::$alertas;
        }

        $sanitized_email = filter_var($this->email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas[0] = 0;

            return self::$alertas;
        }
    }

    //valida si existe el usuario
    public function validarUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " where email = '" . $this->email . "' limit 1";
        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas[8] = 8;
        }
        return $resultado;
    }


    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken()
    {
        $this->token = trim(bin2hex(random_bytes(3)));
    }

    public function comprobarPassAndVerificado($password)
    {

        $resultado = password_verify($password, $this->password);



        if (!$resultado) {
            self::$alertas["password_incorrecto"] = "0";

            return self::$alertas;
        }

        if (!$this->confirmado) {
            self::$alertas["error_confirmado"] = "1";
            return self::$alertas;
        }

        return true;
    }

    public function validarToken()
    {
        if (!$this->token) {
            self::$alertas["error_token"] = "1";
        }
        return self::$alertas;
    }
}
