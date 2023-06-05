// Attendez que le contenu HTML soit chargé
document.addEventListener('DOMContentLoaded', function () {

    // Récupérez les éléments de colonne par leur ID
    const colDate = document.getElementById('col-date');
    const colAuteur = document.getElementById('col-auteur');
    const colContree = document.getElementById('col-contree');

    // Ajoutez des écouteurs de clic aux colonnes pertinentes
    if (colDate) {
        colDate.addEventListener('click', () => {
            // Appel de la fonction sortTable avec l'index de colonne correspondant
            sortTable(0);
        });
    }

    if (colAuteur) {
        colAuteur.addEventListener('click', () => {
            sortTable(1);
        });
    }

    if (colContree) {
        colContree.addEventListener('click', () => {
            sortTable(2);
        });
    }

    let currentSort = {
        // Initialisez la colonne de tri à -1 (aucune colonne triée)
        column: -1,
        // Initialisez la direction de tri à 'asc' (croissant)
        direction: 'asc'
    };

    function sortTable(column) {
        // Sélectionnez la table par sa classe
        const table = document.querySelector('.tableModeration');
        // Sélectionnez le corps de la table
        const tbody = table.querySelector('tbody');
        // Convertissez les lignes en tableau
        const rows = Array.from(tbody.getElementsByTagName('tr'));

        // Vérifiez si la colonne actuelle est la même que celle cliquée
        if (currentSort.column === column) {
            // Inversez la direction de tri
            currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
        } else {
            currentSort.column = column; // Mettez à jour la colonne de tri
            currentSort.direction = 'asc'; // Réinitialisez la direction de tri à 'asc' (croissant)
        }

        rows.sort((a, b) => {
            // Obtenez la valeur de cellule pour la ligne a
            const aCellValue = a.cells[column].textContent.trim().toLowerCase();
            // Obtenez la valeur de cellule pour la ligne b
            const bCellValue = b.cells[column].textContent.trim().toLowerCase();

            // Appliquez la direction de tri à la comparaison
            return currentSort.direction === 'asc' ? aCellValue.localeCompare(bCellValue) : bCellValue.localeCompare(aCellValue);
        });

        // Réorganisez les lignes dans le corps de la table
        rows.forEach(row => tbody.appendChild(row));
    }
});
