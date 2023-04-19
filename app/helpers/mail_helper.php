<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once APPROOT . '/phpmailer/vendor/autoload.php';


class Mailer{
    private $mail;
    private $smtpAccount;
    private $smtpPassword;
    private $smtpName;


    public function __construct($account, $password, $name){
        $this->mail = new PHPMailer(true);
        $this->smtpAccount = $account;
        $this->smtpPassword = $password;
        $this->smtpName = $name;
    }


    public function send($to, $subject, $body){
        try{
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;;
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $this->smtpAccount;
            $this->mail->Password = $this->smtpPassword;
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $this->mail->Port = 465;

            $this->mail->setFrom($this->smtpAccount, $this->smtpName);
            $this->mail->addAddress($to);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            $this->mail->send();

            return true;
        }catch (Exception $e){
            return false;
        }
    }
}