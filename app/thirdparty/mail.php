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



    public function send($userMail = '', $subject = '', $message = '', $name = '')
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

        $mail->addAddress('yashedthisara2001@gmail.com'); // add parameter
        $mail->isHTML(true);
        $mail->Subject = 'subject'; //add parameter
        $mail->Body = '
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                body {
                    font-family: "Arial", sans-serif;
                    color: #000; 
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff; 
                }
                .header {
                    background-color: #17376E; 
                    color: #fff; 
                    text-align: center;
                    padding: 10px;
                }
                .content {
                    margin-top: 20px;
                }
                .link-button {
                    color: #fff;
                    padding: 10px 8px 10px 8px;
                    border-radius: 6px;
                    background: #17376e;
                    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
                    border: 0px;
                    margin-bottom: 10px;
                }
                .link-button:hover {
                    color: #17376e;
                    background-color: white;
                    border: 1px solid;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Student Admission Card</h1>
                </div>
                <div class="content">
                    <p>Dear [Student Name],</p>
                    <p>Your admission card for the upcoming examination is ready. Please click the link below to view and download your admission card:</p>
                    <button class="link-button" onClick="location.href=\'<?= ROOT ?>sar/examination\'">View Admission Card</button>
                    <p>If you have any questions or concerns, please contact us at nilisexamination@gmail.com.</p>
                    <p>Best regards,</p>
                    <p>National Institute of Library and Information Sciences</p>
                </div>
            </div>
        </body>
        </html>
    ';

        $mail->send();
    }

}

?>