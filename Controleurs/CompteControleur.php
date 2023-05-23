<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Compte;


class CompteControleur{
    public function connexion(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $compte = new Compte(null, null, null, $email, null, $mdp);
            $resultat = Bdd::getConnexion($compte);
            if ($resultat != null && password_verify($mdp, $resultat->getMdp())) {
                session_start();
                $_SESSION['id'] = $resultat->getId();
                header('Location: index.php');
                exit();
            } else {
                echo "Nom d'utilisateur ou mot de passe invalide.";
            }
        }
    }

    public function creeCompte($nom, $prenom, $email, $mdp) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Email invalide
                // Gérer l'erreur, afficher un message à l'utilisateur, etc.
            } elseif (empty($email) || empty($mdp) || empty($prenom) || empty($nom)) {
                // Données manquantes
                // Gérer l'erreur, afficher un message à l'utilisateur, etc.
            } else {
                $userExists = Bdd::checkEmail($email);
                if ($userExists) {
                    // Utilisateur existant avec la même adresse email
                    // Gérer l'erreur, afficher un message à l'utilisateur, etc.
                } else {
                    Bdd::creeCompte($nom, $prenom, $email, $mdp);
                    header('Location: index.php');
                    exit();
                }
            }
        }
    }
    
    public function deconnexion(){
        session_start();
        if (isset($_SESSION['id'])) {
            unset($_SESSION['id']);
        }
        header('Location: index.php');
        exit();
    }

    public function estConnecte(){
        return isset($_SESSION['id']);
    }
}

?>
