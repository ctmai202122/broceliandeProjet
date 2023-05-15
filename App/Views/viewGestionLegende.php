<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');

?>
<div class="container">
    <section class="containerGestion  bg-contact">
        <a href="?action=administration" class="btn btn-primary">Retour à la page Admin</a>
        <h2 class="mt-5 mb-3">Ajouter une légende</h2>
        <hr>
        <form method="post" action="viewAdmin.php?action=addContree">
            <div class="form-group mt-4">
                <label for="titre">Titre de la légende:<span class="required">*</span></label>
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
                <label for="Id_contree">Contrée qui correspond à cette légende :<span class="required">*</span></label>
                <select id="Id_contree" name="Id_contree" class="form-control" required>
                    <?php foreach ($contrees as $contree) : ?>
                        <?php if (isset($contree['id'])) : ?>
                            <option value="<?= $contree['id'] ?>"><?= $contree['titre'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-adm-mov">Ajouter la légende</button>
        </form>
    </section>
    <form action="?action=deleteLegende" method="post">
    <div class="form-group mt-4">
        <label for="idLegende">Titre de la légende<span class="required">*</span></label>
        <select id="idLegende" name="id" class="form-control" required>
            <option value="">Sélectionner une légende</option>
            <?php


            // Vérifier si $legendes contient des données avant de l'utiliser
            if ($legende) {
                foreach ($legende as $legende) {
                    $id = $legende['Id_legende']; // ID de la légende
                    $titre = $legende['titre']; // Titre de la légende
                    echo "<option value=\"$id\">$titre</option>";
                }
            } else {
                unset($legende); // Supprimer la variable $legende si elle existe
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Supprimer la légende</button>
</form>

</div>

<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>