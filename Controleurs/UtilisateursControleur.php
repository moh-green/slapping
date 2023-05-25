<?php 

namespace Controleurs;
use Modeles\Bdd;
use Modeles\Entites\Utilisateurs;

class UtilisateursControleur{
    public function liste () {
        $utilisateurs = new Utilisateurs();
        $utilisateurs = Bdd::select("utilisateurs");
        affichage("utilisateurs/liste.html.php", ["utilisateurs" => $utilisateurs]);
    }
    
    public function modifier($id){
        try {
            $utilisateurs = Bdd::selectById("utilisateurs", $id);
            if($_POST){
                $rank = $_POST["type"] ?? null;
                if (empty($erreurs)) {
                    $utilisateurs->setType($rank);
                    $resultat = Bdd::updateUtilisateursBack($utilisateurs);
                    if ($resultat) {
                        redirection(lien(("utilisateurs")));
                    } else {
                        echo "Erreur lors de la modification un truc ne vas pas.";
                    }
                }
            }
            affichage("utilisateurs/modifier.html.php", ["utilisateurs" => $utilisateurs]);

        } catch (\Throwable $th) {
            echo "Erreur lors de la modification un truc ne vas pas.";
        }
    }
    
    public function supprimer($id){
        if ($id) {
            if (is_numeric($id)) {
                $utilisateurs = Bdd::selectById("utilisateurs", $id);
                if ($utilisateurs) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (Bdd::deleteUtilisateurs($utilisateurs) == 1) {
                            redirection(lien("utilisateurs"));
                        }
                    }
                } else {
                    redirection(lien("utilisateurs"));
                }
            }
        }
        affichage("utilisateurs/suppression.html.php", ["utilisateurs" => $utilisateurs]);
    }
}

?>