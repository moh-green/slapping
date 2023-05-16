<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Shorts;

class ShortsControleur{
    public function liste(){
        $shorts = Bdd::select("shorts");
        affichage("shorts/liste.html.php", ["shorts" => $shorts]);
    }
}

?>