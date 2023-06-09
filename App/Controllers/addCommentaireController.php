<?php
namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $pseudo = $_POST['pseudo'];
    $texte = $_POST['texte'];
    $dateCom = date("Y/m/d H:i:s");
    $idContree = $_POST['idContree'];

    Commentaire::create($pseudo, $texte, $dateCom, 0, $idContree);

    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "Votre commentaire a bien été envoyé, il va être modéré par l'administrateur !";

    // Redirection vers la page de détails de la contrée avec l'identifiant de la contrée
    header('Location: ?action=detailsContree&id=' . $idContree);
    exit;
}
?>