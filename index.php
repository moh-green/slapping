<?php 

include 'includes/init.inc.php';

gererSession();
var_dump($_SESSION);
var_dump($_SESSION['pseudo']);

use Controleurs\CompteControleur;
$utilisateursControleur = new CompteControleur;

if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
    $utilisateursControleur->creeCompte($_POST['pseudo'], $_POST['email'], $_POST['mdp']);
}

if(isset($_POST['email']) && isset($_POST['mdp'])) {
    $utilisateursControleur->connexion();
}

$estConnecte = $utilisateursControleur->estConnecte();
if (isset($_POST['action']) && $_POST['action'] === "deconnexion") {
    $utilisateursControleur->deconnexion();
}


?>

<!DOCTYPE html>
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
</head>

<body>
    <header>
        <img src="assets/img/logo.png" alt="logo de Slapping" id="logo">
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="video.php">Vidéos</a></li>
                <li><a href="short.php">Short</a></li>
                <li><a href="actualite.php">Actualités</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if($estConnecte) { ?> 
                    <li>
                        <form method="post">
                            <input type="hidden" name="action" value="deconnexion">
                            <button type="submit" class="deconnexionBtn" >Déconnexion</button>
                        </form>
                <?php } else { ?>
                    <form>
                        <a class="connexionPopup" data-popup="#popup-1">Connexion</a>
                    </form>
                <?php } ?>
                <?php if($estConnecte && isset($_SESSION['pseudo'])) { ?> 
                    <p>Bonjour <?= $_SESSION['pseudo'] ?></p>
                <?php } ?>
            </ul>
        </nav>
    </header>
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
        <section id="nouveaute">
            <h2>Nouveautés</h2>
            <article id="nouveaute-video">
                <iframe width="500" height="250"  src="https://www.youtube.com/embed/Po1jR-9eNOQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe width="500" height="250" src="https://www.youtube.com/embed/3HwWcPD8MDI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe width="500" height="250" src="https://www.youtube.com/embed/vETp_zL0tFg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </article>
            <?php if($estConnecte) { ?> 
                <?php } else { ?>
                    <p><strong id="connexion-btn" class="connexionPopup" data-popup="#popup-1">Connectez-vous</strong> ou <strong id="inscription-btn" class="inscriptionPopup" data-popup="#popup-2">inscrivez-vous</strong> gratuitement pour voir toutes les vidéos</p>
                <?php } ?>
        </section>
        <section id="short">
            <iframe width="259" height="480" src="https://youtube.com/embed/jG5mmQHOBRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="259" height="480" src="https://youtube.com/embed/jG5mmQHOBRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="259" height="480" src="https://youtube.com/embed/lt-5jNt3vcI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="259" height="480" src="https://youtube.com/embed/y5AaEijuogU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="259" height="480" src="https://youtube.com/embed/KJMkBVaAV8g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </section>
        <section id="contenu">
            <section id="contenu-video">
                <article>
                    <h2>Music></h2>
                    <div>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
                <article>
                    <h2>Sport></h2>
                    <div>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
                <article>
                    <h2>Humour></h2>
                    <div>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
                <article>
                    <h2>Mode></h2>
                    <div>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <iframe width="350" height="175" src="https://www.youtube.com/embed/v8uDm8s3ewc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </article>
            </section>
            <aside id="contenu-actualite">
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
            </aside>
        </section>
    </main>
    <footer>
        <p>LE FOOTER </p>
    </footer>
<<<<<<< HEAD
=======
    <section id="connexion" class="display-none">
        
    </section>
>>>>>>> 42b668b87e800e2c5ad29d6b903680655cb02965
    <script src="assets/js/script.js"></script>
    </body>
</html>