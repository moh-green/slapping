<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Actualites;
use Modeles\Entites\Video;
use Modeles\Entites\Shorts;
use Modeles\Entites\Utilisateurs;
use Modeles\Entites\Compte;

class HomeControleur {
    public function liste() {
        $results = [];
        $entities = [];
    
        if (!empty($_POST['search'])) {
            $search = $_POST['search'];
            $results = Bdd::search($search);
    
            foreach ($results as $result) {
                $entity = null;
            
                switch ($result['search']) {
                    case 'video':
                        $entity = new Video();
                        $entity->setId($result['id']);
                        $entity->setNom($result['nom']);
                        $entity->setGenre($result['genre']);
                        $entity->setLien($result['lien']);
                        break;
                    case 'shorts':
                        $entity = new Shorts();
                        $entity->setId($result['id']);
                        $entity->setNom($result['nom']);
                        $entity->setGenre($result['genre']);
                        $entity->setLien($result['lien']);
                        break;
                    case 'actualites':
                        $entity = new Actualites();
                        $entity->setId($result['id']);
                        $entity->setTitre($result['titre']);
                        $entity->setSousTitre($result['soustitre']);
                        $entity->setTexte($result['texte']);
                        $entity->setMiniature($result['miniature']);
                        $entity->setAlt($result['alt']);
                        break;
                    case 'utilisateurs':
                        $entity = new Utilisateurs();
                        $entity->setId($result['id']);
                        $entity->setPseudo($result['pseudo']);
                        $entity->setEmail($result['email']);
                        $entity->setType($result['type']);
                        break;
                }
            
                if ($entity !== null) {
                    $entities[] = $entity;
                }
            }
        }
    
        $entite = !empty($entities) ? get_class($entities[0]) : null;
    
        affichage("home/liste.html.php", ["results" => $entities, "entite" => $entite]);
    }
}


