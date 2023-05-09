<?php

namespace Broceliande\Models;

use Broceliande\Models\DbConnect;
use PDO;
use PDOException;


class Legende extends DbConnect
{

    /* ====== CREATE ====== */
    public static function create(string $titre, string $contenu, string $photo)
    {
        // Connexion à la base de données en utilisant la méthode héritée dbConnect()
        $cnx = self::dbConnect();
        // Préparation de la requête SQL pour insérer une nouvelle entrée dans la table "legende"
        $req = $cnx->prepare("INSERT INTO `legende` (`titre`, `contenu`, `photo`) 
        VALUES (:titre, :contenu, :photo, ) ");
        // Exécution de la requête en passant les valeurs avec un tableau associatif
        $req->execute(
            array(
                ':titre' => $titre,
                ':contenu' => $contenu,
                ':photo' => $photo,

            )
        );
    }

    /* ====== READ ====== */
    //Récupère toutes les entrées de la table "legende"
    //Et les retournent dans un tableau associatif 
    public static function getAll()
    {
        try {
            // Connexion à la Bdd 
            $cnx = self::dbConnect();
            // Préparation requête SQL pour récupérer toutes les entrées de la table "legende" 
            $req = $cnx->prepare("SELECT * FROM legende");
            // Execution de la requête 
            $req->execute();
            // Retourne toutes les entrées sous forme de tableau associatif grâce à la méthode fetchAll() 
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
    public static function getById($id)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT * FROM legende WHERE Id_legende = :id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
    /* ====== UPDATE ====== */
    public static function update($id, $titre, $contenu, $photo, $Id_contree)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("UPDATE legende SET 
            --  //Id_legende
                 titre=:titre,
                 contenu=:contenu,
                 photo=:photo,
                 Id_contree=:Id_contree
             
                
                 WHERE Id_legende =:id");

            $req->execute(
                array(
                    ':titre' => $titre,
                    ':contenu' => $contenu,
                    ':photo' => $photo,
                    ':Id_contree' => $Id_contree,
                    ':id' => $id
                )
            );

            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    /* ====== DELETE ====== */
    public static function delete($id)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("DELETE FROM legende WHERE Id_legende = :id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (PDOException $e) {
            die("Erreur lors de la suppression des données : " . $e->getMessage());
            return false;
        }
    }
}
?>