<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Ajouter</h1>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" required value="<?= !empty($actu) ? $actu->getTitre() : "" ?>">
    </div>
    <div class="form-group">
        <label for="soustitre">Sous-titre</label>
        <input type="text" name="soustitre" id="soustitre" class="form-control" value="<?= $actu->getSoustitre() ?? "" ?>">
    </div>
    <div class="form-group">
        <label for="texte">Texte</label>
        <textarea name="texte" id="texte" class="form-control"><?= $actu->getTexte() ?? "" ?></textarea>
    </div>
    <div class="form-group">
        <label for="miniature">Miniature</label>
        <input type="file" name="miniature" id="miniature" class="form-control"><img src="data:image/jpeg;base64,<?= base64_encode($actu->getMiniature()) ?>"  height="150px" width="150px"> 
    </div>
    <div class="form-group">
        <label for="alt">Alt/Description de la miniature</label>
        <input type="text" name="alt" id="alt" class="form-control" value="<?= $actu->getAlt() ?? "" ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>