<?php

namespace Controllers;

use MVC\Router;

class CitaController {
    public static function index(Router $router){
        //session_start(); //sesion ya activada

        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre']
        ]);
    }
}