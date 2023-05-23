<h1>Confrimation de la suppression de l'utilisateurs n°<?= $utilisateurs->getId() ?> ? </h1>

<ul class ="list-group">
    <li class="list-group-item">
        <strong>Nom : </strong> <?= $utilisateurs->getNom() ?>
    </li>
    <li class="list-group-item">
        <strong>Prénom : </strong> <?= $utilisateurs->getPrenom() ?>
    </li>
    <li class="list-group-item">
        <strong>Email : </strong> <?= $utilisateurs->getEmail() ?>
    </li>
    <li class="list-group-item">
        <strong>Type : </strong> <?= $utilisateurs->getType() ?>
    </li>
</ul>
<form method="post">
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success">Confirmer</button>
        <a href="<?= lien("utilisateurs","liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>