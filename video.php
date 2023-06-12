<?php
include 'includes/init.inc.php';

use Controleurs\VideoControleur;
$videos = new VideoControleur;
$listeVideo = $videos->listeUser();
$listeVideoSearch = array();
if (isset($_POST['musique'])) {
   $listeVideo = $videos->filtrerCategorie('music');
} elseif (isset($_POST['sport'])) {
   $listeVideo = $videos->filtrerCategorie('sport');
} elseif (isset($_POST['business'])) {
   $listeVideo = $videos->filtrerCategorie('business');
}elseif (isset($_POST['search'])) {
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slapping - Le média qui claque</title>
    <link rel="stylesheet" href="assets/css/video.min.css">
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
                <li><a href="video.php" id="header-video">Vidéos</a></li>
                <li><a href="short.php">Short</a></li>
                <li><a href="actualite.php">Actualités</a></li>
                <li><a href="contact.php">À propos</a></li>
              </ul>
       </nav>
       <section>
       <article id="filter">
                <form method="post" action="video.php">
                    <input class="btn-filter" type="submit" name="musique" value="Musique">
                    <input class="btn-filter" type="submit" name="sport" value="Sport">
                    <input class="btn-filter" type="submit" name="business" value="Business">
                </form>
               <form action="video.php" method="post" class="search-bar">
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
                    foreach ($listeVideoSearch as $result) {
                        ?>
                        <iframe width="500" height="250" src="<?php echo $result['lien'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php
                    }  
                } else{
                ?>
            <?php for ($i = $debut_videos; $i <= $fin_videos && $i < count($listeVideo); $i++): ?>
            <?php $video = $listeVideo[$i]; ?>
                        <iframe width="500" height="250" src="<?php echo $video->getLien() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php endfor; }?>
            
        </div>
    </article>

    <nav aria-label="Pagination">
            <ul id="page-num">
                <?php if ($page_videos > 1): ?>
                    <li>
                        <a href="<?= '?controleur=videos&page_videos=' . ($page_videos - 1) ?>">Précédent</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pages_videos; $i++): ?>
                    <li class="page-item <?= ($i == $page_videos) ? 'active' : '' ?>">
                        <a href="<?= '?controleur=videos&page_videos=' . $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page_videos < $pages_videos): ?>
                    <li>
                        <a href="<?= '?controleur=videos&page_videos=' . ($page_videos + 1) ?>">Suivant</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </main>
    <footer>
        <p>Slapping - Le média qui claque</p>
        <section>
            <img src="assets/img/facebook.png" alt="">
            <img src="assets/img/instagram.png" alt="">
            <img src="assets/img/youtube.png" alt="">
        </section>
    </footer>
</body>
</html>