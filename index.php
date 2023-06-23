<?php

include 'includes/init.inc.php';
include 'includes/header.php';
include 'includes/nav.php';
include 'includes/footer.php';
include 'includes/menu.php';

gererSession();
// var_dump($_SESSION);
// var_dump($_SESSION['pseudo']);

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

<body duration="250" easing="ease-out" anchorPlacement="bottom-bottom" once="false" mirror="true">
    <?php

    if ($estConnecte) {
        $connexion_text = '
        <form method="post">
            <input type="hidden" name="action" value="deconnexion">
            <button type="submit" class="deconnexionBtn">Déconnexion</button>
        </form>';
    } else {
        $connexion_text = '
        <li class="nav-btn"><img src="assets/img/account.svg" alt="connexion">
        <form>
        <a class="connexionPopup" data-popup="#popup-1">Connection</a>
        </form></li>
        <li class="nav-btn nav-btn__full"><form>
        <a class="connexionPopup" data-popup="#popup-2">Inscription</a>
        </form></li>';
    }
    if ($estConnecte && isset($_SESSION['pseudo'])) {
        $connexion_text += '
    <p>Bonjour ' . $_SESSION['pseudo'] . ' </p>';
    }
    new BurgerMenu($connexion_text);
    new NavBar($connexion_text, $estConnecte);
    ?>

    <main>
        <div class="popup" id="popup-1">
            <div class="popupContent">
                <button class="close btn">
                    <p> &times;</p>
                </button>
                <div class="divConnexion">
                    <form method="post" enctype="multipart/form-data">
                        <div class="titre">
                            <h2>Bienvenue,</h2>
                            <p>connectez-vous pour continuer</p>
                            <input type="email" placeholder="Votre Email" name="email" class="input">
                            <input type="password" placeholder="Votre Mot de Passe" name="mdp" class="input">
                            <div class="btn-connexion">
                                <button type="submit btn" class="btn">
                                    <p>Se connecter</p>
                                </button>
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
                <button class="close btn">
                    <p>&times;</p>
                </button>
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
                                <button type="submit btn" class="btn">
                                    <p>S'inscrire</p>
                                </button>
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
                <button class="close btn">
                    <p>&times;</p>
                </button>
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
                                <button type="submit btn" class="btn" name="inscription">
                                    <p>S'inscrire</p>
                                </button>
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
                <iframe class="video" max-width="500" max-height="250" src="https://www.youtube.com/embed/Po1jR-9eNOQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe class="video" max-width="500" max-height="250" src="https://www.youtube.com/embed/3HwWcPD8MDI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe class="video" max-width="500" max-height="250" src="https://www.youtube.com/embed/vETp_zL0tFg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </article>
            <button class="btn btn__darkblue ">
                <p>Voir plus</p>
            </button>
        </section>
        <section class="preview-layout" id="short">
            <div data-aos="fade-up" class="title big-title aos-init aos-animate" id="short-title">
                <h2>Shorts</h2>
            </div>
            <article data-aos="fade-up" class="horizontal-list carousel aos-init aos-animate">
                <ul class="carousel__list">
                    <li class="carousel__item " data-pos="-2">
                        <iframe class="short" width="100%" height="100%" src="https://youtube.com/embed/jG5mmQHOBRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li class="carousel__item" data-pos="-1">
                        <iframe class="short" width="100%" height="100%" src="https://youtube.com/embed/jG5mmQHOBRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li class="carousel__item" data-pos="0">
                        <iframe class="short" width="100%" height="100%" src="https://youtube.com/embed/lt-5jNt3vcI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li class="carousel__item" data-pos="1">
                        <iframe class="short" width="100%" height="100%" src="https://youtube.com/embed/y5AaEijuogU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li class="carousel__item" data-pos="2">
                        <iframe class="short" width="100%" height="100%" src="https://youtube.com/embed/KJMkBVaAV8g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                </ul>
            </article>
            <a href="short.php" class="btn btn__darkblue">
                <p>Voir plus</p>
            </a>
        </section>
        <section class="preview-layout" id="video">
            <div class="decorations">
                <img class="decorations-right" src="assets/img/round-decoration-right.svg" alt="">
                <img class="decorations-left" src="assets/img/decoration-left.svg" alt="">
            </div>
            <div data-aos="fade-up" class="title big-title aos-init aos-animate" id="video-title" style="display: none">
                <h2>Vidéos</h2>
            </div>
            <div class="content-list" id="contenu-video">
                <article class="vertical-list">
                    <div data-aos="fade-up" class="title big-title aos-init aos-animate">
                        <h3>Music</h3>
                    </div>
                    <div data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
                <article class="vertical-list">
                    <div data-aos="fade-up" class="title big-title aos-init aos-animate">
                        <h3>Sport</h3>
                    </div>
                    <div data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
                <article class="vertical-list">
                    <div data-aos="fade-up" class="title big-title aos-init aos-animate">
                        <h3>Humour</h3>
                    </div>
                    <div data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe class="video preview" max-width="100%" max-height="100%" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
            </div>
            <a href="video.php" class="btn btn__darkblue section-bottom">
                <p>Voir plus</p>
            </a>
        </section>
        <section class="preview-layout" id="actualite">
            <div data-aos="fade-up" class="title big-title aos-init aos-animate" id="actualite-title">
                <h2>Actualités</h2>
            </div>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</h3>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a href="actualite.php" class="btn btn__yellow">Voir plus</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur etur adipisicing elit. Qu adipisicing elit. Quisquam, voluptatum.</h3>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a href="actualite.php" class="btn btn__yellow">Voir plus</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consecelit. Qui voluptatum.</h3>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a href="actualite.php" class="btn btn__yellow">Voir plus</a>
                </div>
            </article>
            <article data-aos="fade-up" class="horizontal-list aos-init aos-animate">
                <div class="actu-image">
                    <img src="assets/img/miniature.jpg" alt="">
                </div>
                <div class="actu-text">
                    <h3>lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</h3>
                    <h4>
                        <time datetime="2018-07-07">2018/07/07</time>
                    </h4>
                    <a href="actualite.php" class="btn btn__yellow">Voir plus</a>
                </div>
            </article>
        </section>
        <section id="create-account">
            <div class="decorations">
                <img class="decorations-right" src="assets/img/thread.svg" alt="">
            </div>
            <h2 data-aos="fade-up" class="title aos-init aos-animate">Connecte toi pour accéder à <br> tous les contenus</h2>
            <div class="horizontal-list">
                <a class="btn btn__darkblue" data-popup="#popup-1">Se connecter</a>
                <a class="btn btn__darkblue--filled" data-popup="#popup-2">S'inscrire</a>
            </div>
        </section>
    </main>
    <?php
    new Footer();
    ?>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/carousel.js"></script>
</body>

</html>