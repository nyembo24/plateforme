<?php
require_once("../../connexion/conn.php");
require_once("../../models/class/class_valider_artisan.php");
if (!isset($_SESSION["admin"])) {
    header("location:../../index.php");
    exit;
}
$db = new connexion();
$conn = $db->getconnexion();
$valeur = new valider($conn);
$val = $valeur->lister_avis();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Liste des utilisateurs</title>
  <link rel="stylesheet" href="../../bootstrap.css"/>
  <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../style/style1.css">
  <link rel="stylesheet" href="../../style/demande.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      margin-top: 50px;
      border-radius: 1rem;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .user-link {
      display: block;
      padding: 10px;
      margin-bottom: 10px;
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 0.5rem;
      text-decoration: none;
      color: #333;
      transition: background-color 0.2s ease;
    }
    .user-link:hover {
      background-color: #e9ecef;
    }
  </style>
</head>
<body>
  <?php require_once("../../navbar/navbarAdmin.php") ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-primary text-white text-center">
            <h4><i class="bi bi-person-fill me-2"></i>envis non valider</h4>
          </div>
          <div class="card-body">
            <?php while($contanu = $val->fetch()){ ?>
              <a class="user-link" href="envis.php?profil=<?= $contanu['id_ar'] ?>">
                <i class="bi bi-person-fill me-2"></i><?= $contanu['username'] ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../bootstrap.bundle.js"></script>
</body>
</html>
