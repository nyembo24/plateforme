<style>
    .navbar-toggler-icon {
        background-color: white;
    }
</style>
<nav
    class="navbar navbar-expand-sm navbar-light bg-dark"
>
    <div class="container">
        <a class="navbar-brand text-white" href="acceuil.php">
            <i class="bi bi-house-door"></i> Acceuil
        </a>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-white"
                        href="#"
                        id="dropdownId"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="bi bi-person"></i> utilisateur
                    </a>
                    <div
                        class="dropdown-menu"
                        aria-labelledby="dropdownId"
                    >
                        <a class="dropdown-item" href="valider_artisan.php">
                            <i class="bi bi-check-circle"></i> nos valider
                        </a>
                        <a class="dropdown-item" href="lister_avis.php">
                            <i class="bi bi-chat-dots"></i> envis
                        </a>
                    </div>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" />
                    <button class="btn btn-outline-success" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <!-- Bouton Déconnexion -->
                <a title="Déconnexion" href="../../page/kill_proccess.php" class="btn btn-outline-danger text-white">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </a>
            </div>
        </div>
    </div>
</nav>
