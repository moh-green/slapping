<?php 

namespace Modeles;
use PDO;

use Modeles\Entites\Actualites;
use Modeles\Entites\Video;
use Modeles\Entites\Shorts;
use Modeles\Entites\Utilisateurs;
use Modeles\Entites\Authentification;

abstract class Bdd {
    public static function pdo(){
        return new PDO("mysql:host=localhost:3306;dbname=slapping", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT ]);
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
}

?>