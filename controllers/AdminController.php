<?php
namespace Controllers;

use Models\AdminCita;
use MVC\Router;

class AdminController {
    public static  function index(Router $router) {
        isSessionStart();

        isAdmin();

        $fecha = $_GET['fecha'] ?? date('y-m-d');
        $fechas = explode('-', $fecha);

        if(!checkdate($fechas[1], $fechas[2], $fechas[0])){
            header('Location: /404');
        }

        $fecha = date('Y-m-d');

        //Consultar a la base de datos
        $consulta = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioId=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citasServicios ";
        $consulta .= " ON citasServicios.citaId=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citasServicios.servicioId ";
        //$consulta .= " WHERE fecha =  $'fecha' ";

        //Revisar los errores mas adelante

        $citas = AdminCita::SQL($consulta);

        debug($citas);

        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'cita' => $citas,
            'fecha' => $fecha
        ]);
    }
}