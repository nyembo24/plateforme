<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="../style/style1.css">
</head>
<body>
    <div class="oublier">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <?php while($contenu = $val->fetch()): ?>
                <?php if ($contenu["editeur"] == $editeur): ?>
                    <p class="droit"><?= htmlspecialchars($contenu['description']) ?></p>
                <?php else: ?>
                    <p class="gauche"><?= htmlspecialchars($contenu['description']) ?></p>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>
</html>