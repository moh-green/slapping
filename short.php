<?php 

include 'includes/init.inc.php';

use Controleurs\ShortsControleur;
$shorts = new ShortsControleur;
$listeShort = $shorts->listeUser();
$listeShortSearch = array();
if (isset($_POST['musique'])) {
   $listeShort = $shorts->filtrerCategorie('music');
} elseif (isset($_POST['sport'])) {
   $listeShort = $shorts->filtrerCategorie('sport');
} elseif (isset($_POST['business'])) {
   $listeShort = $shorts->filtrerCategorie('business');
}elseif (isset($_POST['search'])) {
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slapping - short</title>
    <link rel="stylesheet" href="assets/css/short.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Sigmar+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <header>
    <img src="assets/img/logo.png" alt="logo de Slapping" id="logo">
       <nav>
              <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="video.php">Vidéos</a></li>
                <li><a href="short.php" id="header-video">Short</a></li>
                <li><a href="actualite.php">Actualités</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
       </nav> 
       <section>
           <article id="filter">
                <form method="post" action="short.php">
                    <input class="btn-filter" type="submit" name="musique" value="Musique">
                    <input class="btn-filter" type="submit" name="sport" value="Sport">
                    <input class="btn-filter" type="submit" name="business" value="Business">
                </form>
               <form action="short.php" method="post" class="search-bar">
                    <label for="search"></label>
                   <input type="text" name="search" id="search"required class="search-bar-input">
                    <button type="submit" class="fa fa-search">
                        
                   </button>
               </form>
            </article>
       </section>
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
                } else{
                ?>
            <?php for ($i = $debut_shorts; $i <= $fin_shorts && $i < count($listeShort); $i++): ?>
            <?php $short = $listeShort[$i]; ?>
                        <iframe width="259" height="480" src="<?php echo $short->getLien() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php endfor; }?>
            </div>
        </article>
        <nav aria-label="Pagination">
            <ul id="page-num">
                <?php if ($page_shorts > 1): ?>
                    <li>
                        <a href="<?= '?controleur=shorts&page_shorts=' . ($page_shorts - 1) ?>">Précédent</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pages_shorts; $i++): ?>
                    <li class="page-item <?= ($i == $page_shorts) ? 'active' : '' ?>">
                        <a href="<?= '?controleur=shorts&page_shorts=' . $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page_shorts < $pages_shorts): ?>
                    <li>
                        <a href="<?= '?controleur=shorts&page_shorts=' . ($page_shorts + 1) ?>">Suivant</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </main>
    <footer>
        <p>LE FOOTER </p>
    </footer>
</body>
</html>
