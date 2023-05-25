<?php
namespace Broceliande\Controllers;

use Broceliande\Models\Commentaire;

class CommentairesController
{
    public function ajouterCommentaire()
    {
        // Vérification que le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $pseudo = $_POST['pseudo'];
            $texte = $_POST['texte']; 
            $idContree = $_POST['idContree'];
            $titreContree = $_POST['titreContree'];

            // Création du commentaire dans la base de données
            $commentaire = new Commentaire();
            $commentaire->create($pseudo, $texte, $idContree, $titreContree);

            // Stockage d'un message de confirmation dans une variable de session
            $_SESSION['message'] = "Votre commentaire a bien été envoyé, il va être modéré par l'administrateur !";

            // Redirection vers la page de détails de la contrée
            header('Location: ?action=detailsContree&id=' . $idContree);
            exit;
        }
    }

    public function validerCommentaires($commentairesIds)
    {
        // Opérations de validation des commentaires ici
        $commentaire = new Commentaire();
        $commentaire->validate($commentairesIds);

        // Redirection vers une autre page ou affichage d'un message de succès
        header('Location: ?action=success');
        exit;
    }

    public function supprimerCommentaires($commentairesIds)
    {
        // Opérations de suppression des commentaires ici
        $commentaire = new Commentaire();
        $commentaire->delete($commentairesIds);

        // Redirection vers une autre page ou affichage d'un message de succès
        header('Location: ?action=success');
        exit;
    }

    public function modererCommentaires()
    {
        // Récupération des commentaires avec leurs titres de contrée
        $commentaires = Commentaire::getAllExtended();

        // Affichage des commentaires avec la vue
        include_once('App/Views/viewCommentaires.php');
    }
}
