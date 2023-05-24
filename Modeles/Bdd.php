<?php 

namespace Modeles;
use PDO;

use Modeles\Entites\Actualites;
use Modeles\Entites\Video;
use Modeles\Entites\Shorts;
use Modeles\Entites\Utilisateurs;
use Modeles\Entites\Compte;

class Bdd {
    public static function pdo(){
        //return new PDO("mysql:host=localhost:3306;dbname=slapping", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return new \PDO("mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=slapping","root","root", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
    }
    public static function select(string $table){
        $pdostatement = self::pdo()->query("SELECT * FROM $table");
        return $pdostatement->fetchAll(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table) );       
    }

    public static function selectById(string $table, int $id){
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
        SET titre = :titre, soustitre = :soustitre, texte = :texte, miniature = :miniature, alt = :alt, date = :date WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":id", $actualites->getId());
        $pdostatement->bindValue(":titre", $actualites->getTitre());
        $pdostatement->bindValue(":soustitre", $actualites->getSoustitre());
        $pdostatement->bindValue(":texte", $actualites->getTexte());
        $pdostatement->bindValue(":date", $actualites->getDate());
        $pdostatement->bindValue(":miniature", $actualites->getMiniature(),PDO::PARAM_LOB);
        $pdostatement->bindValue(":alt", $actualites->getAlt());

        return $pdostatement->execute();
    }

    public static function deleteActualites(Actualites $actualites){
        return self::pdo()->exec("DELETE FROM actualites WHERE id=" . $actualites->getId());
    }

    //Compte

    public static function creeCompte($nom, $prenom, $email, $mdp){
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $requete = self::pdo()->prepare("INSERT INTO utilisateurs (nom, prenom, email, mdp) 
                         VALUES (:nom, :prenom, :email, :mdp)");
                        
        $requete->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":email" => $email,
            ":mdp" => $hash
        ]);

    }
    
    public static function getConnexion(Compte $compte){
        $requete = self::pdo()->prepare('SELECT id, email, mdp, type FROM utilisateurs WHERE email = ?');
       $requete->execute([$compte->getEmail()]);
        $resultat = $requete->fetch();
        
        if ($resultat !== false) {
            $hashedPassword = $resultat['mdp'];
            if (password_verify($compte->getMdp(), $hashedPassword)) {
                $_SESSION['type'] = $resultat['type'];
                $_SESSION['id'] = $resultat['id'];
                return new Compte($resultat['id'], null , null, $resultat['email'],null, $hashedPassword);
            }
        }
        return null;
    }
    
    public static function checkEmail($email){
        $requete = self::pdo()->prepare('SELECT COUNT(*) FROM utilisateurs WHERE email = :email');
        $requete->bindValue(":email", $email);
        $requete->execute();
        $count = $requete->fetchColumn();
        return $count > 0;
    }
    
    public static function getUserById(int $id){
        $texteRequete = self::pdo()->prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $texteRequete->bindValue(":id", $id);
        $texteRequete->execute();
        
        return $texteRequete->fetch(PDO::FETCH_ASSOC);
    }
    
    //UTILISATEURS

    public static function updateUtilisateursBack(Utilisateurs $utilisateurs) : bool{
        $texteRequete = "UPDATE utilisateurs
        SET type = :type WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":type", $utilisateurs->getType());
        $pdostatement->bindValue(":id", $utilisateurs->getId());
        
        return $pdostatement->execute();
    }

    public static function deleteUtilisateurs(Utilisateurs $utilisateurs){
        return self::pdo()->exec("DELETE FROM utilisateurs WHERE id=" . $utilisateurs->getId());
    }
    
}

?>
