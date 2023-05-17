<?php
// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');
    //Inclure la vue de la nav admin
    include_once(__DIR__ . '/viewMenuAdmin.php');
// Vérification de la présence du message dans l'URL
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}
?>
<div class="container">
    <section class="containerGestion  bg-contact">
        <h2 class="mt-5 mb-3">Ajouter une légende</h2>
        <hr>
        <?php if (!empty($message)) : ?>
            <div class="alert <?php echo isset($errorMessage) ? "alert-danger" : "alert-success"; ?>"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="post" action="?action=addLegende" enctype="multipart/form-data">
            <div class="form-group mt-4">
                <label for="titre">Titre :<span class="required">*</span></label>
                <input type="text" id="titre" name="titre" placeholder="Titre de la Légende..." class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu :<span class="required">*</span></label>
                <input type="text" id="contenu" name="contenu" placeholder="Description de la légende..." class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo :</label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            </div>

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
                }
                ?>
            </select>
        </div>

            <button type="submit" name="submit" class="btn btn-primary btn-adm-mov">Ajouter la légende</button>
        </form>
    </section>
    <section id="deleteLegende" class="containerGestion bg-contact text-right mt-4">
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
                    } 
                    ?>
                </select>
            </div>
            <button id="deleteButton" type="button" class="btn btn-primary">Supprimer la légende</button>
        </form>
    </section>
    <!-- Le script qui permet de confirmer la suppression légende -->
    <script src="Public/js/deleteLegende.js"></script>
</div>
<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>