document.addEventListener('DOMContentLoaded', function() {
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

    function sortTable(column) {
        const table = document.querySelector('.tableModeration');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.getElementsByTagName('tr'));

        const currentSort = {
            column: column,
            direction: 'asc'
        };

        rows.sort((a, b) => {
            const aCellValue = a.cells[column].textContent.trim().toLowerCase();
            const bCellValue = b.cells[column].textContent.trim().toLowerCase();

            const comparison = aCellValue.localeCompare(bCellValue);
            return currentSort.direction === 'asc' ? comparison : -comparison;
        });

        rows.forEach(row => tbody.appendChild(row));

        currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
    }
});
