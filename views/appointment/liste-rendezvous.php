<?php
$title = "Liste des patients";
?>

<div class="row mt-5">
    <div class="col-0 col-lg-3"></div>
    <div class="col-12 col-lg-6">

        <ol class="list-group">
            <?php foreach ($appointments as $appointment) : ?>

                <li class="list-group-item justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <p><b>Date et heure du rendez vous:</b> <?= $appointment->getDateHour() ?></p>
                        <p><b>Nom du patient:</b> <?= $appointment->getPatientName($appointment->getIdPatients()) ?></p>
                        <a type="button" class="btn btn-primary" href="/appointments/profil?id=<?= $appointment->getId() ?>">Détails</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>