// Le script jQuery qui permet de faire fonctionner le menu déroulant 

// Attendre que la page soit chargée avant d'exécuter le code
$(document).ready(function() {
    // Ajouter un gestionnaire d'événement qui s'active quand on clique sur le bouton burger
    $("#burger").click(function() {
        // Le menu déroulant sera affiché ou caché en fonction de son état actuel
        $("#menu").toggle();
    });
});