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
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        
        //Set html
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre ."</strong> Has creado tu cuenta en appsalon, 
        debes de confirmala en: </p>";
        $contenido .= "<p>Presiona aquí: <a href='". $_ENV['APP_URL'] . "/confirmar-cuenta?token="
        . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si no solicitaste  esta cuenta, da caso omiso a este correo</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar Email
        $mail->send();
    }

    public function enviarInstrucciones(){

        //Crear objeto email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Restablece tu password';
        
        //Set html
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre ."</strong> Has solicitado reestablecer tu password,
        sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='". $_ENV['APP_URL'] . "/recuperar?token="
        . $this->token . "'>Reestablecer Password</a></p>";
        $contenido .= "<p>Si no solicitaste  esta cuenta, da caso omiso a este correo</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar Email
        $mail->send();
    }
}