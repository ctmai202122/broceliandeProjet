<?php
// Inclure le fichier du modèle "Legende"
use Broceliande\Models\Legende;
use Broceliande\Models\Contree;

// Définir une variable pour le message
$message = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Le formulaire a été soumis, traiter les données ici

    // Vérifier si les champs requis sont remplis
    if (isset($_POST["titre"]) && isset($_POST["contenu"])) {
        // Récupérer les valeurs des champs
        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $photo = isset($_POST["photo"]) ? $_POST["photo"] : null;

        // Créer une instance du modèle "Legende"
        $legendeModel = new Legende();

        // Enregistrer les données dans la base de données en utilisant la méthode appropriée du modèle
        $legendeModel->create($titre, $contenu, $photo);

        // Afficher un message de succès
        $message = "La légende a été ajoutée avec succès.";
    } else {
        // Afficher un message d'erreur si les champs requis ne sont pas remplis
        $erreur = "Veuillez remplir tous les champs obligatoires.";
    }
}

// Récupérer les données des contrées à afficher dans le menu déroulant
$contreeModel = new Contree();
$contrees = $contreeModel->getAll();

// Inclusion de la vue pour la gestion des contrées
include_once('App/Views/viewGestionLegende.php');
?>