<?php
// namespace Broceliande\Controllers;
use Broceliande\Models\Contree;
// Vérification si un message de confirmation est présent dans la session
if (isset($_SESSION['message'])) {
  // Stockage du message dans une variable et suppression de la session
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}
            // Récupérer l'identifiant de la contree depuis l'URL
            $id = $_GET['id'];

            // Récupérer toutes les informations de la contree correspondante depuis la base de données
           $contree = Contree::getById($id);

      // Inclusion de la vue pour les détails de la contree
    include_once('App/Views/viewDetailsContree.php');
?>