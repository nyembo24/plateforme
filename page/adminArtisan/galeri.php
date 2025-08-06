<?php
require_once("../../connexion/conn.php");
require_once("../../models/class/class_profil.php");

$db = new connexion();
$conn = $db->getconnexion();

$valeur = new profil($conn);
$valeur->set_id(htmlspecialchars($_GET["photo"]));
$images = $valeur->lister_galeri()->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Galerie d'images</title>
  <link href="../../bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .gallery-container {
      padding: 40px 15px;
    }
    .gallery-img {
      width: 100%;
      aspect-ratio: 4/3;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    .gallery-img:hover {
      transform: scale(1.05);
    }
    .carousel-inner img {
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }
    .navbar-brand {
      display: flex;
      align-items: center;
    }
    .navbar-brand i {
      margin-right: 8px;
    }
    .alert-info {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .alert-info i {
      margin-right: 8px;
    }
  </style>
</head>
<body>

<!-- Navigation -->
<?php if (isset($_SESSION["user"])): ?>
  <?php require_once("../../navbar/navbarArtisan.php"); ?>
<?php else: ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="bi bi-images"></i> Galerie
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="../profil_artisan_client.php?id=<?= htmlspecialchars($_GET["photo"]) ?>">
              <i class="bi bi-box-arrow-left"></i> Quitter
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php endif; ?>

<?php if (count($images) > 0): ?>
<section class="container my-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div id="carouselGalerie" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php for ($i = 0; $i < min(5, count($images)); $i++): ?>
            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>" data-bs-interval="2500">
              <a href="../../image/<?= $images[$i]['nom'] ?>">
                <img src="../../image/<?= $images[$i]['nom'] ?>" class="d-block w-100" alt="Image <?= $i + 1 ?>">
              </a>
            </div>
          <?php endfor; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselGalerie" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselGalerie" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Suivant</span>
        </button>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Galerie -->
<div class="container gallery-container">
  <div class="row g-3">
    <?php if (count($images) > 0): ?>
      <?php foreach ($images as $image): ?>
        <div class="col-6 col-md-4 col-lg-3">
          <a href="../../image/<?= $image["nom"] ?>" title="Voir l’image">
            <img src="../../image/<?= $image["nom"] ?>" class="gallery-img" alt="Image">
          </a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <div class="alert alert-info text-center">
          <i class="bi bi-info-circle"></i> Aucune photo disponible pour l’instant.
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<script src="../../bootstrap.bundle.js"></script>
</body>
</html>
