<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
?>

<!-- Affichage des informations de la contrée -->
<main class="container">
    <div class="detailsContree">

        <?php if (isset($message)) { ?>
            <div class="alert alert-primary" role="alert"><?= $message ?></div>
        <?php } ?>
        
        <h1><?= $contree['titre'] ?></h1>
        <p><?= nl2br($contree['contenu']) ?></p>
        <img src="./Data/images/<?= $contree['photo'] ?>" alt="<?= $contree['titre'] ?>">
        <p>Latitude : <?= $contree['latitude'] ?></p>
        <p>Longitude : <?= $contree['longitude'] ?></p>
        <p>Commune : <?= $contree['commune'] ?></p>
        <p>Accessibilité : <?= $contree['accessibilite'] ?></p>
        <p>Ouverture : <?= $contree['ouverture'] ?></p>

        <h2>Commentaires</h2>
        <?php if (!empty($commentaires)) { ?>
            <?php foreach ($commentaires as $commentaire) { ?>
                <div class="commentaire">
                    <p><?= $commentaire['pseudo'] ?> a dit :</p>
                    <p><?= nl2br($commentaire['texte']) ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Aucun commentaire pour le moment</p>
        <?php } ?>

        <h2>Laisser un commentaire</h2>
        <form method="post" action="?action=addCommentaire">
            <div class="form-group">
                <label for="pseudo" class="required">Auteur : *</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre nom prénom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="commentaire" class="required">Commentaire : *</label>
                <textarea class="form-control" rows="5" id="commentaire" name="texte" placeholder="Votre message" class="form-control" required></textarea>
            </div>
            <input type="hidden" name="idContree" value="<?= $contree['Id_contree'] ?>">

            <!-- input type="hidden" name="titreContree" value="<?= $contree['titre'] ?>" -->

            <button type="submit" class="btn">Soumettre</button>
        </form>
    </div>
</main>

<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>