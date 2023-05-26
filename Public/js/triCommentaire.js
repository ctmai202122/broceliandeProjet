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