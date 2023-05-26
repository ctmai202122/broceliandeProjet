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
    header('Location: ?action=commentaire');
    exit;
    

}

// Vérification si l'identifiant de la contrée est présent dans l'URL
if (isset($_GET['id'])) {
    $id_contree = $_GET['id']; // Récupération de l'identifiant de la contrée depuis l'URL

    // Utilisez l'identifiant de la contrée pour récupérer les commentaires correspondants depuis la base de données
    $commentaires = Commentaire::getByIdContree($id_contree);

    // Récupérer le titre de la contrée
    $titre_contree = Commentaire:: getAllExtended();

    // Inclure la vue pour afficher les commentaires et le formulaire de modération
    include('App/Views/viewCommentaires.php');
} else {
    // L'identifiant de la contrée n'est pas présent dans l'URL
    $erreur = "L'identifiant de la contrée est manquant.";
}
?>