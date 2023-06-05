//Le script jQuery qui permet de mettre en évidence la page active dans le menu
$(document).ready(function () {
    // Récupérer tous les liens du menu
    const menuLinks = $("#menu .nav-link");

    // Parcourir tous les liens
    menuLinks.each(function () {
        // Vérifier si le lien correspond à l'onglet ouvert
        if (this.href === window.location.href) {
            // Ajouter une classe active au lien correspondant
            $(this).addClass("active");
        }
    });
});

