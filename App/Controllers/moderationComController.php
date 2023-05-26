<?php

namespace Broceliande\Controllers;
use Broceliande\Models\Commentaire;

// Inclusion du fichier CommentairesController
require_once 'CommentairesController.php';

// Récupération des commentaires avec leurs titres de contrée
$commentaires = Commentaire::getAllExtended();

include_once(__DIR__ . '/../Views/viewCommentaires.php');

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
?>
