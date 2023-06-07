<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Shorts;

class ShortsControleur{
    public function liste(){
        $shorts = Bdd::select("shorts");
        affichage("shorts/liste.html.php", ["shorts" => $shorts]);

    }
    public function listeUser(){
        return $shorts = Bdd::select("shorts");
    }
    public function filtrerCategorie($categorie) {
        return $shorts = Bdd::selectByGenre("shorts" , $categorie);
    }
    public function searchShort(){
        $search = $_POST['search'];
        return $shorts = Bdd::search('shorts', $search);
    }

    public function ajouter(){
        if ($_POST) {
            $shorts = new Shorts;
            $shorts->setNom($_POST['nom']);
            $shorts->setGenre($_POST['genre']);
            $shorts->setLien($_POST['lien']);
            $resultat = Bdd::insertShorts($shorts);
            if ($resultat) {
                redirection(lien(("shorts")));
                exit();
            } else {
                echo "Erreur lors de l'ajout.";
            }
        }

        $shorts = new Shorts;
        include "vues/header.html.php";
        include "vues/shorts/ajouter.html.php";
        include "vues/footer.html.php";
    }

    public function modifier($id){
        try {
            $shorts = Bdd::selectById("shorts", $id);
            if($_POST){
                $nom = $_POST["nom"] ?? null;
                $genre = $_POST["genre"] ?? null;
                $lien = $_POST["lien"];
     
                if( empty($erreurs) ){
                    $shorts->setNom($nom);
                    $shorts->setGenre($genre);
                    $shorts->setLien($lien);
                    if(Bdd::updateShorts($shorts) == 1){
                        redirection(lien("shorts"));
                    } else {
                        $erreurs["generale"] = "Erreur lors de la modification en bdd";
                    }
                }
            }

            include "vues/header.html.php";
            include "vues/shorts/modifier.html.php";
            include "vues/footer.html.php";
        } catch (\Throwable $th) {
            echo "Une erreur est survenue : ".$th->getMessage();
        }
    }

    public function supprimer($id) {
        if ($id) {
            if (is_numeric($id)) {
                $shorts = Bdd::selectById("shorts", $id);
                if ($shorts) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (Bdd::deleteShorts($shorts) == 1) {
                            redirection(lien("shorts"));
                        }
                    }
                } else {
                    redirection(lien("shorts"));
                }
            }
        }
        affichage("shorts/suppression.html.php", ["shorts" => $shorts]);
    } 

    public function recupererShorts(){
        $shorts = Bdd::select("shorts");
        return $shorts;
    }
}

?>