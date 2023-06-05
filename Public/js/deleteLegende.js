$(document).ready(function() {
    // Récupération de l'élément du formulaire
    const deleteForm = $('#deleteForm');
  
    // Ajout d'un gestionnaire d'événement 'submit' sur le formulaire de suppression
    deleteForm.submit(function(event) {
      // Popup de confirmation (retourne TRUE si confirmé, FALSE si annulé)
      const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette légende ?');
  
      // Si non confirmé -> annulation de l'événement
      if (!confirmation) {
        event.preventDefault();
      }
    });
  });
  