
// Récupération de l'élément du formulaire et du bouton de suppression
let deleteForm = document.getElementById('deleteForm');
const deleteButton = document.getElementById('deleteButton');

// Ajout d'un écouteur d'événement sur le bouton de suppression
deleteButton.addEventListener('click', function(event) {
    // Affichage de la boîte de dialogue de confirmation
    const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette contrée ?');
    
    // Soumission du formulaire si l'utilisateur a confirmé
    if (confirmation) {
        deleteForm.submit();
    } else {
        // Annulation de l'événement de clic du bouton de suppression
        event.preventDefault();
    }
});
