<?php
namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

if (isset($_SESSION['admin'])) {
    // Récupération des commentaires non modérés (statut=0) avec leurs titres de contrée
    $commentaires = Commentaire::getAllExtended(0);

    include_once(__DIR__ . '/../Views/viewGestionCommentaires.php');
} else {
    // Redirection vers la page de connexion
    // !!! TO DO - prévoir un message du genre "Vous devez être connecté pour accéder au panneau d'administration" 
    include_once(__DIR__ . '/../Views/viewConnexion.php');
}

/* ---
// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $commentairesIds = $_POST['commentairesIds'];
    $action = $_POST['action'];

    // Opérations en fonction de l'action
    if ($action === 'valider') {
        // Opérations de validation des commentaires ici
        Commentaire::validate($commentairesIds);
    } elseif ($action === 'supprimer') {
        // Opérations de suppression des commentaires ici
        Commentaire::delete($commentairesIds);
    }

    // Redirection vers une autre page ou affichage d'un message de succès
    header('Location: ?action=success');
    exit;
}
--- */
?>