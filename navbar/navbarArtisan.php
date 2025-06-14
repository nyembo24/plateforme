<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <a title="profil" href="../../page/adminArtisan/profil.php"><img class="avatar" src="../../image/<?= $_SESSION["profil"] ?>" alt="profil"></a>
        </div>
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
                        <a class="nav-link active" href="../../page/adminArtisan/afficher_demande.php"><i class="bi bi-house-door">Liste de demande</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../page/adminArtisan/message_liste_artisan.php">Message</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action 1</a></li>
                            <li><a class="dropdown-item" href="#">Action 2</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
    @media (max-width: 518px) {
        .offcanvas-start {
            width: 70% !important; /* largeur spéciale pour très petits écrans */
        }
    }
</style>

