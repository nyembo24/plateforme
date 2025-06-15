<?php
  die;
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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chat SMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/message.css">
  <script src="../jquery-3.7.1.min.js"></script>
</head>
<body>
<div class="chat-container">
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
</body>
</html>
