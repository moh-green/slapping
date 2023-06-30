<?php
include 'includes/init.inc.php';
include 'includes/header.php';
include 'includes/nav.php';
include 'includes/footer.php';
include 'includes/menu.php';

new Head('<link rel="stylesheet" href="assets/css/short.min.css">');



session_start();

use Controleurs\CompteControleur;

$utilisateursControleur = new CompteControleur;
$estConnecte = $utilisateursControleur->estConnecte();

use Controleurs\VideoControleur;

$videos = new VideoControleur;
$listeVideoSearch = array();

if (!isset($_SESSION['categorie-video'])) {
    $_SESSION['categorie-video'] = '';
}

if ($_SESSION['categorie-video'] == 'music') {
    $listeVideo = $videos->filtrerCategorie('music');
} elseif ($_SESSION['categorie-video'] == 'sport') {
    $listeVideo = $videos->filtrerCategorie('sport');
} elseif ($_SESSION['categorie-video'] == 'business') {
    $listeVideo = $videos->filtrerCategorie('business');
} else {
    $listeVideo = $videos->listeUser();
}



if (isset($_POST['musique'])) {
    if ($_SESSION['categorie-video'] == 'music') {
        $listeVideo = $videos->listeUser();
        $_SESSION['categorie-video'] = '';
    } else {
        $listeVideo = $videos->filtrerCategorie('music');
        $_SESSION['categorie-video'] = 'music';
    }
} elseif (isset($_POST['sport'])) {
    if ($_SESSION['categorie-video'] == 'sport') {
        $listeVideo = $videos->listeUser();
        $_SESSION['categorie-video'] = '';
    } else {
        $listeVideo = $videos->filtrerCategorie('sport');
        $_SESSION['categorie-video'] = 'sport';
    }
} elseif (isset($_POST['business'])) {
    if ($_SESSION['categorie-video'] == 'business') {
        $listeVideo = $videos->listeUser();
        $_SESSION['categorie-video'] = '';
    } else {
        $listeVideo = $videos->filtrerCategorie('business');
        $_SESSION['categorie-video'] = 'business';
    }
} elseif (isset($_POST['all'])) {
    $listeVideo = $videos->listeUser();
    $_SESSION['categorie-video'] = '';
} elseif (isset($_POST['search'])) {
    $listeVideoSearch = $videos->searchVideo();
}

$videos_par_page = 2;
// calculer le nombre total de pages pour les shorts
$pages_videos = ceil(count($listeVideo) / $videos_par_page);

// récupérer le numéro de page à afficher pour les shorts
$page_videos = isset($_GET['page_videos']) ? $_GET['page_videos'] : 1;

// déterminer les indices de début et de fin pour les shorts à afficher sur la page courante
$debut_videos = ($page_videos - 1) * $videos_par_page;
$fin_videos = $debut_videos + $videos_par_page - 1;
?>

<body>
    <?php
    new BurgerMenu(true);
    new NavBar($connexion_text, $estConnecte);
    ?>
    <header>
        <div id="filters-container">
            <article id="filter">
                <form method="post" action="video.php">
                    <input class="btn-filter" type="submit" name="all" value="Tous">|
                    <input class=" <?php echo $music = ($_SESSION['categorie-video'] == 'music') ? "cliked" : "btn-filter" ?>" type="submit" name="musique" value="Musique">|
                    <input class=" <?php echo $sport = ($_SESSION['categorie-video'] == 'sport') ? "cliked" : "btn-filter"  ?>" type="submit" name="sport" value="Sport">|
                    <input class=" <?php echo $business = ($_SESSION['categorie-video'] == 'business') ? "cliked" : "btn-filter"  ?>" type="submit" name="business" value="Business">
                </form>
                <form action="video.php" method="post" class="search-bar">
                    <label for="search"></label>
                    <input type="text" name="search" id="search" required class="search-bar-input">
                    <button type="submit" class="fa fa-search">

                    </button>
                </form>
            </article>
        </div>
    </header>
    <main>
        <article>
            <div>
                <?php
                if (isset($_POST['search'])) {
                    foreach ($listeVideoSearch as $result) {
                        if ($estConnecte) {
                ?>
                            <iframe width="500" height="250" src="<?php echo $result['lien'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <?php
                        } else {
                            if ($result['private'] == TRUE) {
                            ?>
                                <div>
                                    <iframe width="500" height="250" src="<?php echo $result['lien'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="blur"></div>
                                    <img src="assets/img/lock.png" alt=" une image de cadena">
                                </div>
                            <?php
                            } else {
                            ?>
                                <iframe width="500" height="250" src="<?php echo $result['lien'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php
                            }
                        }
                    }
                } else {
                    ?>
                    <?php for ($i = $debut_videos; $i <= $fin_videos && $i < count($listeVideo); $i++) : ?>
                        <?php $video = $listeVideo[$i];
                        if ($estConnecte) {
                        ?>
                            <iframe width="500" height="250" src="<?php echo $video->getLien() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php
                        } else {
                            if ($video->getPrivate() == TRUE) {
                            ?>
                                <div>
                                    <iframe width="500" height="250" src="<?php echo $video->getLien() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="blur"></div>
                                    <img src="assets/img/lock.png" alt=" une image de cadena">
                                </div>
                            <?php
                            } else {
                            ?>
                                <iframe width="500" height="250" src="<?php echo $video->getLien() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php
                            }
                        }
                        ?>
                <?php endfor;
                } ?>

            </div>
        </article>

        <nav aria-label="Pagination">
            <ul id="page-num">
                <?php if ($page_videos > 1) : ?>
                    <li>
                        <a href="<?= '?controleur=videos&page_videos=' . ($page_videos - 1) ?>">Précédent</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pages_videos; $i++) : ?>
                    <li class="page-item <?= ($i == $page_videos) ? 'active' : '' ?>">
                        <a href="<?= '?controleur=videos&page_videos=' . $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page_videos < $pages_videos) : ?>
                    <li>
                        <a href="<?= '?controleur=videos&page_videos=' . ($page_videos + 1) ?>">Suivant</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </main>
    <?php
    new Footer();
    ?>
</body>

</html>