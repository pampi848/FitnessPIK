<?php
const GUSER = 'fitnesspik@gmail.com'; // GMail username
const GPWD = 'xsw2#EDC'; // GMail password
const FROM = 'fitnesspik@gmail.com';
const FROMNAME = 'Administracja Fitness Club';

function smtpmailer($to, $from, $fromName, $subject, $body)
{
    global $error;
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($from, $fromName);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }
}
