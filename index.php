<?php 
require_once('connexion/conn.php');
require_once("models/class/class_profil_publique.php");
require_once('models/class/class_recherche.php');
$db=new connexion();
$conn=$db->getconnexion();
$valeur= new publique($conn);
$requte=new recherche($conn);
$nbr=$valeur->pagination_profil()["nb"];
$afficher=9;
$point=ceil($nbr/$afficher);
if(isset($_GET["page"]) and ! empty($_GET["page"])){

    $debut=htmlspecialchars($_GET["page"]);
}
else{
    $debut=1;
}
$limite=($debut-1)*$afficher;
$valeur->set_limite($limite);
$valeur->set_afficher($afficher);
if(isset($_POST["query"]) and ! empty($_POST["query"])){
    $requte->set_query(htmlspecialchars($_POST["query"]));
    $val=$requte->artisan();
    $values=$_POST["query"];
}else{
    $val=$valeur->selection();
    $values="";
}
?>
<?php if(isset($_GET["sms"]) and ! empty($_GET["sms"])) {?>
    <script>alert('<?=$_GET["sms"] ?>')</script>
<?php }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Artisans</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootsrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <?php require_once("navbar.php"); ?>
    <?php if(! isset($_POST["query"]) and empty($_POST["query"])or isset($_POST["query"]) and empty($_POST["query"])){ ?>
    <div class="container1 mt-1">
        <p id="presentation">Vous êtes un professionnel à la recherche de chantiers ? <a href="page/inscrire.php">Inscrivez-vous gratuitement</a></p>
        <div>
            <p>Le moyen fiable d'engager un artisan</p>
            <img src="image/image.png" alt="">
        </div>
    </div>
    <div class="engager mt-2">
        <h3>Comment engager le bon artisan</h3>
        <div class="imgage mt-2">
            <div>
                <img src="image/image_developement/postYourJob.svg" alt="">
                <h5 class="text-center">ÉTAPE 1</h5>
                <p class="text-center">publier votre projet</p>
            </div>
            <div>
                <img src="image/image_developement/reviewAndChoose.svg" alt="">
                <h5 class="text-center">ÉTAPE 2</h5>
                <p class="text-center">Les artisans vous contacte</p>
            </div>
            <div>
                <img src="image/image_developement/tradespeopleRespond.svg" alt="">
                <h5 class="text-center">ÉTAPE 3</h5>
                <p class="text-center">Consultez leurs profils</p>
            </div>
        </div>
    </div>
    <div class="pourqoi">
        <h3>Pourquoi notre plateforme est la solution fiable</h3>
        <p>Il n'est pas toujours facile de faire appel à un artisan quand on en a besoin. notre plateforme  est le moyen fiable qui vous aide à engager l'artisan qu'il vous faut pour vos travaux</p>
        <h3>Prêt à engager un artisan ?</h3>
        <a href="page/inscrire.php" class="btn btn-outline-primary btn-sm">inscriver vous ici</a>
    </div>
    <?php } ?>
    <main class="container py-4">
        <h2 class="mb-4 text-center text-primary">Nos Artisans à Butembo le plus populaire</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <?php while($contenu=$val->fetch()){ ?>
            <div class="col">
                <div class="card shadow-sm h-100">
                    <a href="image/<?= $contenu["image_profil"]?>">
                        <img src="image/<?= $contenu["image_profil"]?>" class="card-img-top" alt="Photo Artisan" style="height: 200px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title text-primary"><?= $contenu["nom"]?></h5>
                        <p class="card-text text-muted"><i class="bi bi-briefcase"></i> <?= $contenu["profession"]?></p>
                        <p class="card-text"><?= $contenu["description"]?></p>
                    </div>
                    <div class="card-footer text-end bg-white">
                        <a href="page/profil_artisan_client.php?id=<?= $contenu["id_pr"]?>" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye"></i> Voir Profil
                        </a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <?php for($i=1;$i<=$point;$i++){ ?>
        <?php if($point!=1){
            if(isset($_GET["page"]) and $_GET["page"]==$i){
            ?>
        <a href="?page=<?= $i ?>" class="btn btn-danger"><?= $i ?></a>
        <?php } else{ ?>
            <a href="?page=<?= $i ?>" class="btn btn-success"><?= $i ?></a>
        <?php } }?>
        <?php }?>
    </main>

    <footer>
        <p id="reserver">&copy; <?= date("Y") ?> Plateforme Artisanale. Tous droits réservés à <a href="#">plateforme</a></p>
    </footer>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>