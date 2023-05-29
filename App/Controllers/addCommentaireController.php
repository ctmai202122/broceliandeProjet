<?php
namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $pseudo = $_POST['pseudo'];
    // existe-t-il une <textarea ... name='texte'...> dans le formulaire soumis ? La réponse est NON
    // dans le formulaire tu as mis : <textarea ... name='commentaire'...>
    // $texte = $_POST['texte'];
    $texte = $_POST['commentaire'];
    // existe-t-il une <input ... name='dateCom'...> dans le formulaire soumis ? La réponse est NON
    // de plus, pourquoi mettre la variable $_POST['dateCom'] (qui n'existe pas) dans $texte ?????
    // la date de soumission est la date/heure du moment obtenue par la fonction php date("Y/m/d H:i:s").
    // tu pourrais aussi mettre cette valeur par défaut dans ta BdD, ce serait encore plus simple.
    // $texte = $_POST['dateCom'];
    $dateCom = date("Y/m/d H:i:s");
    // existe-t-il une <input ... name='ID_contree'...> dans le formulaire soumis ? La réponse est NON
    // le bon nom de variable est ... name='idContree'...
    // $idContree = $_POST['Id_contree'];
    $idContree = $_POST['idContree'];

    // Création du commentaire dans la base de données
    // que vaut $statut ????? La réponse est rien car cette variable n'est pas définie !!!!!
    // tu pourrais aussi mettre directement cette valeur par défaut (à 0) dans ta BdD, ce serait encore plus simple.
    // Commentaire::create($pseudo, $texte, $dateCom, $statut, $idContree);
    Commentaire::create($pseudo, $texte, $dateCom, 0, $idContree);

    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "Votre commentaire a bien été envoyé, il va être modéré par l'administrateur !";

    // Redirection vers la page de détails de la contrée avec l'identifiant de la contrée
    header('Location: ?action=detailsContree&id=' . $idContree);
    exit;
}
?>