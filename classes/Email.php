<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
    $mail = new PHPMailer(true);

    try {
        // Muestra en consola o pantalla la conversación con smtp.gmail.com
        // $mail->SMTPDebug = 2; 

        $mail->isSMTP();
        $mail->Host       = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Port       = (int)$_ENV['EMAIL_PORT'];
        $mail->Username   = $_ENV['EMAIL_USER'];
        $mail->Password   = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        
        $mail->setFrom($_ENV['EMAIL_USER'], 'DevWebCamp');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu Cuenta';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . htmlspecialchars($this->nombre) . "</strong> Has registrado tu cuenta en DevWebCamp...</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['HOST'] . "/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;
        $mail->AltBody = "Hola " . $this->nombre . ", confirma tu cuenta entrando a: " . $_ENV['HOST'] . "/confirmar-cuenta?token=" . $this->token;

        return $mail->send();
    } catch (\Exception $e) {
        // Imprime el error exacto devuelto por Google en lugar de ocultarlo
        echo "Error PHPMailer: " . $mail->ErrorInfo;
        exit;
    }
}
    public function enviarInstrucciones()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Cifrado obligatorio para Gmail

        $mail->setFrom($_ENV['EMAIL_USER'], 'DevWebCamp');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Reestablece tu password';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>. Has solicitado reestablecer tu password; sigue el enlace para continuar.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['HOST'] . "/reestablecer?token=" . $this->token . "'>Reestablecer Password</a></p>";
        $contenido .= "<p>Si no solicitaste este cambio, puedes ignorar el mensaje.</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        $mail->send();
    }
}
