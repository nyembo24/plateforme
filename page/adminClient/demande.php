<?php
require_once("../../connexion/conn.php");
require_once("../../models/class/class_demande.php");
if (! isset($_SESSION["patron"])) {
    header("location:../../index.php");
    exit;
}
$db = new connexion();
$conn = $db->getconnexion();
$valeur = new demande($conn);
$val = $valeur->afficher();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap.css">
    <link rel="stylesheet" href="../../bootsrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style/demande.css">
</head>
<body>
    <?php require_once("../../navbar/navbarClient.php") ?>
    <div class="row p-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">liste de Demande</h3>
                </div>
                <div class="card-body">
                    <form action="../../models/controleur/controleur_demande.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">sujet</label>
                            <input name="sujet" required autocomplete="off" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea required autocomplete="off" class="form-control" name="description" id="" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Publier</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center"> liste de demande</h3>
                </div>
                <div class="card-body">
                    <div
                        class="table-responsive">
                        <table
                            class="table table-striped-columns table-hover table-borderless table-primary align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>N°</th>
                                    <th>Message</th>
                                    <th>Rétirer</th>
                                    <th>suspendre</th>
                                    <th>modifier</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <?php
                                $i = 0;
                                $data = $val->fetchAll(PDO::FETCH_ASSOC); // Fetch all data once and store it in a variable
                                foreach ($data as $contenu) {
                                    $i++;
                                ?>
                                    <tr
                                        class="table-primary">
                                        <td><?= $i ?></td>
                                        <td><!-- Modal trigger button -->
                                            <button
                                                type="button"
                                                class="btn btn-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalId-<?= $i ?>">
                                                <i class="bi bi-envelope-fill">Message</i>
                                            </button>

                                            <!-- Modal Body -->
                                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                            <div
                                                class="modal fade"
                                                id="modalId-<?= $i ?>"
                                                tabindex="-1"
                                                data-bs-backdrop="static"
                                                data-bs-keyboard="false"

                                                role="dialog"
                                                aria-labelledby="modalTitleId-<?= $i ?>"
                                                aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalTitleId-<?= $i ?>">
                                                                Publication
                                                            </h5>
                                                            <button
                                                                type="button"
                                                                class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-3">
                                                            <div class="card p-1">
                                                                <?= $contenu["sujet"] ?>
                                                            </div>
                                                            <div class="card mt-2 p-1">
                                                                <?= $contenu["description"] ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../../models/controleur/controleur_demande.php?sup=<?= $contenu["id_de"] ?>" class="btn btn-secondary btn-sm"><i class="bi bi-trash-fill">Retirer</i></a>
                                        </td>
                                        <td>
                                            <?php if ($contenu["suspendu"] == 1) { ?>
                                                <a href="../../models/controleur/controleur_demande.php?id_pause=<?= $contenu["id_de"] ?> && susp" class="btn btn-warning btn-sm"><i class="bi bi-pause-circle-fill">relancer</i></a>
                                            <?php } else { ?>

                                                <a href="../../models/controleur/controleur_demande.php?id_pause=<?= $contenu["id_de"] ?> && pause" class="btn btn-warning btn-sm"><i class="bi bi-play-circle-fill">pause</i></a>
                                            <?php } ?>

                                        </td>
                                        <td>
                                            <a
                                                href="?"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil-fill"> modifier</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <script>
                                    document.querySelectorAll('[data-bs-toggle="modal"]').forEach((button) => {
                                        button.addEventListener('click', () => {
                                            const modalId = button.getAttribute('data-bs-target').substring(1);
                                            const modal = document.getElementById(modalId);
                                            const index = parseInt(modalId.split('-')[1]) - 1;
                                            const sujet = <?= json_encode($data) ?>[index]['sujet'];
                                            const description = <?= json_encode($data) ?>[index]['description'];

                                            modal.querySelector('.modal-body .card:nth-child(1)').innerHTML = sujet;
                                            modal.querySelector('.modal-body .card:nth-child(2)').innerHTML = description;
                                        });
                                    });
                                </script>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="../../bootstrap.bundle.js"></script>
</body>

</html>