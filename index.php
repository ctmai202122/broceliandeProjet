<?php
session_start();
// Inclusion de l'autoloader de Composer
require_once(__DIR__ . '/App/routage.php');
require __DIR__ . '/vendor/autoload.php';

// Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Vérifier si une action est demandée via $_GET
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    // si aucune action n'est demandée, on redirige vers la page d'accueil
    $action = "defaut";
}
// inclure le fichier correspondant à l'action demandée
$fichier = redirectsTo($action);

include(__DIR__ . '/App/Controllers/' . $fichier);
?> 