<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Actualites;

class ActualitesControleur{
    public function liste(){
        $actu = Bdd::select("actualites");
        affichage("actualites/liste.html.php", ["actualites" => $actu]);
    }
}

?>