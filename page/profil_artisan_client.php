<?php
if(! isset($_GET["id"]) and ! empty($_GET["id"])){
    header("location:../index.php");
    exit();
}
require_once('../connexion/conn.php');
require_once("../models/class/class_profil_publique.php");
$db=new connexion();
$conn=$db->getconnexion();
$valeur= new publique($conn);
$valeur->set_id(htmlspecialchars($_GET['id']));
$val=$valeur->selection_un_artisan();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Artisan</title>
    <link href="../bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/profilArtisan.css">
    <link rel="stylesheet" href="../bootsrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <!-- Couverture -->
        <div class="profile-cover rounded shadow-sm" 
             style="background-image: url('../image/<?= $val["image_profil"] ?>');
                    background-size: cover; 
                    background-position: center; 
                    height: 200px;">
        </div>

        <!-- Profil -->
        <div class="bg-white p-4 rounded shadow-sm">
            <div class="text-center">
                <a href="../image/<?= $val["image_profil"] ?>">
                    <img src="../image/<?= $val["image_profil"] ?>" alt="Photo de profil" class="profile-pic">
                </a>
                <h3 class="mt-3"><?= $val["nom"] ?></h3>
                <p class="text-muted mb-2"><?= $val["profession"] ?></p>
                <a href="" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-chat-dots"></i> Contacter
                </a>
            </div>

            <hr>

            <!-- Infos -->
            <div class="row text-start">
                <div class="col-md-6 mb-2">
                    <p><i class="bi bi-geo-alt-fill me-1 text-primary"></i><strong>Ville :</strong> Butembo</p>
                    <p><i class="bi bi-briefcase-fill me-1 text-primary"></i><strong>Travail :</strong> Freelance</p>
                </div>
                <div class="col-md-6 mb-2">
                    <p><i class="bi bi-envelope-fill me-1 text-primary"></i><strong>Email :</strong> <?= $val["email"] ?></p>
                    <p><i class="bi bi-telephone-fill me-1 text-primary"></i><strong>Téléphone :</strong> <?= $val["tel"] ?></p>
                </div>
            </div>

            <hr>

            <div>
                <h5 class="text-center text-secondary">À propos</h5>
                <p class="text-center"><?= nl2br($val["description"]) ?></p>
            </div>

            <hr>

            <div class="text-center">
                <h6>Document nécessaire</h6>
                <a href="../image/<?= $val["document"] ?>" class="btn btn-outline-success">
                    <i class="bi bi-download"></i> Télécharger le document
                </a>
            </div>

            <hr>
            <!-- Section Commentaires -->
            <div class="commentaires-section">
            <h4 class="text-center mb-3">Commentaires des utilisateurs</h4>

            <div class="commentaire mb-3">
                <p class="comment-text" id="comment1">
                Trembien ça vas bien, merci beaucoup de demander, j'espère que tout va bien aussi de ton côté.
                </p>
                <button class="btn-toggle-comment" onclick="toggleComment('comment1', this)">Voir plus</button>
            </div>
            </div>

            <!-- Formulaire d'ajout d'avis -->
            <div class="ajouter-commentaire mt-4">
            <h5>Laisser un avis</h5>
            <form id="form-avis" method="POST" action="ajouter_avis.php">
                <div class="mb-3">
                <textarea 
                    name="commentaire" 
                    id="commentaire" 
                    class="form-control" 
                    rows="3" 
                    placeholder="Écrivez votre avis ici..." 
                    required
                ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            </div>

            <hr>

            <!-- Galerie -->
            <div class="bibliotheque">
                <h4 class="text-center mb-3">Galerie</h4>
                <div class="d-flex justify-content-center flex-wrap">
                    <img src="../image/defaul.png" alt="photo">
                    <img src="../image/Capture d’écran du 2024-10-10 20-00-52.png" alt="">
                    <img src="../image/defaul.png" alt="photo">
                    <img src="../image/Capture d’écran du 2024-10-10 20-00-52.png" alt="">
                    <img src="../image/defaul.png" alt="photo">
                    <img src="../image/Capture d’écran du 2024-10-10 20-00-52.png" alt="">
                    <img src="../image/defaul.png" alt="photo">
                    <img src="../image/Capture d’écran du 2024-10-10 20-00-52.png" alt="">
                    <!-- Ajoute d'autres images ici si disponibles -->
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap.bundle.js"></script>
    <script src="../script/comentaire.js"></script>
</body>
</html>
