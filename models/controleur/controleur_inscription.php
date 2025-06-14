<?php 
    require_once("../../connexion/conn.php");
    require_once("../class/class_inscription.php");
    $db=new connexion();
    $conn=$db->getconnexion();
    $valeur= new user($conn);
    if(isset($_POST["usr"]) and isset($_POST["pwd"]) and isset($_POST["mail"]) and isset($_POST["tel"]) and isset($_POST["fonction"])){
        $valeur->set_usr(htmlspecialchars($_POST["usr"]));
        $valeur->set_pwd(htmlspecialchars($_POST["pwd"]));
        $valeur->set_email(htmlspecialchars($_POST["mail"]));
        $valeur->set_tel(htmlspecialchars($_POST["tel"]));
        if($_POST["fonction"]==0){
            if($valeur->verifier_client()){
                $valeur->insert_client();
            }
            else{
                $sms="le nom d'utilisateur existe déja veuiller réssayer";
                header("location:../../page/inscrire.php?sms=$sms");
                exit;
            }
        }else{
            if($valeur->verifier_artisan()){
                $valeur->insert_artisan();
            }
            else{
                $sms="le nom d'utilisateur existe déja veuiller réssayer";
                header("location:../../page/inscrire.php?sms=$sms");
                exit;
            }
        }
        header("location:../../index.php?sms=enregistrement effectuer avec succès");
        exit;
    }
    if(isset($_POST["fonction"]) and isset($_POST["usr"]) and isset($_POST["pwd"])){
        $valeur->set_usr(htmlspecialchars($_POST["usr"]));
        $valeur->set_pwd(htmlspecialchars($_POST["pwd"]));
        if($_POST["fonction"]==0){
            if($valeur->login_client()){
                if(isset($_POST["remember"]) and $_POST["remember"]=="on"){
                    //continuer
                }
                header("location:../../page/adminClient/Adminclient.php");
                exit;
            }
        }
        else{
            if($valeur->login_artisan()){
                if(isset($_POST["remember"]) and $_POST["remember"]=="on"){
                    //continuer
                }
                if(!isset($_SESSION["profil"])){
                    $_SESSION["profil"]=$valeur->profil();
                }
                if($valeur->verifier_initialisation()){
                    $valeur->initialiser();
                }
                header("location:../../page/adminArtisan/afficher_demande.php");
                exit;
            }
        }
        if($_POST["fonction"]==0){
            header("location:../../page/connexionclient.php?sms=nom d'utilisateur ou mots de passe incorrect");
            exit;
        }else{
            header("location:../../page/connexionartisan.php?sms=nom d'utilisateur ou mots de passe incorrect");
            exit;
        }
    }
    header("location:../../index.php");
    exit;

?>