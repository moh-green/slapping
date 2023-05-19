<?php
$videos_par_page = 15;
$pages_videos = ceil(count($video) / $videos_par_page);
$page_videos = isset($_GET['page_videos']) ? $_GET['page_videos'] : 1;
$debut_videos = ($page_videos - 1) * $videos_par_page;
$fin_videos = $debut_videos + $videos_par_page - 1;
?>

<h1>Videos</h1>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Genre</th>
            <th>Lien</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = $debut_videos; $i <= $fin_videos && $i < count($video); $i++): ?>
        <?php $videos = $video[$i]; ?>
        <tr>
            <td> <?= $videos->getId() ?> </td>
            <td> <?= $videos->getNom() ?> </td>
            <td> <?= $videos->getGenre() ?> </td>
            <td> <?= $videos->getLien() ?> </td>
            <td>
                <a href="<?= lien("video", "modifier", $videos->getId()) ?>">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="<?= lien("video", "supprimer", $videos->getId()) ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endfor; ?>
    </tbody>
</table>
<nav aria-label="Pagination">
    <ul class="pagination justify-content-center">
        <?php if ($page_videos > 1): ?>
        <li class="page-item">
            <a class="page-link" href="<?= '?controleur=video&page_videos=' . ($page_videos - 1) ?>">Précédent</a>
        </li>
        <?php endif; ?>
        
        <?php for ($i = 1; $i <= $pages_videos; $i++): ?>
        <li class="page-item <?= ($i == $page_videos) ? 'active' : '' ?>">
            <a class="page-link" href="<?= '?controleur=video&page_videos=' . $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>
        
        <?php if ($page_videos < $pages_videos): ?>
        <li class="page-item">
            <a class="page-link" href="<?= '?controleur=video&page_videos=' . ($page_videos + 1) ?>">Suivant</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
