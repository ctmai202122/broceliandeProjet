<?php

namespace Broceliande\Controllers;

    use Broceliande\Models\Contree;
    
$listeContrees = Contree::getAll();

 // Inclusion du fichier de vue pour la page d'accueil
include_once('App/Views/viewAccueil.php');
?>