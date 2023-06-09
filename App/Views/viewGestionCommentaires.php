<?php
include_once(__DIR__ . '/viewHeader.php');
// Inclure la vue de la nav admin
include_once(__DIR__ . '/viewMenuAdmin.php');
?>

<div class="containerGestion">
    <section class="container  bg-contact">
        <h2 class="mt-5 mb-3 text-center">Modération des commentaires</h2>
        <hr>
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['erreur'])) : ?>
            <div class="alert alert-danger"><?php echo $_SESSION['erreur']; ?></div>
        <?php endif; ?>
        <form method="post" action="?action=moderateCommentaire">
            <table class="tableModeration">
                <thead>
                    <tr>
                        <th id="col-date">
                            Date
                            <i class="fa-solid fa-sort sort-icon"></i>
                        </th>
                        <th id="col-auteur">
                            Auteur
                            <i class="fa-solid fa-sort sort-icon"></i>
                        </th>
                        <th id="col-contree">
                            Contrée
                            <i class="fa-solid fa-sort sort-icon"></i>
                        </th>



                        <th>Commentaire</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Vérifier si des commentaires sont disponibles
                    if (!empty($commentaires)) {
                        foreach ($commentaires as $commentaire) {
                    ?>
                            <tr>
                                <td><?php echo $commentaire['dateCom']; ?></td>
                                <td><?php echo $commentaire['pseudo']; ?></td>
                                <td><?php echo $commentaire['titre_contree']; ?></td>
                                <td><?php echo nl2br($commentaire['texte']); ?></td>
                                <td>
                                    <input type="radio" name="moderation[<?php echo nl2br($commentaire['Id_commentaire']); ?>]" value="valider" class="btn-moderation"> Valider <br>
                                    <input type="radio" name="moderation[<?php echo nl2br($commentaire['Id_commentaire']); ?>]" value="supprimer" class="btn-moderation ml-4"> Supprimer
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        // Aucun commentaire disponible
                        ?>
                        <tr>
                            <td colspan="5">Aucun commentaire disponible.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="btnValidate text-center">
            <input type="submit" class="btn" value="Valider">
            </div>
        </form>
    </section>
</div>

<?php
include_once(__DIR__ . '/viewFooter.php');
?>
<!-- JavaScript tri commentaires -->
<script src="Public/js/triCommentaire.js"></script>