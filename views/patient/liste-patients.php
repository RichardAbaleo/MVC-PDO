<?php
$title = "Liste des patients";
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
                        <a type="button" class="btn btn-primary" href="/patients/profil?id=<?= $patient->getId() ?>">Détails</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>