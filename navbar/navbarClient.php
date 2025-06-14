<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="bi bi-bootstrap-fill"></i> Navbar</a>

        <!-- Bouton pour collapse -->
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
                <li class="nav-item">
                    <a class="nav-link active" href="Adminclient.php" aria-current="page">
                        <i class="bi bi-house-door"></i> Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="demande.php" aria-current="page">
                        <i class="bi bi-list-ul"></i> Demande
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message_list.php">
                        <i class="bi bi-chat-dots"></i> Message
                    </a>
                </li>
            </ul>

            <!-- Barre de recherche + Déconnexion -->
            <div class="d-flex align-items-center">
                <form class="d-flex me-3">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" />
                    <button class="btn btn-outline-success" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <!-- Bouton Déconnexion -->
                <a title="Déconnexion" href="../../page/kill_proccess.php" class="btn btn-outline-danger">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </a>
            </div>
        </div>
    </div>
</nav>
