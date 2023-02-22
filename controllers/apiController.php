<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class apiController
{

  public static function index()
  {
    $servicio = Servicio::all();
    echo json_encode($servicio);
  }


  public static function guardar() {
        
    // Almacena la Cita y devuelve el ID
    $cita = new Cita($_POST);
    $resultado = $cita->guardar();

    $id = $resultado["id"];

    $idServicios = explode(",", $_POST["serviciosId"]);

    foreach($idServicios as $servicioId){

      $arg =[
        'citaId' => $id,
        'servicioId' => $servicioId
      ];

      $citaServicio = new CitaServicio($arg);
      $citaServicio->guardar();
    }
    
    echo json_encode(['resultado' => $resultado]);
}

public static function eliminar(){

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST["id"];
    $citaServicio = CitaServicio::where("citaId",$id);
    $citaServicio->eliminarWhere($id, "citaId");
    $cita = Cita::find($id);
    $cita->eliminar();
    header("location: ". $_SERVER["HTTP_REFERER"]);
  }

}

}
