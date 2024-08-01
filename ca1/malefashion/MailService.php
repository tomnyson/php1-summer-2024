<?php

namespace MailService;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require 'vendor/autoload.php';
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

define('USERNAME_EMAIL', 'tabletkindfire@gmail.com'); // thay bằng email của các bạn
define('PASSWORD_EMAIL', 'lkbivmsskcnzpgmb'); // thay bằng password của các bạn
class MailService
{
    public static function send($to = 'tabletkindfire@gmail.com', $from = 'tabletkindfire@gmail.com', $sublect = 'notfication', $content = '')
    {
        try {
            $mail = new PHPMailer();
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = USERNAME_EMAIL;                 // SMTP username
            $mail->Password = PASSWORD_EMAIL;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom($to, 'tomnysontech shop');
            $mail->addAddress($from);               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $sublect;
            $mail->Body    = $content;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
