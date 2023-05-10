<?php
namespace Broceliande\Views;

include_once(__DIR__ . '/viewHeader.php');

// Importation des modèles
use Broceliande\Models\Contree;
use Broceliande\Models\Legende;
use Broceliande\Models\Commentaire;

// Création des modèles
$contreeModel = new Contree();
$legendeModel = new Legende();
$commentaireModel = new Commentaire();

// Récupération des données
$contrees = $contreeModel->getAll();
$legendes = $legendeModel->getAll();
$commentaires = $commentaireModel->getAll();

?>

<div class="admin">
    <ul class="nav nav-tabs navbar-dark">
        <li class="nav-item">
            <a class="nav-link" href="viewGestionContree.php">Gestion contrées</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewGestionLegende.php">Gestion légendes</a>
        </li>  
        <li class="nav-item">
            <a class="nav-link active" href="#">Modération commentaires</a>
        </li>
    </ul>
  
    <?php
    // Affichage des commentaires à modérer
    echo '<div class="commentaire">';
    echo '<h2> Commentaires à modérer </h2>';

    // Inclusion du formulaire de gestion des commentaires
    include_once(__DIR__ . '/viewCommentaires.php');

    echo '</div>';

    // Affichage de la gestion des contrées
    echo '<div class="contree">';
    echo '<h2> Gestion des contrées </h2>';

    // Inclusion du formulaire de gestion des contrées
    include_once(__DIR__ . '/viewGestionContree.php');
    
    echo '</div>';

    // Affichage de la gestion des légendes
    echo '<div class="legende">';
    echo '<h2> Gestion des légendes </h2>';

    // Inclusion du formulaire de gestion des légendes
    include_once(__DIR__ . '/viewGestionLegende.php');

    echo '</div>';
    ?>

    <?php
    // Traitement des actions de création et de suppression des contrées
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_GET['action'] === 'addContree') {
            // Action de création d'une contrée
            $contreeModel = new Contree();
            $contreeModel->create($_POST);
            header('Location: viewAdmin.php');
            exit;
        } elseif ($_GET['action'] === 'deleteContree') {
            // Action de suppression d'une contrée
            $contreeModel = new Contree();
            $contreeModel->delete($_POST['idContree']);
            header('Location: viewAdmin.php');
            exit;
        }
    }
    ?>
</div>

