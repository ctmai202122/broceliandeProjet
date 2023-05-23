<?php 
namespace Broceliande\Controllers;

// Initialisation de la variable $message
$message = '';

// Vérification si le formulaire a été soumis
if (isset($_POST['envoyer'])) {

    // Récupération des données du formulaire
    $nom = ($_POST['nom']);
    $prenom = ($_POST['prenom']);
    $email = ($_POST['email']);
    $objet = ($_POST['objet']);
    $message = ($_POST['message']);

    // Vérification si les champs sont remplis
    if ($nom == '' || $prenom == '' || $email == '' || $objet == '' || $message == '') {
        $message = "Tous les champs sont obligatoires.";
    } else {
        // Préparation du mail
        $destinataire = 'contact@broceLandes.com';
        $sujet = 'Message de ' . $nom . ' ' . $prenom . ' : ' . $objet;
        $message_mail = "Nom : " . $nom . "\n\n" . "Prénom : " . $prenom . "\n\n" . "Objet : " . $objet . "\n\n" . "Message : " . $message;

        // Envoi du mail
        if (mail($destinataire, $sujet, $message_mail)) {
            $message = "Votre message a été envoyé avec succès.";
        } else {
            $message = "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.";
        }
    }
}

include_once (__DIR__ . '/../Views/viewContact.php');
?>