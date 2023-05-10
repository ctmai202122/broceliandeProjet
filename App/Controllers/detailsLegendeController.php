<?php

use Broceliande\Models\Legende;
use Broceliande\Models\Contree;

// Récupérer l'identifiant de la contree depuis l'URL
$id = $_GET['id'];

// Récupérer toutes les informations de la contree correspondante depuis la base de données
$legende = Legende::getById($id);
// Récupérer le titre de la contree correspondante depuis la base de données
$contree = Contree::getById($legende['Id_contree']);

// Inclusion de la vue pour les détails de la contree
include_once('App/Views/viewDetailsLegende.php');
include_once('App/Views/viewGestionLegende.php');
?>