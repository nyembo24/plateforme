<?php
    require_once("../../connexion/conn.php");
    require_once("../class/class_valider_artisan.php");
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
        $sms="activation du profil effectuer avec succes";
        header("location:../../page/adminAdministrateur/valider_artisan.php?sms=$sms");
        exit;
    }
    header("location:../../page/adminAdministrateur/valider_artisan.php");
    exit;