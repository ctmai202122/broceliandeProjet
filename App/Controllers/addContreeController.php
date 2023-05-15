<?php
// Inclure le fichier du modèle "Contree"
use Broceliande\Models\Contree;

// Définir une variable pour le message
$message = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Le formulaire a été soumis, traiter les données ici

    // Vérifier si les champs requis sont remplis
    if (isset($_POST["titre"]) && isset($_POST["contenu"]) && isset($_POST["commune"]) && isset($_POST["accessibilite"]) && isset($_POST["ouverture"])) {
        // Récupérer les valeurs des champs
        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $photo = $_POST["photo"]["tmp_name"]; // Récupérer le chemin du fichier temporaire ou null
        $latitude = $_POST["latitude"]; // Récupérer en tant que chaîne de caractères
        $longitude = $_POST["longitude"];
        $commune = $_POST["commune"];
        $accessibilite = $_POST["accessibilite"];
        $ouverture = $_POST["ouverture"];

        // Créer une instance du modèle "Contree"
        $contreeModel = new Contree();

        // Vérifier si $photo est null et le traiter en conséquence
        if ($photo === null) {
            $photo = ""; // Convertir en chaîne vide ou attribuer une valeur par défaut
        }
// Vérifier si $latitude est une chaîne vide et le convertir en null
if ($latitude === "") {
    $latitude = null;
}

// Vérifier si $longitude est une chaîne vide et le convertir en null
if ($longitude === "") {
    $longitude = null;
}


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
