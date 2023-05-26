<?php

namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $pseudo = $_POST['pseudo'];
    $texte = $_POST['texte'];
    $idContree = $_POST['Id_contree'];

    // Création du commentaire dans la base de données
    Commentaire::create($pseudo, $texte, $idContree);

    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "Votre commentaire a bien été envoyé, il va être modéré par l'administrateur !";

    // Redirection vers la page de détails de la contrée avec l'identifiant de la contrée
    header('Location: ?action=detailsContree&id=' . $idContree);
    exit;
}

// Utilisez l'identifiant de la contrée pour récupérer les commentaires correspondants depuis la base de données
$commentaires = Commentaire::getByIdContree($id_contree);

// Inclure la vue pour afficher les commentaires
include('App/Views/viewCommentaires.php');


// Récupération des commentaires avec leur titre de la contrée
$commentaires = Commentaire::getAllExtended();

// Affichage des commentaires avec la vue en passant la variable $commentaires
include_once('App/Views/viewCommentaires.php');
