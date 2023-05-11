// Gestion des commentaires en mode admin
// Fonction pour envoyer une requête AJAX pour gérer les commentaires
function gererCommentaires(action) {
    // Récupérer les commentaires sélectionnés
    var commentaires = document.querySelectorAll('input[type="radio"]:checked');

    // Créer un tableau pour stocker les IDs des commentaires sélectionnés
    var commentairesIds = [];

    // Ajouter les IDs des commentaires sélectionnés au tableau
    commentaires.forEach(function (commentaire) {
        commentairesIds.push(commentaire.value);
    });

    // Créer un objet FormData pour envoyer les données au serveur
    var formData = new FormData();
    formData.append('action', action);
    formData.append('commentairesIds', JSON.stringify(commentairesIds));

    // Créer une nouvelle requête AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '?action=commentaire');
    xhr.onload = function () {
        // Traitement de la réponse du serveur
        if (xhr.statut === 200) {
            // Réponse reçue avec succès
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Les commentaires ont été gérés avec succès
                alert(response.message);
                // Recharger la page pour mettre à jour la liste des commentaires
                location.reload();
            } else {
                // Une erreur s'est produite lors de la gestion des commentaires
                alert(response.message);
            }
        } else {
            // La requête a échoué
            alert('Erreur lors de la requête AJAX.');
        }
    };
    xhr.onerror = function () {
        // Une erreur s'est produite lors de la requête
        alert('Erreur lors de la requête AJAX.');
    };

    // Envoyer la requête AJAX avec les données du formulaire
    xhr.send(formData);
}

// Écouter l'événement du clic sur le bouton de validation
var validerCommentairesBtn = document.getElementById('valider-commentaires-btn');
validerCommentairesBtn.addEventListener('click', function () {
    gererCommentaires('valider');
});

// Écouter l'événement du clic sur le bouton de suppression
var supprimerCommentairesBtn = document.getElementById('supprimer-commentaires-btn');
supprimerCommentairesBtn.addEventListener('click', function () {
    gererCommentaires('supprimer');
});
