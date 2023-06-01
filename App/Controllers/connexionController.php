<?php

namespace Broceliande\Controllers;

use Broceliande\Models\Admin;

if (isset($_SESSION['admin'])) {
    //header('Location: ?action=administration');
    require_once 'App/Controllers/gestionComController.php';
} else {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $mdp = $_POST['motdepasse'];

    // Vérification des informations de connexion admin
    $admin = Admin::getByEmail($email);

    if ($admin && password_verify($mdp, $admin['motdepasse']) ) {
        $_SESSION['admin'] = $email;
        require_once 'App/Controllers/gestionComController.php';
       
    } else {
        // Redirection 
       // header('Location: ?action=administration');
       $_SESSION['erreur'] = "Erreur d'identifiant ou de mot de passe";
       require_once('App/Views/viewConnexion.php');
        unset($_SESSION['erreur']);
    }
}
?>
