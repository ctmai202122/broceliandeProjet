<?php include_once(__DIR__ . '/viewHeader.php'); ?>

<main class="container">
    <div class='grid-contrees'>
        <?php foreach ($listeContrees as $contree) { ?>
            <div class='contrees'>
                <a href='./?action=detailsContree&id=<?= $contree["Id_contree"] ?>'>
                    <!-- div pour englober titre en image zoom au survol -->
                    <div class="containerZoom">
                        <h2><?= $contree["titre"]; ?></h2>
                        <img class="zoomImage" src='./Data/images/<?= $contree["photo"]; ?>' alt='<?= $contree["titre"]; ?>'>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</main>

<?php include_once(__DIR__ . '/viewFooter.php'); ?>