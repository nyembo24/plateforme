<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="../bootsrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style/inscrire.css">
</head>
<body>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h3>Inscription</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if(isset($_GET["sms"]) and ! empty($_GET["sms"])) {?>
                            <p style="color: red;"><?=$_GET["sms"] ?></p>
                        <?php }?>
                        <form action="../models/controleur/controleur_inscription.php" method="post">
                            <div class="mb-4">
                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                <input maxlength="20" name="usr" id="username" required autocomplete="off" type="text" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input name="pwd" id="password" required autocomplete="off" type="password" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input name="mail" id="email" required autocomplete="off" type="email" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="tel" class="form-label">Téléphone</label>
                                <input name="tel" id="tel" required autocomplete="off" type="text" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="fonction" class="form-label">Fonction</label>
                                <select class="form-select" name="fonction" id="fonction">
                                    <option value="0" selected>Client</option>
                                    <option value="1">Artisan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap.bundle.js"></script>
</body>
</html>