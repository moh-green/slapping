<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= lien("home", "liste") ?>">BackOffice</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="actualitesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actualités</a>
                            <div class="dropdown-menu" aria-labelledby="actualitesDropdown">
                                <a class="dropdown-item" href="<?= lien("actualites", "liste") ?>">Liste</a>
                                <a class="dropdown-item" href="<?= lien("actualites", "ajouter") ?>">Ajouter</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="videoDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vidéos</a>
                            <div class="dropdown-menu" aria-labelledby="videoDropdown">
                                <a class="dropdown-item" href="<?= lien("video", "liste") ?>">Liste</a>
                                <a class="dropdown-item" href="<?= lien("video", "ajouter") ?>">Ajouter</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="shortsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shorts</a>
                            <div class="dropdown-menu" aria-labelledby="shortsDropdown">
                                <a class="dropdown-item" href="<?= lien("shorts", "liste") ?>">Liste</a>
                                <a class="dropdown-item" href="<?= lien("shorts", "ajouter") ?>">Ajouter</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= lien("utilisateurs", "liste") ?>">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <form method="post">
                                <input type="hidden" name="action" value="deconnexion">
                                <button class="btn btn-outline-danger" type="submit">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
