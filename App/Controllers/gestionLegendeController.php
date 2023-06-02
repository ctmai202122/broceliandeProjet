<?php

namespace Broceliande\Controllers;

use Broceliande\Models\Legende;
use Broceliande\Models\Contree;

// Vérification de la session admin
if (isset($_SESSION['admin'])) {
    // Récupérer les données des légendes à partir du modèle
    $legendes = Legende::getAll();

    // Récupérer les données des contrées à partir du modèle
    $contrees = Contree::getAll();

    // Inclusion de la vue pour la gestion des legendes
    include_once(__DIR__ . '/../Views/viewGestionLegende.php');
    unset($_SESSION['message']);
    unset($_SESSION['erreur']);
} else {
    // Redirection vers la page de connexion
    $erreur = "Vous devez être connecté pour accéder à la page d'administration.";
    include_once(__DIR__ . '/../Views/viewConnexion.php');
}
?>