<nav class="navbar navbar-expand-sm navbar-light bg-light mt-2">
            <div class="container">
                <!-- Logo / Accueil -->
                <a class="navbar-brand" href="?acceuil">
                    <i class="bi bi-house-door"></i> Accueil
                </a>

                <!-- Bouton burger pour les petits écrans -->
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu collapsible -->
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="page/inscrire.php">
                                <i class="bi bi-person-plus"></i> S'inscrire
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-door-open"></i> Portail
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="page/connexionclient.php">
                                    <i class="bi bi-person-badge"></i> Client
                                </a>
                                <a class="dropdown-item" href="page/connexionartisan.php">
                                    <i class="bi bi-brush"></i> Artiste
                                </a>
                            </div>
                        </li>
                    </ul>

                    <!-- Formulaire de recherche -->
                    <form class="d-flex my-2 my-lg-0">
                        <input class="form-control me-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>