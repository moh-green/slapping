<h1>Confirmation de la suppression de l'actualité n°<?= $actualites->getId() ?> ?</h1>

    <ul class="list-group">
        <li class="list-group-item">
            <strong>Titre : </strong> <?= $actualites->getTitre() ?>
        </li>
        <li class="list-group-item">
            <strong>Sous Titre : </strong> <?= $actualites->getSoustitre() ?>
        </li>
        <li class="list-group-item">
            <strong>Texte : </strong> <?= $actualites->getTexte() ?>
        </li>
        <li class="list-group-item">
            <strong>Date : </strong> <?= $actualites->getDate() ?>
        </li>
        <li class="list-group-item">
            <strong>Alt de la miniature : </strong> <?= $actualites->getAlt() ?>
        </li>
        <li class="list-group-item">
            <strong>Miniature : </strong>
            <img src="data:image/jpeg;base64,<?= base64_encode($actualites->getMiniature()) ?>"  height="150px" width="150px">  
        </li>
    </ul>
    <form method="post">
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Confirmer</button>
            <a href="<?= lien("actualites","liste") ?>" class="btn btn-danger">Annuler</a>
        </div>
    </form>
