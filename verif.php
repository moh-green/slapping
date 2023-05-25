<?php
session_start();

var_dump($_SESSION);

include 'includes/init.inc.php';
use Controleurs\CompteControleur;
$utilisateursControleur = new CompteControleur;

if (isset($_GET['id']) && isset($_GET['cle'])) {
    $id = $_GET['id'];
    $cle = $_GET['cle'];

    $resultat = $utilisateursControleur->recupUtilisateur($email) !== null;

    if ($resultat !== null) {
        $utilisateursControleur->confirmerCompte($id, $cle);
        header('Location: index.php');
        exit();
    } else {
        echo "Utilisateur non trouvé";
    }
} else {
    echo "Paramètres manquants";
}
?>