<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Compte;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class CompteControleur{
    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['mdp'])) {
                $email = $_POST['email'];
                $mdp = $_POST['mdp'];
                $compte = new Compte(null, null, $email, null, $mdp, null, null);
                $resultat = Bdd::getConnexion($compte);
                
                if ($resultat != null) {
                    if ($resultat->getConfirmer() == 1) {
                        if (password_verify($mdp, $resultat->getMdp())) {
                            session_start();
                            $_SESSION['id'] = $resultat->getId();
                            $_SESSION['pseudo'] = $resultat->getPseudo();
                            $_SESSION['type'] = $resultat->getType();
                            header('Location: index.php');
                            exit();
                        } else {
                            echo "Mot de passe incorrect.";
                        }
                    } else {
                        echo "Compte non confirmé.";
                    }
                } else {
                    echo "Nom d'utilisateur ou mot de passe invalide.";
                }
            }
        }
    }
    
    public function creeCompte($pseudo, $email, $mdp){
        $cle = uniqid();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Email invalide
                // Gérer l'erreur, afficher un message à l'utilisateur, etc.
            } elseif (empty($email) || empty($mdp) || empty($pseudo)) {
                // Données manquantes
                // Gérer l'erreur, afficher un message à l'utilisateur, etc.
            } else {
                $userExists = Bdd::checkPseudo($pseudo);
                if ($userExists) {
                    // Utilisateur existant avec la même adresse email
                    // Gérer l'erreur, afficher un message à l'utilisateur, etc.
                } else {
                    $userExists = Bdd::checkEmail($email);

                    if ($userExists) {
                        // Utilisateur existant avec la même adresse email
                        // Gérer l'erreur, afficher un message à l'utilisateur, etc.
                    } else {
                        Bdd::creeCompte($pseudo, $email, $mdp, $cle);
                        $userId = Bdd::recupUtilisateur($email);

                        
                        $mail = new PHPMailer(true);
                            try {
                                //Server settings
                                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                $mail->isSMTP();                                            //Send using SMTP
                                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                $mail->Username   = 'pako1709@gmail.com';                     //SMTP username
                                $mail->Password   = 'hlvzfguebhfsgztk';                               //SMTP password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                                //Recipients
                                $mail->setFrom('pako1709@gmail.com', 'Pako');
                                $mail->addAddress($email, $pseudo);     //Add a recipient

                                //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = 'Email de confirmation de compte sur Slapping';
                                $mail->Body    = 'Veuillez cliquer sur ce lien afin de valider votre inscription : <a href="http://localhost/Slapping/verif.php?id='.$userId.'&cle='.$cle.'">Valider mon compte</a>';

                                $mail->send();
                                echo 'Message has been sent';
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                            
                        header('Location: index.php');
                        exit();
                    }
                }
            }
        }
    }

    public function confirmerCompte($id, $cle){
        $resultat = Bdd::confirmerCompte($id, $cle);
        if ($resultat) {
            echo "Votre compte a bien été confirmé !";
        } else {
            echo "Erreur lors de la confirmation de votre compte...";
        }
    }

    public function recupUtilisateur($email){
        $resultat = Bdd::recupUtilisateur($email);
        if ($resultat !== null) {
            return $resultat;
        } else {
            echo "Utilisateur non trouvé";
        }
    }
    
    public function deconnexion(){
        session_destroy();
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
