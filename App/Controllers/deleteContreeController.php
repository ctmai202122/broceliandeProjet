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

    try {
        $contree = Contree::getById($idContree);
        if ($contree['photo'] != NULL)
            unlink(__DIR__ . "/../../Data/images/" . $contree['photo']);

        // Supprimer la contrée en utilisant la méthode appropriée du modèle
        Contree::delete($idContree);
        $contrees = Contree::getAll();
    } catch (Exception $e) {
        $message = $e->getMessage();
        exit;
    }
    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "La contrée a été supprimée avec succès.";
} else {
    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['erreur'] = "La contrée n'a pas été supprimée.";
}
// Inclusion de la vue pour la gestion des contrées
include_once('App/Views/viewGestionContree.php');
unset($_SESSION['message']);
unset($_SESSION['erreur']);
?>
