<?php
  if(isset($_GET["message"]) and isset($_GET["message"])){
    session_start();
    $_SESSION['id_de'] = htmlspecialchars($_GET['message']);
    header("location:?");
  }
  if(isset($_GET["id_de"]) and isset($_GET["id_ar"])){
    session_start();
    $_SESSION["id_de"]=$_GET["id_de"];
    $_SESSION["id_ar"]=$_GET["id_ar"];
    header("location:?");
  }
  if(isset($_GET["id"])){
    session_start();
    $_SESSION["avis"]=htmlspecialchars($_GET['id']);
    header("location:?");
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chat SMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/message.css">
  <script src="../jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="../bootstrap.css">
  <link rel="stylesheet" href="../bootsrap-icons/font/bootstrap-icons.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-light bg-dark">
    <div class="container">
      <div class="nav navbar-nav">
        <a class="nav-item nav-link active text-white" href="#" aria-current="page"
          ><i class="bi bi-chat-dots">Message</i><span class="visually-hidden">(current)</span></a
        >
      </div>
      <div class="d-flex align-items-end">
          <!-- Bouton Déconnexion -->
           <?php session_start(); if(isset($_SESSION["user"])){ ?>
          <a title="Déconnexion" href="adminArtisan/afficher_demande.php" class="btn btn-outline-danger text-white">
              <i class="bi bi-box-arrow-right"></i> Quiter
          </a>
          <?php }else{ ?>
            <a title="Déconnexion" href="adminClient/Adminclient.php" class="btn btn-outline-danger text-white">
              <i class="bi bi-box-arrow-right"></i> Quiter
          </a>
          <?php } ?>
      </div>
    </div>
  </nav>
  
<div class="chat-container mt-5">
  <div class="messages" id="chatBox">
    
  </div>
  <form action="../models/controleur/controleur_message.php" method="post">
    <div class="input-area">
      <textarea required autocomplete="off" name="description" placeholder="Écris ton message..."></textarea>
      <button type="submit">Envoyer</button>
    </div>
  </form>
</div>
<script src="../script/message.js"></script>
<script src="../bootstrap.bundle.js"></script>
</body>
</html>
