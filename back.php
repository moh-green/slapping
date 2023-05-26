<?php

include "includes/init.inc.php";


use Controleurs\CompteControleur;

gererSession();
access('admin');

$authentification = new CompteControleur();


if (!$authentification->estConnecte()) {
  header('Location: index.php');
  exit();
}
if (isset($_POST['action']) && $_POST['action'] === "deconnexion") {
    $authentification->deconnexion();
}


$methode = $_GET["methode"] ?? "liste";
$controleur = $_GET["controleur"] ?? "home";
$id = $_GET["id"] ?? null;

$nomClasse = "Controleurs\\" . ucfirst($controleur) . "Controleur";
$controleur = new $nomClasse;

if ($methode === "liste" && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $controleur->$methode();
} else {
  $controleur->$methode($id);
}
