<?php
// namespace Broceliande\Controllers;
use Broceliande\Models\Contree;

            // Récupérer l'identifiant de la contree depuis l'URL
            $id = $_GET['id'];

            // Récupérer toutes les informations de la contree correspondante depuis la base de données
           $contree = Contree::getById($id);

      // Inclusion de la vue pour les détails de la contree
    include_once('App/Views/viewDetailsContree.php');
?>