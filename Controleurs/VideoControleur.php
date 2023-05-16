<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Video;

class VideoControleur{
    public function liste(){
        $video = Bdd::select("video");
        affichage("video/liste.html.php", ["video" => $video]);
    }
}

?>