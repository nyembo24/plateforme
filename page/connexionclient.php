<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <div class="login-container">
    <div class="avatar">
      <img src="../image/img1.png" alt="logo">
    </div>
    <form action="../models/controleur/controleur_inscription.php" method="post">
      <div class="input-group">
      <input type="hidden" name="fonction" value="0">
        <label for="username"><i class="fas fa-user"></i> nom d'utilisateur</label>
        <input name="usr" autocomplete="off" type="text" id="username" placeholder="nom d'utilisateur" required>
      </div>
      <div class="input-group">
        <label for="password"><i class="fas fa-lock"></i> mots de passe</label>
        <input name="pwd" autocomplete="off" type="password" id="password" placeholder="mots de passe" required>
        <span class="toggle-password" onclick="togglePassword()">👁️</span>
      </div>
      <div class="options">
        <label><input name="remember" type="checkbox" id="remember"> souvenir</label>
        <a href="mots_de_passe_oublier.php" class="forgot-password">mots de passe oublier?</a>
      </div>
      <button type="submit" class="login-btn">connexion</button>
    </form>
  </div>
  <script src="../script.js"></script>
</body>
</html>