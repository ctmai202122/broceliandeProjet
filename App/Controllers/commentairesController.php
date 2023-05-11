<?php

namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

// Vérification si la session est active
if (session_status() === PHP_SESSION_NONE) {
    // Démarrage de la session
    session_start();
}

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $pseudo = $_POST['pseudo'];
    $texte = $_POST['commentaire'];
    $idContree = $_POST['idContree'];

    // Création du commentaire dans la base de données
    $commentaire = new Commentaire();
    // Appel de la méthode "create" du modèle Commentaire avec 
    // les données du formulaire et la date courante.
    $commentaire->create($pseudo, $texte, $idContree);

    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "Votre commentaire a bien été envoyé, il va être modéré par l'administrateur !";

    // Redirection vers la page de détails de la contrée
    header('Location: ?action=detailsContree&id=' . $idContree);
    exit;
}

// Action de validation des commentaires
if ($_GET['action'] === 'validerCommentaires') {
    // Récupérer les données envoyées par la requête AJAX
    $commentairesIds = json_decode($_POST['commentairesIds'], true);

    // Opérations de validation des commentaires ici
    $commentaire = new Commentaire();
    $commentaire->validate($commentairesIds);

    // Envoyer une réponse JSON indiquant que la validation a réussi
    $response = array(
        'success' => true,
        'message' => 'Les commentaires ont été validés avec succès.'
    );
    echo json_encode($response);
    exit;
}

// Action de suppression des commentaires
if ($_GET['action'] === 'supprimerCommentaires') {
    // Récupérer les données envoyées par la requête AJAX
    $commentairesIds = json_decode($_POST['commentairesIds'], true);

    // Opérations de suppression des commentaires ici
    $commentaire = new Commentaire();
    $commentaire->delete($commentairesIds);

    // Envoyer une réponse JSON indiquant que la suppression a réussi
    $response = array(
        'success' => true,
        'message' => 'Les commentaires ont été supprimés avec succès.'
    );
    echo json_encode($response);
    exit;
}

include_once(__DIR__ . '/../Views/viewCommentaires.php');

?>