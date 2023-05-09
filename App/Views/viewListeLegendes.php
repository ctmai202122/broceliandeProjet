<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
?>

<main class="container">
   <?php
   // Début de la grille des legendes
   echo "<div class='grid-legendes'>";

   // Boucle pour afficher les legendes
   foreach ($listeLegendes as $legende) {

      // Affichage d'une legende
      echo "<div class='legendes'>";
      echo "<a href='./?action=detailsLegende&id=" . $legende["Id_legende"] . "' >"; // Lien vers la page de la legende
      echo "<h2>{$legende["titre"]}</h2>"; // Titre de la legende
      echo "<img src='Data/images/{$legende["photo"]}' alt='{$legende["titre"]}' >"; // Image de la legende
      echo "</a>";
      echo "</div>";
   }
   // Fin de la grille des legendes
   echo "</div>";
   ?>
</main>

<?php
// Inclusion du fichier de vue pour le footer
include_once(__DIR__ . '/viewFooter.php');
?>