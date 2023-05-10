<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
?>
<div class="container">
    <section class="container  bg-contact">
        <a href="?action=administration" class="btn btn-primary">Retour à la page Admin</a>

        <h2 class="mt-5 mb-3">Ajouter une contrée</h2>
        <hr>
        <form method="post" action="viewAdmin.php?action=gestionContree">
            <div class="form-group mt-4">
                <label for="titre">Titre de la contrée:<span class="required">*</span></label>
                <input type="text" id="titre" name="titre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu:<span class="required">*</span></label>
                <input type="text" id="contenu" name="contenu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo:<span class="required">*</span></label>
                <input type="file" id="photo" name="photo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="latitude">Latitude :<span class="required">*</span></label>
                <input type="float" id="latitude" name="latitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude: <span class="required">*</span></label>
                <input type="float" id="longitude" name="longitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="commune">Commune: <span class="required">*</span></label>
                <input type="text" id="commune " name="contenu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="accessibilite">Accessibilité: <span class="required">*</span></label>
                <input type="text" id="accessibilite" name="accessibilite" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ouverture">Ouverture: <span class="required">*</span></label>
                <input type="text" id="ouverture" name="ouverture" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-adm-mov">Ajouter la Contrée</button>
        </form>
    </section>
    <section id="deleteContree" class="container bg-contact text-right mt-4">
        <h2>Supprimer une contrée</h2>
        <hr>
        <form action="viewAdmin.php?action=gestionContree" method="post">
            <div class="form-group mt-4">
                <label for="idContree">Id de la contrée<span class="required">*</span></label>
                <input type="text" id="idContree" name="idContree" class="form-control" required>
            </div>
            <button type="submit" name="deleteContree" class="btn btn-primary btn-adm-mov">Supprimer la contrée</button>
        </form>
    </section>
</div>

<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>