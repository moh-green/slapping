<?php 

namespace Modeles;
use PDO;

use Modeles\Entites\Actualites;
use Modeles\Entites\Video;
use Modeles\Entites\Shorts;
use Modeles\Entites\Utilisateurs;

abstract class Bdd {
    public static function pdo(){
        return new PDO("mysql:host=localhost:3306;dbname=slapping", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    public static function select(string $table){
        $pdostatement = self::pdo()->query("SELECT * FROM $table");
        return $pdostatement->fetchAll(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table) );       
    }

    public static function selectById(string $table, int $id)
    {
        $pdostatement = self::pdo()->query("SELECT * FROM $table WHERE id = " . $id);
        $pdostatement->setFetchMode(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table));
        return $pdostatement->fetch();
    }

    //VIDEO

    public static function insertVideo(Video $video){
        $texteRequete = "INSERT INTO video (nom, genre, lien) 
                         VALUES (:nom, :genre, :lien)";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":nom", $video->getNom());
        $pdostatement->bindValue(":genre", $video->getGenre());
        $pdostatement->bindValue(":lien", $video->getLien());
    
        return $pdostatement->execute();
    }

    public static function updateVideo(Video $video) : bool{
        $texteRequete = "UPDATE video
        SET nom = :nom, genre = :genre, lien = :lien WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":nom", $video->getNom());
        $pdostatement->bindValue(":genre", $video->getGenre());
        $pdostatement->bindValue(":lien", $video->getLien());
        $pdostatement->bindValue(":id", $video->getId());
        return $pdostatement->execute();
    }
    
    public static function deleteVideo(Video $video){
        return self::pdo()->exec("DELETE FROM video WHERE id=" . $video->getId());
    }

    //SHORTS

    public static function insertShorts(Shorts $shorts){
        $texteRequete = "INSERT INTO shorts (nom, genre, lien) 
                         VALUES (:nom, :genre, :lien)";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":nom", $shorts->getNom());
        $pdostatement->bindValue(":genre", $shorts->getGenre());
        $pdostatement->bindValue(":lien", $shorts->getLien());
    
        return $pdostatement->execute();
    }

    public static function updateShorts(Shorts $shorts) : bool{
        $texteRequete = "UPDATE shorts
        SET nom = :nom, genre = :genre, lien = :lien WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":nom", $shorts->getNom());
        $pdostatement->bindValue(":genre", $shorts->getGenre());
        $pdostatement->bindValue(":lien", $shorts->getLien());
        $pdostatement->bindValue(":id", $shorts->getId());
        return $pdostatement->execute();
    }

    public static function deleteShorts(Shorts $shorts){
        return self::pdo()->exec("DELETE FROM shorts WHERE id=" . $shorts->getId());
    }

    //ACTUALITES

    public static function insertActualites(Actualites $actualites){
        $texteRequete = "INSERT INTO actualites (titre, soustitre, texte, miniature, alt) 
                         VALUES (:titre, :soustitre, :texte, :miniature, :alt)";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":titre", $actualites->getTitre());
        $pdostatement->bindValue(":soustitre", $actualites->getSoustitre());
        $pdostatement->bindValue(":texte", $actualites->getTexte());
        $pdostatement->bindValue(":alt", $actualites->getAlt());
        $pdostatement->bindValue(":miniature", $actualites->getMiniature(),PDO::PARAM_LOB);

        return $pdostatement->execute();
    }

    public static function updateActualites(Actualites $actualites) : bool{
        $texteRequete = "UPDATE actualites
        SET titre = :titre, soustitre = :soustitre, texte = :texte, miniature = :miniature alt = :alt WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":titre", $actualites->getTitre());
        $pdostatement->bindValue(":soustitre", $actualites->getSoustitre());
        $pdostatement->bindValue(":texte", $actualites->getTexte());
        $pdostatement->bindValue(":miniature", $actualites->getMiniature(),PDO::PARAM_LOB);
        $pdostatement->bindValue(":alt", $actualites->getAlt());
        $pdostatement->bindValue(":id", $actualites->getId());
        return $pdostatement->execute();
    }

    public static function deleteActualites(Actualites $actualites){
        return self::pdo()->exec("DELETE FROM actualites WHERE id=" . $actualites->getId());
    }

    //UTILISATEURS

    // public static function getUtilisateurs(Utilisateurs $utilisateurs) {
    //     $texteRequete = self::pdo()->query("SELECT * FROM utilisateurs WHERE email = ? AND type = 1");
    //     $texteRequete->execute([$utilisateurs->getEmail()]);

    //     $resultat = $texteRequete->fetch(PDO::FETCH_ASSOC);

    //     if ($resultat) {
    //         $hashedPassword = $resultat["password"];
    //         if (password_verify($utilisateurs->getMdp(), $hashedPassword)) {
    //             return new Utilisateurs($resultat['id'], $resultat['email'], $hashedPassword);
    //         }
    //     }
    //     return false;
    // }

    public static function createAccount(Utilisateurs $utilisateurs){
        $hash = password_hash($utilisateurs->getMdp(), PASSWORD_DEFAULT);
        $texteRequete = self::pdo()->prepare("INSERT INTO utilisateurs (email, mdp) 
                         VALUES (:email, :mdp)");

        $texteRequete->execute([$utilisateurs->getEmail(), $utilisateurs->getMdp() => $hash]);    
    }

    public static function checkEmail($email) {
        $texteRequete = self::pdo()->prepare('SELECT COUNT(*) FROM utilisateurs WHERE email = ?');
        $texteRequete->execute([$email]);
        $count = $texteRequete->fetchColumn();
        return $count > 0;
    }

    public static function getUserById(int $id){
        $texteRequete = self::pdo()->query("SELECT * FROM utilisateurs WHERE id = $id");
        $texteRequete->execute([$id]);

        return $texteRequete->fetch(PDO::FETCH_ASSOC);
    }

    public static function getConnexion(Utilisateurs $utilisateurs){
        $texteRequete = self::pdo()->prepare('SELECT id, email, mdp, type FROM users WHERE email = ?');
        $texteRequete->execute([$utilisateurs->getEmail()]);
        $resultat = $texteRequete->fetch();
        
        if ($resultat !== false) {
            $hashedPassword = $resultat['mdp'];
            if (password_verify($utilisateurs->getMdp(), $hashedPassword)) {
                $_SESSION['type'] = $resultat['type'];
                $_SESSION['id'] = $resultat['id'];
                return new Utilisateurs($resultat['id'], $resultat['email'], $hashedPassword, $resultat['type']);
            }
        }
        return null;
    }
}

?>