<?php

namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

        // Vérification que le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $pseudo = $_POST['pseudo'];
            $texte = $_POST['texte'];
            $id_contree = $_POST['Id_contree'];

            // Création du commentaire dans la base de données
            $commentaire = new Commentaire();
            // Appel de la méthode "create" du modèle Commentaire avec 
            // les données du formulaire et la date courante.
            $commentaire->create( $pseudo, $texte, $id_contree);

            // Redirection vers la page de détails de la contrée
            header('Location: viewDetailsContree.php?id=' . $id_contree);
            exit;
        }

include_once (__DIR__ . '/../Views/viewCommentaires.php');
?>
