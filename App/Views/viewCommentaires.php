<?php

namespace Broceliande\Views;

include_once(__DIR__ . '/viewHeader.php');

class CommentaireView
{
    public function modererCommentaires($commentaire)
    {

        // Vérifier si un commentaire a été modéré
        if (isset($_GET['moderated']) && $_GET['moderated'] == 'true') {
            echo '<p>Le commentaire a été modéré avec succès.</p>';
        }

        // Vérifier si des commentaires sont disponibles
        if (!empty($commentaire)) {
            // Afficher les commentaires
            foreach ($commentaire as $commentaire) {
                echo '<div class="commentaire">';
                echo '<p>' . $commentaire['texte'] . '</p>';
                echo '<p>Publié par ' . $commentaire['pseudo'] . ' le ' . $commentaire['dateCom'] . '</p>';
                echo '<p>Statut : ' . $commentaire['statut'] . '</p>';
                if ($commentaire['statut'] == 'En attente de modération') {
                    echo '<a href="admin.php?action=moderate&id=' . $commentaire['id_commentaire'] . '">Modérer</a>';
                } else if ($commentaire['statut'] == 'Publié') {
                    echo '<a href="admin.php?action=delete&id=' . $commentaire['id_commentaire'] . '">Supprimer</a>';
                } else if ($commentaire['statut'] == 'Supprimé') {
                    echo '<a href="admin.php?action=approve&id=' . $commentaire['id_commentaire'] . '">Rétablir</a>';
                }
                echo '</div>';
            }
        } else {
            // Aucun commentaire trouvé
            echo '<p>Aucun commentaire n\'a été trouvé.</p>';
        }
    }
}

$commentaireView = new CommentaireView();
$commentaireView->modererCommentaires($commentaires);

include_once(__DIR__ . '/viewFooter.php');
?>
