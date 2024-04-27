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



    public function send($viewFile, $userMail = '', $subject = '', $message = '', $name = '', $token = '')
    {
        $data['send'] = $name;
        $data['token'] = $token;


        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'examination.nilis@gmail.com';
        $mail->Password = 'lcru isac ygqy rqio';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('examination.nilis@gmail.com');

        $mail->addAddress($userMail);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $this->renderView($viewFile, $data);



        //uncomment bellow to send mails

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }

    }

    protected function renderView($viewFile, $data = [])
    {
        // Extract data variables for use in the view file
        extract($data);

        // Include the view file
        ob_start();
        include ("../app/views/common/mail-views/" . $viewFile . ".php");
        return ob_get_clean();
    }

}

?>