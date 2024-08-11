<?php
namespace Controllers;

use Classes\Email;
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
                    }else {
                        //Hash password
                        $usuario->hashPassword();

                        //Generar token unico
                        $usuario->crearToken();

                        //Enviar email
                        $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                        $email->enviarConfirmacion();

                        //Crear el usuario
                        $resultado = $usuario->guardar();
                        if($resultado) {
                            header('Location: /mensaje');
                        }
                    }
                }
                
            }
        }
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }
    public static function confirmar(Router $router){

        $alertas = [];
        @$token = s($_GET['token']);
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)){
            //Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no válido');
        }else {
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta comprobada correctamente');
        }
        
        $alertas = Usuario::getAlertas();
        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas,
        ]);
    }
}