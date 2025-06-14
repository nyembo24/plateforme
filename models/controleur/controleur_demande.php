<?php
    require_once("../../connexion/conn.php");
    require_once("../class/class_demande.php");
    if(! isset($_SESSION["patron"])){
        header("location:../../index.php");
        exit;
    }
    $db=new connexion();
    $conn=$db->getconnexion();
    $valeur= new demande($conn);
    //var_dump($_POST);die;
    if(isset($_POST["sujet"]) and isset($_POST["description"])){
        $valeur->set_sujet(htmlspecialchars($_POST["sujet"]));
        $valeur->set_descript(htmlspecialchars($_POST["description"]));
        if($valeur->publier()){
            $sms="publication de la démande éffectuer avec succès";
        }
        else{
            $sms="echec de la publication de la démande";
        }
        header("location:../../page/adminClient/demande.php?sms=$sms");
        exit;
    }
    if(isset($_GET["sup"])){
        $valeur->set_id(htmlspecialchars($_GET['sup']));
        if($valeur->retirer()){
            $sms="suppression effectuer avec succès";
        }else{
            $sms="echec de suppression";
        }
        header("location:../../page/adminClient/demande.php?sms=$sms");
        exit;
    }
    if(isset($_GET["id_pause"])){
        $valeur->set_id(htmlspecialchars($_GET['id_pause']));
        if(isset($_GET["pause"])){
            $valeur->suspendre();
        }
        else{
            $valeur->pas_suspendre();
        }
    }
    header("location:../../page/adminClient/demande.php");
    exit;
?>