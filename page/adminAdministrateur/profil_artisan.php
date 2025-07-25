<?php
require_once('../../connexion/conn.php');
require_once("../../models/class/class_profil_publique.php");
if(! isset($_GET["profil"]) || ! isset($_SESSION["admin"])){
    header("location:../../index.php");
    exit;
}
$db=new connexion();
$conn=$db->getconnexion();
$valeur= new publique($conn);
$valeur->set_id(htmlspecialchars($_GET['profil']));
$val=$valeur->selection_un_artisan();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Artisan</title>
    <link rel="stylesheet" href="../../style/profilArtisan.css">
    <link rel="stylesheet" href="../../bootstrap.css">
    <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <?php require_once("../../navbar/navbarAdmin.php") ?>
    <?php if(isset($_GET["rejeter"]) and !empty($_GET["rejeter"])){?>
        <!-- Modal trigger button (masqué) -->
        <button
            type="button"
            class="btn btn-primary btn-lg"
            data-bs-toggle="modal"
            data-bs-target="#modalId"
            style="display: none;"
        >
            Launch
        </button>
        
        <!-- Modal Body -->
        <div
            class="modal fade"
            id="modalId"
            tabindex="-1"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
            role="dialog"
            aria-labelledby="modalTitleId"
            aria-hidden="true"
        >
            <div
                class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                role="document"
            >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Message
                        </h5>
                        <a href="?profil=<?= $_GET["profil"] ?>">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="../../models/controleur/controleur_valider_artisan.php" method="post">
                            <input name="rejeter" type="hidden" value="<?= htmlspecialchars($_GET["profil"]) ?>">
                            <textarea placeholder="raison de rejet" name="message" rows="3" required class="form-control"></textarea>
                            <button type="submit" class="btn btn-primary w-100 mt-2">envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const myModal = new bootstrap.Modal(document.getElementById("modalId"));
                myModal.show(); // Affiche la modal immédiatement
            });
        </script>

    <?php } ?>

    <div class="container mt-5">
        <!-- Couverture -->
        <div class="profile-cover rounded shadow-sm" 
             style="background-image: url('../../image/<?= $val["image_profil"] ?>');
                    background-size: cover; 
                    background-position: center; 
                    height: 200px;">
        </div>

        <!-- Profil -->
        <div class="bg-white p-4 rounded shadow-sm">
            <div class="text-center">
                <a href="../../image/<?= $val["image_profil"] ?>">
                    <img src="../../image/<?= $val["image_profil"] ?>" alt="Photo de profil" class="profile-pic">
                </a>
                <h3 class="mt-3"><?= $val["nom"] ?></h3>
                <p class="text-muted mb-2"><?= $val["profession"] ?></p>
                <?php if(isset($_SESSION["patron"])){ ?>
                    <a href="message.php?id=<?= $_GET["id"] ?>" class="btn btn-outline-primary btn-sm"><i class="bi bi-chat-dots"></i> Contacter</a>
                <?php }else{ ?>
                    <a href="../../models/controleur/controleur_valider_artisan.php?valider=<?= $_GET["profil"] ?>" class="btn btn-outline-primary btn-sm"><i class="bi bi-chat-dots"></i> valider</a>
                    <a href="?profil=<?= $_GET["profil"] ?> && rejeter=<?= $_GET["profil"] ?>" class="btn btn-outline-danger text-dark btn-sm"><i class="bi bi-chat-dots"></i> réjeter</a>
                <?php } ?>
            </div>

            <hr>

            <!-- Infos -->
            <div class="row text-start info">
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
                <p class="text-center"><?= $val["description"] ?></p>
            </div>

            <hr>

            <div class="text-center">
                <h6>Document nécessaire</h6>
                <a target="_blank" href="../../image/<?= $val["document"] ?>" class="btn btn-outline-success">
                    <i class="bi bi-eye"></i> voir le document
                </a>
            </div>

            <hr>

            <!-- Galerie -->
            <div class="bibliotheque">
                <h4 class="text-center mb-3">Galerie</h4>
                <div class="d-flex justify-content-center flex-wrap">
                    <img src="../../image/defaul.png" alt="photo">
                    <img src="../../image/Capture d’écran du 2024-10-10 20-00-52.png" alt="">
                    <img src="../../image/defaul.png" alt="photo">
                    <img src="../../image/Capture d’écran du 2024-10-10 20-00-52.png" alt="">
                    <img src="../../image/defaul.png" alt="photo">
                    <img src="../../image/Capture d’écran du 2024-10-10 20-00-52.png" alt="">
                    <img src="../../image/defaul.png" alt="photo">
                    <img src="../../image/Capture d’écran du 2024-10-10 20-00-52.png" alt="">
                    <!-- Ajoute d'autres images ici si disponibles -->
                </div>
            </div>
        </div>
    </div>

    <script src="../../bootstrap.bundle.js"></script>
</body>
</html>
