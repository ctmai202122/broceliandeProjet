<?php

namespace Broceliande\Controllers;

if(isset ($_SESSION['admin']) ){

    require_once('App/Views/viewAdmin.php');
} else {
    require_once('App/Views/viewConnexion.php');
}

?>