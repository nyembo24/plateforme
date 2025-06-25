<?php 
require_once("../../connexion/conn.php");
require_once("../../models/class/class_demande.php");
if (!isset($_SESSION["user"])) {
    header("location:../../index.php");
    exit;
}
$db = new connexion();
$conn = $db->getconnexion();
$valeur = new demande($conn);
$val = $valeur->afficher_tout_demande();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Demandes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap.css">
    <link rel="stylesheet" href="../../style/style1.css">
    <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style/afficher_demande.css">
</head>
<body>
    <?php require_once("../../navbar/navbarArtisan.php") ?>
    <div class="container" style="margin-top: 10vh;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Liste des Demandes</h3>
                    </div>
                    <div class="card-body">
                        <?php $i = 0; while ($contenu = $val->fetch()) { $i++; ?>
                            <div class="mb-4 border rounded p-3 bg-light">
                                <div class="p-2 mb-2 rounded" style="background-color: #d1ecf1;">
                                    <strong class="text-primary">Sujet :</strong><br>
                                    <?= htmlspecialchars($contenu['sujet']) ?>
                                </div>
                                <div class="p-2 rounded" style="background-color: #f8d7da;">
                                    <strong>Description :</strong><br>
                                    <?= nl2br(htmlspecialchars($contenu['description'])) ?>
                                </div>
                                <div class="mt-2 text-end">
                                    <a href="../message.php?message=<?= $contenu["id_de"] ?>" class="btn btn-success btn-sm">
                                        <i class="bi bi-chat-left-text-fill"></i> Contacter
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($i == 0): ?>
                            <div class="alert alert-info text-center">Aucune demande disponible pour l’instant.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="../../bootstrap.bundle.js"></script>
</body>
</html>
