<?php
namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de la modération des commentaires
    // Parcourir les données de modération soumises via le formulaire
    foreach ($_POST['moderation'] as $idCommentaire => $action) {
        // Mettre en œuvre la logique de modération en fonction de l'action choisie (valider ou supprimer)
        if ($action === 'valider') {
            // Commentaire validé
            Commentaire::validate($idCommentaire);
        } elseif ($action === 'supprimer') {
            // Commentaire supprimé
            Commentaire::delete($idCommentaire);
        }
    }
    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "Les commentaires ont été modérés avec succès.";

    // Redirection vers la page de moderation des commentaires
    header('Location: ?action=gestionCommentaire');
}
?>