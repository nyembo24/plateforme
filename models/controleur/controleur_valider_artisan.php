<?php
    require_once("../../connexion/conn.php");
    require_once("../class/class_valider_artisan.php");
    require_once("../class/class_gmail.php");
    if(! isset($_SESSION["admin"])){
        header("location:../../index.php");
        exit;
    }
    $db=new connexion();
    $conn=$db->getconnexion();
    $valeur= new valider($conn);
    if(isset($_GET["valider"]) and ! empty($_GET["valider"])){
        $valeur->set_id(htmlspecialchars($_GET["valider"]));
        $valeur->activer_profil();
        $mailer = new MailerService();
        $mailer->sendEmail(
            $valeur->email(),
            'Nom',
            'valider profil',
            'votre profil a été valider avec succès'
        );
        $sms="activation du profil effectuer avec succes";
        header("location:../../page/adminAdministrateur/valider_artisan.php?sms=$sms");
        exit;
    }
    if(isset($_POST["rejeter"]) and isset($_POST["message"])){
        $valeur->set_id(htmlspecialchars($_POST["rejeter"]));
        $mailer = new MailerService();
        $mailer->sendEmail(
            $valeur->email(),
            'Nom',
            'rejet du profil',
            $_POST["message"]
        );
        $sms="profil rejeter avec succès";
        header("location:../../page/adminAdministrateur/valider_artisan.php?sms=$sms");
        exit;

    }
    header("location:../../page/adminAdministrateur/valider_artisan.php");
    exit;