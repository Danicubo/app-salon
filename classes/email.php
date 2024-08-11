<?php
namespace Classes;

use mail\mail\mail;
use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        //Crear objeto email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '693a1a0ec89382';
        $mail->Password = 'e391148a845777';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        
        //Set html
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre ."</strong> Has creado tu cuenta en appsalon, 
        debes de confirmala en: </p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token="
        . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si no solicitaste  esta cuenta, da caso omiso a este correo</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar Email
        $mail->send();
    }
}