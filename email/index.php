<?php

set_error_handler(function(int $number, string $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once(dirname(__FILE__).'../../vendor/autoload.php');

class SendEmail{

    public function send($html, $email_cliente, $nome,$subject){   

        $mail = new PHPMailer;
       
        try {           
            $mail->IsHTML(true);
            $mail->IsSMTP();		// Ativar SMTP
            $mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth = true;		// Autenticação ativada
            $mail->Host = 'smtp.gmail.com';	// SMTP utilizado
            $mail->Username = 'testsendev@gmail.com';
            $mail->Password = 'lcxmbnnejhsqdsku';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
            $mail->SetFrom('ipet@ipet.com.br', 'iPet');
            $mail->Subject = $subject;
            $mail->Body = $html;
            $mail->AddAddress($email_cliente,$nome);
            if(!$mail->Send()) {
               return 0;
            } else {
              return 1;
            }
        } catch (Exception $e) {
            return 0;
        }

    }

}

