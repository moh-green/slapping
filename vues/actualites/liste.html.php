<?php

$actualites_par_page = 15;
$pages_actualites = ceil(count($actualites) / $actualites_par_page);
$page_actualites = isset($_GET['page_actualites']) ? $_GET['page_actualites'] : 1;
$debut_actualites = ($page_actualites - 1) * $actualites_par_page;
$fin_actualites = $debut_actualites + $actualites_par_page - 1;

?>

<h1>Actualites</h1>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Sous-titre</th>
            <th>Texte</th>
            <th>Miniature</th>
            <th>Alt/Description de la miniautre</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($actualites as $actu): ?>
        <tr>
            <!-- Table Row -->
            <td>
                <?= $actu->getId() ?>
            </td>
            <td>
                <?= $actu->getTitre() ?>
            </td>
            <td>
                <?= $actu->getSoustitre() ?>
            </td>
            <td>
                <?= $actu->getTexte() ?>
            </td>
            <td>
                <?php if ($actu->getMiniature()): ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($actu->getMiniature()) ?>" height="150px" width="150px">
                <?php endif ?>
            </td>
            <td>
                <?= $actu->getAlt() ?>
            </td>
            <td>
                <?= $actu->getDate() ?>
            </td>
            <td>
                <a href="<?= lien("actualites", "modifier", $actu->getId()) ?>">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="<?= lien("actualites", "supprimer", $actu->getId()) ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Pagination">
    <ul class="pagination justify-content-center">
        <?php if ($page_actualites > 1): ?>
        <li class="page-item">
            <a class="page-link" href="<?= '?controleur=actualites&page_actualites=' . ($page_actualites - 1) ?>">Précédent</a>
        </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $pages_actualites; $i++): ?>
        <li class="page-item <?= ($i == $page_actualites) ? 'active' : '' ?>">
            <a class="page-link" href="<?= '?controleur=actualites&page_actualites=' . $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>

        <?php if ($page_actualites < $pages_actualites): ?>
        <li class="page-item">
            <a class="page-link" href="<?= '?controleur=actualites&page_actualites=' . ($page_actualites + 1) ?>">Suivant</a>
        </li>
        <?php endif; ?>
        <li class="page-item">
            <a class="page-link" href="<?= lien("actualites", "ajouter") ?>">Ajouter une actualité</a>
        </li>
    </ul>
</nav>
