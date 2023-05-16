<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
// Vérification de la présence du message dans l'URL
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}
?>
<div class="container">
    <section class="containerGestion  bg-contact">
        <a href="?action=administration" class="btn btn-primary">Retour à la page Admin</a>
        <h2 class="mt-5 mb-3">Ajouter une légende</h2>
        <hr>
        <?php if (!empty($message)) : ?>
            <div class="alert <?php echo isset($errorMessage) ? "alert-danger" : "alert-success"; ?>"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="post" action="?action=addLegende" enctype="multipart/form-data">
            <div class="form-group mt-4">
                <label for="titre">Titre de la légende :<span class="required">*</span></label>
                <input type="text" id="titre" name="titre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu :<span class="required">*</span></label>
                <input type="text" id="contenu" name="contenu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo :</label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label for="Id_contree">Contrée qui correspond à cette légende : </label>
                <select id="Id_contree" name="Id_contree" class="form-control">
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
        <form id="deleteForm" action="?action=deleteLegende" method="post">
            <div class="form-group mt-4">
                <label for="idLegende">Titre de la légende<span class="required">*</span></label>
                <select id="idLegende" name="id" class="form-control" required>
                    <option value="">Sélectionner une légende</option>
                    <?php

                    use Broceliande\Models\Legende;
                    // Créer une instance du modèle "Legende"
                    $legendeModel = new Legende();

                    // Récupérer les données des légendes à partir du modèle
                    $legendes = $legendeModel->getAll();

                    // Vérifier si $legendes contient des données avant de l'utiliser
                    if ($legendes) {
                        foreach ($legendes as $legende) {
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
            <button id="deleteButton" type="button" class="btn btn-primary">Supprimer la légende</button>
        </form>
    </section>
    <!-- Le script jQuery qui permet de faire fonctionner le menu déroulant -->
    <script src="Public/js/deleteLegende.js"></script>
</div>
<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>