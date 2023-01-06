<?php
$title = "Liste des patients";
$searchBar = TRUE;
?>

<div class="row mt-5">
    <div class="col-0 col-lg-3"></div>
    <div class="col-12 col-lg-6">
        <ol class="list-group">
            <?php foreach ($patients as $patient) : ?>
                <li class="list-group-item justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <p><b>Prénom:</b> <?= $patient->getFirstname() ?></p>
                        <p><b>Nom:</b> <?= $patient->getLastname() ?></p>
                        <form action="/patients/delete" method="POST">
                            <a type="button" class="btn btn-primary mb-2" href="/patients/profil?id=<?= $patient->getId() ?>">Détails</a>
                            <input type="hidden" name="id" value="<?= $patient->getId() ?>">
                            <button type="submit" class="btn btn-danger mb-2">Supprimer</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
        <nav aria-label="pagination">
            <ul class="pagination mt-3">
                <?php if ($header['currentPage'] != 1) : ?>
                    <li class="page-item"><a class="page-link" href="patients?page=<?= $header['currentPage'] - 1 ?>&search=<?= $header['search'] ?>">Précédente</a></li>
                    <li class="page-item"><a class="page-link" href="patients?page=<?= $header['currentPage'] - 1 ?>&search=<?= $header['search'] ?>"><?= $header['currentPage'] - 1 ?></a></li>
                <?php endif ?>
                <li class="page-item active"><a class="page-link" href="patients?page=<?= $header['currentPage'] ?>&search=<?= $header['search'] ?>"><?= $header['currentPage'] ?></a></li>
                <?php if ($header['currentPage'] != $header['numberOfPages']) : ?>
                    <li class="page-item"><a class="page-link" href="patients?page=<?= $header['currentPage'] + 1 ?>&search=<?= $header['search'] ?>"><?= $header['currentPage'] + 1 ?></a></li>
                    <li class="page-item"><a class="page-link" href="patients?page=<?= $header['currentPage'] + 1 ?>&search=<?= $header['search'] ?>">Suivante</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</div>