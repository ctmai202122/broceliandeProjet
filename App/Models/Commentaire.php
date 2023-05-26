<?php

namespace Broceliande\Models;

use Broceliande\Models\DbConnect;
use PDO;
use PDOException;

class Commentaire extends DbConnect
{
    public static function create($pseudo, $texte, $idContree)
    { {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("INSERT INTO `commentaire` ( `pseudo`, `texte`, `Id_contree`)  
        VALUES (:pseudo, :texte, :idContree)");
            $req->execute(
                array(
                    ':pseudo' => $pseudo,
                    ':texte' => $texte,
                    ':idContree' => $idContree
                )
            );
        }
    }
    /* ====== READ ====== */
    //Récupère toutes les entrées de la table "commentaire"
    //Et les retournent dans un tableau associatif
    public static function getAll()
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT * FROM commentaire");
            $req->execute();
            return $req->fetchAll();
            (PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }

    public static function getById($id_commentaire)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT * FROM commentaire WHERE Id_commentaire = :id_commentaire");
            $req->bindValue(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }

    public static function getByPseudo($pseudo)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT * FROM commentaire WHERE pseudo = :pseudo");
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }

    public static function getByDateCom($dateCom)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT * FROM commentaire WHERE dateCom = :dateCom");
            $req->bindValue(':dateCom', $dateCom, PDO::PARAM_STR);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }

    public static function getByStatut($statut)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT * FROM commentaire WHERE statut = :statut");
            $req->bindValue(':statut', $statut, PDO::PARAM_STR);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }

    public static function getByIdContree($id_contree)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT * FROM commentaire WHERE Id_contree = :id_contree");
            $req->bindValue(':id_contree', $id_contree, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }

    // récupère les commentaires avec leurs titres de contrée correspondants
    public static function getAllExtended()
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT commentaire.*, contree.titre AS titre_contree
        FROM commentaire
        INNER JOIN contree ON commentaire.Id_contree = contree.Id_contree");
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
    // récupère un commentaire spécifique en fonction de son identifiant
    public static function getExtendedById($idCommentaire)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT commentaire.*, contree.titre AS titre_contree
            FROM commentaire
            INNER JOIN contree ON commentaire.Id_contree = contree.Id_contree
            WHERE commentaire.Id_commentaire = :idCommentaire");
            $req->bindValue(':idCommentaire', $idCommentaire, PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }


    /* ====== UPDATE ====== */
    public static function update($id_commentaire, $pseudo, $texte, $Id_contree)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("UPDATE commentaire SET 
                pseudo=:pseudo,
                texte=:texte,
                Id_contree=:Id_contree
                              
                WHERE Id_commentaire =:id_commentaire");

            $req->execute(
                array(
                    ':pseudo' => $pseudo,
                    ':texte' => $texte,
                    ':Id_commentaire' => $id_commentaire,
                    ':Id_contree' => $Id_contree
                )
            );

            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    /* ====== DELETE ====== */
    public static function delete($idCommentaire)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("DELETE FROM commentaire WHERE Id_commentaire = :id_commentaire");
            $req->bindValue(':id_commentaire', $idCommentaire, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            die("Erreur lors de la suppression des données : " . $e->getMessage());
            return false;
        }
    }

    // commentaire validé
    public static function validate($idCommentaire)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("UPDATE commentaire SET statut = 'validé' WHERE Id_commentaire IN (" . implode(",", $idCommentaire) . ")");
            $req->execute();
        } catch (PDOException $e) {
            die("Erreur lors de la suppression des données : " . $e->getMessage());
            return false;
        }
    }
}
?>