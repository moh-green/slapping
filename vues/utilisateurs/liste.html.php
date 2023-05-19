<?php 

$utilisateurs_par_page = 15;
$pages_utilisateurs = ceil(count($utilisateurs) / $utilisateurs_par_page);
$page_utilisateurs = isset($_GET['page_utilisateurs']) ? $_GET['page_utilisateurs'] : 1;
$debut_utilisateurs = ($page_utilisateurs - 1) * $utilisateurs_par_page;
$fin_utilisateurs = $debut_utilisateurs + $utilisateurs_par_page - 1;

?>

<h1>Utilisateurs</h1>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = $debut_utilisateurs; $i <= $fin_utilisateurs && $i < count($utilisateurs); $i++): ?>
        <?php $utilisateur = $utilisateurs[$i]; ?>
        <tr>
            <td> <?= $utilisateur->getId() ?> </td>
            <td> <?= $utilisateur->getNom() ?> </td>
            <td> <?= $utilisateur->getPrenom() ?> </td>
            <td> <?= $utilisateur->getEmail() ?> </td>
            <td>
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
        <?php if ($page_utilisateurs > 1): ?>
        <li class="page-item">
            <a class="page-link" href="<?= '?controleur=utilisateurs&page_utilisateurs=' . ($page_utilisateurs - 1) ?>">Précédent</a>
        </li>
        <?php endif; ?>
        
        <?php for ($i = 1; $i <= $pages_utilisateurs; $i++): ?>
        <li class="page-item <?= ($i == $page_utilisateurs) ? 'active' : '' ?>">
            <a class="page-link" href="<?= '?controleur=utilisateurs&page_utilisateurs=' . $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>
        
        <?php if ($page_utilisateurs < $pages_utilisateurs): ?>
        <li class="page-item">
            <a class="page-link" href="<?= '?controleur=utilisateurs&page_utilisateurs=' . ($page_utilisateurs + 1) ?>">Suivant</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>

