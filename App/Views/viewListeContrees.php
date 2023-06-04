<?php include_once(__DIR__ . '/viewHeader.php'); ?>

<main class="container">
    <div class='grid-contrees'>
        <?php foreach ($listeContrees as $contree) { ?>
            <div class='contrees'>
                <!-- div pour englober titre en image zoom au survol -->
                <div class="containerZoom">
                <a href='./?action=detailsContree&id=<?= $contree["Id_contree"] ?>'>
                        <h2><?= $contree["titre"]; ?></h2>
                        <?php if (!empty($contree['photo']) && file_exists(__DIR__ . "/../../Data/images/" . $contree['photo'])) { ?>
                            <img class="zoomImage" src='./Data/images/<?= $contree["photo"]; ?>' alt='<?= $contree["titre"]; ?>'>
                        <?php } ?>
                    </a>
                    </div>
            </div>
        <?php } ?>
    </div>
</main>

<?php include_once(__DIR__ . '/viewFooter.php'); 
?>