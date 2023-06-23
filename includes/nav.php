<?php
class NavBar
{
    public function __construct($connexionState, $state)
    {
        echo '<header>';
        if (!$state) {

            echo '<div class="rappel-interaction">
            <p><strong id="connexion-btn" class="connexionPopup" data-popup="#popup-1"><a>Connectez-vous</a></strong> ou <strong id="inscription-btn" class="inscriptionPopup" data-popup="#popup-2"><a>inscrivez-vous</a></strong> gratuitement pour voir toutes les vidéos</p></div>';
        }
        echo '<nav>
                <div class="nav-container">
                    <div class="logo-container">
                        <img src="assets/img/logo.png" alt="logo de Slapping" id="logo">
                    </div>
                    <ul class="title" id="nav-list">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="video.php">Vidéos</a></li>
                        <li><a href="short.php">Short</a></li>
                        <li><a href="actualite.php">Actualités</a></li>
                        <li><a href="contact.php">À propos</a></li>
                        ' . $connexionState . '
                    </ul>
                    <a id="burger-menu-open" href="#burger-menu">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </a>
                </div>
            </nav>
        </header>';
    }
}
