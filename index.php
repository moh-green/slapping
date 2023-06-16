<?php

include 'includes/init.inc.php';
include 'includes/header.php';
include 'includes/nav.php';

gererSession();
var_dump($_SESSION);
var_dump($_SESSION['pseudo']);

use Controleurs\CompteControleur;

$utilisateursControleur = new CompteControleur;

if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
    $utilisateursControleur->creeCompte($_POST['pseudo'], $_POST['email'], $_POST['mdp']);
}

if (isset($_POST['email']) && isset($_POST['mdp'])) {
    $utilisateursControleur->connexion();
}

$estConnecte = $utilisateursControleur->estConnecte();
if (isset($_POST['action']) && $_POST['action'] === "deconnexion") {
    $utilisateursControleur->deconnexion();
}

?>


<!-- <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slapping - Le média qui claque</title>
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Sigmar+One&display=swap" rel="stylesheet">
</head> -->

<body>
    <!-- <header>
        <nav>
            <div class="nav-container">
                <div class="logo-container">
                    <img src="assets/img/logo.png" alt="logo de Slapping" id="logo">
                </div>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="video.php">Vidéos</a></li>
                    <li><a href="short.php">Short</a></li>
                    <li><a href="actualite.php">Actualités</a></li>
                    <li><a href="contact.php">À propos</a></li> -->

    <?php

    if ($estConnecte) {
        $connexion_text = '
        <li>
        <form method="post">
            <input type="hidden" name="action" value="deconnexion">
            <button type="submit" class="deconnexionBtn">Déconnexion</button>
        </form>
    </li>';
    } else {
        $connexion_text = '
        <li>
        <form>
        <a class="connexionPopup call-to-action" data-popup="#popup-1">Connexion</a>
        </form>
    </li>';
    }
    if ($estConnecte && isset($_SESSION['pseudo'])) {
        $connexion_text += '
    <p>Bonjour ' . $_SESSION['pseudo'] . ' </p>';
    }
    new NavBar($connexion_text, $estConnecte);
    ?>
    <!-- </ul>
            </div>
        </nav>
    </header> -->



    <main>
        <div class="popup" id="popup-1">
            <div class="popupContent">
                <button class="close">&times;</button>
                <div class="divConnexion">
                    <form method="post" enctype="multipart/form-data">
                        <div class="titre">
                            <h2>Bienvenue,</h2>
                            <p>connectez-vous pour continuer</p>
                            <input type="email" placeholder="Votre Email" name="email" class="input">
                            <input type="password" placeholder="Votre Mot de Passe" name="mdp" class="input">
                            <div class="btn-connexion">
                                <button type="submit" class="btn">Se connecter</button>
                            </div>
                            <div>
                                <p>Vous n'avez pas de compte ? <strong id="inscription-btn" class="inscriptionPopup">Inscrivez-vous</strong></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="popup" id="popup-2">
            <div class="popupContent">
                <button class="close">&times;</button>
                <div class="divInscription">
                    <form method="post" enctype="multipart/form-data">
                        <div class="titre">
                            <h2>Bienvenue,</h2>
                            <p>inscrivez-vous pour continuer</p>
                            <input type="text" placeholder="Votre Pseudo" name="pseudo" class="input">
                            <input type="email" placeholder="Votre Email" name="email" class="input">
                            <input type="password" placeholder="Votre Mot de Passe" name="mdp" class="input">
                            <input type="password" placeholder="Confirmer votre Mot de Passe" name="confirm_mdp" class="input">
                            <div class="btn-inscription">
                                <button type="submit" class="btn">S'inscrire</button>
                            </div>
                            <div>
                                <p>Vous avez déjà un compte ? <strong id="connexion-btn" class="connexionPopup">Connectez-vous</strong></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="popup" id="popup-2">
            <div class="popupContent">
                <button class="close">&times;</button>
                <div class="divInscription">
                    <form method="post" enctype="multipart/form-data">
                        <div class="titre">
                            <h2>Bienvenue,</h2>
                            <p>inscrivez-vous pour continuer</p>
                            <input type="prenom" placeholder="Votre Prenom" name="prenom" class="input">
                            <input type="nom" placeholder="Votre Nom" name="nom" class="input">
                            <input type="email" placeholder="Votre Email" name="email" class="input">
                            <input type="password" placeholder="Votre Mot de Passe" name="mdp" class="input">
                            <input type="password" placeholder="Confirmer votre Mot de Passe" name="confirm_mdp" class="input">
                            <div class="btn-inscription">
                                <button type="submit" class="btn" name="inscription">S'inscrire</button>
                            </div>
                            <div>
                                <p>Vous avez déjà un compte ? <strong id="connexion-btn" class="connexionPopup">Connectez-vous</strong></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <section class="preview-layout" id="nouveaute">
            <div class="decorations">
                <img class="decorations-right" src="assets/img/decoration-right.svg" alt="">
                <img class="decorations-left" src="assets/img/round-decoration-left.svg" alt="">
            </div>
            <div class="title big-title" id="nouveaute-title">
                <h2>Nouveautés</h2>
            </div>
            <article class="horizontal-list" id="nouveaute-video">
                <iframe max-width="500" max-height="250" src="https://www.youtube.com/embed/Po1jR-9eNOQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe max-width="500" max-height="250" src="https://www.youtube.com/embed/3HwWcPD8MDI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe max-width="500" max-height="250" src="https://www.youtube.com/embed/vETp_zL0tFg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </article>
            <button>
                <p>Voir plus</p>
            </button>
        </section>
        <section class="preview-layout" id="short">
            <div class="title big-title" id="short-title">
                <h2>Shorts</h2>
            </div>
            <article class="horizontal-list">
                <iframe width="259" height="480" src="https://youtube.com/embed/jG5mmQHOBRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="259" height="480" src="https://youtube.com/embed/jG5mmQHOBRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="259" height="480" src="https://youtube.com/embed/lt-5jNt3vcI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="259" height="480" src="https://youtube.com/embed/y5AaEijuogU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="259" height="480" src="https://youtube.com/embed/KJMkBVaAV8g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </article>
            <button>
                <p>Voir plus</p>
            </button>
        </section>
        <section class="preview-layout" id="video">
            <div class="decorations">
                <img class="decorations-right" src="assets/img/round-decoration-right.svg" alt="">
                <img class="decorations-left" src="assets/img/decoration-left.svg" alt="">
            </div>
            <div class="title big-title" id="video-title" style="display: none">
                <h2>Vidéos</h2>
            </div>
            <section class="content-list" id="contenu-video">
                <article class="vertical-list">
                    <div class="title big-title">
                        <h3>Music</h3>
                    </div>
                    <div class="horizontal-list">
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
                <article class="vertical-list">
                    <div class="title big-title">
                        <h3>Sport</h3>
                    </div>
                    <div class="horizontal-list">
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
                <article class="vertical-list">
                    <div class="title big-title">
                        <h3>Humour</h3>
                    </div>
                    <div class="horizontal-list">
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
                <article class="vertical-list">
                    <div class="title big-title">
                        <h3>Mode</h3>
                    </div>
                    <div class="horizontal-list">
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
            </section>
            <button>
                <p>Voir plus</p>
            </button>
        </section>
        <section id="contenu-actualite">
            <h2>Actualités</h2>
            <hr>
            <article>
                <img src="assets/img/miniature.jpg" alt="">
                <div>
                    <h3>article 1</h3>
                    <p>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                </div>
            </article>
            <hr>
            <article>
                <img src="assets/img/miniature.jpg" alt="">
                <div>
                    <h3>le lion est mort ce soir</h3>
                    <p>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                </div>
            </article>
            <hr>
            <article>
                <img src="assets/img/miniature.jpg" alt="">
                <div>
                    <h3>un magnifique article</h3>
                    <p>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                </div>
            </article>
            <hr>
            <article>
                <img src="assets/img/miniature.jpg" alt="">
                <div>
                    <h3>swag</h3>
                    <p>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                </div>
            </article>
        </section>
    </main>
    <footer>
        <p>Slapping - Le média qui claque</p>
        <section>
            <img src="assets/img/facebook.png" alt="">
            <img src="assets/img/instagram.png" alt="">
            <img src="assets/img/youtube.png" alt="">
        </section>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>