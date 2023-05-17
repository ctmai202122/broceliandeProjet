<?php

namespace Broceliande\Views;

use Broceliande\Models\Commentaire;

include_once(__DIR__ . '/viewHeader.php');
//Inclure la vue de la nav admin
include_once(__DIR__ . '/viewMenuAdmin.php');

class CommentaireView
{
    public function modererCommentaires($commentaire)
    {
        // Vérifier si des commentaires sont disponibles
        if (!empty($commentaire)) {
        ?>
            <div class="moderation">
                <h2 class="mt-5 mb-3 text-center">Modération des commentaires</h2>
                <table class="tableModeration">
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
                                    <input type="radio" name="moderation[<?php echo $commentaire['Id_commentaire']; ?>]" value="valider" class="btn-moderation"> Valider <br>
                                    <input type="radio" name="moderation[<?php echo $commentaire['Id_commentaire']; ?>]" value="supprimer" class="btn-moderation ml-4"> Supprimer

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" id="valider-commentaires-btn">Valider</button>
                <button type="button" class="btn btn-danger" id="supprimer-commentaires-btn">Supprimer</button>
            <?php
        } else {
            // Aucun commentaire trouvé
            ?>
                <p>Aucun commentaire n'a été trouvé.</p>
            </div>
<?php
        }
    }
}

$commentaireView = new CommentaireView();
$commentaireModel = new Commentaire();
$commentaires = $commentaireModel->getAll();

$commentaireView->modererCommentaires($commentaires);

include_once(__DIR__ . '/viewFooter.php');
?>
<!-- JavaScript gestion commentaires -->
<script src="Public/js/moderation.js"></script>