<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Modifier</h1>

<ul class ="list-group">
    <li class="list-group-item">
        <strong>Pseudo : </strong> <?= $utilisateurs->getPseudo() ?>
    </li>
    <li class="list-group-item">
        <strong>Email : </strong> <?= $utilisateurs->getEmail() ?>
    </li>
</ul>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="type">Type :</label>
        <select id="type" name="type" class="form-control" required>
            <option value="membre" <?= (!empty($utilisateurs) && $utilisateurs->getType() === "membre") ? "selected" : "" ?>>Membre</option>
            <option value="admin" <?= (!empty($utilisateurs) && $utilisateurs->getType() === "admin") ? "selected" : "" ?>>Admin</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>