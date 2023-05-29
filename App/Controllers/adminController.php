<?php

namespace Broceliande\Controllers;
use Broceliande\Models\Commentaire;

if(isset ($_SESSION['admin']) ){
    // préparation des données pour la vue d'admin par défaut (modération des commentaires)
    // Récupération des commentaires non modérés (statut=0) avec leurs titres de contrée
    $commentaires = Commentaire::getAllExtended(0); 
    require_once('App/Views/viewGestionCommentaires.php');
} else {
    require_once('App/Views/viewConnexion.php');
}

?>