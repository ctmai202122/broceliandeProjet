<?php

namespace Broceliande\Views;

include_once(__DIR__ . '/viewHeader.php');

?>

<div class="admin">
    <ul class="nav nav-tabs navbar-dark">
        <li class="nav-item">
            <a class="nav-link" href="?action=gestionContree">Gestion contrées</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?action=gestionLegende">Gestion légendes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="?action=commentaire">Modération commentaires</a>
        </li>
    </ul>
</div>
<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>