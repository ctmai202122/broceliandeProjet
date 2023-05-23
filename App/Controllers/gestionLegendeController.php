<?php
namespace Broceliande\Controllers;

use Broceliande\Models\Legende;

// Vérification de la session admin
if (isset($_SESSION['admin'])) {

    // Récupérer les données des légendes à partir du modèle
    $legendes = Legende::getAll();

    // Inclusion de la vue pour la gestion des legendes
    include_once('App/Views/viewGestionLegende.php');
} else {
    // Redirection vers la page de connexion
    header('Location: viewConnexion.php');
    exit;
}
?>