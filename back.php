<?php

include "includes/init.inc.php";


use Controleurs\CompteControleur;

session_start();

access('admin');

$authentification = new CompteControleur();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();

if (!$authentification->estConnecte()) {
  header('Location: index.php');
  exit();
}
if (isset($_POST['action']) && $_POST['action'] === "deconnexion") {
    $authentification->deconnexion();
}


$_SESSION['LAST_ACTIVITY'] = time(); 
$methode =     $_GET["methode"] ?? "liste";
$controleur =  $_GET["controleur"] ?? "home";
$id =          $_GET["id"] ?? null;

$nomClasse = "Controleurs\\" . ucfirst($controleur) . "Controleur";
$controleur = new $nomClasse;
$controleur->$methode($id);