<?php

include "includes/init.inc.php";
// use Controleurs\AuthentificationControleur;

// session_start();

// $authentificationControleur = new AuthentificationControleur();

// // Vérifie la durée depuis la dernière activité
// if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
//     // Détruit la session et redirige l'utilisateur vers la page de connexion
//     session_unset();
//     session_destroy();
//     header("Location: login.php");
//     exit();
// }

// // Met à jour le timestamp de la dernière activité
// $_SESSION['LAST_ACTIVITY'] = time();

// if (!$authentificationControleur->estConnecte()) {
//   header('Location: login.php');
//   exit();
// }
// if (isset($_POST['action']) && $_POST['action'] === "deconnexion") {
//     $authentificationControleur->deconnexion();
// }


// $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
$methode =     $_GET["methode"] ?? "liste";
$controleur =  $_GET["controleur"] ?? "home";
$id =          $_GET["id"] ?? null;

$nomClasse = "Controleurs\\" . ucfirst($controleur) . "Controleur";
/* j'instancie un objet Controleur de manière dynamique ($nomClasse peut avoir n'importe quel nom de classe Controleur) */
$controleur = new $nomClasse;
$controleur->$methode($id);