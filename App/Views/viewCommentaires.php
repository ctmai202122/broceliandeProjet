<?php
include_once(__DIR__ . '/viewHeader.php');
// Inclure la vue de la nav admin
include_once(__DIR__ . '/viewMenuAdmin.php');
?>

<div class="moderation">
    <h2 class="mt-5 mb-3 text-center">Modération des commentaires</h2>

    <!-- Ajouter le formulaire de tri -->
    <form class="gestionTri">
        <label for="tri">Trier par :</label>
        <select name="tri" id="tri">
            <option value="date">Date</option>
            <option value="auteur">Auteur</option>
            <option value="contree">Contrée</option>
        </select>
        <button type="button" id="tri-commentaires-btn">Trier</button>
    </form>

    <table class="tableModeration">
        <thead>
            <tr>
                <th id="col-date">Date</th>
                <th id="col-auteur">Auteur</th>
                <th id="col-contree">Contrée</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Vérifier si des commentaires sont disponibles
            if (!empty($commentaires)) {
                foreach ($commentaires as $commentaire) {
            ?>
                    <form method="post" action="?action=moderationCommentaire">
                        <tr>
                            <td><?php echo $commentaire['dateCom']; ?></td>
                            <td><?php echo $commentaire['pseudo']; ?></td>
                            <td><?php echo $commentaire['titre_contree']; ?></td>
                            <td>
                                <input type="radio" name="moderation[<?php echo $commentaire['Id_commentaire']; ?>]" value="valider" class="btn-moderation"> Valider <br>
                                <input type="radio" name="moderation[<?php echo $commentaire['Id_commentaire']; ?>]" value="supprimer" class="btn-moderation ml-4"> Supprimer
                            </td>
                        </tr>
                        <input type="submit" value="Soumettre">
                    </form>

                <?php
                }
            } else {
                // Aucun commentaire disponible
                ?>
                <tr>
                    <td colspan="4">Aucun commentaire disponible.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <button type="button" class="btn" id="validerCom-btn">Valider</button>
</div>

<?php
include_once(__DIR__ . '/viewFooter.php');
?>

<!-- JavaScript gestion commentaires -->
<script src="Public/js/moderation.js"></script>

<!-- JavaScript tri commentaires -->
<script src="Public/js/triCommentaire.js"></script>
