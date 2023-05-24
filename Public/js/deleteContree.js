// Récupération de l'élément du formulaire
const deleteForm = document.getElementById('deleteForm');
   
// Ajout d'un écouteur d'événement 'submit' sur le formulaire de suppression
deleteForm.addEventListener('submit', function(event) {

 // popup de confirmation (retourne TRUE si confirmé, FALSE si annulé)
 const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette contrée ?');

 // si non confirmé -> annulation de l'événement
 if (!confirmation) {
 event.preventDefault();

 }

 // sinonl'événement se propage comme prévu

});
