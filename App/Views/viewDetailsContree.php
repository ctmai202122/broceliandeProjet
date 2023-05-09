<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
?>

<!-- // Affichage des informations de la contrée -->
<main class="container">
    <div class="detailsContree">
        <h1><?= $contree['titre'] ?></h1>
        <p>Description : <?= $contree['contenu'] ?></p>
        <img src="./Data/images/<?= $contree['photo'] ?>" alt="<?= $contree['titre'] ?>">
        <p>Latitude : <?= $contree['latitude'] ?></p>
        <p>Longitude : <?= $contree['longitude'] ?></p>
        <p>Commune : <?= $contree['commune'] ?></p>
        <p>Accessibilité : <?= $contree['accessibilite'] ?></p>
        <p>Ouverture : <?= $contree['ouverture'] ?></p>
        <h2>Laisser un commentaire</h2>
        <form method="post" action="?action=commentaire">
            <div class="formCom">
                <label for="pseudo">Auteur :</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div>
            <div class="formCom">
                <label for="commentaire">Commentaire :</label>
                <textarea class="form-control" rows="5" id="commentaire" name="commentaire" required></textarea>
            </div>
            <input type="hidden" name="id_contree" value= <?= $contree['Id_contree'] ?>> 
            <button type="submit" class="btn btn-primary my-3">Soumettre</button>
        </form>


        <h2>Commentaires</h2>
        <?php if (!empty($commentaires)) { ?>
            <?php foreach ($commentaires as $commentaire) { ?>
                <div class="commentaire">
                    <p><?= $commentaire['pseudo'] ?> a dit :</p>
                    <p><?= $commentaire['texte'] ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Aucun commentaire pour le moment</p>
        <?php } ?>
    </div>
</main>

<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>