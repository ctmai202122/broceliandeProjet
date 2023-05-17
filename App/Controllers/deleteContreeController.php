<?php
// Inclure le fichier du modèle "Contree"
use Broceliande\Models\Contree;

// Vérifier si le formulaire a été soumis et si l'ID de la contrée est défini
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idContree"])) {
    // Récupérer l'ID de la contrée à supprimer
    $idContree = $_POST["idContree"];

    // Créer une instance du modèle "Contree"
    $contreeModel = new Contree();

    // Supprimer la contrée en utilisant la méthode appropriée du modèle
    $contreeModel->delete($idContree);

    // Message de succès
    $message = "La contrée a été supprimée avec succès.";

    // Redirection vers la page de gestion des contrées
    echo '<script>alert("'.$message.'"); location.href = "?action=gestionContree";</script>';
    exit();
} else {
    // Message d'erreur
    $erreur = "Une erreur s'est produite lors de la suppression de la contrée.";

    // Redirection vers la page de gestion des contrées
    echo '<script>alert("'.$erreur.'"); location.href = "?action=gestionContree";</script>';
    exit();
}
?>
