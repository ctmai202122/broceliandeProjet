<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
?>

<!-- Affichage des informations de la contrée -->
<main class="container">
    <div class="detailsLegende">
        <h1><?= $legende['titre'] ?></h1>
        <p><?= nl2br($legende['contenu']) ?></p>
        <img src="Data/images/<?= $legende['photo'] ?>" alt="<?= $legende['titre'] ?>">

        <?php if (isset($contree)) { ?>
            <h3>La contrée qui correspond à cette légende :
                <!-- Lien sur le titre de la contree -->
                <a href = "?action=detailsContree&id=<?= $contree['Id_contree'] ?>"> 
                    <span><?= $contree['titre'] ?></span>
                </a>
            </h3>
        <?php } ?>
    </div>
</main>

<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>
