document.addEventListener('DOMContentLoaded', function () {
    const colDate = document.getElementById('col-date');
    const colAuteur = document.getElementById('col-auteur');
    const colContree = document.getElementById('col-contree');

    if (colDate) {
        colDate.addEventListener('click', () => {
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
        column: -1,
        direction: 'asc'
    };

    function sortTable(column) {
        const table = document.querySelector('.tableModeration');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.getElementsByTagName('tr'));

        if (currentSort.column === column) {
            currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
        } else {
            currentSort.column = column;
            currentSort.direction = 'asc';
        }

        rows.sort((a, b) => {
            const aCellValue = a.cells[column].textContent.trim().toLowerCase();
            const bCellValue = b.cells[column].textContent.trim().toLowerCase();

            let comparison = 0;

            if (aCellValue > bCellValue) {
                comparison = 1;
            } else if (aCellValue < bCellValue) {
                comparison = -1;
            }

            return currentSort.direction === 'asc' ? comparison : -comparison;
        });

        rows.forEach(row => tbody.appendChild(row));

        // Supprimer les icônes de tri de toutes les colonnes
        const sortIcons = document.querySelectorAll('.sort-icon');
        sortIcons.forEach(icon => {
            icon.classList.remove('fa-sort-up', 'fa-sort-down');
        });

        // Ajouter l'icône de tri à la colonne en cours
        const currentSortIcon = table.querySelector(`#col-${column} .sort-icon`);
        currentSortIcon.classList.add(currentSort.direction === 'asc' ? 'fa-sort-up' : 'fa-sort-down');
    }
});
