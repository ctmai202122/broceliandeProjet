<?php
include_once(__DIR__ . '/viewHeader.php');
?>

<main class="accueil">
    <div class="bandeau-img">
        <img src="./Data/images/vueBroceliande.jpg" alt="Paysage forêt Brocéliande">
        <div class="texte-bandeau">
            <h2>Broc&amp;Landes</h2>
            <p> Venez visiter Brocéliande</p>
        </div>
    </div>
    <div class='grid-contrees'>
    <!--Permet de récupérer et afficher les quatre premières contrées -->
    <?php foreach (array_slice($listeContrees, 0, 4) as $contree) { ?>
        <div class='contrees'>
        <div class="containerZoom">
            <a href='./?action=detailsContree&id=<?= $contree["Id_contree"] ?>'>
                <h2> <?= $contree["titre"]; ?> </h2>
                <img class="zoomImage" src="./Data/images/<?= $contree["photo"]; ?> " alt="<?= $contree["titre"]; ?>">
            </a>
        </div>
        </div>
    <?php } ?>
</div>

</main>

<?php
include_once(__DIR__ . '/viewFooter.php');
?>
