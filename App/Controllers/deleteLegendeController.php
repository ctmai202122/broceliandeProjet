<?php
// Inclure le fichier du modèle "Legende"
use Broceliande\Models\Legende;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idLegende"])) {
    // Récupérer l'ID de la légende à supprimer
    $idLegende = $_POST["idLegende"];
            // Créer une instance du modèle "Legende"
            $legendeModel = new Legende();

            // Récupérer les données des légendes à partir du modèle
            $legendes = $legendeModel->getAll();

    // Supprimer la légende en utilisant la méthode appropriée du modèle
    $legendeModel->delete($id);

    // Message de succès
    $message = "La légende a été supprimée avec succès.";
} else {
    // Message d'erreur
    $message = "Une erreur s'est produite lors de la suppression de la légende.";
}

// Inclusion du fichier de vue pour afficher le message
include_once(__DIR__ . '/viewGestionLegende.php');
?>
