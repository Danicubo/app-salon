<?php
namespace Model;

class Usuario extends ActiveRecord {
    //Base de Datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password',
     'telefono', 'admin', 'confirmado', 'token'];

     public $id;
     public $nombre;
     public $apellido;
     public $email;
     public $password;
     public $telefono;
     public $admin;
     public $confirmado;
     public $token;
     
     public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
     }

     //Mensajes de validación para la creación de una cuenta
     public function validarNuevaCuenta(){
         if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre del cliente es obligatorio';
         }
         if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido del cliente es obligatorio';
         }
         if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido del cliente es obligatorio';
         }
         if(!$this->email){
            self::$alertas['error'][] = 'El email del cliente es obligatorio';
         }
         if(!$this->password){
            self::$alertas['error'][] = 'El password del cliente es obligatorio';
         }
         if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El password debe de contener al menos 6 carácteres';
         }
         return self::$alertas;
     }
   //Revisa si el usuario exite
   public function existeUsuario(){
      $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
      
      $resultado = self::$db->query($query);
      if($resultado){
         if($resultado->num_rows > 0){
            self::$alertas['error'][] = "El usuario ya está registrado";
         }
      }else {
         self::$alertas['error'][] = 'Error en la consulta: ' . self::$db->error;
      }
      
      return $resultado;
   }
}