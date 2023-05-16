<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');

?>
<div class="containerGestion">
    <section class="container  bg-contact">
        <a href="?action=administration" class="btn btn-primary">Retour à la page Admin</a>

        <h2 class="mt-5 mb-3">Ajouter une contrée</h2>
        <hr>
        <?php if (!empty($message)) : ?>
            <div class="alert <?php echo ($message === "La contrée a été ajoutée avec succès.") ? "alert-success" : "alert-danger"; ?>"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="post" action="?action=addContree" enctype="multipart/form-data">
            <div class="form-group mt-4">
                <label for="titre">Titre de la contrée : <span class="required">*</span></label>
                <input type="text" id="titre" name="titre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu : <span class="required">*</span></label>
                <input type="text" id="contenu" name="contenu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo : </label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label for="latitude">Latitude : </label>
                <input type="float" id="latitude" name="latitude" class="form-control">
            </div>
            <div class="form-group">
                <label for="longitude">Longitude : </label>
                <input type="float" id="longitude" name="longitude" class="form-control">
            </div>
            <div class="form-group">
                <label for="commune">Commune : <span class="required">*</span></label>
                <input type="text" id="commune" name="commune" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="accessibilite">Accessibilité : <span class="required">*</span></label>
                <input type="text" id="accessibilite" name="accessibilite" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ouverture">Ouverture : <span class="required">*</span></label>
                <input type="text" id="ouverture" name="ouverture" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-adm-mov">Ajouter la Contrée</button>
        </form>
    </section>
    <section id="deleteContree" class="container bg-contact text-right mt-4">
    <h2>Supprimer une contrée</h2>
    <hr>
    <form id="deleteForm" action="?action=deleteContree" method="post">
        <div class="form-group mt-4">
            <label for="idContree">Titre de la contrée<span class="required">*</span></label>
            <select id="idContree" name="idContree" class="form-control" required>
                <option value="">Sélectionner une contrée</option>
                <?php

                use Broceliande\Models\Contree;
                // Créer une instance du modèle "Contree"
                $contreeModel = new Contree();

                // Récupérer les données des contrées à partir du modèle
                $contrees = $contreeModel->getAll();

                // Vérifier si $contrees contient des données avant de l'utiliser
                if ($contrees) {
                    foreach ($contrees as $contree) {
                        $id = $contree['Id_contree']; // ID de la contrée
                        $titre = $contree['titre']; // Titre de la contrée
                        echo "<option value=\"$id\">$titre</option>";
                    }
                } else {
                    unset($contree); // Supprimer la variable $contree si elle existe
                }
                ?>
            </select>
        </div>
        <button id="deleteButton" type="button" class="btn btn-primary">Supprimer la contrée</button>
    </form>
</section>
        <!-- Le script jQuery qui permet de faire fonctionner le menu déroulant -->
        <script src="Public/js/deleteContree.js"></script>
</div>
<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>