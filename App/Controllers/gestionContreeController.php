<?php
namespace Broceliande\Controllers;

use Broceliande\Models\Contree;

// Vérification de la session admin
if (isset($_SESSION['admin'])) {

    // Récupérer les données des contrées à partir du modèle
    $contrees = Contree::getAll();

    // Inclusion de la vue pour la gestion des contrées
    include_once('App/Views/viewGestionContree.php');
} else {
    // Redirection vers la page de connexion
    header('Location: viewConnexion.php');
    exit;
}
?>