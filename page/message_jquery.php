<?php
require("../connexion/conn.php");
require("../models/class/class_message.php");
$db = new connexion();
$conn = $db->getconnexion();
$valeur = new message($conn);
if(isset($_SESSION["user"])){
    if(isset($_GET["message"]) and isset($_GET["message"])){
        $_SESSION['id_de'] = htmlspecialchars($_GET['message']);
        header("location:?");
        exit;
    }
    $val = $valeur->selection_artisan();
    $editeur = "1"; // À adapter selon l’utilisateur
}elseif(isset($_SESSION["patron"])){
  if(isset($_GET["id_de"]) and isset($_GET["id_ar"])){
    $_SESSION["id_de"]=$_GET["id_de"];
    $_SESSION["id_ar"]=$_GET["id_ar"];
    header("location:?");
  }
  $editeur = "0";
  //var_dump($_SESSION);die;
  $val = $valeur->selection_client();
}
else{
  header("location:../index.php");
  exit;
}
?>
<?php while($contenu = $val->fetch()): ?>
    <?php if ($contenu["editeur"] == $editeur): ?>
    <p class="droit"><?= $contenu['description'] ?></p>
    <?php else: ?>
    <p class="gauche"><?= $contenu['description'] ?></p>
    <?php endif; ?>
<?php endwhile; ?>