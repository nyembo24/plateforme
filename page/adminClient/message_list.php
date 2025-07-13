<?php
require_once("../../connexion/conn.php");
require_once("../../models/class/class_message.php");
require_once("../../models/class/class_recherche.php");
if (!isset($_SESSION["patron"])) {
    header("location:../../index.php");
    exit;
}
$db = new connexion();
$conn = $db->getconnexion();
$valeur = new message($conn);
$requte=new recherche($conn);
if(isset($_POST["query"]) and ! empty($_POST["query"])){
  $requte->set_query(htmlspecialchars($_POST["query"]));
  $val=$requte->message_client();
  $values=$_POST["query"];
}else{
  $val = $valeur->list_utilisateur_sms_clien();
  $values="";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Liste des utilisateurs</title>
  <link rel="stylesheet" href="../../bootstrap.css"/>
  <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
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
  <?php require_once("../../navbar/navbarClient.php") ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-primary text-white text-center">
            <h4><i class="bi bi-chat-dots me-2"></i>Utilisateurs de messagerie</h4>
          </div>
          <div class="card-body">
            <?php while($contanu = $val->fetch()){ ?>
              <a class="user-link" href="../message.php?id_de=<?= $contanu['id_de'] ?>&id_ar=<?= $contanu['id_ar'] ?>">
                <i class="bi bi-person-fill me-2"></i><?= htmlspecialchars($contanu['username']) ?>
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
