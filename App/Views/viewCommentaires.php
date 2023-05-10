<?php

namespace Broceliande\Views;

use Broceliande\Models\Commentaire;

include_once(__DIR__ . '/viewHeader.php');

class CommentaireView
{
    public function modererCommentaires($commentaire)
    {
?>
        <a href="?action=administration" class="btn btn-primary">Retour à la page Admin</a>

        <?php
        // Vérifier si un commentaire a été modéré
        if (isset($_GET['moderated']) && $_GET['moderated'] == 'true') {
            echo '<p>Le commentaire a été modéré avec succès.</p>';
        }

        // Vérifier si des commentaires sont disponibles
        if (!empty($commentaire)) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // Afficher les commentaires
                    foreach ($commentaire as $commentaire) {
                    ?>
                        <tr>
                            <td><?php echo $commentaire['dateCom']; ?></td>
                            <td><?php echo $commentaire['pseudo']; ?></td>
                            <td><?php echo $commentaire['texte']; ?></td>
                            <td>
                                <input type="radio" name="moderation[<?php echo $commentaire['Id_commentaire']; ?>]" value="moderer"> Modérer
                                <input type="radio" name="moderation[<?php echo $commentaire['Id_commentaire']; ?>]" value="supprimer"> Supprimer
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>
<?php
        } else {
            // Aucun commentaire trouvé
            echo '<p>Aucun commentaire n\'a été trouvé.</p>';
        }
    }
}

$commentaireView = new CommentaireView();
$commentaireModel = new Commentaire();
$commentaires = $commentaireModel->getAll();

$commentaireView->modererCommentaires($commentaires);

include_once(__DIR__ . '/viewFooter.php');
?>