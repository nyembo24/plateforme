<?php 
require_once("../../connexion/conn.php");
require_once("../../models/class/class_profil.php");

if (!isset($_SESSION['user'])) {
    header("location:../../index.php");
    exit;
}

$db = new connexion();
$conn = $db->getconnexion();
$valeur = new profil($conn);
$val = $valeur->lister()->fetch();
$valeur->set_id($_SESSION['user']);
$images = $valeur->lister_galeri();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Artisan</title>
    <link href="../../bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/style1.css">
    <link rel="stylesheet" href="../../style/profilArtisan.css">
    <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
</head>
</style>
<body class="bg-light">

<?php if (isset($_GET['photo'])) { ?>
<!-- Modal ajout photo -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter photo</h5>
                <a href="?">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </a>
            </div>
            <div class="modal-body">
                <form action="../../models/controleur/controleur_profil.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Choisissez des images</label>
                        <input required type="file" name="images[]" accept="image/*" multiple class="form-control">
                    </div>
                    <button class="btn btn-success w-100" type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const myModal = new bootstrap.Modal(document.getElementById("modalId"));
        myModal.show();
    });
</script>
<?php } ?>

<?php require_once("../../navbar/navbarArtisan.php"); ?>

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
            <a href="formulaire_profil.php" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-pencil-square"></i> Modifier le profil
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

        <!-- À propos -->
        <div>
            <h5 class="text-center text-secondary">À propos</h5>
            <p class="text-center"><?= $val["description"] ?></p>
        </div>

        <hr>

        <!-- Document -->
        <div class="text-center">
            <h6>Document nécessaire</h6>
            <a href="../../image/<?= $val["document"] ?>" class="btn btn-outline-success">
                <i class="bi bi-download"></i> Télécharger le document
            </a>
        </div>

        <hr>

        <!-- Galerie améliorée -->
        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-center flex-grow-1">Galerie</h4>
                <a href="?photo" title="Ajouter une photo" class="btn btn-outline-dark rounded-circle ms-3">
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>

            <?php $i = 0; ?>
            <div class="row g-3">
                <?php while ($image = $images->fetch() and $i < 7): $i++; ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card shadow-sm h-100">
                            <img src="../../image/<?= $image["nom"] ?>" class="card-img-top img-thumbnail" alt="Image galerie">
                        </div>
                    </div>
                <?php endwhile; ?>

                <?php if ($i != 0): ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="galeri.php?photo=<?= $_SESSION['user'] ?>" title="Voir toute la galerie">
                            <div class="card shadow-sm h-100 d-flex align-items-center justify-content-center" style="min-height: 150px;">
                                <i class="bi bi-images" style="font-size: 2rem;"></i>
                                <small>Voir plus</small>
                            </div>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center">Aucune photo disponible pour l’instant.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<script src="../../bootstrap.bundle.js"></script>
</body>
</html>
