<?php
// if($_SERVER)

function redirectsTo($action = "defaut")
{
    $lesActions = array();
    $lesActions["defaut"] = "accueilController.php";
    $lesActions["accueil"] = "accueilController.php";
    $lesActions["administration"] = "adminController.php";
    $lesActions["connexion"] = "connexionController.php";
    $lesActions["deconnexion"] = "deconnexionController.php";
    $lesActions["gestionContree"] = "gestionContreeController.php";
    $lesActions["gestionLegende"] = "gestionLegendeController.php";
    $lesActions["listeContrees"] = "listeContreesController.php";
    $lesActions["listeLegendes"] = "listeLegendesController.php";
    $lesActions["detailsContree"] = "detailsContreeController.php";
    $lesActions["detailsLegende"] = "detailsLegendeController.php";
    $lesActions["commentaire"] = "commentairesController.php";
    $lesActions["contact"] = "contactController.php";
    $lesActions["mentionsLegales"] = "mentionsLegalesController.php";
  

    // Récupérer le contrôleur correspondant à l'action
    $controller_id = isset($lesActions[$action]) ? $lesActions[$action] : $lesActions["defaut"];


    //si le fichier n'existe pas :
    if (!file_exists(__DIR__ . '/Controllers/' . $controller_id)) {
        die("Le fichier : " . $controller_id . " n'existe pas !");
    }

    // Retourne le contrôleur correspondant à l'action demandée
    return $controller_id;
} 
?>
