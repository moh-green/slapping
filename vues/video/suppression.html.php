<h1>Confirmation de la suppression de la vidéo n°<?= $video->getId() ?> ? </h1>

<ul class ="list-group">
    <li class="list-group-item">
        <strong>Nom : </strong> <?= $video->getNom() ?>
    </li>
    <li class="list-group-item">
        <strong>Genre : </strong> <?= $video->getGenre() ?>
    </li>
    <li class="list-group-item">
        <strong>Lien : </strong> <?= $video->getLien() ?>
    </li>
</ul>
<form method="post">
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success">Confirmer</button>
        <a href="<?= lien("video","liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>