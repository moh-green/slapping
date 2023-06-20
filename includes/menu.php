<?php
class BurgerMenu
{
    public function __construct($connexionState)
    {
        echo '<div id="burger-menu">
        <div id="burger-nav">
            <!-- logo -->
            <img src="assets/img/logo.png" alt="logo de Slapping" id="logo">
            <div id="burger-menu-close">
                <img src="assets/img/close.svg" alt="close menu">
            </div>
            <ul class="title" id="nav-list">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="video.php">Vidéos</a></li>
                <li><a href="short.php">Short</a></li>
                <li><a href="actualite.php">Actualités</a></li>
                <li><a href="contact.php">À propos</a></li>
                ' . $connexionState . '
            </ul>
        </div>
    </div>';
    }
}
