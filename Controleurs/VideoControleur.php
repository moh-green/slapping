<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Video;

class VideoControleur{
    public function liste(){
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $videos = $search ? Bdd::searchVideos($search) : Bdd::select("video");
        affichage("video/liste.html.php", ["video" => $videos]);
    
    }

    public function ajouter(){
        if ($_POST) {
            $video = new Video;
            $video->setNom($_POST['nom']);
            $video->setGenre($_POST['genre']);
            $video->setLien($_POST['lien']);
            $resultat = Bdd::insertVideo($video);
            if ($resultat) {
                redirection(lien(("video")));
                exit();
            } else {
                echo "Erreur lors de l'ajout.";
            }
        }
        $video = new Video;
        affichage("video/ajouter.html.php", ["video" => $video]);
    }
    
    public function modifier($id){
        try {
            $video = Bdd::selectById("video", $id);
            if($_POST){
                $nom = $_POST["nom"] ?? null;
                $genre = $_POST["genre"] ?? null;
                $lien = $_POST["lien"];
                
                $video->setNom($nom);
                $video->setGenre($genre);
                $video->setLien($lien);
                
                $resultat = Bdd::updateVideo($video);
                
                if ($resultat) {
                    redirection(lien(("video")));
                    exit();
                } else {
                    echo "Erreur lors de la modification.";
                }
            }
            affichage("video/modifier.html.php", ["video" => $video]);
        } catch (\Throwable $th) {
            echo "Une erreur est survenue : ".$th->getMessage();
        }
    }

    public function supprimer($id){
        if($id) {
            if( is_numeric($id) ) {
                $video = Bdd::selectById("video", $id);
                if($video){
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            if( Bdd::deleteVideo($video) == 1 ) {
                                redirection(lien(("video")));
                        }
                  }
               } else {
                redirection(lien(("video")));
                }
            }
        }
        affichage("video/suppression.html.php", [ "video" => $video ]);
    }

    public function  recupererVideo(){
        $videos = Bdd::select("video");
        return $videos;
    }
}

?>