<?php
// Inclure le fichier du modèle "Legende"
use Broceliande\Models\Legende;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idLegende"])) {
    // Récupérer l'ID de la légende à supprimer
    $idLegende = $_POST["idLegende"];
    
    // Créer une instance du modèle "Legende"
    $legendeModel = new Legende();

    // Supprimer la légende en utilisant la méthode appropriée du modèle
    $legendeModel->delete($idLegende);

    // Message de succès
    $message = "La légende a été supprimée avec succès.";

       // Redirection vers la page de gestion des contrées
       echo '<script>alert("'.$message.'"); location.href = "?action=gestionLegende";</script>';
       exit();
} else {
    // Message d'erreur
    $erreur = "Une erreur s'est produite lors de la suppression de la légende.";
    
    // Redirection vers la page de gestion des contrées
    echo '<script>alert("'.$erreur.'"); location.href = "?action=gestionLegende";</script>';
    exit();
}
?>