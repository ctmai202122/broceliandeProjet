<?php

namespace Broceliande\Controllers;

class ModerationCommentairesController
{
    public function modererCommentaires()
    {
        // Création d'une instance du contrôleur CommentairesController
        $commentairesController = new CommentairesController();

        // Appel de la méthode modererCommentaires du CommentairesController
        $commentairesController->modererCommentaires();
    }

    public function validerCommentaires($commentairesIds)
    {
        // Création d'une instance du contrôleur CommentairesController
        $commentairesController = new CommentairesController();

        // Appel de la méthode validerCommentaires du CommentairesController
        $commentairesController->validerCommentaires($commentairesIds);

        // Redirection vers la vue de succès
        header('Location: ?action=success');
        exit;
    }

    public function supprimerCommentaires($commentairesIds)
    {
        // Création d'une instance du contrôleur CommentairesController
        $commentairesController = new CommentairesController();

        // Appel de la méthode supprimerCommentaires du CommentairesController
        $commentairesController->supprimerCommentaires($commentairesIds);

        // Redirection vers la vue de succès
        header('Location: ?action=success');
        exit;
    }
}
include_once(__DIR__ . '/../Views/viewCommentaires.php');

?>