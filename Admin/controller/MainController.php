<?php

require 'resource/PHPMailer-master/PHPMailerAutoload.php';
function sendmail($email, $token, $subject, $msg)
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Server settings
    //$mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = "cricketrangasala@gmail.com"; // SMTP username
    $mail->Password = "gbics@2076"; //SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('info@examplesite.com', 'GBICS');
    $mail->addAddress($email); // Add a recipient
    //  $mail->addAddress('ellen@example.com'); // Name is optional
    // $mail->addReplyTo($email, 'Information');
    // $mail->addCC('cc@example.com');
    //  $mail->addBCC('bcc@example.com');

    // Attachments
    /* $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name */

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $msg;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}