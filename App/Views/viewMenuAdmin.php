<nav class="navbar navbar-expand-lg navbar-dark justify-content-center">
    <div class="navAdmin">
        <!-- Le bouton burger admin qui permettra de déclencher le menu déroulant -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuAdmin" aria-controls="menuAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <h4> Menu d'administration </h4>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuAdmin">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item d-flex justify-content-center">
                    <a class="nav-link" href="?action=gestionCommentaire">Modération commentaires</a>
                </li>
                <li class="nav-item d-flex justify-content-center">
                    <a class="nav-link" href="?action=gestionContree">Gestion contrées</a>
                </li>
                <li class="nav-item d-flex justify-content-center">
                    <a class="nav-link" href="?action=gestionLegende">Gestion légendes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>