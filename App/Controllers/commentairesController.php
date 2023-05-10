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

include_once(__DIR__ . '/../Views/viewCommentaires.php');
?>