<?php 
    require_once("../../connexion/conn.php");
    require_once("../../models/class/class_profil.php");
    $db=new connexion();
    $conn=$db->getconnexion();
    $valeur= new profil($conn);
    if(! isset($_SESSION['user'])){
        header("location:../../index.php");
        exit;
    }
    $val=$valeur->lister()->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Artisan</title>
    <link href="../../bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/profilArtisan.css">
    <link rel="stylesheet" href="../../style/style1.css">
    <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <?php require_once("../../navbar/navbarArtisan.php") ?>
    <div class="container mt-4">
        <!-- Couverture -->
        <div class="profile-cover rounded-top" 
             style="background-image: url('../../image/<?= $val["image_profil"] ?>');
                    background-size: cover; 
                    background-position: center; 
                    height: 200px;">
        </div>

        <!-- Profil -->
        <div class="bg-white p-3 rounded-bottom shadow">
            <div class="text-center">
                <a href="../../image/<?= $val["image_profil"] ?>">
                    <img src="../../image/<?= $val["image_profil"] ?>" alt="Photo de profil" class="profile-pic">
                </a>
                <h3 class="mt-2"><?= $val["nom"] ?></h3>
                <p class="text-muted"><?= $val["profession"] ?></p>
                <a href="formulaire_profil.php" class="btn btn-primary">modifier</a>
            </div>

            <!-- Infos -->
            <hr>
            <div class="row text-start">
                <div class="col-md-6">
                    <p><strong>Ville :</strong> de Butembo</p>
                    <p><strong>Travail :</strong> Freelance</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email :</strong><?= $val["email"] ?></p>
                    <p><strong>Téléphone :</strong><?= $val["tel"] ?></p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>Document nécessaire</p>
                <div class="card">
                    <a href="../../image/<?= $val["document"] ?>" class="btn btn-link">Télécharger le document</a>
                </div>
            </div>
            <hr>
            <div class="bibliotheque">
                <h3 class="text-center">Galerie</h3>
                <div>
                    <img src="../../image/img1.png" alt="photo">
                </div>
            </div>
        </div>
    </div>
    <script src="../../bootstrap.bundle.js"></script>
</body>
</html>