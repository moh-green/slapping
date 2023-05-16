<?php 

namespace Controleurs;

use Modeles\Bdd;

class HomeControleur {
    public function liste(){
        $actu = Bdd::select("actualites");
        $shorts = Bdd::select("shorts");
        $video = Bdd::select("video");
        $utilisateurs = Bdd::select("utilisateurs");
        affichage("home/liste.html.php", ["actualites" => $actu, "video" => $video, "shorts" => $shorts, "utilisateurs" => $utilisateurs]);
    }
}