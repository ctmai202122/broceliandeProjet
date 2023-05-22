<?php

namespace Broceliande\Views;

use Broceliande\Models\Commentaire;
include_once(__DIR__ . '/viewHeader.php');
// Inclure la vue de la nav admin
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

                <!-- Ajouter le formulaire de tri -->
                <form class="gestionTri">
                    <label for="tri">Trier par :</label>
                    <select name="tri" id="tri">
                        <option value="date">Date</option>
                        <option value="auteur">Auteur</option>
                        <option value="commentaire">Commentaire</option>
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
                        // Afficher les commentaires
                        foreach ($commentaire as $comment) {
                            ?>
                            <tr>
                                <td><?php echo $comment['dateCom']; ?></td>
                                <td><?php echo $comment['pseudo']; ?></td>
                                <td><?php echo $comment['titre']; ?></td>
                                <td>
                                    <input type="radio" name="moderation[<?php echo $comment['Id_commentaire']; ?>]" value="valider" class="btn-moderation"> Valider <br>
                                    <input type="radio" name="moderation[<?php echo $comment['Id_commentaire']; ?>]" value="supprimer" class="btn-moderation ml-4"> Supprimer
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" id="valider-commentaires-btn">Valider</button>
                <button type="button" class="btn btn-danger" id="supprimer-commentaires-btn">Supprimer</button>
            </div>
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


<!-- JavaScript gestion commentaires -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupérer les en-têtes de colonnes
        const colDate = document.getElementById('col-date');
        const colAuteur = document.getElementById('col-auteur');
        const colCommentaire = document.getElementById('col-commentaire');

        // Ajouter des gestionnaires d'événements pour le clic sur les en-têtes de colonnes
        colDate.addEventListener('click', () => {
            sortTable('date');
        });

        colAuteur.addEventListener('click', () => {
            sortTable('auteur');
        });

        colCommentaire.addEventListener('click', () => {
            sortTable('commentaire');
        });

        // Fonction pour trier le tableau en fonction de la colonne sélectionnée
        function sortTable(column) {
            const tbody = document.querySelector('.tableModeration tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            // Trier les lignes en fonction de la valeur de la colonne
            rows.sort((row1, row2) => {
                const value1 = row1.querySelector(`td:nth-child(${getColumnIndex(column)})`).textContent.trim();
                const value2 = row2.querySelector(`td:nth-child(${getColumnIndex(column)})`).textContent.trim();

                if (column === 'date') {
                    return new Date(value1) - new Date(value2);
                } else {
                    return value1.localeCompare(value2);
                }
            });

            // Supprimer les lignes existantes du tableau
            rows.forEach(row => {
                tbody.removeChild(row);
            });

            // Ajouter les lignes triées au tableau
            rows.forEach(row => {
                tbody.appendChild(row);
            });
        }

        // Fonction pour obtenir l'index de la colonne en fonction de son identifiant
        function getColumnIndex(column) {
            const headers = Array.from(document.querySelectorAll('th'));
            return headers.findIndex(header => header.id === `col-${column}`) + 1;
        }

        // Gestionnaire d'événement pour le bouton de tri
        const triBtn = document.getElementById('tri-commentaires-btn');
        triBtn.addEventListener('click', function(event) {
            event.preventDefault();
            const triSelect = document.getElementById('tri');
            const selectedOption = triSelect.options[triSelect.selectedIndex].value;

            sortTable(selectedOption);
        });
    });
</script>