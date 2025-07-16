<?php 
    require_once("../../connexion/conn.php");
    require_once("../class/class_profil.php");
    $db=new connexion();
    $conn=$db->getconnexion();
    $valeur= new profil($conn);
    if(! isset($_SESSION['user'])){
        header("location:../../index.php");
        exit;
    }
    if(isset($_FILES["profil"]) and isset($_FILES["document"])){
        $valeur->set_id($_SESSION["user"]);
        $valeur->set_nom(htmlspecialchars($_POST["nom"]));
        $valeur->set_profession(htmlspecialchars($_POST["profession"]));
        $valeur->set_photo_profil(htmlspecialchars($_FILES["profil"]["name"]));
        $valeur->set_document(htmlspecialchars($_FILES["document"]["name"]));
        $valeur->set_mail(htmlspecialchars($_POST["mail"]));
        $valeur->set_tel(htmlspecialchars($_POST["tel"]));
        $valeur->set_tmp_photo(htmlspecialchars($_FILES["profil"]["tmp_name"]));
        $valeur->set_tmp_dossier(htmlspecialchars($_FILES["document"]["tmp_name"]));
        $valeur->set_description(htmlspecialchars($_POST["description"]));
        if($valeur->deplacer()){
            if($valeur->existe()){
                if($valeur->update()){
                    header("location:../../page/adminArtisan/profil.php");
                    exit;
                }
            }
            else{
                if($valeur->inserer()){
                    header("location:../../page/adminArtisan/profil.php");
                    exit;
                }
            }
        }else{
            $sms="echec de modification veuiller réssayer";
            header("location:../../page/adminArtisan/formulaire_profil.php?sms=$sms");
            exit;
        }
    }
    //var_dump($_POST);echo"<br>";
    //var_dump($_FILES);
    header("location:../../page/adminArtisan/afficher_demande.php");
    exit;
?>