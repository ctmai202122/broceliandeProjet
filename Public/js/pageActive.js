
    // Récupérer tous les liens du menu
    var menuLinks = document.querySelectorAll('#menu .nav-link');

    // Parcourir tous les liens
    menuLinks.forEach(function(link) {
        // Vérifier si le lien correspond à l'onglet ouvert
        if (link.href === window.location.href) {
            // Ajouter une classe active au lien correspondant
            link.classList.add('active');
        }
    });

