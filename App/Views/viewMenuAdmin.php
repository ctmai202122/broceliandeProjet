<?php
// Récupérer l'action de la page active depuis l'URL
// $action = $_GET['action'] ?? 'commentaire';

// // Fonction pour vérifier si l'onglet est actif
// function isTabActive($tab) {
//     global $action;
//     // Vérifier si l'action correspond à l'onglet
//     if ($action === $tab) {
//         return 'active';
//     } else {
//         return '';
//     }
// }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="navAdmin">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item  ">
                    <a class="choix" href="?action=commentaire"  >Modération commentaires</a>
                </li>
                <li class="nav-item ">
                    <a href="?action=gestionContree">Gestion contrées</a>
                </li>
                <li class="nav-item ">
                    <a href="?action=gestionLegende">Gestion légendes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
