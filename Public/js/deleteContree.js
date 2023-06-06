
// Lorsque le contenu de la page est entièrement chargé..
document.addEventListener('DOMContentLoaded', function () {
    // Récupération de l'élément du formulaire
    const deleteForm = document.querySelector('#deleteForm');

    // Ajout d'un écouteur d'événement 'submit' sur le formulaire de suppression
    deleteForm.addEventListener('submit', function (event) {
        // Popup de confirmation (retourne TRUE si confirmé, FALSE si annulé)
        const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette contrée ?');

        // Si non confirmé -> annulation de l'événement
        if (!confirmation) {
            event.preventDefault();
        }
    });
});


