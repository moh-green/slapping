<?php
session_start();
include 'includes/init.inc.php';
include 'includes/header.php';
include 'includes/nav.php';
include 'includes/footer.php';
include 'includes/menu.php';

new Head('<link rel="stylesheet" href="assets/css/short.min.css">');

use Controleurs\ShortsControleur;

$shorts = new ShortsControleur;
$listeShortSearch = array();
if (!isset($_SESSION['categorie-short'])) {
    $_SESSION['categorie-short'] = '';
}

if ($_SESSION['categorie-short'] == 'music') {
    $listeShort = $shorts->filtrerCategorie('music');
} elseif ($_SESSION['categorie-short'] == 'sport') {
    $listeShort = $shorts->filtrerCategorie('sport');
} elseif ($_SESSION['categorie-short'] == 'business') {
    $listeShort = $shorts->filtrerCategorie('business');
} else {
    $listeShort = $shorts->listeUser();
}



if (isset($_POST['musique'])) {
    if ($_SESSION['categorie-short'] == 'music') {
        $listeShort = $shorts->listeUser();
        $_SESSION['categorie-short'] = '';
    } else {
        $listeShort = $shorts->filtrerCategorie('music');
        $_SESSION['categorie-short'] = 'music';
    }
} elseif (isset($_POST['sport'])) {
    if ($_SESSION['categorie-short'] == 'sport') {
        $listeShort = $shorts->listeUser();
        $_SESSION['categorie-short'] = '';
    } else {
        $listeShort = $shorts->filtrerCategorie('sport');
        $_SESSION['categorie-short'] = 'sport';
    }
} elseif (isset($_POST['business'])) {
    if ($_SESSION['categorie-short'] == 'business') {
        $listeShort = $shorts->listeUser();
        $_SESSION['categorie-short'] = '';
    } else {
        $listeShort = $shorts->filtrerCategorie('business');
        $_SESSION['categorie-short'] = 'business';
    }
} elseif (isset($_POST['all'])) {
    $listeShort = $shorts->listeUser();
    $_SESSION['categorie-short'] = '';
} elseif (isset($_POST['search'])) {
    $listeShortSearch = $shorts->searchShort();
}


$shorts_par_page = 2;
// calculer le nombre total de pages pour les shorts
$pages_shorts = ceil(count($listeShort) / $shorts_par_page);

// récupérer le numéro de page à afficher pour les shorts
$page_shorts = isset($_GET['page_shorts']) ? $_GET['page_shorts'] : 1;

// déterminer les indices de début et de fin pour les shorts à afficher sur la page courante
$debut_shorts = ($page_shorts - 1) * $shorts_par_page;
$fin_shorts = $debut_shorts + $shorts_par_page - 1;

?>

<body>
    <?php
    new BurgerMenu(true);
    new NavBar(false, true);
    ?>
    <header>
        <div id="filters-container">
            <article id="filter">
                <form method="post" action="short.php">
                    <input class="btn-filter" type="submit" name="all" value="Tous">|
                    <input class=" <?php echo $music = ($_SESSION['categorie-short'] == 'music') ? "cliked" : "btn-filter" ?>" type="submit" name="musique" value="Musique">|
                    <input class=" <?php echo $sport = ($_SESSION['categorie-short'] == 'sport') ? "cliked" : "btn-filter"  ?>" type="submit" name="sport" value="Sport">|
                    <input class=" <?php echo $business = ($_SESSION['categorie-short'] == 'business') ? "cliked" : "btn-filter"  ?>" type="submit" name="business" value="Business">
                </form>
                <form action="short.php" method="post" class="search-bar">
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
                    foreach ($listeShortSearch as $result) {
                ?>
                        <iframe width="259" height="480" src="<?php echo $result['lien'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php
                    }
                } else {
                    ?>
                    <?php for ($i = $debut_shorts; $i <= $fin_shorts && $i < count($listeShort); $i++) : ?>
                        <?php $short = $listeShort[$i]; ?>
                        <iframe width="259" height="480" src="<?php echo $short->getLien() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php endfor;
                } ?>
            </div>
        </article>
        <?php if (!isset($_POST['search'])) {
        ?>
            <nav aria-label="Pagination">
                <ul id="page-num">
                    <?php if ($page_shorts > 1) : ?>
                        <li>
                            <a href="<?= '?controleur=shorts&page_shorts=' . ($page_shorts - 1) ?>">◀</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $pages_shorts; $i++) : ?>
                        <li class="page-item <?= ($i == $page_shorts) ? 'active' : '' ?>">
                            <a href="<?= '?controleur=shorts&page_shorts=' . $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page_shorts < $pages_shorts) : ?>
                        <li>
                            <a href="<?= '?controleur=shorts&page_shorts=' . ($page_shorts + 1) ?>">▶</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>

        <?php
        }
        ?>
    </main>
    <?php
    new Footer();
    ?>
</body>

</html>