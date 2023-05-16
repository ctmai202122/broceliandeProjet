// Récupération de l'élément du formulaire et du bouton de suppression
var deleteForm = document.getElementById('deleteForm');
var deleteButton = document.getElementById('deleteButton');

// Ajout d'un écouteur d'événement sur le bouton de suppression
deleteButton.addEventListener('click', function(event) {
    // Affichage de la boîte de dialogue de confirmation
    var confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette légende ?');
    
    // Soumission du formulaire si l'utilisateur a confirmé
    if (confirmation) {
        deleteForm.submit();
    } else {
        // Annulation de l'événement de clic du bouton de suppression
        event.preventDefault();
    }
});
