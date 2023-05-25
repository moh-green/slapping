<?php if (!empty($results)): ?>

<?php $actualites = [];
$shorts = [];
$video = [];
$utilisateurs = [];

foreach ($results as $item) {
    if ($item instanceof Modeles\Entites\Actualites) {
        $actualites[] = $item;
    } elseif ($item instanceof Modeles\Entites\Shorts) {
        $shorts[] = $item;
    } elseif ($item instanceof Modeles\Entites\Video) {
        $video[] = $item;
    } elseif ($item instanceof Modeles\Entites\Utilisateurs) {
        $utilisateurs[] = $item;
    }
}
?>

<?php if (!empty($actualites)): ?>
    <h2>Actualités</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Sous-titre</th>
                <th>Texte</th>
                <th>Miniature</th>
                <th>Alt</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($actualites as $item): ?>
                <?php $actu = $item; ?>
                <tr>
                    <td><?= $actu->getId() ?></td>
                    <td><?= $actu->getTitre() ?></td>
                    <td><?= $actu->getSousTitre() ?></td>
                    <td><?= $actu->getTexte() ?></td>
                    <td>
                        <?php if ($actu->getMiniature()): ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($actu->getMiniature()) ?>" height="100px" width="100px">
                        <?php endif; ?>
                    </td>
                    <td><?= $actu->getAlt() ?></td>
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
<?php endif; ?>

<?php if (!empty($shorts)): ?>
    <h2>Shorts</h2>
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
            <?php foreach ($shorts as $item): ?>
                <?php $short = $item; ?>
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
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if (!empty($video)): ?>
    <h2>Vidéo</h2>
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
            <?php foreach ($video as $item): ?>
                <?php $vid = $item; ?>
                <tr>
                    <td><?= $vid->getId() ?></td>
                    <td><?= $vid->getNom() ?></td>
                    <td><?= $vid->getGenre() ?></td>
                    <td><?= $vid->getLien() ?></td>
                    <td>
                        <a href="<?= lien("video", "modifier", $item->getId()) ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="<?= lien("video", "supprimer", $item->getId()) ?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if (!empty($utilisateurs)): ?>
    <h2>Utilisateurs</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $item): ?>
                <?php $user = $item; ?>
                <tr>
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getPseudo() ?></td>
                    <td><?= $user->getEmail() ?></td>
                    <td><?= $user->getType() ?></td>
                    <td>
                        <a href="<?= lien("utilisateurs", "modifier", $user->getId()) ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="<?= lien("utilisateurs", "supprimer", $user->getId()) ?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<!-- Pagination -->
<!-- Mettez ici votre code de pagination spécifique à chaque entité -->

<?php endif; ?>
