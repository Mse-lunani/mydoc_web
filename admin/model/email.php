<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/vendor/phpmailer/phpmailer/src/Exception.php';
require 'PHPMailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'PHPMailer/vendor/phpmailer/phpmailer/src/SMTP.php';
require 'PHPMailer/vendor/autoload.php';

function email($email, $subject, $header, $message, $bcc = false)
{
    $sender = 'support@hyghlytevi.com';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.hyghlytevi.com';
    $mail->SMTPAuth     = TRUE;
    $mail->SMTPSecure   = 'ssl';
    $mail->Port         = 465;
    $mail->isHTML(true);
    $mail->Username     = $sender;
    $mail->Password     = 'Vertu_20201!!';
    
    // if($bcc) $mail->addBcc('j.joseph@allinclusivemanagementsolutions.com');
    
    $mail->Subject = $subject;
    $mail->SetFrom($sender, $header);
    $mail->Body = $message;
    $mail->AddAddress($email);

    if (!$mail->Send()) {
        return "failed";
    } else {
        return "success";
    }

    $mail->smtpClose();
}
function send_email_file($email, $subject, $header, $message, $file, $bcc = false)
{
    $sender = 'support@hyghlytevi.com';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.hyghlytevi.com';
    $mail->SMTPAuth     = TRUE;
    // $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->SMTPSecure   = 'ssl';
    $mail->Port         = 465;
    $mail->isHTML(true);
    $mail->Username     = $sender;
    $mail->Password     = 'Vertu_20201!!';

    $mail->addAttachment($file);
    // j.joseph@allinclusivemanagementsolutions.com
    if($bcc) $mail->addBcc('patrick.ayub@vesencomputing.com');
    
    $mail->Subject = $subject;
    $mail->SetFrom($sender, $header);
    $mail->Body = $message;
    $mail->AddAddress($email);

    if (!$mail->Send()) {
        return "failed";
    } else {
        return "success";
    }

    $mail->smtpClose();
}
