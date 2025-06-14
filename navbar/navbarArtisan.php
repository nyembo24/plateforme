<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Bouton pour ouvrir le menu -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Bloc contenant l'image de profil et le bouton Déconnexion -->
        <div class="d-flex align-items-center">
            <!-- Lien vers le profil avec photo -->
            <a title="Profil" href="../../page/adminArtisan/profil.php">
                <img class="avatar" src="../../image/<?= $_SESSION["profil"] ?>" alt="profil" style="width:40px; height:40px; border-radius:50%;">
            </a>

            <!-- Bouton Déconnexion avec espace de 20px -->
            <a title="Déconnexion" href="../../page/kill_proccess.php" class="btn btn-outline-danger" style="margin-left: 20px;">
                <i class="bi bi-box-arrow-right"></i> Déconnexion
            </a>
        </div>
    </div>

    <!-- Menu latéral -->
    <div
        class="offcanvas offcanvas-start"
        tabindex="-1"
        id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel"
    >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button
                type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
            ></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" href="../../page/adminArtisan/afficher_demande.php">
                        <i class="bi bi-house-door"></i> Liste de demande
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../page/adminArtisan/message_liste_artisan.php">
                        <i class="bi bi-chat-dots"></i> Message
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i> Options
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action 1</a></li>
                        <li><a class="dropdown-item" href="#">Action 2</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Style pour les petits écrans -->
<style>
    @media (max-width: 518px) {
        .offcanvas-start {
            width: 70% !important;
        }
    }
</style>
