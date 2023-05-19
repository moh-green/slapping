<h1>Confirmation de la suppression du short n°<?= $shorts->getId() ?> ? </h1>

<ul class ="list-group">
    <li class="list-group-item">
        <strong>Nom : </strong> <?= $shorts->getNom() ?>
    </li>
    <li class="list-group-item">
        <strong>Genre : </strong> <?= $shorts->getGenre() ?>
    </li>
    <li class="list-group-item">
        <strong>Lien : </strong> <?= $shorts->getLien() ?>
    </li>
</ul>
<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("shorts","liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>