<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Utilisateurs;

class UtilisateursControleur{
    public function liste(){
        $utilisateurs = Bdd::select("utilisateurs");
        affichage("utilisateurs/liste.html.php", ["utilisateurs" => $utilisateurs]);
    }

    public function connexion($email,$mdp) {
        if (!preg_match('/^[a-zA-Z0-9]+$/', $email)) {
            return false;
        }

        $utilisateurs = new Utilisateurs(null, $email, $mdp);
        $resultat = Bdd::getUtilisateurs($utilisateurs);

        if ($resultat != null && password_verify($mdp, $resultat->getMdp())){
            session_start();
            $_SESSION['utilisateur'] = $resultat;
            header('Location: back.php');
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe invalide.";
        }
    }

    public function deconnexion(){
        unset($_SESSION['utilisateur']);
        header('Location: index.php');
        exit();
    }

    public function estConnecte(){
        return isset($_SESSION['utilisateur']);
    }
}

?>
