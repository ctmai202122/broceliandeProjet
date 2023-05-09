<?php

namespace Broceliande\Models;

use Broceliande\Models\DbConnect;
use PDO;
use PDOException;

class Contree extends DbConnect
{

    /* ====== CREATE ====== */
    public static function create(
        string $titre,
        string $contenu,
        string $photo,
        float $latitude,
        float $longitude,
        string $commune,
        string $accessibilite,
        string $ouverture
    ) {
        // Connexion à la base de données en utilisant la méthode héritée dbConnect()
        $cnx = self::dbConnect();
        // Préparation de la requête SQL pour insérer une nouvelle entrée dans la table "contree"
        $req = $cnx->prepare("INSERT INTO `contree` (`titre`, `contenu`, `photo`, `latitude`, `longitude`, `commune`, `accessibilite`, `ouverture`) 
       VALUES (:titre, :contenu, :photo, :latitude, :longitude, :commune, :accessibilite, :ouverture) ");
        // Exécution de la requête en passant les valeurs avec un tableau associatif
        $req->execute(
            array(
                ':titre' => $titre,
                ':contenu' => $contenu,
                ':photo' => $photo,
                ':latitude' => $latitude,
                ':longitude' => $longitude,
                ':commune' => $commune,
                ':accessibilite' => $accessibilite,
                ':ouverture' => $ouverture
            )
        );
    }

    /* ====== READ ====== */
    //Récupère toutes les entrées de la table "contree"
    //Et les retournent dans un tableau associatif
    public static function getAll()
    {
        try {
            // Connexion à la Bdd 
            $cnx = self::dbConnect();
            // Préparation requête SQL pour récupérer toutes les entrées de la table "contree" 
            $req = $cnx->prepare("SELECT * FROM contree");
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
            $req = $cnx->prepare("SELECT * FROM contree WHERE Id_contree = :id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }

    /* ====== UPDATE ====== */
    public static function update($id, $titre, $contenu, $photo, $latitude, $longitude, $commune, $accessibilite, $ouverture)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("UPDATE contree SET 
                titre=:titre,
                contenu=:contenu,
                photo=:photo,
                latitude=:latitude,
                longitude=:longitude,
                commune=:commune,
                accessibilite=:accessibilite,
                ouverture=:ouverture,
               
                WHERE Id_contree =:id");

            $req->execute(
                array(
                    ':titre' => $titre,
                    ':contenu' => $contenu,
                    ':photo' => $photo,
                    ':latitude' => $latitude,
                    ':longitude' => $longitude,
                    ':commune' => $commune,
                    ':accessibilite' => $accessibilite,
                    ':ouverture' => $ouverture,
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
            $req = $cnx->prepare("DELETE FROM contree WHERE Id_contree = :id");
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