<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Modifier</h1>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for = "nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" required value="<?= !empty($shorts) ? $shorts->getNom() : "" ?>">
    </div>
    <div class="form-group">
        <label for="genre">Genre :</label>
        <select id="genre" name="genre" class="form-control" required>
            <option value="music" <?= (!empty($shorts) && $shorts->getGenre() === "music") ? "selected" : "" ?>>Musique</option>
            <option value="video" <?= (!empty($shorts) && $shorts->getGenre() === "video") ? "selected" : "" ?>>Vidéo</option>
            <option value="gaming" <?= (!empty($shorts) && $shorts->getGenre() === "gaming") ? "selected" : "" ?>>Gaming</option>
            <option value="mode" <?= (!empty($shorts) && $shorts->getGenre() === "mode") ? "selected" : "" ?>>Mode</option>
            <option value="sport" <?= (!empty($shorts) && $shorts->getGenre() === "sport") ? "selected" : "" ?>>Sport</option>
            <option value="comedy" <?= (!empty($shorts) && $shorts->getGenre() === "comedy") ? "selected" : "" ?>>Comedy</option>
            <option value="media" <?= (!empty($shorts) && $shorts->getGenre() === "media") ? "selected" : "" ?>>Média</option>
            <option value="business" <?= (!empty($shorts) && $shorts->getGenre() === "business") ? "selected" : "" ?>>Business</option>
            <option value="cinema" <?= (!empty($shorts) && $shorts->getGenre() === "cinema") ? "selected" : "" ?>>Cinéma</option>
        </select>
    </div>
    <div class="form-group">
        <label for = "lien">Lien</label>
        <input type="text" name="lien" id="lien" class="form-control" value="<?= !empty($shorts) ? $shorts->getLien() : "" ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>