<?php
// Inclure le fichier du modèle "Legende"
use Broceliande\Models\Legende;
use Broceliande\Models\Contree;

// Définir une variable pour le message
$message = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Le formulaire a été soumis, traiter les données ici

    // Vérifier si les champs requis sont remplis
    if (isset($_POST["titre"]) && isset($_POST["contenu"]) && isset($_POST["idContree"])) {
        // Récupérer les valeurs des champs
        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $photo = isset($_POST["photo"]) ? $_POST["photo"] : null;
        $idContree = $_POST["idContree"];

        // Enregistrer les données dans la base de données en utilisant la méthode appropriée du modèle
        Legende::create($titre, $contenu, $photo, $idContree);

    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['message'] = "La légende a été supprimée avec succès.";
    } else {
    // Stockage d'un message de confirmation dans une variable de session
    $_SESSION['erreur'] = "La légende n'a pas été supprimée.";
    }
}

// Récupérer les données des contrées à afficher dans le menu déroulant
$contreeModel = new Contree();
$contrees = $contreeModel->getAll();

// Récupérer les données des légendes à afficher dans le menu déroulant de suppression
$legendeModel = new Legende();
$legendes = $legendeModel->getAll();

// Inclusion de la vue pour la gestion des contrées
include_once('App/Views/viewGestionLegende.php');
?>