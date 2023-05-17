<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
?>

<!-- // Affichage des informations de la contrée -->
<main class="container">
    <div class="detailsLegende">
        <h1><?= $legende['titre'] ?></h1>
        <p>Description : <?= nl2br($legende['contenu']) ?></p>
        <img src="Data/images/<?= $legende['photo'] ?>" alt="<?= $legende['titre'] ?>">
        <h3>Cette légende correpond à cette contrée : <span> <?= $contree['titre'] ?></span></h3>
    </div>
</main>

<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?> 