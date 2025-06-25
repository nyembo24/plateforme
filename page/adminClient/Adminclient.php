<?php 
require_once('../../connexion/conn.php');
require_once("../../models/class/class_profil_publique.php");
if (! isset($_SESSION["patron"])) {
    header("location:../../index.php");
    exit;
}
$db = new connexion();
$conn = $db->getconnexion();
$valeur = new publique($conn);
$val = $valeur->selection();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Client</title>
    <link rel="stylesheet" href="../../bootstrap.css">
    <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style/admin_client.css">
    <style>
        /* General Styles */
        * {
            font-size: 1em;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, rgba(16, 16, 17, 0.8), rgba(49, 51, 53, 0.1)),
              url("../image/image_developement/client.jpg");
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
        .bloc-bienvenu {
            display: flex;
            flex-direction: column;
            border-radius: 2%;
            height: 60vh;
            justify-content: center;
            align-items: center;
            background-color: blueviolet;
        }
        .bloc-bienvenu h4, .bloc-bienvenu p {
            color: aliceblue;
            text-align: center;
            font-size: 2em;
            padding: 1%;
        }
        .artisans-list {
            background-color: rgb(203, 209, 209);
            margin-top: 2%;
            padding: 2%;
            color: white;
        }
        .populaires {
            background-color: cadetblue;
            padding: 1%;
        }
        .populaires h4, .populaires span {
            color: white;
        }
    </style>
</head>
<body>
    <?php include_once("../../navbar/navbarClient.php"); ?>

    <main class="px-4">
        <!-- Bienvenue -->
        <div class="bloc-bienvenu">
            <div>
                <h4>Bienvenue sur votre espace client !</h4>
                <p>Découvrez les artisans disponibles à Butembo selon vos besoins. Publiez un projet ou explorez les profils pour entrer en contact.</p>
            </div>
            <a href="demande.php" class="btn btn-primary mt-2">Publier un projet</a>
        </div>

        <!-- Liste des artisans -->
        <h2 class="artisans-list mb-4 text-center">Nos Artisans à Butembo</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while($contenu = $val->fetch()) { ?>
            <div class="col">
                <div class="card shadow-sm h-100">
                    <a href="../../image/<?= $contenu["image_profil"] ?>">
                        <img src="../../image/<?= $contenu["image_profil"] ?>" class="card-img-top" alt="Photo Artisan" style="height: 200px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($contenu["nom"]) ?></h5>
                        <p class="card-text text-muted"><?= htmlspecialchars($contenu["profession"]) ?></p>
                        <p class="card-text"><?= htmlspecialchars($contenu["description"]) ?></p>
                    </div>
                    <div class="card-footer text-end">
                        <a href="../profil_artisan_client.php?id=<?= $contenu["id_pr"] ?>" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye"></i> Voir Profil
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- Catégories populaires -->
        <div class="my-5 populaires">
            <h4 class="text-center mb-3">Catégories populaires</h4>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <span class="badge bg-primary p-2">Maçonnerie</span>
                <span class="badge bg-success p-2">Électricité</span>
                <span class="badge bg-warning text-dark p-2">Plomberie</span>
                <span class="badge bg-info text-dark p-2">Menuiserie</span>
                <span class="badge bg-danger p-2">Peinture</span>
            </div>
        </div>

        <!-- Avis clients -->
        <section class="mt-5">
            <h4 class="text-center mb-3">Avis de nos clients satisfaits</h4>
            <div class="row text-center">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>Service rapide et professionnel !</p>
                        <footer class="blockquote-footer">Marie K.</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>J'ai trouvé un électricien en moins d'une heure.</p>
                        <footer class="blockquote-footer">Jean B.</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>Plateforme très pratique pour les rénovations.</p>
                        <footer class="blockquote-footer">Aline M.</footer>
                    </blockquote>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center py-3 bg-light mt-5 border-top">
        <p class="mb-0">&copy; <?= date("Y") ?> Artisan Butembo - Tous droits réservés</p>
    </footer>

    <script src="../../bootstrap.bundle.js"></script>
</body>
</html>
