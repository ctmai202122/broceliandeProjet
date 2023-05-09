<?php

namespace Broceliande\Controllers;

use Broceliande\Models\Admin;

if (isset($_SESSION['admin'])) {
    require 'App/Views/viewAdmin.php';
} else {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $mdp = $_POST['motdepasse'];

    // Vérification des informations de connexion admin
    $admin = Admin::getByEmail($email);

    var_dump(password_verify($mdp, $admin['motdepasse']));
    if ($admin && password_verify($mdp, $admin['motdepasse']) ) {
        $_SESSION['admin'] = $email;
        require 'App/Views/viewAdmin.php';
    } else {
        // Redirection 
        header('Location: ?action=administration');
        exit();
    }
}

