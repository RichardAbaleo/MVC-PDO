<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/patients">Liste patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/patients/create">Ajouter patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/appointments">Liste rdv</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/appointments/create">Ajouter rdv</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/patient-appointment/create">Ajouter patient avec rdv</a>
                    </li>
                </ul>
            </div>
            <?php if ($searchBar == TRUE) : ?>
                <form action="/patients" method="GET" class="d-flex">
                    <input class="form-control me-2" name='search' type="search" placeholder="Nom / prénom">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            <?php endif ?>
        </div>
    </nav>

    <?= $content ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>