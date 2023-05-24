<?php
// Inclure le fichier du modèle "Contree"
use Broceliande\Models\Contree;

// Définir une variable pour le message
$message = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Le formulaire a été soumis, traiter les données ici

    // Vérifier si les champs requis sont remplis
    if (isset($_POST["titre"]) && isset($_POST["contenu"]) && isset($_POST["latitude"]) && isset($_POST["longitude"]) && isset($_POST["commune"]) && isset($_POST["accessibilite"]) && isset($_POST["ouverture"])) {
        // Récupérer les valeurs des champs
        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $photo = isset($_POST["photo"]) ? $_POST["photo"] : null;
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $commune = $_POST["commune"];
        $accessibilite = $_POST["accessibilite"];
        $ouverture = $_POST["ouverture"];

        // Enregistrer les données dans la base de données en utilisant la méthode appropriée du modèle
        Contree::create($titre, $contenu, $photo, $latitude, $longitude, $commune, $accessibilite, $ouverture);

        // Afficher un message de succès
        $message = "La contrée a été ajoutée avec succès.";
    } else {
        // Afficher un message d'erreur si les champs requis ne sont pas remplis
        $erreur = "Veuillez remplir tous les champs obligatoires.";
    }
}
// Inclusion de la vue pour la gestion des contrées
include_once('App/Views/viewGestionContree.php');
?>