<?php
class BurgerMenu
{
    public function __construct($connexionState)
    {
        echo '<div id="burger-menu">
                    <img src="assets/img/burger-menu-decoration.svg" id="menu-decoration">
                    <div id="burger-nav">
                        <!-- logo -->
                        <img src="assets/img/logo.png" alt="logo de Slapping" id="logo">
                        <a id="burger-menu-close" href="#">
                            <img src="assets/img/close.svg" alt="close menu" id="menu-close-icon">
                        </a>
                    </div>
                    <ul class="title" id="nav-list-burger">
                        <li><a href="index.php" class="active-nav">Accueil</a></li>
                        <li><a href="video.php">Vidéos</a></li>
                        <li><a href="short.php">Short</a></li>
                        <li><a href="actualite.php">Actualités</a></li>
                        <li><a href="contact.php">À propos</a></li>
                        <li>' . $connexionState . '</li>
                    </ul>
                </div>';
    }
}
