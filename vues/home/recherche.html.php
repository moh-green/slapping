<?php if (!empty($results)): ?>
    <?php $entite = $entite ?? $_POST['entity']; ?>
    <?php $entite = $entite ?? key($results); ?>
    <h1><?= basename(str_replace('\\', '/', $entite)) ?></h1>


    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <?php if ($entite === 'Modeles\Entites\Actualites'): ?>
                    <th>Titre</th>
                    <th>Sous-titre</th>
                    <th>Texte</th>
                    <th>Miniature</th>
                    <th>Alt</th>
                <?php elseif ($entite === 'Modeles\Entites\Utilisateurs'): ?>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Type</th>
                <?php elseif ($entite === 'Modeles\Entites\Shorts'): ?>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Lien</th>
                <?php elseif ($entite === 'Modeles\Entites\Video'): ?>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Lien</th>
                <?php endif; ?>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $item): ?>
                <tr>
                    <td><?= $item->getId() ?></td>
                    <?php if ($entite === 'Modeles\Entites\Actualites'): ?>
                        <td><?= $item->getTitre() ?></td>
                        <td><?= $item->getSousTitre() ?></td>
                        <td><?= $item->getTexte() ?></td>
                        <td><?= $item->getMiniature() ?></td>
                        <td><?= $item->getAlt() ?></td>
                    <?php elseif ($entite === 'Modeles\Entites\Utilisateurs'): ?>
                        <td><?= $item->getPseudo() ?></td>
                        <td><?= $item->getEmail() ?></td>
                        <td><?= $item->getType() ?></td>
                    <?php elseif ($entite === 'Modeles\Entites\Shorts'): ?>
                        <td><?= $item->getNom() ?></td>
                        <td><?= $item->getGenre() ?></td>
                        <td><?= $item->getLien() ?></td>
                    <?php elseif ($entite === 'Modeles\Entites\Video'): ?>
                        <td><?= $item->getNom() ?></td>
                        <td><?= $item->getGenre() ?></td>
                        <td><?= $item->getLien() ?></td>
                    <?php endif; ?>
                    <td>
                        <a href="<?= lien($entite, "modifier", $item->getId()) ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="<?= lien($entite, "supprimer", $item->getId()) ?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <!-- Mettez ici votre code de pagination spécifique à l'entité -->

<?php endif; ?>
