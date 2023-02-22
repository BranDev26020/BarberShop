<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\apiController;
use Controllers\citaController;
use MVC\Router;
use Controllers\loginController;
use Controllers\servicioController;

$router = new Router();

//iniciar sesion
$router->get("/", [loginController::class, 'login']);
$router->post("/", [loginController::class, 'login']);

$router->get("/logout", [loginController::class, 'logout']);

//recuperar pass
$router->get("/forgot_password", [loginController::class, 'olvide']);
$router->post("/forgot_password", [loginController::class, 'olvide']);
$router->get("/authenticate_user", [loginController::class, 'recuperar']);
$router->post("/authenticate_user", [loginController::class, 'recuperar']);
$router->get("/recover_password", [loginController::class, 'cambiar']);
$router->post("/recover_password", [loginController::class, 'cambiar']);

//crear cuenta
$router->get("/create_account", [loginController::class, 'crear']);
$router->post("/create_account", [loginController::class, 'crear']);

//activar cuenta
$router->get("/confirm_account", [loginController::class, "activar"]);
$router->post("/confirm_account", [loginController::class, "activar"]);

//api citas
$router->get(("/api/services"),[apiController::class, "index"]);
$router->post(("/api/citas"),[apiController::class, "guardar"]);
$router->post(("/api/eliminar"),[apiController::class, "eliminar"]);
//area privada
$router->get("/appointment", [citaController::class, "index"]);
$router->get("/admin", [AdminController::class, "index"]);

//crud de servicos
$router->get("/services", [servicioController::class, "index"]);
$router->get("/services/create", [servicioController::class, "crear"]);
$router->post("/services/create", [servicioController::class, "crear"]);
$router->get("/services/update", [servicioController::class, "actualizar"]);
$router->post("/services/update", [servicioController::class, "actualizar"]);
$router->post("/services/delete", [servicioController::class, "eliminar"]);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
