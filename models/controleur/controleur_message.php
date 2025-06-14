<?php 
    require_once("../../connexion/conn.php");
    require_once("../class//class_message.php");
    if(isset($_SESSION["patron"])){
    }
    elseif(isset($_SESSION["user"])){
    }
    else{
        header("location:../../index.php");
        exit;
    }
    $db=new connexion();
    $conn=$db->getconnexion();
    $valeur= new message($conn);
    //var_dump($_SESSION);die;
    if(isset($_POST["description"]) and isset($_SESSION["user"]) and isset($_SESSION["id_de"])){
        $valeur->set_message(htmlspecialchars($_POST["description"]));
        $valeur->set_id_de(htmlspecialchars($_SESSION["id_de"]));
        $valeur->envoyer_artisan();
        header("location:../../page/message.php");
        exit;
    }
    if(isset($_SESSION["patron"]) and isset($_SESSION["id_de"]) and isset($_SESSION["id_ar"]) and isset($_POST["description"])){
        $valeur->set_message(htmlspecialchars($_POST["description"]));
        $valeur->envoyer_client();
        header("location:../../page/message.php");
        exit;
    }
    header("location:../../page/message.php");
    exit;
?>