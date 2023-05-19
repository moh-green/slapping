<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Ajouter</h1>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for = "nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" required value="<?= !empty($short) ? $short->getNom() : "" ?>">
    </div>
    <div class="form-group">
        <label for="genre">Genre :</label>
        <select id="genre" name="genre" class="form-control" required>
            <option value="music" <?= (!empty($short) && $short->getGenre() === "music") ? "selected" : "" ?>>Musique</option>
            <option value="video" <?= (!empty($short) && $short->getGenre() === "video") ? "selected" : "" ?>>Vidéo</option>
            <option value="gaming" <?= (!empty($short) && $short->getGenre() === "gaming") ? "selected" : "" ?>>Gaming</option>
            <option value="mode" <?= (!empty($short) && $short->getGenre() === "mode") ? "selected" : "" ?>>Mode</option>
            <option value="sport" <?= (!empty($short) && $short->getGenre() === "sport") ? "selected" : "" ?>>Sport</option>
            <option value="comedy" <?= (!empty($short) && $short->getGenre() === "comedy") ? "selected" : "" ?>>Comedy</option>
            <option value="media" <?= (!empty($short) && $short->getGenre() === "media") ? "selected" : "" ?>>Média</option>
            <option value="business" <?= (!empty($short) && $short->getGenre() === "business") ? "selected" : "" ?>>Business</option>
            <option value="cinema" <?= (!empty($short) && $short->getGenre() === "cinema") ? "selected" : "" ?>>Cinéma</option>
        </select>
    </div>
    <div class="form-group">
        <label for = "lien">Lien</label>
        <input type="text" name="lien" id="lien" class="form-control" value="<?= !empty($short) ? $short->getLien() : "" ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>