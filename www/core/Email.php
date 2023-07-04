<?php

namespace App\core;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//Load Composer's autoloader
// require '../vendor/';

class Email
{
    //Create an instance; passing `true` enables exceptions

    public PHPMailer $mail;
    protected array $emailData;

    public function __construct(array $emailData)
    {
        $this->mail = new PHPMailer(true);
        $this->emailData = $emailData;
    }

    function sendEmail()
    {
        try {

            // paramètres de connexion SMTP pour le serveur Gmail 
            $this->mail->isSMTP();                // Use smtp protocol
            $this->mail->Host         = 'smtp.gmail.com'; // Gmail server smtp 
            // $this->mail->SMTPDebug    = SMTP::DEBUG_SERVER; //Enable verbose debug output
            $this->mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $this->mail->Port         = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $this->mail->SMTPAuth     = true; // Activation de l'authentification SMTP
            $this->mail->Username     = 'lokoshi21@gmail.com'; // Adresse email de votre compte Gmail
            $this->mail->Password     = 'mfpzrurmqggjsveg'; // Mot de passe du compte

            // détails de l'email
            $this->mail->setFrom('lokoshi21@gmail.com'); // Adresse email de l'expéditeur
            $this->mail->addAddress($this->emailData['to']); // Adresse email du destinataire

            $this->mail->isHTML(true); // Set email to HTML format
            $this->mail->Subject = 'FoodPress - Confirmation d\'inscription'; // Sujet de l'email
            //lien route + token
            $this->mail->Body = $this->emailData['body'] . '<b><a href="' . $this->emailData['url'] . '?token=' . $this->emailData['token'] . '">"' . $this->emailData['url'] . '?token=' . $this->emailData['token'] . '"</a></b>';

            $this->mail->send();
            echo 'Email send with success';
        } catch (Exception $e) {
            echo 'Error when sending' . $this->mail->ErrorInfo;
        }
    }
}
