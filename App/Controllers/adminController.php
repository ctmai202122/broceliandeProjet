<?php

namespace Broceliande\Controllers;

// use Broceliande\Models\Admin;



if(isset ($_SESSION['admin']) ){

    require_once('App/Views/viewAdmin.php');
} else {
    require_once('App/Views/viewConnexion.php');
}

// gestion ajout suppression et moderation


?>