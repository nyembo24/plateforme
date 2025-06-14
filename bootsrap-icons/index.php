<?php
// Chemin vers le dossier icone
$dir = "../bootsrap-icons/";

// Récupérer tous les fichiers .svg dans ce dossier
$files = glob($dir . '*.svg');

// Trier les fichiers par ordre alphabétique
sort($files);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Galerie automatique des icônes SVG</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f4f4f4;
      padding: 2rem;
    }
    h1 {
      text-align: center;
      margin-bottom: 2rem;
    }
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 20px;
    }
    .icon-box {
      background: white;
      padding: 10px;
      border-radius: 8px;
      text-align: center;
      border: 1px solid #ddd;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .icon-box img {
      width: 32px;
      height: 32px;
      margin-bottom: 8px;
    }
    .icon-name {
      font-size: 12px;
      color: #333;
      word-break: break-word;
    }
  </style>
</head>
<body>

  <h1>Galerie automatique des icônes SVG (triées A → Z)</h1>
  <div class="gallery">
    <?php foreach($files as $file): 
      $filename = basename($file); // ex: alarm.svg
      $relativePath = $dir . $filename;
    ?>
      <div class="icon-box">
        <img src="<?php echo htmlspecialchars($relativePath); ?>" alt="<?php echo htmlspecialchars($filename); ?>">
        <div class="icon-name"><?php echo htmlspecialchars($filename); ?></div>
      </div>
    <?php endforeach; ?>
  </div>

</body>
</html>
