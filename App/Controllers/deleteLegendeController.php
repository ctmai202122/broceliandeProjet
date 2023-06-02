<?php
// Inclure le fichier du modèle "Legende"
use Broceliande\Models\Legende;
// Initialisation des variables de message
$message = "";
$erreur = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idLegende"])) {
    // Récupérer l'ID de la légende à supprimer
    $idLegende = $_POST["idLegende"];

    try {
        $legende = Legende::getById($idLegende);
        if($contree ['photo'] != NULL)
            unlink(__DIR__ . "/../../Data/images/" . $legende['photo']);

        // Supprimer la légende en utilisant la méthode appropriée du modèle
        Legende::delete($idLegende);
        $legendes = Legende::getAll();
    } catch (Exception $e) {
        $message = $e->getMessage();
        exit;
    }
    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "La légende a été supprimée avec succès.";
} else {
    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['erreur'] = "La légende n'a pas été supprimée.";
}
// Redirection vers la page de gestion des légendes
header('Location: ?action=gestionLegende');
?>