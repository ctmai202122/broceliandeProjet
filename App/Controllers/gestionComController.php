<?php
namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

if (isset($_SESSION['admin'])) {
    // Récupération des commentaires non modérés (statut=0) avec leurs titres de contrée
    $commentaires = Commentaire::getAllExtended(0);
    include_once(__DIR__ . '/../Views/viewGestionCommentaires.php');
} else {
    // Redirection vers la page de connexion
    $erreur = "Vous devez être connecté pour accéder à la page d'administration.";
    include_once(__DIR__ . '/../Views/viewConnexion.php');
}
?>