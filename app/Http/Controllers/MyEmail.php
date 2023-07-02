<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class MyEmail extends Controller
{
    function sendEmailToUser()
    {
        try{
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer();
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'your email';                     //SMTP username
        $mail->Password   = 'your password';                               //SMTP password
        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('your email', 'your name');
        $mail->addAddress('recipient email', 'recipient name');     //Add a recipient
        //Content
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";                                 //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        // $mail->send();
        dd($mail->send());
    } catch (Exception $e) {
        dd($mail->ErrorInfo);
    }
    }
}
