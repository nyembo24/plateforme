<?php
    require_once("../../connexion/conn.php");
    require_once("../class/class_profil_publique.php");
    $db=new connexion();
    $conn=$db->getconnexion();
    $valeur= new publique($conn);
    if(! isset($_SESSION['patron'])){
        header("location:../../index.php");
        exit;
    }
    if(isset($_POST["id"]) and isset($_POST["commentaire"])){
        $valeur->set_id(htmlspecialchars($_POST["id"]));
        $valeur->set_description(htmlspecialchars($_POST["commentaire"]));
        $valeur->insert_commentaire();
        $id=$_POST['id'];
        header("location:../../page/profil_artisan_client.php?id=$id");
        exit;
    }
?>