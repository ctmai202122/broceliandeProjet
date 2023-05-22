<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');

// Vérification si un message de confirmation est présent dans la session
if (isset($_SESSION['message'])) {
    // Stockage du message dans une variable et suppression de la session
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!-- Affichage des informations de la contrée -->
<main class="container">
    <div class="detailsContree">
        <h1><?= $contree['titre'] ?></h1>
        <p>Description : <?= nl2br($contree['contenu']) ?></p>
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
                    <p><?= $commentaire['commentaire'] ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Aucun commentaire pour le moment</p>
        <?php } ?>

        <h2>Laisser un commentaire</h2>
<form method="post" action="?action=commentaire">
    <div class="form-group">
        <label for="pseudo" class="required">Auteur : *</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre nom prénom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="commentaire" class="required">Commentaire : *</label>
        <textarea class="form-control" rows="5" id="commentaire" name="commentaire" placeholder="Votre message" class="form-control" required></textarea>
    </div>
    <input type="hidden" name="idContree" value="<?= $contree['Id_contree'] ?>">

<input type="hidden" name="titreContree" value="<?= $contree['titre'] ?>">

    <button type="submit" class="btn btn-primary my-3">Soumettre</button>
</form>

        <?php if (isset($message)) { ?>
            <div class="alert alert-primary" role="alert"><?= $message ?></div>
        <?php } ?>


    </div>
</main>

<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>