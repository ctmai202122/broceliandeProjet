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
                    <tr>
                        <td><?php echo $commentaire['dateCom']; ?></td>
                        <td><?php echo $commentaire['pseudo']; ?></td>
                        <td><?php echo $commentaire['titre']; ?></td>
                        <td>
                            <input type="radio" name="moderation[<?php echo $commentaire['Id_commentaire']; ?>]" value="valider" class="btn-moderation"> Valider <br>
                            <input type="radio" name="moderation[<?php echo $commentaire['Id_commentaire']; ?>]" value="supprimer" class="btn-moderation ml-4"> Supprimer
                        </td>
                    </tr>
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

<!-- JavaScript gestion commentaires -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupérer les en-têtes de colonnes
        const colDate = document.getElementById('col-date');
        const colAuteur = document.getElementById('col-auteur');
        const colContree = document.getElementById('col-contree');

        // Ajouter des gestionnaires d'événements pour le clic sur les en-têtes de colonnes
        colDate.addEventListener('click', () => {
            sortTable('date');
        });

        colAuteur.addEventListener('click', () => {
            sortTable('auteur');
        });

        colContree.addEventListener('click', () => {
            sortTable('contree');
        });

        // Fonction pour trier le tableau en fonction de la colonne sélectionnée
        function sortTable(column) {
            // Récupérer le tableau et les lignes du corps du tableau
            const table = document.querySelector('.tableModeration');
            const tbody = table.getElementsByTagName('tbody')[0];
            const rows = Array.from(tbody.getElementsByTagName('tr'));

            // Trier les lignes en fonction de la colonne sélectionnée
            rows.sort((a, b) => {
                const aCellValue = a.getElementsByTagName('td')[column].textContent.trim().toLowerCase();
                const bCellValue = b.getElementsByTagName('td')[column].textContent.trim().toLowerCase();

                return aCellValue.localeCompare(bCellValue);
            });

            // Réinsérer les lignes triées dans le tableau
            rows.forEach(row => tbody.appendChild(row));
        }
    });
</script>