<?php

namespace Broceliande\Models;

use PDO;
use PDOException;
use Exception;

abstract class DbConnect
{
  // Singleton qui permet de récupérer la variable statique ($bdd) stockée pour 
  //eviter de se connecter à la base de donner à chaque appel de dbConnect
  private static $bdd = null;

  // Connexion à la base de données
  public static function dbConnect()
  {
    if (isset($_ENV['DB_PORT']) && !empty($_ENV['DB_PORT'])) {
      $port = ":" . $_ENV['DB_PORT'];
    } else {
      $port = "";
    }

    // Définit la chaîne de connexion à la base de données MySQL en utilisant les constantes d'environnement
    $sql = "mysql:dbname=" . $_ENV['DB_NAME'] . "; host=" . $_ENV['DB_HOST'] . $port . "; charset=utf8";
    $user = $_ENV['DB_USER'];
    $pwd = $_ENV['DB_PASSWORD'];



    // Si la connexion a déjà été établie, on retourne simplement l'objet PDO correspondant
    if (isset(self::$bdd)) {
      return self::$bdd;
    } else {
      try {
        // Sinon, on crée un nouvel objet PDO avec les informations de connexion et on le stocke dans une variable statique pour pouvoir le réutiliser
        self::$bdd = new PDO($sql, $user, $pwd);
        // On configure l'objet PDO pour qu'il lance une exception en cas d'erreur
        self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // On retourne l'objet PDO nouvellement créé
        return self::$bdd;
      } catch (PDOException $e) {
        // Si une exception lors de la connexion à la base de données,message d'erreur
        throw new Exception("Erreur de connexion à la base de données : " . $e->getMessage());
      }
    }
  }
}
?>