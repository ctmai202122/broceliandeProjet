<?php
namespace Broceliande\Controllers;

// Vérification de la session admin
if (isset($_SESSION['admin'])) {
    // Inclusion de la vue pour la gestion des contrées
    include_once('App/Views/viewGestionContree.php');
} else {
    // Redirection vers la page de connexion
    header('Location: viewConnexion.php');
    exit;
}
?>