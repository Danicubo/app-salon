<?php

namespace Controllers;
use Model\Servicio;
use Models\Cita;
use Models\CitaServicio;

class APIController {
    public static function index() {
        $servicios =  Servicio::all();

        echo json_encode($servicios);
    }
    public static function guardar(){

        //almacena la cita y devuelve el id
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado['id'];

        //almacena los servicios con  el id de la cita
        $idServicios = explode(",", $_POST['servicios']);

        foreach($idServicios as $idServicio){
            $args = [
                'cita_id' => $id,
                'servicio_id' => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }
        //retornamos una respuesta
        $respuesta = [
            'resultado' => $resultado
        ];

        echo json_encode(['resultado' => $resultado]);  
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $cita = Cita::find($_POST['id']);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}