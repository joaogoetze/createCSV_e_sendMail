<?php

//USANDO A LIB PHPMAILER

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMail
{
    public function __construct()
    {
        $this->sendMail();
    }

    public function sendMail()
    {
        require_once('src/PHPMailer.php');
        require_once('src/SMTP.php');
        require_once('src/Exception.php');
        
        $mail = new PHPMailer(true);
        
        try 
        {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'joaoaugustoferreira5@gmail.com';
            $mail->Password = 'xudm trxz jixc nxif';
            $mail->Port = 587;
        
            $mail->setFrom('joaoaugustoferreira5@gmail.com');
            $mail->addAddress('joaoaugustoferreira5@gmail.com');
        
            $mail->isHTML(true);
            $mail->Subject = 'Arquivo CSV';
            $mail->Body = 'Em anexo, segue arquivp CSV com os dados solicitados!';

            $anexo = 'file.csv'; // Substitua pelo caminho do seu arquivo
            $mail->addAttachment($anexo);
        
            if($mail->send()) 
            {
                echo 'Email enviado com sucesso';
            } 
            else
            {
                echo 'Email nao enviado';
            }
        } 
        catch (Exception $e)
        {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
    }  
}

?>