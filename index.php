<?php 
require_once('connexion/conn.php');
require_once("models/class/class_profil_publique.php");
$db=new connexion();
$conn=$db->getconnexion();
$valeur= new publique($conn);
$val=$valeur->selection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootsrap-icons/font/bootstrap-icons.min.css">
    
</head>
<body>
    <head>
        <?php require_once("navbar.php"); ?>
    </head>
    <main class="container py-4">
        <h2 class="mb-4">Nos Artisans à Butembo</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while($contenu=$val->fetch()){ ?>
            <div class="col">
                <div class="card shadow-sm h-100">
                    <a href="image/<?= $contenu["image_profil"]?>"><img src="image/<?= $contenu["image_profil"]?>" class="card-img-top" alt="Photo Artisan" style="height: 200px; object-fit: cover;"></a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $contenu["nom"]?></h5>
                        <p class="card-text text-muted"><i class=""></i><?= $contenu["profession"]?></p>
                        <p class="card-text"><?= $contenu["description"]?></p>
                    </div>
                    <div class="card-footer text-end">
                        <a href="profil_artisan.php?id=<?= $contenu["id_pr"]?>" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye"></i> Voir Profil
                        </a>
                    </div>
                </div>
            </div>
            <?php }?>
            <!-- Artisan 2 (exemple) -->
        </div>
    </main>

    <footer>

    </footer>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>