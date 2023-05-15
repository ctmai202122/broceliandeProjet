<?php
// Inclure le fichier du modèle "Legende"
use Broceliande\Models\Legende;

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
        $photo = $_POST[""];


        // Créer une instance du modèle "Legende"
        $legendeModel = new Legende();

        // Enregistrer les données dans la base de données en utilisant la méthode appropriée du modèle
        $legendeModel->create($titre, $contenu, $photo);

        // Afficher un message de succès
        $message = "La légende a été ajoutée avec succès.";
    } else {
        // Afficher un message d'erreur si les champs requis ne sont pas remplis
        $message = "Veuillez remplir tous les champs obligatoires.";
    }
}
?>