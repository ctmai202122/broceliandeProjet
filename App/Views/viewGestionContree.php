<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
//Inclure la vue de la nav admin
include_once(__DIR__ . '/viewMenuAdmin.php');

?>
<div class="containerGestion">
    <section class="container  bg-contact">
        <h2 class="mt-5 mb-3">Ajouter une contrée</h2>
        <hr>
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['erreur'])) : ?>
            <div class="alert alert-danger"><?php echo $_SESSION['erreur']; ?></div>
        <?php endif; ?>
        <form method="post" action="?action=addContree" enctype="multipart/form-data">
            <div class="form-group mt-4">
                <label for="titre">Titre : <span class="required">*</span></label>
                <input type="text" id="titre" name="titre" placeholder="Titre de la contrée..." class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu : <span class="required">*</span></label>
                <textarea class="col-12" id="contenu" name="contenu" placeholder="Description de la contrée..." rows="9" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo : </label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label for="latitude">Latitude : </label>
                <input type="float" id="latitude" name="latitude" placeholder="Exemple du format attendu: 48.0013" class="form-control">
            </div>
            <div class="form-group">
                <label for="longitude">Longitude : </label>
                <input type="float" id="longitude" name="longitude" placeholder="Exemple du format attendu : -2.28627" class="form-control">
            </div>
            <div class="form-group">
                <label for="commune">Commune : <span class="required">*</span></label>
                <input type="text" id="commune" name="commune" placeholder="Nom de la commune..." class="form-control" required>
            </div>
            <div class="form-group">
                <label for="accessibilite">Accessibilité : <span class="required">*</span></label>
                <textarea class="col-12" id="accessibilite" name="accessibilite" placeholder="Adapté aux personnes à mobilité réduite..." rows="3" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="ouverture">Ouverture : <span class="required">*</span></label>
                <textarea class="col-12" id="ouverture" name="ouverture" placeholder="Libre d'accès ou infos sur la fermeture..." rows="3" class="form-control" required></textarea>
            </div>
            <button id="addButton" type="submit" class="btn">Ajouter la contrée</button>
        </form>
    </section>
    <section id="deleteContree" class="container bg-contact text-right mt-4">
        <h2>Supprimer une contrée</h2>
        <hr>
        <form id="deleteForm" action="?action=deleteContree" method="post">
            <div class="form-group mt-4">
                <label for="idContree">Titre de la contrée<span class="required">*</span></label>
                <select id="idContree" name="idContree" class="form-control" required>
                    <option value="">--- Sélectionner une contrée ---</option>
                    <?php

                    // Vérifier si $contrees contient des données avant de l'utiliser
                    if ($contrees) {
                        foreach ($contrees as $contree) {
                            $id = $contree['Id_contree']; // ID de la contrée
                            $titre = $contree['titre']; // Titre de la contrée
                            echo "<option value=\"$id\">$titre</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button id="deleteButton" type="submit" class="btn">Supprimer la contrée</button>
        </form>
    </section>
    <!-- Le script qui permet de confirmer la suppression de la contrée  -->
    <script src="Public/js/deleteContree.js"></script>
</div>
<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>