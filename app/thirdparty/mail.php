<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

/**
 * courses model
 */
class Mail
{



    public function send($data)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nilisexamination@gmail.com';
        $mail->Password = 'azny tyah tmcz evwg';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('nilisexamination@gmail.com');

        $mail->addAddress('users mail'); // add parameter
        $mail->isHTML(true);
        $mail->Subject = 'subject'; //add parameter
        $mail->Body = 'message'; //add parameter
    }

}

?>