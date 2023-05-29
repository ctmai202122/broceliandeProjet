<?php
use Broceliande\Models\Contree;
use Broceliande\Models\Commentaire;

// Vérification si un message de confirmation est présent dans la session
if (isset($_SESSION['message'])) {
    // Stockage du message dans une variable et suppression de la session
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

// Vérification si l'identifiant de la contrée est présent dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'identifiant de la contrée depuis l'URL
    $id = $_GET['id'];

    // Récupérer toutes les informations de la contrée correspondante depuis la base de données
    $contree = Contree::getById($id);
    // Récupérer toutes les commentaires validés (statut=1) relatifs à la contrée affichée
    $commentaires = Commentaire::getByIdContreeAndStatut($contree['Id_contree'], 1);

    // Inclusion de la vue pour les détails de la contrée
    include_once('App/Views/viewDetailsContree.php');
} else {
    // Gérer le cas où l'identifiant n'est pas présent dans l'URL
    die("L'identifiant de la contrée n'est pas spécifié.");
}
?>
