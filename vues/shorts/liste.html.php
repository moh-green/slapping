<?php
// définir le nombre de shorts à afficher par page
$shorts_par_page = 15;

// calculer le nombre total de pages pour les shorts
$pages_shorts = ceil(count($shorts) / $shorts_par_page);

// récupérer le numéro de page à afficher pour les shorts
$page_shorts = isset($_GET['page_shorts']) ? $_GET['page_shorts'] : 1;

// déterminer les indices de début et de fin pour les shorts à afficher sur la page courante
$debut_shorts = ($page_shorts - 1) * $shorts_par_page;
$fin_shorts = $debut_shorts + $shorts_par_page - 1;
?>

<h1>Shorts</h1>
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
        <?php for ($i = $debut_shorts; $i <= $fin_shorts && $i < count($shorts); $i++): ?>
            <?php $short = $shorts[$i]; ?>
            <tr>
                <td><?= $short->getId() ?></td>
                <td><?= $short->getNom() ?></td>
                <td><?= $short->getGenre() ?></td>
                <td><?= $short->getLien() ?></td>
                <td>
                    <a href="<?= lien("shorts", "modifier", $short->getId()) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= lien("shorts", "supprimer", $short->getId()) ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>
<nav aria-label="Pagination">
    <ul class="pagination justify-content-center">
        <?php if ($page_shorts > 1): ?>
            <li class="page-item">
                <a class="page-link" href="<?= '?controleur=shorts&page_shorts=' . ($page_shorts - 1) ?>">Précédent</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $pages_shorts; $i++): ?>
            <li class="page-item <?= ($i == $page_shorts) ? 'active' : '' ?>">
                <a class="page-link" href="<?= '?controleur=shorts&page_shorts=' . $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page_shorts < $pages_shorts): ?>
            <li class="page-item">
                <a class="page-link" href="<?= '?controleur=shorts&page_shorts=' . ($page_shorts + 1) ?>">Suivant</a>
            </li>
        <?php endif; ?>
        <li class="page-item">
            <a class="page-link" href="<?= lien("shorts", "ajouter") ?>">Ajouter un Shorts</a>
        </li>
    </ul>
</nav>
