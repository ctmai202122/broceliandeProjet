<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');

?>
<div class="container">
    <section class="container  bg-contact">
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
    <section id="deleteLegende" class="container bg-contact text-right mt-4">
        <h2>Supprimer une légende</h2>
        <hr>
        <form action="viewAdmin.php?action=deleteLegende" method="post">
            <div class="form-group mt-4">
                <label for="idLegende">Id de la légende<span class="required">*</span></label>
                <input type="text" id="idLegende" name="idLegende" class="form-control" required>
            </div>
            <button type="submit" name="deleteLegende" class="btn btn-primary btn-adm-mov">Supprimer la légende</button>
        </form>
    </section>
</div>

<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>