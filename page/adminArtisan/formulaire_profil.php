<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Compléter le profil</title>
  <link rel="stylesheet" href="../../bootstrap.css" />
  <link rel="stylesheet" href="../../style/style1.css" />
  <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      margin-top: 50px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      border-radius: 1rem;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <?php require_once("../../navbar/navbarArtisan.php") ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header bg-primary text-white text-center">
            <h3><i class="bi bi-person-circle me-2"></i>Compléter votre profil</h3>
          </div>
          <div class="card-body">
            <form action="../../models/controleur/controleur_profil.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="">Nom complet</label>
                <input name="nom" required autocomplete="off" class="form-control" type="text" placeholder="Entrez votre nom complet">
              </div>
              <div class="mb-3">
                <label class="form-label" for="">Profession</label>
                <input name="profession" required autocomplete="off" class="form-control" type="text" placeholder="Entrez votre profession">
              </div>
              <div class="mb-3">
                <label class="form-label" for="">Description</label>
                <textarea required name="description" id="" rows="3" class="form-control"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" for="">Photo de profil</label>
                <input name="profil" required class="form-control" type="file">
              </div>
              <div class="mb-3">
                <label class="form-label" for="">Document attestant que vous êtes artisan</label>
                <input name="document" required class="form-control" type="file">
              </div>
              <div class="mb-3">
                <label class="form-label" for="">Email</label>
                <input name="mail" required class="form-control" type="email" placeholder="exemple@domaine.com">
              </div>
              <div class="mb-3">
                <label class="form-label" for="">Numéro de téléphone</label>
                <input name="tel" required class="form-control" type="text" placeholder="+243...">
              </div>
              <div class="text-end">
                <button class="btn btn-primary">
                  <i class="bi bi-save me-1"></i>Enregistrer
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../bootstrap.bundle.js"></script>
</body>
</html>
