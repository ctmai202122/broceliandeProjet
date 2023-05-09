<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
?>

<main class="container">

    <?php
    // Début de la grille des contrees
    echo "<div class='grid-contrees'>";

    // Boucle pour afficher les contrees
    foreach ($listeContrees as $contree) {

        // Affichage d'une contree
        echo "<div class='contrees'>";
        echo "<a href='./?action=detailsContree&id=" . $contree["Id_contree"] . "' >";
        // Lien vers la page de la contree
        echo "<h2>{$contree["titre"]}</h2>"; // Titre de la contree
        echo "<img src='./Data/images/{$contree["photo"]}' alt='{$contree["titre"]}' >";
        // Image de la contree
        echo "</a>";
        echo "</div>";
    }
    // Fin de la grille des contrees
    echo "</div>";
    ?>
</main>

<?php
// Inclusion du fichier de vue pour le footer
include_once(__DIR__ . '/viewFooter.php');
?>