<?php
// Inclure le fichier du modèle "Contree"
use Broceliande\Models\Contree;
// Initialisation des variables de message
$message = "";
$erreur = "";

// Vérifier si le formulaire a été soumis et si l'ID de la contrée est défini
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idContree"])) {
    // Récupérer l'ID de la contrée à supprimer
    $idContree = $_POST["idContree"];

    // Créer une instance du modèle "Contree"
    $contreeModel = new Contree();

    // Supprimer la contrée en utilisant la méthode appropriée du modèle
    $contreeModel->delete($idContree);

    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "Les commentaires ont été modérés avec succès.";

    } else {
            // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['erreur'] = "Les commentaires n'ont pas été modérés.";

    }
// Inclusion de la vue pour la gestion des contrées
include_once('App/Views/viewGestionContree.php');
?>