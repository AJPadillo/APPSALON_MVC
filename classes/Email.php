<?php

namespace Classes;

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
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '6d4bd62ad6eee2';
        $mail->Password = 'aa6d115f1f6fc7';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en AppSalon. Solo debes confirmarla entrando en el siguiente enlace.</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar cuenta</a></p>";
        $contenido .= "<p>Si tu no has solicitado esta cuenta, puedes ignorar el mensaje.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones() {
                //Crear el objeto de email
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '6d4bd62ad6eee2';
                $mail->Password = 'aa6d115f1f6fc7';
        
                $mail->setFrom('cuentas@appsalon.com');
                $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
                $mail->Subject = 'Reestablece tu password';
        
                //Set HTML
                $mail->isHTML(TRUE);
                $mail->CharSet = 'UTF-8';
        
                $contenido = "<html>";
                $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password. Sigue el siguiente enlace para hacerlo.</p>";
                $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablecer password</a></p>";
                $contenido .= "<p>Si tu no has solicitado este cambio, puedes ignorar el mensaje.</p>";
                $contenido .= "</html>";
        
                $mail->Body = $contenido;
        
                //Enviar el email
                $mail->send();
    }
}