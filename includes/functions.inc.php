<?php

function debug($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function redirection($url) {
    header("Location: $url");
    exit;
}

function affichage($fichier, $variablesVue = []) {

    extract($variablesVue); 
    include "vues/header.html.php";
    include "vues/$fichier";
    include "vues/footer.html.php";    
}

function lien($controleur, $methode = "liste", $id = null){
    return "?controleur=$controleur&methode=$methode" . ($id ? "&id=$id" : "");
}

function access($type){
    if($_SESSION['type'] !== $type){
        redirection('index.php');
    }
}

function gererSession() {
    // Durée de vie de la session en secondes (10 minutes)
    $sessionLifetime = 600;

    // Définit la durée de vie du cookie de session
    session_set_cookie_params($sessionLifetime);

    // Démarre la session
    session_start();

    // Vérifie si l'utilisateur est inactif depuis plus de 10 minutes
    if (isset($_SESSION['lastActivity']) && (time() - $_SESSION['lastActivity']) > $sessionLifetime) {
        // Détruit la session et redirige vers la page de déconnexion
        session_destroy();
        header('Location: logout.php');
        exit();
    }

    // Actualise le délai d'expiration de la session
    session_regenerate_id(true);

    // Met à jour le temps de la dernière activité
    $_SESSION['lastActivity'] = time();
}