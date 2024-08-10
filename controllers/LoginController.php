<?php
namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router){
        $router->render('auth/login');
    }
    public static function logout(){
        echo "Desde Logout";
    }
    public static function olvide(Router $router){
        $router->render('auth/olvide-password',[
            
        ]);
    }
    public static function recuperar(){
        echo "Desde recuperar";
    }
    public static function crear(Router $router){

        $usuario = new Usuario($_POST);


        //Alertas vacias 
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            //Revisar alertas vacias
            if(empty($alertas)){
                
                //verificar si el usuario exite
                $resultado = $usuario->existeUsuario();
                
                if($resultado){
                    
                    if($resultado->num_rows > 0){
                        $alertas = Usuario::getAlertas();
                    }
                }else {
                    $alertas = Usuario::getAlertas();
                }
                
            }
        }
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}