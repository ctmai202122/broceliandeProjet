 <?php 
//namespace Broceliande\Controllers;



//Vérification si le formulaire a été soumis
if(isset($_POST['envoyer'])) {

    // Récupération des données du formulaire
    $nom = ($_POST['nom']);
    $prenom = ($_POST['prenom']);
    $email=($_POST['email']);
    $objet = ($_POST['objet']);
    $message = ($_POST['message']);
  
    // Vérification si les champs sont remplis
    if($nom == '' || $prenom == ''|| $email == '' || $objet == '' || $message == '') {
      echo "<p>Tous les champs sont obligatoires.</p>";
    }
    else {
      // Préparation du mail
      $destinataire = 'contact@broceLandes.com';
      $sujet = 'Message de ' . $nom . ' ' . $prenom . ' : ' . $objet;
      $message_mail = "Nom : " . $nom . "\n\n" . "Prénom : " . $prenom . "\n\n" . "Objet : " . $objet . "\n\n" . "Message : " . $message;
  
      // Envoi du mail
      if(mail($destinataire, $sujet, $message_mail)) {
        echo "<p>Votre message a été envoyé avec succès.</p>";
      }
      else {
        echo "<p>Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.</p>";
      }
    }
  }
  include_once (__DIR__ . '/../Views/viewContact.php');
// ?>  