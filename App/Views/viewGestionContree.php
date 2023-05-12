<?php
// Afficher les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusion du fichier de vue pour l'en-tête
include_once(__DIR__ . '/viewHeader.php');

// Inclure le fichier du modèle "Contree"
use Broceliande\Models\Contree;

// Définir une variable pour le message
$message = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Le formulaire a été soumis, traiter les données ici

    // Vérifier si les champs requis sont remplis
    if (isset($_POST["titre"]) && isset($_POST["contenu"]) && isset($_FILES["photo"]) && isset($_POST["latitude"]) && isset($_POST["longitude"]) && isset($_POST["commune"]) && isset($_POST["accessibilite"]) && isset($_POST["ouverture"])) {
        // Récupérer les valeurs des champs
        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $photo = $_FILES["photo"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $commune = $_POST["commune"];
        $accessibilite = $_POST["accessibilite"];
        $ouverture = $_POST["ouverture"];

        // Créer une instance du modèle "Contree"
        $contreeModel = new Contree();

        // Enregistrer les données dans la base de données en utilisant la méthode appropriée du modèle
        $contreeModel->create($titre, $contenu, $photo, $latitude, $longitude, $commune, $accessibilite, $ouverture);

        // Afficher un message de succès
        $message = "La contrée a été ajoutée avec succès.";
    } else {
        // Afficher un message d'erreur si les champs requis ne sont pas remplis
        $message = "Veuillez remplir tous les champs obligatoires.";
    }
}
?>
<div class="containerGestion">
    <section class="container  bg-contact">
        <a href="?action=administration" class="btn btn-primary">Retour à la page Admin</a>

        <h2 class="mt-5 mb-3">Ajouter une contrée</h2>
        <hr>
        <?php if (!empty($message)) : ?>
            <div class="alert <?php echo ($message === "La contrée a été ajoutée avec succès.") ? "alert-success" : "alert-danger"; ?>"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="post" action="?action=gestionContree">
            <div class="form-group mt-4">
                <label for="titre">Titre de la contrée : <span class="required">*</span></label>
                <input type="text" id="titre" name="titre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu : <span class="required">*</span></label>
                <input type="text" id="contenu" name="contenu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo : <span class="required">*</span></label>
                <input type="file" id="photo" name="photo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="latitude">Latitude : <span class="required">*</span></label>
                <input type="float" id="latitude" name="latitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude : <span class="required">*</span></label>
                <input type="float" id="longitude" name="longitude" class="form-control" required>
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
        <form action="?action=gestionContree" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette contrée ?');">
            <div class="form-group mt-4">
                <label for="idContree">Titre de la contrée<span class="required">*</span></label>
                <select id="idContree" name="idContree" class="form-control" required>
                    <option value="">Sélectionner une contrée</option>
                    <?php
                    // Créer une instance du modèle "Contree"
                    $contreeModel = new Contree();

                    // Récupérer les données des contrées à partir du modèle
                    $contrees = $contreeModel->getAll();

                    // Vérifier si $contrees contient des données avant de l'utiliser
                    if ($contree) {
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
            <button type="submit" name="deleteContree" class="btn btn-primary ">Supprimer la contrée</button>
        </form>
    </section>
</div>
<?php
// Inclusion du fichier de vue pour le pied de page
include_once(__DIR__ . '/viewFooter.php');
?>