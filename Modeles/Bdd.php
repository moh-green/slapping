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
    public static function selectByGenre(string $table, $genre){
        $pdostatement = self::pdo()->query("SELECT * FROM $table WHERE genre = '" . $genre . "'");
        return $pdostatement->fetchAll(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table) );       
    }

    public static function selectById(string $table, int $id){
        $pdostatement = self::pdo()->query("SELECT * FROM $table WHERE id = " . $id);
        $pdostatement->setFetchMode(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table));
        return $pdostatement->fetch();
    }

    public static function search($search) {
        $search = '%' . $search . '%';
        $results = array();
    
        // Recherche dans la table "utilisateurs"
        $pdostatement = self::pdo()->prepare("
            SELECT id, pseudo, email, 'utilisateurs' AS search, type
            FROM utilisateurs
            WHERE pseudo LIKE :search OR email LIKE :search
        ");
        $pdostatement->bindValue(":search", $search);
        $pdostatement->execute();
        $results = array_merge($results, $pdostatement->fetchAll(PDO::FETCH_ASSOC));
    
        // Recherche dans la table "video"
        $pdostatement = self::pdo()->prepare("
            SELECT id, nom, genre, lien, 'video' AS search
            FROM video
            WHERE nom LIKE :search OR genre LIKE :search
        ");
        $pdostatement->bindValue(":search", $search);
        $pdostatement->execute();
        $results = array_merge($results, $pdostatement->fetchAll(PDO::FETCH_ASSOC));
    
        // Recherche dans la table "shorts"
        $pdostatement = self::pdo()->prepare("
            SELECT id, nom, genre, lien, 'shorts' AS search
            FROM shorts
            WHERE nom LIKE :search OR genre LIKE :search
        ");
        $pdostatement->bindValue(":search", $search);
        $pdostatement->execute();
        $results = array_merge($results, $pdostatement->fetchAll(PDO::FETCH_ASSOC));
    
        // Recherche dans la table "actualites"
        $pdostatement = self::pdo()->prepare("
            SELECT id, titre, soustitre, texte, miniature, alt, 'actualites' AS search
            FROM actualites
            WHERE titre LIKE :search OR soustitre LIKE :search OR texte LIKE :search
        ");
        $pdostatement->bindValue(":search", $search);
        $pdostatement->execute();
        $results = array_merge($results, $pdostatement->fetchAll(PDO::FETCH_ASSOC));
    
        return $results;
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

    public static function searchVideos($search){
        $search = '%' . $search . '%';
        $texteRequete = "SELECT * FROM video WHERE nom LIKE :search OR genre LIKE :search";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":search", $search);
        $pdostatement->execute();

        return $pdostatement->fetchAll();
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

    public static function creeCompte($pseudo, $email, $mdp, $cle){
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $requete = self::pdo()->prepare("INSERT INTO utilisateurs (pseudo, email, mdp, cle, confirmer) 
                         VALUES (:pseudo, :email, :mdp, :cle, 0)");
        $requete->bindValue(":pseudo", $pseudo);
        $requete->bindValue(":email", $email);
        $requete->bindValue(":mdp", $hash);
        $requete->bindValue(":cle", $cle);

        return $requete->execute();

    }
    
    public static function getConnexion(Compte $compte){
        $requete = self::pdo()->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $requete->execute([$compte->getEmail()]);
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        
        if ($resultat !== false) {
            $hashedPassword = $resultat['mdp'];
            if (password_verify($compte->getMdp(), $hashedPassword)) {
                if ($resultat['confirmer'] == 1) {
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['pseudo'] = $resultat['pseudo'];
                    $_SESSION['email'] = $resultat['email'];
                    $_SESSION['type'] = $resultat['type'];
                    
                    return new Compte($resultat['id'], $resultat['confirmer'], $resultat['pseudo'], $resultat['email'], $resultat['type'], $hashedPassword, $resultat['cle']);
                } else {
                    // Compte non confirmé
                    return new Compte($resultat['id'], $resultat['confirmer'], $resultat['pseudo'], $resultat['email'], $resultat['type'], $hashedPassword, $resultat['cle']);
                }
            } else {
                // Mot de passe invalide
                return null;
            }
        }
        
        // Nom d'utilisateur ou mot de passe invalide
        return null;
    }
    
    
    public static function checkPseudo($pseudo){
        $requete = self::pdo()->prepare('SELECT COUNT(*) FROM utilisateurs WHERE pseudo = :pseudo');
        $requete->bindValue(":pseudo", $pseudo);
        $requete->execute();
        $count = $requete->fetchColumn();
        return $count > 0;
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
    
    public static function recupUtilisateur($email){
        $requete = self::pdo()->prepare('SELECT id FROM utilisateurs WHERE email = ?');
        $requete->bindValue(":email", $email);
        $requete->execute([$email]);
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
    
        if ($resultat !== false) {
            return $resultat['id'];
        }
        
        return null;
    }   

    public static function confirmerCompte($id, $cle){
        $texteRequete = self::pdo()->prepare("UPDATE utilisateurs SET confirmer = 1 WHERE id = :id AND cle = :cle");
        $texteRequete->bindValue(":id", $id);
        $texteRequete->bindValue(":cle", $cle);
        
        return $texteRequete->execute();
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
