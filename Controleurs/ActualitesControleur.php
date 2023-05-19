<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Actualites;

class ActualitesControleur{
    public function liste(){
        $actu = Bdd::select("actualites");
        affichage("actualites/liste.html.php", ["actualites" => $actu]);
    }

    public function ajouter(){
        if ($_POST) {
            $actu = new Actualites;
            $actu->setTitre($_POST['titre']);
            $actu->setSoustitre($_POST['soustitre']);
            $actu->setTexte($_POST['texte']);
            $actu->setAlt($_POST['alt']);
            if(isset($_FILES["miniature"]) && $_FILES["miniature"]["error"] === UPLOAD_ERR_OK){
                $imageContenu = file_get_contents($_FILES["miniature"]["tmp_name"]);
                $actu->setMiniature($imageContenu);
            }
            
            $resultat = Bdd::insertActualites($actu);
            if ($resultat) {
                redirection(lien(("actualites")));
            } else {
                echo "Erreur lors de l'ajout un truc ne vas pas.";
            }
        }

        $actu = new Actualites;
        include "vues/header.html.php";
        include "vues/actualites/ajouter.html.php";
        include "vues/footer.html.php";
    }

    public function modifier($id){
        try {
            $actu = Bdd::selectById("actualites", $id);
            if($_POST){
                $titre = $_POST["titre"] ?? null;
                $soustitre = $_POST["soustitre"];
                $texte = $_POST["texte"] ?? null;
                $alt = $_POST['alt'];
                if(isset($_FILES["miniature"]) && $_FILES["miniature"]["error"] === UPLOAD_ERR_OK){
                    $imageContenu = file_get_contents($_FILES["miniature"]["tmp_name"]);
                    $actu->setMiniature($imageContenu);
                } else {
                    $recuperationImage = Bdd::selectById("actualites", $id);
                    $actu->setMiniature($recuperationImage->getMiniature());
                }

                if (empty($erreurs)) {
                    $actu->setTitre($titre);
                    $actu->setSoustitre($soustitre);
                    $actu->setTexte($texte);
                    $actu->setAlt($alt);
                    if (Bdd::updateActualites($actu) == 1) {
                        redirection(lien("actualites"));
                    } else {
                        echo "Erreur SQL lors de la modification";
                    }
                }
            }
            include "vues/header.html.php";
            include "vues/actualites/modifier.html.php";
            include "vues/footer.html.php";
        } catch (\Throwable $th) {
            echo "Une erreur est survenue : ".$th->getMessage();
        }
    }

    public function supprimer($id) {
        if ($id) {
            if (is_numeric($id)) {
                $actu = Bdd::selectById("actualites", $id);
                if ($actu) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (Bdd::deleteActualites($actu) == 1) {
                            redirection(lien("actualites"));
                        }
                    }
                } else {
                    redirection(lien("actualites"));
                }
            }
        }
        affichage("actualites/suppression.html.php", ["actualites" => $actu]);
    }    

    public function recupererActu(){
        $actu = Bdd::select("actualites");
        return $actu;
    }
}

?>