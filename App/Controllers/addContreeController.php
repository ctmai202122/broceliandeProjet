<?php
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
        $photo = isset($_FILES["photo"]) ? $_FILES["photo"] : null;
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $commune = $_POST["commune"];
        $accessibilite = $_POST["accessibilite"];
        $ouverture = $_POST["ouverture"];

        $name = NULL; // en cas d'erreur 
        if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) { 
        $tmp_name = $_FILES["photo"]["tmp_name"]; 
        // basename() peut empêcher les attaques de traversée du system de fichier; 
        $name = basename($_FILES["photo"]["name"]); 
        //die(__DIR__ . "/../../Data/images/".$name); 
        move_uploaded_file($tmp_name, __DIR__ . "/../../Data/images/".$name); 
        } 

        // Enregistrer les données dans la base de données en utilisant la méthode appropriée du modèle
        Contree::create($titre, $contenu, $name, $latitude, $longitude, $commune, $accessibilite, $ouverture);

    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "La contrée a été ajoutée avec succès.";
    } else {
    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['erreur'] = "La contrée n'a pas été ajoutée.";
    }
}

// Récupérer les données des contrées à afficher dans le menu déroulant
$contreeModel = new Contree();
$contrees = $contreeModel->getAll();

// Inclusion de la vue pour la gestion des contrées
include_once('App/Views/viewGestionContree.php');
?>