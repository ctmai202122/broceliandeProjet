<?php

namespace Broceliande\Models;

use Broceliande\Models\DbConnect;
use PDO;
use PDOException;

class Admin extends DbConnect
{

    /* ====== CREATE ====== */
    public static function create(
        string $email,
        string $pseudo,
        string $motdepasse,
       
    ) {
        // Connexion à la base de données en utilisant la méthode héritée dbConnect()
        $cnx = self::dbConnect();
        // Préparation de la requête SQL pour insérer une nouvelle entrée dans la table "contree"
        $req = $cnx->prepare("INSERT INTO `admin` ('email', 'pseudo','motdepasse') 
       VALUES (:email, :pseudo,:motdepasse) ");
        // Exécution de la requête en passant les valeurs avec un tableau associatif
        $req->execute(
            array(
               ':email'=> $email,
                ':pseudo'=> $pseudo,
                ':motdepasse' => $motdepasse
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
            $req = $cnx->prepare("SELECT * FROM admin");
            // Execution de la requête 
            $req->execute();
            // Retourne toutes les entrées sous forme de tableau associatif grâce à la méthode fetchAll() 
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
    public static function getByEmail($email)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("SELECT * FROM admin WHERE email = :email");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on affiche un message d'erreur et on arrête le script 
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
    /* ====== UPDATE ====== */
    public static function update($email, $pseudo, $motdepasse)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("UPDATE admin SET 
                email=:email,
                pseudo=:pseudo,
                motdepasse=:motdepasse,
                              
                WHERE email =:email");

            $req->execute(
                array(
                ':email' => $email,
                ':pseudo' => $pseudo,
                ':motdepasse'=> $motdepasse
                )
            );

            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    /* ====== DELETE ====== */
    public static function delete($email)
    {
        try {
            $cnx = self::dbConnect();
            $req = $cnx->prepare("DELETE FROM admin WHERE email = :email");
            $req->bindValue(':email', $email, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (PDOException $e) {
            die("Erreur lors de la suppression des données : " . $e->getMessage());
            return false;
        }
    }
}
