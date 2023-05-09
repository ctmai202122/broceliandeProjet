<?php

namespace Broceliande\Views;
use Broceliande\Controllers\CommentairesController;

include_once(__DIR__ . '/viewHeader.php');

?>
<main class="container">

    <?php
    class Commentaire
    {
        public function afficherCommentaires()
        {
            // Instancier le contrôleur de commentaires
            $commentController = new CommentairesController();

            // Récupérer les commentaires à afficher
            if (isset($_GET['status'])) {
                // Récupérer les commentaires en fonction du statut demandé
                $status = $_GET['status'];
                $comments = $commentController->getByStatus($status);
            } else {
                // Récupérer tous les commentaires
                $comments = $commentController->getAllComments();
            }

            // Vérifier si un commentaire a été modéré
            if (isset($_GET['moderated']) && $_GET['moderated'] == 'true') {
                echo '<p>Le commentaire a été modéré avec succès.</p>';
            }

            // Afficher les commentaires
            foreach ($comments as $comment) {
                echo '<div class="comment">';
                echo '<p>' . $comment->text . '</p>';
                echo '<p>Publié par ' . $comment->author . ' le ' . $comment->date . '</p>';
                echo '<p>Statut : ' . $comment->status . '</p>';
                if ($comment->status == 'En attente de modération') {
                    echo '<a href="admin.php?action=moderate&id=' . $comment->id . '">Modérer</a>';
                } else if ($comment->status == 'Publié') {
                    echo '<a href="admin.php?action=delete&id=' . $comment->id . '">Supprimer</a>';
                } else if ($comment->status == 'Supprimé') {
                    echo '<a href="admin.php?action=approve&id=' . $comment->id . '">Rétablir</a>';
                }
                echo '</div>';
            }
        }
    }
    ?>
</main <?php
        include_once(__DIR__ . '/viewFooter.php');
        ?>