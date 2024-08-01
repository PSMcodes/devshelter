<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'config.php';

function sendMail($email, $subject, $message)
{

    $mail = new PHPMailer(true);

    $mail->isSMTP();

    $mail->SMTPAuth = true;

    $mail->Host = MAILHOST;

    $mail->Username = USERNAME;

    $mail->Password = PASSWORD;

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port = 587;

    $mail->setFrom(SENT_FROM, SENT_FROM_NAME);

    $mail->addAddress($email);

    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);

    $mail->isHTML(true);


    $mail->Subject = $subject;

    $mail->Body = $message;

    $mail->AltBody = $message;

    if (!$mail->send())
        return "Email not send . Try again";
    else
        return "success";

}

function generateRandomGibberish($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>