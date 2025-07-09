<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

class MailerService
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->configureSMTP();
    }

    private function configureSMTP()
    {
        $this->mailer->isSMTP();
        $this->mailer->Host       = 'smtp.gmail.com';
        $this->mailer->SMTPAuth   = true;
        $this->mailer->Username   = 'morishonyembo24@gmail.com'; // Adresse Gmail
        $this->mailer->Password   = '';       // Mot de passe d'application
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port       = 587;
    }

    public function sendEmail($to, $toName, $subject, $body)
    {
        try {
            $this->mailer->setFrom('morishonyembo24@gmail.com', 'Administrateur');
            $this->mailer->addAddress($to, $toName);

            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $body;

            $this->mailer->send();
            return 'Message envoyé avec succès.';
        } catch (Exception $e) {
            return "Le message n'a pas pu être envoyé vérifier votre connection internet";
        }
    }
}
